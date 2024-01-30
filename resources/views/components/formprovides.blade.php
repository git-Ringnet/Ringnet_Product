<div>
    <section>
        <div class="modal fade" id="provideModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Trở về</button>
                        <button type="button" class="btn btn-primary" id="addProvide">Thêm khách hàng</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
