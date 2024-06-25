<x-navbar :title="$title" activeGroup="systemFirst" activeName="groups"></x-navbar>
<form action="{{ route('groups.update', ['workspace' => $workspacename, 'group' => $group->id]) }}" method="POST"
    onsubmit="return checkDuplicateRepresentatives()">
    @csrf
    @method('PUT')
    <div class="content-wrapper m-0">
        <div class="content-header-fixed p-0 margin-250">
            <div class="content__header--inner margin-left32">
                <div class="content__heading--left text-long-special">
                    <span>
                        <a class="text-dark" href="{{ route('groups.index', ['workspace' => $workspacename]) }}">Nhóm đối
                            tượng</a>
                    </span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8" />
                        </svg>
                    </span>
                    <span class="font-weight-bold">Sửa nhóm đối tượng</span>
                </div>
                <div class="d-flex content__heading--right">
                    <div class="row m-0">
                        <div class="dropdown">
                            <a href="{{ route('groups.index', ['workspace' => $workspacename]) }}">
                                <button type="button" class="btn-save-print d-flex align-items-center h-100 rounded"
                                    style="margin-right:10px;">
                                    <svg class="mx-1" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M2.96967 2.96967C3.26256 2.67678 3.73744 2.67678 4.03033 2.96967L8 6.939L11.9697 2.96967C12.2626 2.67678 12.7374 2.67678 13.0303 2.96967C13.3232 3.26256 13.3232 3.73744 13.0303 4.03033L9.061 8L13.0303 11.9697C13.2966 12.2359 13.3208 12.6526 13.1029 12.9462L13.0303 13.0303C12.7374 13.3232 12.2626 13.3232 11.9697 13.0303L8 9.061L4.03033 13.0303C3.73744 13.3232 3.26256 13.3232 2.96967 13.0303C2.67678 12.7374 2.67678 12.2626 2.96967 11.9697L6.939 8L2.96967 4.03033C2.7034 3.76406 2.6792 3.3474 2.89705 3.05379L2.96967 2.96967Z"
                                            fill="#6D7075"></path>
                                    </svg>
                                    <span class="text-button">Hủy</span>
                                </button>
                            </a>
                        </div>
                        <button type="submit" class="custom-btn d-flex align-items-center h-100"
                            style="margin-right:10px">
                            <svg class="mx-1" width="18" height="18" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M6.75 1V6.75C6.75 7.5297 7.34489 8.17045 8.10554 8.24313L8.25 8.25H14V13C14 14.1046 13.1046 15 12 15H4C2.89543 15 2 14.1046 2 13V3C2 1.89543 2.89543 1 4 1H6.75ZM8 1L14 7.03022H9C8.44772 7.03022 8 6.5825 8 6.03022V1Z"
                                    fill="white" />
                            </svg>
                            <p class="p-0 m-0">Lưu nhóm đối tượng</p>
                        </button>
                        <div>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content editgroup" style="margin-top:3.8rem">
            <section class="margin-250">
                <div id="info" class="content tab-pane in active">
                    <section class="content">
                        <div class="container-fluided">
                            <div class="bg-filter-search border-top-0 text-left border-custom">
                                <p class="font-weight-bold text-uppercase info-chung--heading">THÔNG TIN CHUNG</p>
                            </div>
                            <div class="info-chung">
                                <div class="content-info">
                                    <div class="d-flex align-items-center height-60-mobile">
                                        <div class="title-info py-2 border border-left-0 height-100">
                                            <p class="p-0 m-0 required-label text-danger margin-left32 text-13-red">
                                                Tên nhóm đối tượng
                                            </p>
                                        </div>
                                        <input type="text" required placeholder="Nhập thông tin"
                                            name="group_name_display" value="{{ $group->name }}" required
                                            class="border w-100 py-2 border-left-0 height-100 border-right-0 px-3 text-13-black">
                                    </div>
                                    <div class="d-flex align-items-center height-60-mobile">
                                        <div class="title-info py-2 border border-top-0 border-left-0 height-100">
                                            <p class="p-0 m-0 margin-left32 text-13-red required-label">Loại đối tượng
                                            </p>
                                        </div>
                                        <select name="grouptype_id" id="grouptypeSelect" disabled required
                                            class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100">
                                            <option value="">Chọn loại nhóm</option>
                                            @foreach ($grouptypes as $grouptype)
                                                <option
                                                    {{ isset($group) && $group->grouptype_id == $grouptype->id ? 'selected' : '' }}
                                                    value="{{ $grouptype->id }}">{{ $grouptype->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="d-flex  align-items-center height-60-mobile ">
                                        <div class="title-info height-100 py-2 border border-top-0 border-left-0">
                                            <p class="p-0 m-0 margin-left32 text-13">Mô tả</p>
                                        </div>
                                        <input type="text" placeholder="Nhập thông tin" name="group_desc"
                                            class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100"
                                            value="{{ $group->description }}">
                                    </div>
                                    <a type="button"
                                        class="d-flex align-items-center p-2 position-sticky addGuestNew mt-2"
                                        data-toggle="modal" data-target="#listModal"
                                        style="bottom: 0;border-radius:4px;background-color:#F2F2F2;">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 16 16" fill="none">
                                                <path
                                                    d="M8.75 3C8.75 2.58579 8.41421 2.25 8 2.25C7.58579 2.25 7.25 2.58579 7.25 3V7.25H3C2.58579 7.25 2.25 7.58579 2.25 8C2.25 8.41421 2.58579 8.75 3 8.75H7.25V13C7.25 13.4142 7.58579 13.75 8 13.75C8.41421 13.75 8.75 13.4142 8.75 13V8.75H13C13.4142 8.75 13.75 8.41421 13.75 8C13.75 7.58579 13.4142 7.25 13 7.25H8.75V3Z"
                                                    fill="#282A30" />
                                            </svg>
                                        </span>
                                        <span class="text-13-black pl-3 pt-1 title-gr"
                                            style="font-weight: 600 !important;">Thêm</span>
                                    </a>
                                    <p class="font-weight-bold text-uppercase info-chung--heading">Danh sách trong nhóm
                                    </p>
                                    <table id="example2" class="table table-hover bg-white rounded">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="width:5%;padding-left: 2rem;"
                                                    class="height-52">
                                                    <input type="checkbox" name="all" id="checkall">
                                                </th>
                                                <th scope="col" class="height-52" style="width: 14%;">
                                                    <span class="d-flex justify-content-start">
                                                        <a href="#" class="sort-link btn-submit"
                                                            data-sort-by="quotation_number" data-sort-type="DESC">
                                                            <button class="btn-sort text-13" type="submit">
                                                                Mã
                                                            </button>
                                                        </a>
                                                        <div class="icon" id="icon-quotation_number"></div>
                                                    </span>
                                                </th>
                                                <th scope="col" class="height-52" style="width: 14%;">
                                                    <span class="d-flex justify-content-start">
                                                        <a href="#" class="sort-link btn-submit"
                                                            data-sort-by="quotation_number" data-sort-type="DESC">
                                                            <button class="btn-sort text-13" type="submit">
                                                                Tên
                                                            </button>
                                                        </a>
                                                        <div class="icon" id="icon-quotation_number"></div>
                                                    </span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbody-data-group">
                                            @foreach ($dataGroup['results'] as $item)
                                                <tr class="position-relative height-52">
                                                    <td class="text-13-black border-top-0 border-bottom">
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
                                                                        <rect width="6" height="10"
                                                                            fill="white" />
                                                                    </clipPath>
                                                                </defs>
                                                            </svg>
                                                        </span>
                                                        <input type="checkbox" class="checkall-btn p-0 m-0"
                                                            name="ids[]" id="checkbox" value="">
                                                    </td>
                                                    <td
                                                        class="text-13-black max-width180 text-left border-top-0 border-bottom">
                                                        {{ $item->id }}
                                                    </td>
                                                    <td
                                                        class="text-13-black max-width180 text-left border-top-0 border-bottom">
                                                        {{ $item->name }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            {{-- <div class="bg-filter-search border-top-0 text-left border-custom">
                                <p class="font-weight-bold text-uppercase info-chung--heading">THÔNG TIN NGƯỜI ĐẠI DIỆN
                                </p>
                            </div>
                            <div class="info-chung">
                                <div class="container-fluided order_content">
                                    <table class="table table-hover bg-white rounded">
                                        <thead>
                                            <tr>
                                                <th class="border-right text-13 padding-left35" style="width: 23%;">
                                                    Người đại diện</th>
                                                <th class="border-right text-13">Số điện thoại</th>
                                                <th class="border-right text-13">Email</th>
                                                <th class="border-right text-13">Địa chỉ nhận</th>
                                                <th style="width: 8%;"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($representgroup as $itemRepresent)
                                                <tr id="dynamic-row-1" class="bg-white addProduct representative-row">
                                                    <td
                                                        class="border border-top-0 border-left-0 border-right-0 padding-left35 px-0">
                                                        <input type="hidden" value="{{ $itemRepresent->id }}"
                                                            name="represent_id[]">
                                                        <input type="text" autocomplete="off"
                                                            value="{{ $itemRepresent->represent_name }}"
                                                            class="border-0 py-1 w-100 text-13-black represent_name "
                                                            required="" name="represent_name[]">
                                                    </td>
                                                    <td class="border border-top-0 border-right-0">
                                                        <input type="number" autocomplete="off"
                                                            value="{{ $itemRepresent->represent_phone }}"
                                                            class="border-0 py-1 w-100 text-13-black represent_phone"
                                                            name="represent_phone[]">
                                                    </td>
                                                    <td class="border border-top-0 border-right-0">
                                                        <input type="email" autocomplete="off"
                                                            value="{{ $itemRepresent->represent_email }}"
                                                            class="border-0 py-1 w-100 text-13-black represent_email"
                                                            name="represent_email[]">
                                                    </td>
                                                    <td class="border border-top-0 border-right-0">
                                                        <input type="text" autocomplete="off"
                                                            value="{{ $itemRepresent->represent_address }}"
                                                            class="border-0 py-1 w-100 text-13-black represent_address"
                                                            name="represent_address[]">
                                                    </td>
                                                    <td class="border border-top-0 border-right-0 text-left deleteProduct"
                                                        data-id="{{ $itemRepresent->id }}">
                                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M10.5454 5C10.2442 5 9.99999 5.24421 9.99999 5.54545C9.99999 5.8467 10.2442 6.09091 10.5454 6.09091H13.4545C13.7558 6.09091 14 5.8467 14 5.54545C14 5.24421 13.7558 5 13.4545 5H10.5454ZM6 7.72726C6 7.42601 6.24421 7.18181 6.54545 7.18181H7.63637H16.3636H17.4545C17.7558 7.18181 18 7.42601 18 7.72726C18 8.02851 17.7558 8.27272 17.4545 8.27272H16.9091V17C16.9091 18.2113 15.9118 19.1818 14.7135 19.1818H9.25891C8.97278 19.1816 8.68906 19.1247 8.42499 19.0145C8.16092 18.9044 7.92126 18.7431 7.71979 18.5399C7.51833 18.3367 7.35905 18.0957 7.25112 17.8307C7.14347 17.5664 7.08903 17.2834 7.09091 16.9981V8.27272H6.54545C6.24421 8.27272 6 8.02851 6 7.72726ZM8.18182 17.0041V8.27272H15.8182V17C15.8182 17.5966 15.3216 18.0909 14.7135 18.0909H9.25938C9.11713 18.0908 8.97632 18.0625 8.84503 18.0077C8.71375 17.953 8.5946 17.8728 8.49444 17.7718C8.39429 17.6707 8.3151 17.5509 8.26144 17.4192C8.20779 17.2874 8.18074 17.1464 8.18182 17.0041ZM13.4545 10.0909C13.7558 10.0909 14 10.3351 14 10.6364V15.7273C14 16.0285 13.7558 16.2727 13.4545 16.2727C13.1533 16.2727 12.9091 16.0285 12.9091 15.7273V10.6364C12.9091 10.3351 13.1533 10.0909 13.4545 10.0909ZM11.0909 10.6364C11.0909 10.3351 10.8467 10.0909 10.5454 10.0909C10.2442 10.0909 9.99999 10.3351 9.99999 10.6364V15.7273C9.99999 16.0285 10.2442 16.2727 10.5454 16.2727C10.8467 16.2727 11.0909 16.0285 11.0909 15.7273V10.6364Z"
                                                                fill="#42526E">
                                                            </path>
                                                        </svg>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr id="dynamic-fields" class="bg-white"></tr>
                                        </tbody>
                                    </table>
                                </div>
                                <section class="content">
                                    <div class="container-fluided">
                                        <div class="d-flex">
                                            <button type="button" data-toggle="dropdown" id="add-field-btn"
                                                class="btn-save-print d-flex align-items-center h-100 py-1 px-2 ml-4 rounded activity"
                                                data-name1="KH" data-des="Thêm người đại diện ở trang sửa"
                                                style="margin-right:10px">
                                                <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="14"
                                                    height="14" viewBox="0 0 18 18" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M9 0C9.58186 -2.96028e-08 10.0536 0.471694 10.0536 1.05356L10.0536 16.9464C10.0536 17.5283 9.58186 18 9 18C8.41814 18 7.94644 17.5283 7.94644 16.9464V1.05356C7.94644 0.471694 8.41814 -2.96028e-08 9 0Z"
                                                        fill="#42526E"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M18 9C18 9.58187 17.5283 10.0536 16.9464 10.0536H1.05356C0.471694 10.0536 -2.07219e-07 9.58187 0 9C-7.69672e-07 8.41814 0.471695 7.94644 1.05356 7.94644H16.9464C17.5283 7.94644 18 8.41814 18 9Z"
                                                        fill="#42526E"></path>
                                                </svg>
                                                <span class="text-button">Thêm người đại diện</span>
                                            </button>
                                            <button type="button" class="btn-option py-1 px-2 bg-white border-0">
                                                <svg width="24" height="24" viewBox="0 0 24 24"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
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
                                </section>
                            </div> --}}
                        </div>
                    </section>
                </div>
            </section>
            {{-- Modal add --}}
            <div class="modal fade" id="listModal" tabindex="-1" role="dialog"
                aria-labelledby="productModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document" style="margin-top: 5%;">
                    <div class="modal-content">
                        <h5 class="modal-title">Danh sách</h5>
                        <div class="modal-body pb-0 px-2 pt-0">
                            <div class="content-info">
                                <div class="outer3-srcoll">
                                    <ul class="ks-cboxtags listData p-0 mb-1 px-2"
                                        data-group="{{ $group->grouptype_id }}">
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer border-top-0 py-1 px-1">
                            <button type="button" class="btn-save-print rounded h-100 text-table py-1"
                                data-dismiss="modal">Trở về</button>
                            <button type="button" class="custom-btn align-items-center h-100 py-1 px-2 text-table"
                                id="addGuest">Thêm</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<x-user-flow></x-user-flow>
<script src="{{ asset('/dist/js/export.js') }}"></script>
<script src="{{ asset('/dist/js/filter.js') }}"></script>
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });
        var selectedValue = $('.listData').attr('data-group');
        var data_obj;
        $('#grouptypeSelect').change(function() {
            selectedValue = $(this).val();
            $('.listData').attr('data-group', selectedValue);
        });
        var dataupdate = [];
        $(document).on('click', '.addGuestNew', function(e) {
            e.preventDefault();
            if (selectedValue) {
                $.ajax({
                    type: 'get',
                    url: "{{ route('dataObj') }}",
                    data: {
                        group_id: selectedValue
                    },
                    success: function(data) {
                        $('.listData').empty();
                        data_obj = data.obj;
                        data.results.forEach(function(item) {
                            var listItem = '<li>';
                            listItem += '<input type="checkbox" id="' + data.obj +
                                '_' + item.id + '" name="' + data.obj +
                                '[]" value="' + item.id + '">';
                            listItem += '<label for="' + item.name + '_' + item.id +
                                '">' + item.name + '</label>';
                            listItem += '</li>';
                            $('.listData').append(listItem);
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            } else {
                console.log('Group ID is not set.');
            }
        });

        function appendRowToTable(id, name) {
            var newRow = `
            <tr class="position-relative height-52">
                <td class="text-13-black border-top-0 border-bottom">
                    <span class="margin-Right10">
                        <svg xmlns="http://www.w3.org/2000/svg" width="6" height="10" viewBox="0 0 6 10" fill="none">
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
                    <input type="checkbox" class="checkall-btn p-0 m-0" name="ids[]" id="checkbox" value="${id}">
                </td>
                <td class="text-13-black max-width180 text-left border-top-0 border-bottom">
                    ${id}
                </td>
                <td class="text-13-black max-width180 text-left border-top-0 border-bottom">
                    ${name}
                </td>
            </tr>
        `;
            $('#tbody-data-group').append(newRow);
        }

        $(document).on('click', '#addGuest', function(e) {
            e.preventDefault();
            $('.ks-cboxtags input[type="checkbox"]').each(function() {
                const value = $(this).val();
                if ($(this).is(':checked') && dataupdate.indexOf(value) === -1) {
                    dataupdate.push(value);
                } else if (!$(this).is(':checked')) {
                    const index = dataupdate.indexOf(value);
                    if (index !== -1) {
                        dataupdate.splice(index, 1);
                    }
                }
            });
            if (dataupdate.length !== 0) {
                $.ajax({
                    type: 'get',
                    url: "{{ route('updateDataGroup') }}",
                    data: {
                        grouptype_id: selectedValue,
                        data_obj: data_obj,
                        group_id: {{ $group->id }},
                        dataupdate: dataupdate,
                    },
                    success: function(data) {
                        data.results.forEach(function(item) {
                            appendRowToTable(item.id, item.name);
                        });
                        dataupdate = [];
                    }
                });
            } else {
                console.log('duck');
            }
            $('#listModal').modal('hide');
        });
    });
</script>
{{-- <script type="text/javascript">
    function validateInput(input) {
        // Loại bỏ tất cả các ký tự ngoại trừ số và dấu "-"
        input.value = input.value.replace(/[^0-9-]/g, '');

        // Loại bỏ các dấu "-" liên tiếp
        input.value = input.value.replace(/-{2,}/g, '');
    }
    // Filter search
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
                url: '{{ URL::to('searchDetailgroup') }}',
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

    //////////////////////////////////////////////////////////////// 

    getKeygroup($('input[name="group_name_display"]'))
    let fieldCounter = 1;
    $("#add-field-btn").click(function() {
        let nextSoTT = $(".soTT").length + 1;
        // Tạo các phần tử HTML mới
        const newRow = $("<tr>", {
            "id": `dynamic-row-${fieldCounter}`,
            "class": `bg-white addProduct representative-row`,
        });
        const hoTen = $(
            "<td class='border border-top-0 border-left-0 padding-left35 px-0 border-right-0'><input type='hidden' name='represent_id[]'><input type='text' autocomplete='off' class='border-0 py-1 w-100 text-13-black represent_name' required name='represent_name[]'></td>"
        );
        const email = $(
            "<td class='border border-top-0 border-right-0'><input type='email' autocomplete='off' class='border-0 py-1 w-100 text-13-black represent_email' name='represent_email[]'></td>"
        );
        const soDT = $(
            "<td class='border border-top-0 border-right-0'><input type='number' autocomplete='off' class='border-0 py-1 w-100 text-13-black represent_phone' name='represent_phone[]'></td>"
        );
        const diaChi = $(
            "<td class='border border-top-0 border-right-0'><input type='text' autocomplete='off' class='border-0 py-1 w-100 text-13-black represent_address' name='represent_address[]'></td>"
        );
        const option = $(
            "<td class='border border-top-0 border-right-0 text-left' data-name1='KH' data-des='Xóa người đại diện ở trang sửa'>" +
            "<svg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>" +
            "<path fill-rule='evenodd' clip-rule='evenodd' d='M10.5454 5C10.2442 5 9.99999 5.24421 9.99999 5.54545C9.99999 5.8467 10.2442 6.09091 10.5454 6.09091H13.4545C13.7558 6.09091 14 5.8467 14 5.54545C14 5.24421 13.7558 5 13.4545 5H10.5454ZM6 7.72726C6 7.42601 6.24421 7.18181 6.54545 7.18181H7.63637H16.3636H17.4545C17.7558 7.18181 18 7.42601 18 7.72726C18 8.02851 17.7558 8.27272 17.4545 8.27272H16.9091V17C16.9091 18.2113 15.9118 19.1818 14.7135 19.1818H9.25891C8.97278 19.1816 8.68906 19.1247 8.42499 19.0145C8.16092 18.9044 7.92126 18.7431 7.71979 18.5399C7.51833 18.3367 7.35905 18.0957 7.25112 17.8307C7.14347 17.5664 7.08903 17.2834 7.09091 16.9981V8.27272H6.54545C6.24421 8.27272 6 8.02851 6 7.72726ZM8.18182 17.0041V8.27272H15.8182V17C15.8182 17.5966 15.3216 18.0909 14.7135 18.0909H9.25938C9.11713 18.0908 8.97632 18.0625 8.84503 18.0077C8.71375 17.953 8.5946 17.8728 8.49444 17.7718C8.39429 17.6707 8.3151 17.5509 8.26144 17.4192C8.20779 17.2874 8.18074 17.1464 8.18182 17.0041ZM13.4545 10.0909C13.7558 10.0909 14 10.3351 14 10.6364V15.7273C14 16.0285 13.7558 16.2727 13.4545 16.2727C13.1533 16.2727 12.9091 16.0285 12.9091 15.7273V10.6364C12.9091 10.3351 13.1533 10.0909 13.4545 10.0909ZM11.0909 10.6364C11.0909 10.3351 10.8467 10.0909 10.5454 10.0909C10.2442 10.0909 9.99999 10.3351 9.99999 10.6364V15.7273C9.99999 16.0285 10.2442 16.2727 10.5454 16.2727C10.8467 16.2727 11.0909 16.0285 11.0909 15.7273V10.6364Z' fill='#42526E'/>" +
            "</svg>" +
            "</td>"
        );
        // Gắn các phần tử vào hàng mới
        newRow.append(hoTen, soDT, email, diaChi, option);
        $("#dynamic-fields").before(newRow);
        // Tăng giá trị fieldCounter
        fieldCounter++;
        //Xóa người đại diệnF
        option.click(function() {
            $(this).closest("tr").remove();
            fieldCounter--;
            var name = $(this).data('name1'); // Lấy giá trị của thuộc tính data-name1
            var des = $(this).data('des'); // Lấy giá trị của thuộc tính data-des
            $.ajax({
                url: '{{ route('addActivity') }}',
                type: 'GET',
                data: {
                    name: name,
                    des: des,
                },
                success: function(data) {}
            });
        });
    });
    $(".deleteProduct").click(function() {
        var itemId = $(this).data('id');
        $.ajax({
            url: "{{ route('deleteRepresentgroup') }}",
            type: "get",
            data: {
                itemId: itemId,
            },
            success: function(data) {
                if (data.success) {
                    $(this).closest("tr").remove();
                    fieldCounter--;
                    showAutoToast('success', data.message);
                    window.location.reload();
                } else if (data.success == false) {
                    showAutoToast('warning', data.message);
                }
            }
        });
    });

    function checkDuplicateRepresentatives() {
        var rows = document.querySelectorAll('.representative-row');
        var uniqueNames = new Set();
        var hasError = false;

        for (var i = 0; i < rows.length; i++) {
            var nameInput = rows[i].querySelector('.represent_name');
            var phoneInput = rows[i].querySelector('.represent_phone');
            var emailInput = rows[i].querySelector('.represent_email');

            var name = nameInput.value.trim().toLowerCase();
            var phone = phoneInput.value.trim();
            var email = emailInput.value.trim().toLowerCase();

            var entry = name + '-' + phone + '-' + email;

            // Kiểm tra xem đã tồn tại entry trong danh sách chưa
            if (uniqueNames.has(entry)) {
                showAutoToast('warning', 'Người đại diện: ' + name + ' đang bị trùng');
                hasError = true;
                break; // Dừng vòng lặp khi phát hiện lỗi
            }

            // Nếu chưa tồn tại, thêm entry vào danh sách
            uniqueNames.add(entry);
        }

        if (hasError) {
            // Ngăn chặn việc submit khi có lỗi
            return false;
        }

        // Cho phép submit nếu không có lỗi
        return true;
    }
</script> --}}
