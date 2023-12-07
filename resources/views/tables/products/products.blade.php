<x-navbar :title="$title" activeGroup="products" activeName="product"></x-navbar>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header p-0">
        <div class="container-fluided">
            <div class="mb-3">
                <span>Tồn kho</span>
                <span>/</span>
                <span class="font-weight-bold">Sản phẩm</span>
            </div>

            <a href="{{ route('exportDatabase') }}">
                Export
            </a>

            <div class="row m-0 mb-1">
                <a href="{{ route('inventory.create') }}">
                    <button type="button" class="custom-btn d-flex align-items-center h-100" style="margin-right:10px">
                        <svg class="mr-2" width="18" height="18" viewBox="0 0 18 18" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M9 0C9.58186 -2.96028e-08 10.0536 0.471694 10.0536 1.05356L10.0536 16.9464C10.0536 17.5283 9.58186 18 9 18C8.41814 18 7.94644 17.5283 7.94644 16.9464V1.05356C7.94644 0.471694 8.41814 -2.96028e-08 9 0Z"
                                fill="white" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M18 9C18 9.58187 17.5283 10.0536 16.9464 10.0536H1.05356C0.471694 10.0536 -2.07219e-07 9.58187 0 9C-7.69672e-07 8.41814 0.471695 7.94644 1.05356 7.94644H16.9464C17.5283 7.94644 18 8.41814 18 9Z"
                                fill="white" />
                        </svg>
                        <span>Tạo mới</span>
                    </button>
                </a>
                <button class="btn-option">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M21 12C21 10.8954 20.1046 10 19 10C17.8954 10 17 10.8954 17 12C17 13.1046 17.8954 14 19 14C20.1046 14 21 13.1046 21 12Z"
                            fill="#42526E" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M14 12C14 10.8954 13.1046 10 12 10C10.8954 10 10 10.8954 10 12C10 13.1046 10.8954 14 12 14C13.1046 14 14 13.1046 14 12Z"
                            fill="#42526E" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M7 12C7 10.8954 6.10457 10 5 10C3.89543 10 3 10.8954 3 12C3 13.1046 3.89543 14 5 14C6.10457 14 7 13.1046 7 12Z"
                            fill="#42526E" />
                    </svg>
                </button>
            </div>
        </div>
    </section>
    <hr class="mt-3">

    {{-- Content --}}
    <section class="content">
        <div class="container-fluided">
            <div class="row">
                <div class="col-12">
                    <div class="row m-auto filter pt-2 pb-4">
                        <form class="w-100" action="" method="get" id='search-filter'>
                            <div class="col-12 col-md-12 mr-0">
                                <div class="row d-flex">
                                    <div class="position-relative">
                                        <input type="text" placeholder="Tìm kiếm" id="search" name="keywords"
                                            class="pr-4 w-100 input-search" value="{{ request()->keywords }}">
                                        <span id="search-icon" class="search-icon"><i
                                                class="fas fa-search btn-submit"></i></span>
                                        <input class="btn-submit" type="submit" id="hidden-submit" name="hidden-submit"
                                            style="display: none;">
                                    </div>
                                    <div class="dropdown mx-2">
                                        <button class="btn filter-btn" type="button" id="dropdownMenuButton"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span>
                                                Bộ lọc<svg width="18" height="18" viewBox="0 0 18 18"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M5.42342 6.92342C5.65466 6.69219 6.02956 6.69219 6.26079 6.92342L9 9.66264L11.7392 6.92342C11.9704 6.69219 12.3453 6.69219 12.5766 6.92342C12.8078 7.15466 12.8078 7.52956 12.5766 7.76079L9.41868 10.9187C9.18745 11.1499 8.81255 11.1499 8.58132 10.9187L5.42342 7.76079C5.19219 7.52956 5.19219 7.15466 5.42342 6.92342Z"
                                                        fill="white" />
                                                </svg>
                                            </span>
                                        </button>
                                        <div class="dropdown-menu" id="dropdown-menu"
                                            aria-labelledby="dropdownMenuButton">
                                            <div class="search-container px-2">
                                                <input type="text" placeholder="Tìm kiếm" id="myInput"
                                                    onkeyup="filterFunction()">
                                                <span class="search-icon"><i class="fas fa-search"></i></span>
                                            </div>
                                            <div class="scrollbar">
                                                <button class="dropdown-item btndropdown" id="btn-code"
                                                    data-button="code" type="button">Mã hàng hóa</button>
                                                <button class="dropdown-item btndropdown" id="btn-name"
                                                    data-button="name" type="button">Tên hàng hóa
                                                </button>
                                                <button class="dropdown-item btndropdown" id="btn-inventory"
                                                    data-button="inventory" type="button">Số lượng tồn</button>
                                            </div>
                                        </div>

                                        <x-filter-checkbox :dataa='$product' name="code" title="Mã hàng hóa"
                                            namedisplay="product_code" />
                                        <x-filter-checkbox :dataa='$product' name="name" title="Tên hàng hóa"
                                            namedisplay="product_name" />
                                        <x-filter-compare name="inventory" title="Số lượng tồn" />
                                    </div>
                                    <div class="filter-results d-flex m-0">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card scroll-custom">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-hover">
                                <thead class="sticky-head">
                                    <tr>
                                        <th><input type="checkbox" name="all" id="checkall"></th>
                                        <th scope="col">
                                            <span class="d-flex">
                                                <a href="#" class="sort-link" data-sort-by="product_code"
                                                    data-sort-type="ASC"><button class="btn-sort" type="submit">
                                                        Mã hàng hóa
                                                    </button></a>
                                                <div class="icon" id="icon-product_code"></div>
                                            </span>
                                        </th>
                                        <th scope="col">
                                            <span class="d-flex">
                                                <a href="#" class="sort-link" data-sort-by="product_name"
                                                    data-sort-type="ASC"><button class="btn-sort" type="submit">
                                                        Tên hàng hóa
                                                    </button></a>
                                                <div class="icon" id="icon-product_name"></div>
                                            </span>
                                        </th>
                                        <th scope="col">
                                            <span class="d-flex">
                                                <a href="#" class="sort-link" data-sort-by="product_inventory"
                                                    data-sort-type="ASC"><button class="btn-sort" type="submit">
                                                        Số lượng tồn
                                                    </button></a>
                                                <div class="icon" id="icon-product_inventory"></div>
                                            </span>
                                        </th>
                                        <th scope="col">
                                            <span class="d-flex">
                                                <a href="#" class="sort-link" data-sort-by="id"
                                                    data-sort-type="ASC"><button class="btn-sort" type="submit">
                                                    </button></a>
                                                <div class="icon" id="icon-id"></div>
                                            </span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product as $item)
                                        <tr>
                                            <td><input type="checkbox"></td>
                                            <td>{{ $item->product_code }}</td>
                                            <td><a href="{{ route('inventory.show', $item->id) }}">
                                                    {{ $item->product_name }}
                                                </a></td>
                                            <td>{{ number_format($item->product_inventory) }}</td>
                                            <td>
                                                <a href="# ">
                                                    {{-- {{ route('inventory.edit', $item->id) }} --}}
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M21 12C21 10.8954 20.1046 10 19 10C17.8954 10 17 10.8954 17 12C17 13.1046 17.8954 14 19 14C20.1046 14 21 13.1046 21 12Z"
                                                            fill="#42526E"></path>
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M14 12C14 10.8954 13.1046 10 12 10C10.8954 10 10 10.8954 10 12C10 13.1046 10.8954 14 12 14C13.1046 14 14 13.1046 14 12Z"
                                                            fill="#42526E"></path>
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M7 12C7 10.8954 6.10457 10 5 10C3.89543 10 3 10.8954 3 12C3 13.1046 3.89543 14 5 14C6.10457 14 7 13.1046 7 12Z"
                                                            fill="#42526E"></path>
                                                    </svg>
                                                </a>
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


    {{-- Pagination --}}
    <div class="paginator mt-2 d-flex justify-content-end">
        {{ $product->appends(request()->except('page'))->links() }}
    </div>
    {{-- @php
        $paginationRange = App\Helpers\PaginationHelper::calculatePaginationRange($product->currentPage(), $product->lastPage());
    @endphp
    <div class="pagination mt-4 d-flex justify-content-end">
        <ul>
            @if ($paginationRange['start'] > 1)
                <li><a href="{{ $product->url(1) }}">1</a></li>
                @if ($paginationRange['start'] > 2)
                    <li><span>...</span></li>
                @endif
            @endif

            @for ($i = $paginationRange['start']; $i <= $paginationRange['end']; $i++)
                <li class="{{ $i == $product->currentPage() ? 'active' : '' }}">
                    <a href="{{ $product->url($i) }}">{{ $i }}</a>
                </li>
            @endfor

            @if ($paginationRange['end'] < $product->lastPage())
                @if ($paginationRange['end'] < $product->lastPage() - 1)
                    <li><span>...</span></li>
                @endif
                <li><a href="{{ $product->url($product->lastPage()) }}">{{ $product->lastPage() }}</a>
                </li>
            @endif
        </ul>
    </div> --}}
