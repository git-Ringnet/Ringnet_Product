let fieldCounter = 1;
var arrProduct = [];
function addProductRow() {
    //lấy thông tin sản phẩm
    $(document).ready(function () {
        //Hiển thị danh sách tên sản phẩm
        $(".product_name").on("click", function (e) {
            e.stopPropagation();
            $(".list_product").hide();

            var clickedRow = $(this).closest("tr");
            var listProduct = clickedRow.find(".list_product");
            listProduct.toggle();

            // Lấy product_id của sản phẩm đang chọn trong hàng này
            var clickedProductId = clickedRow.find(".product_id").val();

            // Lặp qua danh sách sản phẩm để ẩn những sản phẩm đã được chọn và không thuộc hàng đang click
            $(".list_product li").each(function () {
                var productId = $(this).data("id");
                if (
                    arrProduct.indexOf(productId) !== -1 &&
                    productId !== clickedProductId
                ) {
                    $(this).hide();
                } else {
                    $(this).show();
                }
                if (clickedProductId == productId) {
                    $(this).show();
                }
            });
        });
        $(document).on("click", function (e) {
            if (!$(e.target).is(".product_name")) {
                $(".list_product").hide();
            }
        });
    });
}
