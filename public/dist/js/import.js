// Format giá tiền
$('body').on('input', '.price_export , .price_import ,.payment_input,.quantity-input,.payment_input,input[name="delivery_charges"]', function (event) {
    // Lấy giá trị đã nhập
    var value = event.target.value;

    // Xóa các ký tự không phải số và dấu phân thập phân từ giá trị
    var formattedValue = value.replace(/[^0-9.]/g, '');

    // Định dạng số với dấu phân cách hàng nghìn và giữ nguyên số thập phân
    var formattedNumber = numberWithCommas(formattedValue);

    event.target.value = formattedNumber;
});


function numberWithCommas(number) {
    // Chia số thành phần nguyên và phần thập phân
    var parts = number.split('.');
    var integerPart = parts[0];
    var decimalPart = parts[1];

    // Định dạng phần nguyên số với dấu phân cách hàng nghìn
    var formattedIntegerPart = integerPart.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");

    // Kết hợp phần nguyên và phần thập phân (nếu có)
    var formattedNumber = decimalPart !== undefined ? formattedIntegerPart + '.' + decimalPart :
        formattedIntegerPart;

    return formattedNumber;
}

function updateProductSN() {
    $('#list_modal .modal-body').each(function (index) {
        var productSN = $(this).find('input[name^="seri"]');
        var idSN = $(this).find('input[name^="seri"]');
        productSN.attr('name', 'seri' + index + '[]');
        idSN.attr('name', 'seri' + index + '[]');
    });
}

