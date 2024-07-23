// GET INFO GUEST
function getGuestInfo() {
    const guests = [];
    const name = $(".nameGuest").val();
    guests.push({
        name,
    });
    return guests;
}
// GET PRODUCTS
function getProducts() {
    const products = [];
    $(".addProduct").each(function () {
        const name = $(this).find(".product_name").val() || "";
        const wh = $(this).find(".searchWarehouse").val() || "";
        const unit = $(this).find(".product_unit").val() || "";
        const quantity = parseInt($(this).find(".quantity-input").val()) || 0;
        const unitPriceString = $(this).find(".product_price").val() || "0";
        const unitPrice = parseFloat(unitPriceString.replace(/,/g, ""));
        const note = $(this).find('input[name="product_note[]"]').val() || "";
        const totalPriceString = $(this).find(".total-amount").val() || "0";
        const totalPrice = parseFloat(totalPriceString.replace(/,/g, ""));

        products.push({
            name,
            wh,
            unit,
            quantity,
            unitPrice,
            totalPrice,
            note,
        });
    });
    return products;
}

function renderProducts(products) {
    const $invoiceBody = $("#invoiceBody");
    $invoiceBody.empty();
    let index = 1; // Biến đếm để đánh số thứ tự

    products.forEach((product) => {
        const row = `
            <tr>
                <td class="border px-2 p-0 text-center">${index}</td>
                <td class="border px-2 p-0 text-center">${product.name}</td>
                <td class="border-right px-2 p-0 text-center">${
                    product.unit
                }</td>
                <td class="border-right px-2 p-0 text-center">${formatCurrency(
                    Math.round(product.quantity)
                )}</td>
                <td class="border-right px-2 p-0 text-center unitPrice">${formatCurrency(
                    Math.round(product.unitPrice)
                )}</td>
                <td class="border-right px-2 p-0 text-center totalPrice">${formatCurrency(
                    Math.round(product.totalPrice)
                )}</td>
                <td class="border-right px-2 p-0 text-center wh">${
                    product.wh
                }</td>
                <td class="border-right note px-2 p-0 text-center">${
                    product.note
                }</td>
            </tr>
        `;
        $invoiceBody.append(row);
        index++; // Tăng biến đếm sau mỗi lần lặp
    });
}

// Phiếu bán hàng
function printContent(contentId) {
    renderProducts(getProducts());
    const guestInfo = getGuestInfo();
    $(".guest").text(guestInfo.name);
    $(".title-print").text("Phiếu bán hàng");
    $(".wh").hide();
    // Loại bỏ các lớp trước khi in
    $(".relative").removeClass("position-relative");
    $(".top-table.outer").removeClass("outer").addClass("outer-temp");
    $(".top-table.outer-4").removeClass("outer-4").addClass("outer-4-temp");

    var printContents = $("#" + contentId).html();
    var originalContents = $("body").html();
    $(".top-table").css("margin-top", "200px");
    $("body").css("margin-top", "100px");

    // Nối thêm nội dung extraContent nếu có
    $("body").html(printContents);
    window.print();
    // Khôi phục các lớp sau khi in
    $("body").html(originalContents);
    $(".wh").show();
    $(".relative").addClass("position-relative");
    $(".top-table.outer-temp").removeClass("outer-temp").addClass("outer");
    $(".top-table.outer-4-temp")
        .removeClass("outer-4-temp")
        .addClass("outer-4");
}

// Phiếu Trắng
function printBlank(contentId) {
    renderProducts(getProducts());
    const guestInfo = getGuestInfo();
    $(".guest").text(guestInfo.name);
    $(".title-print").text("Phiếu bán hàng");
    $(".info-company").hide();
    $(".wh").hide();
    // Loại bỏ các lớp trước khi in
    $(".relative").removeClass("position-relative");
    $(".top-table.outer").removeClass("outer").addClass("outer-temp");
    $(".top-table.outer-4").removeClass("outer-4").addClass("outer-4-temp");

    var printContents = $("#" + contentId).html();
    var originalContents = $("body").html();
    $(".top-table").css("margin-top", "200px");
    $("body").css("margin-top", "100px");

    // Nối thêm nội dung extraContent nếu có
    $("body").html(printContents);
    window.print();
    // Khôi phục các lớp sau khi in
    $("body").html(originalContents);
    $(".info-company").show();
    $(".wh").show();
    $(".relative").addClass("position-relative");
    $(".top-table.outer-temp").removeClass("outer-temp").addClass("outer");
    $(".top-table.outer-4-temp")
        .removeClass("outer-4-temp")
        .addClass("outer-4");
}

// Phiếu giao hàng
function printDelivery(contentId) {
    renderProducts(getProducts());
    const guestInfo = getGuestInfo();
    $(".guest").text(guestInfo.name);
    $(".title-print").text("Phiếu giao hàng");
    $(".unitPrice").hide();
    $(".totalPrice").hide();
    $(".wh").hide();
    // Loại bỏ các lớp trước khi in
    $(".relative").removeClass("position-relative");
    $(".top-table.outer").removeClass("outer").addClass("outer-temp");
    $(".top-table.outer-4").removeClass("outer-4").addClass("outer-4-temp");

    var printContents = $("#" + contentId).html();
    var originalContents = $("body").html();
    $(".top-table").css("margin-top", "200px");
    $("body").css("margin-top", "100px");

    // Nối thêm nội dung extraContent nếu có
    $("body").html(printContents);
    window.print();
    // Khôi phục các lớp sau khi in
    $("body").html(originalContents);
    $(".unitPrice").show();
    $(".totalPrice").show();
    $(".wh").show();
    $(".relative").addClass("position-relative");
    $(".top-table.outer-temp").removeClass("outer-temp").addClass("outer");
    $(".top-table.outer-4-temp")
        .removeClass("outer-4-temp")
        .addClass("outer-4");
}
// Phiếu xuất kho
function printWH(contentId) {
    renderProducts(getProducts());
    const guestInfo = getGuestInfo();
    $(".guest").text(guestInfo.name);
    $(".title-print").text("Phiếu xuất kho");
    $(".unitPrice").hide();
    $(".totalPrice").hide();
    // Loại bỏ các lớp trước khi in
    $(".relative").removeClass("position-relative");
    $(".top-table.outer").removeClass("outer").addClass("outer-temp");
    $(".top-table.outer-4").removeClass("outer-4").addClass("outer-4-temp");

    var printContents = $("#" + contentId).html();
    var originalContents = $("body").html();
    $(".top-table").css("margin-top", "200px");
    $("body").css("margin-top", "100px");

    // Nối thêm nội dung extraContent nếu có
    $("body").html(printContents);
    window.print();
    // Khôi phục các lớp sau khi in
    $("body").html(originalContents);
    $(".unitPrice").show();
    $(".totalPrice").show();
    $(".relative").addClass("position-relative");
    $(".top-table.outer-temp").removeClass("outer-temp").addClass("outer");
    $(".top-table.outer-4-temp")
        .removeClass("outer-4-temp")
        .addClass("outer-4");
}
