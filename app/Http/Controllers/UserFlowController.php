<?php

namespace App\Http\Controllers;

use App\Models\UserFlow;
use Illuminate\Http\Request;

class UserFlowController extends Controller
{
    private $userFlow;

    public function __construct()
    {
        $this->userFlow = new UserFlow();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataImport = ['DMH', 'DNH', 'HDMH', 'TMH', 'NCC'];
        $dataExport = ['BG', 'GH', 'HDBH', 'TT', 'KH'];
        $user_flow_import = $this->userFlow->getAll($dataImport);
        $user_flow_export = $this->userFlow->getAll($dataExport);
        $title = "user";
        // dd($user_flow_import);
        return view('tables.user.userflow', compact('user_flow_export', 'user_flow_import', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(userFlow $userFlow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(userFlow $userFlow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, userFlow $userFlow)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(userFlow $userFlow)
    {
        //
    }
    //Lưu thao tác
    public function addActivity(Request $data)
    {
        $this->userFlow->addUserFlow($data);
    }
}
