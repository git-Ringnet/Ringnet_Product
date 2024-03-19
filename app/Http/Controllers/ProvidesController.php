<?php

namespace App\Http\Controllers;

use App\Models\DetailImport;
use App\Models\ProvideRepesent;
use App\Models\Provides;
use App\Models\Workspace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProvidesController extends Controller
{
    private $provides;
    private $repesent;
    private $workspaces;
    public function __construct()
    {
        $this->provides = new Provides();
        $this->repesent = new ProvideRepesent();
        $this->workspaces = new Workspace();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Nhà cung cấp";
        $provides = $this->provides->getAllProvide();
        $dataa = $this->provides->getAllProvide();
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        return view('tables.provides.provides', compact('title', 'provides', 'dataa', 'workspacename'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Thêm mới nhà cung cấp";
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        return view('tables.provides.insertProvides', compact('title', 'workspacename'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $result = $this->provides->addProvide($request->all());
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        if ($result['status'] == true) {
            $msg = redirect()->back()->with('warning', 'Mã số thuế hoặc tên hiển thị đã tồn tại');
        } else {
            // Thêm mới người đại diện
            $this->repesent->addRePesent($request->all(), $result['id']);
            $msg = redirect()->route('provides.index', $workspacename)->with('msg', 'Thêm mới nhà cung cấp thành công');
        }
        return $msg;
        // dd($resuilt);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $workspaces, string $id)
    {
        $provide = Provides::findOrFail($id);
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        if ($provide) {
            $title = $provide->provide_name_display;
            $repesent = ProvideRepesent::where('provide_id', $provide->id)->get();
        }
        $getId = $id;
        // $request->session()->put('id', $id);

        return view('tables.provides.showProvides', compact('title', 'provide', 'repesent', 'workspacename'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $workspace, string $id, Request $request)
    {
        $provide = Provides::findOrFail($id);
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        if ($provide) {
            $title = $provide->provide_name_display;
            $repesent = ProvideRepesent::where('provide_id', $provide->id)->get();
        }
        $getId = $id;
        $request->session()->put('id', $id);

        return view('tables.provides.editProvides', compact('title', 'provide', 'repesent', 'workspacename'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $workspace, Request $request, string $id)
    {
        $id = session('id');
        $status =  $this->provides->updateProvide($request->all(), $id);
        session()->forget('id');
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        if ($status) {
            return redirect(route('provides.index', $workspacename))->with('warning', 'Mã số thuế đã tồn tại');
        } else {
            return redirect(route('provides.index', $workspacename))->with('msg', 'Sửa nhà cung cấp thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $workspace, string $id)
    {
        $provides = Provides::find($id);
        $checkDebt = DetailImport::where('provide_id', $provides->id)->first();
        if ($checkDebt) {
            return back()->with('warning', 'Nhà cung cấp đã tồn tại trong đơn mua hàng');
        } else {
            $provides->delete();
            ProvideRepesent::where('provide_id', $id)->delete();
            return back()->with('msg', 'Xóa nhà cung cấp thành công');
        }
    }
    public function search(Request $request)
    {
        $data = $request->all();
        $filters = [];
        if ($request->ajax()) {
            $provide = $this->provides->ajax($data);
            return response()->json([
                'data' => $provide,
                'filters' => $filters,
            ]);
        }
        return false;
    }
    public function checkKeyProvide(Request $request)
    {
        if ($request->status == "add") {
            $check = Provides::where('workspace_id', Auth::user()->current_workspace)
                ->where(function ($query) use ($request) {
                    $query->where('provide_code', $request->provide_code)
                        ->orWhere('provide_name_display', $request->provide_name_display);
                })
                ->first();
            if ($check == null) {
                $checkKey = Provides::where('workspace_id', Auth::user()->current_workspace)
                    ->where('key', $request->key)
                    ->first();
                if ($checkKey) {
                    // Tên viết tắt đã tồn tại, thực hiện logic thay đổi giá trị key
                    $newKey = $request->key;

                    // Kiểm tra xem key mới đã tồn tại chưa
                    $counter = 1;
                    while (Provides::where('workspace_id', Auth::user()->current_workspace)
                        ->where('key', $newKey)
                        ->exists()
                    ) {
                        // Kiểm tra xem key có kết thúc bằng số không
                        if (preg_match('/\d+$/', $newKey)) {
                            // Tăng số đằng sau
                            $newKey = preg_replace_callback('/(\d+)$/', function ($matches) {
                                return ++$matches[1];
                            }, $newKey);
                        } else {
                            // Nếu không có số, thêm số 1 vào sau key
                            $newKey .= '1';
                        }
                    }

                    $msg = response()->json([
                        'success' => false,
                        'msg' => 'Tên viết tắt đã tồn tại!',
                        'key' => $newKey,
                    ]);
                } else {
                    $msg = response()->json([
                        'success' => true,
                    ]);
                }
            } else {
                $msg = response()->json([
                    'success' => false,
                    'msg' => 'Mã số thuế hoặc tên hiển thị đã tồn tại',
                ]);
            }
        } else {
            $data = $request->all();
            $check = DB::table('provides')
                ->where('workspace_id', Auth::user()->current_workspace)
                ->where(function ($query) use ($data) {
                    $query->where('provide_code', $data['provide_code'])
                        ->orWhere('provide_name_display', $data['provide_name_display']);
                })
                ->where('id', '!=', $request->id)
                ->first();

            if ($check) {
                return response()->json(['success' => false, 'msg' => 'Thông tin khách hàng đã tồn tại']);
            } else {
                $provide = Provides::where('id', $request->id)
                    ->where('workspace_id', Auth::user()->current_workspace)
                    ->first();

                if ($provide) {
                    $checkKey = Provides::where('workspace_id', Auth::user()->current_workspace)
                        ->where('id', '!=', $request->id)
                        ->where('key', $data['key'])
                        ->first();

                    if ($checkKey) {
                        // Tên viết tắt đã tồn tại, thực hiện logic thay đổi giá trị key
                        $newKey = $data['key'];

                        // Tăng số đằng sau cho đến khi không còn trùng
                        while (Provides::where('workspace_id', Auth::user()->current_workspace)
                            ->where('key', $newKey)
                            ->exists()
                        ) {
                            // Kiểm tra xem key có kết thúc bằng số không
                            if (preg_match('/\d+$/', $newKey)) {
                                // Tăng số đằng sau
                                $newKey = preg_replace_callback('/(\d+)$/', function ($matches) {
                                    return ++$matches[1];
                                }, $newKey);
                            } else {
                                // Nếu không có số, thêm số 1 vào sau key
                                $newKey .= '1';
                            }
                        }

                        return response()->json([
                            'success' => false,
                            'msg' => 'Tên viết tắt đã tồn tại!',
                            'key' => $newKey,
                        ]);
                    } else {
                        $key = isset($data['key']) ? $data['key'] : $this->generateKey($data['provide_name_display']);
                        $dataProvide = [
                            'provide_code' => $data['provide_code'],
                            'provide_name_display' => $data['provide_name_display'],
                            'key' => $key,
                            'provide_name' => isset($data['provide_name']) ? $data['provide_name'] : "",
                            'provide_address' => $data['provide_address'],
                        ];

                        DB::table('provides')->where('id', $request->id)->update($dataProvide);

                        $msg = response()->json([
                            'success' => true, 'msg' => 'Chỉnh sửa nhà cung cấp thành công', 'provide_id' => $request->id
                        ]);
                    }
                }
            }
        }
        return $msg;
    }
}
