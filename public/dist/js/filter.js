// Hàm để xử lý click và hành động
function handleFilterClick(btn, options, input) {
    btn.click(function (event) {
        event.preventDefault();
        // $(".btn-filter_search").prop("disabled", true);
        if (input) {
            input.val("");
        }
        options.toggle();
    });
}
// Hàm cho nút hủy
function handleCancelClick(cancelBtn, input, options) {
    cancelBtn.click(function (event) {
        event.preventDefault();
        // $(".btn-filter_search").prop("disabled", false);
        if (input) {
            input.val("");
        }
        options.hide();
    });
}
$(document).on("click", function (event) {
    if (
        !$(event.target).closest(".dropdown-menu,.block-options,.item-filter")
            .length
    ) {
        $(".block-options").hide();
        $(".btn-filter_search").prop("disabled", false);
    }
});

// $(document).on("click", ".item-filter", function (e) {
//     e.preventDefault();
//     var buttonName = $(this).data("button");
//     var absoluteItem = $("#" + buttonName + "-options");
//     absoluteItem.appendTo($(this));
//     $("#" + buttonName + "-options").toggle();
//     console.log("cas");
// });

$(".btn-filter_search").click(function () {
    $(".block-options").hide();
});

function addIcon(event, icon) {
    var itemIcon = $("<div>").addClass("item-icon").html(icon);
    $(event.target).addClass("new-class").prepend(itemIcon);
}
$(document).ready(function () {
    var svgstatus =
        "<svg width='16' height='16' viewBox='0 0 16 16' fill='none' xmlns='http://www.w3.org/2000/svg'>" +
        "<path d='M14.9408 8.91426L12.9576 8.65557C12.9855 8.4419 13 8.22314 13 8C13 7.77686 12.9855 7.5581 12.9576 7.34443L14.9408 7.08573C14.9799 7.38496 15 7.69013 15 8C15 8.30987 14.9799 8.61504 14.9408 8.91426ZM14.4688 5.32049C14.2328 4.7514 13.9239 4.22019 13.5538 3.73851L11.968 4.95716C12.2328 5.30185 12.4533 5.68119 12.6214 6.08659L14.4688 5.32049ZM12.2615 2.4462L11.0428 4.03204C10.6981 3.76716 10.3188 3.54673 9.91341 3.37862L10.6795 1.53116C11.2486 1.76715 11.7798 2.07605 12.2615 2.4462ZM8.91426 1.05917L8.65557 3.04237C8.4419 3.01449 8.22314 3 8 3C7.77686 3 7.5581 3.01449 7.34443 3.04237L7.08574 1.05917C7.38496 1.02013 7.69013 1 8 1C8.30987 1 8.61504 1.02013 8.91426 1.05917ZM5.32049 1.53116L6.08659 3.37862C5.68119 3.54673 5.30185 3.76716 4.95716 4.03204L3.73851 2.4462C4.22019 2.07605 4.7514 1.76715 5.32049 1.53116ZM2.4462 3.73851L4.03204 4.95716C3.76716 5.30185 3.54673 5.68119 3.37862 6.08659L1.53116 5.32049C1.76715 4.7514 2.07605 4.22019 2.4462 3.73851ZM1.05917 7.08574C1.02013 7.38496 1 7.69013 1 8C1 8.30987 1.02013 8.61504 1.05917 8.91426L3.04237 8.65557C3.01449 8.4419 3 8.22314 3 8C3 7.77686 3.01449 7.5581 3.04237 7.34443L1.05917 7.08574ZM1.53116 10.6795L3.37862 9.91341C3.54673 10.3188 3.76716 10.6981 4.03204 11.0428L2.4462 12.2615C2.07605 11.7798 1.76715 11.2486 1.53116 10.6795ZM3.73851 13.5538L4.95716 11.968C5.30185 12.2328 5.68119 12.4533 6.08659 12.6214L5.32049 14.4688C4.7514 14.2328 4.22019 13.9239 3.73851 13.5538ZM7.08574 14.9408L7.34443 12.9576C7.5581 12.9855 7.77686 13 8 13C8.22314 13 8.4419 12.9855 8.65557 12.9576L8.91427 14.9408C8.61504 14.9799 8.30987 15 8 15C7.69013 15 7.38496 14.9799 7.08574 14.9408ZM10.6795 14.4688L9.91341 12.6214C10.3188 12.4533 10.6981 12.2328 11.0428 11.968L12.2615 13.5538C11.7798 13.9239 11.2486 14.2328 10.6795 14.4688ZM13.5538 12.2615L11.968 11.0428C12.2328 10.6981 12.4533 10.3188 12.6214 9.91341L14.4688 10.6795C14.2328 11.2486 13.924 11.7798 13.5538 12.2615Z' fill='#6D7075'/>" +
        "</svg>";
    svgmoney =
        "<svg width='17' height='16' viewBox='0 0 17 16' fill='none' xmlns='http://www.w3.org/2000/svg'>" +
        "<path d='M12.2959 10.1476C12.2959 11.6563 11.2901 12.7165 10.026 13.1379V14C10.026 14.5523 9.57828 15 9.026 15H8.68813C8.13585 15 7.68813 14.5523 7.68813 14V13.1922C6.79104 12.9204 5.94833 12.3087 5.2959 11.2893L6.83182 9.86214C7.34833 10.7049 8.00075 11.1806 8.68036 11.1806C9.41434 11.1806 9.91726 10.8408 9.91726 10.1204C9.91726 8.65243 5.62211 9.4 5.62211 5.93398C5.62211 4.45243 6.53279 3.41942 7.68813 2.98447V2C7.68813 1.44772 8.13585 1 8.68813 1H9.026C9.57828 1 10.026 1.44772 10.026 2V2.9301C10.8551 3.20194 11.6299 3.81359 12.2415 4.81942L10.7056 6.2466C10.325 5.40388 9.64541 4.90097 9.03376 4.90097C8.39493 4.90097 7.90561 5.22718 7.90561 5.92039C7.90561 7.36117 12.2959 6.74951 12.2959 10.1476Z' fill='#6D7075'/>" +
        "</svg>";
    svgdate =
        "<svg width='16' height='16' viewBox='0 0 16 16' fill='none' xmlns='http://www.w3.org/2000/svg'>" +
        "<path d='M11 1C13.2091 1 15 2.79086 15 5V11C15 13.2091 13.2091 15 11 15H5C2.79086 15 1 13.2091 1 11V5C1 2.79086 2.79086 1 5 1H11ZM13.5 6H2.5V11C2.5 12.3807 3.61929 13.5 5 13.5H11C12.3807 13.5 13.5 12.3807 13.5 11V6Z' fill='#6D7075'/>" +
        "</svg>";
    $(document).on("DOMNodeInserted", function (event) {
        if ($(event.target).hasClass("item-filter")) {
            var dataIconValue = $(event.target).data("icon");
            if (dataIconValue === "status") {
                addIcon(event, svgstatus);
            } else if (dataIconValue === "money") {
                addIcon(event, svgmoney);
            } else if (dataIconValue === "date") {
                addIcon(event, svgdate);
            }
        }
    });
});

