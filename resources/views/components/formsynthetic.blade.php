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
                            <span class="text-13-black">Khuyến mãi:</span>
                            <div class="d-flex align-items-center">
                                <input id="voucher" @if($import != "") value="{{number_format($import->discount)}}" readonly @endif type="text" name="voucher" class="text-right text-13-black border-0 py-1 w-100 height-32 bg-input-guest" placeholder="Nhập số tiền">
                                <span class="percent_discount @if($import != "" && $import->discount_type == 1) d-none @endif">%</span>
                                <select @if($import != "") disabled @endif id="discount_type" name="discount_type" class="border-0 height-32 text-13-blue text-center discount_type bg-input-guest">
                                    <option value="1" @if($import != "" && $import->discount_type == 1) selected @endif>Nhập tiền</option>
                                    <option value="2" @if($import != "" && $import->discount_type == 2) selected @endif>Nhập %</option>
                                </select>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mt-2 align-items-center">
                            <span class="text-13-black">Thuế VAT:</span>
                            <span id="product-tax" class="text-table">0đ</span>
                        </div>
                        {{-- @if($import)
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
                        <div class="d-flex justify-content-between mt-2">
                            <span class="text-13-bold text-lg font-weight-bold">Tổng cộng:</span>
                            <span id="grand-total" data-value="0"  
                                class="text-13-bold text-lg font-weight-bold text-right">
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