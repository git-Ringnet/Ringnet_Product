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
        <p class="date">Ngày ..... Tháng ..... Năm .....</p>
    </div>
    <div id="products_info">
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
    <div id="cashRC" style="display: none">
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-12 text-center">
                    <p class="mb-4" style="float:right">Số: <b class="quote">41241289471289</b></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <p class="font-weight-bold mb-1 d-inline">Người nộp:</p>
                    <p class="d-inline nameGuest">Cửa hàng Tài Phát 2</p>
                </div>
                <div class="col-md-4">
                    <p class="font-weight-bold mb-1 d-inline">Địa chỉ:</p>
                    <p class="d-inline addr">540 NP Thị Tử, TT Sóc Sơn, Hòn Đất, Kiên Giang</p>
                </div>
                <div class="col-md-4">
                    <p class="font-weight-bold mb-1 d-inline">Số tiền:</p>
                    <p class="d-inline price_export">14,900,000</p>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-4">
                    <p class="font-weight-bold mb-1 d-inline">(Viết bằng chữ):</p>
                    <p class="d-inline price_export_in_words">Mười bốn triệu chín trăm ngàn đồng.</p>
                </div>
                <div class="col-md-4">
                    <p class="font-weight-bold mb-1 d-inline">Lý do:</p>
                    <p class="d-inline myContent">Thu công nợ khách hàng</p>
                </div>
                <div class="col-md-4">
                    <p class="font-weight-bold mb-1 d-inline">Ghi chú:</p>
                    <p class="d-inline note">Thu công nợ Cửa hàng Tài Phát 2</p>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col text-center">
                    <p class="font-weight-bold">Người lập phiếu</p>
                    <p>(Ký, họ tên)</p>
                </div>
                <div class="col text-center">
                    <p class="font-weight-bold">Người nộp tiền</p>
                    <p>(Ký, họ tên)</p>
                </div>
                <div class="col text-center">
                    <p class="font-weight-bold">Người nhận tiền</p>
                    <p>(Ký, họ tên)</p>
                </div>
            </div>

        </div>
    </div>
    <div id="changeFund" style="display: none">
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-12 text-center">
                    <p class="mb-4" style="float:right">Số: <b class="quote">41241289471289</b></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <p class="font-weight-bold mb-1 d-inline">Từ quỹ:</p>
                    <p class="d-inline fund1"></p>
                </div>
                <div class="col-md-4">
                    <p class="font-weight-bold mb-1 d-inline">Đến quỹ:</p>
                    <p class="d-inline fund2"></p>
                </div>
                <div class="col-md-4">
                    <p class="font-weight-bold mb-1 d-inline">Số tiền:</p>
                    <p class="d-inline price">14,900,000</p>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-4">
                    <p class="font-weight-bold mb-1 d-inline">(Viết bằng chữ):</p>
                    <p class="d-inline price_export_in_words">Mười bốn triệu chín trăm ngàn đồng.</p>
                </div>
                <div class="col-md-4">
                    <p class="font-weight-bold mb-1 d-inline">Người lập phiếu:</p>
                    <p class="d-inline name"></p>
                </div>
                <div class="col-md-4">
                    <p class="font-weight-bold mb-1 d-inline">Ghi chú:</p>
                    <p class="d-inline note">Thu công nợ Cửa hàng Tài Phát 2</p>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col text-center">
                    <p class="font-weight-bold">Người lập phiếu</p>
                    <p>(Ký, họ tên)</p>
                </div>
                <div class="col text-center">
                    <p class="font-weight-bold">Người nộp tiền</p>
                    <p>(Ký, họ tên)</p>
                </div>
                <div class="col text-center">
                    <p class="font-weight-bold">Người nhận tiền</p>
                    <p>(Ký, họ tên)</p>
                </div>
            </div>

        </div>
    </div>
</div>
