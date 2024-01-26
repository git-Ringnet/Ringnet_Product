<div>
    <section>
        <div class="modal fade" id="{{ $idModal }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document" style="">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ $title }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @if ($name == 'addRepresent')
                            <div class="form-group">
                                <label for="form-name" class="col-form-label">Người đại diện</label>
                                <input type="text" class="form-control" name="provide_represent_new" value="">
                            </div>
                            <div class="form-group">
                                <label for="form-name" class="col-form-label">Email</label>
                                <input type="text" class="form-control" name="provide_email_new" value="">
                            </div>
                            <div class="form-group">
                                <label for="form-name" class="col-form-label">Số điện thoại</label>
                                <input type="text" class="form-control" name="provide_phone_new" value="">
                            </div>
                            <div class="form-group">
                                <label for="form-name" class="col-form-label">Địa chỉ nhận hàng</label>
                                <input type="text" class="form-control" name="provide_address_delivery_new"
                                    value="">
                            </div>
                        @else
                            <div class="form-group">
                                <label for="form-name" class="col-form-label">Tên biểu mẫu</label>
                                <input type="text" class="form-control" id="form-name-{{ $name }}"
                                    name="form-name-{{ $name }}" value="">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Nội dung</label>
                                <textarea class="form-control" id="form-desc-{{ $name }}" name="form-desc-{{ $name }}"></textarea>
                            </div>
                            <input type="hidden" id="form_field" >
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="button" class="btn btn-primary" id="{{ $name }}">Thêm mới</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
