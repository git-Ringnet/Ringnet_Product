// Lấy thông tin key
function getUppercaseCharacters(input) {
    // Sử dụng regular expression để lọc ra các ký tự viết hoa
    var uppercaseChars = input.match(/[A-Z]/g);
    // Nếu không có ký tự viết hoa, trả về chuỗi trống
    return uppercaseChars ? uppercaseChars.join("") : "";
}

function removeAccents(str) {
    return str.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
}

function getKeyGuest(name) {
    $(name).on("input", function () {
        input = getUppercaseCharacters($(this).val());
        if (input) {
            $('input[name="key"]').val(input);
        } else {
            getValueUpperCase = getUppercaseCharacters(
                removeAccents(
                    $(this).val().charAt(0).toUpperCase() +
                        $(this).val().slice(1)
                )
            );
            $('input[name="key"]').val(getValueUpperCase);
        }
    });
}

function getUppercaseCharacters1(input) {
    // Sử dụng regular expression để lọc ra các ký tự viết hoa
    var uppercaseChars = input.match(/[A-Za-z0-9]/g);
    // Nếu không có ký tự viết hoa, trả về chuỗi trống
    return uppercaseChars ? uppercaseChars.join("") : "";
}

function getQuotation(getName, count, date) {
    var currentDate = new Date();
    var day = currentDate.getDate();
    var month = currentDate.getMonth() + 1;
    var formattedDay = day.toString().padStart(2, "0");
    var formattedMonth = month.toString().padStart(2, "0");
    var formattedDate =
        formattedDay + formattedMonth + currentDate.getFullYear();
    var name = "RN";

    var uppercaseCharacters = getUppercaseCharacters(getName);
    if (uppercaseCharacters) {
        key = uppercaseCharacters;
    } else {
        key = getUppercaseCharacters(
            getName.charAt(0).toUpperCase() + getName.slice(1)
        );
    }

    if (count < 10) {
        if (count == 0) {
            count = 1;
        } else {
            count += 1;
        }
        count = "0" + count;
    } else {
        count = count;
    }
    if (formattedDate == date) {
        stt = count;
    } else {
        stt = "01";
    }
    quotation = formattedDate + "/" + name + "-" + key + "-" + stt;
    return quotation;
}

function getQuotation1(getName, count, date) {
    var currentDate = new Date();
    var day = currentDate.getDate();
    var month = currentDate.getMonth() + 1;
    var formattedDay = day.toString().padStart(2, "0");
    var formattedMonth = month.toString().padStart(2, "0");
    var formattedDate =
        formattedDay + formattedMonth + currentDate.getFullYear();
    var name = "RN";

    var uppercaseCharacters = getUppercaseCharacters1(getName);
    var key;

    if (uppercaseCharacters) {
        key = uppercaseCharacters;
    } else {
        key = getUppercaseCharacters1(
            getName.charAt(0).toUpperCase() + getName.slice(1)
        );
    }

    count = count < 10 ? "0" + (parseInt(count) + 1) : count;

    var stt = formattedDate == date ? count : "01";

    var quotation = formattedDate + "/" + name + "-" + key + "-" + stt;
    return quotation;
}

function cbPayment(element) {
    var isChecked = $(element).is(":checked");
    var total = $(".payment_all").text().trim();
    if (isChecked) {
        $("#prepayment").val(total);
        $("#prepayment").attr("readonly", true);
    } else {
        $("#prepayment").val("");
        $("#prepayment").attr("readonly", false);
    }
}

$(document).ready(function () {
    // Attach the event handler in case it wasn't properly attached before
    $("#payment_all_checkbox").on("click", function () {
        cbPayment(this);
    });
});

function checkQty(value, odlQty) {
    if (
        $(value)
            .val()
            .replace(/[^0-9.-]+/g, "") > odlQty
    ) {
        $(value).val(odlQty);
    }
}

