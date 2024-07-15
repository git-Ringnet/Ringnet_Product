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

function validateInput(input) {
    // Loại bỏ tất cả các ký tự ngoại trừ số và dấu "-"
    input.value = input.value.replace(/[^0-9-]/g, "");

    // Loại bỏ các dấu "-" liên tiếp
    input.value = input.value.replace(/-{2,}/g, "");
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

function checkQty(value, odlQty) {
    if (
        $(value)
            .val()
            .replace(/[^0-9.-]+/g, "") > odlQty
    ) {
        $(value).val(odlQty);
    }
}

// Kiểm tra seri check chưa không?
var productCheckedIfSeri = [];
function countCheckedByProductId(productId) {
    var count = 0;
    productCheckedIfSeri.forEach(function (product) {
        if (product.product_id === productId) {
            count += product.checked;
        }
    });
    return count;
}

var countChecked = [];
$(document).on("click", "tr", function () {
    var $checkItem = $(this).find(".check-item");
    if ($checkItem.length > 0) {
        var productId = $checkItem.data("product-id-sn");
        var checkboxValue = $checkItem.val();

        var existingProductIndex = productCheckedIfSeri.findIndex(function (
            product
        ) {
            return (
                product.product_id == productId &&
                product.value == checkboxValue
            );
        });

        if ($checkItem.is(":checked")) {
            if (existingProductIndex === -1) {
                productCheckedIfSeri.push({
                    product_id: productId,
                    value: checkboxValue,
                    checked: 1,
                });
            } else {
                productCheckedIfSeri[existingProductIndex].checked++;
            }
        } else {
            if (existingProductIndex !== -1) {
                productCheckedIfSeri[existingProductIndex].checked--;
                if (productCheckedIfSeri[existingProductIndex].checked <= 0) {
                    productCheckedIfSeri.splice(existingProductIndex, 1);
                }
            }
        }
        console.log(productCheckedIfSeri);
        var checkedCount = countCheckedByProductId(productId);
        // Kiểm tra xem product_id đã tồn tại trong mảng countChecked hay chưa
        var existingCountIndex = countChecked.findIndex(function (item) {
            return item.product_id === productId;
        });

        if (existingCountIndex !== -1) {
            // Nếu đã tồn tại, cập nhật lại checkedCount
            countChecked[existingCountIndex].checkedCount = checkedCount;
        } else {
            // Nếu chưa tồn tại, thêm mới vào mảng countChecked
            countChecked.push({
                product_id: productId,
                checkedCount: checkedCount,
            });
        }
    }
});

function checkProductsMatch() {
    var productsArray = [];
    var missingFields = []; // Mảng lưu trữ các trường bị thiếu
    $(".addProduct").each(function () {
        var productId = $(this).find(".product_id").val();
        var productQty = $(this)
            .find('input[name="product_qty[]"]')
            .val()
            .trim();
        var productName = $(this)
            .find('input[name="product_name[]"]')
            .val()
            .trim();
        var checkSeri = $(this).find('input[name="cbSeri[]"]').val().trim();

        if (!productId) {
            missingFields.push("Mã sản phẩm");
        }
        if (!productQty) {
            missingFields.push("Số lượng sản phẩm");
        }
        if (!productName) {
            missingFields.push("Tên sản phẩm");
        }
        if (productId && productQty && productName) {
            productsArray.push({
                key: productId,
                name: productName,
                value: productQty,
                checkSeri: checkSeri,
            });
        }
    });
    if (missingFields.length > 0) {
        var missingFieldsMsg =
            "Vui lòng điền đầy đủ thông tin cho các trường sau:\n";
        missingFields.forEach(function (field) {
            missingFieldsMsg += "- " + field + "\n";
        });
        showAutoToast("warning", missingFieldsMsg);
        return false;
    }
    for (var i = 0; i < productsArray.length; i++) {
        var product = productsArray[i];
        var productId = product.key;
        var productQty = product.value;
        var checkedCount = countChecked.find(function (item) {
            return item.product_id == productId;
        });
        if (
            !checkedCount ||
            checkedCount.checkedCount != parseInt(productQty)
        ) {
            showAutoToast(
                "warning",
                "Vui lòng chọn seri để hoàn trả sản phẩm:\n" + product.name
            );
            return false;
        }
    }
    return true;
}
//
$(document).ready(function () {
    $(".search-receive").on("click", function (event, detail_id) {
        if (detail_id) {
            detail_id = detail_id;
        } else {
            detail_id = parseInt($(this).attr("id"), 10);
        }
        console.log(detail_id);
        $("#detailimport_id").val(detail_id);
        $("#myInput").val($(this).find("span").text());
    });
});

$(document).ready(function () {
    $(".search-guest").on("click", function (event, detail_id) {
        if (detail_id) {
            detail_id = detail_id;
        } else {
            detail_id = parseInt($(this).attr("id"), 10);
        }
        console.log(detail_id);

        $("#guest_id").val(detail_id);
        $("#myGuest").val($(this).find("span").text());
    });
});

$(document).ready(function () {
    $(".search-funds").on("click", function (event, detail_id) {
        if (detail_id) {
            detail_id = detail_id;
        } else {
            detail_id = parseInt($(this).attr("id"), 10);
        }
        console.log(detail_id);

        $("#fund_id").val(detail_id);
        $("#fund").val($(this).find("span").text());
    });
});

function checkProductTaxValues() {
    var productTaxValues = [];
    $('select[name="product_tax[]"],input[name="product_tax[]"]').each(
        function () {
            var value = $(this).val();
            productTaxValues.push(value);
        }
    );
    var allEqual = productTaxValues.every(function (value, index, array) {
        return value === array[0];
    });
    if (allEqual) {
        $("#promotion-total").prop("disabled", false);
    } else {
        $("#promotion-total").prop("disabled", true);
    }
    // $("#promotion-total").val(0);
    return allEqual;
}
$(document).on("input", ".product_unit", function () {
    // Lấy giá trị hiện tại của trường nhập liệu
    var value = $(this).val();

    // Sử dụng regex để chỉ cho phép chữ cái, dấu cách và dấu tiếng Việt
    var newValue = value.replace(/[0-9!@#$%^&*();,.\/"'[\]\\]/g, "");

    // Nếu giá trị đã thay đổi, cập nhật lại trường nhập liệu
    if (value !== newValue) {
        $(this).val(newValue);
    }
});
function showListWarehouse() {
    $(document).on("click", ".searchWarehouse", function () {
        $(this).closest("tr").find(".listWarehouse").show();
    });
}
$(document).click(function (event) {
    if ($(event.target).closest(".searchWarehouse").length == 0) {
        $(".listWarehouse").hide();
    }
});

//Thêm thủ kho
let fieldCounter1 = 1;
$("#add-warehouse-manager").click(function () {
    // Tạo các phần tử HTML mới
    const newRow = $("<tr>", {
        id: `dynamic-row-${fieldCounter1}`,
        class: `bg-white addWarehouse representative-row`,
    });
    const hoTen = $(
        `<td class='border border-top-0 border-left-0 padding-left35'><input type="hidden" autocomplete="off"
        name="manager_id[]"><input type='text' autocomplete='off' class='border-0 px-2 py-1 w-100 represent_name' required name='name[]'></td>`
    );
    const email = $(
        "<td class='border border-top-0 padding-left35 border-left-0'><input type='email' autocomplete='off' class='border-0 px-2 py-1 w-100 represent_email' name='email[]'></td>"
    );
    const soDT = $(
        "<td class='border border-top-0 padding-left35 border-left-0'><input type='number' autocomplete='off' class='border-0 px-2 py-1 w-100 represent_phone' name='phone[]'></td>"
    );
    const option = $(
        "<td class='border border-top-0 border-right-0 text-left border-left-0' data-name1='KH' data-des='Xóa người đại diện'>" +
            "<svg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>" +
            "<path fill-rule='evenodd' clip-rule='evenodd' d='M10.5454 5C10.2442 5 9.99999 5.24421 9.99999 5.54545C9.99999 5.8467 10.2442 6.09091 10.5454 6.09091H13.4545C13.7558 6.09091 14 5.8467 14 5.54545C14 5.24421 13.7558 5 13.4545 5H10.5454ZM6 7.72726C6 7.42601 6.24421 7.18181 6.54545 7.18181H7.63637H16.3636H17.4545C17.7558 7.18181 18 7.42601 18 7.72726C18 8.02851 17.7558 8.27272 17.4545 8.27272H16.9091V17C16.9091 18.2113 15.9118 19.1818 14.7135 19.1818H9.25891C8.97278 19.1816 8.68906 19.1247 8.42499 19.0145C8.16092 18.9044 7.92126 18.7431 7.71979 18.5399C7.51833 18.3367 7.35905 18.0957 7.25112 17.8307C7.14347 17.5664 7.08903 17.2834 7.09091 16.9981V8.27272H6.54545C6.24421 8.27272 6 8.02851 6 7.72726ZM8.18182 17.0041V8.27272H15.8182V17C15.8182 17.5966 15.3216 18.0909 14.7135 18.0909H9.25938C9.11713 18.0908 8.97632 18.0625 8.84503 18.0077C8.71375 17.953 8.5946 17.8728 8.49444 17.7718C8.39429 17.6707 8.3151 17.5509 8.26144 17.4192C8.20779 17.2874 8.18074 17.1464 8.18182 17.0041ZM13.4545 10.0909C13.7558 10.0909 14 10.3351 14 10.6364V15.7273C14 16.0285 13.7558 16.2727 13.4545 16.2727C13.1533 16.2727 12.9091 16.0285 12.9091 15.7273V10.6364C12.9091 10.3351 13.1533 10.0909 13.4545 10.0909ZM11.0909 10.6364C11.0909 10.3351 10.8467 10.0909 10.5454 10.0909C10.2442 10.0909 9.99999 10.3351 9.99999 10.6364V15.7273C9.99999 16.0285 10.2442 16.2727 10.5454 16.2727C10.8467 16.2727 11.0909 16.0285 11.0909 15.7273V10.6364Z' fill='#42526E'/>" +
            "</svg>" +
            "</td>"
    );
    // Gắn các phần tử vào hàng mới
    newRow.append(hoTen, soDT, email, option);
    $("#dynamic-fields").before(newRow);
    // Tăng giá trị fieldCounter
    fieldCounter++;
    //Xóa người đại diện
    option.click(function () {
        $(this).closest("tr").remove();
        fieldCounter--;
    });
});

$(".delete-product").click(function () {
    $(this).closest("tr").remove();
});
