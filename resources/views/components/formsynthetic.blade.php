<div>
    <div class="content">
        <div class="container-fluided">
            <div class="row position-relative footer-total">
                <div class="col-sm-6"></div>
                <div class="col-sm-6">
                    <div class="mt-4 w-50" style="float: right;">
                        <div class="d-flex justify-content-between">
                            <span><b>Giá trị trước thuế:</b></span>
                            <span id="total-amount-sum">0đ</span>
                        </div>
                        <div class="d-flex justify-content-between mt-2 align-items-center">
                            <span><b>Thuế VAT:</b></span>
                            <span id="product-tax">0đ</span>
                        </div>
                        @if($import != "123")
                        @if($import)
                        <div class="d-flex justify-content-between align-items-center mt-2">
                            <span class="text-primary">Giảm giá:</span>
                            <div class="w-50">
                                <input type="text" class="form-control text-right border-0 p-0" name="discount"
                                    id="voucher" value="{{number_format($import->discount)}}">
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-2">
                            <span class="text-primary">Phí vận chuyển:</span>
                            <div class="w-50">
                                <input type="text" class="form-control text-right border-0 p-0" name="transport_fee"
                                    id="transport_fee" value="{{number_format($import->transfer_fee)}}">
                            </div>
                        </div>
                        @else
                        <div class="d-flex justify-content-between align-items-center mt-2">
                            <span class="text-primary">Giảm giá:</span>
                            <div class="w-50">
                                <input type="text" class="form-control text-right border-0 p-0" name="discount"
                                    id="voucher" value="0">
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-2">
                            <span class="text-primary">Phí vận chuyển:</span>
                            <div class="w-50">
                                <input type="text" class="form-control text-right border-0 p-0" name="transport_fee"
                                    id="transport_fee" value="0">
                            </div>
                        </div>
                        @endif
                        @endif
                        <div class="d-flex justify-content-between mt-2">
                            <span class="text-lg"><b>Tổng cộng:</b></span>
                            <span><b id="grand-total" data-value="0">0đ</b></span>
                            <input type="text" hidden="" name="totalValue" value="0" id="total">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>