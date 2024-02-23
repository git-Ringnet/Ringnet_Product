// Hàm để xử lý click và hành động
function handleFilterClick(btn, options, input) {
    btn.click(function (event) {
        event.preventDefault();
        $(".filter-btn").prop("disabled", true);
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
        $(".filter-btn").prop("disabled", false);
        if (input) {
            input.val("");
        }
        options.hide();
    });
}

// Xử lý click
handleFilterClick($("#btn-email"), $("#email-options"), $(".email-input"));
handleFilterClick($("#btn-debt"), $("#debt-options"), $(".debt-input"));
handleFilterClick($("#btn-name"), $("#name-options"), $(".name-input"));
handleFilterClick($("#btn-tensp"), $("#tensp-options"), $(".tensp-input"));
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