$(document).ready(function () {
    $(".date_end").blur(function () {
        var startValue = $(".date_start").val();
        var endValue = $(this).val();
        if (startValue && endValue) {
            // Kiểm tra cả hai trường đã được nhập đầy đủ
            var startDate = new Date(startValue);
            var endDate = new Date(endValue);
            // Kiểm tra ngày, tháng và năm trước khi thực hiện so sánh
            if (
                endDate.getFullYear() < startDate.getFullYear() ||
                (endDate.getFullYear() === startDate.getFullYear() &&
                    endDate.getMonth() < startDate.getMonth()) ||
                (endDate.getFullYear() === startDate.getFullYear() &&
                    endDate.getMonth() === startDate.getMonth() &&
                    endDate.getDate() < startDate.getDate())
            ) {
                alert("Ngày kết thúc không được nhỏ hơn ngày bắt đầu!");
                $(this).val("");
            }
        }
    });
});

// Xử lý click
handleFilterClick($("#btn-email"), $("#email-options"), $(".email-input"));
handleFilterClick($("#btn-debt"), $("#debt-options"), $(".debt-input"));
handleFilterClick($("#btn-name"), $("#name-options"), $(".name-input"));
handleFilterClick($("#btn-tensp"), $("#tensp-options"), $(".tensp-input"));
handleFilterClick($("#btn-hdvao"), $("#hdvao-options"), $(".hdvao-input"));
handleFilterClick($("#btn-hdra"), $("#hdra-options"), $(".hdra-input"));
handleFilterClick($("#btn-users"), $("#users-options"), $(".users-input"));
handleFilterClick($("#btn-status"), $("#status-options"), $(".status-input"));
handleFilterClick($("#btn-pay"), $("#pay-options"), $(".pay-input"));
handleFilterClick($("#btn-total"), $("#total-options"), $(".total-input"));
handleFilterClick($("#btn-POnhap"), $("#POnhap-options"), $(".POnhap-input"));
handleFilterClick($("#btn-BH"), $("#BH-options"), $(".BH-input"));
handleFilterClick($("#btn-VATN"), $("#VATN-options"), $(".VATN-input"));
handleFilterClick($("#btn-slnhap"), $("#slnhap-options"), $(".slnhap-input"));
handleFilterClick($("#btn-POxuat"), $("#POxuat-options"), $(".POxuat-input"));
handleFilterClick($("#btn-TTN"), $("#TTN-options"), $(".TTN-input"));
handleFilterClick($("#btn-TTX"), $("#TTX-options"), $(".TTX-input"));
handleFilterClick($("#btn-HTTTX"), $("#HTTTX-options"), $(".HTTTX-input"));
handleFilterClick($("#btn-HTTTN"), $("#HTTTN-options"), $(".HTTTN-input"));
handleFilterClick($("#btn-date"), $("#date-options"), $(".date-input"));
handleFilterClick(
    $("#btn-dateHDX"),
    $("#dateHDX-options"),
    $(".dateHDX-input")
);
handleFilterClick(
    $("#btn-dateHDN"),
    $("#dateHDN-options"),
    $(".dateHDN-input")
);
handleFilterClick(
    $("#btn-dateTTN"),
    $("#dateTTN-options"),
    $(".dateTTN-input")
);
handleFilterClick(
    $("#btn-dateTTX"),
    $("#dateTTX-options"),
    $(".dateTTX-input")
);
handleFilterClick(
    $("#btn-provide_code"),
    $("#provide_code-options"),
    $(".provide_code-input")
);
handleFilterClick(
    $("#btn-trcVATX"),
    $("#trcVATX-options"),
    $(".trcVATX-input")
);
handleFilterClick($("#btn-VATX"), $("#VATX-options"), $(".VATX-input"));
handleFilterClick(
    $("#btn-sauVATX"),
    $("#sauVATX-options"),
    $(".sauVATX-input")
);
handleFilterClick(
    $("#btn-sauVATN"),
    $("#sauVATN-options"),
    $(".sauVATN-input")
);
handleFilterClick(
    $("#btn-trcVATN"),
    $("#trcVATN-options"),
    $(".trcVATN-input")
);
handleFilterClick(
    $("#btn-payment_code"),
    $("#payment_code-options"),
    $(".payment_code-input")
);
handleFilterClick(
    $("#btn-delivery_code"),
    $("#delivery_code-options"),
    $(".delivery_code-input")
);
handleFilterClick(
    $("#btn-guest_code"),
    $("#guest_code-options"),
    $(".guest_code-input")
);
handleFilterClick(
    $("#btn-code_payment"),
    $("#code_payment-options"),
    $(".code_payment-input")
);
handleFilterClick(
    $("#btn-payment"),
    $("#payment-options"),
    $(".payment-input")
);
handleFilterClick(
    $("#btn-number_bill"),
    $("#number_bill-options"),
    $(".number_bill-input")
);
handleFilterClick(
    $("#btn-shipping_fee"),
    $("#shipping_fee-options"),
    $(".shipping_fee-input")
);
handleFilterClick(
    $("#btn-shipping_unit"),
    $("#shipping_unit-options"),
    $(".shipping_unit-input")
);
handleFilterClick(
    $("#btn-code_delivery"),
    $("#code_delivery-options"),
    $(".code_delivery-input")
);
handleFilterClick(
    $("#btn-reciept"),
    $("#reciept-options"),
    $(".reciept-input")
);
handleFilterClick(
    $("#btn-receive"),
    $("#receive-options"),
    $(".receive-input")
);
handleFilterClick(
    $("#btn-reference_number"),
    $("#reference_number-options"),
    $(".reference_number-input")
);
handleFilterClick(
    $("#btn-quotenumber"),
    $("#quotenumber-options"),
    $(".quotenumber-input")
);
handleFilterClick($("#btn-slxuat"), $("#slxuat-options"), $(".slxuat-input"));
handleFilterClick(
    $("#btn-product_unit"),
    $("#product_unit-options"),
    $(".product_unit-input")
);
handleFilterClick(
    $("#btn-price_export"),
    $("#price_export-options"),
    $(".price_export-input")
);
handleFilterClick(
    $("#btn-total_export"),
    $("#total_export-options"),
    $(".total_export-input")
);
handleFilterClick(
    $("#btn-total_import"),
    $("#total_import-options"),
    $(".total_import-input")
);
// Báo cáo
handleFilterClick(
    $("#btn-code-import"),
    $("#code-import-options"),
    $(".code-import-input")
);
handleFilterClick(
    $("#btn-name-import"),
    $("#name-import-options"),
    $(".name-import-input")
);
handleFilterClick(
    $("#btn-total-import"),
    $("#total-import-options"),
    $(".total-import-input")
);
handleFilterClick(
    $("#btn-debt-import"),
    $("#debt-import-options"),
    $(".debt-import-input")
);
//
handleFilterClick(
    $("#btn-code-export"),
    $("#code-export-options"),
    $(".code-export-input")
);
handleFilterClick(
    $("#btn-name-export"),
    $("#name-export-options"),
    $(".name-export-input")
);
handleFilterClick(
    $("#btn-total-export"),
    $("#total-export-options"),
    $(".total-export-input")
);
handleFilterClick(
    $("#btn-debt-export"),
    $("#debt-export-options"),
    $(".debt-export-input")
);
//
handleFilterClick(
    $("#btn-price_import"),
    $("#price_import-options"),
    $(".price_import-input")
);

