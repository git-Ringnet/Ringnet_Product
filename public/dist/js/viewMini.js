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
function calculateTotals() {
    var totalAmount = 0;
    var totalTax = 0;

    // Lặp qua từng hàng
    $(".addProduct").each(function () {
        var productQty = parseFloat(
            $(this).find('[name^="product_qty"]').val()
        );
        var productPriceElement = $(this).find('[name^="product_price"]');
        var productPrice = 0;
        var taxValue = parseFloat($(this).find('[name^="product_tax"]').val());
        var promotionValue =
            $(this).find('input[name="promotion[]"]').val().replace(/,/g, "") ||
            0;

        var promotionOption =
            parseInt($(this).find('select[name="promotion-option[]"]').val()) ||
            0;
        if (taxValue == 99) {
            taxValue = 0;
        }
        if (productPriceElement.length > 0) {
            var rawPrice = productPriceElement.val();
            if (rawPrice !== "") {
                productPrice = parseFloat(rawPrice.replace(/,/g, ""));
            }
        }

        if (!isNaN(productQty) && !isNaN(taxValue) && !isNaN(promotionValue)) {
            var donGia = productPrice;
            var rowTotal = productQty * donGia;

            // Tính khuyến mãi lại
            if (promotionOption == 1) {
                // Giảm số tiền trực tiếp
                // Tính giảm trực tiếp
                rowTotal -= promotionValue;
                // Nếu giảm trực tiếp lớn hơn tổng tiền hàng, thì đặt tổng tiền hàng bằng 0 để tránh giá âm
                if (rowTotal < 0) {
                    rowTotal = 0;
                }
            } else if (promotionOption == 2) {
                // Giảm phần trăm trên giá trị sản phẩm
                var discountAmount = (rowTotal * promotionValue) / 100;
                rowTotal -= discountAmount;
            }

            var rowTax = (rowTotal * taxValue) / 100;
            // Làm tròn từng thuế
            rowTax = Math.round(rowTax);

            $(this).find(".product_tax1").val(formatCurrency(rowTax));
            // Hiển thị kết quả
            $(this)
                .find(".total-amount")
                .val(formatCurrency(Math.round(rowTotal)));

            $(this).find(".product_price").val(formatCurrency(donGia));

            // Cộng dồn vào tổng totalAmount và totalTax
            totalAmount += rowTotal;
            totalTax += rowTax;
        }
    });
    $("#total-amount-sum").text(formatCurrency(Math.round(totalAmount)));

    var promotionOption = $('select[name="promotion-option-total"]').val();
    var promotionTotal =
        parseFloat(
            $('input[name="promotion-total"]')
                .val()
                .replace(/[^0-9.-]+/g, "")
        ) || 0;

    if (promotionOption == 1) {
        totalAmount -= promotionTotal;
    } else if (promotionOption == 2) {
        totalAmount -= (totalAmount * promotionTotal) / 100;
    }
    // Hiển thị tổng totalAmount và totalTax
    // $('#product-tax').text(formatCurrency(Math.round(totalTax)));
    checkProductTaxValues();
    if (checkProductTaxValues()) {
        var commonTaxRate = parseFloat(
            $('select[name="product_tax[]"]').first().val()
        );
        if (!isNaN(commonTaxRate)) {
            totalTax = totalAmount * (commonTaxRate / 100);
        }
    } else {
        $("#promotion-total").val(0);
        $(".addProduct").each(function () {
            var rowTax = parseFloat(
                $(this)
                    .find(".product_tax1")
                    .text()
                    .replace(/[^0-9.-]+/g, "")
            );
            if (!isNaN(rowTax)) {
                totalTax += rowTax;
            }
        });
    }
    totalTax = Math.round(totalTax);
    $("#product-tax").text(formatCurrency(totalTax));
    // Tính tổng thành tiền và thuế
    calculateGrandTotal(totalAmount, totalTax);
}

//tìm kiếm
// document.addEventListener("DOMContentLoaded", function () {
//     const searchInput = document.getElementById("search-input");
//     const tableRows = document.querySelectorAll("#example tbody tr");
//     const resultCountSpan = document.getElementById("result-count");

