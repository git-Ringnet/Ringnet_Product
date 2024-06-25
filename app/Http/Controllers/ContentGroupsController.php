<?php

namespace App\Http\Controllers;

use App\Models\CashReceipt;
use App\Models\ContentGroups;
use App\Models\PayOder;
use App\Models\Workspace;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ContentGroupsController extends Controller
{
    private $workspaces;
    private $content;

    public function __construct()
    {
        $this->workspaces = new Workspace();
        $this->content = new ContentGroups();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $content = ContentGroups::where('workspace_id', Auth::user()->current_workspace)
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
        $status = $this->content->createContentGroup($request->all());
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        if ($status['status']) {
            return redirect()->route('content.index', $workspacename)->with('msg', 'Thêm mới nội dung thu chi thành công !');
        } else {
            return redirect()->route('content.index', $workspacename)->with('warning', 'Nội dung đã tồn tại !');
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
        $content = ContentGroups::where('id', $id)->first();
        $title = "Chỉnh sửa nội dung thu chi";
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $type = DB::table('contenttype')->get();
        return view('tables.abc.content.editContent', compact('title', 'workspacename', 'content', 'type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $workspace, Request $request, string $id)
    {
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;

        $status = $this->content->updateContentGroup($id, $request->all());
        if ($status['status']) {
            return redirect()->route('content.index', $workspacename)->with('msg', 'Chỉnh sửa nội dung thu chi thành công !');
        } else {
            return redirect()->route('content.index', $workspacename)->with('warning', 'Nội dung thu chi đã tồn tại !');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $workspace, string $id)
    {
        $content = ContentGroups::find($id);
        if (!$content) {
            return back()->with('warning', 'Không tìm thấy nội dung để xoá.');
        }
        $hasRelatedData = CashReceipt::where('content_id', $id)->exists() || PayOder::where('content_pay', $id)->exists();
        if ($hasRelatedData) {
            return back()->with('warning', 'Không thể xoá vì có dữ liệu liên quan.');
        }
        $status = $this->content->deleteContentGroup($id);
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace)->workspace_name;
        if ($status['status']) {
            return redirect()->route('content.index', $workspacename)->with('msg', 'Xóa nội dung thu chi thành công!');
        } else {
            return redirect()->route('content.index', $workspacename)->with('warning', 'Không tìm thấy nội dung thu chi cần xóa!');
        }
    }
}