handleFilterClick(
    $("#btn-product_qty"),
    $("#product_qty-options"),
    $(".product_qty-input")
);
handleFilterClick($("#btn-code"), $("#code-options"), $(".code-input"));
handleFilterClick($("#btn-guests"), $("#guests-options"), $(".guests-input"));
handleFilterClick(
    $("#btn-provides"),
    $("#provides-options"),
    $(".provides-input")
);
handleFilterClick(
    $("#btn-inventory"),
    $("#inventory-options"),
    $(".inventory-input")
);
handleFilterClick($("#btn-phone"), $("#phone-options"), $(".phone-input"));
handleFilterClick(
    $("#btn-company"),
    $("#company-options"),
    $(".company-input")
);

// Xử lí out
handleCancelClick($("#cancel-email"), $(".email-input"), $("#email-options"));
handleCancelClick($("#cancel-debt"), $(".debt-input"), $("#debt-options"));
handleCancelClick($("#cancel-phone"), $(".phone-input"), $("#phone-options"));
handleCancelClick($("#cancel-code"), $(".code-input"), $("#code-options"));
handleCancelClick($("#cancel-hdvao"), $(".hdvao-input"), $("#hdvao-options"));
handleCancelClick($("#cancel-hdra"), $(".hdra-input"), $("#hdra-options"));
handleCancelClick($("#cancel-users"), $(".users-input"), $("#users-options"));
handleCancelClick($("#cancel-pay"), $(".pay-input"), $("#pay-options"));
handleCancelClick($("#cancel-TTN"), $(".TTN-input"), $("#TTN-options"));
handleCancelClick($("#cancel-TTX"), $(".TTX-input"), $("#TTX-options"));
handleCancelClick($("#cancel-HTTTX"), $(".HTTTX-input"), $("#HTTTX-options"));
handleCancelClick($("#cancel-HTTTN"), $(".HTTTN-input"), $("#HTTTN-options"));
handleCancelClick($("#cancel-date"), $(".date-input"), $("#date-options"));
handleCancelClick($("#cancel-total"), $(".total-input"), $("#total-options"));
handleCancelClick(
    $("#cancel-dateTTX"),
    $(".dateTTX-input"),
    $("#dateTTX-options")
);
handleCancelClick(
    $("#cancel-dateTTN"),
    $(".dateTTN-input"),
    $("#dateTTN-options")
);
handleCancelClick(
    $("#cancel-dateHDN"),
    $(".dateHDN-input"),
    $("#dateHDN-options")
);
handleCancelClick(
    $("#cancel-dateHDX"),
    $(".dateHDX-input"),
    $("#dateHDX-options")
);
handleCancelClick(
    $("#cancel-provide_code"),
    $(".provide_code-input"),
    $("#provide_code-options")
);
handleCancelClick(
    $("#cancel-sauVATN"),
    $(".sauVATN-input"),
    $("#sauVATN-options")
);
handleCancelClick(
    $("#cancel-slnhap"),
    $(".slnhap-input"),
    $("#slnhap-options")
);
handleCancelClick(
    $("#cancel-trcVATX"),
    $(".trcVATX-input"),
    $("#trcVATX-options")
);
handleCancelClick($("#cancel-VATX"), $(".VATX-input"), $("#VATX-options"));
handleCancelClick(
    $("#cancel-sauVATX"),
    $(".sauVATX-input"),
    $("#sauVATX-options")
);
handleCancelClick(
    $("#cancel-POnhap"),
    $(".POnhap-input"),
    $("#POnhap-options")
);
handleCancelClick(
    $("#cancel-POxuat"),
    $(".POxuat-input"),
    $("#POxuat-options")
);
handleCancelClick($("#cancel-BH"), $(".BH-input"), $("#BH-options"));
handleCancelClick(
    $("#cancel-trcVATN"),
    $(".trcVATN-input"),
    $("#trcVATN-options")
);
handleCancelClick($("#cancel-VATN"), $(".VATN-input"), $("#VATN-options"));
handleCancelClick(
    $("#cancel-payment_code"),
    $(".payment_code-input"),
    $("#payment_code-options")
);
handleCancelClick(
    $("#cancel-delivery_code"),
    $(".delivery_code-input"),
    $("#delivery_code-options")
);
handleCancelClick(
    $("#cancel-guest_code"),
    $(".guest_code-input"),
    $("#guest_code-options")
);
handleCancelClick(
    $("#cancel-code_payment"),
    $(".code_payment-input"),
    $("#code_payment-options")
);
handleCancelClick(
    $("#cancel-payment"),
    $(".payment-input"),
    $("#payment-options")
);
handleCancelClick(
    $("#cancel-number_bill"),
    $(".number_bill-input"),
    $("#number_bill-options")
);
handleCancelClick(
    $("#cancel-shipping_fee"),
    $(".shipping_fee-input"),
    $("#shipping_fee-options")
);
handleCancelClick(
    $("#cancel-shipping_unit"),
    $(".shipping_unit-input"),
    $("#shipping_unit-options")
);
handleCancelClick(
    $("#cancel-code_delivery"),
    $(".code_delivery-input"),
    $("#code_delivery-options")
);
handleCancelClick(
    $("#cancel-reciept"),
    $(".reciept-input"),
    $("#reciept-options")
);
handleCancelClick(
    $("#cancel-receive"),
    $(".receive-input"),
    $("#receive-options")
);
handleCancelClick(
    $("#cancel-status"),
    $(".status-input"),
    $("#status-options")
);
handleCancelClick(
    $("#cancel-reference_number"),
    $(".reference_number-input"),
    $("#reference_number-options")
);
handleCancelClick(
    $("#cancel-quotenumber"),
    $(".quotenumber-input"),
    $("#quotenumber-options")
);
handleCancelClick(
    $("#cancel-product_unit"),
    $(".product_unit-input"),
    $("#product_unit-options")
);
handleCancelClick(
    $("#cancel-slxuat"),
    $(".slxuat-input"),
    $("#slxuat-options")
);
handleCancelClick(
    $("#cancel-price_export"),
    $(".price_export-input"),
    $("#price_export-options")
);
handleCancelClick(
    $("#cancel-total_export"),
    $(".total_export-input"),
    $("#total_export-options")
);
handleCancelClick(
    $("#cancel-total_import"),
    $(".total_import-input"),
    $("#total_import-options")
);
handleCancelClick(
    $("#cancel-price_import"),
    $(".price_import-input"),
    $("#price_import-options")
);
handleCancelClick(
    $("#cancel-product_qty"),
    $(".product_qty-input"),
    $("#product_qty-options")
);
handleCancelClick(
    $("#cancel-guests"),
    $(".guests-input"),
    $("#guests-options")
);
handleCancelClick(
    $("#cancel-provides"),
    $(".provides-input"),
    $("#provides-options")
);
handleCancelClick($("#cancel-name"), $(".name-input"), $("#name-options"));
handleCancelClick($("#cancel-tensp"), $(".tensp-input"), $("#tensp-options"));
handleCancelClick(
    $("#cancel-inventory"),
    $(".inventory-input"),
    $("#inventory-options")
);
handleCancelClick(
    $("#cancel-company"),
    $(".company-input"),
    $("#company-options")
);
// Báo cáo
handleCancelClick(
    $("#cancel-code-import"),
    $(".code-import-input"),
    $("#code-import-options")
);
handleCancelClick(
    $("#cancel-name-import"),
    $(".name-import-input"),
    $("#name-import-options")
);
handleCancelClick(
    $("#cancel-total-import"),
    $(".total-import-input"),
    $("#total-import-options")
);
handleCancelClick(
    $("#cancel-debt-import"),
    $(".debt-import-input"),
    $("#debt-import-options")
);
//
handleCancelClick(
    $("#cancel-code-export"),
    $(".code-export-input"),
    $("#code-export-options")
);
handleCancelClick(
    $("#cancel-name-export"),
    $(".name-export-input"),
    $("#name-export-options")
);
handleCancelClick(
    $("#cancel-total-export"),
    $(".total-export-input"),
    $("#total-export-options")
);
handleCancelClick(
    $("#cancel-debt-export"),
    $(".debt-export-input"),
    $("#debt-export-options")
);
//

function filterFunction() {
    var input = $("#myInput");
    var filter = input.val().toUpperCase();
    var buttons = $("#dropdown-menu button");

    buttons.each(function () {
        var text = $(this).text();
        if (text.toUpperCase().indexOf(filter) > -1) {
            $(this).show();
        } else {
            $(this).hide();
        }
    });
}

function filterButtons(inputId, containerClass) {
    var input = $("#" + inputId);
    var filter = input.val().toUpperCase();
    var buttons = $("." + containerClass + " li");

    buttons.each(function () {
        var text = $(this).text();
        if (text.toUpperCase().indexOf(filter) > -1) {
            $(this).show();
        } else {
            $(this).hide();
        }
    });
}
