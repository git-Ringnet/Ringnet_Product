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
        const note =
            $(this)
                .find(
                    'input[name="product_note[]"], textarea[name="product_note[]"]'
                )
                .val() || "";
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

//
// GET INFO Provides
function getProvidesInfo() {
    const provides = [];
    const name = $(".nameGuest").val();
    provides.push({
        name,
    });
    return provides;
}
// Phiếu đặt hàng
function printContentImport(contentId) {
    renderProducts(getProducts());
    const providesInfo = getProvidesInfo();
    $(".guest").text(providesInfo[0].name);
    $(".title-print").text("Phiếu đặt hàng");
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

// Phiếu nhập kho
function printContentImportWH(contentId) {
    renderProducts(getProducts());
    const providesInfo = getProvidesInfo();
    $(".guest").text(providesInfo[0].name);
    $(".title-print").text("Phiếu nhập kho");
    $(".wh").hide();
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
    $(".wh").show();
    $(".relative").addClass("position-relative");
    $(".top-table.outer-temp").removeClass("outer-temp").addClass("outer");
    $(".top-table.outer-4-temp")
        .removeClass("outer-4-temp")
        .addClass("outer-4");
}

// Nội dung phiếu thu/ chi
function getInfoCash() {
    const quote = $(".quote").val();
    const date = $("#hiddenDateInput").val();
    const price_export = $(".price_export").val();
    const addr = $("#addr").val();
    const nameGuest = $("#myGuest").val();
    const note = $(".note").val();
    const myContent = $("#myContent").val();

    // Trả về một object thay vì array
    return {
        quote,
        date,
        price_export,
        addr,
        nameGuest,
        myContent,
        note,
    };
}

// Phiếu Thu / Chi
function printCashRC(contentId, title) {
    const cashInfo = getInfoCash();
    $(".title-print").text(title);
    $("#products_info").hide();
    $("#cashRC").show();
    // Thêm dữ liệu vào
    $(".quote").text(cashInfo.quote);
    $(".nameGuest").text(cashInfo.nameGuest);
    $(".addr").text(cashInfo.addr);
    $(".price_export").text(cashInfo.price_export);
    $(".myContent").text(cashInfo.myContent);
    $(".note").text(cashInfo.note);
    const cashAmount = cashInfo.price_export.replace(/,/g, "") || 0;
    const amountInWords = n2words(cashAmount, { lang: "vi" }); // Chuyển đổi sang chữ bằng tiếng Việt
    $(".price_export_in_words").text(amountInWords + " đồng");
    const dateObj = new Date(cashInfo.date);
    const formattedDate = `Ngày ${dateObj.getDate()} tháng ${(
        "0" +
        (dateObj.getMonth() + 1)
    ).slice(-2)} năm ${dateObj.getFullYear()}`;
    $(".date").text(formattedDate);

    var printContents = $("#" + contentId).html();
    var originalContents = $("body").html();
    $(".top-table").css("margin-top", "200px");
    $("body").css("margin-top", "100px");

    // Nối thêm nội dung extraContent nếu có
    $("body").html(printContents);
    window.print();
    // Khôi phục các lớp sau khi in
    $("body").html(originalContents);
    $("#products_info").show();
    $("#cashRC").hide();
}

// Nội dung chuyển tiển nội bộ
function getInfoChangeFund() {
    const quote = $(".quote").val();
    const date = $(".date").val();
    const price = $(".price").val();
    const name = $(".name").val();
    const note = $(".note").val();
    const fund1 = $(".fund1 option:selected").text();
    const fund2 = $(".fund2 option:selected").text();

    // Trả về một object thay vì array
    return {
        quote,
        date,
        price,
        name,
        note,
        fund1,
        fund2,
    };
}
// Chuyển tiền nội bộ
function printChangeFund(contentId) {
    const cashInfo = getInfoChangeFund();
    $(".title-print").text("CHUYỂN TIỀN NỘI BỘ");
    $("#products_info").hide();
    $("#changeFund").show();
    // Thêm dữ liệu vào
    $(".quote").text(cashInfo.quote);
    $(".price").text(cashInfo.price);
    $(".note").text(cashInfo.note);
    $(".fund1").text(cashInfo.fund1);
    $(".fund2").text(cashInfo.fund2);
    $(".name").text(cashInfo.name);
    const cashAmount = cashInfo.price.replace(/,/g, "") || 0;
    const amountInWords = n2words(cashAmount, { lang: "vi" });
    $(".price_export_in_words").text(amountInWords + " đồng");
    const dateObj = new Date(cashInfo.date);
    const formattedDate = `Ngày ${dateObj.getDate()} tháng ${(
        "0" +
        (dateObj.getMonth() + 1)
    ).slice(-2)} năm ${dateObj.getFullYear()}`;
    $(".date").text(formattedDate);

    var printContents = $("#" + contentId).html();
    var originalContents = $("body").html();
    $(".top-table").css("margin-top", "200px");
    $("body").css("margin-top", "100px");

    // Nối thêm nội dung extraContent nếu có
    $("body").html(printContents);
    window.print();
    // Khôi phục các lớp sau khi in
    $("body").html(originalContents);
    $("#products_info").show();
    $("#cashRC").hide();
}
