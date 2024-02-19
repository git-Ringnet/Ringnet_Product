<x-navbar :title="$title" activeGroup="products" activeName="product"></x-navbar>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper m-0">
    <!-- Content Header (Page header) -->
    <section class="content-header-fixed p-0 margin-250">
        <div class="content__header--inner margin-left32">
            <div class="content__heading--left ">
                <span>Kho hàng</span>
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z" fill="#26273B" fill-opacity="0.8"/>
                    </svg>
                </span>
                <span class="font-weight-bold">Sản phẩm</span>
            </div>
            <!-- <a href="{{ route('exportDatabase') }}">
                Export
            </a> -->
            <div class="d-flex content__heading--right">
                <a href="{{ route('inventory.create',$workspacename) }}">
                    <button type="button" class="custom-btn d-flex align-items-center h-100" style="margin-right:10px">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                            <path d="M8.75 3C8.75 2.58579 8.41421 2.25 8 2.25C7.58579 2.25 7.25 2.58579 7.25 3V7.25H3C2.58579 7.25 2.25 7.58579 2.25 8C2.25 8.41421 2.58579 8.75 3 8.75H7.25V13C7.25 13.4142 7.58579 13.75 8 13.75C8.41421 13.75 8.75 13.4142 8.75 13V8.75H13C13.4142 8.75 13.75 8.41421 13.75 8C13.75 7.58579 13.4142 7.25 13 7.25H8.75V3Z" fill="white"/>
                        </svg>
                        <span class="text-btnIner-primary ml-2">Tạo mới</span>
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
        <div class="row m-auto filter pt-2 pb-4 height-50">
                <form class="w-100" action="" method="get" id='search-filter'>
                    <div class="col-12 col-md-12 mr-0">
                        <div class="row d-flex">
                            <div class="position-relative">
                                <input type="text" placeholder="Tìm kiếm" id="search" name="keywords"
                                    class="pr-4 w-100 input-search" value="{{ request()->keywords }}" />
                                <span id="search-icon" class="search-icon">
                                    <i class="fas fa-search btn-submit"></i>
                                </span>
                                <input class="btn-submit" type="submit" id="hidden-submit" name="hidden-submit"
                                    style="display: none;" />
                            </div>
                            <div class="dropdown mx-2">
                                <button class="btn-filter_searh" type="button" id="dropdownMenuButton"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                            <path d="M12.9548 3H10.0457C9.74445 3 9.50024 3.24421 9.50024 3.54545V6.45455C9.50024 6.75579 9.74445 7 10.0457 7H12.9548C13.256 7 13.5002 6.75579 13.5002 6.45455V3.54545C13.5002 3.24421 13.256 3 12.9548 3Z" fill="#6D7075"/>
                                            <path d="M6.45455 3H3.54545C3.24421 3 3 3.24421 3 3.54545V6.45455C3 6.75579 3.24421 7 3.54545 7H6.45455C6.75579 7 7 6.75579 7 6.45455V3.54545C7 3.24421 6.75579 3 6.45455 3Z" fill="#6D7075"/>
                                            <path d="M6.45455 9.50024H3.54545C3.24421 9.50024 3 9.74445 3 10.0457V12.9548C3 13.256 3.24421 13.5002 3.54545 13.5002H6.45455C6.75579 13.5002 7 13.256 7 12.9548V10.0457C7 9.74445 6.75579 9.50024 6.45455 9.50024Z" fill="#6D7075"/>
                                            <path d="M12.9548 9.50024H10.0457C9.74445 9.50024 9.50024 9.74445 9.50024 10.0457V12.9548C9.50024 13.256 9.74445 13.5002 10.0457 13.5002H12.9548C13.256 13.5002 13.5002 13.256 13.5002 12.9548V10.0457C13.5002 9.74445 13.256 9.50024 12.9548 9.50024Z" fill="#6D7075"/>
                                        </svg>
                                        <span class="text-btnIner">Bộc lọc</span>
                                            <svg width="16" height="16" viewBox="0 0 16 16"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
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
                                                onkeyup="filterFunction()">
                                        <span class="search-icon">
                                            <i class="fas fa-search"></i>
                                        </span>
                                    </div>
                                    <div class="scrollbar">
                                        <button class="dropdown-item btndropdown" id="btn-code"
                                            data-button="code" type="button">Mã hàng hóa
                                        </button>
                                        <button class="dropdown-item btndropdown" id="btn-name"
                                            data-button="name" type="button">Tên hàng hóa
                                        </button>
                                        <button class="dropdown-item btndropdown" id="btn-inventory"
                                            data-button="inventory" type="button">Số lượng tồn
                                        </button>
                                    </div>
                                    <x-filter-checkbox :dataa='$product' name="code" title="Mã hàng hóa"
                                        namedisplay="product_code" />
                                    <x-filter-checkbox :dataa='$product' name="name" title="Tên hàng hóa"
                                        namedisplay="product_name" />
                                    <x-filter-compare name="inventory" title="Số lượng tồn" />
                                    <div class="filter-results d-flex m-0"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
        </div>
    </section>
    {{-- Content --}}
    <section class="content margin-top-fixed4">
        <div class="container-fluided margin-250">
            <div class="row">
                <div class="col-12">
                    <div class="card scroll-custom mt-3">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-hover">
                                <thead class="sticky-head">
                                    <tr>
                                        <th scope="col" style="padding-left: 2rem;">
                                            <input type="checkbox" name="all" id="checkall" class="checkall-btn">
                                        </th>
                                        <th scope="col">
                                            <span class="d-flex">
                                                <a href="#" class="sort-link text-13" data-sort-by="product_code"
                                                    data-sort-type="ASC">
                                                    <button class="btn-sort  text-13" type="submit">
                                                        Mã hàng hóa
                                                    </button></a>
                                                <div class="icon" id="icon-product_code"></div>
                                            </span>
                                        </th>
                                        <th scope="col">
                                            <span class="d-flex">
                                                <a href="#" class="sort-link" data-sort-by="product_name"
                                                    data-sort-type="ASC">
                                                    <button class="btn-sort text-13" type="submit">
                                                        Tên hàng hóa
                                                    </button></a>
                                                <div class="icon" id="icon-product_name"></div>
                                            </span>
                                        </th>
                                        <th scope="col">
                                            <span class="d-flex">
                                                <a href="#" class="sort-link " data-sort-by="product_inventory"
                                                    data-sort-type="ASC">
                                                    <button class="btn-sort text-13" type="submit">
                                                        Số lượng tồn
                                                    </button>
                                                </a>
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
                                            <td>
                                                <span class="margin-Right10">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="6" height="10" viewBox="0 0 6 10" fill="none">
                                                            <g clip-path="url(#clip0_1710_10941)">
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M1 8C1.55228 8 2 8.44772 2 9C2 9.55228 1.55228 10 1 10C0.447715 10 0 9.55228 0 9C0 8.44772 0.447715 8 1 8ZM5 8C5.55228 8 6 8.44772 6 9C6 9.55228 5.55228 10 5 10C4.44772 10 4 9.55228 4 9C4 8.44772 4.44772 8 5 8ZM1 4C1.55228 4 2 4.44772 2 5C2 5.55228 1.55228 6 1 6C0.447715 6 0 5.55228 0 5C0 4.44772 0.447715 4 1 4ZM5 4C5.55228 4 6 4.44772 6 5C6 5.55228 5.55228 6 5 6C4.44772 6 4 5.55228 4 5C4 4.44772 4.44772 4 5 4ZM1 0C1.55228 0 2 0.447715 2 1C2 1.55228 1.55228 2 1 2C0.447715 2 0 1.55228 0 1C0 0.447715 0.447715 0 1 0ZM5 0C5.55228 0 6 0.447715 6 1C6 1.55228 5.55228 2 5 2C4.44772 2 4 1.55228 4 1C4 0.447715 4.44772 0 5 0Z" fill="#282A30"/>
                                                            </g>
                                                            <defs>
                                                                <clipPath id="clip0_1710_10941">
                                                                    <rect width="6" height="10" fill="white"/>
                                                                </clipPath>
                                                            </defs>
                                                    </svg>
                                                </span>
                                                <input type="checkbox" class="checkall-btn">
                                            </td>
                                            <td class="text-13-black">{{ $item->product_code }}</td>
                                            <td>
                                                <a href="{{ route('inventory.show', ['workspace' => $workspacename ,'inventory'=>$item->id]) }}" class="sort-link text-13-blue">
                                                    {{ $item->product_name }}
                                                </a>
                                            </td>
                                            <td class="text-13-black" >{{ number_format($item->product_inventory) }}</td>
                                            <td class="text-right">
                                                <a href="{{--{{ route('inventory.edit', $item->id) }}--}}" class="m-1">
                                                    <span></span>
                                                </a>
                                                <a href="{{--{{ route('inventory.edit', $item->id) }}--}}" class="m-1">
                                                    <span></span>
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
                        const existingFilterIndex = filter.findIndex(item => item.name === buttonName);
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
                "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16' fill='none'><path d='M4.51988 5.6738C4.20167 5.939 4.15868 6.41191 4.42385 6.73012C4.68903 7.04833 5.16195 7.09132 5.48016 6.82615L7.25 5.3513V12.25C7.25 12.6642 7.58579 13 8 13C8.41421 13 8.75 12.6642 8.75 12.25V5.3512L10.5199 6.82615C10.8381 7.09132 11.311 7.04833 11.5762 6.73012C11.8414 6.41191 11.7984 5.939 11.4802 5.6738L8.48016 3.1738C8.20202 2.942 7.79802 2.942 7.51988 3.1738L4.51988 5.6738Z' fill='#6B6F76'/></svg>";
            var svgbot =
                "<svg width='16' height='16' viewBox='0 0 16 16' fill='none' xmlns='http://www.w3.org/2000/svg'><path fill-rule='evenodd' clip-rule='evenodd' d='M11.5006 5C11.6332 5 11.7604 5.05268 11.8542 5.14645C11.948 5.24021 12.0006 5.36739 12.0006 5.5V17.293L15.1466 14.146C15.2405 14.0521 15.3679 13.9994 15.5006 13.9994C15.6334 13.9994 15.7607 14.0521 15.8546 14.146C15.9485 14.2399 16.0013 14.3672 16.0013 14.5C16.0013 14.6328 15.9485 14.7601 15.8546 14.854L11.8546 18.854C11.8082 18.9006 11.753 18.9375 11.6923 18.9627C11.6315 18.9879 11.5664 19.0009 11.5006 19.0009C11.4349 19.0009 11.3697 18.9879 11.309 18.9627C11.2483 18.9375 11.1931 18.9006 11.1466 18.854L7.14663 14.854C7.05274 14.7601 7 14.6328 7 14.5C7 14.3672 7.05274 14.2399 7.14663 14.146C7.24052 14.0521 7.36786 13.9994 7.50063 13.9994C7.63341 13.9994 7.76075 14.0521 7.85463 14.146L11.0006 17.293V5.5C11.0006 5.36739 11.0533 5.24021 11.1471 5.14645C11.2408 5.05268 11.368 5 11.5006 5Z' fill='#6D7075 '/></svg>"
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
