<?php

namespace App\Http\Controllers;

use App\Models\Groups;
use App\Models\Guest;
use App\Models\Products;
use App\Models\Workspace;
use App\Models\userFlow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $groups;
    private $userFlow;
    private $products;

    public function __construct()
    {
        $this->groups = new Groups();
        $this->userFlow = new userFlow();
        $this->products = new Products();
    }
    public function index()
    {
        $title = 'Nhóm đối tượng';
        $groups = $this->groups->getAll();
        return view('tables.groups.index', compact('title', 'groups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Thêm mới nhóm đối tượng";
        $products = $this->groups->getAllProducts();
        return view('tables.groups.create', compact('title', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $result = $this->groups->addGroup($request->all());
        if ($result == true) {
            $msg = redirect()->back()->with('warning', 'Nhóm sản phẩm đã tồn tại');
        } else {
            $arrCapNhatKH = [
                'name' => 'SP',
                'des' => 'Lưu nhóm sản phẩm'
            ];
            $this->userFlow->addUserFlow($arrCapNhatKH);
            $msg = redirect()->route('groups.index')->with('msg', 'Thêm mới nhóm sản phẩm thành công');
        }
        return $msg;
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $title = "Xem nhóm sản phẩm";
        $group = Groups::find($id);
        $products = $this->products->getAllProducts();
        return view('tables.groups.show', compact('title', 'group', 'products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $title = "Sửa nhóm sản phẩm";
        $group = Groups::find($id);
        $products = $this->groups->getAllProductsExist($id);
        return view('tables.groups.edit', compact('title', 'group', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $updatGroup = $this->groups->updateGroup($request->all(), $id);
        if ($updatGroup == true) {
            $msg = redirect()->back()->with('warning', 'Nhóm sản phẩm đã tồn tại');
        } else {
            $arrCapNhatKH = [
                'name' => 'SP',
                'des' => 'Cập nhật nhóm sản phẩm'
            ];
            $this->userFlow->addUserFlow($arrCapNhatKH);
            $msg = redirect()->route('groups.index')->with('msg', 'Cập nhật nhóm sản phẩm thành công');
        }
        return $msg;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $group = Groups::find($id);
        if (!$group) {
            return back()->with('warning', 'Không tìm nhóm sản phẩm để xóa');
        }
        $check = Products::where('group_id', $id)->get();
        if ($check) {
            return back()->with('warning', 'Xóa thất bại do nhóm sản phẩm có sản phẩm!');
        }
        $group->delete();
        $arrCapNhatKH = [
            'name' => 'SP',
            'des' => 'Xóa nhóm sản phẩm'
        ];
        $this->userFlow->addUserFlow($arrCapNhatKH);
        return back()->with('msg', 'Xóa nhóm sản phẩm thành công');
    }
}
