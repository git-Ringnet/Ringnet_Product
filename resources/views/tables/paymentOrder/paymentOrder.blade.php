<x-navbar :title="$title" activeGroup="buy" activeName="paymentorder"></x-navbar>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper1 py-2">
    <!-- Content Header (Page header) -->
    <div class="d-flex justify-content-between align-items-center pl-4">
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
                <span>Thanh toán mua hàng</span>
            </div>
        </div>
        <div class="container-fluided z-index-block">
            <div class="row m-0">
                <a href="{{ route('paymentOrder.create', $workspacename) }}">
                    <button type="button" class="custom-btn d-flex align-items-center h-100" style="margin-right:10px">
                        <svg class="mr-1" width="12" height="12" viewBox="0 0 18 18" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M9 0C9.58186 -2.96028e-08 10.0536 0.471694 10.0536 1.05356L10.0536 16.9464C10.0536 17.5283 9.58186 18 9 18C8.41814 18 7.94644 17.5283 7.94644 16.9464V1.05356C7.94644 0.471694 8.41814 -2.96028e-08 9 0Z"
                                fill="white"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M18 9C18 9.58187 17.5283 10.0536 16.9464 10.0536H1.05356C0.471694 10.0536 -2.07219e-07 9.58187 0 9C-7.69672e-07 8.41814 0.471695 7.94644 1.05356 7.94644H16.9464C17.5283 7.94644 18 8.41814 18 9Z"
                                fill="white"></path>
                        </svg>
                        <span>Tạo mới</span>
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>