function addProductRow(productName) {
    let fieldCounter = 1;
    // Tạo các phần tử HTML mới
    const newRow = $("<tr>", {
        id: `dynamic-row-${fieldCounter}`,
        class: `bg-white addProduct`,
        style: `height:80px`,
    });
    const maSanPham = $(
        "<td class='border-right p-2 text-13 align-top border-bottom border-top-0'>" +
            "<span class='ml-1 mr-2'>" +
            "<svg xmlns='http://www.w3.org/2000/svg' width='6' height='10' viewBox='0 0 6 10' fill='none'>" +
            "<g clip-path='url(#clip0_1710_10941)'>" +
            "<path fill-rule='evenodd' clip-rule='evenodd' d='M1 8C1.55228 8 2 8.44772 2 9C2 9.55228 1.55228 10 1 10C0.447715 10 0 9.55228 0 9C0 8.44772 0.447715 8 1 8ZM5 8C5.55228 8 6 8.44772 6 9C6 9.55228 5.55228 10 5 10C4.44772 10 4 9.55228 4 9C4 8.44772 4.44772 8 5 8ZM1 4C1.55228 4 2 4.44772 2 5C2 5.55228 1.55228 6 1 6C0.447715 6 0 5.55228 0 5C0 4.44772 0.447715 4 1 4ZM5 4C5.55228 4 6 4.44772 6 5C6 5.55228 5.55228 6 5 6C4.44772 6 4 5.55228 4 5C4 4.44772 4.44772 4 5 4ZM1 0C1.55228 0 2 0.447715 2 1C2 1.55228 1.55228 2 1 2C0.447715 2 0 1.55228 0 1C0 0.447715 0.447715 0 1 0ZM5 0C5.55228 0 6 0.447715 6 1C6 1.55228 5.55228 2 5 2C4.44772 2 4 1.55228 4 1C4 0.447715 4.44772 0 5 0Z' fill='#282A30'/>" +
            "</g>" +
            "<defs>" +
            "<clipPath id='clip0_1710_10941'>" +
            "<rect width='6' height='10' fill='white'/>" +
            "</clipPath>" +
            "</defs>" +
            "</svg>" +
            "</span>" +
            "<input type='checkbox' class='cb-element checkall-btn ml-1 mr-1'>" +
            "<input type='text' autocomplete='off' class='border-0 pl-1 pr-2 py-1 w-50 product_code height-32' name='product_code[]'>" +
            "</td>"
    );
    const tenSanPham = $(
        `<td class='border-right p-2 text-13 align-top position-relative border-bottom border-top-0'>` +
            `<div class='d-flex align-items-center'>` +
            `<textarea class="border-0 px-2 py-1 w-100 product_name height-auto" autocomplete="off" required name="product_name[]">` +
            productName +
            `</textarea>` +
            `<input type='hidden' class='product_id' autocomplete='off' name='product_id[]'>` +
            `<div class='info-product' style='display: none;' data-toggle='modal' data-target='#productModal'>` +
            `<svg xmlns='http://www.w3.org/2000/svg' width='14' height='14' viewBox='0 0 14 14' fill='none'>` +
            `<g clip-path='url(#clip0_2559_39956)'>` +
            `<path d='M6.99999 1.48362C5.53706 1.48362 4.13404 2.06477 3.09959 3.09922C2.06514 4.13367 1.48399 5.53669 1.48399 6.99963C1.48399 8.46256 2.06514 9.86558 3.09959 10.9C4.13404 11.9345 5.53706 12.5156 6.99999 12.5156C8.46292 12.5156 9.86594 11.9345 10.9004 10.9C11.9348 9.86558 12.516 8.46256 12.516 6.99963C12.516 5.53669 11.9348 4.13367 10.9004 3.09922C9.86594 2.06477 8.46292 1.48362 6.99999 1.48362ZM0.265991 6.99963C0.265991 5.21366 0.975464 3.50084 2.23833 2.23797C3.5012 0.975098 5.21402 0.265625 6.99999 0.265625C8.78596 0.265625 10.4988 0.975098 11.7616 2.23797C13.0245 3.50084 13.734 5.21366 13.734 6.99963C13.734 8.78559 13.0245 10.4984 11.7616 11.7613C10.4988 13.0242 8.78596 13.7336 6.99999 13.7336C5.21402 13.7336 3.5012 13.0242 2.23833 11.7613C0.975464 10.4984 0.265991 8.78559 0.265991 6.99963Z' fill='#282A30'/>` +
            `<path d='M7.07004 4.34488C6.92998 4.33528 6.78944 4.35459 6.65715 4.40161C6.52487 4.44863 6.40367 4.52236 6.30109 4.61821C6.19851 4.71406 6.11674 4.82999 6.06087 4.95878C6.00499 5.08757 5.9762 5.22648 5.97629 5.36688C5.97629 5.52851 5.91208 5.68352 5.79779 5.79781C5.6835 5.91211 5.52849 5.97631 5.36685 5.97631C5.20522 5.97631 5.05021 5.91211 4.93592 5.79781C4.82162 5.68352 4.75742 5.52851 4.75742 5.36688C4.75733 4.9557 4.87029 4.55241 5.08394 4.2011C5.2976 3.84979 5.60373 3.56398 5.96886 3.37492C6.33399 3.18585 6.74408 3.10081 7.15428 3.12909C7.56449 3.15737 7.95902 3.29788 8.29475 3.53526C8.63049 3.77265 8.8945 4.09776 9.05792 4.47507C9.22135 4.85237 9.2779 5.26735 9.22139 5.67462C9.16487 6.0819 8.99748 6.4658 8.7375 6.78436C8.47753 7.10292 8.13497 7.34387 7.74729 7.48088C7.70694 7.49534 7.67207 7.52196 7.64747 7.55706C7.62287 7.59216 7.60975 7.63402 7.60992 7.67688V8.22463C7.60992 8.38626 7.54571 8.54127 7.43142 8.65557C7.31712 8.76986 7.16211 8.83407 7.00048 8.83407C6.83885 8.83407 6.68383 8.76986 6.56954 8.65557C6.45525 8.54127 6.39104 8.38626 6.39104 8.22463V7.67688C6.39096 7.38197 6.48229 7.0943 6.65247 6.85345C6.82265 6.6126 7.0633 6.43042 7.34129 6.332C7.56313 6.25339 7.7511 6.10073 7.87356 5.89975C7.99603 5.69877 8.0455 5.46172 8.01366 5.22853C7.98181 4.99534 7.87059 4.78025 7.69872 4.61946C7.52685 4.45867 7.30483 4.36114 7.07004 4.34488Z' fill='#282A30'/>` +
            `<path d='M7.04382 10.1242C7.00228 10.1242 6.96245 10.1408 6.93307 10.1701C6.9037 10.1995 6.8872 10.2393 6.8872 10.2809C6.8872 10.3224 6.9037 10.3623 6.93307 10.3916C6.96245 10.421 7.00228 10.4375 7.04382 10.4375C7.08536 10.4375 7.1252 10.421 7.15457 10.3916C7.18395 10.3623 7.20045 10.3224 7.20045 10.2809C7.20045 10.2393 7.18395 10.1995 7.15457 10.1701C7.1252 10.1408 7.08536 10.1242 7.04382 10.1242ZM7.04382 10.9371C7.13 10.9371 7.21534 10.9201 7.29496 10.8872C7.37458 10.8542 7.44692 10.8059 7.50786 10.7449C7.5688 10.684 7.61714 10.6116 7.65012 10.532C7.6831 10.4524 7.70007 10.3671 7.70007 10.2809C7.70007 10.1947 7.6831 10.1094 7.65012 10.0297C7.61714 9.95012 7.5688 9.87777 7.50786 9.81684C7.44692 9.7559 7.37458 9.70756 7.29496 9.67458C7.21534 9.6416 7.13 9.62462 7.04382 9.62462C6.86977 9.62462 6.70286 9.69376 6.57978 9.81684C6.45671 9.93991 6.38757 10.1068 6.38757 10.2809C6.38757 10.4549 6.45671 10.6218 6.57978 10.7449C6.70286 10.868 6.86977 10.9371 7.04382 10.9371Z' fill='#282A30'/>` +
            `</g>` +
            `<defs>` +
            `<clipPath id='clip0_2559_39956'>` +
            `<rect width='14' height='14' fill='white'/>` +
            `</clipPath>` +
            `</defs>` +
            `</svg>` +
            `</div>` +
            `</div>` +
            `</td>`
    );
    const dvTinh = $(
        "<td class='border-right p-2 text-13 align-top border-bottom border-top-0'>" +
            "<input type='text' autocomplete='off' value='Cái' class='border-0 px-2 py-1 w-100 product_unit height-32' required name='product_unit[]'>" +
            "</td>"
    );
    const soLuong = $(
        "<td class='border-right p-2 text-13 align-top border-bottom border-top-0'>" +
            "<div>" +
            "<input type='number' class='text-right border-0 px-2 py-1 w-100 quantity-input height-32' autocomplete='off' required name='product_qty[]'>" +
            "<input type='hidden' class='tonkho'>" +
            "</div>" +
            "<div class='mt-3 text-13-blue inventory text-right inventory-info' data-toggle='modal' data-target='#inventoryModal'>Tồn kho: <span class='pl-1 soTonKho'></span></div>" +
            "</td>"
    );
    const donGia = $(
        "<td class='border-right p-2 text-13 align-top border-bottom border-top-0'>" +
            "<div>" +
            "<input type='text' class='text-right border-0 px-2 py-1 w-100 product_price height-32' autocomplete='off' name='product_price[]' required>" +
            "</div>" +
            "<a href='#'><div class='mt-3 text-right text-13-blue recentModal' data-toggle='modal' data-target='#recentModal' style='display:none;'>Giao dịch gần đây</div></a>" +
            "</td>"
    );
    const thue = $(
        "<td class='border-right p-2 text-13 align-top border-bottom border-top-0'>" +
            "<select name='product_tax[]' class='border-0 py-1 w-100 text-center product_tax height-32' required>" +
            "<option value='0'>0%</option>" +
            "<option value='8'>8%</option>" +
            "<option value='10'>10%</option>" +
            "<option value='99'>NOVAT</option>" +
            "</select>" +
            "</td>"
    );
    const khuyenMai = $(
        "<td class='border-right p-2 text-13 align-top border-bottom border-top-0'>" +
            "<div class='d-flex align-item-center'>" +
            "<input type='text' name='promotion[]' class='text-right border-0 px-2 py-1 w-100 height-32 promotion' autocomplete='off'>" +
            "<span class='mt-2 percent d-none'>%</span>" +
            "</div>" +
            "<div class='text-right'>" +
            "<select name='promotion_type[]' class='border-0 mt-3 text-13-blue text-center promotion_type' required=''><option value='1'>Nhập tiền</option><option value='2'>Nhập %</option></select>" +
            "</div>" +
            "</td>"
    );
    const thanhTien = $(
        "<td class='border-right p-2 text-13 align-top border-bottom border-top-0'>" +
            "<input type='text' readonly class='text-right border-0 px-2 py-1 w-100 total-amount height-32'>" +
            "</td>"
    );
    const ghiChu = $(
        "<td class='border-right note p-2 align-top border-bottom border-top-0'>" +
            "<input type='text' class='text-13-black border-0 py-1 w-100 height-32' placeholder='Nhập ghi chú' name='product_note[]'>" +
            "</td>"
    );
    const option = $(
        "<td class='p-2 align-top activity border-bottom border-top-0 deleteProduct' data-name1='BG' data-des='Xóa sản phẩm'>" +
            "<svg width='17' height='17' viewBox='0 0 17 17' fill='none' xmlns='http://www.w3.org/2000/svg'>" +
            "<path fill-rule='evenodd' clip-rule='evenodd' d='M13.1417 6.90625C13.4351 6.90625 13.673 7.1441 13.673 7.4375C13.673 7.47847 13.6682 7.5193 13.6589 7.55918L12.073 14.2992C11.8471 15.2591 10.9906 15.9375 10.0045 15.9375H6.99553C6.00943 15.9375 5.15288 15.2591 4.92702 14.2992L3.34113 7.55918C3.27393 7.27358 3.45098 6.98757 3.73658 6.92037C3.77645 6.91099 3.81729 6.90625 3.85826 6.90625H13.1417ZM9.03125 1.0625C10.4983 1.0625 11.6875 2.25175 11.6875 3.71875H13.8125C14.3993 3.71875 14.875 4.19445 14.875 4.78125V5.3125C14.875 5.6059 14.6371 5.84375 14.3438 5.84375H2.65625C2.36285 5.84375 2.125 5.6059 2.125 5.3125V4.78125C2.125 4.19445 2.6007 3.71875 3.1875 3.71875H5.3125C5.3125 2.25175 6.50175 1.0625 7.96875 1.0625H9.03125ZM9.03125 2.65625H7.96875C7.38195 2.65625 6.90625 3.13195 6.90625 3.71875H10.0938C10.0938 3.13195 9.61805 2.65625 9.03125 2.65625Z' fill='#6B6F76'/>" +
            "</svg>" +
            "</td>" +
            "<td style='display:none;'><input type='text' class='product_tax1'></td>" +
            "<td style='display:none;'><input type='text' class='type'></td>"
    );
    // Gắn các phần tử vào hàng mới
    newRow.append(
        maSanPham,
        tenSanPham,
        dvTinh,
        soLuong,
        donGia,
        thue,
        khuyenMai,
        thanhTien,
        ghiChu,
        option
    );
    $("#dynamic-fields").before(newRow);
    // Tăng giá trị fieldCounter
    fieldCounter++;
    //Xóa sản phẩm
    option.click(function () {
        $(this).closest("tr").remove();
        fieldCounter--;
        calculateTotalAmount();
        calculateGrandTotal();
    });
}

