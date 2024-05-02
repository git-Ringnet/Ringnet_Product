// Hàm để xử lý click và hành động
function handleFilterClick(btn, options, input) {
    btn.click(function (event) {
        event.preventDefault();
        $(".btn-filter_search").prop("disabled", true);
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
        $(".btn-filter_search").prop("disabled", false);
        if (input) {
            input.val("");
        }
        options.hide();
    });
}
$(document).on("click", function (event) {
    if (!$(event.target).closest(".dropdown-menu,.block-options").length) {
        $(".block-options").hide();
        $(".btn-filter_search").prop("disabled", false);
    }
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
