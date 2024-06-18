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

        // Kiểm tra các trường thiếu và thêm vào mảng missingFields
        if (!productId) {
            missingFields.push("Mã sản phẩm");
        }
        if (!productQty) {
            missingFields.push("Số lượng sản phẩm");
        }
        if (!productName) {
            missingFields.push("Tên sản phẩm");
        }
        // Nếu tất cả các trường đều có giá trị, thêm vào productsArray
        if (productId && productQty && productName) {
            productsArray.push({
                key: productId,
                name: productName,
                value: productQty,
                checkSeri: checkSeri,
            });
        }
    });
    // Nếu có trường thiếu, hiển thị thông báo và trả về false
    if (missingFields.length > 0) {
        var missingFieldsMsg =
            "Vui lòng điền đầy đủ thông tin cho các trường sau:\n";
        missingFields.forEach(function (field) {
            missingFieldsMsg += "- " + field + "\n";
        });
        showAutoToast("warning", missingFieldsMsg);
        return false;
    }
    var productCheckCount = [];

    $(".check-item").each(function () {
        var productId = $(this).data("product-id-sn");
        var checked = $(this).is(":checked") ? 1 : 0;

        console.log(productId);
        // Kiểm tra nếu productId đã tồn tại trong mảng productCheckCount
        var existingProduct = productCheckCount.find(function (product) {
            return product.product_id === productId;
        });

        if (existingProduct) {
            existingProduct.checked += checked;
        } else {
            productCheckCount.push({
                product_id: productId,
                checked: checked,
            });
        }
    });
    // console.log(productCheckCount);
    // Kiểm tra số lượng seri được chọn cho mỗi sản phẩm
    for (var i = 0; i < productsArray.length; i++) {
        var product = productsArray[i];
        var productId = product.key;
        var productQty = product.value;
        var checkedCount = productCheckCount[productId];
        // console.log(productQty);
        // console.log(checkedCount);
        // Nếu số lượng seri không khớp, hiển thị thông báo và trả về false
        if (
            checkedCount === undefined ||
            parseInt(productQty) !== checkedCount
        ) {
            showAutoToast(
                "warning",
                "Vui lòng chọn seri để hoàn trả sản phẩm:\n" + product.name
            );
            return false;
        }
    }
    // Nếu không có vấn đề gì, trả về true
    return true;
}
$(document).ready(function () {
    $(".search-receive").on("click", function (event, detail_id) {
        if (detail_id) {
            detail_id = detail_id;
        } else {
            detail_id = parseInt($(this).attr("id"), 10);
        }
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
        $("#fund_id").val(detail_id);
        $("#fund").val($(this).find("span").text());
    });
});
