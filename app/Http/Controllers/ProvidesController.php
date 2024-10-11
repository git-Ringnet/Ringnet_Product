<?php

namespace App\Http\Controllers;

use App\Models\CashReceipt;
use App\Models\DetailImport;
use App\Models\Groups;
use App\Models\PayOder;
use App\Models\ProvideRepesent;
use App\Models\Provides;
use App\Models\QuoteImport;
use App\Models\User;
use App\Models\Workspace;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProvidesController extends Controller
{
    private $provides;
    private $repesent;
    private $workspaces;
    private $users;
    private $quoteImport;
    private $detailImport;
    public function __construct()
    {
        $this->provides = new Provides();
        $this->repesent = new ProvideRepesent();
        $this->workspaces = new Workspace();
        $this->users = new User();
        $this->quoteImport = new QuoteImport();
        $this->detailImport = new DetailImport();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Nhà cung cấp";
        // $provides = $this->provides->getAllProvide();
        $dataa = $this->provides->getAllProvide();
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $users = $this->provides->getUserInProvides();

        $groups = Groups::where('grouptype_id', 3)
            ->where('workspace_id', Auth::user()->current_workspace)
            ->get();

        $provides = Provides::where('group_id', 0)
            ->where('workspace_id', Auth::user()->current_workspace)
            ->get();
        return view('tables.provides.provides', compact('title', 'users', 'provides', 'dataa', 'workspacename', 'groups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Thêm mới nhà cung cấp";
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $category = Groups::where('grouptype_id', 3)->get();
        return view('tables.provides.insertProvides', compact('title', 'workspacename', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $result = $this->provides->addProvide($request->all());
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        if ($result['status'] == true) {
            $msg = redirect()->back()->with('warning', 'Mã số thuế hoặc tên hiển thị đã tồn tại');
        } else {
            // Thêm mới người đại diện
            $this->repesent->addRePesent($request->all(), $result['id']);

            $dataUserFlow = [
                'user_id' => Auth::user()->id,
                'activity_type' => "NCC",
                'activity_description' => "Tạo mới nhà cung cấp",
                'created_at' => Carbon::now()
            ];

            DB::table('user_flow')->insert($dataUserFlow);
            $msg = redirect()->route('provides.index', $workspacename)->with('msg', 'Thêm mới nhà cung cấp thành công');
        }
        return $msg;
        // dd($resuilt);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $workspaces, string $id)
    {
        $provide = Provides::findOrFail($id);
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        if ($provide) {
            $title = $provide->provide_name_display;
            $repesent = ProvideRepesent::where('provide_id', $provide->id)->get();
        }
        $getId = $id;

        $payOrder = PayOder::where('guest_id', $id)->get()->map(function ($item) {
            $item->source_id = 'history';
            $item->date_created = $item->payment_date;
            return $item;
        });
        $provideDetails = $provide->getAllDetail()->get()->map(function ($item) {
            $item->source_id = 'detail'; // Gán giá trị cho source_id là 'detail'
            $item->date_created = $item->created_at; // Gán giá trị của created_at vào date_created
            return $item;
        });
        $productDelivered = $this->quoteImport->sumProductsQuoteByProvide($id);

        $cash_receipt = CashReceipt::where('provide_id', $id)->get()->map(function ($item) {
            $item->source_id = 'cash_receipt'; // Gán mã định danh cho mảng cash_receipts
            return $item;
        });
        // Get All đơn
        $allDelivery = $this->detailImport->getSumDetailEByProvide($id);
        return view('tables.provides.showProvides', compact(
            'title',
            'provide',
            'repesent',
            'workspacename',
            'productDelivered',
            'allDelivery',
            'payOrder',
            'cash_receipt',
            'provideDetails'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $workspace, string $id, Request $request)
    {
        $provide = Provides::findOrFail($id);
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        if ($provide) {
            $title = $provide->provide_name_display;
            $repesent = ProvideRepesent::where('provide_id', $provide->id)->get();
        }
        $getId = $id;
        $category = Groups::where('grouptype_id', 3)->get();
        $request->session()->put('id', $id);

        return view('tables.provides.editProvides', compact('title', 'provide', 'repesent', 'workspacename', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $workspace, Request $request, string $id)
    {
        $id = session('id');
        $status =  $this->provides->updateProvide($request->all(), $id);
        session()->forget('id');
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        if ($status) {
            return redirect(route('provides.index', $workspacename))->with('warning', 'Mã số thuế đã tồn tại');
        } else {
            $dataUserFlow = [
                'user_id' => Auth::user()->id,
                'activity_type' => "NCC",
                'activity_description' => "Cập nhật nhà cung cấp",
                'created_at' => Carbon::now()
            ];

            DB::table('user_flow')->insert($dataUserFlow);
            return redirect(route('provides.index', $workspacename))->with('msg', 'Sửa nhà cung cấp thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $workspace, string $id)
    {
        $provides = Provides::find($id);
        $checkDebt = DetailImport::where('provide_id', $provides->id)->first();
        if ($checkDebt) {
            return back()->with('warning', 'Nhà cung cấp đã tồn tại trong đơn mua hàng');
        } else {
            $provides->delete();
            $dataUserFlow = [
                'user_id' => Auth::user()->id,
                'activity_type' => "NCC",
                'activity_description' => "Xóa nhà cung cấp",
                'created_at' => Carbon::now()
            ];

            DB::table('user_flow')->insert($dataUserFlow);
            ProvideRepesent::where('provide_id', $id)->delete();
            return back()->with('msg', 'Xóa nhà cung cấp thành công');
        }
    }
    public function search(Request $request)
    {
        $data = $request->all();
        $filters = [];
        if (isset($data['ma']) && $data['ma'] !== null) {
            $filters[] = ['value' => 'Mã: ' . $data['ma'], 'name' => 'ma'];
        }
        if (isset($data['ten']) && $data['ten'] !== null) {
            $filters[] = ['value' => 'Tên: ' . $data['ten'], 'name' => 'ten'];
        }
        if (isset($data['diachi']) && $data['diachi'] !== null) {
            $filters[] = ['value' => 'Địa chỉ: ' . $data['diachi'], 'name' => 'diachi'];
        }
        if (isset($data['phone']) && $data['phone'] !== null) {
            $filters[] = ['value' => 'Điện thoại: ' . $data['phone'], 'name' => 'phone'];
        }
        if (isset($data['email']) && $data['email'] !== null) {
            $filters[] = ['value' => 'Email: ' . $data['email'], 'name' => 'email'];
        }
        if (isset($data['debt']) && $data['debt'][1] !== null) {
            $filters[] = ['value' => 'Công nợ: ' . $data['debt'][0] . ' ' . $data['debt'][1], 'name' => 'debt'];
        }
        if ($request->ajax()) {
            $provide = $this->provides->ajax($data);
            return response()->json([
                'data' => $provide,
                'filters' => $filters,
            ]);
        }
        return false;
    }
    public function checkKeyProvide(Request $request)
    {
        if ($request->status == "add") {
            $check = Provides::where('workspace_id', Auth::user()->current_workspace)
                ->where(function ($query) use ($request) {
                    $query->where('key', $request->key)
                        ->orWhere('provide_name_display', $request->provide_name_display);
                })
                ->first();
            if ($check == null) {
                $checkKey = Provides::where('workspace_id', Auth::user()->current_workspace)
                    ->where('key', $request->key)
                    ->first();
                if ($checkKey) {
                    // Tên viết tắt đã tồn tại, thực hiện logic thay đổi giá trị key
                    $newKey = $request->key;

                    // Kiểm tra xem key mới đã tồn tại chưa
                    $counter = 1;
                    while (Provides::where('workspace_id', Auth::user()->current_workspace)
                        ->where('key', $newKey)
                        ->exists()
                    ) {
                        // Kiểm tra xem key có kết thúc bằng số không
                        if (preg_match('/\d+$/', $newKey)) {
                            // Tăng số đằng sau
                            $newKey = preg_replace_callback('/(\d+)$/', function ($matches) {
                                return ++$matches[1];
                            }, $newKey);
                        } else {
                            // Nếu không có số, thêm số 1 vào sau key
                            $newKey .= '1';
                        }
                    }

                    $msg = response()->json([
                        'success' => false,
                        'msg' => 'Tên viết tắt đã tồn tại!',
                        'key' => $newKey,
                    ]);
                } else {
                    $msg = response()->json([
                        'success' => true,
                    ]);
                }
            } else {
                $msg = response()->json([
                    'success' => false,
                    'msg' => 'Mã hoặc tên hiển thị đã tồn tại',
                ]);
            }
        } else {
            $data = $request->all();
            $check = DB::table('provides')
                ->where('workspace_id', Auth::user()->current_workspace)
                ->where(function ($query) use ($data) {
                    $query->where('key', $data['key'])
                        ->orWhere('provide_name_display', $data['provide_name_display']);
                })
                ->where('id', '!=', $request->id)
                ->first();

            if ($check) {
                return response()->json(['success' => false, 'msg' => 'Thông tin khách hàng đã tồn tại']);
            } else {
                $provide = Provides::where('id', $request->id)
                    ->where('workspace_id', Auth::user()->current_workspace)
                    ->first();

                if ($provide) {
                    $checkKey = Provides::where('workspace_id', Auth::user()->current_workspace)
                        ->where('id', '!=', $request->id)
                        ->where('key', $data['key'])
                        ->first();

                    if ($checkKey) {
                        // Tên viết tắt đã tồn tại, thực hiện logic thay đổi giá trị key
                        $newKey = $data['key'];

                        // Tăng số đằng sau cho đến khi không còn trùng
                        while (Provides::where('workspace_id', Auth::user()->current_workspace)
                            ->where('key', $newKey)
                            ->exists()
                        ) {
                            // Kiểm tra xem key có kết thúc bằng số không
                            if (preg_match('/\d+$/', $newKey)) {
                                // Tăng số đằng sau
                                $newKey = preg_replace_callback('/(\d+)$/', function ($matches) {
                                    return ++$matches[1];
                                }, $newKey);
                            } else {
                                // Nếu không có số, thêm số 1 vào sau key
                                $newKey .= '1';
                            }
                        }

                        return response()->json([
                            'success' => false,
                            'msg' => 'Tên viết tắt đã tồn tại!',
                            'key' => $newKey,
                        ]);
                    } else {
                        $key = isset($data['key']) ? $data['key'] : $this->generateKey($data['provide_name_display']);
                        $dataProvide = [
                            'provide_name_display' => $data['provide_name_display'],
                            'key' => $data['key'],
                            'provide_name' => isset($data['provide_name']) ? $data['provide_name'] : "",
                        ];

                        DB::table('provides')->where('id', $request->id)->update($dataProvide);

                        $msg = response()->json([
                            'success' => true,
                            'msg' => 'Chỉnh sửa nhà cung cấp thành công',
                            'provide_id' => $request->id
                        ]);
                    }
                }
            }
        }
        return $msg;
    }
    public function getDebtProvide(Request $request)
    {
        $getProvidebyId = $this->provides->getGuestbyId($request->provide_id, $request->dataName)->first();
        return response()->json($getProvidebyId);
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
            $payOrder = PayOder::where('guest_id', $data['data'])->get()->map(function ($item) {
                $item->source_id = 'history';
                $item->date_created = $item->payment_date;
                return $item;
            });

            $provide = Provides::findOrFail($data['data']);
            // Thêm trường 'source_id' vào từng phần tử của mảng $cash_receipts
            $provideDetails = $provide->getAllDetail()->get()->map(function ($item) {
                $item->source_id = 'detail'; // Gán giá trị cho source_id là 'detail'
                $item->date_created = $item->created_at; // Gán giá trị của created_at vào date_created
                return $item;
            });
            $combined = $provideDetails->concat($payOrder)->sortBy('date_created');
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
    public function searchDetailProvides(Request $request)
    {
        $data = $request->all();
        $filters = [];
        if (isset($data['chungtu']) && $data['chungtu'] !== null) {
            $filters[] = ['value' => 'Số chứng từ: ' . $data['chungtu'], 'name' => 'chungtu', 'icon' => 'po'];
        }
        if (isset($data['ctvbanhang']) && $data['ctvbanhang'] !== null) {
            $filters[] = ['value' => 'Nhân viên: ' . $data['ctvbanhang'], 'name' => 'ctvbanhang', 'icon' => 'user'];
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
            $productDelivered = $this->quoteImport->sumProductsQuoteByProvide($data['data'], $data);
            return response()->json([
                'data' => $productDelivered,
                'filters' => $filters,
            ]);
        }
        return false;
    }
}
