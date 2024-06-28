<?php

namespace App\Http\Controllers;

use App\Models\ContentImportExport;
use App\Models\Fund;
use App\Models\Warehouse;
use App\Models\Workspace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ContentImportExportController extends Controller
{
    private $workspaces;
    private $content;
    public function __construct()
    {
        $this->workspaces = new Workspace();
        $this->content = new ContentImportExport();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $content = ContentImportExport::where('workspace_id', Auth::user()->current_workspace)
            ->orderBy('id', 'desc')
            ->get();
        $title = "Chuyển tiền nội bộ";

        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        return view('tables.abc.changeFund.index', compact('title', 'workspacename', 'content'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Thêm mới phiếu chuyển tiền nội bộ";
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $type = DB::table('contenttype')->get();
        // $fund = Fund::all();
        $fund = Fund::where('workspace_id',Auth::user()->current_workspace)->get();


        $getQuoteCount = $this->content->getQuoteCount();

        // dd($getQuoteCount);
        return view('tables.abc.changeFund.create', compact('title', 'workspacename', 'type','fund','getQuoteCount'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $status = $this->content->createContent($request->all());
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        if ($status['status']) {
            return redirect()->route('changeFund.index', $workspacename)->with('msg', 'Thêm mới nội dung thu chi !');
        } else {
            return redirect()->route('changeFund.index', $workspacename)->with('warning', 'Quỹ không đủ tiền !');
        }
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
    public function edit(string $workspace, string $id)
    {
        $content = ContentImportExport::where('id', $id)->first();
        $title = "Chỉnh sửa nội dung thu chi";
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $fund = DB::table('funds')->get();
        return view('tables.abc.changeFund.edit', compact('title', 'workspacename', 'content', 'fund'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $workspace, Request $request, string $id)
    {
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $status = $this->content->updateContent($id, $request->all());

        if ($status['status']) {
            return redirect()->route('changeFund.index', $workspacename)->with('msg', 'Chỉnh sửa nội dung thu chi thành công !');
        } else {
            return redirect()->route('changeFund.index', $workspacename)->with('warning', 'Số tiền trong quỹ mới không đủ !');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $workspace, string $id)
    {
        $status = $this->content->deleteContent($id);
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        if ($status['status']) {
            return redirect()->route('changeFund.index', $workspacename)->with('msg', 'Xóa nội dung thu chi thành công !');
        } else {
            return redirect()->route('changeFund.index', $workspacename)->with('warning', 'Không tìm thấy nội dung thi chi cần xóa !');
        }
    }
}
