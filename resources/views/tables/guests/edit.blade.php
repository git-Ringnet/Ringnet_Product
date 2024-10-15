<x-navbar :title="$title" activeGroup="systemFirst" activeName="guest"></x-navbar>
<form action="{{ route('guests.update', ['workspace' => $workspacename, 'guest' => $guest->id]) }}" method="POST"
    onsubmit="return checkDuplicateRepresentatives()">
    @csrf
    @method('PUT')
    <div class="content-wrapper m-0">
        <div class="content-header-fixed p-0">
            <div class="content__header--inner">
                <div class="content__heading--left text-long-special opacity-0">
                    <span class="ml-4">Thiết lập ban đầu</span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8" />
                        </svg>
                    </span>
                    <span>
                        <a class="text-dark" href="{{ route('guests.index', ['workspace' => $workspacename]) }}">Khách
                            hàng</a>
                    </span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8" />
                        </svg>
                    </span>
                    <span class="font-weight-bold">Sửa khách hàng</span>
                </div>
                <div class="d-flex content__heading--right">
                    <div class="row m-0">
                        <div class="dropdown">
                            <a href="{{ route('guests.index', $workspacename) }}" class="activity" data-name1="KH"
                                data-des="Hủy">
                                <button class="btn-destroy btn-light mx-1 d-flex align-items-center h-100"
                                    type="button">
                                    <svg class="mx-1" xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                        viewBox="0 0 14 14" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M7 14C10.866 14 14 10.866 14 7C14 3.13401 10.866 0 7 0C3.13401 0 0 3.13401 0 7C0 10.866 3.13401 14 7 14ZM5.03033 3.96967C4.73744 3.67678 4.26256 3.67678 3.96967 3.96967C3.67678 4.26256 3.67678 4.73744 3.96967 5.03033L5.93934 7L3.96967 8.96967C3.67678 9.26256 3.67678 9.73744 3.96967 10.0303C4.26256 10.3232 4.73744 10.3232 5.03033 10.0303L7 8.06066L8.96967 10.0303C9.26256 10.3232 9.73744 10.3232 10.0303 10.0303C10.3232 9.73744 10.3232 9.26256 10.0303 8.96967L8.06066 7L10.0303 5.03033C10.3232 4.73744 10.3232 4.26256 10.0303 3.96967C9.73744 3.67678 9.26256 3.67678 8.96967 3.96967L7 5.93934L5.03033 3.96967Z"
                                            fill="#6D7075" />
                                    </svg>
                                    <p class="m-0 p-0 text-btnIner-primary">Hủy</p>
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
                            <p class="m-0 ml-1">Lưu khách hàng</p>
                        </button>
                        {{-- <div>
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
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="content editGuest" style="margin-top: 8.7rem">
            <section class="">
                <div id="info" class="content tab-pane in active">
                    <section class="content">
                        <div class="container-fluided">
                            <div class="info-chung">
                                <div class="content-info">
                                    <div class="d-flex align-items-center height-60-mobile">
                                        <div class="title-info height-100 py-2 border border-top-0 border-left-0">
                                            <p class="p-0 m-0 margin-left32 text-13">Nhóm khách hàng</p>
                                        </div>
                                        <select name="grouptype_id" id="grouptypeSelect"
                                            class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100 bg-input-guest-blue">
                                            <option value="0">Chọn nhóm</option>
                                            @foreach ($groups as $item)
                                                <option
                                                    {{ isset($guest) && $guest->group_id == $item->id ? 'selected' : '' }}
                                                    value="{{ $item->id }}">{{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="d-flex align-items-center height-60-mobile">
                                        <div class="title-info py-2 border border-left-0 height-100">
                                            <p class="p-0 m-0 required-label text-danger margin-left32 text-13-red">
                                                Mã khách hàng
                                            </p>
                                        </div>
                                        <input type="text" required placeholder="Nhập thông tin" name="key"
                                            value="{{ $guest->key }}" required
                                            class="border w-100 py-2 border-left-0 height-100 border-right-0 px-3 text-13-black bg-input-guest-blue">
                                    </div>
                                    <div class="d-flex align-items-center height-60-mobile">
                                        <div class="title-info py-2 border border-left-0 height-100">
                                            <p class="p-0 m-0 required-label text-danger margin-left32 text-13-red">
                                                Tên khách hàng
                                            </p>
                                        </div>
                                        <input type="text" required placeholder="Nhập thông tin"
                                            name="guest_name_display" value="{{ $guest->guest_name_display }}" required
                                            class="border w-100 py-2 border-left-0 height-100 border-right-0 px-3 text-13-black bg-input-guest-blue">
                                    </div>
                                    <div class="d-flex align-items-center height-60-mobile">
                                        <div class="title-info py-2 border border-top-0 border-left-0 height-100">
                                            <p class="p-0 m-0 margin-left32 text-13">Địa chỉ</p>
                                        </div>
                                        <input type="text" placeholder="Nhập thông tin" name="guest_address"
                                            value="{{ $guest->guest_address }}"
                                            class="border border-top-0 w-100 py-2 border-left-0 height-100 border-right-0 px-3 text-13-black bg-input-guest-blue">
                                    </div>
                                    <div class="d-flex  align-items-center height-60-mobile">
                                        <div class="title-info height-100 py-2 border border-top-0 border-left-0">
                                            <p class="p-0 m-0 margin-left32 text-13">Điện thoại</p>
                                        </div>
                                        <input type="text" placeholder="Nhập thông tin" name="guest_phone"
                                            value="{{ $guest->guest_phone }}"
                                            class="border border-top-0 w-100 py-2 border-left-0 height-100 border-right-0 px-3 text-13-black bg-input-guest-blue">
                                    </div>
                                    <div class="d-flex  align-items-center height-60-mobile">
                                        <div class="title-info height-100 py-2 border border-top-0 border-left-0">
                                            <p class="p-0 m-0 margin-left32 text-13">Email</p>
                                        </div>
                                        <input type="email" name="guest_email" value="{{ $guest->guest_email }}"
                                            placeholder="Nhập thông tin"
                                            class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100 bg-input-guest-blue">
                                    </div>
                                    {{-- <div class="d-flex align-items-center height-60-mobile">
                                        <div class="title-info py-2 border border-top-0 border-left-0 height-100">
                                            <p class="p-0 m-0 margin-left32 text-13">Tên viết tắt
                                            </p>
                                        </div>
                                        <input type="text" placeholder="Nhập thông tin" name="key"
                                            value="{{ $guest->key }}"
                                            class="border border-top-0 w-100 py-2 border-left-0 height-100 border-right-0 px-3 text-13-black">
                                    </div> --}}
                                    <div class="d-flex align-items-center height-60-mobile">
                                        <div class="title-info py-2 border border-top-0 border-left-0 height-100">
                                            <p class="p-0 m-0 margin-left32 text-13">Tên đầy đủ</p>
                                        </div>
                                        <input type="text" placeholder="Nhập thông tin" name="guest_name"
                                            value="{{ $guest->guest_name }}"
                                            class="border border-top-0 w-100 py-2 border-left-0 height-100 border-right-0 px-3 text-13-black bg-input-guest-blue">
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="bg-filter-search border-top-0 text-left border-custom">
                                <p class="font-weight-bold text-uppercase info-chung--heading">THÔNG TIN NGƯỜI ĐẠI DIỆN
                                </p>
                            </div> --}}
                            {{-- <div class="info-chung">
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
                                            @foreach ($representGuest as $itemRepresent)
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
        </div>
    </div>
</form>
<x-user-flow></x-user-flow>
<script src="{{ asset('/dist/js/export.js') }}"></script>
<script src="{{ asset('/dist/js/filter.js') }}"></script>

<script type="text/javascript">
    function validateInput(input) {
        // Loại bỏ tất cả các ký tự ngoại trừ số và dấu "-"
        input.value = input.value.replace(/[^0-9-]/g, '');

        // Loại bỏ các dấu "-" liên tiếp
        input.value = input.value.replace(/-{2,}/g, '');
    }
    // Filter search

    //////////////////////////////////////////////////////////////// 

    // getKeyGuest($('input[name="guest_name_display"]'))
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
            url: "{{ route('deleteRepresentGuest') }}",
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
</script>
