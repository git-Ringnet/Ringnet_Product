<x-navbar :title="$title" activeGroup="sell" activeName="guest" :workspacename="$workspacename"></x-navbar>
<div class="content-wrapper1 py-2">
    <div class="d-flex justify-content-between align-items-center pl-4 ml-1">
        <div class="container-fluided">
            <div class="mb">
                <span class="font-weight-bold">Bán hàng</span>
                <span class="mx-2"><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                            fill="#26273B" fill-opacity="0.8" />
                    </svg>
                </span>
                <span class="font-weight-bold text-secondary">Khách hàng</span>
            </div>
        </div>
        <div class="container-fluided z-index-block">
            <div class="row m-0">
                <a href="{{ route('guests.create', ['workspace' => $workspacename]) }}">
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
                        <span class="text-button-add">Tạo mới</span>
                    </button>
                </a>
                <button class="btn-option bg-white border-0">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
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
                </button>
            </div>
        </div>
    </div>
</div>
<div class="bg-filter-search pl-4 border-bottom-0">
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
<div class="content-wrapper py-0 pl-0 pr-2">
    <section class="content">
        <div class="container-fluided">
            <div class="col-12 p-0 m-0">
                <div class="card scroll-custom">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-hover">
                            <thead class="sticky-head">
                                <tr>
                                    <th class="my-0 py-2" style="width: 1%"></th>
                                    <th class="bg-white pl-0 my-0 py-2" style="width: 2%">
                                        <input type="checkbox" name="all" id="checkall">
                                    </th>
                                    <th class="py-2" scope="col" style="width: 25%;">
                                        <span class="d-flex">
                                            <a href="#" class="sort-link" data-sort-by="guest_name_display"
                                                data-sort-type="ASC">
                                                <button class="btn-sort" type="submit">
                                                    <span class="text-nav text-secondary">Công ty</span>
                                                </button>
                                            </a>
                                            <div class="icon" id="icon-guest_name_display"></div>
                                        </span>
                                    </th>
                                    <th class="py-2" scope="col" style="width: 25%;">
                                        <span class="d-flex">
                                            <a href="#" class="sort-link" data-sort-by="guest_name_display"
                                                data-sort-type="ASC">
                                                <button class="btn-sort" type="submit">
                                                    <span class="text-nav text-secondary">Mã số thuế</span>
                                                </button>
                                            </a>
                                            <div class="icon" id="icon-guest_name_display"></div>
                                        </span>
                                    </th>
                                    {{-- <th class="py-2" scope="col" style="width: 15%;">
                                        <span class="d-flex">
                                            <a href="#" class="sort-link" data-sort-by="guest_email"
                                                data-sort-type="ASC">
                                                <button class="btn-sort" type="submit">
                                                    <span class="text-nav text-secondary">Email</span>
                                                </button></a>
                                            <div class="icon" id="icon-guest_email"></div>
                                        </span>
                                    </th> --}}
                                    {{-- <th class="py-2" scope="col" style="width: 15%;">
                                        <span class="d-flex">
                                            <a href="#" class="sort-link" data-sort-by="guest_phone"
                                                data-sort-type="ASC">
                                                <button class="btn-sort" type="submit">
                                                    <span class="text-nav text-secondary">Điện thoại</span>
                                                </button>
                                            </a>
                                            <div class="icon" id="icon-guest_phone"></div>
                                        </span>
                                    </th> --}}
                                    <th class="py-2" scope="col">
                                        <span class="d-flex">
                                            <a href="#" class="sort-link" data-sort-by="guest_debt"
                                                data-sort-type="ASC">
                                                <button class="btn-sort" type="submit">
                                                    <span class="text-nav text-secondary">Dư nợ</span>
                                                </button>
                                            </a>
                                            <div class="icon" id="icon-guest_debt"></div>
                                        </span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($guests as $item)
                                    <tr class="position-relative">
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
                                                        <rect width="6" height="10" fill="white"></rect>
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </td>
                                        <td class="pl-0 py-2"><input type="checkbox" class="cb-element"
                                                name="ids[]" id="checkbox" value=""
                                                onclick="event.stopPropagation();"></td>
                                        <td class="py-2">{{ $item->guest_name_display }}</td>
                                        <td class="py-2">{{ $item->guest_code }}</td>
                                        {{-- <td class="py-2">{{ $item->guest_email }}</td>
                                        <td class="py-2">{{ $item->guest_phone }}</td> --}}
                                        <td class="py-2">
                                            {{ number_format($item->sumDebt) }}
                                        </td>
                                        <td class="position-absolute m-0 p-0 border-0 bg-hover-icon"
                                            style="right: 10px; top: 3px;">
                                            <div class="d-flex w-100">
                                                <a
                                                    href="{{ route('guests.show', ['workspace' => $workspacename, 'guest' => $item->id]) }}">
                                                    <div class="m-0 px-2 py-1 mx-2 rounded">
                                                        <svg width="16" height="16" viewBox="0 0 16 16"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path opacity="0.985" fill-rule="evenodd"
                                                                clip-rule="evenodd"
                                                                d="M11.1719 1.04696C11.7535 0.973552 12.2743 1.11418 12.7344 1.46883C13.001 1.72498 13.2562 1.9906 13.5 2.26571C13.9462 3.00226 13.9358 3.73143 13.4688 4.45321C10.9219 7.04174 8.35416 9.60946 5.76563 12.1563C5.61963 12.245 5.46338 12.3075 5.29688 12.3438C4.59413 12.4153 3.891 12.483 3.1875 12.547C2.61265 12.4982 2.32619 12.1857 2.32813 11.6095C2.3716 10.8447 2.44972 10.0843 2.5625 9.32821C2.60666 9.22943 2.65874 9.13568 2.71875 9.04696C5.26563 6.50008 7.8125 3.95321 10.3594 1.40633C10.6073 1.22846 10.8781 1.10867 11.1719 1.04696ZM11.3594 2.04696C11.5998 2.02471 11.8185 2.08201 12.0156 2.21883C12.2188 2.42196 12.4219 2.62508 12.625 2.82821C12.8393 3.14436 12.8497 3.4673 12.6562 3.79696C12.4371 4.02136 12.2131 4.24011 11.9844 4.45321C11.4427 3.93236 10.9115 3.40111 10.3906 2.85946C10.5933 2.64116 10.8016 2.42762 11.0156 2.21883C11.1255 2.14614 11.2401 2.08885 11.3594 2.04696ZM9.60938 3.60946C10.1552 4.13961 10.6968 4.67608 11.2344 5.21883C9.21353 7.23968 7.19272 9.26049 5.17188 11.2813C4.571 11.3686 3.96684 11.4364 3.35938 11.4845C3.41572 10.8909 3.473 10.2971 3.53125 9.70321C5.56359 7.67608 7.58962 5.64483 9.60938 3.60946Z"
                                                                fill="#6C6F74" />
                                                            <path opacity="0.979" fill-rule="evenodd"
                                                                clip-rule="evenodd"
                                                                d="M1.17188 14.1406C5.71356 14.1354 10.2552 14.1406 14.7969 14.1563C15.0348 14.2355 15.1598 14.4022 15.1719 14.6563C15.147 14.915 15.0116 15.0816 14.7656 15.1563C10.2448 15.1771 5.72397 15.1771 1.20312 15.1563C0.807491 14.9903 0.708531 14.7143 0.90625 14.3281C0.978806 14.2377 1.06735 14.1752 1.17188 14.1406Z"
                                                                fill="#6C6F74" />
                                                        </svg>
                                                    </div>
                                                </a>
                                                <a href="#">
                                                    <div class="rounded">
                                                        <form onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                                                            action="{{ route('guests.destroy', ['workspace' => $workspacename, 'guest' => $item->id]) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm">
                                                                <svg width="16" height="16"
                                                                    viewBox="0 0 16 16" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path opacity="0.936" fill-rule="evenodd"
                                                                        clip-rule="evenodd"
                                                                        d="M6.40625 0.968766C7.44813 0.958304 8.48981 0.968772 9.53125 1.00016C9.5625 1.03156 9.59375 1.06296 9.625 1.09436C9.65625 1.49151 9.66663 1.88921 9.65625 2.28746C10.7189 2.277 11.7814 2.28747 12.8438 2.31886C12.875 2.35025 12.9063 2.38165 12.9375 2.41305C12.9792 2.99913 12.9792 3.58522 12.9375 4.17131C12.9063 4.24457 12.8542 4.2969 12.7813 4.32829C12.6369 4.35948 12.4911 4.36995 12.3438 4.35969C12.3542 7.45762 12.3438 10.5555 12.3125 13.6533C12.1694 14.3414 11.7632 14.7914 11.0938 15.0034C9.01044 15.0453 6.92706 15.0453 4.84375 15.0034C4.17433 14.7914 3.76808 14.3414 3.625 13.6533C3.59375 10.5555 3.58333 7.45762 3.59375 4.35969C3.3794 4.3844 3.18148 4.34254 3 4.2341C2.95833 3.62708 2.95833 3.02007 3 2.41305C3.03125 2.38165 3.0625 2.35025 3.09375 2.31886C4.15605 2.28747 5.21855 2.277 6.28125 2.28746C6.27088 1.88921 6.28125 1.49151 6.3125 1.09436C6.35731 1.06018 6.38856 1.01832 6.40625 0.968766ZM6.96875 1.65951C7.63544 1.65951 8.30206 1.65951 8.96875 1.65951C8.96875 1.86882 8.96875 2.07814 8.96875 2.28746C8.30206 2.28746 7.63544 2.28746 6.96875 2.28746C6.96875 2.07814 6.96875 1.86882 6.96875 1.65951ZM3.65625 2.9782C6.53125 2.9782 9.40625 2.9782 12.2813 2.9782C12.2813 3.18752 12.2813 3.39684 12.2813 3.60615C9.40625 3.60615 6.53125 3.60615 3.65625 3.60615C3.65625 3.39684 3.65625 3.18752 3.65625 2.9782ZM4.34375 4.35969C6.76044 4.35969 9.17706 4.35969 11.5938 4.35969C11.6241 7.5032 11.5929 10.643 11.5 13.7789C11.3553 14.05 11.1366 14.2279 10.8438 14.3127C8.92706 14.3546 7.01044 14.3546 5.09375 14.3127C4.80095 14.2279 4.5822 14.05 4.4375 13.7789C4.34462 10.643 4.31337 7.5032 4.34375 4.35969Z"
                                                                        fill="#6C6F74" />
                                                                    <path opacity="0.891" fill-rule="evenodd"
                                                                        clip-rule="evenodd"
                                                                        d="M5.78125 5.28118C6.0306 5.2259 6.20768 5.30924 6.3125 5.53118C6.35419 8.052 6.35419 10.5729 6.3125 13.0937C6.08333 13.427 5.85417 13.427 5.625 13.0937C5.58333 10.552 5.58333 8.01037 5.625 5.46868C5.69031 5.4141 5.7424 5.3516 5.78125 5.28118Z"
                                                                        fill="#6C6F74" />
                                                                    <path opacity="0.891" fill-rule="evenodd"
                                                                        clip-rule="evenodd"
                                                                        d="M7.78125 5.28118C8.03063 5.2259 8.20769 5.30924 8.3125 5.53118C8.35419 8.052 8.35419 10.5729 8.3125 13.0937C8.08331 13.427 7.85419 13.427 7.625 13.0937C7.58331 10.552 7.58331 8.01037 7.625 5.46868C7.69031 5.4141 7.74238 5.3516 7.78125 5.28118Z"
                                                                        fill="#6C6F74" />
                                                                    <path opacity="0.891" fill-rule="evenodd"
                                                                        clip-rule="evenodd"
                                                                        d="M9.78125 5.28118C10.0306 5.2259 10.2077 5.30924 10.3125 5.53118C10.3542 8.052 10.3542 10.5729 10.3125 13.0937C10.0833 13.427 9.85419 13.427 9.625 13.0937C9.58331 10.552 9.58331 8.01037 9.625 5.46868C9.69031 5.4141 9.74238 5.3516 9.78125 5.28118Z"
                                                                        fill="#6C6F74" />
                                                                </svg>
                                                            </button>
                                                        </form>
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
    </section>
