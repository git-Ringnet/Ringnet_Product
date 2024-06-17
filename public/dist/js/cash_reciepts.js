$(document).ready(function () {
    $("#listReceive").hide();

    function setupClickHandler(triggerSelector, listSelector) {
        $(triggerSelector).on("click", function () {
            $(listSelector).show();
        });
    }

    setupClickHandler(".search_quotation", "#listReceive");
    setupClickHandler("#fund", "#listFunds");
    setupClickHandler("#myGuest", "#listGuest");
    setupClickHandler("#myContent", "#listContent");

    function setupSearchHandler(
        buttonSelector,
        inputSelector,
        listSelector,
        idInputSelector
    ) {
        $(buttonSelector).on("click", function (event, detail_id) {
            detail_id = detail_id || parseInt($(this).attr("id"), 10);
            $(idInputSelector).val(detail_id);
            $(inputSelector).val($(this).find("span").text());
            $(listSelector).hide();
        });
    }

    setupSearchHandler(".search-guest", "#myGuest", "#listGuest", "#guest_id");
    setupSearchHandler(".search-funds", "#fund", "#listFunds", "#fund_id");
    setupSearchHandler(
        ".search-content",
        "#myContent",
        "#listContent",
        "#content_id"
    );
});

function formatCurrency(value) {
    // Làm tròn đến 2 chữ số thập phân
    value = Math.round(value * 100) / 100;

    // Xử lý phần nguyên
    var parts = value.toString().split(".");
    var integerPart = parts[0];
    var formattedValue = "";

    // Định dạng phần nguyên
    var count = 0;
    for (var i = integerPart.length - 1; i >= 0; i--) {
        formattedValue = integerPart.charAt(i) + formattedValue;
        count++;
        if (count % 3 === 0 && i !== 0) {
            formattedValue = "," + formattedValue;
        }
    }

    // Nếu có phần thập phân, thêm vào sau phần nguyên
    if (parts.length > 1) {
        formattedValue += "." + parts[1];
    }

    return formattedValue;
}

$("form").on("submit", function (e) {
    e.preventDefault();
    var check = false;
    if ($("#fund_id").val() == "" || $("#content_id").val() == "") {
        check = true;
        $("#fund_id").val() == ""
            ? showNotification("warning", "Vui lòng chọn quỹ thanh toán")
            : showNotification("warning", "Vui lòng chọn nội dung thanh toán");
    } else {
        if (!check) {
            $("form")[1].submit();
        }
    }
});

flatpickr("#datePicker", {
    locale: "vn",
    dateFormat: "d/m/Y",
    defaultDate: new Date(),
    onChange: function (selectedDates, dateStr, instance) {
        // Cập nhật giá trị của trường ẩn khi người dùng chọn ngày
        updateHiddenInput(selectedDates[0], instance, "hiddenDateInput");
    },
    onReady: function (selectedDates, dateStr, instance) {
        // Cập nhật giá trị của trường ẩn khi mở date picker
        updateHiddenInput(selectedDates[0], instance, "hiddenDateInput");
    },
});

flatpickr("#datePickerDay", {
    locale: "vn",
    dateFormat: "d/m/Y",
    defaultDate: new Date(),
    onChange: function (selectedDates, dateStr, instance) {
        // Cập nhật giá trị của trường ẩn khi người dùng chọn ngày
        updateHiddenInput(selectedDates[0], instance, "hiddenDateInputDay");
    },
    onReady: function (selectedDates, dateStr, instance) {
        // Cập nhật giá trị của trường ẩn khi mở date picker
        updateHiddenInput(selectedDates[0], instance, "hiddenDateInputDay");
    },
});
$(document).ready(function () {
    $("input.price_export").on("input", function () {
        var priceExportValue = parseFloat($(this).val().replace(/,/g, ""));
        var moneyRecieptValue = parseFloat(
            $("#money_reciept").val().replace(/,/g, "")
        );

        if (priceExportValue > moneyRecieptValue) {
            $(this).val(moneyRecieptValue);
        }
    });
});
$("#luuNhap").click(function (e) {
    e.preventDefault();
    $('input[name="action"]').val(1);
    $("form").submit();
});

$("#xacNhan").click(function (e) {
    e.preventDefault();
    $('input[name="action"]').val(2);
    $("form").submit();
});
