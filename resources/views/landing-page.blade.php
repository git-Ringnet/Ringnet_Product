<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>R-Order Central</title>
</head>

<style>
    /* Reset default styles */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Arial, sans-serif;
        background-color: #3a3f9a;
        color: white;
    }

    .container {
        max-width: 600px;
        margin: 0 auto;
        padding: 40px;
        text-align: center;
    }

    h1 {
        font-size: 28px;
        margin-bottom: 20px;
    }

    .description {
        font-size: 18px;
        margin-bottom: 20px;
    }

    .sub-description {
        font-size: 14px;
        margin-bottom: 40px;
    }

    .features {
        display: flex;
        justify-content: space-between;
        margin-bottom: 40px;
    }

    .feature {
        flex: 1;
        display: flex;
        align-items: center;
    }

    .feature img {
        margin-right: 10px;
    }

    button {
        background-color: #6c63ff;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        font-size: 16px;
    }

    small {
        font-size: 12px;
    }
</style>

<body>
    <div class="container">
        <h1>R-Order Central</h1>
        <p class="description">Một phương thức tốt hơn để quản lý đơn hàng</p>
        <p class="sub-description">Chúng tôi giúp doanh nghiệp của bạn chuẩn hóa quy trình xuất nhập hàng hóa.</p>

        <div class="features">
            <div class="feature">
                <img src="checkmark.png" alt="Checkmark">
                Quản lý kho hàng
            </div>
            <div class="feature">
                <img src="checkmark.png" alt="Checkmark">
                Quản lý bán hàng
            </div>
            <div class="feature">
                <img src="checkmark.png" alt="Checkmark">
                Quản lý mua hàng
            </div>
        </div>

        <button>Bắt đầu sử dụng miễn phí</button>
        <small>Beta version</small>
    </div>
</body>

</html>
