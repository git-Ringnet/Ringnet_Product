<div class="">
    <div class="content">
        {{-- <div class="container-fluided"> --}}
        <div class="row" style="width:95%;">
            <div class="position-relative col-lg-4 px-0"></div>
            <div class="position-relative col-lg-5 col-md-7 col-sm-12 margin-left180">
                <div class="m-3 ">
                    <div class="d-flex justify-content-between">
                        <span class="text-13-black">Giá trị trước thuế:</span>
                        <span id="total-amount-sum" class="text-table">0đ</span>
                    </div>
                    <div class="d-flex justify-content-between mt-2 align-items-center">
                        <span class="text-13-black">Thuế VAT:</span>
                        <span id="product-tax" class="text-table">0đ</span>
                    </div>

                    @if ($import != '123')
                        {{-- @if ($import)
                        <div class="d-flex justify-content-between align-items-center mt-2">
                            <span class="text-primary text-table">Giảm giá:</span>
                            <div class="w-50">
                                <input type="text" class="form-control text-right border-0 p-0" name="discount"
                                    id="voucher" value="{{number_format($import->discount)}}">
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-2">
                            <span class="text-primary text-table">Phí vận chuyển:</span>
                            <div class="w-50">
                                <input type="text" class="form-control text-right border-0 p-0" name="transport_fee"
                                    id="transport_fee" value="{{number_format($import->transfer_fee)}}">
                            </div>
                        </div>
                        @else
                        <div class="d-flex justify-content-between align-items-center mt-2">
                            <span class="text-primary text-table">Giảm giá:</span>
                            <div class="w-50">
                                <input type="text" class="form-control text-right border-0 p-0" name="discount"
                                    id="voucher" value="0">
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-2">
                            <span class="text-primary text-table">Phí vận chuyển:</span>
                            <div class="w-50">
                                <input type="text" class="form-control text-right border-0 p-0" name="transport_fee"
                                    id="transport_fee" value="0">
                            </div>
                        </div>
                        @endif --}}
                    @endif
                    @if ($import != '')
                        @php
                            $promotionArray = json_decode($import->promotion, true);
                            $promotionValue = isset($promotionArray['value']) ? $promotionArray['value'] : '';
                            $promotionOption = isset($promotionArray['type']) ? $promotionArray['type'] : '';
                        @endphp
                    @endif
                    <div class="d-flex justify-content-between mt-2 align-items-center">
                        <span class="text-13-black">Khuyến mãi</span>
                        <input name="promotion-total" type="text" class="text-table border-0 text-right"
                            style="background-color:#F0F4FF "
                            @if ($import != '') value="{{ number_format($promotionValue) }}" @endif>
                    </div>
                    <div class="d-flex justify-content-between mt-2 align-items-center">
                        <span class="text-13-black">Hình thức</span>
                        <select name="promotion-option-total" id="" class="border-0 promotion-option-total">
                            <option value="1" @if ($import != '' && $promotionOption == 1) selected @endif>Nhập tiền
                            </option>
                            <option value="2" @if ($import != '' && $promotionOption == 2) selected @endif>Nhập %</option>
                        </select>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <span class="text-13-bold text-lg font-weight-bold">Tổng cộng:</span>
                        <span id="grand-total" data-value="0" class="text-13-bold text-lg font-weight-bold text-right">
                            0đ
                        </span>
                        <input type="text" hidden="" name="totalValue" value="0"id="total">
                    </div>
                </div>
            </div>
        </div>
        {{-- </div> --}}
    </div>
</div>
