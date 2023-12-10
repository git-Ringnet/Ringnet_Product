<div>
    <section>
        <div class="modal fade" id="provideModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Thêm mới nhà cung cấp</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="content-info">
                            <div class="d-flex ml-2 align-items-center">
                                <div class="title-info py-2 border border-left-0">
                                    <p class="p-0 m-0 px-3 required-label text-danger">
                                        Tên hiển thị
                                    </p>
                                </div>
                                <input id="getKeyProvide" name="provide_name_display" type="text" placeholder="Nhập thông tin"
                                    class="border w-100 py-2 border-left-0 border-right-0 px-3"
                                    autocomplete="off">
                            </div>
                            <div class="d-flex ml-2 align-items-center">
                                <div class="title-info py-2 border border-left-0">
                                    <p class="p-0 m-0 px-3 required-label text-danger">
                                        Mã só thuế
                                    </p>
                                </div>
                                <input name="provide_code" type="text" placeholder="Nhập thông tin"
                                    class="border w-100 py-2 border-left-0 border-right-0 px-3" oninput="validateNumberInput(this)"
                                    autocomplete="off">
                            </div>
                            <div class="d-flex ml-2 align-items-center">
                                <div class="title-info py-2 border border-left-0">
                                    <p class="p-0 m-0 px-3 required-label text-danger">
                                        Địa chỉ
                                    </p>
                                </div>
                                <input name="provide_address" type="text" placeholder="Nhập thông tin"
                                    class="border w-100 py-2 border-left-0 border-right-0 px-3"
                                    autocomplete="off">
                            </div>
                            <div class="d-flex ml-2 align-items-center">
                                <div class="title-info py-2 border border-left-0">
                                    <p class="p-0 m-0 px-3">
                                        Key
                                    </p>
                                </div>
                                <input name="key" type="text" placeholder="Nhập thông tin"
                                    class="border w-100 py-2 border-left-0 border-right-0 px-3"
                                    autocomplete="off">
                            </div>
                            <div class="d-flex ml-2 align-items-center">
                                <div class="title-info py-2 border border-left-0">
                                    <p class="p-0 m-0 px-3">
                                        Tên nhà cung cấp
                                    </p>
                                </div>
                                <input name="provide_name" type="text" placeholder="Nhập thông tin"
                                    class="border w-100 py-2 border-left-0 border-right-0 px-3"
                                    autocomplete="off">
                            </div>
                            <div class="d-flex ml-2 align-items-center">
                                <div class="title-info py-2 border border-left-0">
                                    <p class="p-0 m-0 px-3">
                                        Người đại diện
                                    </p>
                                </div>
                                <input name="provide_represent" type="text" placeholder="Nhập thông tin"
                                    class="border w-100 py-2 border-left-0 border-right-0 px-3"
                                    autocomplete="off">
                            </div>
                            <div class="d-flex ml-2 align-items-center">
                                <div class="title-info py-2 border border-left-0">
                                    <p class="p-0 m-0 px-3">
                                        Email
                                    </p>
                                </div>
                                <input name="provide_email" type="text" placeholder="Nhập thông tin"
                                    class="border w-100 py-2 border-left-0 border-right-0 px-3"
                                    autocomplete="off">
                            </div>
                            <div class="d-flex ml-2 align-items-center">
                                <div class="title-info py-2 border border-left-0">
                                    <p class="p-0 m-0 px-3">
                                        Số điện thoại
                                    </p>
                                </div>
                                <input name="provide_phone" type="text" placeholder="Nhập thông tin"
                                    class="border w-100 py-2 border-left-0 border-right-0 px-3"
                                    autocomplete="off">
                            </div>
                            <div class="d-flex ml-2 align-items-center">
                                <div class="title-info py-2 border border-left-0">
                                    <p class="p-0 m-0 px-3">
                                        Địa chỉ nhận hàng
                                    </p>
                                </div>
                                <input name="provide_address_delivery" type="text"
                                    placeholder="Nhập thông tin"
                                    class="border w-100 py-2 border-left-0 border-right-0 px-3"
                                    autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="button" class="btn btn-primary" id="addProvide">Thêm mới</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>