<?php

namespace App\Http\Controllers;

use App\Models\DetailExport;
use App\Models\DetailImport;
use App\Models\Groups;
use App\Models\Guest;
use App\Models\QuoteExport;
use App\Models\Role;
use App\Models\User;
use App\Models\Workspace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $workspaces;
    private $quoteE;
    private $detailExport;
    public function __construct()
    {
        $this->workspaces = new Workspace();
        $this->quoteE = new QuoteExport();
        $this->detailExport = new DetailExport();
    }
    public function index()
    {
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $title = 'Nhân viên';
        $users = User::all();
        return view('tables.user.index', compact('users', 'title', 'workspacename'));
    }

    public function create()
    {
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $title = "Thêm mới nhân viên";
        $groups = Groups::where('grouptype_id', 1)->where('workspace_id', Auth::user()->current_workspace)->get();
        $roles = Role::where('id', '!=', 1)->get();
        return view('tables.user.create', compact('title', 'groups', 'workspacename', 'roles'));
    }

    public function store(string $workspace, Request $request)
    {
        // dd($request->all());
        $request->validate([
            'user_code' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:users,email',
            'password' => 'nullable|string|min:6',
            'address' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:15',
        ], [
            'user_code.required' => 'Mã nhân viên là bắt buộc.',
            'user_code.string' => 'Mã nhân viên phải là một chuỗi.',
            'user_code.max' => 'Mã nhân viên không được vượt quá 255 ký tự.',
            'name.required' => 'Tên là bắt buộc.',
            'name.string' => 'Tên phải là một chuỗi.',
            'name.max' => 'Tên không được vượt quá 255 ký tự.',
            'email.required' => 'Email là bắt buộc.',
            'email.email' => 'Email phải là một địa chỉ email hợp lệ.',
            'email.unique' => 'Email này đã tồn tại.',
            'password.nullable' => 'Mật khẩu không bắt buộc.',
            'password.string' => 'Mật khẩu phải là một chuỗi.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
            'address.required' => 'Địa chỉ là bắt buộc.',
            'address.string' => 'Địa chỉ phải là một chuỗi.',
            'address.max' => 'Địa chỉ không được vượt quá 255 ký tự.',
            'phone_number.nullable' => 'Số điện thoại không bắt buộc.',
            'phone_number.string' => 'Số điện thoại phải là một chuỗi.',
            'phone_number.max' => 'Số điện thoại không được vượt quá 15 ký tự.',
        ]);
        User::create([
            'user_code' => $request->user_code,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'address' => $request->address,
            'provider' => 'login',
            'phone_number' => $request->phone_number,
            'roleid' => $request->role_id,
            'group_id' => $request->grouptype_id,
        ]);

        return redirect()->route('users.index', ['workspace' => $workspace])->with('msg', 'Tạo mới người dùng thành công.');
    }

    public function show(string $workspace, string $id)
    {
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $user = User::find($id);
        $title = 'Chi tiết nhân viên ' . $user->name;
        $groups = Groups::where('grouptype_id', 1)->where('workspace_id', Auth::user()->current_workspace)->get();
        $roles = Role::where('id', '!=', 1)->get();

        $productDelivered = $this->quoteE->sumProductsQuote();
        // // Get All đơn
        $allDelivery = $this->detailExport->getSumDetailE();
        $groupGuests = Groups::where('grouptype_id', 2)->where('workspace_id', Auth::user()->current_workspace)->get();
        $guest = Guest::where('workspace_id', Auth::user()->current_workspace)->get();
        //Đơn hàng
        $detailExport = $this->detailExport->getAllDetailExportByUser($id)->map(function ($item) {
            $item->source_id = 'export';
            return $item;
        });
        $detailImport = DetailImport::where('detailimport.workspace_id', Auth::user()->current_workspace)
            ->leftJoin('provides', 'provides.id', 'detailimport.provide_id')
            ->where('detailimport.id_sale', $id)
            ->select('detailimport.*', 'provides.provide_name_display')
            ->orderBy('detailimport.id', 'desc');
        if (Auth::check()) {
            if (Auth::user()->getRoleUser->roleid == 4) {
                $detailImport->where('user_id', Auth::user()->id);
            }
        }
        $detailImport = $detailImport->get()->map(function ($item) {
            $item->source_id = 'import';
            return $item;
        });;

        return view('tables.user.show', compact(
            'title',
            'groups',
            'user',
            'workspacename',
            'title',
            'roles',
            'groupGuests',
            'guest',
            'productDelivered',
            'allDelivery',
            'detailExport',
            'detailImport'
        ));
    }

    public function edit(string $workspace, string $id)
    {
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $user = User::find($id);
        $title = 'Chỉnh sửa nhân viên ' . $user->name;
        $groups = Groups::where('grouptype_id', 1)->where('workspace_id', Auth::user()->current_workspace)->get();
        $roles = Role::where('id', '!=', 1)->get();

        return view('tables.user.edit', compact('title', 'groups', 'user', 'workspacename', 'title', 'roles'));
    }

    public function update(string $workspace, Request $request, string $id)
    {
        // Validate incoming data
        $request->validate([
            'user_code' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:6',
            'address' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:15',
        ], [
            'user_code.required' => 'Mã nhân viên là bắt buộc.',
            'user_code.string' => 'Mã nhân viên phải là một chuỗi.',
            'user_code.max' => 'Mã nhân viên không được vượt quá 255 ký tự.',
            'name.required' => 'Tên là bắt buộc.',
            'name.string' => 'Tên phải là một chuỗi.',
            'name.max' => 'Tên không được vượt quá 255 ký tự.',
            'email.required' => 'Email là bắt buộc.',
            'email.email' => 'Email phải là một địa chỉ email hợp lệ.',
            'email.unique' => 'Email này đã tồn tại.',
            'password.nullable' => 'Mật khẩu không bắt buộc.',
            'password.string' => 'Mật khẩu phải là một chuỗi.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
            'address.required' => 'Địa chỉ là bắt buộc.',
            'address.string' => 'Địa chỉ phải là một chuỗi.',
            'address.max' => 'Địa chỉ không được vượt quá 255 ký tự.',
            'phone_number.nullable' => 'Số điện thoại không bắt buộc.',
            'phone_number.string' => 'Số điện thoại phải là một chuỗi.',
            'phone_number.max' => 'Số điện thoại không được vượt quá 15 ký tự.',
        ]);
        // Find the user by ID
        $user = User::findOrFail($id);
        // Update user information
        $userData = [
            'user_code' => $request->user_code,
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'provider' => 'login',
            'phone_number' => $request->phone_number,
            'role_id' => $request->role_id,
            'group_id' => $request->grouptype_id,
        ];

        // Check if password is provided and update accordingly
        if (!empty($request->password)) {
            $userData['password'] = bcrypt($request->password);
        }

        $user->update($userData);

        // Redirect back with success message
        return redirect()->route('users.index', ['workspace' => $workspace])->with('msg', 'Cập nhật nhân viên thành công!');
    }

    public function destroy(string $workspace, $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index', ['workspace' => $workspace])->with('msg', 'Xóa nhân viên thành công!');
    }
    public function search(Request $request)
    {
        $data = $request->all();
        $filters = [];
        if (isset($data['code']) && $data['code'] !== null) {
            $filters[] = ['value' => 'Mã: ' . $data['code'], 'name' => 'code', 'icon' => 'code'];
        }

        if (isset($data['name']) && $data['name'] !== null) {
            $filters[] = ['value' => 'Tên: ' . $data['name'], 'name' => 'name', 'icon' => 'name'];
        }

        if (isset($data['address']) && $data['address'] !== null) {
            $filters[] = ['value' => 'Địa chỉ: ' . $data['address'], 'name' => 'address', 'icon' => 'location'];
        }

        if (isset($data['phone']) && $data['phone'] !== null) {
            $filters[] = ['value' => 'Điện thoại: ' . $data['phone'], 'name' => 'phone', 'icon' => 'phone'];
        }

        if (isset($data['email']) && $data['email'] !== null) {
            $filters[] = ['value' => 'Email: ' . $data['email'], 'name' => 'email', 'icon' => 'email'];
        }
        $users = new User();
        if ($request->ajax()) {
            // Truy vấn nội dung các nhóm
            $data = $users->ajax($data);
            // Trả về phản hồi JSON
            return response()->json([
                'data' => $data,
                'filters' => $filters,
            ]);
        }
        return false;
    }
    public function searchDetailUser(Request $request)
    {
        $data = $request->all();
        $filters = [];
        if (isset($data['ma']) && $data['ma'] !== null) {
            $filters[] = ['value' => 'Mã phiếu: ' . $data['ma'], 'name' => 'ma', 'icon' => 'code'];
        }
        $statusText = '';
        if (isset($data['diengiai']) && $data['diengiai'] !== null) {
            $statusValues = [];
            if (in_array(1, $data['diengiai'])) {
                $statusValues[] = '<span style="color: #28a745;">Phiếu bán hàng</span>';
            }
            if (in_array(2, $data['diengiai'])) {
                $statusValues[] = '<span style="color: #007bff;">Phiếu đặt hàng</span>';
            }
            $statusText = implode(', ', $statusValues);
            $filters[] = ['value' => 'Diễn giải: ' . $statusText, 'name' => 'diengiai'];
        }

        if (isset($data['date']) && $data['date'][1] !== null) {
            $date_start = date("d/m/Y", strtotime($data['date'][0]));
            $date_end = date("d/m/Y", strtotime($data['date'][1]));
            $filters[] = ['value' => 'Ngày: từ ' . $date_start . ' đến ' . $date_end, 'name' => 'date', 'icon' => 'date'];
        }
        if (isset($data['khachhang_ncc']) && $data['khachhang_ncc'] !== null) {
            $filters[] = ['value' => 'Khách hàng / NCC: ' . $data['khachhang_ncc'], 'name' => 'khachhang-ncc', 'icon' => 'user'];
        }
        $users = new User();
        if ($request->ajax()) {
            // Truy vấn nội dung các nhóm
            $data = $users->ajaxDetailUser($data);
            // Trả về phản hồi JSON
            return response()->json([
                'data' => $data,
                'filters' => $filters,
            ]);
        }
        return false;
    }

    public function searchHistoryUser(Request $request)
    {
        $data = $request->all();
        $filters = [];
        if (isset($data['maphieu']) && $data['maphieu'] !== null) {
            $filters[] = ['value' => 'Mã phiếu: ' . $data['maphieu'], 'name' => 'maphieu', 'icon' => 'code'];
        }
        if (isset($data['khachhang']) && $data['khachhang'] !== null) {
            $filters[] = ['value' => 'Khách hàng: ' . $data['khachhang'], 'name' => 'khachhang', 'icon' => 'user'];
        }
        if (isset($data['nhomhang']) && $data['nhomhang'] !== null) {
            $filters[] = ['value' => 'Nhóm hàng: ' . $data['nhomhang'], 'name' => 'nhomhang', 'icon' => 'box'];
        }
        if (isset($data['mahang']) && $data['mahang'] !== null) {
            $filters[] = ['value' => 'Mã hàng: ' . $data['mahang'], 'name' => 'mahang', 'icon' => 'barcode'];
        }
        if (isset($data['tenhang']) && $data['tenhang'] !== null) {
            $filters[] = ['value' => 'Tên hàng: ' . $data['tenhang'], 'name' => 'tenhang', 'icon' => 'tag'];
        }
        if (isset($data['dvt']) && $data['dvt'] !== null) {
            $filters[] = ['value' => 'Đơn vị tính: ' . $data['dvt'], 'name' => 'dvt', 'icon' => 'ruler'];
        }
        if (isset($data['soluong'][0]) && isset($data['soluong'][1])) {
            $filters[] = ['value' => 'Số lượng: ' . $data['soluong'][0] . $data['soluong'][1], 'name' => 'soluong', 'icon' => 'quantity'];
        }
        if (isset($data['dongia'][0]) && isset($data['dongia'][1])) {
            $filters[] = ['value' => 'Đơn giá: ' . $data['dongia'][0] . $data['dongia'][1], 'name' => 'dongia', 'icon' => 'money'];
        }
        if (isset($data['thanhtien'][0]) && isset($data['thanhtien'][1])) {
            $filters[] = ['value' => 'Thành tiền: ' . $data['thanhtien'][0] . $data['thanhtien'][1], 'name' => 'thanhtien', 'icon' => 'money-bill'];
        }
        $users = new User();
        if ($request->ajax()) {
            // Truy vấn nội dung các nhóm
            $data = $users->ajaxHistoryUser($data);
            // Trả về phản hồi JSON
            return response()->json([
                'data' => $data,
                'filters' => $filters,
            ]);
        }
        return false;
    }
}
