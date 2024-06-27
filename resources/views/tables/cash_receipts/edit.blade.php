<x-navbar :title="$title" activeGroup="manageProfess" activeName="cash_receipts"></x-navbar>
<!-- Content Wrapper. Contains page content -->
<form action="{{ route('cash_receipts.update', ['workspace' => $workspacename, 'cash_receipt' => $cashReceipt->id]) }}"
    method="POST" id="formSubmit" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="content-wrapper--2Column m-0">
        <!-- Content Header (Page header) -->

        <input type="hidden" name="detailimport_id" id="detailimport_id"
            value="@isset($yes){{ $show_receive['id'] }}@endisset">
        <input type="hidden" name="code_reciept" id="code_reciept" value="{{ $invoiceAuto }}">
        <div class="content-header-fixed p-0 margin-250 border-0">
            <div class="content__header--inner margin-left32">
                <div class="content__heading--left">
                    <span>Quản lý nghiệp vụ</span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8" />
                        </svg>
                    </span>
                    <span class="nearLast-span">Phiếu thu</span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8" />
                        </svg>
                    </span>
                    <span class="last-span">Chi tiết phiếu thu</span>
                </div>
                <div class="d-flex content__heading--right">
                    <div class="row m-0">
                        <a href="{{ route('cash_receipts.index', $workspacename) }}" class="user_flow" data-type="TTMH"
                            data-des="Hủy">
                            <button class="btn-destroy btn-light mx-1 d-flex align-items-center h-100" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                    viewBox="0 0 14 14" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M7 14C10.866 14 14 10.866 14 7C14 3.13401 10.866 0 7 0C3.13401 0 0 3.13401 0 7C0 10.866 3.13401 14 7 14ZM5.03033 3.96967C4.73744 3.67678 4.26256 3.67678 3.96967 3.96967C3.67678 4.26256 3.67678 4.73744 3.96967 5.03033L5.93934 7L3.96967 8.96967C3.67678 9.26256 3.67678 9.73744 3.96967 10.0303C4.26256 10.3232 4.73744 10.3232 5.03033 10.0303L7 8.06066L8.96967 10.0303C9.26256 10.3232 9.73744 10.3232 10.0303 10.0303C10.3232 9.73744 10.3232 9.26256 10.0303 8.96967L8.06066 7L10.0303 5.03033C10.3232 4.73744 10.3232 4.26256 10.0303 3.96967C9.73744 3.67678 9.26256 3.67678 8.96967 3.96967L7 5.93934L5.03033 3.96967Z"
                                        fill="#6D7075" />
                                </svg>
                                <span class="text-btnIner-primary ml-2">Hủy</span>
                            </button>
                        </a>
                        @if ($cashReceipt->status != 2)
                            <button name="action" value="payment" type="submit" id="xacNhan"
                                class="custom-btn mx-1 d-flex align-items-center h-100">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                    viewBox="0 0 14 14" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M7 14C10.866 14 14 10.866 14 7C14 3.13401 10.866 0 7 0C3.13401 0 0 3.13401 0 7C0 10.866 3.13401 14 7 14ZM10.7836 5.42901C11.0858 5.08709 11.0695 4.55006 10.7472 4.22952C10.4248 3.90897 9.9186 3.9263 9.6164 4.26821L6.14921 8.19122L4.3315 6.4773C4.00127 6.16593 3.49561 6.19748 3.20208 6.54777C2.90855 6.89806 2.93829 7.43445 3.26852 7.74581L5.28032 9.6427C5.82041 10.152 6.64463 10.1122 7.13886 9.553L10.7836 5.42901Z"
                                        fill="white"></path>
                                </svg>
                                <span class="text-btnIner-primary ml-2">Xác nhận</span>
                            </button>
                        @endif

                        <button id="sideProvide" type="button" class="btn-option border-0 mx-1">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="16" width="16" height="16" rx="5" transform="rotate(90 16 0)"
                                    fill="#ECEEFA" />
                                <path
                                    d="M15 11C15 13.2091 13.2091 15 11 15L5 15C2.7909 15 1 13.2091 1 11L1 5C1 2.79086 2.7909 1 5 1L11 1C13.2091 1 15 2.79086 15 5L15 11ZM10 13.5L10 2.5L5 2.5C3.6193 2.5 2.5 3.61929 2.5 5L2.5 11C2.5 12.3807 3.6193 13.5 5 13.5H10Z"
                                    fill="#26273B" fill-opacity="0.8" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        {{-- Thông tin sản phẩm --}}
        <div class="content margin-top-38" id="main" style="margin-right:0 !important;">
            <section class="content margin-250">
                <div id="title--fixed"
                    class="content-title--fixed bg-filter-search border-top-0 text-center border-custom"
                    style="right: 0;">
                    <p class="font-weight-bold text-uppercase info-chung--heading text-center">THÔNG TIN PHIẾU THU</p>
                </div>
                <div class="container-fluided margin-top-72">
                    <section class="content" style="height: 80vh;">
                        <div class="content-info position-relative table-responsive text-nowrap order_content h-100">
                            <table id="inputcontent" class="table table-hover bg-white rounded">
                                <thead>
                                    <tr style="height:50px;">
                                        <th class="border-right p-0 px-2 text-13" style="width:15%;">
                                            <span>Đơn bán hàng</span>
                                        </th>
                                        <th class="border-right p-0 px-2 text-13" style="width:15%;">
                                            {{-- <input class="checkall-btn ml-4 mr-1" id="checkall" type="checkbox"> --}}
                                            <span class="text-table text-secondary">Mã phiếu</span>
                                        </th>
                                        <th class="border-right p-0 px-2 text-13" style="width:8%;">Ngày</th>
                                        <th class="border-right p-0 px-2 text-right text-13" style="width:10%;">Khách
                                            hàng
                                        </th>
                                        <th class="border-right p-0 px-2 text-right text-13" style="width:10%;">Người
                                            nộp
                                        </th>
                                        <th class="border-right p-0 px-2 text-center text-13" style="width:10%;">Số
                                            tiền
                                        </th>
                                        <th class="border-right p-0 px-2 text-right text-13" style="width:10%;">Nội
                                            dung
                                        </th>
                                        <th class="border-right p-0 px-2 text-right text-13" style="width:10%;">Quỹ
                                        </th>
                                        <th class="border-right p-0 px-2 text-right text-13" style="width:10%;">Nhân
                                            viên
                                        </th>
                                        <th class="p-0 px-2 note text-13">Ghi chú</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="bg-white" style="height:80px;">
                                        <td
                                            class="border-right border-top-0 p-2 text-13 align-top border-bottom position-relative">
                                            <input type="text" placeholder="Chọn thông tin" id="myInput"
                                                value="{{ $cashReceipt->delivery ? $cashReceipt->delivery->quotation_number : null }}"
                                                readonly disabled
                                                class="border-0 text-13-black px-2 py-1 w-100 height-32 search_quotation"
                                                style="background-color:#F0F4FF; border-radius:4px;"
                                                name="quotation_number" autocomplete="off" readonly>
                                            <input type="hidden" name="detail_id" id="detail_id"
                                                value="{{ $cashReceipt->delivery ? $cashReceipt->delivery->id : null }}">
                                            </span>

                                            <ul id="listReceive"
                                                class="bg-white position-absolute rounded shadow p-1 scroll-data list-guest z-index-block"
                                                style="z-index: 99;display: none; right:0; width:100%">
                                                <div class="p-1">
                                                    <div class="position-relative">
                                                        <input type="text" placeholder="Nhập đơn mua hàng"
                                                            class="pr-4 w-100 input-search bg-input-guest text-13-black"
                                                            id="provideFilter">
                                                        <input type="hidden" name="" id="">
                                                        <span id="search-icon" class="search-icon"><i
                                                                class="fas fa-search text-table"
                                                                aria-hidden="true"></i></span>
                                                    </div>
                                                </div>
                                                @foreach ($detailOwed as $value)
                                                    <li class="p-2 align-items-center"
                                                        style="border-radius:4px;border-bottom: 1px solid #d6d6d6;">
                                                        <a href="javascript:void(0)" id="{{ $value->id }}"
                                                            name="search-info" class="search-receipts"
                                                            style="flex:2;">
                                                            <span
                                                                class="text-13-black">{{ $value->quotation_number == null ? $value->id : $value->quotation_number }}</span>
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td class="border-right border-top-0 p-2 text-13 align-top border-bottom">
                                            <input type="text"
                                                class="border-0 text-13-black px-2 py-1 w-100 height-32 searchProductName"
                                                value="{{ $cashReceipt->receipt_code }}" readonly disabled>
                                        </td>
                                        <td class="border-right border-top-0 p-2 text-13 align-top border-bottom">
                                            <input
                                                class="text-13-black w-100 border-0 bg-input-guest flatpickr-input py-2 px-2"
                                                name="" placeholder="Chọn thông tin" style="flex:2;"
                                                id="datePicker" value="{{ $cashReceipt->date_created }}"
                                                {{ $disabled }} />
                                            <input type="hidden" name="payment_date" id="hiddenDateInput"
                                                value="{{ $cashReceipt->date_created }}">
                                        </td>
                                        {{-- Khách hàng --}}
                                        <td class="border-right border-top-0 p-2 text-13 align-top border-bottom">
                                            <div
                                                class="border-0 d-flex justify-content-between border-bottom border-top align-items-center text-left text-nowrap position-relative">
                                                <input type="text" placeholder="Chọn thông tin" id="myGuest"
                                                    class="border-0 text-13-black px-2 py-1 w-100 height-32 search_guest"
                                                    style="background-color:#F0F4FF; border-radius:4px;"
                                                    autocomplete="off" readonly
                                                    value="{{ $cashReceipt->guest->guest_name_display }}"
                                                    {{ $disabled }}>
                                                <input type="hidden" name="guest_id" id="guest_id"
                                                    value="{{ $cashReceipt->guest->id }}">

                                                <ul id="listGuest"
                                                    class="bg-white position-absolute rounded shadow p-1 scroll-data list-guest z-index-block"
                                                    style="z-index: 99;display: none; right:0; width:100%">
                                                    <div class="p-1">
                                                        <div class="position-relative">
                                                            <input type="text" placeholder="Nhập đơn mua hàng"
                                                                class="pr-4 w-100 input-search bg-input-guest text-13-black search_guest"
                                                                id="provideFilter">
                                                            <span id="search-icon" class="search-icon"><i
                                                                    class="fas fa-search text-table"
                                                                    aria-hidden="true"></i></span>
                                                        </div>
                                                    </div>
                                                    @foreach ($guest as $value)
                                                        <li class="p-2 align-items-center"
                                                            style="border-radius:4px;border-bottom: 1px solid #d6d6d6;">
                                                            <a href="javascript:void(0)" id="{{ $value->id }}"
                                                                name="search-info" class="search-guest"
                                                                style="flex:2;">
                                                                <span
                                                                    class="text-13-black">{{ $value->guest_name_display }}</span>
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>

                                        </td>
                                        <td class="border-right border-top-0 p-2 text-13 align-top border-bottom">

                                        </td>
                                        <td class="border-right border-top-0 p-2 text-13 align-top border-bottom">
                                            <input
                                                class="text-13-black w-100 border-0 bg-input-guest flatpickr-input py-2 px-2 price_export "
                                                name="total" placeholder="Nhập số tiền" style="flex:2;" required
                                                {{ $disabled }}
                                                value="{{ number_format($cashReceipt->amount) }}" />
                                            <br>
                                            <div class="cash_reciept" style="display: none">
                                                <label for="">Tiền cần thu</label><input type="text"
                                                    class="text-13-black w-auto border-0 bg-input-guest flatpickr-input py-2 px-2"
                                                    name="money_reciept" id="money_reciept">
                                            </div>
                                        </td>
                                        <td class="border-right border-top-0 p-2 text-13 align-top border-bottom">
                                            <div
                                                class="border-0 d-flex justify-content-between border-bottom border-top align-items-center text-left text-nowrap position-relative">
                                                <input type="text" placeholder="Chọn thông tin" id="myContent"
                                                    class="border-0 text-13-black px-2 py-1 w-100 height-32 search_content"
                                                    style="background-color:#F0F4FF; border-radius:4px;"
                                                    autocomplete="off" readonly required="required" required
                                                    value="{{ $cashReceipt->content->name }}" {{ $disabled }}>
                                                <input type="hidden" name="content_pay" id="content_id"
                                                    value="{{ $cashReceipt->content_id }}" />

                                                <ul id="listContent"
                                                    class="bg-white position-absolute rounded shadow p-1 scroll-data list-guest z-index-block"
                                                    style="z-index: 99;display: none; right:0; width:100%">
                                                    <div class="p-1">
                                                        <div class="position-relative">
                                                            <input type="text" placeholder="Tìm kiếm nội dung"
                                                                class="pr-4 w-100 input-search bg-input-guest text-13-black search_content"
                                                                id="provideFilter">
                                                            <span id="search-icon" class="search-icon"><i
                                                                    class="fas fa-search text-table"
                                                                    aria-hidden="true"></i></span>
                                                        </div>
                                                    </div>
                                                    @foreach ($content as $value)
                                                        <li class="p-2 align-items-center"
                                                            style="border-radius:4px;border-bottom: 1px solid #d6d6d6;">
                                                            <a href="javascript:void(0)" id="{{ $value->id }}"
                                                                name="search-info" class="search-content"
                                                                style="flex:2;">
                                                                <span class="text-13-black">{{ $value->name }}</span>
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </td>
                                        <td class="border-right border-top-0 p-2 text-13 align-top border-bottom">
                                            <div
                                                class="border-0 d-flex justify-content-between border-bottom border-top align-items-center text-left text-nowrap position-relative">
                                                <input type="text" placeholder="Chọn thông tin" id="fund"
                                                    class="border-0 text-13-black px-2 py-1 w-100 height-32 search_funds"
                                                    style="background-color:#F0F4FF; border-radius:4px;"
                                                    name="search_funds" autocomplete="off" readonly
                                                    value="{{ $cashReceipt->fund->name }}" {{ $disabled }}>
                                                <input type="hidden" name="fund_id" id="fund_id"
                                                    value="{{ $cashReceipt->fund->id }}">
                                                <ul id="listFunds"
                                                    class="bg-white position-absolute rounded shadow p-1 scroll-data list-guest z-index-block"
                                                    style="z-index: 99;display: none; right:0; width:100%">
                                                    <div class="p-1">
                                                        <div class="position-relative">
                                                            <input type="text" placeholder="Nhập đơn mua hàng"
                                                                class="pr-4 w-100 input-search bg-input-guest text-13-black search_funds"
                                                                id="provideFilter">
                                                            <span id="search-icon" class="search-icon"><i
                                                                    class="fas fa-search text-table"
                                                                    aria-hidden="true"></i></span>
                                                        </div>
                                                    </div>
                                                    @foreach ($funds as $value)
                                                        <li class="p-2 align-items-center"
                                                            style="border-radius:4px;border-bottom: 1px solid #d6d6d6;">
                                                            <a href="javascript:void(0)" id="{{ $value->id }}"
                                                                name="search-info" class="search-funds"
                                                                style="flex:2;">
                                                                <span class="text-13-black">{{ $value->name }}</span>
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </td>
                                        <td class="border-right border-top-0 p-2 text-13 align-top border-bottom">
                                            <input type="text"
                                                class="border-0 text-13-black px-2 py-1 w-100 height-32 searchuser"
                                                name="userName" value="{{ Auth::user()->name }}" readonly disabled>
                                        </td>
                                        <td class="border-right border-top-0 p-2 text-13 align-top border-bottom">
                                            <input type="text"
                                                class="border-0 text-13-black px-2 py-1 w-100 height-32 note"
                                                name="note" {{ $disabled }}>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </section>
                </div>
            </section>
        </div>
    </div>
