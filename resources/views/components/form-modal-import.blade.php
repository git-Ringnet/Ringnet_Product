<div>
    <section>
        <div class="modal fade" id="{{ $idModal }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document" style="max-width: 20%; margin-top:10%;">
                <div class="modal-content">
                    {{-- <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ $title }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div> --}}
                    <div class="modal-body pb-0 px-2 pt-0">

                        @if ($name == 'addRepresent')
                            <div class="mt-2">
                                <p class="p-0 m-0 px-2 text-nav">
                                    Người đại diện
                                </p>
                                <input name="provide_represent_new" type="text" placeholder="Nhập thông tin"
                                    class="border w-100 py-1 border-left-0 border-right-0 px-2 border-top-0 text-nav"
                                    autocomplete="off">
                            </div>
                            <div class="mt-2">
                                <p class="p-0 m-0 px-2 text-nav">
                                    Email
                                </p>
                                <input name="provide_email_new" type="text" placeholder="Nhập thông tin"
                                    class="border w-100 py-1 border-left-0 border-right-0 px-2 border-top-0 text-nav"
                                    autocomplete="off">
                            </div>
                            <div class="mt-2">
                                <p class="p-0 m-0 px-2 text-nav">
                                    Số điện thoại
                                </p>
                                <input name="provide_phone_new" type="text" placeholder="Nhập thông tin"
                                    class="border w-100 py-1 border-left-0 border-right-0 px-2 border-top-0 text-nav"
                                    autocomplete="off">
                            </div>
                            <div class="mt-2">
                                <p class="p-0 m-0 px-2 text-nav">
                                    Địa chỉ nhận hàng
                                </p>
                                <input name="provide_address_delivery_new" type="text" placeholder="Nhập thông tin"
                                    class="border w-100 py-1 border-left-0 border-right-0 px-2 border-top-0 text-nav"
                                    autocomplete="off">
                            </div>
                            {{-- <div class="form-group">
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
                            </div> --}}
                        @else
                            <div class="mt-2">
                                <p class="p-0 m-0 px-2 text-nav">
                                    Tên biểu mẫu
                                </p>
                                <input id="form-name-{{ $name }}" name="form-name-{{ $name }}" type="text"
                                    placeholder="Nhập thông tin"
                                    class="border w-100 py-1 border-left-0 border-right-0 px-2 border-top-0 text-nav"
                                    autocomplete="off">
                            </div>
                            <div class="mt-2">
                                <p class="p-0 m-0 px-2 text-nav">
                                    Nội dung
                                </p>
                                <input id="form-desc-{{ $name }}" name="form-desc-{{ $name }}" type="text"
                                    placeholder="Nhập thông tin"
                                    class="border w-100 py-1 border-left-0 border-right-0 px-2 border-top-0 text-nav"
                                    autocomplete="off">
                            </div>

                            {{-- <div class="form-group">
                                <label for="form-name" class="col-form-label">Tên biểu mẫu</label>
                                <input type="text" class="form-control" id="form-name-{{ $name }}"
                                    name="form-name-{{ $name }}" value="">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Nội dung</label>
                                <textarea class="form-control" id="form-desc-{{ $name }}" name="form-desc-{{ $name }}"></textarea>
                            </div> --}}
                            <input type="hidden" id="form_field">
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Trở về</button>
                        <button type="button" class="btn btn-primary" id="{{ $name }}">Thêm mới</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
