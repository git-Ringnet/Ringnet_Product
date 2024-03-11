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

$(document).on("change", ".list_products", function (e) {
    if (checkAllValuesEntered()) {
        checkDuplicateRows();
    }
});

// Hàm lấy dữ liệu khi người dùng chọn sản phẩm con
function setValueOfInput(e) {
    var selectedProductName = $(e).text();
    var row = $(e).closest("tr");
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
$("#listProject").hide();
$("#listRepresent").hide();
$("#listPriceEffect").hide();
$("#listTermsPay").hide();
function showForm(id, list) {
    $(id).on("click", function () {
        $(list).show();
    });
}
showForm("#inputProject", "#listProject");
showForm("#myInput", "#myUL");
showForm("#represent", "#listRepresent");
showForm("#price_effect", "#listPriceEffect");
showForm("#terms_pay", "#listTermsPay");
// $("#inputProject").on("click", function () {
//     $("#listProject").show();
// });
// $("#myInput").on("click", function () {
//     $("#myUL").show();
// });

function showListProductCode() {
    $("#inputcontent tbody").on("click", ".searchProduct", function () {
        $(this).closest("tr").find("#listProductCode").show();
    });
}

function showListProductName() {
    $("#inputcontent tbody").on("click", ".searchProductName", function () {
        $(this).closest("tr").find("#listProductName").show();
    });
}

//ẩn danh sách Mã sản phẩm khi clich ra ngoài
$(document).click(function (event) {
    if ($(event.target).closest(".searchProduct").length == 0) {
        $(".listProductCode").hide();
    }
    if ($(event.target).closest(".searchProductName").length == 0) {
        $(".listProductName").hide();
    }
    if ($(event.target).closest("#inputProject").length == 0) {
        $("#listProject").hide();
    }
});

//ẩn danh sách khách hàng
$(document).click(function (event) {
    if (
        !$(event.target).closest("#myInput").length &&
        !$(event.target).closest("#provideFilter").length
    ) {
        $("#myUL").hide();
        $("#listReceive").hide();
    }
});

// Tìm kiếm thông tin nhà cung cấp
// $(document).ready(function () {
//     $("#myInput").on("keyup", function () {
//         var value = $(this).val().toUpperCase();
//         $("#myUL li").each(function () {
//             var text = $(this).find("a").text().toUpperCase();
//             $(this).toggle(text.indexOf(value) > -1);
//         });
//     });
// });
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
        input.value = input.value.replace(/[^0-9]/g, "");
    }
}

function validateBillInput(input) {
    var regex = /^[0-9]*$/;
    if (!regex.test(input.value)) {
        input.value = input.value.replace(/[^0-9]/g, "");
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
        input.value = input.value.replace(/[^1-9]/g, "");
    }
}

function validateQtyInput1(input) {
    var regex = /^[0-9]*\.?[0-9]*$/;
    if (!regex.test(input.value)) {
        input.value = input.value.replace(/[^\d.]/g, "");

        var parts = input.value.split(".");
        if (parts.length > 2) {
            input.value = parts[0] + "." + parts.slice(1).join("");
        }
    }
}

var rowCount = $("#inputContainer tbody tr").length + 1;