</div>
<script src="{{ asset('/dist/js/filter.js') }}"></script>

<script type="text/javascript">
    function filtername() {
        filterButtons("myInput-name", "ks-cboxtags-name");
    }

    function filtercode() {
        filterButtons("myInput-code", "ks-cboxtags-code");
    }
    var filter = [];
    $(document).ready(function() {
        // get id check box name
        var idName = [];
        var idCode = [];

        function updateFilterResults() {
            $('.filter-results').empty();
            // Tạo và thêm các phần tử mới vào .filter-results
            filter.forEach(function(item) {
                // Kiểm tra nếu 'name' không phải là undefined
                if (item.name !== undefined) {
                    var filterItemElement = $(
                        '<div class="filter-item">' +
                        '<span class="filter-title">' + (item.name === 'inventory' ? item.title :
                            item
                            .title + ':') + ' </span>' +
                        '<span class="filter-value">' +
                        (item.name === 'inventory' ? item.value[0][0] + item.value[0][1] : " " +
                            item
                            .value) +
                        '</span>' +
                        '<button class="btn-delete" data-button-name="' + item.name +
                        '"><i class="fa-solid fa-xmark"></i></button>' +
                        '</div>'
                    );

                    // Xóa item filter
                    filterItemElement.find('.btn-delete').on('click', function() {
                        var nameToDelete = $(this).data('button-name');
                        filter = filter.filter(function(item) {
                            return item.name !== nameToDelete;
                        });
                        if (nameToDelete === 'name') {
                            $('.deselect-all-name').click();
                            idName = [];
                        } else if (nameToDelete === 'code') {
                            $('.deselect-all-code').click();
                            code = [];
                        } else if (nameToDelete === 'search') {
                            search = '';
                        } else if (nameToDelete === 'inventory') {
                            $('.inventory-quantity').val('');
                        }
                        updateFilterResults();
                        var search = $('#search').val();
                        var inventory_op = $('.inventory-operator').val();
                        var inventory_val = $('.inventory-quantity').val();
                        var inventory = [inventory_op, inventory_val];
                        sendAjaxRequest(search, inventory_op, inventory, idName, idCode);
                    });
                    // Load filter results
                    $('.filter-results').append(filterItemElement);
                }
            });
        }
        $('.btn-submit').click(function(event) {
            event.preventDefault();
            var buttonName = $(this).data('button-name');
            var title = $(this).data('title');
            $('#' + buttonName + '-options').hide();
            $(".filter-btn").prop("disabled", false);

            if (buttonName === 'code') {
                $('.ks-cboxtags-code input[type="checkbox"]:checked').each(function() {
                    idCode.push($(this).val());
                });
            }
            if (buttonName === 'name') {
                $('.ks-cboxtags-name input[type="checkbox"]:checked').each(function() {
                    idName.push($(this).val());
                });
            }

            var search = $('#search').val();
            var inventory_op = $('.inventory-operator').val();
            var inventory_val = $('.inventory-quantity').val();
            var inventory = [inventory_op, inventory_val];
            console.log(inventory);
            $.ajax({
                type: 'get',
                url: '{{ URL::to('searchInventory') }}',
                data: {
                    'search': search,
                    'inventory': inventory,
                    'inventory_op': inventory_op,
                    'idName': idName,
                    'idCode': idCode,
                },
                success: function(data) {
                    $('tbody').html(data.output);
                    var dataValues = {
                        name: data.name.join(', '),
                        inventory: data.inventory,
                        code: data.code.join(', ')
                    };
                    var value = dataValues[buttonName];
                    if (value !== '' && value !== null) {
                        var existingFilterItem = filter.find(item => item.name ===
                            buttonName);
                        existingFilterItem
                            ?
                            (existingFilterItem.title = title, existingFilterItem.value =
                                value) :
                            filter.push({
                                name: buttonName,
                                title: title,
                                value: value
                            });
                    } else {
                        // Xóa mục khỏi filter nếu tồn tại
                        const existingFilterIndex = filter.findIndex(item => item.name ===
                            buttonName);
                        if (existingFilterIndex !== -1) {
                            filter.splice(existingFilterIndex, 1);
                        }
                    }
                    updateFilterResults();
                }
            });
            $.ajaxSetup({
                headers: {
                    'csrftoken': '{{ csrf_token() }}'
                }
            });
        });

        function sendAjaxRequest(search, inventory_op, inventory, idName, idCode) {
            $.ajax({
                type: 'get',
                url: '{{ URL::to('searchInventory') }}',
                data: {
                    'search': search,
                    'inventory_op': inventory_op,
                    'inventory': inventory,
                    'idName': idName,
                    'idCode': idCode,
                },
                success: function(data) {
                    $('tbody').html(data.output);
                }
            });
        }

        $('.sort-link').on('click', function(event) {
            event.preventDefault();
            // Get dữ liệu
            var search = $('#search').val();
            var inventory_op = $('.inventory-operator').val();
            var inventory_val = $('.inventory-quantity').val();
            var inventory = [inventory_op, inventory_val];
            var sort_by = $(this).data('sort-by');
            var sort_type = $(this).data('sort-type');

            sort_type = (sort_type === 'ASC') ? 'DESC' : 'ASC';
            $(this).data('sort-type', sort_type);
            $('.icon').text('');
            var iconId = 'icon-' + sort_by;
            var iconDiv = $('#' + iconId);
            var svgtop =
                "<svg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><path fill-rule='evenodd' clip-rule='evenodd' d='M11.5006 19.0009C11.6332 19.0009 11.7604 18.9482 11.8542 18.8544C11.9480 18.7607 12.0006 18.6335 12.0006 18.5009V6.70789L15.1466 9.85489C15.2405 9.94878 15.3679 10.0015 15.5006 10.0015C15.6334 10.0015 15.7607 9.94878 15.8546 9.85489C15.9485 9.76101 16.0013 9.63367 16.0013 9.50089C16.0013 9.36812 15.9485 9.24078 15.8546 9.14689L11.8546 5.14689C11.8082 5.10033 11.7530 5.06339 11.6923 5.03818C11.6315 5.01297 11.5664 5 11.5006 5C11.4349 5 11.3697 5.01297 11.3090 5.03818C11.2483 5.06339 11.1931 5.10033 11.1466 5.14689L7.14663 9.14689C7.10014 9.19338 7.06327 9.24857 7.03811 9.30931C7.01295 9.37005 7 9.43515 7 9.50089C7 9.63367 7.05274 9.76101 7.14663 9.85489C7.24052 9.94878 7.36786 10.0015 7.50063 10.0015C7.63341 10.0015 7.76075 9.94878 7.85463 9.85489L11.0006 6.70789V18.5009C11.0006 18.6335 11.0533 18.7607 11.1471 18.8544C11.2408 18.9482 11.3680 19.0009 11.5006 19.0009Z' fill='#555555'/></svg>";
            var svgbot =
                "<svg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><path fill-rule='evenodd' clip-rule='evenodd' d='M11.5006 5C11.6332 5 11.7604 5.05268 11.8542 5.14645C11.948 5.24021 12.0006 5.36739 12.0006 5.5V17.293L15.1466 14.146C15.2405 14.0521 15.3679 13.9994 15.5006 13.9994C15.6334 13.9994 15.7607 14.0521 15.8546 14.146C15.9485 14.2399 16.0013 14.3672 16.0013 14.5C16.0013 14.6328 15.9485 14.7601 15.8546 14.854L11.8546 18.854C11.8082 18.9006 11.753 18.9375 11.6923 18.9627C11.6315 18.9879 11.5664 19.0009 11.5006 19.0009C11.4349 19.0009 11.3697 18.9879 11.309 18.9627C11.2483 18.9375 11.1931 18.9006 11.1466 18.854L7.14663 14.854C7.05274 14.7601 7 14.6328 7 14.5C7 14.3672 7.05274 14.2399 7.14663 14.146C7.24052 14.0521 7.36786 13.9994 7.50063 13.9994C7.63341 13.9994 7.76075 14.0521 7.85463 14.146L11.0006 17.293V5.5C11.0006 5.36739 11.0533 5.24021 11.1471 5.14645C11.2408 5.05268 11.368 5 11.5006 5Z' fill='#555555'/></svg>"
            iconDiv.html((sort_type === 'ASC') ? svgtop : svgbot);
            // Gửi dữ liệu qua Ajax
            $.ajax({
                type: 'get',
                url: '{{ URL::to('searchInventory') }}',
                data: {
                    'search': search,
                    'inventory': inventory,
                    'idName': idName,
                    'idCode': idCode,
                    'sort_by': sort_by,
                    'sort_type': sort_type,
                },
                success: function(data) {
                    $('tbody').html(data.output);
                }
            });
        });
    });
</script>
