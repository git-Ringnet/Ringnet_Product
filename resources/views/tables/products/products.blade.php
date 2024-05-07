<x-navbar :title="$title" activeGroup="products" activeName="product"></x-navbar>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper m-0 min-height--none">
    <!-- Content Header (Page header) -->
    <div class="content-header-fixed p-0 margin-250">
        <div class="content__header--inner margin-left32">
            <div class="content__heading--left">
                <span>Kho hàng</span>
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                        fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                            fill="#26273B" fill-opacity="0.8" />
                    </svg>
                </span>
                <span class="font-weight-bold text-secondary">Sản phẩm</span>
            </div>
            <div class="d-flex content__heading--right">
                <a href="{{ route('inventory.create', $workspacename) }}" class="mr-1">
                    <button type="button" class="custom-btn d-flex align-items-center h-100 mx-1">
                        <svg width="12" height="12" viewBox="0 0 18 18" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M9 0C9.58186 -2.96028e-08 10.0536 0.471694 10.0536 1.05356L10.0536 16.9464C10.0536 17.5283 9.58186 18 9 18C8.41814 18 7.94644 17.5283 7.94644 16.9464V1.05356C7.94644 0.471694 8.41814 -2.96028e-08 9 0Z"
                                fill="white"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M18 9C18 9.58187 17.5283 10.0536 16.9464 10.0536H1.05356C0.471694 10.0536 -2.07219e-07 9.58187 0 9C-7.69672e-07 8.41814 0.471695 7.94644 1.05356 7.94644H16.9464C17.5283 7.94644 18 8.41814 18 9Z"
                                fill="white"></path>
                        </svg>
                        <span class="text-btnIner-primary ml-2">Tạo mới</span>
                    </button>
                </a>
            </div>
        </div>
    </div>
    <div class="content-filter-all">
        <div class="bg-filter-search pl-4 border-bottom-0">
            <div class="content-wrapper1 py-2">
                <div class="row m-auto filter p-0">
                    <div class="w-100">
                        <div class="row mr-0">
                            <div class="col-md-5 d-flex align-items-center">
                                <form action="" method="get" id="search-filter" class="p-0 m-0">
                                    <div class="position-relative ml-1">
                                        <input type="text" placeholder="Tìm kiếm" id="search" name="keywords"
                                            style="outline: none;" class="pr-4 w-100 input-search text-13"
                                            value="{{ request()->keywords }}" />
                                        <span id="search-icon" class="search-icon">
                                            <i class="fas fa-search btn-submit"></i>
                                        </span>
                                        <input class="btn-submit" type="submit" id="hidden-submit" name="hidden-submit"
                                            style="display: none;" />
                                    </div>
                                </form>
                                <div class="dropdown mx-2">
                                    <button class="btn-filter_search" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                                        <span class="text-btnIner">Bộ lọc</span>
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M5.42342 6.92342C5.65466 6.69219 6.02956 6.69219 6.26079 6.92342L9 9.66264L11.7392 6.92342C11.9704 6.69219 12.3453 6.69219 12.5766 6.92342C12.8078 7.15466 12.8078 7.52956 12.5766 7.76079L9.41868 10.9187C9.18745 11.1499 8.81255 11.1499 8.58132 10.9187L5.42342 7.76079C5.19219 7.52956 5.19219 7.15466 5.42342 6.92342Z"
                                                fill="#6B6F76" />
                                        </svg>
                                        </span>
                                    </button>
                                    <div class="dropdown-menu" id="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <div class="search-container px-2">
                                            <input type="text" placeholder="Tìm kiếm" id="myInput"
                                                onkeyup="filterFunction()" class="text-13">
                                            <span class="search-icon mr-2">
                                                <i class="fas fa-search"></i>
                                            </span>
                                        </div>
                                        <div class="scrollbar">
                                            <button class="dropdown-item btndropdown text-13-black" id="btn-code"
                                                data-button="code" type="button">Mã hàng hóa
                                            </button>
                                            <button class="dropdown-item btndropdown text-13-black" id="btn-name"
                                                data-button="name" type="button">Tên hàng hóa
                                            </button>
                                            <button class="dropdown-item btndropdown text-13-black" id="btn-inventory"
                                                data-button="inventory" type="button">Số lượng tồn
                                            </button>
                                        </div>
                                    </div>
                                    <x-filter-text name="code" title="Mã hàng hoá" />
                                    <x-filter-checkbox :dataa='$product' button="products" name="name"
                                        title="Tên hàng hóa" namedisplay="product_name" />
                                    <x-filter-compare name="inventory" button="products" title="Số lượng tồn" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="{{ route('exportDatabase') }}">
        Export
    </a>