//tính thành tiền của sản phẩm
$(document).on(
    "input",
    '.quantity-input, [name^="product_price"], .promotion, .promotion_type, #voucher',
    function (e) {
        var $row = $(this).closest("tr");

        // Check if the product_name input has a value
        var productNameValue = $row.find(".product_name").val();
        if (productNameValue) {
            // Split the product names and quantities
            var productNames = productNameValue.split(";");
        } else {
            var productNames = [];
        }

        var productQty =
            parseFloat(
                $row
                    .find(".quantity-input")
                    .val()
                    ?.replace(/[^0-9.-]+/g, "")
            ) || 0;
        var productPrice =
            parseFloat(
                $row
                    .find('input[name^="product_price"]')
                    .val()
                    ?.replace(/[^0-9.-]+/g, "")
            ) || 0;
        var promotionValue =
            parseFloat(
                $row
                    .find(".promotion")
                    .val()
                    ?.replace(/[^0-9.-]+/g, "")
            ) || 0;
        var percent = $row.find(".percent");
        var promotionType = $row.find(".promotion_type").val();

        updateTaxAmount($row);

        if (!isNaN(productQty) && !isNaN(productPrice)) {
            var totalAmount = 0;
            productNames.forEach(() => {
                var subtotal;
                if (promotionType === "1") {
                    // Fixed amount promotion
                    subtotal = productQty * productPrice - promotionValue;
                } else if (promotionType === "2") {
                    // Percentage promotion
                    subtotal =
                        productQty * productPrice * (1 - promotionValue / 100);
                } else {
                    subtotal = productQty * productPrice;
                }
                totalAmount += subtotal;
            });

            $row.find(".total-amount").val(
                formatCurrency(Math.round(totalAmount))
            );
            calculateTotalAmount();
            calculateTotalTax();
            calculateGrandTotal();
        }
    }
);

