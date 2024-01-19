function handleSmallScreen() {
    let countClick = 1;
    $("#sideGuest").on("click", function () {
        if (countClick === 1) {
            $("#mySidenav").css({"width": "300px", "cssText": "width: 300px !important"});
            $("#main").css({"marginRight": "300px", "cssText": "margin-right: 300px !important"});
            $("#show_info_Guest").css({"opacity": "1", "cssText": "opacity: 1 !important"});
            countClick += 1;
        } else if (countClick === 2) {
            $("#mySidenav").css({"width": "0", "cssText": "width: 0 !important"});
            $("#main").css({"marginRight": "0", "cssText": "margin-right: 0 !important"});
            $("#show_info_Guest").css({"opacity": "0", "cssText": "opacity: 0 !important"});
            countClick = 1;
        }
    });
}

function handleLargeScreen() {
    let countClick = 1;
    $("#sideGuest").on("click", function () {
        if (countClick === 1) {
            $("#mySidenav").css({"width": "0", "cssText": "width: 0 !important"});
            $("#main").css({"marginRight": "0", "cssText": "margin-right: 0 !important"});
            $("#show_info_Guest").css({"opacity": "0", "cssText": "opacity: 0 !important"});
            countClick += 1;
        } else if (countClick === 2) {
            $("#mySidenav").css({"width": "300px", "cssText": "width: 300px !important"});
            $("#main").css({"marginRight": "300px", "cssText": "margin-right: 300px !important"});
            $("#show_info_Guest").css({"opacity": "1", "cssText": "opacity: 1 !important"});
            countClick = 1;
        }
    });
}

// Lấy kích thước màn hình khi trang web được tải
var windowWidth = window.innerWidth;

// Thêm một sự kiện lắng nghe để kiểm tra khi kích thước màn hình thay đổi
$(window).on("resize", function () {
    // Cập nhật kích thước màn hình sau mỗi lần thay đổi
    windowWidth = window.innerWidth;

    // Kiểm tra điều kiện tùy chọn (ví dụ: max-width là 991.98px)
    if (windowWidth <= 991.98) {
        // Xử lý khi màn hình nhỏ hơn hoặc bằng 991.98px
        handleSmallScreen();
    } else {
        // Xử lý khi màn hình lớn hơn 991.98px
        handleLargeScreen();
    }
});

// Gọi một lần khi trang web được tải để xác định trạng thái ban đầu của màn hình
$(document).ready(function () {
    if (windowWidth <= 991.98) {
        handleSmallScreen();
    } else {
        handleLargeScreen();
    }
});