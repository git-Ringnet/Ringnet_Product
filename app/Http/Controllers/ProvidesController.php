<?php

namespace App\Http\Controllers;

use App\Models\Provides;
use Illuminate\Http\Request;

class ProvidesController extends Controller
{
    private $provides;
    public function __construct()
    {
        $this->provides = new Provides();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Nhà cung cấp";
        $provides = $this->provides->getAllProvide();
        return view('tables.provides.provides', compact('title', 'provides'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Thêm mới nhà cung cấp";
        return view('tables.provides.insertProvides', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $resuilt = $this->provides->addProvide($request->all());
        if ($resuilt == true) {
            $msg = redirect()->back()->with('msg', 'Mã số thuế đã tồn tại');
        } else {
            $msg = redirect()->route('provides.index')->with('msg', 'Thêm mới nhà cung cấp thành công');
        }
        return $msg;
        // dd($resuilt);
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
        $provide = Provides::findOrFail($id);
        if ($provide) {
            $title = $provide->provide_name_display;
        }
        $getId = $id;
        $request->session()->put('id', $id);
        return view('tables.provides.editProvides', compact('title', 'provide'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $id = session('id');
        $data = [
            'provide_name_display' => $request->provide_name_display,
            'provide_code' => $request->provide_code,
            'provide_name' => $request->provide_name,
            'provide_address' => $request->provide_address,
            'provide_represent' => $request->provide_represent,
            'provide_email' => $request->provide_email,
            'provide_phone' => $request->provide_phone,
            'provide_address_delivery' => $request->provide_address_delivery,
            'provide_debt' => $request->provide_debt,
        ];
        $this->provides->updateProvide($data, $id);
        session()->forget('id');
        return redirect(route('provides.index'))->with('msg', 'Sửa nhà cung cấp thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $provides = Provides::find($id);
        $provides->delete();
        return back()->with('msg', 'Xóa nhà cung cấp thành công');
    }
}