</div>
<script src="{{ asset('/dist/js/filter.js') }}"></script>

<script type="text/javascript">
    function filtername() {
        filterButtons("myInput-name", "ks-cboxtags-name");
    }

    function filtercompany() {
        filterButtons("myInput-company", "ks-cboxtags-company");
    }
    var filter = [];
    $(document).ready(function() {
        // get id check box name
        var idName = [];
        var idCompany = [];

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
                        } else if (nameToDelete === 'company') {
                            $('.deselect-all-company').click();
                            company = [];
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
                        sendAjaxRequest(search, email, phone, debt_op, debt, idName, idCompany);
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

            if (buttonName === 'company') {
                $('.ks-cboxtags-company input[type="checkbox"]:checked').each(function() {
                    idCompany.push($(this).val());
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
                url: '{{ URL::to('search') }}',
                data: {
                    'search': search,
                    'email': email,
                    'phone': phone,
                    'debt': debt,
                    'idName': idName,
                    'idCompany': idCompany,
                },
                success: function(data) {
                    $('tbody').html(data.output);
                    var dataValues = {
                        name: data.name.join(', '),
                        email: data.email,
                        phone: data.phone,
                        debt: data.debt,
                        company: data.company.join(', ')
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

        function sendAjaxRequest(search, email, phone, debt_op, debt, idName, idCompany) {
            $.ajax({
                type: 'get',
                url: '{{ URL::to('search') }}',
                data: {
                    'search': search,
                    'email': email,
                    'phone': phone,
                    'debt_op': debt_op,
                    'debt': debt,
                    'idName': idName,
                    'idCompany': idCompany,
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
                url: '{{ URL::to('search') }}',
                data: {
                    'search': search,
                    'email': email,
                    'phone': phone,
                    'debt': debt,
                    'idName': idName,
                    'idCompany': idCompany,
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
