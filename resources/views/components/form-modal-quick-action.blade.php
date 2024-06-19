<div>
    <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-bold">Giao dịch gần đây</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body product_show">
                    <div class="outer text-nowrap">
                        <table id="example2" class="table table-hover bg-white rounded">
                            <thead>
                                <tr>
                                    <th scope="col" class="height-52">
                                        <span class="d-flex">
                                            <a href="#" class="sort-link" data-sort-by="id" data-sort-type="#">
                                                <button class="btn-sort text-13" type="submit">
                                                    Tên sản phẩm
                                                </button>
                                            </a>
                                            <div class="icon" id="icon-id"></div>
                                        </span>
                                    </th>
                                    <th scope="col" class="height-52">
                                        <span class="d-flex">
                                            <a href="#" class="sort-link" data-sort-by="id" data-sort-type="#">
                                                <button class="btn-sort text-13" type="submit">
                                                    Giá mua
                                                </button>
                                            </a>
                                            <div class="icon" id="icon-id"></div>
                                        </span>
                                    </th>
                                    <th scope="col" class="height-52">
                                        <span class="d-flex">
                                            <a href="#" class="sort-link" data-sort-by="id" data-sort-type="#">
                                                <button class="btn-sort text-13" type="submit">
                                                    Thuế
                                                </button>
                                            </a>
                                            <div class="icon" id="icon-id"></div>
                                        </span>
                                    </th>
                                    <th scope="col" class="height-52">
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        var menu = $('.menu'); //get the menu
        $(document).on('contextmenu', '.import-info', function(e) {
            // Chặn click trình duyệt
            e.preventDefault();
            var id = $(this).data('id');
            //Hiển thị menu theo đơn chưa tạo
            $.ajax({
                url: "{{ route('checkAction') }}",
                type: "get",
                data: {
                    id: id,
                },
                success: function(data) {
                    if (data.receive) {
                        $('.menu').find('p[data-type="receive"]').hide()
                    } else {
                        $('.menu').find('p[data-type="receive"]').show()
                    }
                    if (data.reciept) {
                        $('.menu').find('p[data-type="reciept"]').hide()
                    } else {
                        $('.menu').find('p[data-type="reciept"]').show()
                    }
                    if (data.payment) {
                        $('.menu').find('p[data-type="payorder"]').hide()
                    } else {
                        $('.menu').find('p[data-type="payorder"]').show()
                    }
                    if (data.title_payment) {
                        $('.menu .title_payment').text(data.title_payment)
                    } else {
                        $('.menu .title_payment').text("Tạo thanh toán")
                    }
                    if (!data.receive || !data.reciept || !data.payment) {
                        menu.css({
                            display: 'block',
                            top: e.pageY,
                            left: e.pageX
                        });
                    } else {
                        menu.css({
                            display: 'none',
                        });
                    }

                }
            })

            $(document).off('click', '.quickAction').on('click', '.quickAction', function() {
                $('#quickAction .modal-content .modal-body')
                    .empty();
                $('#quickAction .modal-content .header-modal')
                    .empty();
                $('#list_modal').empty();
                var type = $(this).data('type');
                if (type && id) {
                    if (type == "receive") {
                        $.ajax({
                            url: "{{ route('getDataImport') }}",
                            type: "get",
                            data: {
                                type: type,
                                id: id
                            },
                            success: function(data) {
                                var warehouses = data.warehouse;
                                if (data.status) {
                                    $('#id_import').val(id)
                                    $('#listProduct tbody').empty();
                                    var header = `
                                    <div class="modal-header d-flex align-items-center">
                                        <h5 class="modal-title" id="exampleModalLabel" style="font-size: 16px;">Xác nhận nhận hàng</h5>
                                        <div class="d-flex">
                                            <a href="#">
                                                <button type="button" class="btn-destroy btn-light mx-1 d-flex align-items-center h-100"
                                                    style="margin-right:10px" data-dismiss="modal" aria-label="Close">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
<path fill-rule="evenodd" clip-rule="evenodd" d="M7 14C10.866 14 14 10.866 14 7C14 3.13401 10.866 0 7 0C3.13401 0 0 3.13401 0 7C0 10.866 3.13401 14 7 14ZM5.03033 3.96967C4.73744 3.67678 4.26256 3.67678 3.96967 3.96967C3.67678 4.26256 3.67678 4.73744 3.96967 5.03033L5.93934 7L3.96967 8.96967C3.67678 9.26256 3.67678 9.73744 3.96967 10.0303C4.26256 10.3232 4.73744 10.3232 5.03033 10.0303L7 8.06066L8.96967 10.0303C9.26256 10.3232 9.73744 10.3232 10.0303 10.0303C10.3232 9.73744 10.3232 9.26256 10.0303 8.96967L8.06066 7L10.0303 5.03033C10.3232 4.73744 10.3232 4.26256 10.0303 3.96967C9.73744 3.67678 9.26256 3.67678 8.96967 3.96967L7 5.93934L5.03033 3.96967Z" fill="#6D7075"/>
</svg>
                                                    <span class="text-btnIner-primary ml-2">Hủy</span>
                                                </button>
                                            </a>

                                            <a href="#" data-type="receive_bill" onclick="getActionForm(this)">
                                                <button name="action" value="action_1" type="submit"
                                                    class="btn-destroy btn-light d-flex align-items-center h-100" style="margin-right:5px">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="14" viewBox="0 0 12 14" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.75 0V5.75C4.75 6.5297 5.34489 7.17045 6.10554 7.24313L6.25 7.25H12V12C12 13.1046 11.1046 14 10 14H2C0.89543 14 0 13.1046 0 12V2C0 0.89543 0.89543 0 2 0H4.75ZM6 0L12 6.03022H7C6.44772 6.03022 6 5.5825 6 5.03022V0Z" fill="#6D7075"></path>
                                </svg>
                                                    <span class="text-btnIner-primary ml-2">Lưu nháp</span>
                                                </button>
                                            </a>

                                            <a href="#" data-type="receive_bill" onclick="getActionForm(this)">
                                                <button name="action" value="action_2" type="submit"
                                                    class="custom-btn d-flex align-items-center h-100">
                                                    <svg class="mr-1" xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                        viewBox="0 0 14 14" fill="none">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M7 14C10.866 14 14 10.866 14 7C14 3.13401 10.866 0 7 0C3.13401 0 0 3.13401 0 7C0 10.866 3.13401 14 7 14ZM10.7836 5.42901C11.0858 5.08709 11.0695 4.55006 10.7472 4.22952C10.4248 3.90897 9.9186 3.9263 9.6164 4.26821L6.14921 8.19122L4.3315 6.4773C4.00127 6.16593 3.49561 6.19748 3.20208 6.54777C2.90855 6.89806 2.93829 7.43445 3.26852 7.74581L5.28032 9.6427C5.82041 10.152 6.64463 10.1122 7.13886 9.553L10.7836 5.42901Z"
                                                            fill="white"></path>
                                                    </svg>
                                                    <p class="m-0 ml-1">Nhận hàng</p>
                                                </button>
                                            </a>
                                        </div>
                                    </div>`;
                                    $('#quickAction .modal-content .header-modal')
                                        .append(header);

                                    var body = `
                                    <div class="d-flex">
                                        <div class="content-left" style="width:70%;">
                                            <p class="font-weight-bold text-uppercase info-chung--modal text-center border-right">THÔNG TIN SẢN
                                                PHẨM</p>

                                        <table id="listProduct" class="table table-hover bg-white rounded">
                                            <thead style="height:50px;">
                                                <th class="border-bottom border-right border-top">
                                                    <span class="text-table">Tên sản phẩm</span>
                                                </th>
                                                <th class="border-bottom border-right text-right border-top" style="width: 25%;">
                                                    <span class="text-table">Số lượng</span>
                                                </th>
                                                <th class="border-bottom border-right border-top" style="width: 20%;">
                                                    <span class="text-table">Quản lý SN</span>
                                                </th>
                                                <th class="border-bottom border-right border-top" style="width: 20%;">
                                                    <span class="text-table">Kho hàng</span>
                                                </th>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                        <div class="content right" style="width:30%;">
                                            <p class="font-weight-bold text-uppercase info-chung--modal text-center border-left-0">THÔNG
                                                TIN NHÀ
                                                CUNG CẤP</p>
                                            <div class="d-flex justify-content-between py-1 px-3 border align-items-center text-left text-nowrap position-relative border-left-0"
                                                style="height:50px;">
                                                <span class="text-13 btn-click" style="flex: 1.5;">Đơn mua hàng</span>

                                                <span class="mx-1 text-13" style="flex: 2;">
                                                    <input type="text" placeholder="Chọn thông tin"
                                                        class="border-0 w-100 bg-input-guest py-0 py-2 px-2 nameGuest" id="myInput"
                                                        style="border-radius:4px;" autocomplete="off" readonly=""
                                                        name="quotation_number">
                                                </span>
                                            </div>

                                            <div class="d-flex justify-content-between py-1 px-3 border border-top-0 align-items-center text-left text-nowrap position-relative border-left-0"
                                                style="height:50px;">

                                                <span class="text-13 btn-click" style="flex: 1.5;">Nhà cung cấp</span>

                                                <span class="mx-1 text-13" style="flex: 2;">
                                                    <input type="text" placeholder="Chọn thông tin"
                                                        class="border-0 w-100 bg-input-guest py-0 py-2 px-2 nameGuest" id="myInput"
                                                        style="border-radius:4px;" autocomplete="off" readonly=""
                                                        name="provides_name">
                                                </span>
                                            </div>

                                            <div class="d-flex justify-content-between py-1 px-3 border border-top-0 align-items-center text-left text-nowrap position-relative border-left-0"
                                                style="height:50px;">

                                                <span class="text-13 btn-click" style="flex: 1.5;">Ngày nhận hàng</span>
                                                    <input type="text" placeholder="Nhập thông tin"
                                                        class="ml-2 text-13-black w-100 border-0 bg-input-guest nameGuest px-2 py-2 flatpickr-input"
                                                        style="flex:2;" value="{{ date('Y-m-d') }}" id="datePicker" readonly="readonly">
                                                    <input id="hiddenDateInput" type="hidden" value="{{ date('Y-m-d') }}"
                                                        name="received_date">
                                            </div>
                                        </div>
                                    </div>`;
                                    $('#quickAction .modal-content .modal-body')
                                        .append(body);
                                    $("input[name='quotation_number']").val(data
                                        .quotation_number)
                                    $("input[name='provides_name']").val(data
                                        .provide_name)
                                    data.product.forEach((element, index) => {
                                        var tr = `
                                            <tr class="bg-white">
                                                <td class="border-top-0 border-bottom bg-white align-top text-13-black border-right">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <input name="product_name[]" value="` + element.product_name +
                                            `" class="searchProductName w-100 border-0 px-2 py-1 bg-input-guest" readonly>
                                                        <div class="info-product" data-toggle="modal" data-target="#productModal"> 
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">                                     
                                                                <g clip-path="url(#clip0_2559_39956)">                                         
                                                                <path d="M6.99999 1.48362C5.53706 1.48362 4.13404 2.06477 3.09959 3.09922C2.06514 4.13367 1.48399 5.53669 1.48399 6.99963C1.48399 8.46256 2.06514 9.86558 3.09959 10.9C4.13404 11.9345 5.53706 12.5156 6.99999 12.5156C8.46292 12.5156 9.86594 11.9345 10.9004 10.9C11.9348 9.86558 12.516 8.46256 12.516 6.99963C12.516 5.53669 11.9348 4.13367 10.9004 3.09922C9.86594 2.06477 8.46292 1.48362 6.99999 1.48362ZM0.265991 6.99963C0.265991 5.21366 0.975464 3.50084 2.23833 2.23797C3.5012 0.975098 5.21402 0.265625 6.99999 0.265625C8.78596 0.265625 10.4988 0.975098 11.7616 2.23797C13.0245 3.50084 13.734 5.21366 13.734 6.99963C13.734 8.78559 13.0245 10.4984 11.7616 11.7613C10.4988 13.0242 8.78596 13.7336 6.99999 13.7336C5.21402 13.7336 3.5012 13.0242 2.23833 11.7613C0.975464 10.4984 0.265991 8.78559 0.265991 6.99963Z" fill="#282A30"></path>                                         <path d="M7.07004 4.34488C6.92998 4.33528 6.78944 4.35459 6.65715 4.40161C6.52487 4.44863 6.40367 4.52236 6.30109 4.61821C6.19851 4.71406 6.11674 4.82999 6.06087 4.95878C6.00499 5.08757 5.9762 5.22648 5.97629 5.36688C5.97629 5.52851 5.91208 5.68352 5.79779 5.79781C5.6835 5.91211 5.52849 5.97631 5.36685 5.97631C5.20522 5.97631 5.05021 5.91211 4.93592 5.79781C4.82162 5.68352 4.75742 5.52851 4.75742 5.36688C4.75733 4.9557 4.87029 4.55241 5.08394 4.2011C5.2976 3.84979 5.60373 3.56398 5.96886 3.37492C6.33399 3.18585 6.74408 3.10081 7.15428 3.12909C7.56449 3.15737 7.95902 3.29788 8.29475 3.53526C8.63049 3.77265 8.8945 4.09776 9.05792 4.47507C9.22135 4.85237 9.2779 5.26735 9.22139 5.67462C9.16487 6.0819 8.99748 6.4658 8.7375 6.78436C8.47753 7.10292 8.13497 7.34387 7.74729 7.48088C7.70694 7.49534 7.67207 7.52196 7.64747 7.55706C7.62287 7.59216 7.60975 7.63402 7.60992 7.67688V8.22463C7.60992 8.38626 7.54571 8.54127 7.43142 8.65557C7.31712 8.76986 7.16211 8.83407 7.00048 8.83407C6.83885 8.83407 6.68383 8.76986 6.56954 8.65557C6.45525 8.54127 6.39104 8.38626 6.39104 8.22463V7.67688C6.39096 7.38197 6.48229 7.0943 6.65247 6.85345C6.82265 6.6126 7.0633 6.43042 7.34129 6.332C7.56313 6.25339 7.7511 6.10073 7.87356 5.89975C7.99603 5.69877 8.0455 5.46172 8.01366 5.22853C7.98181 4.99534 7.87059 4.78025 7.69872 4.61946C7.52685 4.45867 7.30483 4.36114 7.07004 4.34488Z" fill="#282A30"></path>                                         <path d="M7.04382 10.1242C7.00228 10.1242 6.96245 10.1408 6.93307 10.1701C6.9037 10.1995 6.8872 10.2393 6.8872 10.2809C6.8872 10.3224 6.9037 10.3623 6.93307 10.3916C6.96245 10.421 7.00228 10.4375 7.04382 10.4375C7.08536 10.4375 7.1252 10.421 7.15457 10.3916C7.18395 10.3623 7.20045 10.3224 7.20045 10.2809C7.20045 10.2393 7.18395 10.1995 7.15457 10.1701C7.1252 10.1408 7.08536 10.1242 7.04382 10.1242ZM7.04382 10.9371C7.13 10.9371 7.21534 10.9201 7.29496 10.8872C7.37458 10.8542 7.44692 10.8059 7.50786 10.7449C7.5688 10.684 7.61714 10.6116 7.65012 10.532C7.6831 10.4524 7.70007 10.3671 7.70007 10.2809C7.70007 10.1947 7.6831 10.1094 7.65012 10.0297C7.61714 9.95012 7.5688 9.87777 7.50786 9.81684C7.44692 9.7559 7.37458 9.70756 7.29496 9.67458C7.21534 9.6416 7.13 9.62462 7.04382 9.62462C6.86977 9.62462 6.70286 9.69376 6.57978 9.81684C6.45671 9.93991 6.38757 10.1068 6.38757 10.2809C6.38757 10.4549 6.45671 10.6218 6.57978 10.7449C6.70286 10.868 6.86977 10.9371 7.04382 10.9371Z" fill="#282A30"></path>                                     </g>                                     <defs>                                         <clipPath id="clip0_2559_39956">                                             <rect width="14" height="14" fill="white"></rect>                                         </clipPath>                                     </defs>                                 
                                                            </svg>                             
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="border-top-0 border-bottom bg-white align-top text-13-black border-right text-right">
                                                    <div class="d-flex justify-content-between">
                                                        <input class="quantity-input w-100 border-0 px-2 py-1 bg-input-guest text-right" type="text" name="product_qty[]" value="` +
                                            formatCurrency(element
                                                .product_qty) + `" readonly>
                                                    </div>
                                                    <div class="text-13-blue">
                                                        Tồn kho : <span class="inventory">` + (data.inventory ?
                                                formatCurrency(data
                                                    .inventory) : 0) + `</span>
                                                    </div>
                                                </td>
                                                <td class="text-center bg-white align-top text-13-black border-top-0 border-bottom border-right">
                                                    <input style="margin-top:6px;" ` + (data.checked[index] ==
                                                'endable' ||
                                                data.cb[index] == 1 ?
                                                'checked' : '') + ` ` + (
                                                data.checked[index]) + ` type="checkbox" onclick="getDataCheckbox(this)"
                                                    value="` + (data.checked[index] == 'endable' ||
                                                data.cb[index] == 1 ? 1 :
                                                0) + `" onclick="getDataCheckbox(this)">
                                                        <input type="hidden" name="cbSeri[]" value="` + (data.checked[
                                                    index] ==
                                                'endable' ||
                                                data.cb[index] == 1 ? 1 :
                                                0) + `">
                                                    <a class="duongdan" href="#" data-target="#exampleModal` + element
                                            .id + `" data-toggle="modal" ` +
                                            (data.checked[
                                                    index] ==
                                                'endable' ||
                                                data.cb[index] == 1 ?
                                                'style="opacity:1;"' :
                                                'style="opacity:0;"') + `>
                                                    <div class="sn--modal pt-1">
                                                    <span class="border-span--modal">SN</span>
                                                    </div>
                                                </a>
                                                </td>
                                                <td class="text-center bg-white align-top text-13-black border-top-0 border-bottom border-right">
                                                    <select class="border-0 py-1 w-100 text-center height-32" name="warehouse[]" required>
                                                        ${warehouses.map(warehouse => `<option value="${warehouse.id}">${warehouse.warehouse_name}</option>`).join('')}
                                                    </select>
                                                </td>
                                            </tr>`;
                                        $('#listProduct tbody').append(tr);
                                        createModal(element.id)
                                    })
                                }
                                flatpickr("#datePicker", {
                                    locale: "vn",
                                    dateFormat: "d/m/Y",
                                    defaultDate: new Date(),
                                    onChange: function(selectedDates,
                                        dateStr, instance) {
                                        // Cập nhật giá trị của trường ẩn khi người dùng chọn ngày
                                        document.getElementById(
                                                "hiddenDateInput")
                                            .value = instance
                                            .formatDate(
                                                selectedDates[0],
                                                "Y-m-d");
                                    }
                                });
                            }
                        })
                    } else if (type == "reciept") {
                        $.ajax({
                            url: "{{ route('getDataImport') }}",
                            type: "get",
                            data: {
                                type: type,
                                id: id
                            },
                            success: function(data) {
                                if (data.status) {
                                    $('#id_import').val(id)
                                    var header = `
                                    <div class="modal-header d-flex align-items-center">
                                        <h5 class="modal-title" id="exampleModalLabel" style="font-size: 16px;">Xác nhận hóa đơn</h5>
                                        <div class="d-flex">
                                            <a href="#">
                                                <button type="button" class="btn-destroy btn-light mx-1 d-flex align-items-center h-100"
                                                    style="margin-right:10px" data-dismiss="modal" aria-label="Close">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7 14C10.866 14 14 10.866 14 7C14 3.13401 10.866 0 7 0C3.13401 0 0 3.13401 0 7C0 10.866 3.13401 14 7 14ZM5.03033 3.96967C4.73744 3.67678 4.26256 3.67678 3.96967 3.96967C3.67678 4.26256 3.67678 4.73744 3.96967 5.03033L5.93934 7L3.96967 8.96967C3.67678 9.26256 3.67678 9.73744 3.96967 10.0303C4.26256 10.3232 4.73744 10.3232 5.03033 10.0303L7 8.06066L8.96967 10.0303C9.26256 10.3232 9.73744 10.3232 10.0303 10.0303C10.3232 9.73744 10.3232 9.26256 10.0303 8.96967L8.06066 7L10.0303 5.03033C10.3232 4.73744 10.3232 4.26256 10.0303 3.96967C9.73744 3.67678 9.26256 3.67678 8.96967 3.96967L7 5.93934L5.03033 3.96967Z" fill="#6D7075"/>
                                                    </svg>
                                                    <span class="text-btnIner-primary ml-2">Hủy</span>
                                                </button>
                                            </a>

                                            <a href="#" data-type="reciept" onclick="getActionForm(this)">
                                                <button name="action" type="submit"
                                                    class="custom-btn d-flex align-items-center h-100" value="action_2">
                                                    <svg class="mr-1" xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                        viewBox="0 0 14 14" fill="none">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M7 14C10.866 14 14 10.866 14 7C14 3.13401 10.866 0 7 0C3.13401 0 0 3.13401 0 7C0 10.866 3.13401 14 7 14ZM10.7836 5.42901C11.0858 5.08709 11.0695 4.55006 10.7472 4.22952C10.4248 3.90897 9.9186 3.9263 9.6164 4.26821L6.14921 8.19122L4.3315 6.4773C4.00127 6.16593 3.49561 6.19748 3.20208 6.54777C2.90855 6.89806 2.93829 7.43445 3.26852 7.74581L5.28032 9.6427C5.82041 10.152 6.64463 10.1122 7.13886 9.553L10.7836 5.42901Z"
                                                            fill="white"></path>
                                                    </svg>
                                                    <p class="m-0 ml-1">Xác nhận</p>
                                                </button>
                                            </a>
                                        </div>
                                    </div>`;
                                    $('#quickAction .modal-content .header-modal')
                                        .append(header);
                                    var body = `
                                    <div class="content-left">
                                        <p class="font-weight-bold text-uppercase info-chung--modal text-center" style="padding: 10px 0;">THÔNG TIN</p>

                                        <div class="d-flex justify-content-between py-1 px-3 border align-items-center text-left text-nowrap position-relative"
                                        style="height:50px;">
                                            <span class="text-13 btn-click" style="flex: 1.5;">Đơn mua hàng</span>
                                            <span class="mx-1 text-13" style="flex: 2;">
                                            <input type="text" placeholder="Chọn thông tin"
                                            class="border-0 w-100 bg-input-guest py-0 py-2 px-2 nameGuest" id="myInput"
                                            style="border-radius:4px;" autocomplete="off" readonly="" name="quotation_number">
                                            </span>
                                        </div>

                                        <div class="d-flex justify-content-between py-1 px-3 border border-top-0 align-items-center text-left text-nowrap position-relative"
                                        style="height:50px;">
                                            <span class="text-13 btn-click" style="flex: 1.5;">Nhà cung cấp</span>
                                            <span class="mx-1 text-13" style="flex: 2;">
                                            <input type="text" placeholder="Chọn thông tin"
                                            class="border-0 w-100 bg-input-guest py-0 py-2 px-2 nameGuest" id="myInput"
                                            style="border-radius:4px;" autocomplete="off" readonly="" name="provides_name">
                                            </span>
                                        </div>

                                        <div class="d-flex justify-content-between py-1 px-3 border border-top-0 align-items-center text-left text-nowrap position-relative"
                                        style="height:50px;">
                                            <span class="text-13 btn-click" style="flex: 1.5;">Số hóa đơn</span>
                                            <span class="mx-1 text-13" style="flex: 2;">
                                            <input type="text" placeholder="Chọn thông tin"
                                            class="border-0 w-100 bg-input-guest py-0 py-2 px-2 nameGuest" id=""
                                            style="border-radius:4px;" autocomplete="off" name="number_bill">
                                            </span>
                                        </div>

                                        <div class="d-flex justify-content-between py-1 px-3 border border-top-0 align-items-center text-left text-nowrap position-relative"
                                        style="height:50px;">
                                            <span class="text-13 btn-click" style="flex: 1.5;">Ngày nhận hàng</span>
                                            <span class="mx-1 text-13" style="flex: 2;">
                                            <input type="text" placeholder="Nhập thông tin"
                                            class="text-13-black w-100 border-0 bg-input-guest nameGuest px-2 py-2 flatpickr-input active"
                                            style="flex:2;" value="{{ date('Y-m-d') }}" id="datePicker1" readonly="readonly">
                                            <input id="hiddenDateInput1" type="hidden" value="{{ date('Y-m-d') }}" name="date_bill">
                                        </span>
                                        </div>
                                    </div>`;
                                    $('#quickAction .modal-content .modal-body')
                                        .append(body);

                                    $("input[name='quotation_number']").val(data
                                        .quotation_number)
                                    $("input[name='provides_name']").val(data
                                        .provide_name)
                                    $("input[name='number_bill']").val(data
                                        .resultNumber)

                                    data.product.forEach((element, index) => {
                                        var input = `
                                            <input type="hidden" name="product_name[]" value="` + element
                                            .product_name + `">
                                            <input type="hidden" name="product_qty[]" value="` + formatCurrency(element
                                                .product_qty) + `">
                                            `;
                                        $('#quickAction .content-left')
                                            .append(input);
                                    })
                                } else {
                                    // Đây
                                }
                                getDate(1)
                            }
                        })
                    } else {
                        // Thanh toán
                        $.ajax({
                            url: "{{ route('getDataImport') }}",
                            type: "get",
                            data: {
                                type: type,
                                id: id
                            },
                            success: function(data) {
                                $('#id_import').val(id)
                                var header = `
                                    <div class="modal-header d-flex align-items-center">
                                        <h5 class="modal-title" id="exampleModalLabel" style="font-size: 16px;">Xác nhận thanh toán
                                        </h5>
                                    <div class="d-flex">
                                    <a href="#">
                                        <button type="button"
                                            class="btn-destroy btn-light mx-1 d-flex align-items-center h-100"
                                            style="margin-right:10px" data-dismiss="modal" aria-label="Close">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M7 14C10.866 14 14 10.866 14 7C14 3.13401 10.866 0 7 0C3.13401 0 0 3.13401 0 7C0 10.866 3.13401 14 7 14ZM5.03033 3.96967C4.73744 3.67678 4.26256 3.67678 3.96967 3.96967C3.67678 4.26256 3.67678 4.73744 3.96967 5.03033L5.93934 7L3.96967 8.96967C3.67678 9.26256 3.67678 9.73744 3.96967 10.0303C4.26256 10.3232 4.73744 10.3232 5.03033 10.0303L7 8.06066L8.96967 10.0303C9.26256 10.3232 9.73744 10.3232 10.0303 10.0303C10.3232 9.73744 10.3232 9.26256 10.0303 8.96967L8.06066 7L10.0303 5.03033C10.3232 4.73744 10.3232 4.26256 10.0303 3.96967C9.73744 3.67678 9.26256 3.67678 8.96967 3.96967L7 5.93934L5.03033 3.96967Z" fill="#6D7075"/>
                                            </svg>
                                            <span class="text-btnIner-primary ml-2">Hủy</span>
                                        </button>
                                    </a>

                                    <a href="#" data-type="payorder" onclick="getActionForm(this)">
                                        <button name="action" value="action_2" type="submit"
                                            class="custom-btn d-flex align-items-center h-100">
                                            <svg class="mr-1" xmlns="http://www.w3.org/2000/svg" width="14"
                                                height="14" viewBox="0 0 14 14" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M7 14C10.866 14 14 10.866 14 7C14 3.13401 10.866 0 7 0C3.13401 0 0 3.13401 0 7C0 10.866 3.13401 14 7 14ZM10.7836 5.42901C11.0858 5.08709 11.0695 4.55006 10.7472 4.22952C10.4248 3.90897 9.9186 3.9263 9.6164 4.26821L6.14921 8.19122L4.3315 6.4773C4.00127 6.16593 3.49561 6.19748 3.20208 6.54777C2.90855 6.89806 2.93829 7.43445 3.26852 7.74581L5.28032 9.6427C5.82041 10.152 6.64463 10.1122 7.13886 9.553L10.7836 5.42901Z"
                                                    fill="white"></path>
                                            </svg>
                                            <p class="m-0 ml-1">Xác nhận</p>
                                        </button>
                                    </a>
                                    </div>
                                </div>`;
                                $('#quickAction .modal-content .header-modal')
                                    .append(header);
                                var body = `
                                    <div class="content-left">
                                        <p class="font-weight-bold text-uppercase info-chung--modal text-center" style="padding: 10px 0;">THÔNG TIN</p>

                                        <div class="d-flex justify-content-between py-1 px-3 border align-items-center text-left text-nowrap position-relative"
                                            style="height:50px;">
                                            <span class="text-13 btn-click" style="flex: 1.5;">Đơn mua hàng</span>
                                            <span class="mx-1 text-13" style="flex: 2;">
                                                <input type="text" placeholder="Chọn thông tin"
                                                    class="border-0 w-100 bg-input-guest py-0 py-2 px-2 nameGuest" id="myInput"
                                                    style="border-radius:4px;" autocomplete="off" readonly=""
                                                    name="quotation_number">
                                            </span>
                                        </div>

                                        <div class="d-flex justify-content-between py-1 px-3 border border-top-0 align-items-center text-left text-nowrap position-relative"
                                            style="height:50px;">
                                            <span class="text-13 btn-click" style="flex: 1.5;">Nhà cung cấp</span>
                                            <span class="mx-1 text-13" style="flex: 2;">
                                                <input type="text" placeholder="Chọn thông tin"
                                                    class="border-0 w-100 bg-input-guest py-0 py-2 px-2 nameGuest" id="myInput"
                                                    style="border-radius:4px;" autocomplete="off" readonly=""
                                                    name="provides_name">
                                            </span>
                                        </div>

                                        <div class="d-flex justify-content-between py-1 px-3 border border-top-0 align-items-center text-left text-nowrap position-relative"
                                            style="height:50px;">
                                            <span class="text-13 btn-click" style="flex: 1.5;">Tổng tiền</span>
                                            <span class="mx-1 text-13" style="flex: 2;">
                                                <input type="text" placeholder="Chọn thông tin"
                                                    class="border-0 w-100 bg-input-guest py-0 py-2 px-2 nameGuest"
                                                    style="border-radius:4px;" autocomplete="off" name="total_bill">
                                            </span>
                                        </div>

                                        <div class="d-flex justify-content-between py-1 px-3 border border-top-0 align-items-center text-left text-nowrap position-relative"
                                            style="height:50px;">
                                            <span class="text-13 btn-click" style="flex: 1.5;">Hạn thanh toán</span>
                                            <span class="mx-1 text-13" style="flex: 2;">
                                                <input type="text" placeholder="Nhập thông tin"
                                                    class="text-13-black w-100 border-0 bg-input-guest nameGuest px-2 py-2 flatpickr-input active"
                                                    style="flex:2;" value="{{ date('Y-m-d') }}" id="datePicker2"
                                                    readonly="readonly">
                                                <input id="hiddenDateInput2" type="hidden" value="{{ date('Y-m-d') }}"
                                                    name="payment_date">
                                            </span>
                                        </div>

                                        <div class="d-flex justify-content-between py-1 px-3 border border-top-0 align-items-center text-left text-nowrap position-relative"
                                            style="height:50px;">
                                            <span class="text-13 btn-click" style="flex: 1.5;">Ngày thanh toán</span>
                                            <span class="mx-1 text-13" style="flex: 2;">
                                                <input type="text" placeholder="Nhập thông tin"
                                                    class="text-13-black w-100 border-0 bg-input-guest nameGuest px-2 py-2 flatpickr-input active"
                                                    style="flex:2;" value="{{ date('Y-m-d') }}" id="datePicker3"
                                                    readonly="readonly">
                                                <input id="hiddenDateInput3" type="hidden" value="{{ date('Y-m-d') }}"
                                                    name="payment_day">
                                            </span>
                                        </div>

                                        <div class="d-flex justify-content-between py-1 px-3 border border-top-0 align-items-center text-left text-nowrap position-relative"
                                            style="height:50px;">
                                            <span class="text-13 btn-click" style="flex: 1.5;">Hình thức thanh toán</span>
                                            <span class="mx-1 text-13" style="flex: 2;">
                                                <select name="payment_type" id="" class="border-0 text-13"
                                                    style="width:55%;">
                                                    <option value="Tiền mặt">Tiền mặt</option>
                                                    <option value="UNC">UNC</option>
                                                </select>
                                            </span>
                                        </div>

                                        <div class="d-flex justify-content-between py-1 px-3 border border-top-0 align-items-center text-left text-nowrap position-relative"
                                            style="height:50px;">
                                            <span class="text-13 btn-click" style="flex: 1.5;">Đã thanh toán</span>
                                            <span class="mx-1 text-13" style="flex: 2;">
                                                <input readonly="" id="payment" type="text" placeholder="Chọn thông tin"
                                                    class="text-13-black w-50 border-0 bg-input-guest nameGuest px-2 py-2"
                                                    style="flex:2;" value="">
                                            </span>
                                        </div>

                                        <div class="d-flex justify-content-between py-1 px-3 border border-top-0 align-items-center text-left text-nowrap position-relative"
                                            style="height:50px;">
                                            <span class="text-13 btn-click" style="flex: 1.5;">Dư nợ</span>
                                            <span class="mx-1 text-13" style="flex: 2;">
                                                <input type="text" placeholder="Chọn thông tin" id="debt" required=""
                                                    class="text-13-black w-50 border-0 bg-input-guest nameGuest px-2 py-2"
                                                    style="flex:2;" value="" readonly>
                                            </span>
                                        </div>

                                        <div class="d-flex justify-content-between py-1 px-3 border border-top-0 align-items-center text-left text-nowrap position-relative"
                                            style="height:50px;">
                                            <span class="text-13 btn-click" style="flex: 1.5;">Thanh toán</span>
                                            <span class="mx-1 text-13" style="flex: 2;">
                                                <input id="prepayment" type="text" placeholder="Nhập thông tin"
                                                    class="text-13-black w-50 border-0 bg-input-guest nameGuest px-2 py-2 payment_input"
                                                    style="flex:2; background-color:#F0F4FF;" name="payment">
                                            </span>
                                        </div>

                                        <div class="d-flex justify-content-between py-1 px-3 border border-top-0 align-items-center text-left text-nowrap position-relative"
                                            style="height:50px;">
                                            <span class="text-13 btn-click" style="flex: 1.5;"></span>
                                            <span class="mx-1 text-13" style="flex: 2;">
                                                <input type="checkbox" name="payment_all" onclick="cbPayment(this)"> 
                                                <span class="text-13 btn-click">Thanh toán đủ : <span class="payment_all"> </span></span>
                                            </span>
                                        </div>
                                     </div>`;
                                $('#quickAction .modal-content .modal-body')
                                    .append(body);
                                data.product.forEach((element, index) => {
                                    var input = `
                                            <input type="hidden" name="product_name[]" value="` + element
                                        .product_name + `">
                                            <input type="hidden" name="product_qty[]" value="` + formatCurrency(element
                                            .product_qty) + `">
                                            `;
                                    $('#quickAction .content-left')
                                        .append(input);
                                })
                                getDate(2)
                                getDate(3)

                                var debt = 0;
                                if (data.prePayment) {
                                    debt = data.total - data.prePayment
                                    $('#payment').val(formatCurrency(data
                                        .prePayment))
                                } else {
                                    debt = data.total - 0
                                    $('#payment').val(0)
                                }

                                $("input[name='quotation_number']").val(data
                                    .quotation_number)
                                $("input[name='provides_name']").val(data
                                    .provide_name)
                                $("input[name='total_bill']").val(formatCurrency(
                                    data.total))
                                $(".payment_all").text(formatCurrency(debt))
                                $("#debt").val(formatCurrency(debt))
                                $('#prepayment').on('input', function() {
                                    checkQty(this, debt)
                                })
                            }
                        })
                    }
                }
            })
        });
        $(document).click(function() {
            menu.css({
                display: 'none'
            });
        });

    });


    $(document).on('contextmenu', function(e) {
        e.preventDefault();
    })

    // Hiển thị thông tin sản phẩm
    $(document).on('click', '.info-product', function() {
        $('#productModal .product_show').empty()
        var nameProduct = $(this).closest('td').find('input[name^="product_name"]').val()
        $.ajax({
            url: "{{ route('getHistoryImport') }}",
            type: 'GET',
            data: {
                product_name: nameProduct,
                type: "product"
            },
            success: function(data) {
                var modal_body = `
                <b>Tên sản phẩm: </b> ` + data['product'].product_name + `<br> 
                <b>Đơn vị: </b> ` + data['product'].product_unit + ` <br>
                <b>Tồn kho: </b> ` + formatCurrency(data['product'].product_inventory) + ` <br>
                <b>Thuế: </b> ` + (data['product'].product_tax == 99 ? "NOVAT" : data['product'].product_tax + '%') + `
                `;
                $('.product_show').append(modal_body)
            },
        });
    })
</script>