</div>
<!-- Main content -->
<section class="content margin-top-75">
    <div class="container-fluided margin-250">
        <div class="row result-filter-product margin-left30 my-1">
        </div>
        <div class="row p-0 m-0">
            <div class="col-12 p-0 m-0">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="outer2">
                        <table id="example2" class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" class="border-bottom border-top-0"
                                        style="width:5%;padding-left: 2rem;" class="border-top-0 bg-white">
                                        <input type="checkbox" name="all" id="checkall" class="checkall-btn">

                                    </th>
                                    <th scope="col" class="border-top-0 bg-white pl-0 border-bottom"
                                        style="width: 10%;">
                                        <span class="d-flex">
                                            <a href="#" class="sort-link btn-submit"
                                                data-sort-by="product_code" data-sort-type="DESC">
                                                <button class="btn-sort" type="submit">
                                                    <span class="text-13">Mã hàng hóa
                                                    </span>
                                                </button>
                                            </a>
                                            <div class="icon" id="icon-product_code"></div>
                                        </span>
                                    </th>
                                    <th scope="col" class="border-top-0 bg-white border-bottom">
                                        <span class="d-flex">
                                            <a href="#" class="sort-link btn-submit"
                                                data-sort-by="product_name" data-sort-type="DESC">
                                                <button class="btn-sort" type="submit">
                                                    <span class="text-13">Tên hàng hóa</span>
                                                </button>
                                            </a>
                                            <div class="icon" id="icon-product_name"></div>
                                        </span>
                                    </th>
                                    <th scope="col" class="border-top-0 bg-white border-bottom"
                                        style="width: 14%;">
                                        <span class="d-flex">
                                            <a href="#" class="sort-link btn-submit"
                                                data-sort-by="product_inventory" data-sort-type="DESC">
                                                <button class="btn-sort" type="submit">
                                                    <span class="text-13">Số lượng tồn</span>
                                                </button>
                                            </a>
                                            <div class="icon" id="icon-product_inventory"></div>
                                        </span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="tbody-product">
                                @foreach ($product as $item)
                                    <tr class="position-relative product-info"
                                        onclick="handleRowClick('checkbox', event);">
                                        <input type="hidden" name="id-product" class="id-product" id="id-product"
                                            value="{{ $item->id }}">
                                        <td class="border-bottom border-top-0">
                                            <span class="margin-Right10">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="6" height="10"
                                                    viewBox="0 0 6 10" fill="none">
                                                    <g clip-path="url(#clip0_1710_10941)">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M1 8C1.55228 8 2 8.44772 2 9C2 9.55228 1.55228 10 1 10C0.447715 10 0 9.55228 0 9C0 8.44772 0.447715 8 1 8ZM5 8C5.55228 8 6 8.44772 6 9C6 9.55228 5.55228 10 5 10C4.44772 10 4 9.55228 4 9C4 8.44772 4.44772 8 5 8ZM1 4C1.55228 4 2 4.44772 2 5C2 5.55228 1.55228 6 1 6C0.447715 6 0 5.55228 0 5C0 4.44772 0.447715 4 1 4ZM5 4C5.55228 4 6 4.44772 6 5C6 5.55228 5.55228 6 5 6C4.44772 6 4 5.55228 4 5C4 4.44772 4.44772 4 5 4ZM1 0C1.55228 0 2 0.447715 2 1C2 1.55228 1.55228 2 1 2C0.447715 2 0 1.55228 0 1C0 0.447715 0.447715 0 1 0ZM5 0C5.55228 0 6 0.447715 6 1C6 1.55228 5.55228 2 5 2C4.44772 2 4 1.55228 4 1C4 0.447715 4.44772 0 5 0Z"
                                                            fill="#282A30" />
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_1710_10941">
                                                            <rect width="6" height="10" fill="white" />
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                            </span>
                                            <input type="checkbox" class="checkall-btn" name="ids[]"
                                                id="checkbox" value="" onclick="event.stopPropagation();">
                                        </td>
                                        <td class="py-2 text-13-black pl-0 border-bottom border-top-0">
                                            {{ $item->product_code }}
                                        </td>
                                        <td class="py-2 text-13-black border-bottom border-top-0">
                                            <a class="duongdan"
                                                href="{{ route('inventory.show', ['workspace' => $workspacename, 'inventory' => $item->id]) }}">
                                                {{ $item->product_name }}
                                            </a>
                                        </td>
                                        <td class="py-2 text-13-black border-bottom border-top-0">
                                            {{ number_format($item->product_inventory) }}
                                        </td>
                                        <td class="position-absolute m-0 p-0 border-0 bg-hover-icon border-bottom border-top-0"
                                            style="right: 10px; top: 7px;">
                                            <div class="d-flex w-100">
                                                <a
                                                    href="{{ route('inventory.edit', ['workspace' => $workspacename, 'inventory' => $item->id]) }}">
                                                    <div class="m-0 px-2 py-1 mx-2 rounded">
                                                        <svg width="16" height="16" viewBox="0 0 16 16"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path opacity="0.985" fill-rule="evenodd"
                                                                clip-rule="evenodd"
                                                                d="M11.1719 1.04696C11.7535 0.973552 12.2743 1.11418 12.7344 1.46883C13.001 1.72498 13.2562 1.9906 13.5 2.26571C13.9462 3.00226 13.9358 3.73143 13.4688 4.45321C10.9219 7.04174 8.35416 9.60946 5.76563 12.1563C5.61963 12.245 5.46338 12.3075 5.29688 12.3438C4.59413 12.4153 3.891 12.483 3.1875 12.547C2.61265 12.4982 2.32619 12.1857 2.32813 11.6095C2.3716 10.8447 2.44972 10.0843 2.5625 9.32821C2.60666 9.22943 2.65874 9.13568 2.71875 9.04696C5.26563 6.50008 7.8125 3.95321 10.3594 1.40633C10.6073 1.22846 10.8781 1.10867 11.1719 1.04696ZM11.3594 2.04696C11.5998 2.02471 11.8185 2.08201 12.0156 2.21883C12.2188 2.42196 12.4219 2.62508 12.625 2.82821C12.8393 3.14436 12.8497 3.4673 12.6562 3.79696C12.4371 4.02136 12.2131 4.24011 11.9844 4.45321C11.4427 3.93236 10.9115 3.40111 10.3906 2.85946C10.5933 2.64116 10.8016 2.42762 11.0156 2.21883C11.1255 2.14614 11.2401 2.08885 11.3594 2.04696ZM9.60938 3.60946C10.1552 4.13961 10.6968 4.67608 11.2344 5.21883C9.21353 7.23968 7.19272 9.26049 5.17188 11.2813C4.571 11.3686 3.96684 11.4364 3.35938 11.4845C3.41572 10.8909 3.473 10.2971 3.53125 9.70321C5.56359 7.67608 7.58962 5.64483 9.60938 3.60946Z"
                                                                fill="#6C6F74"></path>
                                                            <path opacity="0.979" fill-rule="evenodd"
                                                                clip-rule="evenodd"
                                                                d="M1.17188 14.1406C5.71356 14.1354 10.2552 14.1406 14.7969 14.1563C15.0348 14.2355 15.1598 14.4022 15.1719 14.6563C15.147 14.915 15.0116 15.0816 14.7656 15.1563C10.2448 15.1771 5.72397 15.1771 1.20312 15.1563C0.807491 14.9903 0.708531 14.7143 0.90625 14.3281C0.978806 14.2377 1.06735 14.1752 1.17188 14.1406Z"
                                                                fill="#6C6F74"></path>
                                                        </svg>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
{{-- Content --}}


