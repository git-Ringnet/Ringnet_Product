<?php

namespace App\Http\Controllers;

use App\Models\ContentImportExport;
use App\Models\Fund;
use App\Models\User;
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
        $userIds = $content->pluck('user_id')->toArray();
        // Truy vấn thông tin người dùng dựa trên user_id
        $users = User::whereIn('id', $userIds)->get();
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        return view('tables.abc.changeFund.index', compact('title', 'users', 'workspacename', 'content'));
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
        $fund = Fund::where('workspace_id', Auth::user()->current_workspace)->get();
        $getQuoteCount = $this->content->getQuoteCount();

        // dd($getQuoteCount);
        return view('tables.abc.changeFund.create', compact('title', 'workspacename', 'type', 'fund', 'getQuoteCount'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->from_fund == $request->to_fund) {
            $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace)->workspace_name;
            return redirect()->back()->with('warning', 'Từ quỹ và Đến quỹ không được giống nhau!');
        }
        $status = $this->content->createContent($request->all());
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace)->workspace_name;

        // Kiểm tra kết quả từ createContent và điều hướng người dùng
        if ($status['status']) {
            return redirect()->route('changeFund.index', $workspacename)->with('msg', 'Thêm phiếu chuyển tiền thành công!');
        } else {
            return redirect()->route('changeFund.index', $workspacename)->with('warning', $status['message']);
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
        $listDetail = ContentImportExport::where('workspace_id', Auth::user()->current_workspace)
            ->orderBy('id', 'desc')
            ->get();
        return view('tables.abc.changeFund.edit', compact('title', 'workspacename', 'content', 'fund', 'listDetail'));
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
    public function search(Request $request)
    {
        $data = $request->all();
        $filters = [];
        if (isset($data['date']) && $data['date'][1] !== null) {
            $date_start = date("d/m/Y", strtotime($data['date'][0]));
            $date_end = date("d/m/Y", strtotime($data['date'][1]));
            $filters[] = ['value' => 'Ngày lập: từ ' . $date_start . ' đến ' . $date_end, 'name' => 'date', 'icon' => 'date'];
        }

        if (isset($data['return_code']) && $data['return_code'] !== null) {
            $filters[] = ['value' => 'Mã phiếu: ' . $data['return_code'], 'name' => 'return_code', 'icon' => 'document'];
        }

        if (isset($data['users']) && $data['users'] !== null) {
            $user = new User();
            $users = $user->getNameUser($data['users']);
            $userstring = implode(', ', $users);
            $filters[] = ['value' => 'Người lập: ' . $userstring, 'name' => 'users', 'icon' => 'user'];
        }
        if (isset($data['amount']) && $data['amount'][1] !== null) {
            $filters[] = ['value' => 'Số tiền: ' . $data['amount'][0] . ' ' . $data['amount'][1], 'name' => 'amount', 'icon' => 'money'];
        }

        if (isset($data['fund_from']) && $data['fund_from'] !== null) {
            $filters[] = ['value' => 'Từ quỹ: ' . $data['fund_from'], 'name' => 'fund_from', 'icon' => 'fund'];
        }

        if (isset($data['fund_to']) && $data['fund_to'] !== null) {
            $filters[] = ['value' => 'Đến quỹ: ' . $data['fund_to'], 'name' => 'fund_to', 'icon' => 'fund'];
        }

        if (isset($data['note']) && $data['note'] !== null) {
            $filters[] = ['value' => 'Ghi chú: ' . $data['note'], 'name' => 'note', 'icon' => 'note'];
        }

        if ($request->ajax()) {
            $content = $this->content->ajax($data);
            return response()->json([
                'data' => $content,
                'filters' => $filters,
            ]);
        }
        return false;
    }
}