// // Tạo INPUT SERI
// createRowInput('seri');
// function createRowInput(name) {
//     var addRow = $('.addRow');
//     for (let i = 0; i <= addRow.length; i++) {
//         $(addRow[i]).off('click').on('click', function () {
//             var modal_body = $(this).closest('.modal-content').find('.modal-body');
//             var newtr = document.createElement('tr');
//             var newtd1 = document.createElement('td');
//             var newtd2 = document.createElement('td');
//             var newtd3 = document.createElement('td');
//             var newtd4 = document.createElement('td');
//             var newDiv = document.createElement("input");
//             var checkbox = document.createElement("input");
//             var stt = document.createElement("span");
//             var checkboxes = modal_body[0].querySelectorAll('input[type="checkbox"]');
//             var checkboxCount = checkboxes.length;
//             checkbox.setAttribute("type", "checkbox");
//             newtd1.append(checkbox);
//             newDiv.setAttribute("type", "text");
//             newDiv.setAttribute("class", "form-control w-25");
//             newDiv.setAttribute("name", name + i + "[]");
//             newtd3.append(newDiv);
//             newtd4.setAttribute('class', 'deleteRow1');
//             newtd4.innerHTML =
//                 '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M14.0606 6.66675C13.6589 6.66675 13.3333 6.99236 13.3333 7.39402C13.3333 7.79568 13.6589 8.12129 14.0606 8.12129H17.9394C18.341 8.12129 18.6667 7.79568 18.6667 7.39402C18.6667 6.99236 18.341 6.66675 17.9394 6.66675H14.0606ZM8 10.3031C8 9.90143 8.32561 9.57582 8.72727 9.57582H10.1818H21.8182H23.2727C23.6744 9.57582 24 9.90143 24 10.3031C24 10.7048 23.6744 11.0304 23.2727 11.0304H22.5455V22.6667C22.5455 24.2819 21.2158 25.5758 19.6179 25.5758H12.3452C11.9637 25.5755 11.5854 25.4997 11.2333 25.3528C10.8812 25.2059 10.5617 24.9908 10.2931 24.7199C10.0244 24.449 9.81206 24.1276 9.66816 23.7743C9.52463 23.4219 9.45204 23.0447 9.45455 22.6642V11.0304H8.72727C8.32561 11.0304 8 10.7048 8 10.3031ZM10.9091 22.6723V11.0304H21.0909V22.6667C21.0909 23.4623 20.4288 24.1213 19.6179 24.1213H12.3458C12.1562 24.1211 11.9684 24.0834 11.7934 24.0104C11.6183 23.9374 11.4595 23.8304 11.3259 23.6958C11.1924 23.5611 11.0868 23.4013 11.0153 23.2257C10.9437 23.05 10.9076 22.8619 10.9091 22.6723ZM17.9394 13.4546C18.3411 13.4546 18.6667 13.7802 18.6667 14.1819V20.9698C18.6667 21.3714 18.3411 21.6971 17.9394 21.6971C17.5377 21.6971 17.2121 21.3714 17.2121 20.9698V14.1819C17.2121 13.7802 17.5377 13.4546 17.9394 13.4546ZM14.7879 14.1819C14.7879 13.7802 14.4623 13.4546 14.0606 13.4546C13.6589 13.4546 13.3333 13.7802 13.3333 14.1819V20.9698C13.3333 21.3714 13.6589 21.6971 14.0606 21.6971C14.4623 21.6971 14.7879 21.3714 14.7879 20.9698V14.1819Z" fill="#555555"/></svg>';
//             newtd2.appendChild(stt);
//             newtr.append(newtd1);
//             newtr.append(newtd2);
//             newtr.append(newtd3);
//             newtr.append(newtd4);
//             modal_body[0].querySelector('#table_SNS tbody').appendChild(newtr);
//             stt.innerHTML = checkboxCount;
//             checkbox.setAttribute("id", "checkbox_" + checkboxCount);
//         })
//     }
// }

$("#addRowTable")
    .off("click")
    .on("click", function () {
        addRowTable(1);
        $(".listProductCode").hide();
        $(".listProductName").hide();
    });

