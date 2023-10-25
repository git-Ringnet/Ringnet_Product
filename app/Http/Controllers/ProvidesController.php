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
    public function edit(string $id)
    {
        $provide = Provides::findOrFail($id);
        if ($provide) {
            $title = $provide->provide_name_display;
        }
        return view('tables.provides.editProvides', compact('title', 'provide'));
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
}
