<x-navbar :title="$title" activeGroup="buy" activeName="receive"></x-navbar>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper1 py-0 border-bottom px-4">
    <!-- Content Header (Page header) -->
    <div class="d-flex justify-content-between align-items-center">
        <div class="container-fluided">
            <div class="mb-3">
                <span class="font-weight-bold">Mua hàng</span>
                <span class="mx-2">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                            fill="#26273B" fill-opacity="0.8"></path>
                    </svg>
                </span>
                <span>Đơn nhận hàng</span>
            </div>
        </div>
        <div class="container-fluided">
            <div class="row m-0 mb-3">
                <a href="{{ route('receive.create', $workspacename) }}">
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
{{-- Content --}}
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
                                        <th class="border-top-0 bg-white"><input type="checkbox" name="all"
                                                id="checkall"></th>
                                        <th scope="col" class="border-top-0 bg-white">
                                            <span class="d-flex">
                                                <a href="#" class="sort-link" data-sort-by="id"
                                                    data-sort-type="#"><button
                                                        class="btn-sort text-secondary text-nav" type="submit">Mã
                                                        nhận hàng</button></a>
                                                <div class="icon" id="icon-id"></div>
                                            </span>
                                        </th>
                                        <th scope="col" class="border-top-0 bg-white">
                                            <span class="d-flex">
                                                <a href="#" class="sort-link" data-sort-by="export_code"
                                                    data-sort-type=""><button class="btn-sort text-secondary text-nav"
                                                        type="submit">Đơn mua
                                                        hàng#</button></a>
                                                <div class="icon" id="icon-export_code"></div>
                                            </span>
                                        </th>
                                        <th scope="col" class="border-top-0 bg-white">
                                            <span class="d-flex">
                                                <a href="#" class="sort-link" data-sort-by="created_at"
                                                    data-sort-type=""><button class="btn-sort text-secondary text-nav"
                                                        type="submit">Nhà
                                                        cung cấp
                                                    </button></a>
                                                <div class="icon" id="icon-created_at"></div>
                                            </span>
                                        </th>
                                        <th scope="col" class="border-top-0 bg-white">
                                            <span class="d-flex">
                                                <a href="#" class="sort-link" data-sort-by="created_at"
                                                    data-sort-type=""><button class="btn-sort text-secondary text-nav"
                                                        type="submit">Đơn vị vận chuyển
                                                    </button></a>
                                                <div class="icon" id="icon-created_at"></div>
                                            </span>
                                        </th>
                                        <th scope="col" class="border-top-0 bg-white">
                                            <span class="d-flex">
                                                <a href="#" class="sort-link" data-sort-by="total"
                                                    data-sort-type=""><button class="btn-sort text-secondary text-nav"
                                                        type="submit">Phí
                                                        nhận
                                                        hàng</button></a>
                                                <div class="icon" id="icon-total"></div>
                                            </span>
                                        </th>
                                        <th scope="col" class="border-top-0 bg-white">
                                            <span class="d-flex justify-content-start">
                                                <a href="#" class="sort-link" data-sort-by="total"
                                                    data-sort-type=""><button class="btn-sort text-secondary text-nav"
                                                        type="submit">Trạng
                                                        thái</button></a>
                                                <div class="icon" id="icon-total"></div>
                                            </span>
                                        </th>
                                        <th scope="col" class="border-top-0 bg-white">
                                            <span class="d-flex">
                                                <a href="#" class="sort-link" data-sort-by="total"
                                                    data-sort-type=""><button class="btn-sort text-secondary text-nav"
                                                        type="submit">Ngày
                                                        giao
                                                        hàng</button></a>
                                                <div class="icon" id="icon-total"></div>
                                            </span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($receive as $item)
                                        <tr>
                                            <td><input type="checkbox"></td>
                                            <td>
                                                <a
                                                    href="{{ route('receive.edit', ['workspace' => $workspacename, 'receive' => $item->id]) }}">
                                                    {{ $item->id }}
                                                </a>
                                            </td>
                                            <td>
                                                @if ($item->getQuotation)
                                                    {{ $item->getQuotation->quotation_number == null ? $item->getQuotation->id : $item->getQuotation->quotation_number }}
                                                @endif
                                            </td>
                                            <td>{{ $item->getNameProvide->provide_name_display }}</td>
                                            <td>{{ $item->shipping_unit }}</td>
                                            <td>{{ number_format($item->delivery_charges) }}</td>
                                            <td>
                                                @if ($item->status == 1)
                                                    <span style="color: #858585">Chưa giao</span>
                                                @else
                                                    <span style="color: #08AA36">Đã giao</span>
                                                @endif
                                            </td>
                                            <td>{{ date_format(new DateTime($item->created_at), 'd/m/Y') }}</td>
                                            {{-- <td>
                                                <a
                                                    href="{{ route('receive.edit', ['workspace' => $workspacename, 'receive' => $item->id]) }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="32"
                                                        height="32" viewBox="0 0 32 32" fill="none">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M18.7832 6.79483C18.987 6.71027 19.2056 6.66675 19.4263 6.66675C19.6471 6.66675 19.8656 6.71027 20.0695 6.79483C20.2734 6.87938 20.4586 7.00331 20.6146 7.15952L21.9607 8.50563C22.1169 8.66165 22.2408 8.84693 22.3253 9.05087C22.4099 9.25482 22.4534 9.47342 22.4534 9.69419C22.4534 9.91495 22.4099 10.1336 22.3253 10.3375C22.2408 10.5414 22.1169 10.7267 21.9607 10.8827L20.2809 12.5626C20.2711 12.5736 20.2609 12.5844 20.2503 12.595C20.2397 12.6056 20.2289 12.6158 20.2178 12.6256L11.5607 21.2827C11.4257 21.4177 11.2426 21.4936 11.0516 21.4936H8.34644C7.94881 21.4936 7.62647 21.1712 7.62647 20.7736V18.0684C7.62647 17.8775 7.70233 17.6943 7.83737 17.5593L16.4889 8.9086C16.5003 8.89532 16.5124 8.88235 16.525 8.86973C16.5376 8.8571 16.5506 8.84504 16.5639 8.83354L18.2381 7.15952C18.394 7.00352 18.5795 6.8793 18.7832 6.79483ZM17.0354 10.3984L9.06641 18.3667V20.0536H10.7534L18.7221 12.085L17.0354 10.3984ZM19.7402 11.0668L18.0537 9.38022L19.2572 8.17685C19.2794 8.15461 19.3057 8.13696 19.3348 8.12493C19.3638 8.11289 19.3949 8.10669 19.4263 8.10669C19.4578 8.10669 19.4889 8.11289 19.5179 8.12493C19.5469 8.13697 19.5737 8.15504 19.5959 8.17728L20.9428 9.52411C20.9651 9.5464 20.9831 9.57315 20.9951 9.60228C21.0072 9.63141 21.0134 9.66264 21.0134 9.69419C21.0134 9.72573 21.0072 9.75696 20.9951 9.78609C20.9831 9.81522 20.9651 9.84197 20.9428 9.86426L19.7402 11.0668ZM6.6665 24.6134C6.6665 24.2158 6.98885 23.8935 7.38648 23.8935H24.6658C25.0634 23.8935 25.3858 24.2158 25.3858 24.6134C25.3858 25.0111 25.0634 25.3334 24.6658 25.3334H7.38648C6.98885 25.3334 6.6665 25.0111 6.6665 24.6134Z"
                                                            fill="#555555"></path>
                                                    </svg>
                                                </a>
                                            </td> --}}
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

{{-- Pagination --}}
<div class="paginator mt-2 d-flex justify-content-end">
    {{ $receive->appends(request()->except('page'))->links() }}
</div>


</div>