// Hàm xử lý paste cột từ file excel
function handlePaste(input) {
    var SLProduct = parseInt(
        $(input).closest(".modal-dialog").find(".qty_product").text()
    );
    var rowCount = $(input).attr("name").match(/\d+/)[0];
    var clipboardData = event.clipboardData || window.clipboardData;
    var pastedData = clipboardData.getData("Text");
    var rows = pastedData.trim().split("\n");

    var table = document
        .querySelector(".div_value" + rowCount)
        .querySelector("table");
    var currentInput = 2;
    if (rows.length > 1) {
        for (var i = 0; i < rows.length; i++) {
            var rowData = rows[i].trim();
            var SLTR = $(input)
                .closest(".modal-dialog")
                .find("#table_SNS tbody tr").length;
            if (rowData === "") {
                continue;
            }
            if (SLTR <= SLProduct) {
                var newRow = table.insertRow(
                    $(input).closest("tr").index() + currentInput
                );
                var cell1 = newRow.insertCell(0);
                var cell2 = newRow.insertCell(1);
                var cell3 = newRow.insertCell(2);
                var cell4 = newRow.insertCell(3);

                // Tạo checkbox
                var checkbox = document.createElement("input");
                checkbox.setAttribute("type", "checkbox");
                var checkboxes = document.querySelectorAll(
                    ".div_value" +
                    rowCount +
                    ' table tbody input[type="checkbox"]'
                );
                var checkboxCount = checkboxes.length;
                checkbox.setAttribute("id", "checkbox_" + checkboxCount);

                // Tạo span stt
                var stt = document.createElement("span");
                stt.innerHTML = checkboxCount;

                // Tạo input
                var newDiv = document.createElement("input");
                newDiv.setAttribute("type", "text");
                newDiv.setAttribute("class", "form-control w-100");
                newDiv.setAttribute("name", "product_SN" + rowCount + "[]");
                newDiv.setAttribute("onpaste", "handlePaste(this)");
                newDiv.value = rows[i].trim();

                // Tạo svg delete
                cell4.setAttribute("class", "deleteRow1");
                cell4.innerHTML =
                    '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M14.0606 6.66675C13.6589 6.66675 13.3333 6.99236 13.3333 7.39402C13.3333 7.79568 13.6589 8.12129 14.0606 8.12129H17.9394C18.341 8.12129 18.6667 7.79568 18.6667 7.39402C18.6667 6.99236 18.341 6.66675 17.9394 6.66675H14.0606ZM8 10.3031C8 9.90143 8.32561 9.57582 8.72727 9.57582H10.1818H21.8182H23.2727C23.6744 9.57582 24 9.90143 24 10.3031C24 10.7048 23.6744 11.0304 23.2727 11.0304H22.5455V22.6667C22.5455 24.2819 21.2158 25.5758 19.6179 25.5758H12.3452C11.9637 25.5755 11.5854 25.4997 11.2333 25.3528C10.8812 25.2059 10.5617 24.9908 10.2931 24.7199C10.0244 24.449 9.81206 24.1276 9.66816 23.7743C9.52463 23.4219 9.45204 23.0447 9.45455 22.6642V11.0304H8.72727C8.32561 11.0304 8 10.7048 8 10.3031ZM10.9091 22.6723V11.0304H21.0909V22.6667C21.0909 23.4623 20.4288 24.1213 19.6179 24.1213H12.3458C12.1562 24.1211 11.9684 24.0834 11.7934 24.0104C11.6183 23.9374 11.4595 23.8304 11.3259 23.6958C11.1924 23.5611 11.0868 23.4013 11.0153 23.2257C10.9437 23.05 10.9076 22.8619 10.9091 22.6723ZM17.9394 13.4546C18.3411 13.4546 18.6667 13.7802 18.6667 14.1819V20.9698C18.6667 21.3714 18.3411 21.6971 17.9394 21.6971C17.5377 21.6971 17.2121 21.3714 17.2121 20.9698V14.1819C17.2121 13.7802 17.5377 13.4546 17.9394 13.4546ZM14.7879 14.1819C14.7879 13.7802 14.4623 13.4546 14.0606 13.4546C13.6589 13.4546 13.3333 13.7802 13.3333 14.1819V20.9698C13.3333 21.3714 13.6589 21.6971 14.0606 21.6971C14.4623 21.6971 14.7879 21.3714 14.7879 20.9698V14.1819Z" fill="#555555"/></svg>';

                // Thêm các đối tượng vào table
                cell1.append(checkbox);
                cell2.appendChild(stt);
                cell3.append(newDiv);
                currentInput++;
            }
        }

        var parentTable = $(input).closest("table");
        $(input).closest(".modal-dialog").find(".SNCount").text(SLTR);
        $(input).parent().parent().remove();
        var remainingRows = parentTable.find("tbody tr");
        remainingRows.each(function (index) {
            $(this)
                .find("td")
                .eq(1)
                .text(index + 1);
        });
    }
}

var status_form = 0;

