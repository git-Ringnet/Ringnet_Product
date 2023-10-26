<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;

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
    public function index()
    {
        $title = "Khách hàng";
        $guests = $this->guests->getAllGuest();
        return view('tables.guests.index', compact('title', 'guests'));
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
}
