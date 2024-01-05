jQuery(document).ready(function ($) {
    let countClick = 1;
    $("#sideGuest").on("click", function () {
        if (countClick === 1) {
            document.getElementById("mySidenav").style.width = "300px";
            document.getElementById("main").style.marginRight = "300px";
            document.getElementById("show_info_Guest").style.opacity = "1";
            countClick += 1;
        } else if (countClick === 2) {
            document.getElementById("mySidenav").style.width = "0";
            document.getElementById("main").style.marginRight = "0";
            document.getElementById("show_info_Guest").style.opacity = "0";
            countClick = 1;
        }
    });
});
