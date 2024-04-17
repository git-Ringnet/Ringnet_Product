<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="vi" lang="vi">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>index</title>
    <meta name="author" content="Microsoft Office User">
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
            text-indent: 0;
            font-family: DejaVu Sans, sans-serif;
        }

        h2 {
            color: #1F3863;

            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 18px;
        }

        p {
            color: #1F3863;

            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 12px;
            margin: 0px;
        }

        .a,
        a {
            color: #1F3863;

            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 12px;
        }

        .s2 {
            color: #1F3863;

            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 12px;
            vertical-align: -1px;
        }

        h1 {
            color: black;

            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 24px;
        }

        .s3 {
            color: black;

            font-style: italic;
            font-weight: normal;
            text-decoration: none;
            font-size: 12.5px;
        }

        .s4 {
            color: black;

            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 14px;
        }

        .s5 {
            color: black;

            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 14px;
        }

        .s6 {
            color: black;

            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 13.5px;
        }

        .s7 {
            color: black;

            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 13.5px;
        }

        .s8 {
            color: black;

            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 13px;
        }

        .s9 {
            color: black;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 12px;
        }

        .s10 {
            color: black;

            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 12px;
        }

        table,
        tbody {
            vertical-align: top;
            overflow: visible;
        }

        body {
            background-size: 50%;
        }
    </style>
</head>

<body style="padding-top:100px;padding-left: 7.5%; position: relative;">
    <p style="text-indent: 0px;line-height: 1px;text-align: left;"></p>
    <p style="text-indent: 0px;text-align: left;"><br></p>
    {{-- <hr style="width:92%;opacity: .5;"> --}}
    <h1 style="padding-top: 4px;padding-left: 235px;text-indent: 0px;text-align: left;">BIÊN BẢN BÀN GIAO</h1>
    <p class="s3" style="padding-top: 14px;padding-left: 210px;text-indent: 0px;text-align: left;">
        Thành phố Hồ Chí Minh, ngày {{ \Carbon\Carbon::parse($data['date'])->day }}
        tháng {{ \Carbon\Carbon::parse($data['date'])->month }} năm {{ \Carbon\Carbon::parse($data['date'])->year }}
    </p>
    <p style="text-indent: 0px;text-align: left;"><br></p>
    <table style="border-collapse:collapse;margin-left:13.884px" cellspacing="0">
        <tbody>
            <tr style="height:104px">
                <td style="width:110px">
                    <p class="s4" style="padding-left: 2px;text-indent: 0px;text-align: left;height:19px;">BÊN A:
                    </p>
                    <p style="text-indent: 0px;text-align: left;"><br></p>
                    <p class="s5" style="padding-left: 2px;text-indent: 0px;text-align: left;height:19px;">Địa chỉ:
                    </p>
                    <p class="s5"
                        style="padding-top: 15px;padding-left: 2px;text-indent: 0px;line-height: 28px;text-align: left;">
                        <span>Mã số thuế:<br><b>Đại diện:</b></span><b></b>
                    </p>
                </td>
                <td style="width:431px">
                    <p class="s6" style="padding-left: 45px;text-indent: 0px;text-align: left;height:19px;">
                        {{ $data['delivery']->guest_name }}</p>
                    <p style="text-indent: 0px;text-align: left;"><br></p>
                    <p class="s5"
                        style="width:95%;padding-left: 45px;text-indent: 0px;text-align: left;height:19px;">
                        {{ $data['delivery']->guest_address }}</p>
                    <p style="text-indent: 0px;text-align: left;"><br></p>
                    <p class="s7" style=" padding-top:10px;padding-left: 45px;text-indent: 0px;text-align: left;">
                        {{ $data['delivery']->guest_code }}</p>
                    <p style="text-indent: 0px;text-align: left;"><br></p>
                    <p class="s4"
                        style="width:120%;padding-left: 45px;text-indent: 0px;text-align: left;padding-top: 14px">
                        ……………………………………… Chức vụ: …………………………………….</p>
                </td>
            </tr>
            <p style="text-indent: 0px;text-align: left;"><br></p>
            <p style="text-indent: 0px;text-align: left;"><br></p>
            <tr style="height:131px">
                <td style="width:80px">
                    <p class="s4"
                        style="padding-top: 6px;padding-left: 2px;text-indent: 0px;text-align: left;height:19px;">BÊN
                        B:</p>
                    <p class="s5"
                        style="padding-left: 2px;text-indent: 0px;text-align: left;padding-top:5px;height:40px">Địa
                        chỉ<b>:</b></p>
                    <p class="s5"
                        style="padding-left: 2px;text-indent: 0px;line-height: 28px;text-align: left;padding-top:15px;">
                        <span>Mã số thuế:<br>Điện thoại:<br><b>Đại diện:</b></span><b></b>
                    </p>
                </td>
                <td style="width:500px">
                    <p class="s4"
                        style="padding-top: 6px;padding-left: 45px;text-indent: 0px;text-align: left;height:19px;">
                        {{ $data['workspace']->name_company }}</p>
                    <p class="s5"
                        style="width:100%;padding-left: 45px;text-indent: 0px;line-height: 190%;text-align: left;height:50px">
                        <span>{{ $data['workspace']->address_company }}</span>
                    </p>
                    <p class="s5" style="padding-left: 45px;text-indent: 0px;text-align: left;padding-top:19px;">
                        {{ $data['workspace']->mst }} </p>
                    <p style="text-indent: 0px;text-align: left;"><br></p>
                    <p class="s5" style="padding-left: 45px;text-indent: 0px;text-align: left;padding-top: 22px">
                        {{ Auth::user()->phone_number }} </p>
                    <p class="s4"
                        style="width:120%;padding-left: 45px;text-indent: 0px;line-height: 13px;text-align: left;padding-top: 14px;
