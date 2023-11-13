<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $guests;
    public function __construct()
    {
        $this->guests = new Guest();
    }
    public function index(Request $request)
    {
        $title = "Khách hàng";
        $guests = $this->guests->getAllGuest();
        $dataa = $this->guests->getAllGuest();
        return view('tables.guests.index', compact('title', 'guests', 'dataa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Thêm mới khách hàng";
        return view('tables.guests.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataguest = [
            'guest_name_display' => $request->guest_name_display,
            'guest_name' => $request->guest_name,
            'guest_address' => $request->guest_address,
            'guest_code' => $request->guest_code,
            'guest_phone' => $request->guest_phone,
            'guest_email' => $request->guest_email,
            'guest_receiver' => $request->guest_receiver,
            'guest_email_personal' => $request->guest_email_personal,
            'guest_phone_receiver' => $request->guest_phone_receiver,
            'guest_debt' => 0,
            'guest_note' => $request->guest_note
        ];
        $result = $this->guests->addGuest($dataguest);
        if ($result == true) {
            $msg = redirect()->back()->with('msg', 'Khách hàng đã tồn tại');
        } else {
            $msg = redirect()->route('guests.index')->with('msg', 'Thêm mới khách hàng thành công');
        }
        return $msg;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, Request $request)
    {
        $guest = Guest::findOrFail($id);
        if ($guest) {
            $title = $guest->guest_name_display;
        }
        $getId = $id;
        $request->session()->put('id', $id);
        return view('tables.guests.edit', compact('title', 'guest'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $id = session('id');
        $data = [
            'guest_name_display' => $request->guest_name_display,
            'guest_name' => $request->guest_name,
            'guest_address' => $request->guest_address,
            'guest_code' => $request->guest_code,
            'guest_phone' => $request->guest_phone,
            'guest_email' => $request->guest_email,
            'guest_receiver' => $request->guest_receiver,
            'guest_email_personal' => $request->guest_email_personal,
            'guest_phone_receiver' => $request->guest_phone_receiver,
            'guest_debt' => 0,
            'guest_note' => $request->guest_note
        ];
        $this->guests->updateProvide($data, $id);
        session()->forget('id');
        return redirect(route('guests.index'))->with('msg', 'Sửa khách hàng thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $guests = Guest::find($id);
        $guests->delete();
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
                    <td>' . $product->guest_debt . '</td>
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
}
