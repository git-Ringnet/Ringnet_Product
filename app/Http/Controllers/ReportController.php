<?php

namespace App\Http\Controllers;
use App\Models\PayExport;
use App\Models\PayOder;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $payExport;
    private $payOrder;

    public function __construct()
    {
        $this->payExport = new PayExport();
        $this->payOrder = new PayOder();
    }
    public function index()
    {
        $title = 'Báo cáo';
        $guests = $this->payExport->guestStatistics();
        $provides = $this->payOrder->provideStatistics();
        dd($guests, $provides);
        return view('report.index', compact('title', 'guests', 'provides'));
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
