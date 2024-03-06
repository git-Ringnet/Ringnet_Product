<?php

namespace App\Http\Controllers;

use App\Models\DateForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DateFormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $date_form;
    public function __construct()
    {
        $this->date_form = new DateForm();
    }
    public function index()
    {
        $date_form = $this->date_form->getDateForm();
        return $$date_form;
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
    public function addDateForm(Request $request)
    {
        if ($request->ajax()) {
            $data = [
                'form_field' => $request->name,
                'form_name' => $request->inputName,
                'form_desc' => $request->inputDesc,
                'workspace_id' => Auth::user()->current_workspace,
            ];
            $new_date_form = $this->date_form->createDateForm($data);
            $msg = response()->json([
                'success' => true,
                'msg' => 'Thêm thành công',
                'new_date_form' => $new_date_form,
            ]);
            return $msg;
        }
    }
    public function updateDateForm(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->id;
            $data = [
                'form_field' => $request->name,
                'form_name' => $request->inputName,
                'form_desc' => $request->inputDesc,
            ];
            $new_date_form = $this->date_form->updateDateForm($id, $data);
            $form = DateForm::find($id);
            $msg = response()->json([
                'success' => true,
                'msg' => 'Cập nhật thành công',
                'new_date_form' => $new_date_form,
                'form' => $form,
            ]);
            return $msg;
        }
    }
    public function deleteDateForm(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->id;
            $form = DateForm::find($id)->delete();
            $msg = response()->json([
                'success' => true,
                'msg' => 'Xóa thành công',
                'form' => $form,
            ]);
            return $msg;
        }
    }
    public function setDefault(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->id;
            $form = DateForm::find($id);
            $name = $request->name;

            if ($form->default_form != 1) {
                DateForm::where('form_field', $name)->update(['default_form' => 0])
                    ->where('workspace_id', Auth::user()->current_workspace);
                $form->update(['default_form' => 1]);
                $text = 'Đã cài mặc định';
            } else {
                $form->update(['default_form' => 0]);
                $text = 'Đã bỏ mặc định';
            }
            $update_form = DateForm::where('form_field', $name)
                ->where('workspace_id', Auth::user()->current_workspace)
                ->get();
            $msg = response()->json([
                'id' => $id,
                'success' => true,
                'msg' => $text,
                'form' => $form,
                'update_form' => $update_form,
            ]);
            return $msg;
        }
    }
    public function searchDateForm(Request $request)
    {
        $data = $request->all();
        $dateForm = DateForm::where('id', $data['idDateForm'])->first();
        return $dateForm;
    }
}