$(document).on("change", ".product_tax", function () {
    updateTaxAmount($(this).closest("tr"));
    calculateTotalAmount();
    calculateTotalTax();
    calculateGrandTotal();
});

$(document).on("change", ".promotion_type", function (e) {
    var $row = $(this).closest("tr");
    var promotionType = $row.find(".promotion_type").val();

    $row.find(".promotion").val("");

    if (promotionType === "2") {
        $row.find(".percent").removeClass("d-none").show(); // Show the percent span
    } else {
        $row.find(".percent").addClass("d-none").hide(); // Hide the percent span
    }

    updateTaxAmount($row);
    calculateTotalAmount();
    calculateTotalTax();
    calculateGrandTotal();
});

$(document).on("change", ".discount_type", function (e) {
    var discountType = $('select[name="discount_type"]').val();

    $("#voucher").val("");

    if (discountType === "2") {
        $(".percent_discount").removeClass("d-none").show(); // Show the percent span
    } else {
        $(".percent_discount").addClass("d-none").hide(); // Hide the percent span
    }

    calculateTotalAmount();
    calculateTotalTax();
    calculateGrandTotal();
});

function updateTaxAmount(row) {
    var productNameValue = row.find(".product_name").val();
    if (productNameValue) {
        var productNames = productNameValue.split(";");
    } else {
        var productNames = [];
    }

    var productQty = parseFloat(row.find(".quantity-input").val()) || 0;
    var productPrice =
        parseFloat(
            row
                .find('input[name^="product_price"]')
                .val()
                ?.replace(/[^0-9.-]+/g, "")
        ) || 0;
    var promotionValue =
        parseFloat(
            row
                .find(".promotion")
                .val()
                ?.replace(/[^0-9.-]+/g, "")
        ) || 0;
    var promotionType = row.find(".promotion_type").val();
    var taxValue = parseFloat(row.find(".product_tax").val());
    if (taxValue == 99) {
        taxValue = 0;
    }

    if (!isNaN(productQty) && !isNaN(productPrice) && !isNaN(taxValue)) {
        var totalAmount = 0;
        productNames.forEach(() => {
            var subtotal = productQty * productPrice;
            if (promotionType === "1") {
                // Fixed amount promotion
                subtotal -= promotionValue;
            } else if (promotionType === "2") {
                // Percentage promotion
                subtotal *= 1 - promotionValue / 100;
            }
            totalAmount += subtotal;
        });

        var taxAmount = totalAmount * (taxValue / 100);

        row.find(".total-amount").val(formatCurrency(Math.round(totalAmount)));
        row.find(".product_tax1").text(formatCurrency(Math.round(taxAmount)));
    }
}

