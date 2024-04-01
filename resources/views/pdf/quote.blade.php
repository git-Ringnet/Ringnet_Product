<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="vi" lang="vi">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>file_1700032151552</title>
    <meta name="author" content="Kim Ley">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
            text-indent: 0;
            font-family: DejaVu Sans, sans-serif;
        }

        .s1 {
            color: black;

            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 36px;
        }

        .s2 {
            color: black;

            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 16px;
        }

        .s3 {
            color: black;

            font-style: italic;
            font-weight: normal;
            text-decoration: none;
            font-size: 13.5px;
        }

        .s4 {
            color: black;

            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 13px;
        }

        .s5 {
            color: black;

            font-style: italic;
            font-weight: normal;
            text-decoration: none;
            font-size: 13.5px;
            vertical-align: 4px;
        }

        .s6 {
            color: black;

            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 13px;
        }

        .s7 {
            color: black;

            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 12px;
        }

        .s8 {
            color: black;

            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 13px;
        }

        h1 {
            color: black;

            font-style: italic;
            font-weight: bold;
            text-decoration: underline;
            font-size: 19px;
        }

        .s9 {
            color: black;

            font-style: italic;
            font-weight: bold;
            text-decoration: none;
            font-size: 19px;
        }

        .s10 {
            color: black;

            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 14px;
        }

        .h2 {
            color: #FFF;

            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 12px;
        }

        .s11 {
            color: #FFF;

            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 12px;
        }

        p {
            color: black;

            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 12px;
            margin: 0px;
        }

        table,
        tbody {
            vertical-align: top;
            overflow: visible;
        }

        td {
            vertical-align: center;
        }
    </style>
</head>

