<x-navbar :title="$title" activeGroup="statistic" activeName="sumBusiness"></x-navbar>
<div class="content-wrapper m-0 min-height--none">
    <div class="content-header-fixed p-0">
        <div class="content__header--inner mt-4">
            <div class="content__heading--left ">
                <span class="ml-4">Báo cáo</span>
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                        fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                            fill="#26273B" fill-opacity="0.8" />
                    </svg>
                </span>
                <span class="font-weight-bold">{{ $title }}</span>
            </div>
            <div class="d-flex content__heading--right">
                <div class="row m-0">
                    {{-- In and export --}}
                    <button class="mx-1 d-flex align-items-center btn-primary rounded"
                        onclick="printContent('printContent', 'hanghoa','foot')">In
                        trang</button>
                    <form id="exportForm" action="{{ route('exportReportBusiness') }}" method="GET"
                        style="display: none;">
                        @csrf
                    </form>

                    <a href="#" class="activity mr-3" data-name1="NCC" data-des="Export excel"
                        onclick="event.preventDefault(); document.getElementById('exportForm').submit();">
                        <button type="button" class="btn btn-outline-secondary mx-1 d-flex align-items-center h-100">
                            <i class="fa-regular fa-file-excel"></i>
                            <span class="m-0 ml-1">Xuất Excel</span>
                        </button>
                    </a>
                </div>
            </div>
        </div>
        <div class="bg-filter-search pl-4">
            <div class="content-wrapper1 py-2">
                <div class="row m-auto filter p-0">
                    <div class="w-100">
                        <div class="row mr-0">
                            <div class="col-md-5 d-flex align-items-center">
                                <form action="" method="get" id="search-filter" class="p-0 m-0">
                                    <div class="position-relative relative  ml-1">
                                        <input type="text" placeholder="Tìm kiếm" name="keywords"
                                            style="outline: none;" class="pr-4 w-100 input-search text-13"
                                            value="{{ request()->keywords }}">
                                        <span id="search-icon" class="search-icon"><i class="fas fa-search"
                                                aria-hidden="true"></i></span>
                                    </div>
                                </form>
                                <div class="dropdown mx-1">
                                    <button class="filter-btn ml-2 align-items-center d-flex border mb-0"
                                        data-toggle="dropdown">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 16 16" fill="none">
                                            <path
                                                d="M12.9548 3H10.0457C9.74445 3 9.50024 3.24421 9.50024 3.54545V6.45455C9.50024 6.75579 9.74445 7 10.0457 7H12.9548C13.256 7 13.5002 6.75579 13.5002 6.45455V3.54545C13.5002 3.24421 13.256 3 12.9548 3Z"
                                                fill="#6D7075" />
                                            <path
                                                d="M6.45455 3H3.54545C3.24421 3 3 3.24421 3 3.54545V6.45455C3 6.75579 3.24421 7 3.54545 7H6.45455C6.75579 7 7 6.75579 7 6.45455V3.54545C7 3.24421 6.75579 3 6.45455 3Z"
                                                fill="#6D7075" />
                                            <path
                                                d="M6.45455 9.50024H3.54545C3.24421 9.50024 3 9.74445 3 10.0457V12.9548C3 13.256 3.24421 13.5002 3.54545 13.5002H6.45455C6.75579 13.5002 7 13.256 7 12.9548V10.0457C7 9.74445 6.75579 9.50024 6.45455 9.50024Z"
                                                fill="#6D7075" />
                                            <path
                                                d="M12.9548 9.50024H10.0457C9.74445 9.50024 9.50024 9.74445 9.50024 10.0457V12.9548C9.50024 13.256 9.74445 13.5002 10.0457 13.5002H12.9548C13.256 13.5002 13.5002 13.256 13.5002 12.9548V10.0457C13.5002 9.74445 13.256 9.50024 12.9548 9.50024Z"
                                                fill="#6D7075" />
                                        </svg>
                                        <span class="text-btnIner mx-1">Bộ lọc</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 16 16" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M4.82078 6.15415C5.02632 5.94862 5.35956 5.94862 5.5651 6.15415L7.99996 8.58901L10.4348 6.15415C10.6404 5.94862 10.9736 5.94862 11.1791 6.15415C11.3847 6.35969 11.3847 6.69294 11.1791 6.89848L8.37212 9.70549C8.16658 9.91103 7.83334 9.91103 7.6278 9.70549L4.82078 6.89848C4.61524 6.69294 4.61524 6.35969 4.82078 6.15415Z"
                                                fill="#26273B" fill-opacity="0.8" />
                                        </svg>
                                    </button>
                                    <div class="dropdown-menu" id="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <div class="search-container px-2">
                                            <input type="text" placeholder="Tìm kiếm" id="myInput" class="text-13"
                                                onkeyup="filterFunction()" style="outline: none;">
                                            <span class="search-icon mr-2">
                                                <i class="fas fa-search"></i>
                                            </span>
                                        </div>
                                        <div class="scrollbar">
                                            <button class="dropdown-item btndropdown text-13-black btn-code"
                                                id="btn-code-import" data-button="code" data-button="import"
                                                type="button">Mã nhà cung cấp
                                            </button>
                                            <button class="dropdown-item btndropdown text-13-black btn-name"
                                                id="btn-name-import" data-button="name" data-button="import"
                                                type="button">Công ty
                                            </button>
                                            <button class="dropdown-item btndropdown text-13-black btn-total"
                                                id="btn-total-import" data-button="import" data-button="total"
                                                type="button">
                                                Tổng thanh toán
                                            </button>
                                            <button class="dropdown-item btndropdown text-13-black" id="btn-date"
                                                data-button="date" type="button">Ngày báo giá
                                            </button>
                                        </div>
                                    </div>
                                    <x-filter-date-time name="date" title="Ngày báo giá" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content" style="margin-top: 14.5rem;">
        <section class="container-fluided">
            <div class="tab-content">
                <div id="buy" class="content tab-pane in active">
                    <div class="row  p-0 m-0">
                        <div class="col-12 p-0 m-0">
                            <div class="tab-content">
                                <div id="hanghoa" class="content tab-pane in active">
                                    <div class="outer-4 top-table table-responsive text-nowrap">
                                        <table id="example2"
                                            class="table table-hover min-w-full border-collapse border border-border">
                                            <thead>
                                                <tr class="">
                                                    <th scope="col" class="border height-52 " style="width: 15%">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="guest_name_display"
                                                                data-sort-type="ASC">
                                                                <button class="btn-sort text-13 bold" type="submit">
                                                                    STT
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-guest_name_display"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="border height-52 " style="width: 15%">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="guest_name_display"
                                                                data-sort-type="ASC">
                                                                <button class="btn-sort text-13 bold" type="submit">
                                                                    Nội dung
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-guest_name_display"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="border height-52 " style="width: 14%">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="guest_name_display"
                                                                data-sort-type="ASC">
                                                                <button class="btn-sort text-13 bold" type="submit">
                                                                    Số tiền
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-guest_name_display"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="border height-52 " style="width: 14%">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="guest_name_display"
                                                                data-sort-type="ASC">
                                                                <button class="btn-sort text-13 bold" type="submit">
                                                                    Đơn vị
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-guest_name_display"></div>
                                                        </span>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Doanh thu và Lợi nhuận -->
                                                <tr>
                                                    <td colspan="4" class="font-bold bg-gray-200 p-2">Doanh thu và
                                                        Lợi nhuận</td>
                                                </tr>
                                                <tr class="hover:bg-muted">
                                                    <td class="border border-border p-2">1</td>
                                                    <td class="border border-border p-2">Doanh số bán hàng</td>
                                                    <td class="border border-border p-2">
                                                        {{ number_format($arrData['allDeliveries']) }}
                                                    </td>
                                                    <td class="border border-border p-2">Đồng</td>
                                                </tr>
                                                <tr class="hover:bg-muted">
                                                    <td class="border border-border p-2">2</td>
                                                    <td class="border border-border p-2">Doanh số khách trả lại</td>
                                                    <td class="border border-border p-2">
                                                        {{ number_format($arrData['trahangkh']) }}
                                                    </td>
                                                    <td class="border border-border p-2">Đồng</td>
                                                </tr>
                                                <tr class="hover:bg-muted">
                                                    <td class="border border-border p-2">3</td>
                                                    <td class="border border-border p-2">Doanh số bán hàng còn lại
                                                        (1-2)</td>
                                                    <td class="border border-border p-2">
                                                        {{ number_format($arrData['allDeliveries'] - $arrData['trahangkh']) }}
                                                    </td>
                                                    <td class="border border-border p-2">Đồng</td>
                                                </tr>
                                                <tr class="hover:bg-muted">
                                                    <td class="border border-border p-2">4</td>
                                                    <td class="border border-border p-2">Tổng giá vốn bán hàng</td>
                                                    <td class="border border-border p-2">
                                                        {{ number_format($arrData['giavon']) }}
                                                    </td>
                                                    <td class="border border-border p-2">Đồng</td>
                                                </tr>
                                                <tr class="hover:bg-muted">
                                                    <td class="border border-border p-2">5</td>
                                                    <td class="border border-border p-2">Tổng lợi nhuận bán hàng (3-4)
                                                    </td>
                                                    <td class="border border-border p-2">
                                                        {{ number_format($arrData['loinhuan']) }}
                                                    </td>
                                                    <td class="border border-border p-2">Đồng</td>
                                                </tr>
                                                <tr class="hover:bg-muted">
                                                    <td class="border border-border p-2">6</td>
                                                    <td class="border border-border p-2">Tỷ suất lợi nhuận bán hàng
                                                        (5*100/1)</td>
                                                    <td class="border border-border p-2">
                                                        {{ number_format($arrData['tysuatloinhuan'], 2) }}
                                                    </td>
                                                    <td class="border border-border p-2">%</td>
                                                </tr>

                                                <tr class="hover:bg-muted">
                                                    <td class="border border-border p-2">5</td>
                                                    <td class="border border-border p-2">Tổng hợp lãi lỗ (5 + 11)</td>
                                                    <td class="border border-border p-2">0</td>
                                                    <td class="border border-border p-2">Đồng</td>
                                                </tr>

                                                <!-- Khoản phải thu và thanh toán của khách hàng -->
                                                <tr>
                                                    <td colspan="4" class="font-bold bg-gray-200 p-2">Khoản phải
                                                        thu và thanh toán của khách hàng</td>
                                                </tr>
                                                <tr class="hover:bg-muted">
                                                    <td class="border border-border p-2">7</td>
                                                    <td class="border border-border p-2">Khách hàng còn nợ</td>
                                                    <td class="border border-border p-2">
                                                        {{ number_format($arrData['totalDebt']) }}</td>
                                                    <td class="border border-border p-2">Đồng</td>
                                                </tr>
                                                <tr class="hover:bg-muted">
                                                    <td class="border border-border p-2">8</td>
                                                    <td class="border border-border p-2">Thực thu tiền bán hàng + khách
                                                        đặt cọc*</td>
                                                    <td class="border border-border p-2">0</td>
                                                    <td class="border border-border p-2">Đồng</td>
                                                </tr>
                                                <tr class="hover:bg-muted">
                                                    <td class="border border-border p-2">9</td>
                                                    <td class="border border-border p-2">Tỷ lệ thu tiền so với doanh số
                                                        *
                                                    </td>
                                                    <td class="border border-border p-2">0</td>
                                                    <td class="border border-border p-2">Đồng</td>
                                                </tr>
                                                <tr class="hover:bg-muted">
                                                    <td class="border border-border p-2">10</td>
                                                    <td class="border border-border p-2">Trả tiền hàng khách trả lại*
                                                    </td>
                                                    <td class="border border-border p-2">0</td>
                                                    <td class="border border-border p-2">Đồng</td>
                                                </tr>

                                                <!-- Khoản thanh toán của nhà cung cấp -->
                                                <tr>
                                                    <td colspan="4" class="font-bold bg-gray-200 p-2">Khoản thanh
                                                        toán của nhà cung cấp</td>
                                                </tr>
                                                <tr class="hover:bg-muted">
                                                    <td class="border border-border p-2">12</td>
                                                    <td class="border border-border p-2">Tổng tiền nhập hàng nhà cung
                                                        cấp</td>
                                                    <td class="border border-border p-2">
                                                        {{ number_format($arrData['tongnhap']) }}</td>
                                                    <td class="border border-border p-2">Đồng</td>
                                                </tr>
                                                <tr class="hover:bg-muted">
                                                    <td class="border border-border p-2">13</td>
                                                    <td class="border border-border p-2">Trả tiền mua hàng nhà cung
                                                        cấp*
                                                    </td>
                                                    <td class="border border-border p-2">0</td>
                                                    <td class="border border-border p-2">Đồng</td>
                                                </tr>
                                                <tr class="hover:bg-muted">
                                                    <td class="border border-border p-2">14</td>
                                                    <td class="border border-border p-2">Hàng trả lại nhà cung cấp*
                                                    </td>
                                                    <td class="border border-border p-2">0</td>
                                                    <td class="border border-border p-2">Đồng</td>
                                                </tr>
                                                <tr class="hover:bg-muted">
                                                    <td class="border border-border p-2">15</td>
                                                    <td class="border border-border p-2">Thu lại tiền xuất trả hàng nhà
                                                        cung cấp*</td>
                                                    <td class="border border-border p-2">0</td>
                                                    <td class="border border-border p-2">Đồng</td>
                                                </tr>
                                                <tr class="hover:bg-muted">
                                                    <td class="border border-border p-2">16</td>
                                                    <td class="border border-border p-2">Còn nợ tiền nhà cung cấp</td>
                                                    <td class="border border-border p-2">
                                                        {{ number_format($arrData['totalProvideDebt']) }}</td>
                                                    <td class="border border-border p-2">Đồng</td>
                                                </tr>

                                                <!-- Doanh thu và chi phí khác -->
                                                <tr>
                                                    <td colspan="4" class="font-bold bg-gray-200 p-2">Doanh thu và
                                                        chi phí khác</td>
                                                </tr>
                                                <tr class="hover:bg-muted">
                                                    <td class="border border-border p-2">17</td>
                                                    <td class="border border-border p-2">Tổng doanh thu khác*</td>
                                                    <td class="border border-border p-2">0</td>
                                                    <td class="border border-border p-2">Đồng</td>
                                                </tr>
                                                <tr class="hover:bg-muted">
                                                    <td class="border border-border p-2">18</td>
                                                    <td class="border border-border p-2">Tổng chi phí hàng tháng*</td>
                                                    <td class="border border-border p-2">0</td>
                                                    <td class="border border-border p-2">Đồng</td>
                                                </tr>
                                                <tr class="hover:bg-muted">
                                                    <td class="border border-border p-2">19</td>
                                                    <td class="border border-border p-2">Tổng lợi nhuận khác*</td>
                                                    <td class="border border-border p-2">0</td>
                                                    <td class="border border-border p-2">Đồng</td>
                                                </tr>

                                                <!-- Hoa hồng bán hàng và khuyến mãi -->
                                                <tr>
                                                    <td colspan="4" class="font-bold bg-gray-200 p-2">Hoa hồng bán
                                                        hàng và khuyến mãi</td>
                                                </tr>
                                                <tr class="hover:bg-muted">
                                                    <td class="border border-border p-2">20</td>
                                                    <td class="border border-border p-2">Huê hồng sale</td>
                                                    <td class="border border-border p-2">
                                                        {{ number_format($arrData['hoahongSale']) }}</td>
                                                    <td class="border border-border p-2">Đồng</td>
                                                </tr>
                                                <tr class="hover:bg-muted">
                                                    <td class="border border-border p-2">21</td>
                                                    <td class="border border-border p-2">Chương trình khuyến mãi khách
                                                        hàng</td>
                                                    <td class="border border-border p-2">0</td>
                                                    <td class="border border-border p-2">Đồng</td>
                                                </tr>

                                                <!-- Các tài khoản quỹ -->
                                                <tr>
                                                    <td colspan="4" class="font-bold bg-gray-200 p-2">Các tài khoản
                                                        quỹ</td>
                                                </tr>
                                                @foreach ($funds as $fund)
                                                    <tr class="hover:bg-muted">
                                                        <td class="border border-border p-2">22</td>
                                                        <td class="border border-border p-2">{{ $fund->name }}</td>
                                                        <td class="border border-border p-2">
                                                            {{ number_format($fund->amount) }}</td>
                                                        <td class="border border-border p-2">Đồng</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="w-100 bg-filter-search position-fixed" style="height: 30px;bottom: 10px;left: 0;" id="foot">
        <div class="position-relative">
            <table class="table table-hover position-absolute bg-white border-0">
                <thead>

                </thead>
            </table>

        </div>
    </div>
