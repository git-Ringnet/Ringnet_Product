$(document).ready(function () {
    $(".search-receive").on("click", function (event, detail_id) {
        if (detail_id) {
            detail_id = detail_id;
        } else {
            detail_id = parseInt($(this).attr("id"), 10);
        }
        console.log(detail_id);
        $("#detailimport_id").val(detail_id);
        $("#myInput").val($(this).find("span").text());
    });
});

$(document).ready(function () {
    $(".search-guest").on("click", function (event, detail_id) {
        if (detail_id) {
            detail_id = detail_id;
        } else {
            detail_id = parseInt($(this).attr("id"), 10);
        }
        console.log(detail_id);
        $("#guest_id").val(detail_id);
        $("#myGuest").val($(this).find("span").text());
        $("#listGuest").hide();
    });
});

$(document).ready(function () {
    $(".search-funds").on("click", function (event, detail_id) {
        if (detail_id) {
            detail_id = detail_id;
        } else {
            detail_id = parseInt($(this).attr("id"), 10);
        }
        console.log(detail_id);

        $("#fund_id").val(detail_id);
        $("#fund").val($(this).find("span").text());
        $("#listFunds").hide();
    });
});
