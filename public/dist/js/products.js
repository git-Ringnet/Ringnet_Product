$(document).on('input', '.quantity-input, [name^="price_export"],.price_import,.product_ratio', function (e) {
    var product_ratio = parseFloat($(this).closest('tr').find('.product_ratio').val())
    var price_import = parseFloat($(this).closest('tr').find('.price_import').val().replace(/[^0-9.-]+/g, "")) || 0
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

$(document).on('change', '.product_tax', function () {
    updateTaxAmount($(this).closest('tr'));
    calculateTotalAmount();
    calculateTotalTax();
});

function updateTaxAmount(row) {
    var productQty = parseFloat(row.find('.quantity-input').val());
    var productPrice = parseFloat(row.find('input[name^="price_export"]').val().replace(/[^0-9.-]+/g, ""));
    var taxValue = parseFloat(row.find('.product_tax').val());
    if (taxValue == 99) {
        taxValue = 0;
    }
    if (!isNaN(productQty) && !isNaN(productPrice) && !isNaN(taxValue)) {
        var totalAmount = productQty * productPrice;
        var taxAmount = (totalAmount * taxValue) / 100;

        row.find('.product_tax1').text(Math.round(taxAmount));
    }
}

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

// Format giá tiền
$('body').on('input', '.price_export , .price_import', function (event) {
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

$(document).on('change', '.list_products', function (e) {
    if (checkAllValuesEntered()) {
        checkDuplicateRows();
    }
})

// Hàm lấy dữ liệu khi người dùng chọn sản phẩm con
function setValueOfInput(e) {
    var selectedProductName = $(e).text();
    var row = $(e).closest('tr');
    var productNameInput = row.find('input[name="product_name[]"]');
    productNameInput.val(selectedProductName);
    $(".dropdown-values").removeClass("show1");
}

// Ẩn danh sách sản phẩm con khi click ra ngoài
$(document).click(function (event) {
    if (!$(event.target).closest(".search_product").length) {
        $(".dropdown-values").removeClass("show1");
    }
});

//hiện danh sách khách hàng khi click trường tìm kiếm
$("#myUL").hide();
$('#listProject').hide();

$("#inputProject").on("click", function () {
    $("#listProject").show();
});
$("#myInput").on("click", function () {
    $("#myUL").show();
});

function showListProductCode() {
    $('#inputcontent tbody').on('click', '.searchProduct', function () {
        $(this).closest('tr').find('#listProductCode').show();
    });
}

function showListProductName() {
    $('#inputcontent tbody').on('click', '.searchProductName', function () {
        $(this).closest('tr').find('#listProductName').show();
    });
}



//ẩn danh sách Mã sản phẩm khi clich ra ngoài
$(document).click(function (event) {
    if ($(event.target).closest('.searchProduct').length == 0) {
        $('.listProductCode').hide();
    }
    if ($(event.target).closest('.searchProductName').length == 0) {
        $('.listProductName').hide();
    }
    if ($(event.target).closest('#inputProject').length == 0) {
        $('#listProject').hide();
    }
});


//ẩn danh sách khách hàng
$(document).click(function (event) {
    if (!$(event.target).closest("#myInput").length) {
        $("#myUL").hide();
    }
});



// Tìm kiếm thông tin nhà cung cấp
$(document).ready(function () {
    $("#myInput").on("keyup", function () {
        var value = $(this).val().toUpperCase();
        $("#myUL li").each(function () {
            var text = $(this).find("a").text().toUpperCase();
            $(this).toggle(text.indexOf(value) > -1);
        });
    });
});
// search mã sản phẩm
function searchProductCode() {
    $(".searchProduct").on("keyup", function () {
        var value = $(this).val().toUpperCase();
        $(".listProductCode li").each(function () {
            var text = $(this).find("a").text().toUpperCase();
            $(this).toggle(text.indexOf(value) > -1);
        });
    });
}
// search tên sản phẩm
function searchProductName() {
    $(".searchProductName").on("keyup", function () {
        var value = $(this).val().toUpperCase();
        $(".listProductName li").each(function () {
            var text = $(this).find("a").text().toUpperCase();
            $(this).toggle(text.indexOf(value) > -1);
        });
    });
}


// Hàm search thông tin nhà cung cấp
function filterFunction() {
    var filter = $(".search_product").val().toUpperCase();
    var a = $("#dropdown-values ul li");
    a.each(function () {
        var txtValue = $(this).text();
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            $(this).show();
        } else {
            $(this).hide();
        }
    });
}


// Hàm chỉ cho phép nhập số và ký tự - 
function validateNumberInput(input) {
    var regex = /^[0-9][0-9-]*$/;
    if (!regex.test(input.value)) {
        input.value = input.value.replace(/[^0-9]/g, '');
    }
}

function validateBillInput(input) {
    var regex = /^[0-9]*$/;
    if (!regex.test(input.value)) {
        input.value = input.value.replace(/[^0-9]/g, '');
    }
}

// Chặn sự kiên paste
function handlePaste(e) {
    e.preventDefault(); // Chặn sự kiện paste mặc định
}
// Hàm nhập số lượng
function validatQtyInput(input) {
    var regex = /^[1-9][0-9]*$/;
    if (!regex.test(input.value)) {
        input.value = input.value.replace(/[^1-9]/g, '');
    }
}

function validateQtyInput1(input) {
    var regex = /^[0-9]*\.?[0-9]*$/;
    if (!regex.test(input.value)) {
        input.value = input.value.replace(/[^\d.]/g, '');

        var parts = input.value.split('.');
        if (parts.length > 2) {
            input.value = parts[0] + '.' + parts.slice(1).join('');
        }
    }
}


var rowCount = $('#inputContainer tbody tr').length;


// Tạo INPUT SERI
createRowInput();
function createRowInput() {
    var addRow = $('.addRow');
    $(addRow).off('click').on('click', function () {
        var SLProduct, SLTr;
        SLProduct = parseInt($('.product_inventory').val());
        SLTr = $(addRow).closest('.modal-dialog').find('#table_SNS tbody tr').length;
        if (SLTr < SLProduct) {
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
            newDiv.setAttribute("name", "seri" + "[]");
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
            // modal_body[0].querySelector('.SNCount').textContent = checkboxCount;
        } else {
            var $tableBody = $(addRow).closest('.modal-dialog').find('#table_SNS tbody');
            var rowsToRemove = SLTr - SLProduct;
            $tableBody.find('tr').slice(-rowsToRemove).remove();
            if (modal_body) {
                modal_body.querySelector('.SNCount').textContent = SLProduct;
            }
        }
    });
}


$('#addRowTable').off('click').on('click', function () {
    addRowTable();
    $('.listProductCode').hide();
    $('.listProductName').hide();
})

// Hàm xử lý paste cột từ file excel
function handlePaste(input) {
    var SLProduct = parseInt($(input).closest('.modal-dialog').find('.qty_product').text());
    var rowCount = $(input).attr('name').match(/\d+/)[0];
    var clipboardData = event.clipboardData || window.clipboardData;
    var pastedData = clipboardData.getData('Text');
    var rows = pastedData.trim().split('\n');

    var table = document.querySelector('.div_value' + rowCount).querySelector('table');
    var currentInput = 2;
    if (rows.length > 1) {
        for (var i = 0; i < rows.length; i++) {
            var rowData = rows[i].trim();
            var SLTR = $(input).closest('.modal-dialog').find('#table_SNS tbody tr').length;
            if (rowData === '') {
                continue;
            }
            if (SLTR <= SLProduct) {
                var newRow = table.insertRow($(input).closest('tr').index() + currentInput);
                var cell1 = newRow.insertCell(0);
                var cell2 = newRow.insertCell(1);
                var cell3 = newRow.insertCell(2);
                var cell4 = newRow.insertCell(3);

                // Tạo checkbox
                var checkbox = document.createElement("input");
                checkbox.setAttribute("type", "checkbox");
                var checkboxes = document.querySelectorAll('.div_value' + rowCount +
                    ' table tbody input[type="checkbox"]');
                var checkboxCount = checkboxes.length;
                checkbox.setAttribute("id", "checkbox_" + checkboxCount);

                // Tạo span stt
                var stt = document.createElement("span");
                stt.innerHTML = checkboxCount;

                // Tạo input
                var newDiv = document.createElement('input');
                newDiv.setAttribute("type", "text");
                newDiv.setAttribute("class", "form-control w-25");
                newDiv.setAttribute("name", "product_SN" + rowCount + "[]");
                newDiv.setAttribute("onpaste", "handlePaste(this)");
                newDiv.value = rows[i].trim();

                // Tạo svg delete
                cell4.setAttribute('class', 'deleteRow1');
                cell4.innerHTML =
                    '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M14.0606 6.66675C13.6589 6.66675 13.3333 6.99236 13.3333 7.39402C13.3333 7.79568 13.6589 8.12129 14.0606 8.12129H17.9394C18.341 8.12129 18.6667 7.79568 18.6667 7.39402C18.6667 6.99236 18.341 6.66675 17.9394 6.66675H14.0606ZM8 10.3031C8 9.90143 8.32561 9.57582 8.72727 9.57582H10.1818H21.8182H23.2727C23.6744 9.57582 24 9.90143 24 10.3031C24 10.7048 23.6744 11.0304 23.2727 11.0304H22.5455V22.6667C22.5455 24.2819 21.2158 25.5758 19.6179 25.5758H12.3452C11.9637 25.5755 11.5854 25.4997 11.2333 25.3528C10.8812 25.2059 10.5617 24.9908 10.2931 24.7199C10.0244 24.449 9.81206 24.1276 9.66816 23.7743C9.52463 23.4219 9.45204 23.0447 9.45455 22.6642V11.0304H8.72727C8.32561 11.0304 8 10.7048 8 10.3031ZM10.9091 22.6723V11.0304H21.0909V22.6667C21.0909 23.4623 20.4288 24.1213 19.6179 24.1213H12.3458C12.1562 24.1211 11.9684 24.0834 11.7934 24.0104C11.6183 23.9374 11.4595 23.8304 11.3259 23.6958C11.1924 23.5611 11.0868 23.4013 11.0153 23.2257C10.9437 23.05 10.9076 22.8619 10.9091 22.6723ZM17.9394 13.4546C18.3411 13.4546 18.6667 13.7802 18.6667 14.1819V20.9698C18.6667 21.3714 18.3411 21.6971 17.9394 21.6971C17.5377 21.6971 17.2121 21.3714 17.2121 20.9698V14.1819C17.2121 13.7802 17.5377 13.4546 17.9394 13.4546ZM14.7879 14.1819C14.7879 13.7802 14.4623 13.4546 14.0606 13.4546C13.6589 13.4546 13.3333 13.7802 13.3333 14.1819V20.9698C13.3333 21.3714 13.6589 21.6971 14.0606 21.6971C14.4623 21.6971 14.7879 21.3714 14.7879 20.9698V14.1819Z" fill="#555555"/></svg>';

                // Thêm các đối tượng vào table
                cell1.append(checkbox);
                cell2.appendChild(stt);
                cell3.append(newDiv);
                currentInput++;
            }
        }

        var parentTable = $(input).closest('table');
        $(input).closest('.modal-dialog').find('.SNCount').text(SLTR);
        $(input).parent().parent().remove();
        var remainingRows = parentTable.find('tbody tr');
        remainingRows.each(function (index) {
            $(this).find('td').eq(1).text(index + 1);
        });
    }
}

var status_form = 0;
$('.change_colum').off('click').on('click', function () {
    if (status_form == 0) {
        $(this).text('Tối giản');
        $('.price_export').attr('readonly', false);
        // Xóa dữ liệu trường hệ số nhân, giá nhập
        $('.product_ratio').val('')
        $('.price_import').val('')
        // Xóa required
        $('#inputcontent tbody .product_ratio').removeAttr('required');
        $('#inputcontent tbody .price_import').removeAttr('required');

        $('.price-import').hide();
        $('.product-ratio').hide();
        $('.product_ratio').hide()
        $('.price_import').hide();
        status_form = 1;
    } else {
        $(this).text('Đầy đủ');
        $('.price_export').attr('readonly', true);
        // Xóa dữ liệu trương đơn giá
        $('.price_export').val('')
        // Thêm required
        $('#inputcontent tbody .product_ratio').attr('required', true);
        $('#inputcontent tbody .price_import').attr('required', true);
        $('.price-import').show();
        $('.product-ratio').show();
        $('.product_ratio').show()
        $('.price_import').show();
        status_form = 0;
    }
});

function checkAddForm() {
    if (status_form != 1) {
        $('.price_export').attr('readonly', true);
    } else {
        $('.price_export').attr('readonly', false);
        $('.product-ratio').hide()
        $('.price-import').hide()
    }
}


function addRowTable() {
    var tr = '<tr class="bg-white">' +
        '<td class="border border-left-0 border-top-0 border-bottom-0">' +
        '<input type="hidden" name="listProduct[]" value="0">' +
        '<div class="d-flex w-100 justify-content-between align-items-center position-relative">' +
        '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"> ' +
        '<path fill-rule="evenodd" clip-rule="evenodd" d="M9 3C7.89543 3 7 3.89543 7 5C7 6.10457 7.89543 7 9 7C10.1046 7 11 6.10457 11 5C11 3.89543 10.1046 3 9 3Z" fill="#42526E"></path>' +
        '<path fill-rule="evenodd" clip-rule="evenodd" d="M9 10C7.89543 10 7 10.8954 7 12C7 13.1046 7.89543 14 9 14C10.1046 14 11 13.1046 11 12C11 10.8954 10.1046 10 9 10Z" fill="#42526E"></path> ' +
        '<path fill-rule="evenodd" clip-rule="evenodd" d="M9 17C7.89543 17 7 17.8954 7 19C7 20.1046 7.89543 21 9 21C10.1046 21 11 20.1046 11 19C11 17.8954 10.1046 17 9 17Z" fill="#42526E"></path>' +
        '<path fill-rule="evenodd" clip-rule="evenodd" d="M15 3C13.8954 3 13 3.89543 13 5C13 6.10457 13.8954 7 15 7C16.1046 7 17 6.10457 17 5C17 3.89543 16.1046 3 15 3Z" fill="#42526E"></path>' +
        '<path fill-rule="evenodd" clip-rule="evenodd" d="M15 10C13.8954 10 13 10.8954 13 12C13 13.1046 13.8954 14 15 14C16.1046 14 17 13.1046 17 12C17 10.8954 16.1046 10 15 10Z" fill="#42526E"></path> ' +
        '<path fill-rule="evenodd" clip-rule="evenodd" d="M15 17C13.8954 17 13 17.8954 13 19C13 20.1046 13.8954 21 15 21C16.1046 21 17 20.1046 17 19C17 17.8954 16.1046 17 15 17Z" fill="#42526E"></path>' +
        '</svg>' +
        '<input type="checkbox">' +
        '<input type="text" id="searchProduct" class="border-0 px-3 py-2 w-75 searchProduct" name="product_code[]" autocomplete="off">' +
        '<ul id="listProductCode" class="listProductCode bg-white position-absolute w-100 rounded shadow p-0 scroll-data" style="z-index: 99; left: 24%; top: 75%;"> ' +
        '</ul>' +
        '</div>' +
        '</td>' +
        '<td class="border border-top-0 border-bottom-0 position-relative"> ' +
        '<input required type="text" id="searchProductName" class="searchProductName border-0 px-3 py-2 w-100" name="product_name[]">' +
        '<ul id="listProductName" class="listProductName bg-white position-absolute w-100 rounded shadow p-0 scroll-data" style="z-index: 99; left: 1%; top: 74%;"> ' +
        '</ul>' +
        '</td>' +
        '<td class="border border-top-0 border-bottom-0">' +
        '<input type="text" required class="border-0 px-3 py-2 w-100 product_unit" name="product_unit[]">' +
        '</td>' +
        '<td class="border border-top-0 border-bottom-0">' +
        '<input type="text" required oninput="validateQtyInput1(this)" class="border-0 px-3 py-2 w-100 quantity-input" name="product_qty[]">' +
        '</td>' +
        '<td class="border border-top-0 border-bottom-0">' +
        '<input type="text" required class="border-0 px-3 py-2 w-100 price_export" name="price_export[]">' +
        '</td>' +
        '<td class="border border-top-0 border-bottom-0">' +
        '<select class="product_tax" name="product_tax[]"> ' +
        '<option value="0">0%</option>' +
        '<option value="8">8%</option>' +
        '<option value="10">10%</option>' +
        '<option value="99">NOVAT</option>' +
        '</select>' +
        '</td>' +
        '<input type="hidden" class="product_tax1">' +
        '<td class="border border-top-0 border-bottom-0">' +
        '<input type="text" class="border-0 px-3 py-2 w-100 total_price" readonly name="total_price[]">' +
        '</td>' +
        '<td class="border border-bottom-0 p-0 bg-secondary"> </td>' +
        '<td class="border border-top-0 border-bottom-0 product-ratio">' +
        '<input type="text" required class="border-0 px-3 py-2 w-100 product_ratio" name="product_ratio[]">' +
        '</td>' +
        '<td class="border border-top-0 border-bottom-0 price-import">' +
        '<input type="text" required class="border-0 px-3 py-2 w-100 price_import" name="price_import[]">' +
        '</td>' +
        '<td class="border border-top-0 border-bottom-0">' +
        '<input type="text" class="border-0 px-3 py-2 w-100" name="product_note[]">' +
        '</td>' +
        '<td class="border border-top-0 deleteRow">' +
        '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M10.5454 5C10.2442 5 9.99999 5.24421 9.99999 5.54545C9.99999 5.8467 10.2442 6.09091 10.5454 6.09091H13.4545C13.7558 6.09091 14 5.8467 14 5.54545C14 5.24421 13.7558 5 13.4545 5H10.5454ZM6 7.72726C6 7.42601 6.24421 7.18181 6.54545 7.18181H7.63637H16.3636H17.4545C17.7558 7.18181 18 7.42601 18 7.72726C18 8.02851 17.7558 8.27272 17.4545 8.27272H16.9091V17C16.9091 18.2113 15.9118 19.1818 14.7135 19.1818H9.25891C8.97278 19.1816 8.68906 19.1247 8.42499 19.0145C8.16092 18.9044 7.92126 18.7431 7.71979 18.5399C7.51833 18.3367 7.35905 18.0957 7.25112 17.8307C7.14347 17.5664 7.08903 17.2834 7.09091 16.9981V8.27272H6.54545C6.24421 8.27272 6 8.02851 6 7.72726ZM8.18182 17.0041V8.27272H15.8182V17C15.8182 17.5966 15.3216 18.0909 14.7135 18.0909H9.25938C9.11713 18.0908 8.97632 18.0625 8.84503 18.0077C8.71375 17.953 8.5946 17.8728 8.49444 17.7718C8.39429 17.6707 8.3151 17.5509 8.26144 17.4192C8.20779 17.2874 8.18074 17.1464 8.18182 17.0041ZM13.4545 10.0909C13.7558 10.0909 14 10.3351 14 10.6364V15.7273C14 16.0285 13.7558 16.2727 13.4545 16.2727C13.1533 16.2727 12.9091 16.0285 12.9091 15.7273V10.6364C12.9091 10.3351 13.1533 10.0909 13.4545 10.0909ZM11.0909 10.6364C11.0909 10.3351 10.8467 10.0909 10.5454 10.0909C10.2442 10.0909 9.99999 10.3351 9.99999 10.6364V15.7273C9.99999 16.0285 10.2442 16.2727 10.5454 16.2727C10.8467 16.2727 11.0909 16.0285 11.0909 15.7273V10.6364Z" fill="#42526E"></path></svg>' +
        '</td>' +
        '</tr>';
    $('#inputcontent tbody').append(tr)
    checkAddForm()
    getProduct('searchProductName')
    showListProductCode()
    showListProductName()
    searchProductCode()
    searchProductName()
    deleteRow()
    checkInput()
}

function deleteRow() {
    $('.deleteRow').off('click').on('click', function () {
        $(this).closest('tr').remove();
    })
}

searchProductCode()
searchProductName()
deleteRow()
showListProductCode()
showListProductName()



function checkDuplicateRows() {
    var values = [];
    var hasDuplicate = false;
    $('#inputcontent tbody tr').each(function () {
        var productValue = $(this).find('.searchProduct').val().trim()
        var productNameValue = $(this).find('.searchProductName').val().trim()

        var combinedValue = productValue + productNameValue;

        if (values.includes(combinedValue)) {
            hasDuplicate = true;
            emptyData($(this), 'searchProductName', 'product_unit', 'price_export', 'product_tax', 'total_price', 'product_ratio', 'price_import')
            return false;
        } else {
            values.push(combinedValue);
        }
    })
    return hasDuplicate;
}



function checkInput() {
    $('.searchProductName').on('input', function () {
        checkDuplicateRows()
    })
}

function emptyData(position, name, unit, price_export, tax, total_price, ratio, price_import) {
    $(position).find('.' + name).val('');
    $(position).find('.' + unit).val('');
    $(position).find('.' + price_export).val('');
    $(position).find('.' + tax).val(0);
    $(position).find('.' + total_price).val('');
    $(position).find('.' + ratio).val('');
    $(position).find('.' + price_import).val('');
}






// EDIT
updateTaxAmount()
calculateTotalAmount()
calculateTotalTax()
calculateGrandTotal()

function updateTaxAmount() {
    $('#inputcontent tbody tr').each(function(){
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
