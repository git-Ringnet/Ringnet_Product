<?php

namespace App\Http\Controllers;

use App\Models\DetailExport;
use App\Models\Groups;
use App\Models\Guest;
use App\Models\PayExport;
use App\Models\representGuest;
use App\Models\User;
use App\Models\userFlow;
use App\Models\Workspace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
    public function __construct()
    {
        $this->guests = new Guest();
        $this->representGuest = new representGuest();
        $this->detailExport = new DetailExport();
        $this->payExport = new PayExport();
        $this->workspaces = new Workspace();
        $this->userFlow = new userFlow();
        $this->users = new User();
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
        $historyGuest = $this->detailExport->historyGuest($id);
        return view('tables.guests.show', compact('title', 'groups', 'guest', 'historyGuest', 'representGuest', 'countDetail', 'sumDebt', 'sumPay', 'sumSell', 'workspacename'));
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
            'guest_debt' => $request->guest_debt == null ? 0 : $request->guest_debt,
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
        if (isset($data['guest_code']) && $data['guest_code'] !== null) {
            $filters[] = ['value' => 'Mã số thuế: ' . $data['guest_code'], 'name' => 'guest_code', 'icon' => 'po'];
        }
        if (isset($data['guests']) && $data['guests'] !== null) {
            $guest = $this->guests->guestNameById($data['guests']);
            $guestString = implode(', ', $guest);
            $filters[] = ['value' => 'Công ty: ' . count($data['guests']) . ' công ty', 'name' => 'guests', 'icon' => 'user'];
        }
        if (isset($data['users']) && $data['users'] !== null) {
            $users = $this->users->getNameUser($data['users']);
            $userstring = implode(', ', $users);
            $filters[] = ['value' => 'Người tạo: ' . count($data['users']) . ' người tạo', 'name' => 'users', 'icon' => 'user'];
        }
        if (isset($data['debt']) && $data['debt'][1] !== null) {
            $filters[] = ['value' => 'Dư nợ: ' . $data['debt'][0] . ' ' . $data['debt'][1], 'name' => 'debt', 'icon' => 'money'];
        }
        if ($request->ajax()) {
            $guests = $this->guests->ajax($data);
            return response()->json([
                'data' => $guests,
                'filters' => $filters,
            ]);
        }
        return false;
    }

    // Search filter trang edit -.-
    public function searchDetailGuest(Request $request)
    {
        $data = $request->all();
        $arrGuestName = [];
        $arrCompanyName = [];
        if ($request->ajax()) {
            $output = '';
            $guests = $this->detailExport->historyFilterGuest($data);
            if (!empty($request->input('idName'))) {
                $arrGuestName = $this->guests->getGuestbyName($data);
            }
            if (!empty($request->input('idCompany'))) {
                $arrCompanyName = $this->guests->getGuestbyCompany($data);
            }
            if ($guests) {
                foreach ($guests as $key => $itemGuest) {
                    $output .= ' <tr>
                                        <td><input type="checkbox"></td>
                                        <td>' . $itemGuest->created_at . '</td>
                                        <td>' . $itemGuest->quotation_number . '</td>
                                        <td class="text-center">';
                    if ($itemGuest->status === 1) {
                        $output .= '<span class="text-secondary">Draft</span>';
                    } elseif ($itemGuest->status === 2) {
                        $output .= '<span class="text-primary">Approved</span>';
                    } elseif ($itemGuest->status === 3) {
                        $output .= '<span class="text-success">Close</span>';
                    }
                    $output .= '</td><td class="text-center">';
                    if ($itemGuest->status_receive === 1) {
                        $output .= '<svg width="18" height="18" viewBox="0 0 18 18"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M18 9C18 13.9706 13.9706 18 9 18C4.02944 18 0 13.9706 0 9C0 4.02944 4.02944 0 9 0C13.9706 0 18 4.02944 18 9Z"
                                                        fill="#D6D6D6" />
                                                </svg>';
                    } elseif ($itemGuest->status_receive === 3) {
                        $output .= '<svg width="18" height="18" viewBox="0 0 18 18"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M18 9C18 13.9706 13.9706 18 9 18C4.02944 18 0 13.9706 0 9C0 4.02944 4.02944 0 9 0C13.9706 0 18 4.02944 18 9Z"
                                                        fill="#08AA36" />
                                                    <path
                                                        d="M9 -1.90735e-06C10.1819 -1.90735e-06 11.3522 0.23279 12.4442 0.685081C13.5361 1.13737 14.5282 1.80031 15.364 2.63604C16.1997 3.47176 16.8626 4.46392 17.3149 5.55585C17.7672 6.64778 18 7.8181 18 9C18 10.1819 17.7672 11.3522 17.3149 12.4442C16.8626 13.5361 16.1997 14.5282 15.364 15.364C14.5282 16.1997 13.5361 16.8626 12.4442 17.3149C11.3522 17.7672 10.1819 18 9 18L9 9V-1.90735e-06Z"
                                                        fill="#D6D6D6" />
                                                </svg>';
                    } elseif ($itemGuest->status_receive === 2) {
                        $output .= '<svg width="18" height="18" viewBox="0 0 18 18"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M18 9C18 13.9706 13.9706 18 9 18C4.02944 18 0 13.9706 0 9C0 4.02944 4.02944 0 9 0C13.9706 0 18 4.02944 18 9Z"
                                                        fill="#08AA36" />
                                                </svg>';
                    }
                    $output .= ' </td><td class="text-center">
                                            @if ($itemGuest->status_reciept === 1)
                                                <svg width="18" height="18" viewBox="0 0 18 18"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M18 9C18 13.9706 13.9706 18 9 18C4.02944 18 0 13.9706 0 9C0 4.02944 4.02944 0 9 0C13.9706 0 18 4.02944 18 9Z"
                                                        fill="#D6D6D6" />
                                                </svg>
                                            @elseif ($itemGuest->status_reciept === 3)
                                                <svg width="18" height="18" viewBox="0 0 18 18"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M18 9C18 13.9706 13.9706 18 9 18C4.02944 18 0 13.9706 0 9C0 4.02944 4.02944 0 9 0C13.9706 0 18 4.02944 18 9Z"
                                                        fill="#08AA36" />
                                                    <path
                                                        d="M9 -1.90735e-06C10.1819 -1.90735e-06 11.3522 0.23279 12.4442 0.685081C13.5361 1.13737 14.5282 1.80031 15.364 2.63604C16.1997 3.47176 16.8626 4.46392 17.3149 5.55585C17.7672 6.64778 18 7.8181 18 9C18 10.1819 17.7672 11.3522 17.3149 12.4442C16.8626 13.5361 16.1997 14.5282 15.364 15.364C14.5282 16.1997 13.5361 16.8626 12.4442 17.3149C11.3522 17.7672 10.1819 18 9 18L9 9V-1.90735e-06Z"
                                                        fill="#D6D6D6" />
                                                </svg>
                                            @elseif($itemGuest->status_reciept === 2)
                                                <svg width="18" height="18" viewBox="0 0 18 18"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M18 9C18 13.9706 13.9706 18 9 18C4.02944 18 0 13.9706 0 9C0 4.02944 4.02944 0 9 0C13.9706 0 18 4.02944 18 9Z"
                                                        fill="#08AA36" />
                                                </svg>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if ($itemGuest->status_pay === 1)
                                                <svg width="18" height="18" viewBox="0 0 18 18"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M18 9C18 13.9706 13.9706 18 9 18C4.02944 18 0 13.9706 0 9C0 4.02944 4.02944 0 9 0C13.9706 0 18 4.02944 18 9Z"
                                                        fill="#D6D6D6" />
                                                </svg>
                                            @elseif ($itemGuest->status_pay === 3)
                                                <svg width="18" height="18" viewBox="0 0 18 18"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M18 9C18 13.9706 13.9706 18 9 18C4.02944 18 0 13.9706 0 9C0 4.02944 4.02944 0 9 0C13.9706 0 18 4.02944 18 9Z"
                                                        fill="#08AA36" />
                                                    <path
                                                        d="M9 -1.90735e-06C10.1819 -1.90735e-06 11.3522 0.23279 12.4442 0.685081C13.5361 1.13737 14.5282 1.80031 15.364 2.63604C16.1997 3.47176 16.8626 4.46392 17.3149 5.55585C17.7672 6.64778 18 7.8181 18 9C18 10.1819 17.7672 11.3522 17.3149 12.4442C16.8626 13.5361 16.1997 14.5282 15.364 15.364C14.5282 16.1997 13.5361 16.8626 12.4442 17.3149C11.3522 17.7672 10.1819 18 9 18L9 9V-1.90735e-06Z"
                                                        fill="#D6D6D6" />
                                                </svg>
                                            @elseif($itemGuest->status_pay === 2)
                                                <svg width="18" height="18" viewBox="0 0 18 18"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M18 9C18 13.9706 13.9706 18 9 18C4.02944 18 0 13.9706 0 9C0 4.02944 4.02944 0 9 0C13.9706 0 18 4.02944 18 9Z"
                                                        fill="#08AA36" />
                                                </svg>
                                            @endif
                                        </td>
                                        <td>{{ number_format($itemGuest->total_price + $itemGuest->total_tax) }}</td>
                                        <td>{{ number_format($itemGuest->amount_owed) }}</td>
                                    </tr>';
                }
            }
            return [
                'output' => $output,
                'company' => $arrCompanyName,
                'name' => $arrGuestName,
                'email' => $request->email,
                'phone' => $request->phone,
                'debt' => [$request->input('debt'), $request->input('debt_op')],
            ];
        }
    }
}