</div>
<div id="custom-context-menu" class="dropdown-menu"
    style="display: none; background: #ffffff; position: absolute; width:13%;  padding: 3px 10px;  box-shadow: 0 0 10px -3px rgba(0, 0, 0, .3); border: 1px solid #ccc;">
    <a class="dropdown-item text-13-black" href="#" data-option="donhang">Xem đơn hàng</a>
    <a class="dropdown-item text-13-black" href="#" data-option="congno">Xem công nợ</a>
</div>
<x-print-component :contentId="$title" />
<script src="{{ asset('/dist/js/filter.js') }}"></script>
<script>
    //
    $(document).ready(function() {
        var $contextMenu = $("#custom-context-menu");
        var $currentRow;

        $('#example2').on('contextmenu', '.main-row', function(e) {
            e.preventDefault(); // Ngăn chặn menu chuột phải mặc định

            $currentRow = $(this);
            var guestId = $currentRow.data('id');
            $contextMenu.css({
                display: "block",
                left: e.pageX,
                top: e.pageY
            }).data('guest-id', guestId);
        });

        // Ẩn menu tùy chỉnh khi nhấp ra ngoài
        $(document).on("click", function() {
            $contextMenu.hide();
        });

        // Xử lý sự kiện khi người dùng chọn một tùy chọn từ menu
        $contextMenu.on("click", ".dropdown-item", function(e) {
            e.preventDefault();
            var option = $(this).data('option');
            var guestId = $contextMenu.data('guest-id');

            // Tạo URL động với guestId và option
            var url =
                `{{ route('guests.show', ['workspace' => $workspacename, 'guest' => 'GUEST_ID', 'option' => 'OPTION_ID']) }}`
                .replace('GUEST_ID', guestId)
                .replace('OPTION_ID', option);

            // Mở tab mới với URL
            window.open(url, '_blank');

            $contextMenu.hide();
        });
    });
</script>