<body style="padding-top:100px;padding-left:20px;">
    <table style="border-collapse:collapse;margin-left:5.684px" cellspacing="0">
        <tbody>
            <tr style="height:170px">
                <td style="padding-top: 6px;position: relative; width:1083px;border-top-style:solid;border-top-width:1px;border-left-style:solid;border-left-width:1px;border-right-style:solid;border-right-width:1px"
                    colspan="9">
                    <p class="s1" style="padding-top: 6px;text-align: center;">
                        BẢNG BÁO GIÁ</p>
                </td>
            </tr>
            <tr style="padding-top:50px; height:20px">
                <td style="width:1083px;border-left-style:solid;border-left-width:1px;border-right-style:solid;border-right-width:1px"
                    colspan="9">
                    <p class="s2" style="padding-left: 3px;text-indent: 0px;text-align: left;">CÔNG TY CỔ PHẦN
                        THƯƠNG MẠI DỊCH VỤ RINGNET <span class="s3" style="margin-left:32%">Mã đơn hàng:
                            {{ $data['detailExport']->quotation_number }}</span></p>
                    <p class="s4" style="padding-left: 2px;text-indent: 0px;line-height: 18px;text-align: left;">Địa
                        chỉ: L17-11, Tầng 17, Vincom Center, 72 Lê Thánh Tôn, P. Bến Nghé, Q. 1, TP. HCM <span
                            class="s5" style="margin-left:22%">Ngày báo giá:
                            {{ \Carbon\Carbon::parse($data['detailExport']->ngayBG)->format('d/m/Y') }}
                        </span>
                    </p>
                </td>
            </tr>
            <tr style="height:32px">
                <td style="width:1083px;border-left-style:solid;border-left-width:1px;border-right-style:solid;border-right-width:1px"
                    colspan="9">
                    <p style="padding-top: 1px;padding-left: 2px;text-indent: 0px;text-align: left;"><a
                            href="mailto:info@ringnet.vn" class="s6" target="_blank">Điện thoại: 082 9999 626 Email:
                            info@ringnet.vn</a></p>
                </td>
            </tr>
            <tr style="height:24px">
                <td style="width:1083px;border-left-style:solid;border-left-width:1px;border-right-style:solid;border-right-width:1px"
                    colspan="9">
                    <p class="s7" style="padding-top: 5px;padding-left: 0px;text-indent: 0px;text-align: left;">
                        THÔNG TIN KHÁCH HÀNG</p>
                </td>
            </tr>
            <tr style="height:133px">
                <td style="width:1083px;border-left-style:solid;border-left-width:1px;border-bottom-style:solid;border-bottom-width:1px;border-right-style:solid;border-right-width:1px"
                    colspan="9">
                    <p class="s4" style="padding-top: 6px;padding-left: 0px;text-indent: 0px;text-align: left;">Tên
                        công ty: {{ $data['detailExport']->guest_name }}</p>
                    <p class="s4" style="padding-left: 0px;text-indent: 0px;text-align: left;">Địa chỉ:
                        {{ $data['detailExport']->guest_address }}</p>
                    <p style="padding-left: 0px;">Điện thoại:{{ $data['detailExport']->guest_phone }}</p>
                    <p style="padding-left: 0px;">Họ và tên:{{ $data['detailExport']->guest_receiver }}
                    </p>
                    <p style="padding-left: 0px;">Email:{{ $data['detailExport']->guest_email }}</p>
                </td>
            </tr>
            <tr style="height:18px;padding-top:10px;">
                <td
                    style="width:37px;border-top-style:solid;border-top-width:1px;border-left-style:solid;border-left-width:1px;border-bottom-style:solid;border-bottom-width:1px;border-right-style:solid;border-right-width:1px">
                    <p class="s8"
                        style="padding-top: 1px;padding-left: 6px;padding-right: 4px;text-indent: 0px;line-height: 15px;text-align: center;">
                        STT</p>
                </td>
                <td
                    style="width:122px;border-top-style:solid;border-top-width:1px;border-left-style:solid;border-left-width:1px;border-bottom-style:solid;border-bottom-width:1px;border-right-style:solid;border-right-width:1px">
                    <p class="s8"
                        style="padding-top: 1px;padding-left: 19px;text-indent: 0px;line-height: 15px;text-align: left;">
                        MÃ THIẾT BỊ</p>
                </td>
                <td
                    style="width:373px;border-top-style:solid;border-top-width:1px;border-left-style:solid;border-left-width:1px;border-bottom-style:solid;border-bottom-width:1px;border-right-style:solid;border-right-width:1px">
                    <p class="s8" style="padding-top: 1px;text-align: center;">
                        MÔ TẢ</p>
                </td>
                <td
                    style="width:55px;border-top-style:solid;border-top-width:1px;border-left-style:solid;border-left-width:1px;border-bottom-style:solid;border-bottom-width:1px;border-right-style:solid;border-right-width:1px">
                    <p class="s8"
                        style="padding-top: 1px;padding-right: 13px;text-indent: 0px;line-height: 15px;text-align: right;">
                        ĐVT</p>
                </td>
                <td
                    style="width:35px;border-top-style:solid;border-top-width:1px;border-left-style:solid;border-left-width:1px;border-bottom-style:solid;border-bottom-width:1px;border-right-style:solid;border-right-width:1px">
                    <p class="s8"
                        style="padding-top: 1px;padding-left: 8px;padding-right: 7px;text-indent: 0px;line-height: 15px;text-align: center;">
                        SL</p>
                </td>
                <td
                    style="width:100px;border-top-style:solid;border-top-width:1px;border-left-style:solid;border-left-width:1px;border-bottom-style:solid;border-bottom-width:1px;border-right-style:solid;border-right-width:1px">
                    <p class="s8"
                        style="padding-top: 1px;padding-left: 20px;text-indent: 0px;line-height: 15px;text-align: left;">
                        ĐƠN GIÁ</p>
                </td>
                <td
                    style="width:105px;border-top-style:solid;border-top-width:1px;border-left-style:solid;border-left-width:1px;border-bottom-style:solid;border-bottom-width:1px;border-right-style:solid;border-right-width:1px">
                    <p class="s8"
                        style="padding-top: 1px;padding-left: 34px;text-indent: 0px;line-height: 15px;text-align: left;">
                        THUẾ</p>
                </td>
                <td
                    style="width:122px;border-top-style:solid;border-top-width:1px;border-left-style:solid;border-left-width:1px;border-bottom-style:solid;border-bottom-width:1px;border-right-style:solid;border-right-width:1px">
                    <p class="s8"
                        style="padding-top: 1px;padding-left: 19px;text-indent: 0px;line-height: 15px;text-align: left;">
                        THÀNH TIỀN</p>
                </td>
                <td
                    style="width:134px;border-top-style:solid;border-top-width:1px;border-left-style:solid;border-left-width:1px;border-bottom-style:solid;border-bottom-width:1px;border-right-style:solid;border-right-width:1px">
                    <p class="s8"
                        style="padding-top: 1px;padding-left: 37px;text-indent: 0px;line-height: 15px;text-align: left;">
                        GHI CHÚ</p>
                </td>
            </tr>
            @php
                $index = 1;
            @endphp
            @foreach ($data['quoteExport'] as $item_quote)
                <tr style="height:19px">
                    <td
                        style="width:37px;border-top-style:solid;border-top-width:1px;border-left-style:solid;border-left-width:1px;border-bottom-style:solid;border-bottom-width:1px;border-right-style:solid;border-right-width:1px">
                        <p class="s4"
                            style="padding-left: 1px;text-indent: 0px;line-height: 14px;text-align: center;">
                            {{ $index }}
                        </p>
                    </td>
                    <td
                        style="width:122px;border-top-style:solid;border-top-width:1px;border-left-style:solid;border-left-width:1px;border-bottom-style:solid;border-bottom-width:1px;border-right-style:solid;border-right-width:1px">
                        <p style="text-indent: 0px;text-align: left;padding-left:3px;">{{ $item_quote->product_code }}
                        </p>
                    </td>
                    <td
                        style="width:373px;border-top-style:solid;border-top-width:1px;border-left-style:solid;border-left-width:1px;border-bottom-style:solid;border-bottom-width:1px;border-right-style:solid;border-right-width:1px">
                        <p style="text-indent: 0px;text-align: left;padding-left:3px;">{{ $item_quote->product_name }}
                        </p>
                    </td>
                    <td
                        style="width:55px;border-top-style:solid;border-top-width:1px;border-left-style:solid;border-left-width:1px;border-bottom-style:solid;border-bottom-width:1px;border-right-style:solid;border-right-width:1px">
                        <p class="s4"
                            style="padding-right: 18px;text-indent: 0px;line-height: 14px;text-align: center;">
                            {{ $item_quote->product_unit }}</p>
                    </td>
                    <td
                        style="width:35px;border-top-style:solid;border-top-width:1px;border-left-style:solid;border-left-width:1px;border-bottom-style:solid;border-bottom-width:1px;border-right-style:solid;border-right-width:1px">
                        <p class="s4"
                            style="padding-left: 1px;text-indent: 0px;line-height: 14px;text-align: center;">
                            {{ number_format($item_quote->product_qty) }}</p>
                    </td>
                    <td
                        style="width:100px;border-top-style:solid;border-top-width:1px;border-left-style:solid;border-left-width:1px;border-bottom-style:solid;border-bottom-width:1px;border-right-style:solid;border-right-width:1px">
                        <p style="text-indent: 0px;text-align: right;padding-right:3px;">
                            {{ number_format($item_quote->price_export) }}
                        </p>
                    </td>
                    <td
                        style="width:105px;border-top-style:solid;border-top-width:1px;border-left-style:solid;border-left-width:1px;border-bottom-style:solid;border-bottom-width:1px;border-right-style:solid;border-right-width:1px">
                        <p style="text-indent: 0px;text-align: center;">
                            @if ($item_quote->product_tax == 99)
                                NOVAT @else{{ $item_quote->product_tax . '%' }}
                            @endif
                        </p>
                    </td>
                    <td
                        style="width:122px;border-top-style:solid;border-top-width:1px;border-left-style:solid;border-left-width:1px;border-bottom-style:solid;border-bottom-width:1px;border-right-style:solid;border-right-width:1px">
                        <p style="text-indent: 0px;text-align: right;padding-right:3px;">
                            {{ number_format($item_quote->product_total) }}
                        </p>
                    </td>
                    <td
                        style="width:134px;border-top-style:solid;border-top-width:1px;border-left-style:solid;border-left-width:1px;border-bottom-style:solid;border-bottom-width:1px;border-right-style:solid;border-right-width:1px">
                        <p style="text-indent: 0px;text-align: left;padding-left:3px;">{{ $item_quote->product_note }}
                        </p>
                    </td>
                </tr>
                @php
                    $index++;
                @endphp
            @endforeach
            <tr style="height:33px">
                <td style="width:827px;border-top-style:solid;border-top-width:1px;border-left-style:solid;border-left-width:1px;border-bottom-style:solid;border-bottom-width:1px;border-right-style:solid;border-right-width:1px"
                    colspan="7">
                    <p class="s8" style="padding-top: 8px;padding-right: 2px;text-indent: 0px;text-align: right;">
                        GIÁ TRỊ TRƯỚC THUẾ (VND)</p>
                </td>
                <td
                    style="width:122px;border-top-style:solid;border-top-width:1px;border-left-style:solid;border-left-width:1px;border-bottom-style:solid;border-bottom-width:1px;border-right-style:solid;border-right-width:1px;vertical-align: middle;">
                    <p style="text-indent: 0px;text-align: right;padding-right:3px;">
                        {{ number_format($data['detailExport']->total_price) }}</p>
                </td>
                <td
                    style="width:134px;border-top-style:solid;border-top-width:1px;border-left-style:solid;border-left-width:1px;border-bottom-style:solid;border-bottom-width:1px;border-right-style:solid;border-right-width:1px">
                    <p style="text-indent: 0px;text-align: left;"></p>
                </td>
            </tr>
            <tr style="height:33px">
                <td style="width:827px;border-top-style:solid;border-top-width:1px;border-left-style:solid;border-left-width:1px;border-bottom-style:solid;border-bottom-width:1px;border-right-style:solid;border-right-width:1px"
                    colspan="7">
                    <p class="s8" style="padding-top: 8px;padding-right: 2px;text-indent: 0px;text-align: right;">
                        THUẾ VAT (VND)</p>
                </td>
                <td
                    style="width:122px;border-top-style:solid;border-top-width:1px;border-left-style:solid;border-left-width:1px;border-bottom-style:solid;border-bottom-width:1px;border-right-style:solid;border-right-width:1px;vertical-align: middle;">
                    <p style="text-indent: 0px;text-align: right;padding-right:3px;">
                        {{ number_format($data['detailExport']->total_tax) }}
                    </p>
                </td>
                <td
                    style="width:134px;border-top-style:solid;border-top-width:1px;border-left-style:solid;border-left-width:1px;border-bottom-style:solid;border-bottom-width:1px;border-right-style:solid;border-right-width:1px">
                    <p style="text-indent: 0px;text-align: left;"><br></p>
                </td>
            </tr>
            <tr style="height:33px">
                <td style="width:827px;border-top-style:solid;border-top-width:1px;border-left-style:solid;border-left-width:1px;border-bottom-style:solid;border-bottom-width:1px;border-right-style:solid;border-right-width:1px"
                    colspan="7">
                    <p class="s8" style="padding-top: 8px;padding-right: 2px;text-indent: 0px;text-align: right;">
                        TỔNG CỘNG (VND)</p>
                </td>
                <td
                    style="width:122px;border-top-style:solid;border-top-width:1px;border-left-style:solid;border-left-width:1px;border-bottom-style:solid;border-bottom-width:1px;border-right-style:solid;border-right-width:1px;vertical-align: middle;">
                    <p style="text-indent: 0px;text-align: right;padding-right:3px;">
                        {{ number_format($data['detailExport']->total_tax + $data['detailExport']->total_price) }}</p>
                </td>
                <td
                    style="width:134px;border-top-style:solid;border-top-width:1px;border-left-style:solid;border-left-width:1px;border-bottom-style:solid;border-bottom-width:1px;border-right-style:solid;border-right-width:1px">
                    <p style="text-indent: 0px;text-align: left;"><br></p>
                </td>
            </tr>
        </tbody>
    </table>
    <h1 style="padding-top: 4px;padding-left: 8px;text-indent: 0px;text-align: left;">Các điều khoản<span
            class="s9"> :</span></h1>
    <p style="text-indent: 0px;text-align: left;"><br></p>
    <table style="border-collapse:collapse;margin-left:5.68399px" cellspacing="0">
        <tbody>
            <tr style="height:23px">
                <td style="width:722px;" colspan="2">
                    <p class="s10"
                        style="padding-top: 6px;padding-left: 2px;text-indent: 0px;line-height: 16px;text-align: left;">
                        Hàng hóa và phương thức giao hàng</p>
                </td>
            </tr>
            <tr style="height:23px">
                <td style="width:120px;">
                    <p class="s8"
                        style="padding-top: 2px;padding-left: 4px;text-indent: 0px;line-height: 15px;text-align: left;">
                        Hàng hóa:</p>
                </td>
                <td style="width:563px;">
                    <p class="s4"
                        style="padding-top: 2px;padding-left: 1px;text-indent: 0px;line-height: 15px;text-align: left;">
                        {{ $data['detailExport']->goods }}</p>
                </td>
            </tr>
            <tr style="height:23px">
                <td style="width:120px;">
                    <p class="s8"
                        style="padding-top: 2px;padding-left: 4px;text-indent: 0px;line-height: 15px;text-align: left;">
                        Giao hàng:</p>
                </td>
                <td style="width:563px;">
                    <p class="s4"
                        style="padding-top: 2px;padding-left: 1px;text-indent: 0px;line-height: 15px;text-align: left;">
                        {{ $data['detailExport']->delivery }}</p>
                </td>
            </tr>
            <tr style="height:23px">
                <td style="width:120px;">
                    <p class="s8"
                        style="padding-top: 2px;padding-left: 4px;text-indent: 0px;line-height: 15px;text-align: left;">
                        Địa điểm:</p>
                </td>
                <td style="width:563px;">
                    <p class="s4"
                        style="padding-top: 2px;padding-left: 1px;text-indent: 0px;line-height: 15px;text-align: left;">
                        {{ $data['detailExport']->location }}</p>
                </td>
            </tr>
        </tbody>
    </table>
    <p style="text-indent: 0px;text-align: left;"><br></p>
    <p style="text-indent: 0px;text-align: left;"><br></p>
    <table style="border-collapse:collapse;margin-left:5.68399px" cellspacing="0">
        <tbody>
            <tr style="height:23px">
                <td style="width:722px;" colspan="2">
                    <p class="s10"
                        style="padding-top: 6px;padding-left: 4px;text-indent: 0px;line-height: 16px;text-align: left;">
                        Thông tin thanh toán</p>
                </td>
            </tr>
            <tr style="height:23px">
                <td style="width:120px;">
                    <p class="s8"
                        style="padding-top: 2px;padding-left: 4px;text-indent: 0px;line-height: 15px;text-align: left;">
                        Hiệu lực:</p>
                </td>
                <td style="width:563px;">
                    <p class="s4"
                        style="padding-top: 2px;padding-left: 1px;text-indent: 0px;line-height: 15px;text-align: left;">
                        {{ $data['detailExport']->price_effect }}</p>
                </td>
            </tr>
            <tr style="height:23px">
                <td style="width:120px;">
                    <p class="s8"
                        style="padding-top: 2px;padding-left: 4px;text-indent: 0px;line-height: 15px;text-align: left;">
                        Phương thức:</p>
                </td>
                <td style="width:563px;">
                    <p class="s4"
                        style="padding-top: 2px;padding-left: 1px;text-indent: 0px;line-height: 15px;text-align: left;">
                        {{ $data['detailExport']->terms_pay }}</p>
                </td>
            </tr>
            <tr style="height:23px">
                <td style="width:120px;">
                    <p class="s8"
                        style="padding-top: 2px;padding-left: 4px;text-indent: 0px;line-height: 15px;text-align: left;">
                        Hình thức:</p>
                </td>
                <td style="width:563px;">
                    <p class="s4"
                        style="padding-top: 2px;padding-left: 1px;text-indent: 0px;line-height: 15px;text-align: left;">
                        Chuyển khoản</p>
                </td>
            </tr>
            <tr style="height:23px">
                <td style="width:120px;" rowspan="2">
                    <p class="s8" style="padding-top: 2px;padding-left: 4px;text-indent: 0px;text-align: left;">
                        Tài khoản:</p>
                </td>
                <td style="width:563px;">
                    <p class="s4"
                        style="padding-top: 2px;padding-left: 1px;text-indent: 0px;line-height: 15px;text-align: left;">
                        CÔNG TY CỔ PHẦN THƯƠNG MẠI DỊCH VỤ RINGNET</p>
                </td>
            </tr>
            <tr style="height:23px">
                <td style="width:563px;">
                    <p class="s4"
                        style="padding-top: 2px;padding-left: 1px;text-indent: 0px;line-height: 15px;text-align: left;">
                        STK: 0721000655617 tại VCB chi nhánh Kỳ Đồng</p>
                </td>
            </tr>
        </tbody>
    </table>
    <p style="text-indent: 0px;text-align: left;"><br></p>
    <p style="text-indent: 0px;text-align: left;"><br></p>
    <table style="border-collapse:collapse;margin-left:5.68399px" cellspacing="0">
        <tbody>
            <tr style="height:23px">
                <td style="width:722px;" colspan="2">
                    <p class="s10" style="padding-top: 2px;padding-left: 4px;text-indent: 0px;text-align: left;">
                        Mọi thắc mắc vui lòng liên hệ:</p>
                </td>
            </tr>
            <tr style="height:23px">
                <td style="width:120px;">
                    <p class="s8"
                        style="padding-top: 2px;padding-left: 4px;text-indent: 0px;line-height: 15px;text-align: left;">
                        Họ tên:</p>
                </td>
                <td style="width:563px;">
                    <p class="s4"
                        style="padding-top: 2px;padding-left: 1px;text-indent: 0px;line-height: 15px;text-align: left;">
                        Vũ Vĩ Ân</p>
                </td>
            </tr>
            <tr style="height:23px">
                <td style="width:120px;">
                    <p class="s8"
                        style="padding-top: 2px;padding-left: 4px;text-indent: 0px;line-height: 15px;text-align: left;">
                        Email:</p>
                </td>
                <td style="width:563px;">
                    <p style="padding-top: 2px;padding-left: 1px;text-indent: 0px;line-height: 15px;text-align: left;">
                        <a href="mailto:vincent.vu@ringnet.vn" class="s6">vincent.vu@ringnet.vn</a>
                    </p>
                </td>
            </tr>
            <tr style="height:23px">
                <td style="width:120px;">
                    <p class="s8"
                        style="padding-top: 2px;padding-left: 4px;text-indent: 0px;line-height: 15px;text-align: left;">
                        Hotline:</p>
                </td>
                <td style="width:563px;">
                    <p class="s4"
                        style="padding-top: 2px;padding-left: 1px;text-indent: 0px;line-height: 15px;text-align: left;">
                        0933747371</p>
                </td>
            </tr>
        </tbody>
    </table>
    {{-- <span style="">
        <div class="">
            <p style="padding-top: 5px;"><span class="h2" style=" background-color: #C0504D;">
                    BÊN BÁN </span><span class="s11"></span></p>
        </div>
        <div class="">
            <p style="padding-top: 5px;"><span class="s11">
                </span><span class="h2" style=" background-color: #C0504D;"> BÊN MUA </span></p>
        </div>
    </span> --}}
    <div style="width: 100%; padding-top: 30px; text-align: center;">
        <div style="display: inline-block; width: 30%; margin: 0 5% 0 -5%; ">
            <p style="">BÊN BÁN</p>
            <p>(Đóng mộc, Ký &amp; Ghi rõ
                họ tên)</p>
        </div>
        <div style="display: inline-block; width: 30%; margin: 0 0 0 15%;">
            <p style="">BÊN MUA</p>
            <p>(Đóng mộc, Ký &amp; Ghi rõ
                họ tên)</p>
        </div>

    </div>
    {{-- <div style="width: 100%;text-align: center;">
        <div style="display: inline-block; width: 20%; margin: 0 5% 0 10%;"></div>
        <p >(Đóng mộc, Ký &amp; Ghi rõ
            họ tên)</p>
        <p style="display: inline-block; width: 20%; margin: 0 10% 0 5%;">(Đóng mộc, Ký &amp; Ghi rõ
            họ tên)</p>
    </div> --}}
</body>

</html>
