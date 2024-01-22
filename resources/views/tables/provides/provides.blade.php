<x-navbar :title="$title" activeGroup="buy" activeName="provide"></x-navbar>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper1 py-0 border-bottom px-4">
    <!-- Content Header (Page header) -->
    <div class="d-flex justify-content-between align-items-center">
        <div class="container-fluided">
            <div class="mb">
                <span class="font-weight-bold">Mua hàng</span>
                <span class="mx-2">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                            fill="#26273B" fill-opacity="0.8"></path>
                    </svg>
                </span>
                <span>Nhà cung cấp</span>
            </div>
        </div>
        <div class="container-fluided z-index-block">
            <div class="row m-0 my-1">
                <a href="{{ route('provides.create', $workspacename) }}">
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
            </div>
        </div>
    </div>
</div>

<div class="bg-filter-search pl-4">
    <div class="content-wrapper1 py-1">
        <div class="row m-auto filter pt-1">
            <div class="w-100">
                <div class="row mr-0">
                    <div class="col-md-5 d-flex pl-0">
                        <form action="" method="get" id="search-filter">
                            <div class="position-relative">
                                <input type="text" placeholder="Tìm kiếm" name="keywords"
                                    class="pr-4 w-100 input-search" value="{{ request()->keywords }}">
                                <span id="search-icon" class="search-icon"><i class="fas fa-search"
                                        aria-hidden="true"></i></span>
                            </div>
                        </form>
                        <div class="dropdown">
                            <button class="filter-btn ml-2 align-items-center d-flex border" data-toggle="dropdown">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12.9548 3H10.0457C9.74445 3 9.50024 3.24421 9.50024 3.54545V6.45455C9.50024 6.75579 9.74445 7 10.0457 7H12.9548C13.256 7 13.5002 6.75579 13.5002 6.45455V3.54545C13.5002 3.24421 13.256 3 12.9548 3Z"
                                        fill="#6D7075"></path>
                                    <path
                                        d="M6.45455 3H3.54545C3.24421 3 3 3.24421 3 3.54545V6.45455C3 6.75579 3.24421 7 3.54545 7H6.45455C6.75579 7 7 6.75579 7 6.45455V3.54545C7 3.24421 6.75579 3 6.45455 3Z"
                                        fill="#6D7075"></path>
                                    <path
                                        d="M6.45455 9.50024H3.54545C3.24421 9.50024 3 9.74445 3 10.0457V12.9548C3 13.256 3.24421 13.5002 3.54545 13.5002H6.45455C6.75579 13.5002 7 13.256 7 12.9548V10.0457C7 9.74445 6.75579 9.50024 6.45455 9.50024Z"
                                        fill="#6D7075"></path>
                                    <path
                                        d="M12.9548 9.50024H10.0457C9.74445 9.50024 9.50024 9.74445 9.50024 10.0457V12.9548C9.50024 13.256 9.74445 13.5002 10.0457 13.5002H12.9548C13.256 13.5002 13.5002 13.256 13.5002 12.9548V10.0457C13.5002 9.74445 13.256 9.50024 12.9548 9.50024Z"
                                        fill="#6D7075"></path>
                                </svg>
                                <span class="text-secondary mx-1"> Bộ lọc</span>
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M5.42342 6.92342C5.65466 6.69219 6.02956 6.69219 6.26079 6.92342L9 9.66264L11.7392 6.92342C11.9704 6.69219 12.3453 6.69219 12.5766 6.92342C12.8078 7.15466 12.8078 7.52956 12.5766 7.76079L9.41868 10.9187C9.18745 11.1499 8.81255 11.1499 8.58132 10.9187L5.42342 7.76079C5.19219 7.52956 5.19219 7.15466 5.42342 6.92342Z"
                                        fill="#6D7075"></path>
                                </svg>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="content-wrapper py-0 px-2" style="min-height: 335px;">
    {{-- Content --}}
    <section class="content">
        <div class="container-fluided">
            <div class="row">
                <div class="col-12">
                    <div class="card scroll-custom">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-hover">
                                <thead class="sticky-head">
                                    <tr>
                                        <th class="border-top-0 bg-white" style="width:2%;">
                                            <input type="checkbox" name="all" id="checkall">
                                        </th>
                                        <th scope="col" class="border-top-0 bg-white" style="20%;">
                                            <span class="d-flex">
                                                <a href="#" class="sort-link" data-sort-by="id"
                                                    data-sort-type="#"><button
                                                        class="btn-sort text-secondary text-nav" type="submit">Tên
                                                        hiển thị</button></a>
                                                <div class="icon" id="icon-id"></div>
                                            </span>
                                        </th>
                                        <th scope="col" class="border-top-0 bg-white" style="20%;">
                                            <span class="d-flex">
                                                <a href="#" class="sort-link" data-sort-by="export_code"
                                                    data-sort-type=""><button class="btn-sort text-secondary text-nav"
                                                        type="submit">Mã số thuế</button></a>
                                                <div class="icon" id="icon-export_code"></div>
                                            </span>
                                        </th>
                                        <th scope="col" class="border-top-0 bg-white" style="width:10%;">
                                            <span class="d-flex">
                                                <a href="#" class="sort-link" data-sort-by="total"
                                                    data-sort-type=""><button class="btn-sort text-secondary text-nav"
                                                        type="submit">Dư
                                                        nợ</button></a>
                                                <div class="icon" id="icon-total"></div>
                                            </span>
                                        </th>
                                        <th scope="col" class="border-top-0 bg-white" style="width:35%;"></th>
                                        <th scope="col" class="border-top-0 bg-white" style="width:8%;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($provides as $item)
                                        <tr>
                                            <td><input type="checkbox"></td>
                                            <td>{{ $item->provide_name_display }}</td>
                                            <td>{{ $item->provide_code }}</td>
                                            <td>{{ number_format($item->provide_debt) }}</td>
                                            <td></td>
                                            <td>
                                                <a
                                                    href="{{ route('provides.show', ['workspace' => $workspacename, 'provide' => $item->id]) }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="21"
                                                        height="21" viewBox="0 0 21 21" fill="none">
                                                        <path
                                                            d="M6.125 1.0001C3.01839 1.0001 0.5 3.5185 0.5 6.6251V14.875C0.5 17.9817 3.01839 20.5 6.125 20.5H14.3752C17.4818 20.5 20.0002 17.9817 20.0002 14.875V10.0001C20.0002 9.37879 19.4965 8.8751 18.8752 8.8751C18.2539 8.8751 17.7502 9.37879 17.7502 10.0001V14.875C17.7502 16.7391 16.239 18.25 14.3752 18.25H6.125C4.26104 18.25 2.75 16.7391 2.75 14.875V6.6251C2.75 4.76114 4.26104 3.2501 6.125 3.2501H9.5C10.1213 3.2501 10.625 2.74642 10.625 2.1251C10.625 1.50379 10.1213 1.0001 9.5 1.0001H6.125Z"
                                                            fill="#6D7075" />
                                                        <path
                                                            d="M17.2009 5.79192L15.0796 3.6706L8.79218 9.95794C7.65777 11.0923 6.88452 12.5372 6.5699 14.1103C6.54716 14.224 6.64742 14.3242 6.76113 14.3016C8.33427 13.9869 9.77909 13.2136 10.9135 12.0793L17.2009 5.79192Z"
                                                            fill="#6D7075" />
                                                        <path
                                                            d="M19.1838 0.185187C18.8994 0.0903425 18.5856 0.164397 18.3737 0.376467L16.6704 2.07961L18.7917 4.20093L20.495 2.49778C20.7071 2.28571 20.781 1.97203 20.6862 1.68751C20.4498 0.978207 19.8932 0.421617 19.1838 0.185187Z"
                                                            fill="#6D7075" />
                                                    </svg>
                                                </a>

                                                <form onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                                                    action="{{ route('provides.destroy', ['workspace' => $workspacename, 'provide' => $item->id]) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M18.5531 9.75C18.9672 9.75 19.3031 10.0858 19.3031 10.5C19.3031 10.5578 19.2963 10.6155 19.2831 10.6718L17.0442 20.1872C16.7253 21.5422 15.5161 22.5 14.124 22.5H9.87605C8.4839 22.5 7.27465 21.5422 6.9558 20.1872L4.71688 10.6718C4.62202 10.2686 4.87197 9.86481 5.27517 9.76993C5.33146 9.75669 5.38911 9.75 5.44695 9.75H18.5531ZM12.75 1.5C14.8211 1.5 16.5 3.17894 16.5 5.25H19.5C20.3284 5.25 21 5.92158 21 6.75V7.5C21 7.91421 20.6642 8.25 20.25 8.25H3.75C3.33579 8.25 3 7.91421 3 7.5V6.75C3 5.92158 3.67158 5.25 4.5 5.25H7.5C7.5 3.17894 9.17894 1.5 11.25 1.5H12.75ZM12.75 3.75H11.25C10.4216 3.75 9.75 4.42158 9.75 5.25H14.25C14.25 4.42158 13.5784 3.75 12.75 3.75Z"
                                                                fill="#6D7075" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="ml-3">
                        <span class="text-perpage">
                            Hiển thị:
                            <select name="perPage" id="perPage" class="border-0">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                            </select>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
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
                        '<span class="filter-title">' + (item.name === 'debt' ? item.title : item
                            .title + ':') + ' </span>' +
                        '<span class="filter-value">' +
                        (item.name === 'debt' ? item.value[0][0] + item.value[0][1] : " " + item
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
                        } else if (nameToDelete === 'email') {
                            $('#email').val('');
                        } else if (nameToDelete === 'phone') {
                            $('#phone').val('');
                        } else if (nameToDelete === 'code') {
                            $('.deselect-all-code').click();
                            idCode = [];
                        } else if (nameToDelete === 'search') {
                            search = '';
                        } else if (nameToDelete === 'debt') {
                            $('.debt-quantity').val('');
                        }
                        updateFilterResults();
                        var email = $('#email').val();
                        var phone = $('#phone').val();
                        var search = $('#search').val();
                        var debt_op = $('.debt-operator').val();
                        var debt_val = $('.debt-quantity').val();
                        var debt = [debt_op, debt_val];
                        sendAjaxRequest(search, email, phone, debt_op, debt, idName, idCode);
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

            if (buttonName === 'email') {
                $('.email-input').val(email)
            }
            var email = $('#email').val();
            var phone = $('#phone').val();
            var search = $('#search').val();
            var debt_op = $('.debt-operator').val();
            var debt_val = $('.debt-quantity').val();
            var debt = [debt_op, debt_val];

            $.ajax({
                type: 'get',
                url: '{{ URL::to('searchProvides') }}',
                data: {
                    'search': search,
                    'email': email,
                    'phone': phone,
                    'debt': debt,
                    'idName': idName,
                    'idCode': idCode,
                },
                success: function(data) {
                    $('tbody').html(data.output);
                    var dataValues = {
                        name: data.name.join(', '),
                        email: data.email,
                        phone: data.phone,
                        debt: data.debt,
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

        function sendAjaxRequest(search, email, phone, debt_op, debt, idName, idCode) {
            $.ajax({
                type: 'get',
                url: '{{ URL::to('searchProvides') }}',
                data: {
                    'search': search,
                    'email': email,
                    'phone': phone,
                    'debt_op': debt_op,
                    'debt': debt,
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
            var email = $('#email').val();
            var phone = $('#phone').val();
            var search = $('#search').val();
            var debt_op = $('.debt-operator').val();
            var debt_val = $('.debt-quantity').val();
            var debt = [debt_op, debt_val];
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
                url: '{{ URL::to('searchProvides') }}',
                data: {
                    'search': search,
                    'email': email,
                    'phone': phone,
                    'debt': debt,
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
