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
        $contentGroups = ContentGroups::where('workspace_id', Auth::user()->current_workspace)
            ->leftJoin('contenttype', 'contenttype.id', 'contentgroups.contenttype_id')
            ->select('contentgroups.*', 'contenttype.name as nameType')
            ->orderBy('id', 'desc')
            ->get()
            ->groupBy('contenttype_id');
        // dd($contentGroups);
        $title = "Nội dung thu chi";
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        return view('tables.abc.content.content', compact('title', 'workspacename', 'contentGroups', 'content'));
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
    public function show(string $workspace, string $id)
    {
        $content = ContentGroups::where('id', $id)->first();
        $title = "Xem nội dung thu chi";
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $type = DB::table('contenttype')->get();
        $contentChi = ContentGroups::where('pay_order.content_pay', $id)
            ->leftJoin('pay_order', 'pay_order.content_pay', 'contentgroups.id')
            ->leftJoin('funds', 'pay_order.fund_id', 'funds.id')
            ->select('contentgroups.*', 'pay_order.*', 'funds.name as tenQuy', 'pay_order.id as id')
            ->get()->map(function ($item) {
                $item->source_id = 'pay_order';
                return $item;
            });
        $contentThu = ContentGroups::where('cash_receipts.content_id', $id)
            ->leftJoin('cash_receipts', 'cash_receipts.content_id', 'contentgroups.id')
            ->leftJoin('funds', 'cash_receipts.fund_id', 'funds.id')
            ->select('contentgroups.*', 'cash_receipts.*', 'cash_receipts.id as id', 'funds.name as tenQuy')
            ->get()->map(function ($item) {
                $item->source_id = 'cash_receipts';
                return $item;
            });
        return view('tables.abc.content.showContent', compact('title', 'workspacename', 'content', 'type', 'contentChi', 'contentThu'));
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
    public function search(Request $request)
    {
        $data = $request->all();
        $filters = [];

        if ($request->ajax()) {
            // Truy vấn nội dung các nhóm
            $contentGroups = $this->content->ajax($data);
            // Trả về phản hồi JSON
            return response()->json([
                'data' => $contentGroups,
                'filters' => $filters,
            ]);
        }
        return false;
    }
    public function searchDetailContent(Request $request)
    {
        $data = $request->all();
        $filters = [];

        if (isset($data['ma']) && $data['ma'] !== null) {
            $filters[] = ['value' => 'Mã phiếu: ' . $data['ma'], 'name' => 'ma', 'icon' => 'document'];
        }

        if (isset($data['noidung']) && $data['noidung'] !== null) {
            $filters[] = ['value' => 'Nội dung: ' . $data['noidung'], 'name' => 'noidung', 'icon' => 'description'];
        }

        if (isset($data['total'][0]) && isset($data['total'][1])) {
            $filters[] = ['value' => 'Số tiền: ' . $data['total'][0] . $data['total'][1], 'name' => 'total', 'icon' => 'money'];
        }

        if (isset($data['quy']) && $data['quy'] !== null) {
            $filters[] = ['value' => 'Quỹ: ' . $data['quy'], 'name' => 'quy', 'icon' => 'fund'];
        }

        if (isset($data['ghichu']) && $data['ghichu'] !== null) {
            $filters[] = ['value' => 'Ghi chú: ' . $data['ghichu'], 'name' => 'ghichu', 'icon' => 'note'];
        }
        if ($request->ajax()) {
            // Truy vấn nội dung các nhóm
            $contentGroups = $this->content->ajaxDetailContent($data);
            // Trả về phản hồi JSON
            return response()->json([
                'data' => $contentGroups,
                'filters' => $filters,
            ]);
        }
        return false;
    }
}
