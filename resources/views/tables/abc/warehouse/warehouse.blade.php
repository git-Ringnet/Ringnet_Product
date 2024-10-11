<x-navbar :title="$title" activeGroup="systemFirst" activeName="warehouse"></x-navbar>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper m-0 min-height--none">
    <!-- Content Header (Page header) -->
    <div class="content-header-fixed p-0 border-bottom-0">
        <div class="content__header--inner">
            <div class="content__heading--left">
                <span class="ml-4">Thiết lập ban đầu</span>
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                        fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                            fill="#26273B" fill-opacity="0.8" />
                    </svg>
                </span>
                <span class="font-weight-bold text-secondary">Kho</span>
            </div>
            <div class="d-flex content__heading--right">
                <form id="exportForm" action="{{ route('exportWH') }}" method="GET" style="display: none;">
                    @csrf
                </form>

                <a href="#" class="activity mr-3" data-name1="NCC" data-des="Export excel"
                    onclick="event.preventDefault(); document.getElementById('exportForm').submit();">
                    <button type="button" class="btn btn-outline-secondary mx-1 d-flex align-items-center h-100">
                        <i class="fa-regular fa-file-excel"></i>
                        <span class="m-0 ml-1">Xuất Excel</span>
                    </button>
                </a>
                <a href="{{ route('warehouse.create', $workspacename) }}" class="mr-1">
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
                        <p class="m-0 ml-1">Tạo mới</p>
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
                                <div class="dropdown mx-2 filter-all">
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
                                    <div class="dropdown-menu" id="dropdown-menu"
                                        aria-labelledby="dropdownMenuButton">
                                        <div class="search-container px-2">
                                            <input type="text" placeholder="Tìm kiếm" id="myInput"
                                                onkeyup="filterFunction()" class="text-13">
                                            <span class="search-icon mr-2">
                                                <i class="fas fa-search"></i>
                                            </span>
                                        </div>
                                        <div class="scrollbar">
                                            <button class="dropdown-item btndropdown text-13-black"
                                                id="btn-warehouseCode" data-button="warehouseCode" type="button">Mã
                                                kho
                                            </button>
                                            <button class="dropdown-item btndropdown text-13-black"
                                                id="btn-warehouseName" data-button="warehouseName" type="button">Tên
                                                kho
                                            </button>
                                            <button class="dropdown-item btndropdown text-13-black" id="btn-address"
                                                data-button="address" type="button">Địa chỉ
                                            </button>
                                        </div>
                                        <!-- Input fields to filter -->
                                        <x-filter-text name="warehouseCode" title="Mã kho" />
                                        <x-filter-text name="warehouseName" title="Tên kho" />
                                        <x-filter-text name="address" title="Địa chỉ" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main content -->
    <section class="content margin-top-127">
        <div class="container-fluided">
            <div class="row result-filter-warehouse margin-left30 my-1">
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
                                            <input type="checkbox" name="all" id="checkall"
                                                class="checkall-btn">

                                        </th>
                                        <th scope="col" class="border-top-0 bg-white pl-0 border-bottom"
                                            style="width: 10%;">
                                            <span class="d-flex">
                                                <a href="#" class="sort-link btn-submit"
                                                    data-sort-by="product_code" data-sort-type="DESC">
                                                    <button class="btn-sort" type="submit">
                                                        <span class="text-13">Mã kho
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
                                                        <span class="text-13">Tên kho</span>
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
                                                        <span class="text-13">Địa chỉ</span>
                                                    </button>
                                                </a>
                                                <div class="icon" id="icon-product_inventory"></div>
                                            </span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="tbody-warehouse">
                                    @foreach ($wareHouse as $item)
                                        <tr class="position-relative warehouse-info"
                                            onclick="handleRowClick('checkbox', event);">
                                            <input type="hidden" name="id-warehouse" class="id-warehouse"
                                                id="id-warehouse" value="{{ $item->id }}">
                                            <td class="border-bottom border-top-0">
                                                <span class="margin-Right10">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="6"
                                                        height="10" viewBox="0 0 6 10" fill="none">
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
                                                {{ $item->warehouse_code }}
                                            </td>
                                            <td class="py-2 text-13-black border-bottom border-top-0">
                                                <a class="duongdan"
                                                    href="{{ route('warehouse.show', ['workspace' => $workspacename, 'warehouse' => $item->id]) }}">
                                                    {{ $item->warehouse_name }}
                                                </a>
                                            </td>
                                            <td class="py-2 text-13-black border-bottom border-top-0">
                                                {{ $item->warehouse_address }}
                                            </td>
                                            <td class="position-absolute m-0 p-0 border-0 bg-hover-icon border-bottom border-top-0"
                                                style="right: 10px; top: 7px;">
                                                <div class="d-flex w-100">
                                                    <a
                                                        href="{{ route('warehouse.edit', ['workspace' => $workspacename, 'warehouse' => $item->id]) }}">
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
<script src="{{ asset('/dist/js/number.js') }}"></script>

<script type="text/javascript">
    $(document).on('change', '#file_restore', function(e) {
        e.preventDefault();
        $('#restore_data')[0].submit();
    })
    $(document).on('change', '#file_restore', function(e) {
        e.preventDefault();
        $('#restore_data')[0].submit();
    })
    $(document).on('click', '.btn-submit', function(e) {
        if (!$(e.target).is('input[type="checkbox"]')) e.preventDefault();
        var buttonElement = this;
        // Collect input values and reset if delete action is triggered
        var formData = {
            search: $('#search').val(), // Dữ liệu tìm kiếm chung
            warehouseCode: getData('#warehouseCode', this), // Lấy dữ liệu từ trường Mã kho
            warehouseName: getData('#warehouseName', this), // Lấy dữ liệu từ trường Tên kho
            address: getData('#address', this), // Lấy dữ liệu từ trường Địa chỉ
            sort: getSortData(buttonElement) // Dữ liệu sắp xếp nếu có
        };
        // Hide options if needed
        if (!$(e.target).closest('li, input[type="checkbox"]').length) {
            $('#' + $(this).data('button-name') + '-options').hide();
        }

        // AJAX request
        $.ajax({
            type: 'get',
            url: "{{ route('searchWareHouse') }}",
            data: formData,
            success: function(data) {
                updateFilters(data, filters, '.result-filter-warehouse', '.tbody-warehouse',
                    '.warehouse-info',
                    '.id-warehouse', $(this).data('button'));
            }
        });
        $.ajaxSetup({
            headers: {
                'csrftoken': '{{ csrf_token() }}'
            }
        });
    });
</script>
