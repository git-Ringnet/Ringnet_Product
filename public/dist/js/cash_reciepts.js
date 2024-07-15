$(document).ready(function () {
    // Ẩn danh sách ban đầu
    $("#listReceive, #listFunds, #listGuest, #listContent").hide();

    // Hàm thiết lập sự kiện click để hiển thị danh sách
    function setupClickHandler(triggerSelector, listSelector) {
        $(triggerSelector).on("click", function () {
            $(listSelector).toggle();
        });
    }

    // Thiết lập sự kiện click cho các input để hiển thị danh sách
    setupClickHandler(".search_quotation", "#listReceive");
    setupClickHandler("#fund", "#listFunds");
    setupClickHandler("#myGuest", "#listGuest");
    setupClickHandler("#myContent", "#listContent");

    // Hàm xử lý sự kiện click trên các mục trong danh sách
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

    // Thiết lập sự kiện click cho các mục trong danh sách
    setupSearchHandler(".search-guest", "#myGuest", "#listGuest", "#guest_id");
    setupSearchHandler(".search-funds", "#fund", "#listFunds", "#fund_id");
    setupSearchHandler(
        ".search-content",
        "#myContent",
        "#listContent",
        "#content_id"
    );

    // Thiết lập sự kiện click ngoài vùng danh sách để ẩn danh sách
    $(document).on("click", function (event) {
        if (
            !$(event.target).closest("#listReceive, .search_quotation").length
        ) {
            $("#listReceive").hide();
        }
        if (!$(event.target).closest("#listFunds, #fund").length) {
            $("#listFunds").hide();
        }
        if (!$(event.target).closest("#listGuest, #myGuest").length) {
            $("#listGuest").hide();
        }
        if (!$(event.target).closest("#listContent, #myContent").length) {
            $("#listContent").hide();
        }
    });
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

function updateHiddenInput(selectedDate, instance, hiddenInputId) {
    // Lấy thời gian hiện tại
    var currentTime = new Date();

    // Cập nhật giá trị của trường ẩn với thời gian hiện tại và ngày đã chọn
    var selectedDateTime = new Date(selectedDate);
    selectedDateTime.setHours(currentTime.getHours());
    selectedDateTime.setMinutes(currentTime.getMinutes());
    selectedDateTime.setSeconds(currentTime.getSeconds());

    document.getElementById(hiddenInputId).value = instance.formatDate(
        selectedDateTime,
        "Y-m-d H:i:S"
    );
}

$("body").on(
    "input",
    '.price_export , .price_import ,.payment_input,.quantity-input,.payment_input,input[name="delivery_charges"],.promotion,input[name="promotion-total"],input[name="payment"]',
    function (event) {
        // Lấy giá trị đã nhập
        var value = event.target.value;

        // Xóa các ký tự không phải số và dấu phân thập phân từ giá trị
        var formattedValue = value.replace(/[^0-9.]/g, "");

        // Định dạng số với dấu phân cách hàng nghìn và giữ nguyên số thập phân
        var formattedNumber = numberWithCommas(formattedValue);

        event.target.value = formattedNumber;
    }
);

function formatNumber(name) {
    $(document).on("input", name, function (e) {
        // Lấy giá trị đã nhập
        var value = e.target.value;

        // Xóa các ký tự không phải số và dấu phân thập phân từ giá trị
        var formattedValue = value.replace(/[^0-9.]/g, "");

        // Định dạng số với dấu phân cách hàng nghìn và giữ nguyên số thập phân
        var formattedNumber = numberWithCommas(formattedValue);

        e.target.value = formattedNumber;
    });
}

function numberWithCommas(number) {
    // Chia số thành phần nguyên và phần thập phân
    var parts = number.split(".");
    var integerPart = parts[0];
    var decimalPart = parts[1];

    // Định dạng phần nguyên số với dấu phân cách hàng nghìn
    var formattedIntegerPart = integerPart
        .toString()
        .replace(/\B(?=(\d{3})+(?!\d))/g, ",");

    // Kết hợp phần nguyên và phần thập phân (nếu có)
    var formattedNumber =
        decimalPart !== undefined
            ? formattedIntegerPart + "." + decimalPart
            : formattedIntegerPart;

    return formattedNumber;
}

$("#luuNhap").click(function (e) {
    e.preventDefault();
    $('input[name="action"]').val(1);
    $("form").submit();
});

$("#xacNhan").click(function (e) {
    // e.preventDefault();
    $('input[name="action"]').val(2);
    // $("form").submit();
});
