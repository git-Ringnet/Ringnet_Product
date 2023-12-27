<?php

namespace App\Http\Controllers;

use App\Models\DetailExport;
use App\Models\Guest;
use App\Models\PayExport;
use App\Models\representGuest;
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
    public function __construct()
    {
        $this->guests = new Guest();
        $this->representGuest = new representGuest();
        $this->detailExport = new DetailExport();
        $this->payExport = new PayExport();
        $this->workspaces = new Workspace();
    }
    public function index(Request $request)
    {
        if (Auth::check()) {
            $title = "Khách hàng";
            $guests = $this->guests->getAllGuest();
            $dataa = $this->guests->getAllGuest();
            //Dư nợ
            $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
            $workspacename = $workspacename->workspace_name;
            foreach ($guests as $guest) {
                $sumDebt = DetailExport::where('guest_id', $guest->id)->where('status', 2)->sum('amount_owed');
                $guest->sumDebt = $sumDebt;
            }
            return view('tables.guests.index', compact('title', 'guests', 'dataa', 'workspacename'));
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
        return view('tables.guests.create', compact('title', 'workspacename'));
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
        return view('tables.guests.show', compact('title', 'guest', 'historyGuest', 'representGuest', 'countDetail', 'sumDebt', 'sumPay', 'sumSell', 'workspacename'));
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

        return view('tables.guests.edit', compact('title', 'guest', 'historyGuest', 'representGuest', 'countDetail', 'sumDebt', 'sumPay', 'dataa', 'workspacename'));
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
        return back()->with('msg', 'Xóa khách hàng thành công');
    }


    public function search(Request $request)
    {
        $data = $request->all();
        $arrGuestName = [];
        $arrCompanyName = [];
        if ($request->ajax()) {
            $output = '';
            $guests = $this->guests->ajax($data);
            if (!empty($request->input('idName'))) {
                $arrGuestName = $this->guests->getGuestbyName($data);
            }
            if (!empty($request->input('idCompany'))) {
                $arrCompanyName = $this->guests->getGuestbyCompany($data);
            }
            if ($guests) {
                foreach ($guests as $key => $product) {
                    $url = route('guests.edit', $product->id);
                    $deleteUrl = route('guests.destroy', $product->id);
                    $output .= '<tr>
                    <td><input type="checkbox"></td>
                    <td>' . $product->guest_name_display . '</td>
                    <td>' . $product->guest_name . '</td>
                    <td>' . $product->guest_email . '</td>
                    <td>' . $product->guest_phone . '</td>
                    <td>' . number_format($product->guest_debt) . '</td>
                    <td>' . '<a href="' . $url . '">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M18.7832 6.79483C18.987 6.71027 19.2056 6.66675 19.4263 6.66675C19.6471 6.66675 19.8656 6.71027 20.0695 6.79483C20.2734 6.87938 20.4586 7.00331 20.6146 7.15952L21.9607 8.50563C22.1169 8.66165 22.2408 8.84693 22.3253 9.05087C22.4099 9.25482 22.4534 9.47342 22.4534 9.69419C22.4534 9.91495 22.4099 10.1336 22.3253 10.3375C22.2408 10.5414 22.1169 10.7267 21.9607 10.8827L20.2809 12.5626C20.2711 12.5736 20.2609 12.5844 20.2503 12.595C20.2397 12.6056 20.2289 12.6158 20.2178 12.6256L11.5607 21.2827C11.4257 21.4177 11.2426 21.4936 11.0516 21.4936H8.34644C7.94881 21.4936 7.62647 21.1712 7.62647 20.7736V18.0684C7.62647 17.8775 7.70233 17.6943 7.83737 17.5593L16.4889 8.9086C16.5003 8.89532 16.5124 8.88235 16.525 8.86973C16.5376 8.8571 16.5506 8.84504 16.5639 8.83354L18.2381 7.15952C18.394 7.00352 18.5795 6.8793 18.7832 6.79483ZM17.0354 10.3984L9.06641 18.3667V20.0536H10.7534L18.7221 12.085L17.0354 10.3984ZM19.7402 11.0668L18.0537 9.38022L19.2572 8.17685C19.2794 8.15461 19.3057 8.13696 19.3348 8.12493C19.3638 8.11289 19.3949 8.10669 19.4263 8.10669C19.4578 8.10669 19.4889 8.11289 19.5179 8.12493C19.5469 8.13697 19.5737 8.15504 19.5959 8.17728L20.9428 9.52411C20.9651 9.5464 20.9831 9.57315 20.9951 9.60228C21.0072 9.63141 21.0134 9.66264 21.0134 9.69419C21.0134 9.72573 21.0072 9.75696 20.9951 9.78609C20.9831 9.81522 20.9651 9.84197 20.9428 9.86426L19.7402 11.0668ZM6.6665 24.6134C6.6665 24.2158 6.98885 23.8935 7.38648 23.8935H24.6658C25.0634 23.8935 25.3858 24.2158 25.3858 24.6134C25.3858 25.0111 25.0634 25.3334 24.6658 25.3334H7.38648C6.98885 25.3334 6.6665 25.0111 6.6665 24.6134Z" fill="#555555"></path>
                        </svg>
                    </a>' . '</td>
                    <td>
                        <form onclick="return confirm(\'Bạn có chắc chắn muốn xóa?\')" action="' . $deleteUrl . '" method="POST" class="d-inline">
                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '
                            <button type="submit" class="btn btn-sm"><svg
                        xmlns="http://www.w3.org/2000/svg" width="32"
                        height="32" viewBox="0 0 32 32" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M14.0606 6.66675C13.6589 6.66675 13.3333 6.99236 13.3333 7.39402C13.3333 7.79568 13.6589 8.12129 14.0606 8.12129H17.9394C18.341 8.12129 18.6667 7.79568 18.6667 7.39402C18.6667 6.99236 18.341 6.66675 17.9394 6.66675H14.0606ZM8 10.3031C8 9.90143 8.32561 9.57582 8.72727 9.57582H10.1818H21.8182H23.2727C23.6744 9.57582 24 9.90143 24 10.3031C24 10.7048 23.6744 11.0304 23.2727 11.0304H22.5455V22.6667C22.5455 24.2819 21.2158 25.5758 19.6179 25.5758H12.3452C11.9637 25.5755 11.5854 25.4997 11.2333 25.3528C10.8812 25.2059 10.5617 24.9908 10.2931 24.7199C10.0244 24.449 9.81206 24.1276 9.66816 23.7743C9.52463 23.4219 9.45204 23.0447 9.45455 22.6642V11.0304H8.72727C8.32561 11.0304 8 10.7048 8 10.3031ZM10.9091 22.6723V11.0304H21.0909V22.6667C21.0909 23.4623 20.4288 24.1213 19.6179 24.1213H12.3458C12.1562 24.1211 11.9684 24.0834 11.7934 24.0104C11.6183 23.9374 11.4595 23.8304 11.3259 23.6958C11.1924 23.5611 11.0868 23.4013 11.0153 23.2257C10.9437 23.05 10.9076 22.8619 10.9091 22.6723ZM17.9394 13.4546C18.3411 13.4546 18.6667 13.7802 18.6667 14.1819V20.9698C18.6667 21.3714 18.3411 21.6971 17.9394 21.6971C17.5377 21.6971 17.2121 21.3714 17.2121 20.9698V14.1819C17.2121 13.7802 17.5377 13.4546 17.9394 13.4546ZM14.7879 14.1819C14.7879 13.7802 14.4623 13.4546 14.0606 13.4546C13.6589 13.4546 13.3333 13.7802 13.3333 14.1819V20.9698C13.3333 21.3714 13.6589 21.6971 14.0606 21.6971C14.4623 21.6971 14.7879 21.3714 14.7879 20.9698V14.1819Z"
                        fill="#555555"></path>
                        </svg></button>
                        </form>
                    </td>
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