//     // Khôi phục dữ liệu tìm kiếm nếu có từ localStorage
//     const savedSearch = localStorage.getItem("savedSearch");
//     if (savedSearch) {
//         searchInput.value = savedSearch;
//         filterTable(savedSearch);
//     }

//     searchInput.addEventListener("input", function () {
//         const searchText = this.value.trim(); // Giữ nguyên dữ liệu nhập vào
//         filterTable(searchText);
//         localStorage.setItem("savedSearch", searchText); // Lưu dữ liệu tìm kiếm vào localStorage
//     });

//     function filterTable(searchText) {
//         let count = 0;
//         tableRows.forEach((row) => {
//             const cellText = row
//                 .querySelector("td")
//                 .textContent.toLowerCase()
//                 .trim();
//             if (cellText.includes(searchText.toLowerCase())) {
//                 row.style.display = ""; // Hiển thị hàng nếu có nội dung phù hợp
//                 count++;
//             } else {
//                 row.style.display = "none"; // Ẩn hàng nếu không phù hợp
//             }
//         });
//         resultCountSpan.textContent = count; // Cập nhật số kết quả tìm kiếm
//     }
// });

$("#listProject").hide();
$(document).ready(function () {
    function toggleListGuest(input, list, filterInput) {
        input.on("click", function () {
            list.show();
        });

        $(document).click(function (event) {
            if (
                !$(event.target).closest(input).length &&
                !$(event.target).closest(filterInput).length
            ) {
                list.hide();
            }
        });

        var applyFilter = function () {
            var value = filterInput.val().toUpperCase();
            list.find("li").each(function () {
                var text = $(this).find("a").text().toUpperCase();
                $(this).toggle(text.indexOf(value) > -1);
            });
        };

        input.on("keyup", applyFilter);
        filterInput.on("keyup", applyFilter);
    }

    toggleListGuest(
        $("#inputGuest"),
        $("#listGuestMiniView"),
        $("#searchGuestMiniView")
    );
});

function formatDate(dateString) {
    const date = new Date(dateString);
    const day = String(date.getDate()).padStart(2, "0");
    const month = String(date.getMonth() + 1).padStart(2, "0");
    const year = date.getFullYear();

    return `${day}/${month}/${year}`;
}

function formatDate1(dateString) {
    const date = new Date(dateString);
    const day = String(date.getDate()).padStart(2, "0");
    const month = String(date.getMonth() + 1).padStart(2, "0");
    const year = date.getFullYear();

    return `${year}-${month}-${day}`;
}

function formatNumber1(number) {
    if (number === undefined) {
        return 0;
    }
    return parseFloat(number).toFixed(0).toLocaleString();
}

//
function calculateTotalAmount1() {
    var totalAmount = 0;
    $("tr").each(function () {
        var rowTotal = parseFloat(
            String($(this).find(".total_price").val()).replace(/[^0-9.-]+/g, "")
        );
        if (!isNaN(rowTotal)) {
            totalAmount += rowTotal;
        }
    });
    totalAmount = Math.round(totalAmount); // Làm tròn thành số nguyên
    $("#total-amount-sum").text(formatCurrency(totalAmount));
    calculateTotalTax1();
    calculateGrandTotal1();
}

function calculateTotalTax1() {
    var totalTax = 0;
    $("tr").each(function () {
        var rowTax = parseFloat(
            $(this)
                .find(".product_tax1")
                .text()
                .replace(/[^0-9.-]+/g, "")
        );
        if (!isNaN(rowTax)) {
            totalTax += rowTax;
        }
    });
    totalTax = Math.round(totalTax); // Làm tròn thành số nguyên
    $("#product-tax").text(formatCurrency(totalTax));

    calculateGrandTotal1();
}

