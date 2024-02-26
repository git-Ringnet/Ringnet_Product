<x-navbar :title="$title" activeGroup="sell" activeName="guest" :workspacename="$workspacename"></x-navbar>
<form action="{{ route('guests.store', $workspacename) }}" method="POST">
    @csrf
    <div class="content-wrapper m-0">
        <div class="content-header-fixed p-0 margin-250">
            <div class="content__header--inner margin-left32">
                <div class="content__heading--left text-long-special">
                    <span>Bán hàng</span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z" fill="#26273B" fill-opacity="0.8"/>
                        </svg>
                    </span>
                    <span>
                        <a class="text-dark" href="{{ route('guests.create', $workspacename) }}">Khách hàng</a>
                    </span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z" fill="#26273B" fill-opacity="0.8"/>
                        </svg>
                    </span>
                    <span class="font-weight-bold">{{ $title }}</span>
                </div>
                <div class="d-flex content__heading--right">
                    <div class="row m-0">
                        <div class="dropdown">
                            <a href="{{ route('guests.index', $workspacename) }}">
                                <button type="reset" class="btn-destroy btn-light mx-2 d-flex align-items-center h-100" >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                        <path d="M2.96967 2.96967C3.26256 2.67678 3.73744 2.67678 4.03033 2.96967L8 6.939L11.9697 2.96967C12.2626 2.67678 12.7374 2.67678 13.0303 2.96967C13.3232 3.26256 13.3232 3.73744 13.0303 4.03033L9.061 8L13.0303 11.9697C13.2966 12.2359 13.3208 12.6526 13.1029 12.9462L13.0303 13.0303C12.7374 13.3232 12.2626 13.3232 11.9697 13.0303L8 9.061L4.03033 13.0303C3.73744 13.3232 3.26256 13.3232 2.96967 13.0303C2.67678 12.7374 2.67678 12.2626 2.96967 11.9697L6.939 8L2.96967 4.03033C2.7034 3.76406 2.6792 3.3474 2.89705 3.05379L2.96967 2.96967Z" fill="#6D7075"/>
                                    </svg>
                                    <span class="text-btnIner-primary ml-2">Hủy</span>
                                </button>
                            </a>
                        </div>
                        <button type="submit" class="custom-btn d-flex mx-2 align-items-center h-100" style="margin-right:10px">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M6.75 1V6.75C6.75 7.5297 7.34489 8.17045 8.10554 8.24313L8.25 8.25H14V13C14 14.1046 13.1046 15 12 15H4C2.89543 15 2 14.1046 2 13V3C2 1.89543 2.89543 1 4 1H6.75ZM8 1L14 7.03022H9C8.44772 7.03022 8 6.5825 8 6.03022V1Z" fill="white"/>
                            </svg>
                            <span class="text-btnIner-primary ml-2">Lưu khách hàng</span>
                        </button>
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
            </div>
        </div>
        <div class="content" style="margin-top:3.8rem;">
            <section class="container-fluided margin-250">
                <div class="container-fluided">
                    <div class="bg-filter-search border-top-0 text-left border-custom">
                        <p class="font-weight-bold text-uppercase info-chung--heading">THÔNG TIN CHUNG</p>
                    </div>
                    <div class="info-chung">
                        <div class="content-info">
                                <div class="d-flex align-items-center height-60-mobile">
                                    <div class="title-info height-100 py-2 border border-left-0">
                                        <p class="p-0 m-0 required-label margin-left32 text-13">Tên khách hàng</p>
                                    </div>
                                    <input type="text" required placeholder="Nhập thông tin"
                                        name="guest_name_display"
                                        class="border w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100">
                                </div>
                                <div class="d-flex  align-items-center height-60-mobile ">
                                    <div class="title-info height-100 py-2 border border-top-0 border-left-0">
                                        <p class="p-0 m-0 margin-left32 text-13">Tên hiển thị</p>
                                    </div>
                                    <input type="text" placeholder="Nhập thông tin"
                                        name="key"
                                        class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100">
                                </div>
                                <div class="d-flex  align-items-center height-60-mobile">
                                    <div class="title-info height-100 py-2 border border-top-0 border-left-0">
                                        <p class="p-0 m-0 margin-left32 text-13">Địa chỉ</p>
                                    </div>
                                    <input type="text" required placeholder="Nhập thông tin"
                                        name="guest_address"
                                        class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100">
                                </div>
                                <div class="d-flex align-items-center height-60-mobile">
                                    <div class="title-info height-100 py-2 border border-top-0 border-left-0">
                                        <p class="p-0 m-0 margin-left32 text-13">Email khách hàng</p>
                                    </div>
                                    <input type="text" required placeholder="Nhập thông tin" 
                                        name="guest_code"
                                        class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100">
                                </div>
                                <div class="d-flex align-items-center height-60-mobile">
                                    <div class="title-info height-100 py-2 border border-top-0 border-left-0">
                                        <p class="p-0 m-0 margin-left32 text-13">Mã số thuế</p>
                                    </div>
                                    <input type="text" placeholder="Nhập thông tin"
                                        name="guest_name"
                                        class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100">
                                </div>
                        </div>
                    </div>
                    <div class="bg-filter-search border-top-0 text-left border-custom">
                        <p class="font-weight-bold text-uppercase info-chung--heading">THÔNG NGƯỜI ĐẠI DIỆN</p>
                    </div>
                    <div class="info-chung">
                        <div class="container-fluided order_content">
                            <table class="table table-hover bg-white rounded">
                                <thead>
                                    <tr>
                                        <th class="border-right height-52 padding-left35 text-13 " style="width: 23%;">Người đại diện</th>
                                        <th class="border-right height-52 padding-left35 text-13" style="width: 20%;">Số điện thoại</th>
                                        <th class="border-right height-52 padding-left35 text-13" style="width: 20%;">Email</th>
                                        <th class="border-right height-52 padding-left35 text-13" style="width: 20%;">Địa chỉ nhận</th>
                                        <th class="border-right height-52 padding-left35 text-13" style="width: 20%;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr id="dynamic-fields" class="bg-white"></tr>
                                </tbody>
                            </table>
                        </div>
                        <section class="content margin-left32">
                            <div class="container-fluided">
                                <div class="d-flex">
                                    <button type="button" data-toggle="dropdown" id="add-field-btn"
                                        class="btn-save-print d-flex align-items-center h-100 py-1 px-2"
                                        style="margin-right:10px; border-radius:4px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                            <path d="M8.75 3C8.75 2.58579 8.41421 2.25 8 2.25C7.58579 2.25 7.25 2.58579 7.25 3V7.25H3C2.58579 7.25 2.25 7.58579 2.25 8C2.25 8.41421 2.58579 8.75 3 8.75H7.25V13C7.25 13.4142 7.58579 13.75 8 13.75C8.41421 13.75 8.75 13.4142 8.75 13V8.75H13C13.4142 8.75 13.75 8.41421 13.75 8C13.75 7.58579 13.4142 7.25 13 7.25H8.75V3Z" fill="#6D7075"/>
                                        </svg>
                                        <span class="text-13 pl-2">Thêm người đại diện</span>
                                    </button>
                                    <button class="btn-option py-1 px-2">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M21 12C21 10.8954 20.1046 10 19 10C17.8954 10 17 10.8954 17 12C17 13.1046 17.8954 14 19 14C20.1046 14 21 13.1046 21 12Z"
                                                    fill="#42526E">
                                                </path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M14 12C14 10.8954 13.1046 10 12 10C10.8954 10 10 10.8954 10 12C10 13.1046 10.8954 14 12 14C13.1046 14 14 13.1046 14 12Z"
                                                    fill="#42526E">
                                                </path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M7 12C7 10.8954 6.10457 10 5 10C3.89543 10 3 10.8954 3 12C3 13.1046 3.89543 14 5 14C6.10457 14 7 13.1046 7 12Z"
                                                    fill="#42526E">
                                                </path>
                                            </svg>
                                    </button>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </section>
        </div>
    </div>
