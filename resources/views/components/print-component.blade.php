<div id="printContent" style="display: none;margin-top:100px">
    <div class="row align-items-center justify-content-center">
        <div class="col-2" style="padding-right:10px;">
            <img height="150px" width="150px" src="{{ asset('dist/img/catanh.png') }}" alt="">
        </div>
        <div class="col-6">
            <h4 class="p-0 m-0">CÔNG TY CỔ PHẦN NGỌC PHÁT STYLE</h4>
            <p class="p-0 m-0">Địa chỉ: 64/20F Hoà Bình, Phường 5, Quận 11, Thành phố Hồ Chí Minh, Việt Nam</p>
            <p class="p-0 m-0">Địa chỉ chi nhánh: 47/30 Ao Đôi, phường Bình Trị Đông A, quận Bình Tân, TP.HCM</p>
            <p class="p-0 m-0">Điện thoại: 0913919518</p>
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

        var printContents = $('#' + contentId).html();
        var additionalContentHtml = $('#' + additionalContent).html();
        var originalContents = $('body').html();

        // Lấy nội dung của extraContent nếu tồn tại
        var extraContentHtml = extraContent ? $('#' + extraContent).html() : '';

        console.log('printContents:', printContents);
        console.log('additionalContentHtml:', additionalContentHtml);
        console.log('extraContentHtml:', extraContentHtml);

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
    }
</script>
