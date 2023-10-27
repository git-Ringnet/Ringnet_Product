<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\QuoteExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailExportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $quoteExport;
    private $guest;

    public function __construct()
    {
        $this->quoteExport = new QuoteExport();
        $this->guest = new Guest();
    }
    public function index()
    {
        $title = "Báo giá";
        $quoteExport = $this->quoteExport->getAllQuoteExport();
        return view('tables.export.quote.list-quote', compact('title', 'quoteExport'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Tạo báo giá";
        $guest = $this->guest->getAllGuest();
        return view('tables.export.quote.create-quote', compact('title', 'guest'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    //Tìm kiếm khách hàng
    public function searchGuest(Request $request)
    {
        $data = $request->all();
        $guest = Guest::where('id', $data['idGuest'])->first();
        return $guest;
    }
    //Thêm khách hàng
    public function addGuest(Request $request)
    {
        $check = Guest::where('guest_code', $request->guest_code)->first();
        if ($check == null) {
            $data = [
                'guest_name_display' => $request->guest_name_display,
                'guest_name' => $request->guest_name,
                'guest_address' => $request->guest_address,
                'guest_code' => $request->guest_code,
                'guest_email' => $request->guest_email,
                'guest_phone' => $request->guest_phone,
                'guest_receiver' => $request->guest_receiver,
                'guest_email_personal' => $request->guest_email_personal,
                'guest_phone_receiver' => $request->guest_phone_receiver,
                'guest_debt' => 0,
                'guest_note' => $request->guest_note,
            ];
            $new_guest = DB::table('guest')->insertGetId($data);
            $msg = response()->json(['success' => true, 'msg' => 'Thêm mới khách hàng thành công', 'id' => $new_guest, 'name' => $request->guest_name]);
        } else {
            $msg = response()->json(['success' => false, 'msg' => 'Mã số thuế đã tồn tại']);
        }
        return $msg;
    }
}