function addRowRepesent() {
    var tr = `
        <tr class="bg-white" id="dynamic-row-1">
            <input type="hidden" value="0" name="">
            <td class='border border-top-0  border-left-0 padding-left35'>
                <input type='text' autocomplete='off' required name='represent_name[]'
                    class='text-13-black border-0 pl-0 pr-2 py-1 w-100' >
            </td>
            <td class='border border-top-0  border-left-0 padding-left35'>
                <input type='text' autocomplete='off' required name='represent_phone[]'
                    class='text-13-black border-0 pl-0 pr-2 py-1 w-100' >
            </td>
            <td class='border border-top-0  border-left-0 padding-left35'>
                <input type='email' autocomplete='off' required name='represent_email[]'
                    class='text-13-black border-0 pl-0 pr-2 py-1 w-100' >
            </td>
            <td class='border border-top-0  border-left-0 padding-left35'>
                <input type='text' autocomplete='off' required name='represent_address[]'
                class='text-13-black border-0 pl-0 pr-2 py-1 w-100' >
            </td>
            <td class="border border-top-0 border-left-0 text-center deleteRepesent">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M10.5454 5C10.2442 5 9.99999 5.24421 9.99999 5.54545C9.99999 5.8467 10.2442 6.09091 10.5454 6.09091H13.4545C13.7558 6.09091 14 5.8467 14 5.54545C14 5.24421 13.7558 5 13.4545 5H10.5454ZM6 7.72726C6 7.42601 6.24421 7.18181 6.54545 7.18181H7.63637H16.3636H17.4545C17.7558 7.18181 18 7.42601 18 7.72726C18 8.02851 17.7558 8.27272 17.4545 8.27272H16.9091V17C16.9091 18.2113 15.9118 19.1818 14.7135 19.1818H9.25891C8.97278 19.1816 8.68906 19.1247 8.42499 19.0145C8.16092 18.9044 7.92126 18.7431 7.71979 18.5399C7.51833 18.3367 7.35905 18.0957 7.25112 17.8307C7.14347 17.5664 7.08903 17.2834 7.09091 16.9981V8.27272H6.54545C6.24421 8.27272 6 8.02851 6 7.72726ZM8.18182 17.0041V8.27272H15.8182V17C15.8182 17.5966 15.3216 18.0909 14.7135 18.0909H9.25938C9.11713 18.0908 8.97632 18.0625 8.84503 18.0077C8.71375 17.953 8.5946 17.8728 8.49444 17.7718C8.39429 17.6707 8.3151 17.5509 8.26144 17.4192C8.20779 17.2874 8.18074 17.1464 8.18182 17.0041ZM13.4545 10.0909C13.7558 10.0909 14 10.3351 14 10.6364V15.7273C14 16.0285 13.7558 16.2727 13.4545 16.2727C13.1533 16.2727 12.9091 16.0285 12.9091 15.7273V10.6364C12.9091 10.3351 13.1533 10.0909 13.4545 10.0909ZM11.0909 10.6364C11.0909 10.3351 10.8467 10.0909 10.5454 10.0909C10.2442 10.0909 9.99999 10.3351 9.99999 10.6364V15.7273C9.99999 16.0285 10.2442 16.2727 10.5454 16.2727C10.8467 16.2727 11.0909 16.0285 11.0909 15.7273V10.6364Z" fill="#42526E"></path></svg>            
            </td>
        </tr>
    `;
    $("#listrepesent").append(tr);
    deleteRowRepesent();
}
$("#addRowRepesent").on("click", function () {
    addRowRepesent();
});

