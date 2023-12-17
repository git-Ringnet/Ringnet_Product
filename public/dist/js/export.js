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

function getQuotation(getName, count, date) {
    console.log(date);
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
