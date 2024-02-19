<x-navbar :title="$title" activeGroup="buy" activeName="import"></x-navbar>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header p-0">
        <div class="container-fluided">
            <div class="mb-3">
                <span>Bán hàng</span>
                <span>/</span>
                <span class="font-weight-bold">Đơn báo giá</span>
            </div>
            <div class="row m-0 mb-1">
                <a href="{{ route('import.create', $workspacename) }}">
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
                            <div class="row mr-0">
                                <div class="col-md-5 d-flex">
                                    <div class="position-relative" style="width: 55%;">
                                        <input type="text" placeholder="Tìm kiếm" name="keywords"
                                            class="pr-4 w-100 input-search" value="{{ request()->keywords }}">
                                        <span id="search-icon" class="search-icon"><i class="fas fa-search"></i></span>
                                    </div>
                                    <button class="filter-btn ml-2">Bộ lọc
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M5.42342 6.92342C5.65466 6.69219 6.02956 6.69219 6.26079 6.92342L9 9.66264L11.7392 6.92342C11.9704 6.69219 12.3453 6.69219 12.5766 6.92342C12.8078 7.15466 12.8078 7.52956 12.5766 7.76079L9.41868 10.9187C9.18745 11.1499 8.81255 11.1499 8.58132 10.9187L5.42342 7.76079C5.19219 7.52956 5.19219 7.15466 5.42342 6.92342Z"
                                                fill="white" />
                                        </svg>
                                    </button>
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
                                                <a href="#" class="sort-link" data-sort-by="id"
                                                    data-sort-type="#"><button class="btn-sort" type="submit">Ngày mua
                                                        hàng
                                                    </button></a>
                                                <div class="icon" id="icon-id"></div>
                                            </span>
                                        </th>
                                        <th scope="col">
                                            <span class="d-flex">
                                                <a href="#" class="sort-link" data-sort-by="id"
                                                    data-sort-type="#"><button class="btn-sort" type="submit">Đơn mua
                                                        hàng#
                                                    </button></a>
                                                <div class="icon" id="icon-id"></div>
                                            </span>
                                        </th>
                                        <th scope="col">
                                            <span class="d-flex">
                                                <a href="#" class="sort-link" data-sort-by="id"
                                                    data-sort-type="#"><button class="btn-sort" type="submit">Số
                                                        tham
                                                        chiếu#
                                                    </button></a>
                                                <div class="icon" id="icon-id"></div>
                                            </span>
                                        </th>
                                        <th scope="col">
                                            <span class="d-flex">
                                                <a href="#" class="sort-link" data-sort-by="id"
                                                    data-sort-type="#"><button class="btn-sort" type="submit">Nhà
                                                        cung
                                                        cấp
                                                    </button></a>
                                                <div class="icon" id="icon-id"></div>
                                            </span>
                                        </th>
                                        <th scope="col">
                                            <span class="d-flex">
                                                <a href="#" class="sort-link" data-sort-by="id"
                                                    data-sort-type="#"><button class="btn-sort" type="submit">Dự án
                                                    </button></a>
                                                <div class="icon" id="icon-id"></div>
                                            </span>
                                        </th>
                                        <th scope="col">
                                            <span class="d-flex justify-content-center">
                                                <a href="#" class="sort-link" data-sort-by="id"
                                                    data-sort-type="#"><button class="btn-sort" type="submit">Trạng
                                                        thái
                                                    </button></a>
                                                <div class="icon" id="icon-id"></div>
                                            </span>
                                        </th>
                                        <th scope="col">
                                            <span class="d-flex justify-content-center">
                                                <a href="#" class="sort-link" data-sort-by="id"
                                                    data-sort-type="#"><button class="btn-sort" type="submit">Nhận
                                                        hàng
                                                    </button></a>
                                                <div class="icon" id="icon-id"></div>
                                            </span>
                                        </th>
                                        <th scope="col">
                                            <span class="d-flex justify-content-center">
                                                <a href="#" class="sort-link" data-sort-by="id"
                                                    data-sort-type="#"><button class="btn-sort" type="submit">Xuất
                                                        hóa đơn
                                                    </button></a>
                                                <div class="icon" id="icon-id"></div>
                                            </span>
                                        </th>
                                        <th scope="col">
                                            <span class="d-flex justify-content-center">
                                                <a href="#" class="sort-link" data-sort-by="id"
                                                    data-sort-type="#"><button class="btn-sort" type="submit">Thanh
                                                        toán
                                                    </button></a>
                                                <div class="icon" id="icon-id"></div>
                                            </span>
                                        </th>
                                        <th scope="col">
                                            <span class="d-flex">
                                                <a href="#" class="sort-link" data-sort-by="id"
                                                    data-sort-type="#"><button class="btn-sort" type="submit">Tổng
                                                        tiền
                                                    </button></a>
                                                <div class="icon" id="icon-id"></div>
                                            </span>
                                        </th>
                                        {{-- <th scope="col">
                                            <span class="d-flex">
                                                <a href="#" class="sort-link" data-sort-by="id"
                                                    data-sort-type="#"><button class="btn-sort"
                                                        type="submit"></button></a>
                                                <div class="icon" id="icon-id"></div>
                                            </span>
                                        </th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($import as $item)
                                        <tr>
                                            <td><input type="checkbox" id="{{ $item->id }}"></td>
                                            <td class="text-center">
                                                {{ date_format(new DateTime($item->created_at), 'd/m/Y') }}</td>
                                            <td class="text-center">
                                                <a
                                                    href="{{ route('import.show', ['workspace' => $workspacename, 'import' => $item->id]) }}">
                                                    {{ $item->quotation_number == null ? $item->id : $item->quotation_number }}
                                                </a>
                                            </td>
                                            <td class="text-center">{{ $item->reference_number }}</td>
                                            <td class="text-center">
                                                @if ($item->getProvideName)
                                                    {{ $item->getProvideName->provide_name_display }}
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if ($item->getProjectName)
                                                    {{ $item->getProjectName->project_name }}
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if ($item->status_receive == 2 && $item->status_reciept == 2 && $item->status_pay == 2)
                                                    <span style="color: #08AA36">Close</span>
                                                @elseif($item->status == 1)
                                                    <span style="color: #858585">Draft</span>
                                                @else
                                                    <span style="color: #0052CC">Approved</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if ($item->status_receive == 0)
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18"
                                                        height="18" viewBox="0 0 18 18" fill="none">
                                                        <path
                                                            d="M18 9C18 13.9706 13.9706 18 9 18C4.02944 18 0 13.9706 0 9C0 4.02944 4.02944 0 9 0C13.9706 0 18 4.02944 18 9Z"
                                                            fill="#D6D6D6" />
                                                    </svg>
                                                @elseif ($item->status_receive == 1)
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18"
                                                        height="18" viewBox="0 0 18 18" fill="none">
                                                        <path
                                                            d="M18 9C18 13.9706 13.9706 18 9 18C4.02944 18 0 13.9706 0 9C0 4.02944 4.02944 0 9 0C13.9706 0 18 4.02944 18 9Z"
                                                            fill="#08AA36" />
                                                        <path
                                                            d="M9 -1.90735e-06C10.1819 -1.90735e-06 11.3522 0.23279 12.4442 0.685081C13.5361 1.13737 14.5282 1.80031 15.364 2.63604C16.1997 3.47176 16.8626 4.46392 17.3149 5.55585C17.7672 6.64778 18 7.8181 18 9C18 10.1819 17.7672 11.3522 17.3149 12.4442C16.8626 13.5361 16.1997 14.5282 15.364 15.364C14.5282 16.1997 13.5361 16.8626 12.4442 17.3149C11.3522 17.7672 10.1819 18 9 18L9 9V-1.90735e-06Z"
                                                            fill="#D6D6D6" />
                                                    </svg>
                                                @else
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18"
                                                        height="18" viewBox="0 0 18 18" fill="none">
                                                        <path
                                                            d="M18 9C18 13.9706 13.9706 18 9 18C4.02944 18 0 13.9706 0 9C0 4.02944 4.02944 0 9 0C13.9706 0 18 4.02944 18 9Z"
                                                            fill="#08AA36" />
                                                    </svg>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if ($item->status_reciept == 0)
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18"
                                                        height="18" viewBox="0 0 18 18" fill="none">
                                                        <path
                                                            d="M18 9C18 13.9706 13.9706 18 9 18C4.02944 18 0 13.9706 0 9C0 4.02944 4.02944 0 9 0C13.9706 0 18 4.02944 18 9Z"
                                                            fill="#D6D6D6" />
                                                    </svg>
                                                @elseif ($item->status_reciept == 1)
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18"
                                                        height="18" viewBox="0 0 18 18" fill="none">
                                                        <path
                                                            d="M18 9C18 13.9706 13.9706 18 9 18C4.02944 18 0 13.9706 0 9C0 4.02944 4.02944 0 9 0C13.9706 0 18 4.02944 18 9Z"
                                                            fill="#08AA36" />
                                                        <path
                                                            d="M9 -1.90735e-06C10.1819 -1.90735e-06 11.3522 0.23279 12.4442 0.685081C13.5361 1.13737 14.5282 1.80031 15.364 2.63604C16.1997 3.47176 16.8626 4.46392 17.3149 5.55585C17.7672 6.64778 18 7.8181 18 9C18 10.1819 17.7672 11.3522 17.3149 12.4442C16.8626 13.5361 16.1997 14.5282 15.364 15.364C14.5282 16.1997 13.5361 16.8626 12.4442 17.3149C11.3522 17.7672 10.1819 18 9 18L9 9V-1.90735e-06Z"
                                                            fill="#D6D6D6" />
                                                    </svg>
                                                @else
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18"
                                                        height="18" viewBox="0 0 18 18" fill="none">
                                                        <path
                                                            d="M18 9C18 13.9706 13.9706 18 9 18C4.02944 18 0 13.9706 0 9C0 4.02944 4.02944 0 9 0C13.9706 0 18 4.02944 18 9Z"
                                                            fill="#08AA36" />
                                                    </svg>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if ($item->status_pay == 0)
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18"
                                                        height="18" viewBox="0 0 18 18" fill="none">
                                                        <path
                                                            d="M18 9C18 13.9706 13.9706 18 9 18C4.02944 18 0 13.9706 0 9C0 4.02944 4.02944 0 9 0C13.9706 0 18 4.02944 18 9Z"
                                                            fill="#D6D6D6" />
                                                    </svg>
                                                @elseif ($item->status_pay == 1)
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18"
                                                        height="18" viewBox="0 0 18 18" fill="none">
                                                        <path
                                                            d="M18 9C18 13.9706 13.9706 18 9 18C4.02944 18 0 13.9706 0 9C0 4.02944 4.02944 0 9 0C13.9706 0 18 4.02944 18 9Z"
                                                            fill="#08AA36" />
                                                        <path
                                                            d="M9 -1.90735e-06C10.1819 -1.90735e-06 11.3522 0.23279 12.4442 0.685081C13.5361 1.13737 14.5282 1.80031 15.364 2.63604C16.1997 3.47176 16.8626 4.46392 17.3149 5.55585C17.7672 6.64778 18 7.8181 18 9C18 10.1819 17.7672 11.3522 17.3149 12.4442C16.8626 13.5361 16.1997 14.5282 15.364 15.364C14.5282 16.1997 13.5361 16.8626 12.4442 17.3149C11.3522 17.7672 10.1819 18 9 18L9 9V-1.90735e-06Z"
                                                            fill="#D6D6D6" />
                                                    </svg>
                                                @else
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18"
                                                        height="18" viewBox="0 0 18 18" fill="none">
                                                        <path
                                                            d="M18 9C18 13.9706 13.9706 18 9 18C4.02944 18 0 13.9706 0 9C0 4.02944 4.02944 0 9 0C13.9706 0 18 4.02944 18 9Z"
                                                            fill="#08AA36" />
                                                    </svg>
                                                @endif
                                            </td>
                                            <td>{{ number_format($item->total_tax) }}</td>
                                            {{-- <td>
                                                <a href="{{ route('import.edit', $item->id) }}">
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
                </div>
            </div>
        </div>
    </section>

    {{-- Pagination --}}
    <div class="paginator mt-2 d-flex justify-content-end">
        {{ $import->appends(request()->except('page'))->links() }}
    </div>
</div>