function calculateGrandTotal1() {
    var totalAmount = parseFloat(
        $("#total-amount-sum")
            .text()
            .replace(/[^0-9.-]+/g, "")
    );
    var totalTax = parseFloat(
        $("#product-tax")
            .text()
            .replace(/[^0-9.-]+/g, "")
    );

    var grandTotal = totalAmount + totalTax;
    grandTotal = Math.round(grandTotal); // Làm tròn thành số nguyên
    $("#grand-total").text(formatCurrency(grandTotal));
    $("#total_bill").val(formatCurrency(grandTotal));

    // Update data-value attribute
    $("#grand-total").attr("data-value", grandTotal);
    $("#total").val(totalAmount);
}

function updateTaxAmount1() {
    $("#inputcontent tbody tr").each(function () {
        var productQty = parseFloat($(this).find(".quantity-input").val());
        var productPrice = $(this).find('input[name^="price_export"]').val();

        if (productPrice) {
            productPrice = parseFloat(productPrice.replace(/[^0-9.-]+/g, ""));
        }

        var option_promotion = $(this)
            .closest("tr")
            .find(".promotion-option")
            .val();
        var promotion = $(this).closest("tr").find("[name^='promotion']").val();
        if (promotion) {
            promotion = parseFloat(promotion.replace(/[^0-9.-]+/g, ""));
        }
        var taxValue = parseFloat($(this).find(".product_tax").val());
        if (taxValue == 99) {
            taxValue = 0;
        }
        if (!isNaN(productQty) && !isNaN(productPrice) && !isNaN(taxValue)) {
            if (promotion > 0) {
                if (option_promotion == 1) {
                    var totalAmount = productQty * productPrice - promotion;
                } else {
                    var totalAmount =
                        productQty * productPrice -
                        (productQty * productPrice * promotion) / 100;
                }
                $(this)
                    .closest("tr")
                    .find(".total_price")
                    .val(formatCurrency(totalAmount));
            } else {
                var totalAmount = productQty * productPrice;
                $(this)
                    .closest("tr")
                    .find(".total_price")
                    .val(formatCurrency(totalAmount));
            }

            var taxAmount = (totalAmount * taxValue) / 100;
            $(this).find(".product_tax1").text(Math.round(taxAmount));
        }
    });
}