function addRowTable(status) {
    var tr =
        '<tr class="bg-white" style="height:80px;">' +
        '<td class="border-right p-2 text-13-black align-top p-2">' +
        '<input type="hidden" name="listProduct[]" value="0">' +
        "<span class='mx-2'>" +
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
        '<input type="checkbox" class="cb-element checkall-btn ml-1 mr-1">' +
        '<input type="text" id="searchProduct" class="border-0 pl-1 pr-2 py-1 w-50 searchProduct" name="product_code[]" autocomplete="off" ' +
        (status == 2 ? "readonly" : "") +
        " >" +
        '<ul id="listProductCode" class="listProductCode bg-white position-absolute w-100 rounded shadow p-0 scroll-data" style="z-index: 99; left: 24%; top: 60%;"> ' +
        "</ul>" +
        "</td>" +
        '<td class="border border-bottom-0 position-relative text-13-black align-top p-2"> ' +
        '<input autocomplete="off" required type="text" id="searchProductName" class="searchProductName border-0 px-2 py-1 w-100" name="product_name[]">' +
        '<ul id="listProductName" class="listProductName bg-white position-absolute w-100 rounded shadow p-0 scroll-data" style="z-index: 99; left: 1%; top: 60%;"> ' +
        "</ul>" +
        "</td>" +
        '<td class="border border-bottom-0 text-13-black align-top p-2">' +
        '<input type="text" required class="border-0 px-2 py-1 w-100 product_unit" name="product_unit[]" ' +
        (status == 2 ? "readonly" : "") +
        " >" +
        "</td>" +
        '<td class="border border-bottom-0 text-13-black align-top p-2">' +
        '<div class="d-flex"><input type="text" required oninput="validateQtyInput1(this)" class="border-0 px-2 py-1 w-100 quantity-input" name="product_qty[]">';
    if (status == 2) {
        tr +=
            '<button type="button" class="btn btn-primary" data-toggle="modal" ' +
            'data-target="#exampleModal' +
            rowCount +
            '" ' +
            'style="background:transparent; border:none;"> ' +
            '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" ' +
            'viewBox="0 0 32 32" fill="none"> ' +
            '<rect width="32" height="32" rx="4" fill="white"> ' +
            "</rect> " +
            '<path fill-rule="evenodd" clip-rule="evenodd" ' +
            'd="M11.9062 10.643C11.9062 10.2092 12.258 9.85742 12.6919 9.85742H24.2189C24.6528 9.85742 25.0045 10.2092 25.0045 10.643C25.0045 11.0769 24.6528 11.4286 24.2189 11.4286H12.6919C12.258 11.4286 11.9062 11.0769 11.9062 10.643Z" ' +
            'fill="#0095F6"></path> ' +
            '<path fill-rule="evenodd" clip-rule="evenodd" ' +
            'd="M11.9062 16.4707C11.9062 16.0368 12.258 15.6851 12.6919 15.6851H24.2189C24.6528 15.6851 25.0045 16.0368 25.0045 16.4707C25.0045 16.9045 24.6528 17.2563 24.2189 17.2563H12.6919C12.258 17.2563 11.9062 16.9045 11.9062 16.4707Z" ' +
            'fill="#0095F6"></path> ' +
            '<path fill-rule="evenodd" clip-rule="evenodd" ' +
            'd="M11.9062 22.2978C11.9062 21.8639 12.258 21.5122 12.6919 21.5122H24.2189C24.6528 21.5122 25.0045 21.8639 25.0045 22.2978C25.0045 22.7317 24.6528 23.0834 24.2189 23.0834H12.6919C12.258 23.0834 11.9062 22.7317 11.9062 22.2978Z" ' +
            'fill="#0095F6"></path> ' +
            '<path fill-rule="evenodd" clip-rule="evenodd" ' +
            'd="M6.6665 10.6431C6.6665 9.91981 7.25282 9.3335 7.97607 9.3335C8.69932 9.3335 9.28563 9.91981 9.28563 10.6431C9.28563 11.3663 8.69932 11.9526 7.97607 11.9526C7.25282 11.9526 6.6665 11.3663 6.6665 10.6431ZM6.6665 16.4705C6.6665 15.7473 7.25282 15.161 7.97607 15.161C8.69932 15.161 9.28563 15.7473 9.28563 16.4705C9.28563 17.1938 8.69932 17.7801 7.97607 17.7801C7.25282 17.7801 6.6665 17.1938 6.6665 16.4705ZM7.97607 20.9884C7.25282 20.9884 6.6665 21.5747 6.6665 22.298C6.6665 23.0212 7.25282 23.6075 7.97607 23.6075C8.69932 23.6075 9.28563 23.0212 9.28563 22.298C9.28563 21.5747 8.69932 20.9884 7.97607 20.9884Z"' +
            'fill="#0095F6"></path>' +
            "</svg>" +
            "</button>";
    }
    tr +=
        "</div>" +
        "<div class='mt-3 text-13-blue inventory'>Tồn kho: <span class='pl-1 soTonKho' id='soTonKho'>0</span></div>" +
        "</td>" +
        '<td class="border border-bottom-0 text-13-black align-top p-2">' +
        "<div>" +
        '<input type="text" required class="border-0 px-2 py-1 w-100 price_export" name="price_export[]">' +
        "</div>" +
        "<div class='mt-3 text-13-blue transaction' id='transaction' data-toggle='modal' data-target='#recentModal'>Giao dịch gần đây</div>" +
        "</td>" +
        '<td class="border border-bottom-0 text-13-black align-top p-2">';

    if (status == 2) {
        tr +=
            '<input type="text" class="border-0 px-2 py-1 w-100 product_tax" name="product_tax[]" readonly >';
    } else {
        tr +=
            '<select class="product_tax border-0 px-2 py-1 w-100 text-left" name="product_tax[]"> ' +
            '<option value="0">0%</option>' +
            '<option value="8">8%</option>' +
            '<option value="10">10%</option>' +
            '<option value="99">NOVAT</option>' +
            "</select>";
    }
    tr +=
        "</td>" +
        '<input type="hidden" class="product_tax1">' +
        '<td class="border border-bottom-0 text-13-black align-top p-2">' +
        '<input type="text" class="border-0 px-2 py-1 w-100 total_price" readonly name="total_price[]">' +
        "</td>" +
        '<td class="border border-bottom-0 text-13-black align-top p-2">' +
        '<input type="text" placeholder="Nhập ghi chú" class="border-0 px-2 py-1 w-100" name="product_note[]" ' +
        (status == 2 ? "readonly" : "") +
        " >" +
        "</td>" +
        '<td class="border deleteRow align-top p-2">' +
        '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" viewBox="0 0 16 15" fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M12.3687 6.09375C12.6448 6.09375 12.8687 6.30362 12.8687 6.5625C12.8687 6.59865 12.8642 6.63468 12.8554 6.66986L11.3628 12.617C11.1502 13.4639 10.3441 14.0625 9.41597 14.0625H6.58403C5.65593 14.0625 4.84977 13.4639 4.6372 12.617L3.14459 6.66986C3.08135 6.41786 3.24798 6.16551 3.51678 6.10621C3.55431 6.09793 3.59274 6.09375 3.6313 6.09375H12.3687ZM8.5 0.9375C9.88071 0.9375 11 1.98683 11 3.28125H13C13.5523 3.28125 14 3.70099 14 4.21875V4.6875C14 4.94638 13.7761 5.15625 13.5 5.15625H2.5C2.22386 5.15625 2 4.94638 2 4.6875V4.21875C2 3.70099 2.44772 3.28125 3 3.28125H5C5 1.98683 6.11929 0.9375 7.5 0.9375H8.5ZM8.5 2.34375H7.5C6.94772 2.34375 6.5 2.76349 6.5 3.28125H9.5C9.5 2.76349 9.05228 2.34375 8.5 2.34375Z" fill="#6B6F76"/></svg>' +
        "</td>" +
        "</tr>";
    $("#inputcontent tbody").append(tr);
    showListProductCode();
    showListProductName();
    searchProductName();
    deleteRow();
    checkInput();
    if (status == 2) {
        createModal(rowCount);
    }
    getProduct("searchProductName");
    rowCount++;
}

