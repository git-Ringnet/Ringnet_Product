<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\QuoteExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuoteExportController extends Controller
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