//sản phẩm
function createProductRow(product, page) {
    let promotionValue = "";
    promotionType = "";
    const quantity = page === "PXK" ? product.deliver_qty : product.product_qty;

    if (product.promotion) {
        let promotion = JSON.parse(product.promotion);
        promotionValue = promotion.value;
        promotionType = promotion.type;
    }
    const product_code = page == "PXK" || page == "PNK" ? "d-none" : "";
    return `
        <tr class="bg-white addProduct" style="height:80px">
            <td class="border-right p-2 text-13 align-top border-bottom border-top-0 ${product_code}">
                <input type="text" autocomplete="off" class="border-0 pl-1 pr-2 py-1 w-50 product_code height-32" name="product_code[]" value="${
                    product.product_code == null ? "" : product.product_code
                }">
            </td>
            <td class='border-right p-2 text-13 align-top position-relative border-bottom border-top-0'>
                <ul class='list_product bg-white position-absolute w-100 rounded shadow p-0 scroll-data' style='z-index: 99;top: 44%;left: 0%;display: none;'>
                <li data-id=''>
                <a href='javascript:void(0);' class='text-dark d-flex justify-content-between p-2 idProduct w-100' id='' name='idProduct'>
                <span class='w-50 text-13-black' style='flex:2'></span>
                </a>
                </li>
                </ul>
                <div class='d-flex align-items-center'>
                <input type='text' class='border-0 px-2 py-1 w-100 product_name height-32 searchProductName' autocomplete='off' required name='product_name[]' value="${
                    product.product_name
                }">
                <input type='hidden' class='product_id' autocomplete='off' name='product_id[]' value="${
                    product.product_id
                }">
                <div class='info-product' style='display: none;' data-toggle='modal' data-target='#productModal'>
                <svg xmlns='http://www.w3.org/2000/svg' width='14' height='14' viewBox='0 0 14 14' fill='none'>
                <g clip-path='url(#clip0_2559_39956)'>
                <path d='M6.99999 1.48362C5.53706 1.48362 4.13404 2.06477 3.09959 3.09922C2.06514 4.13367 1.48399 5.53669 1.48399 6.99963C1.48399 8.46256 2.06514 9.86558 3.09959 10.9C4.13404 11.9345 5.53706 12.5156 6.99999 12.5156C8.46292 12.5156 9.86594 11.9345 10.9004 10.9C11.9348 9.86558 12.516 8.46256 12.516 6.99963C12.516 5.53669 11.9348 4.13367 10.9004 3.09922C9.86594 2.06477 8.46292 1.48362 6.99999 1.48362ZM0.265991 6.99963C0.265991 5.21366 0.975464 3.50084 2.23833 2.23797C3.5012 0.975098 5.21402 0.265625 6.99999 0.265625C8.78596 0.265625 10.4988 0.975098 11.7616 2.23797C13.0245 3.50084 13.734 5.21366 13.734 6.99963C13.734 8.78559 13.0245 10.4984 11.7616 11.7613C10.4988 13.0242 8.78596 13.7336 6.99999 13.7336C5.21402 13.7336 3.5012 13.0242 2.23833 11.7613C0.975464 10.4984 0.265991 8.78559 0.265991 6.99963Z' fill='#282A30'/>
                <path d='M7.07004 4.34488C6.92998 4.33528 6.78944 4.35459 6.65715 4.40161C6.52487 4.44863 6.40367 4.52236 6.30109 4.61821C6.19851 4.71406 6.11674 4.82999 6.06087 4.95878C6.00499 5.08757 5.9762 5.22648 5.97629 5.36688C5.97629 5.52851 5.91208 5.68352 5.79779 5.79781C5.6835 5.91211 5.52849 5.97631 5.36685 5.97631C5.20522 5.97631 5.05021 5.91211 4.93592 5.79781C4.82162 5.68352 4.75742 5.52851 4.75742 5.36688C4.75733 4.9557 4.87029 4.55241 5.08394 4.2011C5.2976 3.84979 5.60373 3.56398 5.96886 3.37492C6.33399 3.18585 6.74408 3.10081 7.15428 3.12909C7.56449 3.15737 7.95902 3.29788 8.29475 3.53526C8.63049 3.77265 8.8945 4.09776 9.05792 4.47507C9.22135 4.85237 9.2779 5.26735 9.22139 5.67462C9.16487 6.0819 8.99748 6.4658 8.7375 6.78436C8.47753 7.10292 8.13497 7.34387 7.74729 7.48088C7.70694 7.49534 7.67207 7.52196 7.64747 7.55706C7.62287 7.59216 7.60975 7.63402 7.60992 7.67688V8.22463C7.60992 8.38626 7.54571 8.54127 7.43142 8.65557C7.31712 8.76986 7.16211 8.83407 7.00048 8.83407C6.83885 8.83407 6.68383 8.76986 6.56954 8.65557C6.45525 8.54127 6.39104 8.38626 6.39104 8.22463V7.67688C6.39096 7.38197 6.48229 7.0943 6.65247 6.85345C6.82265 6.6126 7.0633 6.43042 7.34129 6.332C7.56313 6.25339 7.7511 6.10073 7.87356 5.89975C7.99603 5.69877 8.0455 5.46172 8.01366 5.22853C7.98181 4.99534 7.87059 4.78025 7.69872 4.61946C7.52685 4.45867 7.30483 4.36114 7.07004 4.34488Z' fill='#282A30'/>
                <path d='M7.04382 10.1242C7.00228 10.1242 6.96245 10.1408 6.93307 10.1701C6.9037 10.1995 6.8872 10.2393 6.8872 10.2809C6.8872 10.3224 6.9037 10.3623 6.93307 10.3916C6.96245 10.421 7.00228 10.4375 7.04382 10.4375C7.08536 10.4375 7.1252 10.421 7.15457 10.3916C7.18395 10.3623 7.20045 10.3224 7.20045 10.2809C7.20045 10.2393 7.18395 10.1995 7.15457 10.1701C7.1252 10.1408 7.08536 10.1242 7.04382 10.1242ZM7.04382 10.9371C7.13 10.9371 7.21534 10.9201 7.29496 10.8872C7.37458 10.8542 7.44692 10.8059 7.50786 10.7449C7.5688 10.684 7.61714 10.6116 7.65012 10.532C7.6831 10.4524 7.70007 10.3671 7.70007 10.2809C7.70007 10.1947 7.6831 10.1094 7.65012 10.0297C7.61714 9.95012 7.5688 9.87777 7.50786 9.81684C7.44692 9.7559 7.37458 9.70756 7.29496 9.67458C7.21534 9.6416 7.13 9.62462 7.04382 9.62462C6.86977 9.62462 6.70286 9.69376 6.57978 9.81684C6.45671 9.93991 6.38757 10.1068 6.38757 10.2809C6.38757 10.4549 6.45671 10.6218 6.57978 10.7449C6.70286 10.868 6.86977 10.9371 7.04382 10.9371Z' fill='#282A30'/>
                </g>
                <defs>
                <clipPath id='clip0_2559_39956'>
                <rect width='14' height='14' fill='white'/>
                </clipPath>
                </defs>
                </svg>
                </div>
                </div>
            </td>
            <td class='border-right p-2 text-13 align-top border-bottom border-top-0'>
                <input type='text' autocomplete='off' class='border-0 px-2 py-1 w-100 product_unit height-32' required name='product_unit[]' value="${
                    product.product_unit
                }">
            </td>
            <td class='border-right p-2 text-13 align-top border-bottom border-top-0'>
                <div>
                <input type='number' class='text-right border-0 px-2 py-1 w-100 quantity-input height-32' autocomplete='off' required name='product_qty[]' value="${formatNumber1(
                    quantity
                )}">
                <input type='hidden' class='tonkho'>
                </div>
                <div class='mt-3 text-13-blue inventory text-right'>Tồn kho: <span class='pl-1 soTonKho'>0</span></div>
            </td>
            <td class="border-right p-2 text-13 align-top border-bottom border-top-0 ${
                page == "PXK" ? "" : "d-none"
            }">
            <input type="number" value="" class="border-0 px-2 text-right py-1 w-100 quantity-input height-32" autocomplete="off" name="promotion_qty[]">
            </td>
            <td class='border-right p-2 text-13 align-top border-bottom border-top-0 ${
                page == "PXK" || page == "PNK" ? "d-none" : ""
            }'>
                <div>
                <input type='text' class='text-right border-0 px-2 py-1 w-100 ${
                    page == "DHNCC" ? "price_export" : "product_price"
                } height-32' autocomplete='off' name='${
        page == "DHNCC" || page == "PNK" ? "price_export[]" : "product_price[]"
    }' required value="${formatCurrency(product.price_export)}">
                </div>
                <a href='#'><div class='mt-3 text-right text-13-blue recentModal' data-toggle='modal' data-target='#recentModal' style='display:none;'>Giao dịch gần đây</div></a>
            </td>
            <td class='border-right p-2 align-top border-bottom border-top-0 ${
                page == "PXK" || page == "PNK" ? "d-none" : ""
            }'>
                <div class='d-flex flex-column align-items-end'>
                <input type='${
                    page == "DHNCC" ? "text" : "number"
                }' name='promotion[]' class='promotion text-13-black py-1 w-100 height-32 mt-1 text-right' value="${promotionValue}" placeholder='Giá trị chiết khấu' style='border: none;'>
                <div class="mt-3 text-13-blue text-right">
                <select name='promotion-option[]' class='promotion-option border-0 mt-2'>
                <option value='1' ${
                    promotionType == 1 ? "selected" : ""
                }>Nhập tiền</option>
                <option value='2' ${
                    promotionType == 2 ? "selected" : ""
                }>Nhập %</option>
                </select>
                </div>
                </div>
            </td>
            <td class='border-right p-2 text-13 align-top border-bottom border-top-0 ${
                page == "PXK" || page == "PNK" ? "d-none" : ""
            }'>
                <select name='product_tax[]' class='border-0 py-1 w-100 text-center product_tax height-32' required>
                <option value='0' ${
                    product.product_tax == 0 ? "selected" : ""
                }>0%</option>
                <option value='8' ${
                    product.product_tax == 8 ? "selected" : ""
                }>8%</option>
                <option value='10' ${
                    product.product_tax == 10 ? "selected" : ""
                }>10%</option>
                <option value='99' ${
                    product.product_tax == 99 ? "selected" : ""
                }>NOVAT</option>
                </select>
            </td>
            <td class='border-right p-2 text-13 align-top border-bottom border-top-0 ${
                page == "PXK" || page == "PNK" ? "d-none" : ""
            }'> 
                <input type='text' readonly class='text-right border-0 px-2 py-1 w-100 ${
                    page == "DHNCC" ? "total_price" : "total-amount"
                } height-32'>
            </td>
            <td class="border-right note p-2 align-top border-bottom border-top-0 position-relative">
                <input id="searchWarehouse" value="${
                    page == "PNK" || page == "PXK" ? product.nameWH : ""
                }" type="text" placeholder="Chọn kho" class="border-0 py-1 w-100 height-32 text-13-black searchWarehouse" name="warehouse[]" readonly autocomplete="off">
                <div id="listWareH" class="bg-white position-absolute rounded shadow p-1 z-index-block" style="z-index: 99;">
                <ul class="m-0 p-0 scroll-data listWarehouse" id="listWarehouse" style="display:none;">
                <div class="p-1">
                <div class="position-relative">
                <input type="text" placeholder="Nhập kho hàng" class="pr-4 w-100 input-search bg-input-guest searchWarehouse" id="a">
                <span id="search-icon" class="search-icon">
                <i class="fas fa-search text-table" aria-hidden="true"></i>
                </span>
                </div>
                </div>
                </ul>
                </div>
                <input type="hidden" placeholder="Chọn kho" class="border-0 py-1 w-100 height-32 text-13-black warehouse_id" value="${
                    page == "PNK" || page == "PXK" ? product.idWH : ""
                }" name="warehouse_id[]" >
            </td>
            <td class='border-right note p-2 align-top border-bottom border-top-0'>
                <input type='text' class='text-13-black border-0 py-1 w-100 height-32' placeholder='Nhập ghi chú' name='product_note[]'>
            </td>
            <td class='p-2 align-top activity border-bottom border-top-0 delete-product ${
                page == "PXK" || page == "PNK" ? "d-none" : ""
            }' data-name1='BG' data-des='Xóa sản phẩm'>
                <svg width='17' height='17' viewBox='0 0 17 17' fill='none' xmlns='http://www.w3.org/2000/svg'>
                <path fill-rule='evenodd' clip-rule='evenodd' d='M13.1417 6.90625C13.4351 6.90625 13.673 7.1441 13.673 7.4375C13.673 7.47847 13.6682 7.5193 13.6589 7.55918L12.073 14.2992C11.8471 15.2591 10.9906 15.9375 10.0045 15.9375H6.99553C6.00943 15.9375 5.15288 15.2591 4.92702 14.2992L3.34113 7.55918C3.27393 7.27358 3.45098 6.98757 3.73658 6.92037C3.77645 6.91099 3.81729 6.90625 3.85826 6.90625H13.1417ZM9.03125 1.0625C10.4983 1.0625 11.6875 2.25175 11.6875 3.71875H13.8125C14.3993 3.71875 14.875 4.19445 14.875 4.78125V5.3125C14.875 5.6059 14.6371 5.84375 14.3438 5.84375H2.65625C2.36285 5.84375 2.125 5.6059 2.125 5.3125V4.78125C2.125 4.19445 2.6007 3.71875 3.1875 3.71875H5.3125C5.3125 2.25175 6.50175 1.0625 7.96875 1.0625H9.03125ZM9.03125 2.65625H7.96875C7.38195 2.65625 6.90625 3.13195 6.90625 3.71875H10.0938C10.0938 3.13195 9.61805 2.65625 9.03125 2.65625Z' fill='#6B6F76'/>
                </svg>
            </td>
            <td style='display:none;'><input type='text' class='product_tax1'></td>
            <td style="display:none;"><input type="text" class="type" value="1"></td>
        </tr>
    `;
}
