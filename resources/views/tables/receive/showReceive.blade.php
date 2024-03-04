<x-navbar :title="$title" activeGroup="buy" activeName="receive"></x-navbar>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper m-0">
    <!-- Content Header (Page header) -->
    <div class="content-header-fixed p-0 margin-250">
        <div class="content__header--inner margin-left32">
            <div class="content__heading--left">
                <span>Mua hàng</span>
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z" fill="#26273B" fill-opacity="0.8"/>
                    </svg>
                </span>
                <span>Đơn nhận hàng</span>
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z" fill="#26273B" fill-opacity="0.8"/>
                    </svg>
                </span>
                <span>Chi tiết đơn nhận hàng</span>
            </div>

    <section class="content-header p-0">
        <ul class="nav nav-tabs">
            <li class="active mr-2 mb-2"><a data-toggle="tab" href="#info">Thông tin</a></li>
            <li class="mr-2 mb-2"><a data-toggle="tab" href="#history">Lịch sử nhận hàng</a></li>
            <li class="mr-2 mb-2"><a data-toggle="tab" href="#serialnumber">Serial Number</a></li>
        </ul>
    </section>

    <div class="tab-content">
        <div id="info" class="content tab-pane in active">
            <section class="content">
                <div class="container-fluided">
                    <div class="row">
                        <div class="col-12">
                            <div class="info-chung">
                                <div class="content-info">
                                    <div class="d-flex ml-2 align-items-center position-relative">
                                        <div class="title-info py-2 border border-left-0">
                                            <p class="p-0 m-0 px-3 required-label text-danger">Số báo giá</p>
                                        </div>
                                        <input readonly id="search_quotation" type="text"
                                            placeholder="Nhập thông tin" name="quotation_number"
                                            class="border w-100 py-2 border-left-0 border-right-0 px-3 search_quotation"
                                            autocomplete="off" required value="{{ $receive->quotation_number }}">
                                    </div>
                                    <div class="d-flex ml-2 align-items-center">
                                        <div class="title-info py-2 border border-top-0 border-left-0">
                                            <p class="p-0 m-0 px-3">Nhà cung cấp</p>
                                        </div>
                                        <input readonly type="text" id="provide_name" placeholder="Nhập thông tin"
                                            class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3"
                                            value="{{ $receive->getNameProvide->provide_name_display }}">
                                    </div>
                                    <div class="d-flex ml-2 align-items-center">
                                        <div class="title-info py-2 border border-top-0 border-left-0">
                                            <p class="p-0 m-0 px-3">Đơn vị vận chuyển</p>
                                        </div>
                                        <input readonly type="text" placeholder="Nhập thông tin" name="shipping_unit"
                                            class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3"
                                            value="{{ $receive->shipping_unit }}">
                                    </div>
                                    <div class="d-flex ml-2 align-items-center">
                                        <div class="title-info py-2 border border-top-0 border-left-0">
                                            <p class="p-0 m-0 px-3">Phí giao hàng</p>
                                        </div>
                                        <input readonly type="text" placeholder="Nhập thông tin"
                                            name="delivery_charges"
                                            class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3"
                                            value="{{ $receive->delivery_charges }}">
                                    </div>
                                    <div class="d-flex ml-2 align-items-center">
                                        <div class="title-info py-2 border border-top-0 border-left-0">
                                            <p class="p-0 m-0 px-3">Ngày nhận hàng</p>
                                        </div>
                                        <input readonly type="date" placeholder="Nhập thông tin" name="received_date"
                                            class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3"
                                            value="{{ $receive->created_at->toDateString() }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content mt-5">
                <div class="container-fluided">
                    <table class="table table-hover bg-white rounded" id="inputcontent">
                        <thead>
                            <tr>
                                <th class="border-right"><input type="checkbox"> Mã sản phẩm
                                </th>
                                <th class="border-right">Tên sản phẩm</th>
                                <th class="border-right">Đơn vị</th>
                                <th class="border-right" style="width:12%;">Số lượng</th>
                                <th class="border-right">Đơn giá</th>
                                <th class="border-right">Thuế</th>
                                <th class="border-right">Thành tiền</th>
                                <th class="p-0 bg-secondary" style="width:1%;"></th>
                                <th class="border-right">Ghi chú</th>
                                <th class="border-top"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $st = 0; ?>
                            @foreach ($product as $item)
                                <tr class="bg-white">
                                    <td class="border border-left-0 border-top-0 border-bottom-0">
                                        <div
                                            class="d-flex w-100 justify-content-between align-items-center position-relative">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg"> ' +
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M9 3C7.89543 3 7 3.89543 7 5C7 6.10457 7.89543 7 9 7C10.1046 7 11 6.10457 11 5C11 3.89543 10.1046 3 9 3Z"
                                                    fill="#42526E"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M9 10C7.89543 10 7 10.8954 7 12C7 13.1046 7.89543 14 9 14C10.1046 14 11 13.1046 11 12C11 10.8954 10.1046 10 9 10Z"
                                                    fill="#42526E"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M9 17C7.89543 17 7 17.8954 7 19C7 20.1046 7.89543 21 9 21C10.1046 21 11 20.1046 11 19C11 17.8954 10.1046 17 9 17Z"
                                                    fill="#42526E"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M15 3C13.8954 3 13 3.89543 13 5C13 6.10457 13.8954 7 15 7C16.1046 7 17 6.10457 17 5C17 3.89543 16.1046 3 15 3Z"
                                                    fill="#42526E"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M15 10C13.8954 10 13 10.8954 13 12C13 13.1046 13.8954 14 15 14C16.1046 14 17 13.1046 17 12C17 10.8954 16.1046 10 15 10Z"
                                                    fill="#42526E"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M15 17C13.8954 17 13 17.8954 13 19C13 20.1046 13.8954 21 15 21C16.1046 21 17 20.1046 17 19C17 17.8954 16.1046 17 15 17Z"
                                                    fill="#42526E"></path>
                                            </svg>
                                            <input type="checkbox">
                                            <input readonly type="text" name="product_code[]" id=""
                                                class="border-0 px-3 py-2 w-75 searchProduct">
                                            {{ $item->product_code }}
                                        </div>
                                    </td>
                                    <td class="border border-top-0 border-bottom-0 position-relative">
                                        <input type="text" class="searchProductName border-0 px-3 py-2 w-100"
                                            name="product_name[]" value="{{ $item->product_name }}" readonly>
                                    </td>
                                    <td class="border border-top-0 border-bottom-0">{{ $item->product_unit }}</td>
                                    <td class="border border-top-0 border-bottom-0 border-right-0">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <input readonly type="text"
                                                class="border-0 px-3 py-2 w-100 quantity-input" name="product_qty[]"
                                                value="{{ number_format($item->product_qty) }}">
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#exampleModal{{ $st }}"
                                                style="background:transparent; border:none;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                                    viewBox="0 0 32 32" fill="none">
                                                    <rect width="32" height="32" rx="4"
                                                        fill="white">
                                                    </rect>
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M11.9062 10.643C11.9062 10.2092 12.258 9.85742 12.6919 9.85742H24.2189C24.6528 9.85742 25.0045 10.2092 25.0045 10.643C25.0045 11.0769 24.6528 11.4286 24.2189 11.4286H12.6919C12.258 11.4286 11.9062 11.0769 11.9062 10.643Z"
                                                        fill="#0095F6"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M11.9062 16.4707C11.9062 16.0368 12.258 15.6851 12.6919 15.6851H24.2189C24.6528 15.6851 25.0045 16.0368 25.0045 16.4707C25.0045 16.9045 24.6528 17.2563 24.2189 17.2563H12.6919C12.258 17.2563 11.9062 16.9045 11.9062 16.4707Z"
                                                        fill="#0095F6"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M11.9062 22.2978C11.9062 21.8639 12.258 21.5122 12.6919 21.5122H24.2189C24.6528 21.5122 25.0045 21.8639 25.0045 22.2978C25.0045 22.7317 24.6528 23.0834 24.2189 23.0834H12.6919C12.258 23.0834 11.9062 22.7317 11.9062 22.2978Z"
                                                        fill="#0095F6"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M6.6665 10.6431C6.6665 9.91981 7.25282 9.3335 7.97607 9.3335C8.69932 9.3335 9.28563 9.91981 9.28563 10.6431C9.28563 11.3663 8.69932 11.9526 7.97607 11.9526C7.25282 11.9526 6.6665 11.3663 6.6665 10.6431ZM6.6665 16.4705C6.6665 15.7473 7.25282 15.161 7.97607 15.161C8.69932 15.161 9.28563 15.7473 9.28563 16.4705C9.28563 17.1938 8.69932 17.7801 7.97607 17.7801C7.25282 17.7801 6.6665 17.1938 6.6665 16.4705ZM7.97607 20.9884C7.25282 20.9884 6.6665 21.5747 6.6665 22.298C6.6665 23.0212 7.25282 23.6075 7.97607 23.6075C8.69932 23.6075 9.28563 23.0212 9.28563 22.298C9.28563 21.5747 8.69932 20.9884 7.97607 20.9884Z"
                                                        fill="#0095F6"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="border border-top-0 border-bottom-0">
                                        <input type="text" class="border-0 px-3 py-2 w-100 price_export"
                                            name="price_export[]"
                                            value="{{ fmod($item->price_export, 1) > 0 ? number_format($item->price_export, 2, '.', ',') : number_format($item->price_export) }}"
                                            readonly>
                                    </td>
                                    <td>
                                        <input type="text" class="border-0 px-3 py-2 w-100 product_tax"
                                            name="product_tax[]" value="{{ $item->product_tax }}" readonly>
                                    </td>
                                    <td class="border border-top-0 border-bottom-0 border-right-0">
                                        <input type="text" class="border-0 px-3 py-2 w-100 total_price"
                                            name="total_price[]"
                                            value="{{ fmod($item->product_total, 1) > 0 ? number_format($item->product_total, 2, '.', ',') : number_format($item->product_total) }}"
                                            readonly>
                                    </td>
                                    <td class="border border-bottom-0 p-0 bg-secondary"></td>
                                    <td class="border border-top-0 border-bottom-0">
                                        <input type="text" class="border-0 px-3 py-2 w-100" name="product_note[]"
                                            value="{{ $item->product_note }}" readonly>
                                    </td>
                                    <td class="border border-top-0">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M10.5454 5C10.2442 5 9.99999 5.24421 9.99999 5.54545C9.99999 5.8467 10.2442 6.09091 10.5454 6.09091H13.4545C13.7558 6.09091 14 5.8467 14 5.54545C14 5.24421 13.7558 5 13.4545 5H10.5454ZM6 7.72726C6 7.42601 6.24421 7.18181 6.54545 7.18181H7.63637H16.3636H17.4545C17.7558 7.18181 18 7.42601 18 7.72726C18 8.02851 17.7558 8.27272 17.4545 8.27272H16.9091V17C16.9091 18.2113 15.9118 19.1818 14.7135 19.1818H9.25891C8.97278 19.1816 8.68906 19.1247 8.42499 19.0145C8.16092 18.9044 7.92126 18.7431 7.71979 18.5399C7.51833 18.3367 7.35905 18.0957 7.25112 17.8307C7.14347 17.5664 7.08903 17.2834 7.09091 16.9981V8.27272H6.54545C6.24421 8.27272 6 8.02851 6 7.72726ZM8.18182 17.0041V8.27272H15.8182V17C15.8182 17.5966 15.3216 18.0909 14.7135 18.0909H9.25938C9.11713 18.0908 8.97632 18.0625 8.84503 18.0077C8.71375 17.953 8.5946 17.8728 8.49444 17.7718C8.39429 17.6707 8.3151 17.5509 8.26144 17.4192C8.20779 17.2874 8.18074 17.1464 8.18182 17.0041ZM13.4545 10.0909C13.7558 10.0909 14 10.3351 14 10.6364V15.7273C14 16.0285 13.7558 16.2727 13.4545 16.2727C13.1533 16.2727 12.9091 16.0285 12.9091 15.7273V10.6364C12.9091 10.3351 13.1533 10.0909 13.4545 10.0909ZM11.0909 10.6364C11.0909 10.3351 10.8467 10.0909 10.5454 10.0909C10.2442 10.0909 9.99999 10.3351 9.99999 10.6364V15.7273C9.99999 16.0285 10.2442 16.2727 10.5454 16.2727C10.8467 16.2727 11.0909 16.0285 11.0909 15.7273V10.6364Z"
                                                fill="#42526E"></path>
                                        </svg>
                                    </td>
                                </tr>
                                <?php $st++; ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>

            <?php $import = '123'; ?>
            <x-formsynthetic :import="$import"></x-formsynthetic>

        </div>

        <div id="history" class="tab-pane fade">
            <section class="content">
                <div class="container-fluided">
                    <div class="row">
                        <div class="col-12">
                            <div class="row m-auto filter pt-4 pb-4">
                                <form class="w-100" action="" method="get" id="search-filter">
                                    <div class="row mr-0">
                                        <div class="col-md-5 d-flex">
                                            <div class="position-relative" style="width: 55%;">
                                                <input type="text" placeholder="Tìm kiếm" name="keywords"
                                                    class="pr-4 w-100 input-search" value="">
                                                <span id="search-icon" class="search-icon"><i class="fas fa-search"
                                                        aria-hidden="true"></i></span>
                                            </div>
                                            <button class="filter-btn ml-2">Bộ lọc
                                                <svg width="18" height="18" viewBox="0 0 18 18"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M5.42342 6.92342C5.65466 6.69219 6.02956 6.69219 6.26079 6.92342L9 9.66264L11.7392 6.92342C11.9704 6.69219 12.3453 6.69219 12.5766 6.92342C12.8078 7.15466 12.8078 7.52956 12.5766 7.76079L9.41868 10.9187C9.18745 11.1499 8.81255 11.1499 8.58132 10.9187L5.42342 7.76079C5.19219 7.52956 5.19219 7.15466 5.42342 6.92342Z"
                                                        fill="white"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluided">
                    <table class="table table-hover bg-white rounded" id="inputcontent">
                        <thead>
                            <tr>
                                <th><input type="checkbox"></th>
                                <th>Mã nhận hàng</th>
                                <th>Đơn mua hàng</th>
                                <th>Nhà cung cấp</th>
                                <th>Đơn vị vận chuyển</th>
                                <th>Phí nhận hàng</th>
                                <th>Trạng thái</th>
                                <th>Ngày giao</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($history as $htr)
                                <tr class="bg-white">
                                    <td><input type="checkbox"></td>
                                    <td>{{ $htr->id }}</td>
                                    <td>
                                        @if ($htr->getQuotetion->getQuote)
                                            {{ $htr->getQuotetion->getQuote->quotation_number == null ? $htr->getQuotetion->getQuote->id : $htr->getQuotetion->getQuote->quotation_number }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($htr->getQuotetion->getQuote->getProvideName)
                                            {{ $htr->getQuotetion->getQuote->getProvideName->provide_name_display }}
                                        @endif
                                    </td>
                                    <td>{{ $htr->shipping_unit }}</td>
                                    <td>{{ $htr->delivery_charges }}</td>
                                    <td>
                                        @if ($htr->status == 1)
                                            <span style="color: #858585">Chưa giao</span>
                                        @else
                                            <span style="color: #08AA36">Đã giao</span>
                                        @endif
                                    </td>
                                    <td>{{ date_format(new DateTime($htr->created_at), 'd-m-Y') }}</td>
                                    <td><a href="{{ route('historyReceive.edit', $htr->id) }}"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                                viewBox="0 0 32 32" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M18.7832 6.79483C18.987 6.71027 19.2056 6.66675 19.4263 6.66675C19.6471 6.66675 19.8656 6.71027 20.0695 6.79483C20.2734 6.87938 20.4586 7.00331 20.6146 7.15952L21.9607 8.50563C22.1169 8.66165 22.2408 8.84693 22.3253 9.05087C22.4099 9.25482 22.4534 9.47342 22.4534 9.69419C22.4534 9.91495 22.4099 10.1336 22.3253 10.3375C22.2408 10.5414 22.1169 10.7267 21.9607 10.8827L20.2809 12.5626C20.2711 12.5736 20.2609 12.5844 20.2503 12.595C20.2397 12.6056 20.2289 12.6158 20.2178 12.6256L11.5607 21.2827C11.4257 21.4177 11.2426 21.4936 11.0516 21.4936H8.34644C7.94881 21.4936 7.62647 21.1712 7.62647 20.7736V18.0684C7.62647 17.8775 7.70233 17.6943 7.83737 17.5593L16.4889 8.9086C16.5003 8.89532 16.5124 8.88235 16.525 8.86973C16.5376 8.8571 16.5506 8.84504 16.5639 8.83354L18.2381 7.15952C18.394 7.00352 18.5795 6.8793 18.7832 6.79483ZM17.0354 10.3984L9.06641 18.3667V20.0536H10.7534L18.7221 12.085L17.0354 10.3984ZM19.7402 11.0668L18.0537 9.38022L19.2572 8.17685C19.2794 8.15461 19.3057 8.13696 19.3348 8.12493C19.3638 8.11289 19.3949 8.10669 19.4263 8.10669C19.4578 8.10669 19.4889 8.11289 19.5179 8.12493C19.5469 8.13697 19.5737 8.15504 19.5959 8.17728L20.9428 9.52411C20.9651 9.5464 20.9831 9.57315 20.9951 9.60228C21.0072 9.63141 21.0134 9.66264 21.0134 9.69419C21.0134 9.72573 21.0072 9.75696 20.9951 9.78609C20.9831 9.81522 20.9651 9.84197 20.9428 9.86426L19.7402 11.0668ZM6.6665 24.6134C6.6665 24.2158 6.98885 23.8935 7.38648 23.8935H24.6658C25.0634 23.8935 25.3858 24.2158 25.3858 24.6134C25.3858 25.0111 25.0634 25.3334 24.6658 25.3334H7.38648C6.98885 25.3334 6.6665 25.0111 6.6665 24.6134Z"
                                                    fill="#555555"></path>
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
        </div>

        <div id="serialnumber" class="tab-pane fade">
            <section class="content">
                <div class="container-fluided">
                    <div class="row">
                        <div class="col-12">
                            <div class="row m-auto filter pt-4 pb-4">
                                <form class="w-100" action="" method="get" id="search-filter">
                                    <div class="row mr-0">
                                        <div class="col-md-5 d-flex">
                                            <div class="position-relative" style="width: 55%;">
                                                <input type="text" placeholder="Tìm kiếm" name="keywords"
                                                    class="pr-4 w-100 input-search" value="">
                                                <span id="search-icon" class="search-icon"><i class="fas fa-search"
                                                        aria-hidden="true"></i></span>
                                            </div>
                                            <button class="filter-btn ml-2">Bộ lọc
                                                <svg width="18" height="18" viewBox="0 0 18 18"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M5.42342 6.92342C5.65466 6.69219 6.02956 6.69219 6.26079 6.92342L9 9.66264L11.7392 6.92342C11.9704 6.69219 12.3453 6.69219 12.5766 6.92342C12.8078 7.15466 12.8078 7.52956 12.5766 7.76079L9.41868 10.9187C9.18745 11.1499 8.81255 11.1499 8.58132 10.9187L5.42342 7.76079C5.19219 7.52956 5.19219 7.15466 5.42342 6.92342Z"
                                                        fill="white"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluided">
                    <table class="table table-hover bg-white rounded" id="inputcontent">
                        <thead>
                            <tr>
                                <th>Serial Number</th>
                                <th>Hóa đơn mua hàng</th>
                                <th>Hóa đơn bán hàng</th>
                                <th>Ngày nhập</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product as $item)
                                @if ($item->getProductImport)
                                    @if ($item->getProductImport->getSerialNumber)
                                        @foreach ($item->getProductImport->getSerialNumber as $seri)
                                            <tr class="bg-white">
                                                <td> {{ $seri->serinumber }}</td>
                                                <td>{{ $item->getQuoteNumber->quotation_number }}</td>
                                                <td></td>
                                                <td>{{ $item->created_at }}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>

        </div>
    </div>

    <x-formmodalseri :product="$product" :status="1"></x-formmodalseri>

</div>
<script src="{{ asset('/dist/js/products.js') }}"></script>
<script src="{{ asset('/dist/js/import.js') }}"></script>
<script>
    $('#listReceive').hide();
    $('.search_quotation').on('click', function() {
        $('#listReceive').show();
    })

    // Tạo INPUT SERI
    createRowInput('seri');
</script>