{{-- Search --}}
<div class="bg-filter-search pl-4">
    <div class="content-wrapper1 py-2">
        <div class="row m-auto filter p-0">
            <div class="w-100">
                <div class="row mr-0">
                    <div class="col-md-5 d-flex align-items-center">
                        <form action="" method="get" id="search-filter" class="p-0 m-0">
                            <div class="position-relative ml-1">
                                <input type="text" placeholder="Tìm kiếm" name="keywords"
                                    class="pr-4 w-100 input-search" value="">
                                <span id="search-icon" class="search-icon"><i class="fas fa-search"
                                        aria-hidden="true"></i></span>
                            </div>
                        </form>
                        <div class="dropdown ml-1">
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
                                <span class="text-secondary mx-1 text-filter"> Bộ lọc</span>
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
<div class="content-wrapper py-0 px-2" style="min-height: 394px;">
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
                                        <th class="border-top-0 my-0 py-2"></th>
                                        <th class="border-top-0 bg-white pl-0 my-0 py-2">
                                            <input type="checkbox" name="all" id="checkall">
                                        </th>
                                        <th scope="col" class="border-top-0 bg-white my-0 py-2">
                                            <span class="d-flex">
                                                <a href="#" class="sort-link" data-sort-by="id"
                                                    data-sort-type="#">
                                                    <button class="btn-sort" type="submit"><span
                                                            class="text-secondary text-nav">Mã thanh
                                                            toán</span></button>
                                                </a>
                                                <div class="icon" id="icon-id"></div>
                                            </span>
                                        </th>
                                        <th scope="col" class="border-top-0 bg-white my-0 py-2">
                                            <span class="d-flex">
                                                <a href="#" class="sort-link" data-sort-by="id"
                                                    data-sort-type="#">
                                                    <button class="btn-sort" type="submit"><span
                                                            class="text-secondary text-nav">Đơn mua
                                                            hàng</span></button>
                                                </a>
                                                <div class="icon" id="icon-id"></div>
                                            </span>
                                        </th>
                                        <th scope="col" class="border-top-0 bg-white my-0 py-2">
                                            <span class="d-flex">
                                                <a href="#" class="sort-link" data-sort-by="id"
                                                    data-sort-type="#">
                                                    <button class="btn-sort" type="submit"><span
                                                            class="text-secondary text-nav">Nhà cung
                                                            cấp</span></button>
                                                </a>
                                                <div class="icon" id="icon-id"></div>
                                            </span>
                                        </th>
                                        <th scope="col" class="border-top-0 bg-white my-0 py-2">
                                            <span class="d-flex">
                                                <a href="#" class="sort-link" data-sort-by="id"
                                                    data-sort-type="#">
                                                    <button class="btn-sort" type="submit"><span
                                                            class="text-secondary text-nav">Trạng thái</span></button>
                                                </a>
                                                <div class="icon" id="icon-id"></div>
                                            </span>
                                        </th>
                                        <th scope="col" class="border-top-0 bg-white my-0 py-2">
                                            <span class="d-flex">
                                                <a href="#" class="sort-link" data-sort-by="id"
                                                    data-sort-type="#">
                                                    <button class="btn-sort" type="submit"><span
                                                            class="text-secondary text-nav">Hạn thanh
                                                            toán</span></button>
                                                </a>
                                                <div class="icon" id="icon-id"></div>
                                            </span>
                                        </th>
                                        <th scope="col" class="border-top-0 bg-white my-0 py-2">
                                            <span class="d-flex">
                                                <a href="#" class="sort-link" data-sort-by="id"
                                                    data-sort-type="#">
                                                    <button class="btn-sort" type="submit"><span
                                                            class="text-secondary text-nav">Tổng tiền</span></button>
                                                </a>
                                                <div class="icon" id="icon-id"></div>
                                            </span>
                                        </th>
                                        <th scope="col" class="border-top-0 bg-white my-0 py-2">
                                            <span class="d-flex">
                                                <a href="#" class="sort-link" data-sort-by="id"
                                                    data-sort-type="#">
                                                    <button class="btn-sort" type="submit"><span
                                                            class="text-secondary text-nav">Đã thanh
                                                            toán</span></button>
                                                </a>
                                                <div class="icon" id="icon-id"></div>
                                            </span>
                                        </th>
                                        <th scope="col" class="border-top-0 bg-white my-0 py-2">
                                            <span class="d-flex">
                                                <a href="#" class="sort-link" data-sort-by="id"
                                                    data-sort-type="#">
                                                    <button class="btn-sort" type="submit"><span
                                                            class="text-secondary text-nav">Dư nợ</span></button>
                                                </a>
                                                <div class="icon" id="icon-id"></div>
                                            </span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($payment as $item)
                                        <tr>
                                            <td class="pr-0 py-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="6" class="mb-1"
                                                    height="10" viewBox="0 0 6 10" fill="none">
                                                    <g clip-path="url(#clip0_2326_17048)">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M1 8C1.55228 8 2 8.44772 2 9C2 9.55228 1.55228 10 1 10C0.447715 10 0 9.55228 0 9C0 8.44772 0.447715 8 1 8ZM5 8C5.55228 8 6 8.44772 6 9C6 9.55228 5.55228 10 5 10C4.44772 10 4 9.55228 4 9C4 8.44772 4.44772 8 5 8ZM1 4C1.55228 4 2 4.44772 2 5C2 5.55228 1.55228 6 1 6C0.447715 6 0 5.55228 0 5C0 4.44772 0.447715 4 1 4ZM5 4C5.55228 4 6 4.44772 6 5C6 5.55228 5.55228 6 5 6C4.44772 6 4 5.55228 4 5C4 4.44772 4.44772 4 5 4ZM1 0C1.55228 0 2 0.447715 2 1C2 1.55228 1.55228 2 1 2C0.447715 2 0 1.55228 0 1C0 0.447715 0.447715 0 1 0ZM5 0C5.55228 0 6 0.447715 6 1C6 1.55228 5.55228 2 5 2C4.44772 2 4 1.55228 4 1C4 0.447715 4.44772 0 5 0Z"
                                                            fill="#282A30"></path>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_2326_17048">
                                                            <rect width="6" height="10" fill="white">
                                                            </rect>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                            </td>
                                            <td class="pl-0 py-2">
                                                <input type="checkbox" class="p-0 m-0">
                                            </td>
                                            <td class="py-2">{{ $item->id }}</td>
                                            <td class="py-2">
                                                <a class="duongdan"
                                                    href="{{ route('paymentOrder.edit', ['workspace' => $workspacename, 'paymentOrder' => $item->id]) }}">
                                                    {{ $item->getQuotation->quotation_number }}
                                                </a>
                                            </td>
                                            <td class="py-2">{{ $item->getProvideName->provide_name_display }}</td>
                                            <td class="py-2">
                                                @if ($item->status == 1)
                                                    @if ($item->payment > 0)
                                                        <span style="color: #858585">Đặt cọc</span>
                                                    @else
                                                        <span style="color: #858585">Chưa thanh toán</span>
                                                    @endif
                                                @elseif($item->status == 2)
                                                    <span style="color: #08AA36">Thanh toán đủ</span>
                                                @elseif($item->status == 3)
                                                    <span style="color: #0052CC">Đến hạn trong
                                                        {{ $item->formatDate($item->payment_date)->diffInDays($today) + 1 }}
                                                        ngày</span>
                                                @elseif($item->status == 4)
                                                    <span style="color:#EC212D">Quá hạn trong
                                                        {{ $item->formatDate($item->payment_date)->diffInDays($today) }}
                                                        ngày</span>
                                                @else
                                                    <span style="color: #0052CC">Đến hạn</span>
                                                @endif
                                            </td>
                                            <td class="py-2">
                                                {{ date_format(new DateTime($item->payment_date), 'd/m/Y') }}</td>
                                            <td class="py-2">{{ number_format($item->total) }}</td>
                                            <td class="py-2">
                                                {{ fmod($item->payment, 2) > 0 ? number_format($item->payment, 2, '.', ',') : number_format($item->payment) }}
                                            </td>
                                            <td class="py-2">
                                                {{ fmod($item->debt, 2) > 0 ? number_format($item->debt, 2, '.', ',') : number_format($item->debt) }}
                                            </td>
                                            {{-- <td>
                                                <div class="d-flex align-items-center">
                                                    <a href="" class="mr-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="21"
                                                            height="21" viewBox="0 0 21 21" fill="none">
                                                            <path
                                                                d="M6.125 1.0001C3.01839 1.0001 0.5 3.5185 0.5 6.6251V14.875C0.5 17.9817 3.01839 20.5 6.125 20.5H14.3752C17.4818 20.5 20.0002 17.9817 20.0002 14.875V10.0001C20.0002 9.37879 19.4965 8.8751 18.8752 8.8751C18.2539 8.8751 17.7502 9.37879 17.7502 10.0001V14.875C17.7502 16.7391 16.239 18.25 14.3752 18.25H6.125C4.26104 18.25 2.75 16.7391 2.75 14.875V6.6251C2.75 4.76114 4.26104 3.2501 6.125 3.2501H9.5C10.1213 3.2501 10.625 2.74642 10.625 2.1251C10.625 1.50379 10.1213 1.0001 9.5 1.0001H6.125Z"
                                                                fill="#6D7075"></path>
                                                            <path
                                                                d="M17.2009 5.79192L15.0796 3.6706L8.79218 9.95794C7.65777 11.0923 6.88452 12.5372 6.5699 14.1103C6.54716 14.224 6.64742 14.3242 6.76113 14.3016C8.33427 13.9869 9.77909 13.2136 10.9135 12.0793L17.2009 5.79192Z"
                                                                fill="#6D7075"></path>
                                                            <path
                                                                d="M19.1838 0.185187C18.8994 0.0903425 18.5856 0.164397 18.3737 0.376467L16.6704 2.07961L18.7917 4.20093L20.495 2.49778C20.7071 2.28571 20.781 1.97203 20.6862 1.68751C20.4498 0.978207 19.8932 0.421617 19.1838 0.185187Z"
                                                                fill="#6D7075"></path>
                                                        </svg>
                                                    </a>
                                                    <form
                                                        action="{{ route('paymentOrder.destroy', ['workspace' => $workspacename, 'paymentOrder' => $item->id]) }}"
                                                        method="post" id="search-filter">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none">
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M18.5531 9.75C18.9672 9.75 19.3031 10.0858 19.3031 10.5C19.3031 10.5578 19.2963 10.6155 19.2831 10.6718L17.0442 20.1872C16.7253 21.5422 15.5161 22.5 14.124 22.5H9.87605C8.4839 22.5 7.27465 21.5422 6.9558 20.1872L4.71688 10.6718C4.62202 10.2686 4.87197 9.86481 5.27517 9.76993C5.33146 9.75669 5.38911 9.75 5.44695 9.75H18.5531ZM12.75 1.5C14.8211 1.5 16.5 3.17894 16.5 5.25H19.5C20.3284 5.25 21 5.92158 21 6.75V7.5C21 7.91421 20.6642 8.25 20.25 8.25H3.75C3.33579 8.25 3 7.91421 3 7.5V6.75C3 5.92158 3.67158 5.25 4.5 5.25H7.5C7.5 3.17894 9.17894 1.5 11.25 1.5H12.75ZM12.75 3.75H11.25C10.4216 3.75 9.75 4.42158 9.75 5.25H14.25C14.25 4.42158 13.5784 3.75 12.75 3.75Z"
                                                                    fill="#6D7075"></path>
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </div>
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
    {{ $payment->appends(request()->except('page'))->links() }}
</div>


</div>
