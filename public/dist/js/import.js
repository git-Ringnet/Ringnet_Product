// Format giá tiền
$("body").on(
    "input",
    '.price_export , .price_import ,.payment_input,.payment_input,input[name="delivery_charges"], .promotion, #voucher',
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

function updateProductSN() {
    $("#list_modal .modal-body").each(function (index) {
        var productSN = $(this).find('input[name^="seri"]');
        var idSN = $(this).find('input[name^="seri"]');
        productSN.attr("name", "seri" + index + "[]");
        idSN.attr("name", "seri" + index + "[]");
    });
}

// Kiểm tra số lượng
function checkQty(value, odlQty) {
    if (
        $(value)
            .val()
            .replace(/[^0-9.-]+/g, "") > odlQty
    ) {
        $(value).val(odlQty);
    }
}

function formatCurrency(value) {
    value = Math.round(value * 100) / 100;

    var parts = value.toString().split(".");
    var integerPart = parts[0];
    var formattedValue = "";

    var count = 0;
    for (var i = integerPart.length - 1; i >= 0; i--) {
        formattedValue = integerPart.charAt(i) + formattedValue;
        count++;
        if (count % 3 === 0 && i !== 0) {
            formattedValue = "," + formattedValue;
        }
    }

    if (parts.length > 1) {
        formattedValue += "." + parts[1];
    }

    return formattedValue;
}

function createRowInput(name) {
    var addRow = $(".addRow");

    for (let i = 0; i <= addRow.length; i++) {
        $(addRow[i])
            .off("click")
            .on("click", function () {
                SLTr = $(addRow[i])
                    .closest(".modal-dialog")
                    .find("#table_SNS tbody tr").length;
                id_target = $(addRow[i]).closest(".modal").attr("id");
                SLProduct = $("#quickAction")
                    .find('a[data-target="#' + id_target + '"]')
                    .closest("tr")
                    .find(".quantity-input")
                    .val();
                if (SLTr < SLProduct) {
                    var modal_body = $(this)
                        .closest(".modal-content")
                        .find(".modal-body");
                    var newtr = document.createElement("tr");
                    var newtd1 = document.createElement("td");
                    var newtd2 = document.createElement("td");
                    var newtd3 = document.createElement("td");
                    var newtd4 = document.createElement("td");
                    var newDiv = document.createElement("input");
                    var stt = document.createElement("span");
                    var checkboxes = modal_body[0].querySelectorAll(
                        // 'input[type="checkbox"]'
                        ".deleteRow1 "
                    );
                    var checkboxCount = checkboxes.length + 1;
                    // checkbox.setAttribute("type", "checkbox");
                    // newtd1.append(checkbox);
                    newDiv.setAttribute("type", "text");
                    newDiv.setAttribute(
                        "class",
                        "form-control w-100 border-0 pl-0"
                    );
                    newDiv.setAttribute("style", "background : none");
                    newDiv.setAttribute("name", name + i + "[]");
                    newtd3.append(newDiv);
                    newtd3.setAttribute("class", "border-bottom");
                    newtd2.setAttribute("class", "border-bottom");
                    newtd4.setAttribute("class", "deleteRow1 border-bottom");
                    newtd4.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="12" height="14" viewBox="0 0 12 14" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10.3687 5.5C10.6448 5.5 10.8687 5.72386 10.8687 6C10.8687 6.03856 10.8642 6.07699 10.8554 6.11452L9.3628 12.4581C9.1502 13.3615 8.3441 14 7.41597 14H4.58403C3.65593 14 2.84977 13.3615 2.6372 12.4581L1.14459 6.11452C1.08135 5.84572 1.24798 5.57654 1.51678 5.51329C1.55431 5.50446 1.59274 5.5 1.6313 5.5H10.3687ZM6.5 0C7.88071 0 9 1.11929 9 2.5H11C11.5523 2.5 12 2.94772 12 3.5V4C12 4.27614 11.7761 4.5 11.5 4.5H0.5C0.22386 4.5 0 4.27614 0 4V3.5C0 2.94772 0.44772 2.5 1 2.5H3C3 1.11929 4.11929 0 5.5 0H6.5ZM6.5 1.5H5.5C4.94772 1.5 4.5 1.94772 4.5 2.5H7.5C7.5 1.94772 7.05228 1.5 6.5 1.5Z" fill="#6D7075"/>
                    </svg>`;

                    // newtd2.appendChild(stt);
                    // newtr.append(newtd1);
                    newtr.append(newtd2);
                    newtr.append(newtd3);
                    newtr.append(newtd4);
                    modal_body[0]
                        .querySelector("#table_SNS tbody")
                        .appendChild(newtr);
                    newtd2.innerHTML = checkboxCount;
                }
            });
    }
}

// Tìm kiếm thông tin nhà cung cấp
function searchInput(input, list) {
    $(input).on("keyup", function () {
        var value = $(this).val().toUpperCase();
        $(list).each(function () {
            var text = $(this).find("a").text().toUpperCase();
            $(this).toggle(text.indexOf(value) > -1);
        });
    });
}
searchInput("#provideFilter", "#myUL li");
searchInput(".input-search", "#listReceive li");
searchInput("#searchRepresent", "#listRepresent li");
searchInput("#searchPriceEffect", "#listPriceEffect li");
searchInput("#searchTermsPay", "#listTermsPay li");
// Tính thuế, tổng tiền,...
$(document).on(
    "input",
    '.quantity-input, [name^="price_export"], .promotion, .promotion_type, #voucher',
    function (e) {
        var productPrice = parseFloat($(this).find('input[name^="product_price"]').val()?.replace(/[^0-9.-]+/g,
            "")) || 0;
        var productQty = parseFloat($(this).find('.quantity-input').val()?.replace(/[^0-9.-]+/g, "")) || 0;
        var promotionValue =
            parseFloat(
                $(this)
                    .find(".promotion")
                    .val()
                    ?.replace(/[^0-9.-]+/g, "")
            ) || 0;
        var percent = $(this).find(".percent");
        var promotionType = $(this).find(".promotion_type").val();
        updateTaxAmount($(this).closest("tr"));

        if (!isNaN(productQty) && !isNaN(productPrice)) {
            var totalAmount;
            if (promotionType === "1") {
                // Fixed amount promotion
                totalAmount = productQty * productPrice - promotionValue;
                percent.hide();
            } else if (promotionType === "2") {
                // Percentage promotion
                totalAmount =
                    productQty * productPrice * (1 - promotionValue / 100);
                percent.show();
            }
            $(this)
                .find(".total-price")
                .val(formatCurrency(Math.round(totalAmount)));
            calculateTotalAmount();
            calculateTotalTax();
        }
    }
);

function updateTaxAmount() {
    $("#inputcontent tbody tr").each(function () {
        var productQty = parseFloat($(this).find(".quantity-input").val());
        var productPrice = parseFloat($(this).find('input[name^="price_export"]').val()?.replace(/[^0-9.-]+/g,
        "")) || 0;
        var taxValue = parseFloat($(this).find(".product_tax").val());
        var promotionValue =
            parseFloat(
                $(this)
                    .find(".promotion")
                    .val()
                    ?.replace(/[^0-9.-]+/g, "")
            ) || 0;
        var promotionType = $(this).find(".promotion_type").val();
        if (taxValue == 99) {
            taxValue = 0;
        }
        if (!isNaN(productQty) && !isNaN(productPrice) && !isNaN(taxValue)) {
            var totalAmount = productQty * productPrice;
            if (promotionType === "1") {
                // Fixed amount promotion
                totalAmount -= promotionValue;
            } else if (promotionType === "2") {
                // Percentage promotion
                totalAmount *= 1 - promotionValue / 100;
            }
            var taxAmount = (totalAmount * taxValue) / 100;
            $(this)
                .find(".total_price")
                .val(formatCurrency(Math.round(totalAmount)));
            $(this).find(".product_tax1").text(Math.round(taxAmount));
        }
    });
}

$(document).on("change", ".product_tax", function () {
    updateTaxAmount($(this).closest("tr"));
    calculateTotalAmount();
    calculateTotalTax();
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

function calculateTotalAmount() {
    var totalAmount = 0;
    $("tr").each(function () {
        var rowTotal = parseFloat(
            String($(this).find(".total_price").val()).replace(/[^0-9.-]+/g, "")
        );
        if (!isNaN(rowTotal)) {
            totalAmount += rowTotal;
        }
    });
    totalAmount = Math.round(totalAmount); // Làm tròn thành số nguyên
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
    totalTax = Math.round(totalTax); // Làm tròn thành số nguyên
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
                .replace(/[^0-9.-]+/g, "")
        ) || 0;
    var discountType = $('select[name="discount_type"]').val();

    var grandTotal = totalAmount + totalTax;
    if (discountType === "2") {
        // Nhập %
        voucher = (grandTotal * voucher) / 100;
    }
    grandTotal -= voucher;
    grandTotal = Math.round(grandTotal);

    $("#grand-total").text(formatCurrency(grandTotal));
    $("#TongTien").val(formatCurrency(grandTotal));

    // Update data-value attribute
    $("#grand-total").attr("data-value", grandTotal);
    $("#total").val(totalAmount);
}

// Edit
updateTaxAmount();
calculateTotalAmount();
calculateTotalTax();
calculateGrandTotal();

// Xóa hàng SN
$(document).on("click", ".deleteRow1", function () {
    var div = $(this).parent("tr");
    var parentTable = div.closest("table");
    div.parent()
        .parent()
        .parent()
        .parent()
        .find(".SNCount")
        // .text(div.parent().find('input[type="checkbox"]').length - 1);
        .text(div.parent().find(".deleteRow1").length - 1);
    div.remove();
    var remainingRows = parentTable.find("tbody tr");
    remainingRows.each(function (index) {
        $(this)
            .find("td")
            .eq(0)
            .text(index + 1);
    });
});

function deleteImport(name, route) {
    $(name)
        .off("click")
        .on("click", function (e) {
            e.preventDefault();

            var confirmation = confirm("Bạn có chắc chắn muốn xóa không?");
            if (confirmation) {
                $("#formSubmit").attr("action", route);
                $('input[name="_method"]').val("DELETE");
                $("#formSubmit")[0].submit();
            }
        });
}

// Lấy thông tin key
function getUppercaseCharacters(input) {
    // Sử dụng regular expression để lọc ra các ký tự viết hoa
    var uppercaseChars = input.match(/[A-Z]/g);
    // Nếu không có ký tự viết hoa, trả về chuỗi trống
    return uppercaseChars ? uppercaseChars.join("") : "";
}

function getUppercaseCharacters1(input) {
    // Sử dụng regular expression để lọc ra các ký tự viết hoa
    var uppercaseChars = input.match(/[A-Za-z0-9]/g);
    // Nếu không có ký tự viết hoa, trả về chuỗi trống
    return uppercaseChars ? uppercaseChars.join("") : "";
}

function removeAccents(str) {
    return str.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
}

function getKeyProvide(name) {
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

function clearDataProvide(data) {
    $(data).closest(".modal-dialog").find("input").val("");
    $('input[name="key"]').val("");
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

jQuery(document).ready(function ($) {
    let countClick = 1;
    $("#sideProvide").on("click", function () {
        if (countClick === 1) {
            document.getElementById("mySidenav").style.width = "0";
            document.getElementById("main").style.marginRight = "0";
            document.getElementById("show_info_Guest").style.opacity = "0";
            document.getElementById("title--fixed").style.right = "0";
            countClick += 1;
        } else if (countClick === 2) {
            document.getElementById("mySidenav").style.width = "310px";
            document.getElementById("main").style.marginRight = "310px";
            document.getElementById("title--fixed").style.right = "310px";
            document.getElementById("show_info_Guest").style.opacity = "1";
            countClick = 1;
        }
    });
});

//Thông báo
function showNotification(type, message) {
    // Create the notification element
    var notification = document.createElement("div");
    notification.className =
        "alert alert-" + type + " alert-dismissible fade show";
    notification.setAttribute("role", "alert");
    notification.style.position = "absolute";
    notification.style.top = "0";
    notification.style.left = "50%";
    notification.style.transform = "translate(-50%, 0%)";
    notification.style.zIndex = "999999";

    // Create the message content
    var messageDiv = document.createElement("div");
    messageDiv.className = "message pl-3";
    messageDiv.innerHTML = message;

    // Create the close button
    var closeButton = document.createElement("button");
    closeButton.type = "button";
    closeButton.className = "close";
    closeButton.setAttribute("data-dismiss", "alert");
    closeButton.setAttribute("aria-label", "Close");
    var closeSpan = document.createElement("span");
    closeSpan.className = "d-flex";
    closeSpan.innerHTML =
        '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">' +
        '<path d="M18 18L6 6" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />' +
        '<path d="M18 6L6 18" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />' +
        "</svg>";
    closeButton.appendChild(closeSpan);

    // Append the elements to the notification
    notification.appendChild(messageDiv);
    notification.appendChild(closeButton);

    // Append the notification to the document body
    document.body.appendChild(notification);

    // Show the notification
    notification.style.display = "block";

    // Hide the notification after a certain duration (e.g., 5 seconds)
    setTimeout(function () {
        document.body.removeChild(notification);
    }, 3000); // Adjust the duration as needed
}

function deleteRow() {
    $(".deleteRow")
        .off("click")
        .on("click", function () {
            id = $(this).closest("tr").find("button").attr("data-target");
            $("#list_modal " + id).remove();
            $(this).closest("tr").remove();
            updateTaxAmount();
            calculateTotalAmount();
            calculateTotalTax();
            calculateGrandTotal();
        });
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

function toggleList(input, list) {
    input.on("click", function () {
        list.show();
    });

    $(document).click(function (event) {
        if (!$(event.target).closest(input).length) {
            list.hide();
        }
    });
}

$(document).ready(function () {
    $("#invitationForm").on("submit", function (event) {
        var isValid = true;
        $('input[name="emails[]"]').each(function () {
            if ($(this).val().trim() === "") {
                isValid = false;
                return false; // Thoát khỏi each loop
            }
        });

        if (!isValid) {
            alert("Trường email nhập không hợp lệ.");
            event.preventDefault(); // Ngăn chặn gửi form
        }
    });
});
