<?php

namespace App\Http\Controllers;

use App\Models\userFlow;
use Illuminate\Http\Request;

class UserFlowController extends Controller
{
    private $userFlow;
    public function __construct()
    {
        $this->userFlow = new userFlow();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