function calculateTotalAmount() {
    var totalAmount = 0;
    $("tr").each(function () {
        var rowTotal = parseFloat(
            String($(this).find(".total-amount").val()).replace(
                /[^0-9.-]+/g,
                ""
            )
        );
        if (!isNaN(rowTotal)) {
            totalAmount += rowTotal;
        }
    });
    totalAmount = Math.round(totalAmount); // Round to the nearest integer
    $("#total-amount-sum").text(formatCurrency(totalAmount));
    calculateTotalTax();
    calculateGrandTotal();
}

function calculateTotalTax() {
    var totalTax = 0;
    $("tr").each(function () {
        var rowTax = parseFloat(
            $(this)
                .find(".product_tax1")
                .text()
                .replace(/[^0-9.-]+/g, "")
        );
        if (!isNaN(rowTax)) {
            totalTax += rowTax;
        }
    });
    totalTax = Math.round(totalTax); // Round to the nearest integer
    $("#product-tax").text(formatCurrency(totalTax));

    calculateGrandTotal();
}

function calculateGrandTotal() {
    var totalAmount = parseFloat(
        $("#total-amount-sum")
            .text()
            .replace(/[^0-9.-]+/g, "")
    );
    var totalTax = parseFloat(
        $("#product-tax")
            .text()
            .replace(/[^0-9.-]+/g, "")
    );
    var voucher =
        parseFloat(
            $("#voucher")
                .val()
                ?.replace(/[^0-9.-]+/g, "")
        ) || 0;
    var discountType = $('select[name="discount_type"]').val();
    if (discountType === "2") {
        // Nhập %
        voucher = (totalAmount * voucher) / 100;
    }
    grandTotal = Math.round(totalAmount - voucher + totalTax);

    $("#grand-total").text(formatCurrency(grandTotal));
    $("#TongTien").val(formatCurrency(grandTotal));

    // Update data-value attribute
    $("#grand-total").attr("data-value", grandTotal);
    $("#total").val(grandTotal);
}
//Tự động xuống dòng khi gom nhóm sản phẩm
function setupAutoResizeTextarea(selector) {
    var $textarea = $(selector);
    var inputValue = $textarea.val();
    var formattedValue = inputValue.replace(/;/g, ";\n");
    $textarea.val(formattedValue);

    // Function to adjust the height of the textarea
    function adjustTextareaHeight(textarea) {
        textarea.style.height = "auto";
        textarea.style.height = textarea.scrollHeight + "px";
    }

    // Adjust the height after setting the value
    adjustTextareaHeight($textarea[0]);

    // Adjust the height on input
    $textarea.on("input", function () {
        adjustTextareaHeight(this);
    });
}