// Kiểm tra số lượng
function checkQty(value, odlQty) {
    if ($(value).val() > odlQty) {
        $(value).val(odlQty)
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


function deleteRow() {
    $('.deleteRow').off('click').on('click', function () {
        id = $(this).closest('tr').find('button').attr('data-target');
        $('#list_modal ' + id).remove();
        $(this).closest('tr').remove();
    })
}

function createRowInput(name) {
    var addRow = $('.addRow');
    for (let i = 0; i <= addRow.length; i++) {
        $(addRow[i]).off('click').on('click', function () {
            var modal_body = $(this).closest('.modal-content').find('.modal-body');
            var newtr = document.createElement('tr');
            var newtd1 = document.createElement('td');
            var newtd2 = document.createElement('td');
            var newtd3 = document.createElement('td');
            var newtd4 = document.createElement('td');
            var newDiv = document.createElement("input");
            var checkbox = document.createElement("input");
            var stt = document.createElement("span");
            var checkboxes = modal_body[0].querySelectorAll('input[type="checkbox"]');
            var checkboxCount = checkboxes.length;
            checkbox.setAttribute("type", "checkbox");
            newtd1.append(checkbox);
            newDiv.setAttribute("type", "text");
            newDiv.setAttribute("class", "form-control w-25");
            newDiv.setAttribute("name", name + i + "[]");
            newtd3.append(newDiv);
            newtd4.setAttribute('class', 'deleteRow1');
            newtd4.innerHTML =
                '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M14.0606 6.66675C13.6589 6.66675 13.3333 6.99236 13.3333 7.39402C13.3333 7.79568 13.6589 8.12129 14.0606 8.12129H17.9394C18.341 8.12129 18.6667 7.79568 18.6667 7.39402C18.6667 6.99236 18.341 6.66675 17.9394 6.66675H14.0606ZM8 10.3031C8 9.90143 8.32561 9.57582 8.72727 9.57582H10.1818H21.8182H23.2727C23.6744 9.57582 24 9.90143 24 10.3031C24 10.7048 23.6744 11.0304 23.2727 11.0304H22.5455V22.6667C22.5455 24.2819 21.2158 25.5758 19.6179 25.5758H12.3452C11.9637 25.5755 11.5854 25.4997 11.2333 25.3528C10.8812 25.2059 10.5617 24.9908 10.2931 24.7199C10.0244 24.449 9.81206 24.1276 9.66816 23.7743C9.52463 23.4219 9.45204 23.0447 9.45455 22.6642V11.0304H8.72727C8.32561 11.0304 8 10.7048 8 10.3031ZM10.9091 22.6723V11.0304H21.0909V22.6667C21.0909 23.4623 20.4288 24.1213 19.6179 24.1213H12.3458C12.1562 24.1211 11.9684 24.0834 11.7934 24.0104C11.6183 23.9374 11.4595 23.8304 11.3259 23.6958C11.1924 23.5611 11.0868 23.4013 11.0153 23.2257C10.9437 23.05 10.9076 22.8619 10.9091 22.6723ZM17.9394 13.4546C18.3411 13.4546 18.6667 13.7802 18.6667 14.1819V20.9698C18.6667 21.3714 18.3411 21.6971 17.9394 21.6971C17.5377 21.6971 17.2121 21.3714 17.2121 20.9698V14.1819C17.2121 13.7802 17.5377 13.4546 17.9394 13.4546ZM14.7879 14.1819C14.7879 13.7802 14.4623 13.4546 14.0606 13.4546C13.6589 13.4546 13.3333 13.7802 13.3333 14.1819V20.9698C13.3333 21.3714 13.6589 21.6971 14.0606 21.6971C14.4623 21.6971 14.7879 21.3714 14.7879 20.9698V14.1819Z" fill="#555555"/></svg>';
            newtd2.appendChild(stt);
            newtr.append(newtd1);
            newtr.append(newtd2);
            newtr.append(newtd3);
            newtr.append(newtd4);
            modal_body[0].querySelector('#table_SNS tbody').appendChild(newtr);
            stt.innerHTML = checkboxCount;
            checkbox.setAttribute("id", "checkbox_" + checkboxCount);
        })
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
searchInput("#myInput", "#myUL li")
searchInput('.search_quotation', '#listReceive')


// Tính thuế, tổng tiền,...
$(document).on('input', '.quantity-input, [name^="price_export"],.price_import,.product_ratio', function (e) {
    var product_ratio = parseFloat($(this).closest('tr').find('.product_ratio').val())
    var price_import = parseFloat($(this).closest('tbody tr').find('.price_import').val().replace(/[^0-9.-]+/g, "")) || 0
    var productPrice = 0;
    if (status_form == 1) {
        productPrice = parseFloat($(this).closest('tr').find('input[name^="price_export"]').val().replace(
            /[^0-9.-]+/g, "")) || 0;
    } else {
        !isNaN(product_ratio) && !isNaN(price_import) ?
            productPrice = (product_ratio + 100) * price_import / 100 : productPrice = 0
        $(this).closest('tr').find('.price_export').val(formatCurrency(productPrice));
    }
    var productQty = parseFloat($(this).closest('tr').find('.quantity-input').val()) || 0;
    updateTaxAmount($(this).closest('tr'));

    if (!isNaN(productQty) && !isNaN(productPrice)) {
        var totalAmount = productQty * productPrice;
        $(this).closest('tr').find('.total_price').val(formatCurrency(totalAmount));
        calculateTotalAmount();
        calculateTotalTax();
    }
});



function updateTaxAmount() {
    $('#inputcontent tbody tr').each(function () {
        var productQty = parseFloat($(this).find('.quantity-input').val());
        var productPrice = parseFloat($(this).find('input[name^="price_export"]').val().replace(/[^0-9.-]+/g, ""));
        var taxValue = parseFloat($(this).find('.product_tax').val());
        if (taxValue == 99) {
            taxValue = 0;
        }
        if (!isNaN(productQty) && !isNaN(productPrice) && !isNaN(taxValue)) {
            var totalAmount = productQty * productPrice;
            var taxAmount = (totalAmount * taxValue) / 100;
            $(this).find('.product_tax1').text(Math.round(taxAmount));
        }
    })
}


$(document).on('change', '.product_tax', function () {
    updateTaxAmount($(this).closest('tr'));
    calculateTotalAmount();
    calculateTotalTax();
});

function calculateTotalAmount() {
    var totalAmount = 0;
    $('tr').each(function () {
        var rowTotal = parseFloat(String($(this).find('.total_price').val()).replace(/[^0-9.-]+/g, ""));
        if (!isNaN(rowTotal)) {
            totalAmount += rowTotal;
        }
    });
    totalAmount = Math.round(totalAmount); // Làm tròn thành số nguyên
    $('#total-amount-sum').text(formatCurrency(totalAmount));
    calculateTotalTax();
    calculateGrandTotal();
}

function calculateTotalTax() {
    var totalTax = 0;
    $('tr').each(function () {
        var rowTax = parseFloat($(this).find('.product_tax1').text().replace(/[^0-9.-]+/g, ""));
        if (!isNaN(rowTax)) {
            totalTax += rowTax;
        }
    });
    totalTax = Math.round(totalTax); // Làm tròn thành số nguyên
    $('#product-tax').text(formatCurrency(totalTax));

    calculateGrandTotal();
}

function calculateGrandTotal() {
    var totalAmount = parseFloat($('#total-amount-sum').text().replace(/[^0-9.-]+/g, ""));
    var totalTax = parseFloat($('#product-tax').text().replace(/[^0-9.-]+/g, ""));

    var grandTotal = totalAmount + totalTax;
    grandTotal = Math.round(grandTotal); // Làm tròn thành số nguyên
    $('#grand-total').text(formatCurrency(grandTotal));

    // Update data-value attribute
    $('#grand-total').attr('data-value', grandTotal);
    $('#total').val(totalAmount);
}





// Edit
updateTaxAmount()
calculateTotalAmount()
calculateTotalTax()
calculateGrandTotal()

function updateTaxAmount() {
    $('#inputcontent tbody tr').each(function () {
        var productQty = parseFloat($(this).find('.quantity-input').val());
        var productPrice = parseFloat($(this).find('input[name^="price_export"]').val().replace(/[^0-9.-]+/g, ""));
        var taxValue = parseFloat($(this).find('.product_tax').val());
        if (taxValue == 99) {
            taxValue = 0;
        }
        if (!isNaN(productQty) && !isNaN(productPrice) && !isNaN(taxValue)) {
            var totalAmount = productQty * productPrice;
            var taxAmount = (totalAmount * taxValue) / 100;
            $(this).find('.product_tax1').text(Math.round(taxAmount));
        }
    })
}