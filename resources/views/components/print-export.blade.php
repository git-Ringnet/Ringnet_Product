<div id="printContent" style="display: none;margin-top:100px">
    <div class="info-company">
        <div class="row align-items-center">
            <div class="col-3" style="padding-right:10px;">
                <img height="200px" width="200px" src="{{ asset('dist/img/catanh.png') }}" alt="">
            </div>
            <div class="col">
                <h4 class="p-1 m-0">CÔNG TY CỔ PHẦN NGỌC PHÁT STYLE</h4>
                <p class="p-1 m-0">Địa chỉ: 64/20F Hoà Bình, Phường 5, Quận 11, Thành phố Hồ Chí Minh, Việt Nam</p>
                <p class="p-1 m-0">Địa chỉ chi nhánh: 47/30 Ao Đôi, phường Bình Trị Đông A, quận Bình Tân, TP.HCM</p>
                <p class="p-1 m-0">Điện thoại: 0913919518</p>
            </div>
        </div>
    </div>
    <div class="text-center mt-0">
        <h1 class="title-print"></h1>
        <p>Ngày ..... Tháng ..... Năm .....</p>
    </div>

    <div class="info-guest" style="padding-top:20px;">
        <span>Khách hàng:<p class="guest"></p></span>
        <span>Địa chỉ:<p class="addr"></p></span>
        <span>Điện thoại:<p class="phone"></p></span>
    </div>
    {{ $slot }}
    <table class="table">
        <thead>
            <tr style="height:44px;">
                <th class="border px-2 p-0 text-center" style="">
                    <span class="text-table text-secondary">STT</span>
                </th>
                <th class="border px-2 p-0 text-center" style="z-index:99;">
                    <span class="text-table text-secondary">Tên sản phẩm</span>
                </th>
                <th class="border-right px-2 p-0 text-center" style="">
                    <span class="text-table text-secondary">Đơn vị</span>
                </th>
                <th class="border-right px-2 p-0 text-center" style="">
                    <span class="text-table text-secondary">Số lượng</span>
                </th>
                <th class="border-right px-2 p-0 text-center unitPrice" style="">`
                    <span class="text-table text-secondary">Đơn giá</span>
                </th>
                <th class="border-right px-2 p-0 text-center totalPrice" style="">
                    <span class="text-table text-secondary">Thành tiền</span>
                </th>
                <th class="border-right px-2 p-0 text-center wh" style="">
                    <span class="text-table text-secondary">Kho hàng</span>
                </th>
                <th class="border-right note px-2 p-0 text-center">
                    <span class="text-table text-secondary">Ghi chú</span>
                </th>
            </tr>
        </thead>
        <tbody id="invoiceBody">

        </tbody>
    </table>

</div>