</form>

<div class="modal fade" id="recentModal" tabindex="-1" aria-labelledby="productModalLabel" style="display: none;"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-bold">Giao dịch gần đây</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="outer text-nowrap">
                    <table id="example2" class="table table-hover bg-white rounded">
                        <thead>
                            <tr>
                                <th scope="col" class="height-52 text-table text-secondary">
                                    <span class="d-flex">
                                        <a href="#" class="sort-link" data-sort-by="id" data-sort-type="#">
                                            <button class="btn-sort text-13" type="submit">
                                                Tên sản phẩm
                                            </button>
                                        </a>
                                        <div class="icon" id="icon-id"></div>
                                    </span>
                                </th>
                                <th scope="col" class="height-52 text-table text-secondary">
                                    <span class="d-flex">
                                        <a href="#" class="sort-link" data-sort-by="id" data-sort-type="#">
                                            <button class="btn-sort text-13" type="submit">
                                                Nhà cung cấp
                                            </button>
                                        </a>
                                        <div class="icon" id="icon-id"></div>
                                    </span>
                                </th>
                                <th scope="col" class="height-52 text-table text-secondary">
                                    <span class="d-flex">
                                        <a href="#" class="sort-link" data-sort-by="id" data-sort-type="#">
                                            <button class="btn-sort text-13" type="submit">
                                                Giá mua
                                            </button>
                                        </a>
                                        <div class="icon" id="icon-id"></div>
                                    </span>
                                </th>
                                <th scope="col" class="height-52 text-table text-secondary">
                                    <span class="d-flex">
                                        <a href="#" class="sort-link" data-sort-by="id" data-sort-type="#">
                                            <button class="btn-sort text-13" type="submit">
                                                Thuế
                                            </button>
                                        </a>
                                        <div class="icon" id="icon-id"></div>
                                    </span>
                                </th>
                                <th scope="col" class="height-52 text-table text-secondary">
                                    <span class="d-flex">
                                        <a href="#" class="sort-link" data-sort-by="id" data-sort-type="#">
                                            <button class="btn-sort text-13" type="submit">
                                                Ngày mua
                                            </button>
                                        </a>
                                        <div class="icon" id="icon-id"></div>
                                    </span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<script src="{{ asset('/dist/js/cash_reciepts.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.search-receipts').on('click', function(event, detail_id) {
            name = $(this).find('span').text()
            if (detail_id) {
                detail_id = detail_id
            } else {
                detail_id = parseInt($(this).attr('id'), 10);
            }
            $.ajax({
                url: "{{ route('getInfoDeliveryReciepts') }}",
                type: "get",
                data: {
                    detail_id: detail_id,
                },
                success: function(data) {
                    console.log(data);
                    $('#myInput').val(data.quotation_number)
                    $('#myGuest').val(data.nameGuest);
                    $('#listReceive').hide();
                    $('#listGuest').hide();
                    $('#money_reciept').val(formatCurrency(data.amount_owed))
                    $('#detail_id').val(data.id)
                    $('#guest_id').val(data.guest_id)
                    $('.cash_reciept').show()
                }
            })
        })
        var detail_id = $('#detail_id').val();
        if (detail_id) {
            $('.search-receipts').trigger('click', detail_id);
        }
    });
</script>
