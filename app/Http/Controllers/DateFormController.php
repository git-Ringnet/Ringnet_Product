<?php

namespace App\Http\Controllers;

use App\Models\DateForm;
use Carbon\Carbon;
use App\Models\userFlow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DateFormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $date_form;
    private $userFlow;
    public function __construct()
    {
        $this->date_form = new DateForm();
        $this->userFlow = new userFlow();
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
                'user_id' => Auth::user()->id,
                'workspace_id' => Auth::user()->current_workspace,
            ];
            $new_date_form = $this->date_form->createDateForm($data);
            if ($request->name == "quote" && $request->update == 1) {
                $arrCapNhatKH = [
                    'name' => 'BG',
                    'des' => 'Thêm hiệu lực báo giá'
                ];
                $this->userFlow->addUserFlow($arrCapNhatKH);
            }
            if ($request->name == "quote" && $request->update == 2) {
                $arrCapNhatKH = [
                    'name' => 'BG',
                    'des' => 'Thêm hiệu lực báo giá ở trang chỉnh sửa'
                ];
                $this->userFlow->addUserFlow($arrCapNhatKH);
            }
            if ($request->name == "payment" && $request->update == 1) {
                $arrCapNhatKH = [
                    'name' => 'BG',
                    'des' => 'Thêm điều khoản'
                ];
                $this->userFlow->addUserFlow($arrCapNhatKH);
            }
            if ($request->name == "payment" && $request->update == 2) {
                $arrCapNhatKH = [
                    'name' => 'BG',
                    'des' => 'Thêm điều khoản ở trang chỉnh sửa'
                ];
                $this->userFlow->addUserFlow($arrCapNhatKH);
            }
            if ($request->name == "goods" && $request->update == 1) {
                $arrCapNhatKH = [
                    'name' => 'BG',
                    'des' => 'Thêm hàng hóa'
                ];
                $this->userFlow->addUserFlow($arrCapNhatKH);
            }
            if ($request->name == "goods" && $request->update == 2) {
                $arrCapNhatKH = [
                    'name' => 'BG',
                    'des' => 'Thêm hàng hóa ở trang chỉnh sửa'
                ];
                $this->userFlow->addUserFlow($arrCapNhatKH);
            }
            if ($request->name == "delivery" && $request->update == 1) {
                $arrCapNhatKH = [
                    'name' => 'BG',
                    'des' => 'Thêm giao hàng'
                ];
                $this->userFlow->addUserFlow($arrCapNhatKH);
            }
            if ($request->name == "delivery" && $request->update == 2) {
                $arrCapNhatKH = [
                    'name' => 'BG',
                    'des' => 'Thêm giao hàng ở trang chỉnh sửa'
                ];
                $this->userFlow->addUserFlow($arrCapNhatKH);
            }
            if ($request->name == "location" && $request->update == 1) {
                $arrCapNhatKH = [
                    'name' => 'BG',
                    'des' => 'Thêm địa điểm'
                ];
                $this->userFlow->addUserFlow($arrCapNhatKH);
            }
            if ($request->name == "location" && $request->update == 2) {
                $arrCapNhatKH = [
                    'name' => 'BG',
                    'des' => 'Thêm địa điểm ở trang chỉnh sửa'
                ];
                $this->userFlow->addUserFlow($arrCapNhatKH);
            }
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
            if ($request->name == "quote" && $request->update == 1) {
                $arrCapNhatKH = [
                    'name' => 'BG',
                    'des' => 'Cập nhật hiệu lực báo giá'
                ];
                $this->userFlow->addUserFlow($arrCapNhatKH);
            }
            if ($request->name == "quote" && $request->update == 2) {
                $arrCapNhatKH = [
                    'name' => 'BG',
                    'des' => 'Cập nhật hiệu lực báo giá ở trang chỉnh sửa'
                ];
                $this->userFlow->addUserFlow($arrCapNhatKH);
            }
            if ($request->name == "payment" && $request->update == 1) {
                $arrCapNhatKH = [
                    'name' => 'BG',
                    'des' => 'Cập nhật điều khoản'
                ];
                $this->userFlow->addUserFlow($arrCapNhatKH);
            }
            if ($request->name == "payment" && $request->update == 2) {
                $arrCapNhatKH = [
                    'name' => 'BG',
                    'des' => 'Cập nhật điều khoản ở trang chỉnh sửa'
                ];
                $this->userFlow->addUserFlow($arrCapNhatKH);
            }
            if ($request->name == "goods" && $request->update == 1) {
                $arrCapNhatKH = [
                    'name' => 'BG',
                    'des' => 'Cập nhật hàng hóa'
                ];
                $this->userFlow->addUserFlow($arrCapNhatKH);
            }
            if ($request->name == "goods" && $request->update == 2) {
                $arrCapNhatKH = [
                    'name' => 'BG',
                    'des' => 'Cập nhật hàng hóa ở trang chỉnh sửa'
                ];
                $this->userFlow->addUserFlow($arrCapNhatKH);
            }
            if ($request->name == "delivery" && $request->update == 1) {
                $arrCapNhatKH = [
                    'name' => 'BG',
                    'des' => 'Cập nhật giao hàng'
                ];
                $this->userFlow->addUserFlow($arrCapNhatKH);
            }
            if ($request->name == "delivery" && $request->update == 2) {
                $arrCapNhatKH = [
                    'name' => 'BG',
                    'des' => 'Cập nhật giao hàng ở trang chỉnh sửa'
                ];
                $this->userFlow->addUserFlow($arrCapNhatKH);
            }
            if ($request->name == "location" && $request->update == 1) {
                $arrCapNhatKH = [
                    'name' => 'BG',
                    'des' => 'Cập nhật địa điểm'
                ];
                $this->userFlow->addUserFlow($arrCapNhatKH);
            }
            if ($request->name == "location" && $request->update == 2) {
                $arrCapNhatKH = [
                    'name' => 'BG',
                    'des' => 'Cập nhật địa điểm ở trang chỉnh sửa'
                ];
                $this->userFlow->addUserFlow($arrCapNhatKH);
            }
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
            $dateForm = DateForm::find($id);
            if ($dateForm->form_field == "quote" && $request->update == 1) {
                $arrCapNhatKH = [
                    'name' => 'BG',
                    'des' => 'Xóa hiệu lực báo giá'
                ];
                $this->userFlow->addUserFlow($arrCapNhatKH);
            }
            if ($dateForm->form_field == "quote" && $request->update == 2) {
                $arrCapNhatKH = [
                    'name' => 'BG',
                    'des' => 'Xóa hiệu lực báo giá ở trang chỉnh sửa'
                ];
                $this->userFlow->addUserFlow($arrCapNhatKH);
            }
            if ($dateForm->form_field == "payment" && $request->update == 1) {
                $arrCapNhatKH = [
                    'name' => 'BG',
                    'des' => 'Xóa điều khoản'
                ];
                $this->userFlow->addUserFlow($arrCapNhatKH);
            }
            if ($dateForm->form_field == "payment" && $request->update == 2) {
                $arrCapNhatKH = [
                    'name' => 'BG',
                    'des' => 'Xóa điều khoản ở trang chỉnh sửa'
                ];
                $this->userFlow->addUserFlow($arrCapNhatKH);
            }
            if ($dateForm->form_field == "goods" && $request->update == 1) {
                $arrCapNhatKH = [
                    'name' => 'BG',
                    'des' => 'Xóa hàng hóa'
                ];
                $this->userFlow->addUserFlow($arrCapNhatKH);
            }
            if ($dateForm->form_field == "goods" && $request->update == 2) {
                $arrCapNhatKH = [
                    'name' => 'BG',
                    'des' => 'Xóa hàng hóa ở trang chỉnh sửa'
                ];
                $this->userFlow->addUserFlow($arrCapNhatKH);
            }
            if ($dateForm->form_field == "delivery" && $request->update == 1) {
                $arrCapNhatKH = [
                    'name' => 'BG',
                    'des' => 'Xóa giao hàng'
                ];
                $this->userFlow->addUserFlow($arrCapNhatKH);
            }
            if ($dateForm->form_field == "delivery" && $request->update == 2) {
                $arrCapNhatKH = [
                    'name' => 'BG',
                    'des' => 'Xóa giao hàng ở trang chỉnh sửa'
                ];
                $this->userFlow->addUserFlow($arrCapNhatKH);
            }
            if ($dateForm->form_field == "location" && $request->update == 1) {
                $arrCapNhatKH = [
                    'name' => 'BG',
                    'des' => 'Xóa địa điểm'
                ];
                $this->userFlow->addUserFlow($arrCapNhatKH);
            }
            if ($dateForm->form_field == "location" && $request->update == 2) {
                $arrCapNhatKH = [
                    'name' => 'BG',
                    'des' => 'Xóa địa điểm ở trang chỉnh sửa'
                ];
                $this->userFlow->addUserFlow($arrCapNhatKH);
            }
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
                DateForm::where('form_field', $name)
                    ->where('date_form.workspace_id', Auth::user()->current_workspace)
                    ->update(['default_form' => 0]);
                $form->update(['default_form' => 1]);
                $text = 'Đã cài mặc định';
                if ($request->name == "quote" && $request->update == 1) {
                    $arrCapNhatKH = [
                        'name' => 'BG',
                        'des' => 'Cài mặc định hiệu lực báo giá'
                    ];
                    $this->userFlow->addUserFlow($arrCapNhatKH);
                }
                if ($request->name == "quote" && $request->update == 2) {
                    $arrCapNhatKH = [
                        'name' => 'BG',
                        'des' => 'Cài mặc định hiệu lực báo giá ở trang chỉnh sửa'
                    ];
                    $this->userFlow->addUserFlow($arrCapNhatKH);
                }
                if ($request->name == "payment" && $request->update == 1) {
                    $arrCapNhatKH = [
                        'name' => 'BG',
                        'des' => 'Cài mặc định điều khoản'
                    ];
                    $this->userFlow->addUserFlow($arrCapNhatKH);
                }
                if ($request->name == "payment" && $request->update == 2) {
                    $arrCapNhatKH = [
                        'name' => 'BG',
                        'des' => 'Cài mặc định điều khoản ở trang chỉnh sửa'
                    ];
                    $this->userFlow->addUserFlow($arrCapNhatKH);
                }
                if ($request->name == "goods" && $request->update == 1) {
                    $arrCapNhatKH = [
                        'name' => 'BG',
                        'des' => 'Cài mặc định hàng hóa'
                    ];
                    $this->userFlow->addUserFlow($arrCapNhatKH);
                }
                if ($request->name == "goods" && $request->update == 2) {
                    $arrCapNhatKH = [
                        'name' => 'BG',
                        'des' => 'Cài mặc định hàng hóa ở trang chỉnh sửa'
                    ];
                    $this->userFlow->addUserFlow($arrCapNhatKH);
                }
                if ($request->name == "delivery" && $request->update == 1) {
                    $arrCapNhatKH = [
                        'name' => 'BG',
                        'des' => 'Cài mặc định giao hàng'
                    ];
                    $this->userFlow->addUserFlow($arrCapNhatKH);
                }
                if ($request->name == "delivery" && $request->update == 2) {
                    $arrCapNhatKH = [
                        'name' => 'BG',
                        'des' => 'Cài mặc định giao hàng ở trang chỉnh sửa'
                    ];
                    $this->userFlow->addUserFlow($arrCapNhatKH);
                }
                if ($request->name == "location" && $request->update == 1) {
                    $arrCapNhatKH = [
                        'name' => 'BG',
                        'des' => 'Cài mặc định địa điểm'
                    ];
                    $this->userFlow->addUserFlow($arrCapNhatKH);
                }
                if ($request->name == "location" && $request->update == 2) {
                    $arrCapNhatKH = [
                        'name' => 'BG',
                        'des' => 'Cài mặc định địa điểm ở trang chỉnh sửa'
                    ];
                    $this->userFlow->addUserFlow($arrCapNhatKH);
                }
            } else {
                $form->update(['default_form' => 0]);
                $text = 'Đã bỏ mặc định';
                if ($request->name == "quote" && $request->update == 1) {
                    $arrCapNhatKH = [
                        'name' => 'BG',
                        'des' => 'Bỏ mặc định hiệu lực báo giá'
                    ];
                    $this->userFlow->addUserFlow($arrCapNhatKH);
                }
                if ($request->name == "quote" && $request->update == 2) {
                    $arrCapNhatKH = [
                        'name' => 'BG',
                        'des' => 'Bỏ mặc định hiệu lực báo giá ở trang chỉnh sửa'
                    ];
                    $this->userFlow->addUserFlow($arrCapNhatKH);
                }
                if ($request->name == "payment" && $request->update == 1) {
                    $arrCapNhatKH = [
                        'name' => 'BG',
                        'des' => 'Bỏ mặc định điều khoản'
                    ];
                    $this->userFlow->addUserFlow($arrCapNhatKH);
                }
                if ($request->name == "payment" && $request->update == 2) {
                    $arrCapNhatKH = [
                        'name' => 'BG',
                        'des' => 'Bỏ mặc định điều khoản ở trang chỉnh sửa'
                    ];
                    $this->userFlow->addUserFlow($arrCapNhatKH);
                }
                if ($request->name == "goods" && $request->update == 1) {
                    $arrCapNhatKH = [
                        'name' => 'BG',
                        'des' => 'Bỏ mặc định hàng hóa'
                    ];
                    $this->userFlow->addUserFlow($arrCapNhatKH);
                }
                if ($request->name == "goods" && $request->update == 2) {
                    $arrCapNhatKH = [
                        'name' => 'BG',
                        'des' => 'Bỏ mặc định hàng hóa ở trang chỉnh sửa'
                    ];
                    $this->userFlow->addUserFlow($arrCapNhatKH);
                }
                if ($request->name == "delivery" && $request->update == 1) {
                    $arrCapNhatKH = [
                        'name' => 'BG',
                        'des' => 'Bỏ mặc định giao hàng'
                    ];
                    $this->userFlow->addUserFlow($arrCapNhatKH);
                }
                if ($request->name == "delivery" && $request->update == 2) {
                    $arrCapNhatKH = [
                        'name' => 'BG',
                        'des' => 'Bỏ mặc định giao hàng ở trang chỉnh sửa'
                    ];
                    $this->userFlow->addUserFlow($arrCapNhatKH);
                }
                if ($request->name == "location" && $request->update == 1) {
                    $arrCapNhatKH = [
                        'name' => 'BG',
                        'des' => 'Bỏ mặc định địa điểm'
                    ];
                    $this->userFlow->addUserFlow($arrCapNhatKH);
                }
                if ($request->name == "location" && $request->update == 2) {
                    $arrCapNhatKH = [
                        'name' => 'BG',
                        'des' => 'Bỏ mặc định địa điểm ở trang chỉnh sửa'
                    ];
                    $this->userFlow->addUserFlow($arrCapNhatKH);
                }
            }
            $update_form = DateForm::where('form_field', $name)
                ->where('date_form.workspace_id', Auth::user()->current_workspace)
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

    public function addUserFlow(Request $request)
    {
        $dataFlow = [
            'user_id' => Auth::user()->id,
            'activity_type' => $request->type,
            'activity_description' => $request->des,
            'created_at' => Carbon::now()
        ];
        $id_Flow = DB::table('user_flow')->insert($dataFlow);
        return $id_Flow;
    }
}
