<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Workspace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkspaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $workspace;

    public function __construct()
    {
        $this->workspace = new Workspace();
    }
    public function index()
    {
        $title = 'Danh sách workspace';
        $workspace = $this->workspace->getAll(Auth::user()->id);
        $getworkspace = Auth::user()->origin_workspace;
        $issetworkspace = false;
        if ($getworkspace != null) {
            $issetworkspace = true;
        }

        // dd($workspace);
        return view('dashboard', compact('title', 'workspace', 'issetworkspace'));
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
