<div id="printContent" style="display: none; margin-top: 100px;" class="">
    <div class="row align-items-center justify-content-center">
        <div class="col-2" style="padding-right:10px;">
            <img height="150px" width="150px" src="{{ asset('dist/img/catanh.png') }}" alt="">
        </div>
        <div class="col-6 times-new-roman">
            <h4 class="font-TNR p-0 m-0 bold">CÔNG TY CỔ PHẦN NGỌC PHÁT STYLE</h4>
            <p class="font-TNR p-0 m-0 bold">Địa chỉ: 64/20F Hoà
                Bình, Phường 5, Quận 11, Thành phố Hồ Chí Minh, Việt Nam</p>
            <p class="font-TNR p-0 m-0 bold">Địa chỉ chi nhánh:
                47/30 Ao Đôi, phường Bình Trị Đông A, quận Bình Tân, TP.HCM</p>
            <p class="font-TNR p-0 m-0 bold">Điện thoại:
                0913919518</p>
        </div>
        <div class="col text-center mt-0">
            <h4>{{ $contentId }}</h4>
            <p>Từ ngày đến ngày</p>
        </div>
    </div>
    {{ $slot }}
</div>

<script>
    function printContent(contentId, additionalContent, extraContent) {
        // Loại bỏ các lớp trước khi in
        $('.relative').removeClass('position-relative');
        $('.top-table.outer').removeClass('outer').addClass('outer-temp');
        $('.top-table.outer-4').removeClass('outer-4').addClass('outer-4-temp');
        $('.sticky-footer').addClass('static-footer');
        var printContents = $('#' + contentId).html();
        var additionalContentHtml = $('#' + additionalContent).html();
        var originalContents = $('body').html();

        // Lấy nội dung của extraContent nếu tồn tại
        var extraContentHtml = extraContent ? $('#' + extraContent).html() : '';
        $('.top-table').css('margin-top', '200px');
        $('body').css('margin-top', '100px');

        // Nối thêm nội dung extraContent nếu có
        $('body').html(printContents + additionalContentHtml + extraContentHtml);
        window.print();

        // Khôi phục các lớp sau khi in
        $('body').html(originalContents);
        $('.relative').addClass('position-relative');
        $('.top-table.outer-temp').removeClass('outer-temp').addClass('outer');
        $('.top-table.outer-4-temp').removeClass('outer-4-temp').addClass('outer-4');
        $('.sticky-footer').removeClass('static-footer');
    }

    function printContentCustom(contentId, tableElementId) {
        // Loại bỏ các lớp trước khi in
        $('.relative').removeClass('position-relative');
        $('.top-table.outer').removeClass('outer').addClass('outer-temp');
        $('.top-table.outer-4').removeClass('outer-4').addClass('outer-4-temp');

        // Lấy nội dung của phần bảng cần in
        var additionalContentHtml = $('#' + tableElementId).html();
        // Lấy nội dung của phần muốn in
        var printContents = $('#' + contentId).html();
        // Lưu lại nội dung gốc của trang
        var originalContents = $('body').html();

        // Cập nhật margin-top nếu cần
        $('#example2').css('margin-top', '200px');
        $('body').css('margin-top', '200px');

        // Nối thêm nội dung từ printContent và bảng vào nội dung trang
        $('body').html(printContents + additionalContentHtml);

        // Đảm bảo font là Times New Roman khi in
        $('body').css('font-family', 'Times New Roman, Times, serif !important');

        // Thực hiện in
        window.print();

        // Khôi phục nội dung ban đầu và các lớp sau khi in
        $('body').html(originalContents);
        $('.relative').addClass('position-relative');
        $('.top-table.outer-temp').removeClass('outer-temp').addClass('outer');
        $('.top-table.outer-4-temp').removeClass('outer-4-temp').addClass('outer-4');
    }
</script>