">
                        ……………………………………… Chức vụ: …………………………………….</p>
                </td>
            </tr>
        </tbody>
    </table>
    <p style="text-indent: 0px;text-align: left;"><br></p>
    <p style="text-indent: 0px;text-align: left;"><br></p>
    <p class="s10" style="padding-left:14px;text-indent: 0px;line-height: 13px;text-align: left;">Hai bên thống nhất
        lập biên bản
        hàng hóa do bên B bàn giao với các điều khoản sau đây:</p>
    <p style="text-indent: 0px;text-align: left;"><br></p>
    <p class="s10" style="padding-left: 47px;text-indent: 0px;text-align: left;">1. Bên B bàn giao đủ các thiết bị
        sau:</p>
    <p style="text-indent: 0px;text-align: left;"><br></p>
    <table style="border-collapse:collapse;margin-left:12.554px" cellspacing="0">
        <tbody>
            <tr style="height:23px">
                <td style="width:34px;border-top-style:solid;border-top-width:1px;border-left-style:solid;border-left-width:1px;border-bottom-style:solid;border-bottom-width:1px;border-right-style:solid;border-right-width:1px"
                    bgcolor="#d0cece">
                    <p class="s4"
                        style="padding-top: 4px;padding-left: 4px;padding-right: 4px;text-indent: 0px;text-align: center;">
                        STT</p>
                </td>
                <td style="width:357px;border-top-style:solid;border-top-width:1px;border-left-style:solid;border-left-width:1px;border-bottom-style:solid;border-bottom-width:1px;border-right-style:solid;border-right-width:1px"
                    bgcolor="#d0cece">
                    <p class="s4" style="padding-top: 4px;text-indent: 0px;text-align: center;">CHI TIẾT HÀNG HOÁ
                    </p>
                </td>
                <td style="width:60px;border-top-style:solid;border-top-width:1px;border-left-style:solid;border-left-width:1px;border-bottom-style:solid;border-bottom-width:1px;border-right-style:solid;border-right-width:1px"
                    bgcolor="#d0cece">
                    <p class="s4"
                        style="padding-top: 4px;padding-left: 4px;padding-right: 4px;text-indent: 0px;text-align: center;">
                        ĐVT</p>
                </td>
                <td style="width:50px;border-top-style:solid;border-top-width:1px;border-left-style:solid;border-left-width:1px;border-bottom-style:solid;border-bottom-width:1px;border-right-style:solid;border-right-width:1px"
                    bgcolor="#d0cece">
                    <p class="s4"
                        style="padding-top: 4px;padding-left: 10px;padding-right: 10px;text-indent: 0px;text-align: center;">
                        SL</p>
                </td>
                <td style="width:180px;border-top-style:solid;border-top-width:1px;border-left-style:solid;border-left-width:1px;border-bottom-style:solid;border-bottom-width:1px;border-right-style:solid;border-right-width:1px"
                    bgcolor="#d0cece">
                    <p class="s4" style="padding-top: 4px;padding-left: 43px;text-indent: 0px;text-align: left;">
                        GHI
                        CHÚ</p>
                </td>
            </tr>
            @php
                $index = 1;
            @endphp
            @foreach ($data['product'] as $item)
                <tr style="height:auto">
                    <td
                        style="width:34px;border-top-style:solid;border-top-width:1px;border-left-style:solid;border-left-width:1px;height:30px;vertical-align: middle; border-bottom-style:solid;border-bottom-width:1px;border-right-style:solid;border-right-width:1px">
                        <p class="s8" style="text-indent: 0px;text-align: center;"> {{ $index }}</p>
                    </td>
                    <td
                        style="width:267px;border-top-style:solid;border-top-width:1px;border-left-style:solid;border-left-width:1px;height:30px;vertical-align: middle; border-bottom-style:solid;border-bottom-width:1px;border-right-style:solid;border-right-width:1px">
                        <p class="s8" style="text-indent: 0px;text-align: left;padding-left:5px">
                            {{ $item->product_name }} </p>
                    </td>
                    <td
                        style="width:38px;border-top-style:solid;border-top-width:1px;border-left-style:solid;border-left-width:1px;height:30px;vertical-align: middle; border-bottom-style:solid;border-bottom-width:1px;border-right-style:solid;border-right-width:1px">
                        <p class="s8"
                            style="padding-left: 4px;padding-right: 4px;text-indent: 0px;text-align: center;">
                            {{ $item->product_unit }}</p>
                    </td>
                    <td
                        style="width:37px;border-top-style:solid;border-top-width:1px;border-left-style:solid;border-left-width:1px;height:30px;vertical-align: middle; border-bottom-style:solid;border-bottom-width:1px;border-right-style:solid;border-right-width:1px">
                        <p class="s8" style="text-indent: 0px;text-align: center;">
                            {{ number_format($item->deliver_qty) }}</p>
                    </td>
                    <td
                        style="width:141px;border-top-style:solid;border-top-width:1px;border-left-style:solid;border-left-width:1px;height:30px;vertical-align: middle; border-bottom-style:solid;border-bottom-width:1px;border-right-style:solid;border-right-width:1px">
                        {{-- <p class="s5"
                            style="padding-left: 5px;padding-right: 56px;text-indent: 0px;text-align: justify;">
                            <span>F4E2C6201E0F<br>F4E2C6201E61<br>F4E2C6201E56</span>
                        </p>
                        <p class="s5"
                            style="padding-left: 5px;text-indent: 0px;line-height: 13px;text-align: left;">
                            F4E2C620222E</p> --}}
                        <p class="s5" style="padding-left:4px">
                            @foreach ($data['serinumber'] as $item_seri)
                                @if ($item->product_id == $item_seri->product_id)
                                    {{ $item_seri->serinumber }}
                                    <br>
                                @endif
                            @endforeach
                        </p>
                    </td>
                </tr>
                @php
                    $index++;
                @endphp
            @endforeach
        </tbody>
    </table>
    <p style="text-indent: 0px;text-align: left;"><br></p>

    <p class="s10" style="padding-left: 47px;text-indent: 0px;line-height: 13px;text-align: left;">2. Toàn bộ hàng
        hóa được hai bên
        kiểm tra và đúng theo yêu cầu của bên A.</p>
    <p style="text-indent: 0px;text-align: left;"></p>
    <p class="s10" style="padding-top: 4px;padding-left: 47px;text-indent: 0px;text-align: left;">3. Biên bản này
        được lập thành 02 bản có giá trị như nhau, mỗi bên giữ 01 bản.</p>
    <p style="text-indent: 0px;text-align: left;"><br></p>
    <table style="border-collapse:collapse;margin-left:50.35px" cellspacing="0">
        <tbody>
            <tr style="height:30px">
                <td style="width:200px">
                    <p class="s4"
                        style="padding-left: 5px;text-indent: 0px;line-height: 13px;text-align: center;">
                        ĐẠI DIỆN BÊN A</p>
                    <p class="s5"
                        style="padding-top: 2px;padding-left: 2px;text-indent: 0px;line-height: 13px;text-align: center;">
                        (<i>Ký &amp; Ghi rõ họ tên</i>)</p>
                </td>
                <td style="width:450px">
                    <p class="s4"
                        style="padding-left: 130px;text-indent: 0px;line-height: 13px;text-align: center;">
                        ĐẠI DIỆN BÊN B</p>
                    <p class="s5"
                        style="padding-top: 2px;padding-left: 127px;text-indent: 0px;line-height: 13px;text-align: center;">
                        (<i>Ký &amp; Ghi rõ họ tên</i>)</p>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>
