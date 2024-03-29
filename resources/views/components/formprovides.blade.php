<div>
    <section>
        <div class="modal fade" id="provideModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document" style="max-width: 20%; margin-top:4%;">
                <div class="modal-content">
                    <div class="modal-body pb-0 px-2 pt-0">
                        <div class="content-info">
                            <div class="mt-2">
                                <p class="p-0 m-0 px-2 text-nav required-label text-danger">
                                    Tên hiển thị
                                </p>
                                <input name="provide_name_display" type="text" placeholder="Nhập thông tin"
                                    class="border w-100 py-1 border-left-0 border-right-0 px-2 border-top-0 text-nav"
                                    id="getKeyProvide" autocomplete="off">
                            </div>
                            <div class="mt-2">
                                <p class="p-0 m-0 px-2 text-nav required-label text-danger">
                                    Mã số thuế
                                </p>
                                <input name="provide_code" type="text" placeholder="Nhập thông tin"
                                    class="border w-100 py-1 border-left-0 border-right-0 px-2 border-top-0 text-nav"
                                    id="guest_name_display" autocomplete="off" oninput="validateNumberInput(this)">
                            </div>
                            <div class="mt-2">
                                <p class="p-0 m-0 px-2 text-nav required-label text-danger">
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
                                    autocomplete="off" id="">
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
                                <input name="provide_phone" type="number" placeholder="Nhập thông tin"
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
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="clearDataProvide(this)">Trở về</button>
                        <button type="button" class="btn btn-primary" id="addProvide">Thêm nhà cung cấp</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
