<div>
    <section>
        <div class="modal fade" id="provideModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document" style="max-width: 20%; margin-top:4%;">
                <div class="modal-content">
                    <div class="modal-body pb-0 px-2 pt-0">
                        <div class="content-info">
                            <div class="mt-2">
                                <p class="p-0 m-0 px-2 text-nav">
                                    Tên hiển thị
                                </p>
                                <input name="provide_name_display" type="text" placeholder="Nhập thông tin"
                                    class="border w-100 py-1 border-left-0 border-right-0 px-2 border-top-0 text-nav"
                                    id="guest_name_display" autocomplete="off">
                            </div>
                            <div class="mt-2">
                                <p class="p-0 m-0 px-2 text-nav">
                                    Mã số thuế
                                </p>
                                <input name="provide_code" type="text" placeholder="Nhập thông tin"
                                    class="border w-100 py-1 border-left-0 border-right-0 px-2 border-top-0 text-nav"
                                    id="guest_name_display" autocomplete="off" oninput="validateNumberInput(this)">
                            </div>
                            <div class="mt-2">
                                <p class="p-0 m-0 px-2 text-nav">
                                    Địa chỉ
                                </p>
                                <input name="provide_address" type="text" placeholder="Nhập thông tin"
                                    class="border w-100 py-1 border-left-0 border-right-0 px-2 border-top-0 text-nav"
                                    autocomplete="off">
                            </div>
                            <div class="mt-2">
                                <p class="p-0 m-0 px-2 text-nav">
                                    Tên viết tắt
                                </p>
                                <input name="key" type="text" placeholder="Nhập thông tin"
                                    class="border w-100 py-1 border-left-0 border-right-0 px-2 border-top-0 text-nav"
                                    autocomplete="off" id="getKeyProvide">
                            </div>
                            <div class="mt-2">
                                <p class="p-0 m-0 px-2 text-nav">
                                    Tên đầy đủ
                                </p>
                                <input name="provide_name" type="text" placeholder="Nhập thông tin"
                                    class="border w-100 py-1 border-left-0 border-right-0 px-2 border-top-0 text-nav"
                                    autocomplete="off">
                            </div>
                            <div class="mt-2">
                                <p class="p-0 m-0 px-2 text-nav">
                                    Người đại diện
                                </p>
                                <input name="provide_represent" type="text" placeholder="Nhập thông tin"
                                    class="border w-100 py-1 border-left-0 border-right-0 px-2 border-top-0 text-nav"
                                    autocomplete="off">
                            </div>
                            <div class="mt-2">
                                <p class="p-0 m-0 px-2 text-nav">
                                    Email
                                </p>
                                <input name="provide_email" type="text" placeholder="Nhập thông tin"
                                    class="border w-100 py-1 border-left-0 border-right-0 px-2 border-top-0 text-nav"
                                    autocomplete="off">
                            </div>
                            <div class="mt-2">
                                <p class="p-0 m-0 px-2 text-nav">
                                    Số điện thoại
                                </p>
                                <input name="provide_phone" type="text" placeholder="Nhập thông tin"
                                    class="border w-100 py-1 border-left-0 border-right-0 px-2 border-top-0 text-nav"
                                    autocomplete="off">
                            </div>
                            <div class="mt-2">
                                <p class="p-0 m-0 px-2 text-nav">
                                    Địa chỉ nhận hàng
                                </p>
                                <input name="provide_address_delivery" type="text" placeholder="Nhập thông tin"
                                    class="border w-100 py-1 border-left-0 border-right-0 px-2 border-top-0 text-nav"
                                    autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-top-0 py-1 px-1">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Trở về</button>
                        <button type="button" class="btn btn-primary" id="addProvide">Thêm khách hàng</button>
                    </div>
                </div>
                {{-- <div class="modal-body pb-0 px-2 pt-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Thêm mới nhà cung cấp</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="form-name" class="col-form-label">Tên hiển thị</label>
                            <input id="getKeyProvide" type="text" class="form-control" name="provide_name_display"
                                placeholder="Nhập thông tin">
                        </div>
                        <div class="form-group">
                            <label for="form-name" class="col-form-label">Mã số thuế</label>
                            <input id="getKeyProvide" type="text" class="form-control" name="provide_code"
                                oninput="validateNumberInput(this)" autocomplete="off" placeholder="Nhập thông tin">
                        </div>
                        <div class="form-group">
                            <label for="form-name" class="col-form-label">Địa chỉ</label>
                            <input id="getKeyProvide" type="text" class="form-control" name="provide_address"
                                autocomplete="off" placeholder="Nhập thông tin">
                        </div>
                        <div class="form-group">
                            <label for="form-name" class="col-form-label">Tên viết tắt</label>
                            <input id="getKeyProvide" type="text" class="form-control" name="key"
                                autocomplete="off" placeholder="Nhập thông tin">
                        </div>
                        <div class="form-group">
                            <label for="form-name" class="col-form-label">Tên đầy đủ</label>
                            <input id="getKeyProvide" type="text" class="form-control" name="provide_name"
                                autocomplete="off" placeholder="Nhập thông tin">
                        </div>
                        <div class="form-group">
                            <label for="form-name" class="col-form-label">Người đại diện</label>
                            <input id="getKeyProvide" type="text" class="form-control" name="provide_represent"
                                autocomplete="off" placeholder="Nhập thông tin">
                        </div>
                        <div class="form-group">
                            <label for="form-name" class="col-form-label">Email</label>
                            <input id="getKeyProvide" type="text" class="form-control" name="provide_email"
                                autocomplete="off" placeholder="Nhập thông tin">
                        </div>
                        <div class="form-group">
                            <label for="form-name" class="col-form-label">Số điện thoại</label>
                            <input id="getKeyProvide" type="text" class="form-control" name="provide_phone"
                                autocomplete="off" placeholder="Nhập thông tin">
                        </div>
                        <div class="form-group">
                            <label for="form-name" class="col-form-label">Địa chỉ nhận hàng</label>
                            <input id="getKeyProvide" type="text" class="form-control"
                                name="provide_address_delivery" autocomplete="off" placeholder="Nhập thông tin">
                        </div>

                    </div>

                </div> --}}
            </div>
        </div>
    </section>
</div>