</form>
<script src="{{ asset('/dist/js/export.js') }}"></script>
<script>
    getKeyGuest($('input[name="guest_name_display"]'))
    let fieldCounter = 1;
    $("#add-field-btn").click(function() {
        let nextSoTT = $(".soTT").length + 1;
        // Tạo các phần tử HTML mới
        const newRow = $("<tr>", {
            "id": `dynamic-row-${fieldCounter}`,
            "class": `bg-white addProduct`,
        });
        const hoTen = $(
            "<td class='border border-top-0 border-bottom-0 border-left-0 padding-left35'><input type='text' autocomplete='off' class='text-13-black border-0 pl-0 pr-2 py-1 w-100 represent_name' required name='represent_name[]'></td>"
        );
        const email = $(
            "<td class='border border-top-0 border-bottom-0 padding-left35'><input type='text' autocomplete='off' class='text-13-black border-0 pl-0 pr-2 py-1 w-100 represent_email' name='represent_email[]'></td>"
        );
        const soDT = $(
            "<td class='border border-top-0 border-bottom-0 padding-left35'><input type='text' autocomplete='off' class='text-13-black border-0 pl-0 pr-2 py-1 w-100 represent_phone' name='represent_phone[]'></td>"
        );
        const diaChi = $(
            "<td class='border border-top-0 border-bottom-0 padding-left35'><input type='text' autocomplete='off' class='text-13-black border-0 pl-0 pr-2 py-1 w-100 represent_address' name='represent_address[]'></td>"
        );
        const option = $(
            "<td class='border border-top-0 border-bottom-0 border-right-0 text-center'>" +
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
        //Xóa người đại diện
        option.click(function() {
            $(this).closest("tr").remove();
            fieldCounter--;
        });
    });
</script>
