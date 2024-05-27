<?php

namespace App\Http\Controllers;

use App\Models\ContentImportExport;
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
        $title = "Kho";
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        return view('tables.abc.content.content', compact('title', 'workspacename', 'content'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Thêm mới nội dung thu chi";
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $type = DB::table('contenttype')->get();
        return view('tables.abc.content.createContent', compact('title', 'workspacename', 'type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->content->createContentGroup($request->all());
        // $status = $this->content->createContent($request->all());
        // $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        // $workspacename = $workspacename->workspace_name;
        // if ($status['status']) {
        //     return redirect()->route('content.index', $workspacename)->with('msg', 'Thêm mới nội dung thu chi !');
        // } else {
        //     return redirect()->route('content.index', $workspacename)->with('msg', 'Quỹ không đủ tiền !');
        // }
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
        $quy = DB::table('quy')->get();
        return view('tables.abc.content.editContent', compact('title', 'workspacename', 'content', 'quy'));
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
            return redirect()->route('content.index', $workspacename)->with('msg', 'Chỉnh sửa nội dung thu chi thành công !');
        } else {
            return redirect()->route('content.index', $workspacename)->with('warning', 'Số tiền trong quỹ mới không đủ !');
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
            return redirect()->route('content.index', $workspacename)->with('msg', 'Xóa nội dung thu chi thành công !');
        } else {
            return redirect()->route('content.index', $workspacename)->with('warning', 'Không tìm thấy nội dung thi chi cần xóa !');
        }
    }
}
