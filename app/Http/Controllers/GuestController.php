<?php

namespace App\Http\Controllers;

use App\Exports\GuestExport;
use App\Models\CashReceipt;
use App\Models\DetailExport;
use App\Models\Groups;
use App\Models\Guest;
use App\Models\PayExport;
use App\Models\PayOder;
use App\Models\Provides;
use App\Models\QuoteExport;
use App\Models\representGuest;
use App\Models\Role;
use App\Models\User;
use App\Models\userFlow;
use App\Models\Workspace;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $guests;
    private $representGuest;
    private $detailExport;
    private $payExport;
    private $workspaces;
    private $userFlow;
    private $users;
    private $guest;
    private $quoteE;
    private $cash_receipts;

    public function __construct()
    {
        $this->guests = new Guest();
        $this->representGuest = new representGuest();
        $this->detailExport = new DetailExport();
        $this->payExport = new PayExport();
        $this->workspaces = new Workspace();
        $this->userFlow = new userFlow();
        $this->users = new User();
        $this->guest = new Guest();
        $this->quoteE = new QuoteExport();
        $this->cash_receipts = new CashReceipt();
    }
    public function index(Request $request)
    {
        if (Auth::check()) {
            $title = "Khách hàng";
            $guests = $this->guests->getAllGuest();
            $dataa = $this->guests->getAllGuest();
            $users = $this->guests->getUserInGuests();
            //Dư nợ
            $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
            $workspacename = $workspacename->workspace_name;
            // foreach ($guests as $guest) {
            //     $sumDebt = DetailExport::where('guest_id', $guest->id)->where('status', 2)->sum('amount_owed');
            //     $guest->sumDebt = $sumDebt;
            // }
            // dd($guests);
            $count = $guests->where('group_id', 0)->count();
            $groups = Groups::where('grouptype_id', 2)->where('workspace_id', Auth::user()->current_workspace)->get();
            return view('tables.guests.index', compact('title', 'guests', 'groups', 'count', 'users', 'dataa', 'workspacename'));
        } else {
            return redirect()->back()->with('warning', 'Vui lòng đăng nhập!');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $title = "Thêm mới khách hàng";
        $groups = Groups::where('grouptype_id', 2)->where('workspace_id', Auth::user()->current_workspace)->get();
        return view('tables.guests.create', compact('title', 'groups', 'workspacename'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(string $workspace, Request $request)
    {
        $result = $this->guests->addGuest($request->all());
        if ($result == true) {
            $msg = redirect()->back()->with('msg', 'Khách hàng đã tồn tại');
        } else {
            $arrCapNhatKH = [
                'name' => 'KH',
                'des' => 'Lưu khách hàng'
            ];
            $this->userFlow->addUserFlow($arrCapNhatKH);
            $msg = redirect()->route('guests.index', ['workspace' => $workspace])->with('msg', 'Thêm mới khách hàng thành công');
        }
        return $msg;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $workspace, string $id)
    {
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $guest = Guest::where('guest.id', $id)
            ->where('guest.workspace_id', Auth::user()->current_workspace)
            ->leftJoin('groups', 'guest.group_id', 'groups.id')
            ->select('guest.*', 'groups.name')
            ->first();
        if ($guest) {
            $title = $guest->guest_name_display;
        } else {
            abort('404');
            $title = '';
        }
        $groups = Groups::where('grouptype_id', 2)->where('workspace_id', Auth::user()->current_workspace)->get();
        //Người đại diện
        $representGuest = $this->representGuest->getRepresentGuest($id);
        //Tổng số đơn
        $countDetail = $this->detailExport->countDetail($id);
        //Tổng số tiền đã bán
        $sumSell = $this->detailExport->sumSell($id);
        //Tổng số tiền đã thanh toán
        $sumPay = $this->payExport->sumPay($id);
        //Dư nợ
        $sumDebt = $this->detailExport->sumDebt($id);
        //Lịch sử giao dịch
        $payOrder = PayOder::where('guest_id', $id)->get();
        // Thêm trường 'source_id' vào từng phần tử của mảng $historyGuest
        $historyGuest = collect($this->detailExport->historyGuest($id))->map(function ($item) {
            $item->source_id = 'history';
            $item->date_created = $item->created_at;
            return $item;
        });
        // Thêm trường 'source_id' vào từng phần tử của mảng $cash_receipts
        $cash_receipts = collect($this->cash_receipts->cashReceiptByGuest($id))->map(function ($item) {
            $item->source_id = 'cash_receipt'; // Gán mã định danh cho mảng cash_receipts
            return $item;
        });

        // Kết hợp hai mảng lại thành một mảng duy nhất
        $combined = $historyGuest->concat($cash_receipts);

        // Get All đơn
        $productDelivered = $this->quoteE->sumProductsQuoteByGuest($id);
        $allDelivery = $this->detailExport->getSumDetailEByGuest($id);
        return view('tables.guests.show', compact(
            'title',
            'groups',
            'guest',
            'historyGuest',
            'representGuest',
            'countDetail',
            'sumDebt',
            'sumPay',
            'sumSell',
            'workspacename',
            'allDelivery',
            'productDelivered',
            'cash_receipts',
            'payOrder'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $workspace, string $id, Request $request)
    {
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $guest = Guest::where('guest.id', $id)
            ->where('guest.workspace_id', Auth::user()->current_workspace)
            ->first();
        if ($guest) {
            $title = $guest->guest_name_display;
        } else {
            abort('404');
            $title = '';
        }
        $getId = $id;
        $request->session()->put('id', $id);
        //Người đại diện
        $representGuest = $this->representGuest->getRepresentGuest($id);
        //Tổng số đơn
        $countDetail = $this->detailExport->countDetail($id);
        //Tổng số tiền đã bán
        $sumSell = $this->detailExport->sumSell($id);
        //Tổng số tiền đã thanh toán
        $sumPay = $this->payExport->sumPay($id);
        //Dư nợ
        $sumDebt = $this->detailExport->sumDebt($id);
        //Lịch sử giao dịch
        $historyGuest = $this->detailExport->historyGuest($id);
        $dataa = $this->guests->getAllGuest();
        $groups = Groups::where('grouptype_id', 2)->where('workspace_id', Auth::user()->current_workspace)->get();

        return view('tables.guests.edit', compact('title', 'groups', 'guest', 'historyGuest', 'representGuest', 'countDetail', 'sumDebt', 'sumPay', 'dataa', 'workspacename'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $workspace, Request $request, string $id)
    {
        $id = session('id');
        $data = [
            'guest_name_display' => $request->guest_name_display,
            'guest_name' => $request->guest_name,
            'guest_address' => $request->guest_address,
            'guest_code' => $request->guest_code,
            'guest_phone' => $request->guest_phone,
            'key' => $request->key,
            'guest_email' => $request->guest_email,
            'guest_receiver' => $request->guest_receiver,
            'group_id' => $request->grouptype_id,
            'guest_email_personal' => $request->guest_email_personal,
            'guest_phone_receiver' => $request->guest_phone_receiver,
            'guest_note' => $request->guest_note
        ];
        $this->guests->updateProvide($data, $id);
        $this->representGuest->updateRepresentGuest($request->all(), $id);
        session()->forget('id');
        return redirect(route('guests.index', ['workspace' => $workspace]))->with('msg', 'Sửa khách hàng thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $workspace, string $id)
    {
        $guest = Guest::find($id);
        if (!$guest) {
            return back()->with('warning', 'Không tìm thấy khách hàng để xóa');
        }
        $check = DetailExport::where('guest_id', $id)->first();
        if ($check) {
            return back()->with('warning', 'Xóa thất bại do khách hàng này đang báo giá!');
        }
        representGuest::where('guest_id', $id)->delete();
        $guest->delete();
        $arrCapNhatKH = [
            'name' => 'KH',
            'des' => 'Xóa khách hàng'
        ];
        $this->userFlow->addUserFlow($arrCapNhatKH);
        return back()->with('msg', 'Xóa khách hàng thành công');
    }

    public function search(Request $request)
    {
        $data = $request->all();
        $filters = [];
        if (isset($data['ma']) && $data['ma'] !== null) {
            $filters[] = ['value' => 'Mã: ' . $data['ma'], 'name' => 'ma', 'icon' => 'po'];
        }
        if (isset($data['ten']) && $data['ten'] !== null) {
            $filters[] = ['value' => 'Tên: ' . $data['ten'], 'name' => 'ten', 'icon' => 'po'];
        }
        if (isset($data['diachi']) && $data['diachi'] !== null) {
            $filters[] = ['value' => 'Địa chỉ: ' . $data['diachi'], 'name' => 'diachi', 'icon' => 'po'];
        }
        if (isset($data['phone']) && $data['phone'] !== null) {
            $filters[] = ['value' => 'Điện thoại: ' . $data['phone'], 'name' => 'phone', 'icon' => 'po'];
        }
        if (isset($data['email']) && $data['email'] !== null) {
            $filters[] = ['value' => 'Email: ' . $data['email'], 'name' => 'email', 'icon' => 'po'];
        }
        if (isset($data['debt']) && $data['debt'][1] !== null) {
            $filters[] = ['value' => 'Công nợ: ' . $data['debt'][0] . ' ' . $data['debt'][1], 'name' => 'debt', 'icon' => 'money'];
        }
        if ($request->ajax()) {
            $guests = $this->guests->getAllGuest($data);
            return response()->json([
                'data' => $guests,
                'filters' => $filters,
            ]);
        }
        return false;
    }
    public function searchHistory(Request $request)
    {
        $data = $request->all();
        $filters = [];
        if (isset($data['date']) && $data['date'][1] !== null) {
            $date_start = date("d/m/Y", strtotime($data['date'][0]));
            $date_end = date("d/m/Y", strtotime($data['date'][1]));
            $filters[] = ['value' => 'Ngày: từ ' . $date_start . ' đến ' . $date_end, 'name' => 'date', 'icon' => 'date'];
        }
        if ($request->ajax()) {
            $historyGuest = collect($this->detailExport->historyGuest($data['data']))->map(function ($item) {
                $item->source_id = 'history';
                $item->date_created = $item->created_at;
                return $item;
            });

            // Thêm trường 'source_id' vào từng phần tử của mảng $cash_receipts
            $cash_receipts = collect($this->cash_receipts->cashReceiptByGuest($data['data']))->map(function ($item) {
                $item->source_id = 'cash_receipt'; // Gán mã định danh cho mảng cash_receipts
                return $item;
            });
            $combined = $historyGuest->concat($cash_receipts);

            if (isset($data['search'])) {
                $combined = $combined->filter(function ($item) use ($data) {
                    return stripos($item->quotation_number ?? '', $data['search']) !== false
                        || stripos($item->receipt_code ?? '', $data['search']) !== false;
                });
            }
            if (!empty($data['date'][0]) && !empty($data['date'][1])) {
                $dateStart = Carbon::parse($data['date'][0]);
                $dateEnd = Carbon::parse($data['date'][1])->endOfDay();

                // Sử dụng filter để lọc theo khoảng ngày
                $combined = $combined->filter(function ($item) use ($dateStart, $dateEnd) {
                    $itemDate = Carbon::parse($item->date_created);
                    return $itemDate->between($dateStart, $dateEnd);
                });
            }
            $combined = $combined->sortBy('date_created')->values()->toArray();
            return response()->json(data: [
                'data' => $combined,
                'filters' => $filters,
            ]);
        }
        return false;
    }


    // Search filter trang edit
    public function searchDetailGuest(Request $request)
    {
        $data = $request->all();
        $filters = [];
        if (isset($data['chungtu']) && $data['chungtu'] !== null) {
            $filters[] = ['value' => 'Số chứng từ: ' . $data['chungtu'], 'name' => 'chungtu', 'icon' => 'po'];
        }
        if (isset($data['ctvbanhang']) && $data['ctvbanhang'] !== null) {
            $filters[] = ['value' => 'CTV bán hàng: ' . $data['ctvbanhang'], 'name' => 'ctvbanhang', 'icon' => 'user'];
        }
        if (isset($data['mahang']) && $data['mahang'] !== null) {
            $filters[] = ['value' => 'Mã hàng: ' . $data['mahang'], 'name' => 'mahang', 'icon' => 'barcode'];
        }
        if (isset($data['tenhang']) && $data['tenhang'] !== null) {
            $filters[] = ['value' => 'Tên hàng: ' . $data['tenhang'], 'name' => 'tenhang', 'icon' => 'box'];
        }
        if (isset($data['dvt']) && $data['dvt'] !== null) {
            $filters[] = ['value' => 'ĐVT: ' . $data['dvt'], 'name' => 'dvt', 'icon' => 'balance-scale'];
        }
        if (isset($data['slban']) && $data['slban'][1] !== null) {
            $filters[] = ['value' => 'Số lượng bán: ' . $data['slban'][0] . ' ' . $data['slban'][1], 'name' => 'slban', 'icon' => 'cart'];
        }
        if (isset($data['dongia']) && $data['dongia'][1] !== null) {
            $filters[] = ['value' => 'Đơn giá: ' . $data['dongia'][0] . ' ' . $data['dongia'][1], 'name' => 'dongia', 'icon' => 'dollar-sign'];
        }
        if (isset($data['thanhtien']) && $data['thanhtien'][1] !== null) {
            $filters[] = ['value' => 'Thành tiền: ' . $data['thanhtien'][0] . ' ' . $data['thanhtien'][1], 'name' => 'thanhtien', 'icon' => 'money-bill'];
        }
        if ($request->ajax()) {
            $productDelivered = $this->quoteE->sumProductsQuoteByGuest($data['data'], $data);
            return response()->json([
                'data' => $productDelivered,
                'filters' => $filters,
            ]);
        }
        return false;
    }
    public function getDebtGuest(Request $request)
    {
        if ($request->dataName == "guest") {
            $getGuestbyId = $this->guest->getGuestbyId($request->guest_id)->first();
        }
        if ($request->dataName == "provide") {
            $getGuestbyId = Provides::where('id', $request->guest_id)->first();
        }
        return response()->json($getGuestbyId);
    }
}
