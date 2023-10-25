<?php

namespace App\Http\Controllers;

use App\Models\QuoteExport;
use Illuminate\Http\Request;

class quoteExportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $quoteExport;

    public function __construct()
    {
        $this->quoteExport = new QuoteExport();
    }
    public function index()
    {
        $title = "Báo giá";
        $quoteExport = $this->quoteExport->getAllQuoteExport();
        return view('tables.ban_hang.bao_gia.ds-bao-gia', compact('title', 'quoteExport'));
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
}