function createModal(stt) {
    var newModal =
        `
    <div class="modal fade" id="exampleModal` +
        stt +
        `" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thông tin Serial Number</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="table_SNS">
                    <thead>
                        <tr>
                            <td style="width:2%"><input type="checkbox"></td>
                            <th style="width:5%">STT</th>
                            <th style="width:100%">Serial number</th>
                            <th style="width:3%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>1</td>
                            <td><input class="form-control w-100" type="text" name="seri0[]"></td>
                            <td class="deleteRow1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M14.0606 6.66675C13.6589 6.66675 13.3333 6.99236 13.3333 7.39402C13.3333 7.79568 13.6589 8.12129 14.0606 8.12129H17.9394C18.341 8.12129 18.6667 7.79568 18.6667 7.39402C18.6667 6.99236 18.341 6.66675 17.9394 6.66675H14.0606ZM8 10.3031C8 9.90143 8.32561 9.57582 8.72727 9.57582H10.1818H21.8182H23.2727C23.6744 9.57582 24 9.90143 24 10.3031C24 10.7048 23.6744 11.0304 23.2727 11.0304H22.5455V22.6667C22.5455 24.2819 21.2158 25.5758 19.6179 25.5758H12.3452C11.9637 25.5755 11.5854 25.4997 11.2333 25.3528C10.8812 25.2059 10.5617 24.9908 10.2931 24.7199C10.0244 24.449 9.81206 24.1276 9.66816 23.7743C9.52463 23.4219 9.45204 23.0447 9.45455 22.6642V11.0304H8.72727C8.32561 11.0304 8 10.7048 8 10.3031ZM10.9091 22.6723V11.0304H21.0909V22.6667C21.0909 23.4623 20.4288 24.1213 19.6179 24.1213H12.3458C12.1562 24.1211 11.9684 24.0834 11.7934 24.0104C11.6183 23.9374 11.4595 23.8304 11.3259 23.6958C11.1924 23.5611 11.0868 23.4013 11.0153 23.2257C10.9437 23.05 10.9076 22.8619 10.9091 22.6723ZM17.9394 13.4546C18.3411 13.4546 18.6667 13.7802 18.6667 14.1819V20.9698C18.6667 21.3714 18.3411 21.6971 17.9394 21.6971C17.5377 21.6971 17.2121 21.3714 17.2121 20.9698V14.1819C17.2121 13.7802 17.5377 13.4546 17.9394 13.4546ZM14.7879 14.1819C14.7879 13.7802 14.4623 13.4546 14.0606 13.4546C13.6589 13.4546 13.3333 13.7802 13.3333 14.1819V20.9698C13.3333 21.3714 13.6589 21.6971 14.0606 21.6971C14.4623 21.6971 14.7879 21.3714 14.7879 20.9698V14.1819Z" fill="#555555"></path>
                            </svg>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="mt-4">
                    <button type="button" class="btn btn-primary addRow">Thêm dòng</button>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Save changes</button>
            </div>
        </div>
    </div>
    </div>`;
    $("#list_modal").append(newModal);
    createRowInput("seri");
    // <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
}

