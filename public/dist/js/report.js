function addHighlightFunctionality(tableSelector, valueSelector) {
    $(tableSelector + " tr").hover(
        function () {
            // Khi hover vào một hàng, lấy giá trị của input ẩn bên trong hàng đó
            var sell = $(this).find(valueSelector).val();
            // Thêm lớp highlight vào tất cả các hàng có cùng giá trị
            $(tableSelector + " tr").each(function () {
                if ($(this).find(valueSelector).val() === sell) {
                    $(this).addClass("highlights");
                }
            });
        },
        function () {
            // Khi dừng hover, loại bỏ lớp highlights khỏi tất cả các hàng
            $(tableSelector + " tr").removeClass("highlights");
        }
    );
}
