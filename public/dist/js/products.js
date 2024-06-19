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

function showListWarehouse() {
    $("#inputcontent tbody").on("click", ".searchWarehouse", function () {
        $(this).closest("tr").find(".listWarehouse").show();
    });
}
showListWarehouse()

function showListGuest() {
    $("#inputcontent tbody").on("click", ".search_guest", function () {
        $(this).closest("tr").find("#listGuest").show();
    })
}
showListGuest()

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
    if ($(event.target).closest(".searchWarehouse").length == 0) {
        $(".listWarehouse").hide();
    }
    if ($(event.target).closest(".search_guest").length == 0) {
        $("#listGuest").hide();
    }
    if ($(event.target).closest(".search_funds").length == 0) {
        $("#listFunds").hide();
    }
    if ($(event.target).closest(".search_content").length == 0) {
        $("#listContent").hide();
    }
    if ($(event.target).closest(".search_content").length == 0) {
        $("#listContent").hide();
    }
});

//ẩn danh sách khách hàng
$(document).click(function (event) {
    if (
        !$(event.target).closest("#myInput").length &&
        !$(event.target).closest("#provideFilter").length &&
        !$(event.target).closest("#myInput1").length &&
        !$(event.target).closest("#listGuest").length
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
        // console.log();
        addRowTable($(this).val());
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
                <input type='number' autocomplete='off' required name='represent_phone[]'
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
            <td class="border border-top-0 border-left-0 text-center deleteRepesent user_flow" data-type="NCC" data-des="Xóa người đại diện">
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
    count = $("#inputcontent tbody tr").length + 1;
    var tr =
        '<tr class="bg-white" style="height:80px;">' +
        '<td class="border-right p-2 text-13 align-top border-bottom border-top-0">' +
        '<input type="hidden" name="listProduct[]" value="0">';
    if (status != 3) {
        tr += "<span class='ml-1 mr-2'>" +
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
            '<input type="checkbox" class="cb-element checkall-btn ml-1 mr-1">';
    }
    tr +=
        '<input type="text" id="searchProduct" class="border-0 pl-1 pr-2 py-1 w-50 height-32 searchProduct" name="product_code[]" autocomplete="off" ' +
        (status == 2 ? "readonly" : "") +
        " >" +
        '<ul id="listProductCode" class="listProductCode bg-white position-absolute w-100 rounded shadow p-0 scroll-data" style="z-index: 99; left: 24%; top: 60%;"> ' +
        "</ul>" +
        "</td>" +
        '<td class="border-right p-2 text-13 align-top position-relative border-bottom border-top-0"> ' +
        '<input autocomplete="off" required type="text" id="searchProductName" class="searchProductName border-0 px-2 py-1 w-100 height-32" name="product_name[]">' +
        '<ul id="listProductName" class="listProductName bg-white position-absolute w-100 rounded shadow p-0 scroll-data" style="z-index: 99; left: 0%; top: 44%;"> ' +
        "</ul>" +
        "</td>" +
        '<td class="border-right p-2 text-13 align-top border-bottom border-top-0">' +
        '<input type="text" required class="border-0 px-2 py-1 w-100 product_unit height-32" name="product_unit[]" ' +
        (status == 2 ? "readonly" : "") +
        " >" +
        "</td>" +
        '<td class="border-right p-2 text-13 align-top border-bottom border-top-0">' +
        '<div class="d-flex"><input type="text" required oninput="validateQtyInput1(this)" class="border-0 px-2 py-1 w-100 quantity-input text-right height-32" name="product_qty[]">';
    if (status == 2) {
        tr +=
            '<button type="button" class="btn btn-primary" data-toggle="modal" ' +
            'data-target="#exampleModal' +
            count +
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
        "<div class='mt-3 text-13-blue inventory text-right'>Tồn kho: <span class='pl-1 soTonKho' id='soTonKho'>0</span></div>" +
        "</td>" +
        '<td class="border-right p-2 text-13 align-top border-bottom border-top-0">' +
        "<div>" +
        '<input type="text" required class="border-0 px-2 py-1 w-100 price_export text-right height-32" name="price_export[]">' +
        "</div>" +
        "<div class='mt-3 text-13-blue transaction text-right' id='transaction' data-toggle='modal' data-target='#recentModal'>Giao dịch gần đây</div>" +
        "</td>" +
        '<td class="border-right p-2 text-13 align-top border-bottom border-top-0">' +
        "<div>" +
        '<input type="text" class="border-0 px-2 py-1 w-100 text-right height-32 promotion" name="promotion[]">' +
        "</div>" +
        "<div class='mt-3 text-13-blue text-right'> " +
        "<select class='border-0 promotion-option' name='promotion-option[]'> <option value='1'>Nhập tiền </opion> <option value='2'>Nhập %</option> </select> " +
        "</div>" +
        "</td>" +
        '<td class="border-right p-2 text-13 align-top border-bottom border-top-0">';
    if (status == 2) {
        tr +=
            '<input type="text" class="border-0 px-2 py-1 w-100 product_tax" name="product_tax[]" readonly >';
    } else {
        tr +=
            '<select class="product_tax border-0 w-100 text-center height-32" name="product_tax[]"> ' +
            '<option value="0">0%</option>' +
            '<option value="8">8%</option>' +
            '<option value="10">10%</option>' +
            '<option value="99">NOVAT</option>' +
            "</select>";
    }
    // if (status == 3) {
    tr +=
        "</td>" +
        '<input type="hidden" class="product_tax1">' +
        '<td class="border-right p-2 text-13 align-top border-bottom border-top-0">' +
        '<input type="text" class="border-0 px-2 py-1 w-100 total_price text-right height-32" readonly name="total_price[]">' +
        "</td>" +
        '<td class="border-right note p-2 align-top border-bottom border-top-0 position-relative">' +
        '<input id="searchWarehouse" type="text" placeholder="Chọn kho" class="border-0 py-1 w-100 height-32 text-13-black searchWarehouse" name="warehouse[]" readonly autocomplete="off">' +
        '<div id="listWareH" class="bg-white position-absolute rounded shadow p-1 z-index-block" style="z-index: 99;">' +
        '<ul class="m-0 p-0 scroll-data listWarehouse" id="listWarehouse" style="display:none;">' +
        '<div class="p-1">' +
        '<div class="position-relative">' +
        '<input type="text" placeholder="Nhập kho hàng" class="pr-4 w-100 input-search bg-input-guest searchWarehouse" id="a">' +
        '<span id="search-icon" class="search-icon">' +
        '<i class="fas fa-search text-table" aria-hidden="true"></i>' +
        '</span>' +
        '</div>' +
        '</div>' +
        '</ul>' +
        '</div>' +
        '<input type="hidden" placeholder="Chọn kho" class="border-0 py-1 w-100 height-32 text-13-black warehouse_id" name="warehouse_id[]" >' +
        //'<ul id="listWarehouse" class="listWarehouse bg-white position-absolute w-100 rounded shadow p-0 scroll-data" style="z-index: 99; left: 0%; top: 44%;"> ' +
        //"</ul>" +
        "</td>";
    // }
    if (status == 3) {
        tr += "<td class='p-2 text-13 align-top text-center border-top-0 border-bottom border-right'> " +
            "<div style='margin-top: 6px;'> " +
            "<input onclick='getDataCheckbox(this)' type='checkbox' checked='' endable=''> " +
            "<input type='hidden' name='cbSeri[]' value='1'>" +
            "<a class='duongdan' data-toggle='modal' data-target='#exampleModal" + count + "' style='opacity:1'>" +
            "<div class='sn--modal mt-3'>" +
            "<span class='border-span--modal'>SN</span>" +
            "</div>" +
            "</a>" +
            "</div>" +
            "</td>" +
            "<td class='p-2 note text-13 align-top border-top-0 border-bottom border-right'> " +
            "<input type='text' name='product_guarantee[]' class='border-0 py-1 w-100 height-32' placeholder='Nhập bảo hành' value=''> " +
            "</td>";
    }
    tr +=
        '<td class="border-right note p-2 align-top border-bottom border-top-0">' +
        '<input type="text" placeholder="Nhập ghi chú" class="border-0 py-1 w-100 height-32 text-13-black" name="product_note[]" ' +
        (status == 2 ? "readonly" : "") +
        " >" +
        "</td>" +
        '<td class="deleteRow align-top p-2 user_flow border-top-0 border-bottom" data-type="DMH" data-des="Xóa sản phẩm">' +
        '<svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M13.1417 6.90625C13.4351 6.90625 13.673 7.1441 13.673 7.4375C13.673 7.47847 13.6682 7.5193 13.6589 7.55918L12.073 14.2992C11.8471 15.2591 10.9906 15.9375 10.0045 15.9375H6.99553C6.00943 15.9375 5.15288 15.2591 4.92702 14.2992L3.34113 7.55918C3.27393 7.27358 3.45098 6.98757 3.73658 6.92037C3.77645 6.91099 3.81729 6.90625 3.85826 6.90625H13.1417ZM9.03125 1.0625C10.4983 1.0625 11.6875 2.25175 11.6875 3.71875H13.8125C14.3993 3.71875 14.875 4.19445 14.875 4.78125V5.3125C14.875 5.6059 14.6371 5.84375 14.3438 5.84375H2.65625C2.36285 5.84375 2.125 5.6059 2.125 5.3125V4.78125C2.125 4.19445 2.6007 3.71875 3.1875 3.71875H5.3125C5.3125 2.25175 6.50175 1.0625 7.96875 1.0625H9.03125ZM9.03125 2.65625H7.96875C7.38195 2.65625 6.90625 3.13195 6.90625 3.71875H10.0938C10.0938 3.13195 9.61805 2.65625 9.03125 2.65625Z" fill="#6B6F76"></path></svg>' +
        "</td>" +
        "</tr>";
    $("#inputcontent tbody").append(tr);
    showListProductCode();
    // showListProductName();

    $(".listProductName").hide();
    $(".searchProductName").on("click", function (e) {
        e.stopPropagation();
        $(".listProductName").hide();

        var listProduct = $(this).closest("tr").find(".listProductName");
        listProduct.toggle();
    });
    $(document).on("click", function (e) {
        if (!$(e.target).is(".searchProductName")) {
            $(".listProductName").hide();
        }
    });

    searchProductName();
    deleteRow();
    if (status == 2) {
        createModal(rowCount);
    }
    if (status == 3) {
        createModal(count);
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
                <div>
                    <button type="button" class="btn-destroy btn-light mx-1" data-dismiss="modal" style="padding: 4px 8px;">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                viewBox="0 0 14 14" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7 14C10.866 14 14 10.866 14 7C14 3.13401 10.866 0 7 0C3.13401 0 0 3.13401 0 7C0 10.866 3.13401 14 7 14ZM5.03033 3.96967C4.73744 3.67678 4.26256 3.67678 3.96967 3.96967C3.67678 4.26256 3.67678 4.73744 3.96967 5.03033L5.93934 7L3.96967 8.96967C3.67678 9.26256 3.67678 9.73744 3.96967 10.0303C4.26256 10.3232 4.73744 10.3232 5.03033 10.0303L7 8.06066L8.96967 10.0303C9.26256 10.3232 9.73744 10.3232 10.0303 10.0303C10.3232 9.73744 10.3232 9.26256 10.0303 8.96967L8.06066 7L10.0303 5.03033C10.3232 4.73744 10.3232 4.26256 10.0303 3.96967C9.73744 3.67678 9.26256 3.67678 8.96967 3.96967L7 5.93934L5.03033 3.96967Z"
                                fill="#6D7075"></path>
                            </svg>
                        </span>
                        <span class="text-btnIner-primary ml-2">Hủy</span>
                    </button>
                    <button type="button" class="custom-btn" data-dismiss="modal" style="padding: 4px 8px;">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                viewBox="0 0 14 14" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7 14C10.866 14 14 10.866 14 7C14 3.13401 10.866 0 7 0C3.13401 0 0 3.13401 0 7C0 10.866 3.13401 14 7 14ZM10.7836 5.42901C11.0858 5.08709 11.0695 4.55006 10.7472 4.22952C10.4248 3.90897 9.9186 3.9263 9.6164 4.26821L6.14921 8.19122L4.3315 6.4773C4.00127 6.16593 3.49561 6.19748 3.20208 6.54777C2.90855 6.89806 2.93829 7.43445 3.26852 7.74581L5.28032 9.6427C5.82041 10.152 6.64463 10.1122 7.13886 9.553L10.7836 5.42901Z"
                                fill="white"></path>
                            </svg>
                        </span>
                     <span class="text-btnIner-primary ml-2">Xác nhận</span>
                    </button>
                </div>
            </div>
            <div class="modal-body">
                <table id="table_SNS">
                    <thead>
                        <tr>
                            <th style="width:15%" class="text-table text-secondary border-bottom">STT</th>
                            <th style="width:100%" class="text-table text-secondary border-bottom">Serial number</th>
                            <th style="width:3%" class="border-bottom"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border-bottom">1</td>
                            <td class="border-bottom"><input class="form-control w-100 border-0 pl-0" type="text" name="seri0[]"></td>
                            <td class="deleteRow1 border-bottom">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="14" viewBox="0 0 12 14" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.3687 5.5C10.6448 5.5 10.8687 5.72386 10.8687 6C10.8687 6.03856 10.8642 6.07699 10.8554 6.11452L9.3628 12.4581C9.1502 13.3615 8.3441 14 7.41597 14H4.58403C3.65593 14 2.84977 13.3615 2.6372 12.4581L1.14459 6.11452C1.08135 5.84572 1.24798 5.57654 1.51678 5.51329C1.55431 5.50446 1.59274 5.5 1.6313 5.5H10.3687ZM6.5 0C7.88071 0 9 1.11929 9 2.5H11C11.5523 2.5 12 2.94772 12 3.5V4C12 4.27614 11.7761 4.5 11.5 4.5H0.5C0.22386 4.5 0 4.27614 0 4V3.5C0 2.94772 0.44772 2.5 1 2.5H3C3 1.11929 4.11929 0 5.5 0H6.5ZM6.5 1.5H5.5C4.94772 1.5 4.5 1.94772 4.5 2.5H7.5C7.5 1.94772 7.05228 1.5 6.5 1.5Z" fill="#6D7075"/>
                            </svg>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="mt-4">
                    <button type="button" class="btn-destroy btn-light addRow" style="padding: 4px 8px;"> 
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                        <path d="M6.75 1C6.75 0.58579 6.41421 0.25 6 0.25C5.58579 0.25 5.25 0.58579 5.25 1V5.25H1C0.58579 5.25 0.25 5.58579 0.25 6C0.25 6.41421 0.58579 6.75 1 6.75H5.25V11C5.25 11.4142 5.58579 11.75 6 11.75C6.41421 11.75 6.75 11.4142 6.75 11V6.75H11C11.4142 6.75 11.75 6.41421 11.75 6C11.75 5.58579 11.4142 5.25 11 5.25H6.75V1Z" fill="#6D7075"/>
                        </svg>
                    </span>
                    <span class="text-btnIner-primary ml-2">
                    Thêm dòng
                    </span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    </div>`;
    $("#list_modal").append(newModal);
    createRowInput("seri");
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
deleteRowRepesent();
function deleteRowRepesent() {
    $(".deleteRepesent").on("click", function () {
        $(this).closest("tr").remove();
    });
}

searchProductName();
deleteRow();
showListProductCode();
// showListProductName();

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

// function checkInput() {
//     $(".searchProductName").on("input", function () {
//         checkDuplicateRows();
//     });
// }

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

function normalizeProductName(name) {
    // Chuyển tất cả các ký tự thành chữ thường
    var lowercaseName = name.toLowerCase();
    // Loại bỏ các dấu
    var normalized = lowercaseName
        .normalize("NFD")
        .replace(/[\u0300-\u036f]/g, "")
        .trim();
    return normalized;
}

function checkProduct() {
    var rows = $("#inputcontent tbody tr");
    var hasProducts = true;
    var previousProductNames = [];

    for (var i = 0; i < rows.length; i++) {
        var productNameInput = rows[i].querySelector(".searchProductName");
        var productName = productNameInput.value;

        var normalizedProductName = normalizeProductName(productName);

        if (previousProductNames.includes(normalizedProductName)) {
            showNotification(
                "warning",
                "Tên sản phẩm bị trùng: " + productName
            );
            hasProducts = false;
            break;
        } else {
            // Thêm tên sản phẩm đã chuẩn hóa vào mảng các tên sản phẩm đã xuất hiện trước đó
            previousProductNames.push(normalizedProductName);
        }
    }

    return hasProducts;
}

function checkQtyProduct() {
    var check = true;
    $('#inputcontent tbody tr').each(function () {
        if ($(this).find('.quantity-input').val() == 0) {
            check = false;
            return false;
        }
    })
    return check;
}

function checkWarehouse(){
    var check = true;
    $('#inputcontent tbody tr').each(function () {
        if ($(this).find('.warehouse_id').val() == "") {
            check = false;
            return false;
        }
    })
    return check;
}


// Checkbox
function getDataCheckbox(element) {
    var isChecked = $(element).is(":checked");
    if (isChecked) {
        $(element).closest("tr").find('input[name^="cbSeri"]').val(1);
        // $(element).closest('tr').find('a').show()
        $(element).closest("tr").find("a").css("opacity", 1);
    } else {
        $(element).closest("tr").find('input[name^="cbSeri"]').val(0);
        // $(element).closest('tr').find('a').hide();
        $(element).closest("tr").find("a").css("opacity", 0);
        var id = $(element).closest("tr").find(".duongdan").attr("data-target");
        if (id) {
            $(id).find("#table_SNS tbody .form-control.w-100").val("");
        }
    }
}

// Hàm kiểm tra seri trùng
function checkDuplicateSerialNumbers(serialNumbers) {
    var uniqueSerialNumbers = new Set();
    for (var i = 0; i < serialNumbers.length; i++) {
        var serial = serialNumbers[i];
        if (serialNumbers[i] !== "") {
            if (uniqueSerialNumbers.has(serial)) {
                return serial;
            } else {
                uniqueSerialNumbers.add(serial);
            }
        }
    }
    return null;
}

function getAction(e) {
    $("#getAction").val($(e).find("button").val());
}