{{-- Pagination --}}
{{-- <div class="paginator mt-2 d-flex justify-content-end">
    {{ $product->appends(request()->except('page'))->links() }}
</div> --}}

</div>
<script src="{{ asset('/dist/js/filter.js') }}"></script>

<script type="text/javascript">
    $(document).on('change', '#file_restore', function(e) {
        e.preventDefault();
        $('#restore_data')[0].submit();
    })

    function filtername() {
        filterButtons("myInput-name", "ks-cboxtags-name");
    }

    function filtercode() {
        filterButtons("myInput-code", "ks-cboxtags-code");
    }
    var filters = [];
    var idName = [];
    var svgtop =
        "<svg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><path fill-rule='evenodd' clip-rule='evenodd' d='M11.5006 19.0009C11.6332 19.0009 11.7604 18.9482 11.8542 18.8544C11.9480 18.7607 12.0006 18.6335 12.0006 18.5009V6.70789L15.1466 9.85489C15.2405 9.94878 15.3679 10.0015 15.5006 10.0015C15.6334 10.0015 15.7607 9.94878 15.8546 9.85489C15.9485 9.76101 16.0013 9.63367 16.0013 9.50089C16.0013 9.36812 15.9485 9.24078 15.8546 9.14689L11.8546 5.14689C11.8082 5.10033 11.7530 5.06339 11.6923 5.03818C11.6315 5.01297 11.5664 5 11.5006 5C11.4349 5 11.3697 5.01297 11.3090 5.03818C11.2483 5.06339 11.1931 5.10033 11.1466 5.14689L7.14663 9.14689C7.10014 9.19338 7.06327 9.24857 7.03811 9.30931C7.01295 9.37005 7 9.43515 7 9.50089C7 9.63367 7.05274 9.76101 7.14663 9.85489C7.24052 9.94878 7.36786 10.0015 7.50063 10.0015C7.63341 10.0015 7.76075 9.94878 7.85463 9.85489L11.0006 6.70789V18.5009C11.0006 18.6335 11.0533 18.7607 11.1471 18.8544C11.2408 18.9482 11.3680 19.0009 11.5006 19.0009Z' fill='#555555'/></svg>";
    var svgbot =
        "<svg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><path fill-rule='evenodd' clip-rule='evenodd' d='M11.5006 5C11.6332 5 11.7604 5.05268 11.8542 5.14645C11.948 5.24021 12.0006 5.36739 12.0006 5.5V17.293L15.1466 14.146C15.2405 14.0521 15.3679 13.9994 15.5006 13.9994C15.6334 13.9994 15.7607 14.0521 15.8546 14.146C15.9485 14.2399 16.0013 14.3672 16.0013 14.5C16.0013 14.6328 15.9485 14.7601 15.8546 14.854L11.8546 18.854C11.8082 18.9006 11.753 18.9375 11.6923 18.9627C11.6315 18.9879 11.5664 19.0009 11.5006 19.0009C11.4349 19.0009 11.3697 18.9879 11.309 18.9627C11.2483 18.9375 11.1931 18.9006 11.1466 18.854L7.14663 14.854C7.05274 14.7601 7 14.6328 7 14.5C7 14.3672 7.05274 14.2399 7.14663 14.146C7.24052 14.0521 7.36786 13.9994 7.50063 13.9994C7.63341 13.9994 7.76075 14.0521 7.85463 14.146L11.0006 17.293V5.5C11.0006 5.36739 11.0533 5.24021 11.1471 5.14645C11.2408 5.05268 11.368 5 11.5006 5Z' fill='#555555'/></svg>"

    $(document).on('click', '.btn-submit', function(e) {
        if (!$(e.target).is('input[type="checkbox"]')) {
            e.preventDefault();
        }
        var buttonName = $(this).data('button');
        var btn_submit = $(this).data('button-name');

        if ($(this).data('button-name') === 'name') {
            $('.ks-cboxtags-name input[type="checkbox"]').each(function() {
                const value = $(this).val();
                if ($(this).is(':checked') && idName.indexOf(value) === -1) {
                    idName.push(value);
                } else if (!$(this).is(':checked')) {
                    const index = idName.indexOf(value);
                    if (index !== -1) {
                        idName.splice(index, 1);
                    }
                }
            });
        }
        var search = $('#search').val();
        var code = $('#code').val();
        var inventory_op = $('.inventory-operator').val();
        var inventory_val = $('.inventory-quantity').val();
        var inventory = [inventory_op, inventory_val];
        var sort_by = '';
        if (typeof $(this).data('sort-by') !== 'undefined') {
            sort_by = $(this).data('sort-by');
        }
        var sort_type = $(this).data('sort-type');
        sort_type = (sort_type === 'ASC') ? 'DESC' : 'ASC';
        $(this).data('sort-type', sort_type);
        $('.icon').text('');
        var iconId = 'icon-' + sort_by;
        var iconDiv = $('#' + iconId);
        iconDiv.html((sort_type === 'ASC') ? svgtop : svgbot);
        sort = [
            sort_by, sort_type
        ];
        if (!$(e.target).closest('li, input[type="checkbox"]').length) {
            $('#' + btn_submit + '-options').hide();
        }
        $(".btn-filter_search").prop("disabled", false);

        if ($(this).data('delete') === 'code') {
            code = null;
            $('#code').val('');
        }
        if ($(this).data('delete') === 'idName') {
            idName = [];
            // $('.deselect-all-idName').click();
            $('.ks-cboxtags-name input[type="checkbox"]').prop('checked', false);
        }
        if ($(this).data('delete') === 'inventory') {
            inventory = null;
            $('.inventory-quantity').val('');
        }
        $.ajax({
            type: 'get',
            url: "{{ route('searchInventory') }}",
            data: {
                search: search,
                inventory: inventory,
                idName: idName,
                code: code,
                sort: sort,
            },
            success: function(data) {
                // Hiển thị label dữ liệu tìm kiếm ...
                var existingNames = [];
                data.filters.forEach(function(item) {
                    // Kiểm tra xem item.name đã tồn tại trong mảng filters chưa
                    if (filters.indexOf(item.name) === -1) {
                        filters.push(item.name);
                    }
                    existingNames.push(item.name);
                });

                filters = filters.filter(function(name) {
                    return existingNames.includes(name);
                });
                $('.result-filter-product').empty();
                if (data.filters.length > 0) {
                    $('.result-filter-product').addClass('has-filters');
                } else {
                    $('.result-filter-product').removeClass('has-filters');
                }
                // Lặp qua mảng filters để tạo và render các phần tử
                data.filters.forEach(function(item) {
                    var index = filters.indexOf(item.name);
                    // Tạo thẻ item-filter
                    var itemFilter = $('<div>').addClass(
                        'item-filter span input-search d-flex justify-content-center align-items-center mr-2'
                    ).attr('data-icon', item.icon);
                    itemFilter.css('order', index);
                    // Thêm nội dung và thuộc tính data vào thẻ item-filter
                    itemFilter.append(
                        '<span class="text text-13-black m-0" style="flex:2;">' +
                        item.value +
                        '</span><i class="fa-solid fa-xmark btn-submit" data-delete="' +
                        item.name + '" data-button="' + buttonName +
                        '"></i>');
                    // Thêm thẻ item-filter vào resultfilters
                    $('.result-filter-product').append(itemFilter);
                });

                // Ẩn hiện dữ liệu khi đã filters
                var productIds = [];
                // Lặp qua mảng provides và thu thập các productIds
                data.products.forEach(function(item) {
                    var productId = item.id;
                    productIds.push(productId);
                });
                // Ẩn tất cả các phần tử .product-info
                // $('.product-info').hide();
                // Lặp qua từng phần tử .product-info để hiển thị và cập nhật data-position
                $('.product-info').each(function() {
                    var value = parseInt($(this).find('.id-product').val());
                    var index = productIds.indexOf(value);
                    if (index !== -1) {
                        $(this).show();
                        // Cập nhật data-position
                        $(this).attr('data-position', index + 1);
                    } else {
                        $(this).hide();
                    }
                });
                // Tạo một bản sao của mảng phần tử .product-info
                var clonedElements = $('.product-info').clone();
                // Sắp xếp các phần tử trong bản sao theo data-position
                var sortedElements = clonedElements.sort(function(a, b) {
                    return $(a).data('position') - $(b).data('position');
                });
                // Thay thế các phần tử trong .tbody-product bằng các phần tử đã sắp xếp
                $('.tbody-product').empty().append(sortedElements);
            }
        });
        $.ajaxSetup({
            headers: {
                'csrftoken': '{{ csrf_token() }}'
            }
        });
    });
</script>