function deleteRow() {
    $('.deleteRow').off('click').on('click', function () {
        id = $(this).closest('tr').find('button').attr('data-target');
        $('#list_modal ' + id).remove();
        $(this).closest('tr').remove();
        updateTaxAmount()
        calculateTotalAmount()
        calculateTotalTax()
        calculateGrandTotal()
    })
}
deleteRowRepesent();
function deleteRowRepesent() {
    $(".deleteRepesent").on("click", function () {
        $(this).closest("tr").remove();
    });
}

searchProductName();
deleteRow();
showListProductCode();
showListProductName();

function checkDuplicateRows() {
    var values = [];
    var hasDuplicate = false;
    $("#inputcontent tbody tr").each(function () {
        var productValue = $(this).find(".searchProduct").val().trim();
        var productNameValue = $(this).find(".searchProductName").val().trim();

        var combinedValue = productValue + productNameValue;

        if (values.includes(combinedValue)) {
            hasDuplicate = true;
            emptyData(
                $(this),
                "searchProductName",
                "searchProduct",
                "product_unit",
                "price_export",
                "product_tax",
                "total_price",
                "product_ratio",
                "price_import"
            );
            return false;
        } else {
            values.push(combinedValue);
        }
    });
    return hasDuplicate;
}

function checkInput() {
    $(".searchProductName").on("input", function () {
        checkDuplicateRows();
    });
}

function emptyData(
    position,
    code,
    name,
    unit,
    price_export,
    tax,
    total_price,
    ratio,
    price_import
) {
    $(position)
        .find("." + name)
        .val("");
    $(position)
        .find("." + code)
        .val("");
    $(position)
        .find("." + unit)
        .val("");
    $(position)
        .find("." + price_export)
        .val("");
    $(position)
        .find("." + tax)
        .val(0);
    $(position)
        .find("." + total_price)
        .val("");
    $(position)
        .find("." + ratio)
        .val("");
    $(position)
        .find("." + price_import)
        .val("");
}
// function updateProductSN() {
//     $('#list_modal .modal-body').each(function (index) {
//         var productSN = $(this).find('input[name^="seri"]');
//         // var div_value2 = $(this).find('div[class^="div_value"]');
//         var idSN = $(this).find('input[name^="seri"]');
//         productSN.attr('name', 'seri' + index + '[]');
//         idSN.attr('name', 'seri' + index + '[]');
//     });
// }
