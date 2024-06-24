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

    // Sử dụng regex để chỉ cho phép chữ cái
    var newValue = value.replace(/[^a-zA-Z\s]/g, "");

    // Nếu giá trị đã thay đổi, cập nhật lại trường nhập liệu
    if (value !== newValue) {
        $(this).val(newValue);
    }
});
