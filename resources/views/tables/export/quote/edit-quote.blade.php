<x-navbar :title="$title" activeGroup="sell" activeName="quote" :workspacename="$workspacename"></x-navbar>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper m-0">
    <form action="{{ route('detailExport.update', ['workspace' => $workspacename, 'detailExport' => $detailExport->maBG]) }}"
        method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{ $detailExport->maBG }}" name="detailexport_id">
        <!-- Content Header (Page header) -->
        <section class="content-header-fixed p-0 margin-250">
            <div class="content__header--inner margin-left32">
                <div class="content__heading--left">
                    <span>Bán hàng</span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z" fill="#26273B" fill-opacity="0.8"/>
                        </svg>
                    </span>
                    <span class="nearLast-span">Đơn báo giá</span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z" fill="#26273B" fill-opacity="0.8"/>
                        </svg>
                    </span>
                    <span class="last-span">{{ $detailExport->quotation_number }}</span>
                    @if ($detailExport->tinhTrang == 1)
                        <span style="color: #858585; font-size:13px;" class="btn-status">Nháp</span>
                    @else
                        <span style="color: #0052CC; font-size:13px;" class="btn-status">Chính thức</span>
                    @endif
                </div>
                <div class="d-flex content__heading--right">
                    <a href="#">
                        <button type="reset" class="btn-destroy btn-light mx-2 d-flex align-items-center h-100" >
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                    <path d="M2.96967 2.96967C3.26256 2.67678 3.73744 2.67678 4.03033 2.96967L8 6.939L11.9697 2.96967C12.2626 2.67678 12.7374 2.67678 13.0303 2.96967C13.3232 3.26256 13.3232 3.73744 13.0303 4.03033L9.061 8L13.0303 11.9697C13.2966 12.2359 13.3208 12.6526 13.1029 12.9462L13.0303 13.0303C12.7374 13.3232 12.2626 13.3232 11.9697 13.0303L8 9.061L4.03033 13.0303C3.73744 13.3232 3.26256 13.3232 2.96967 13.0303C2.67678 12.7374 2.67678 12.2626 2.96967 11.9697L6.939 8L2.96967 4.03033C2.7034 3.76406 2.6792 3.3474 2.89705 3.05379L2.96967 2.96967Z" fill="#6D7075"/>
                                </svg>
                            </span>
                            <span class="text-btnIner-primary ml-2">Hủy</span>
                        </button>
                    </a>
                    <button type="submit" name="action1" value="action_1" onclick="kiemTraFormGiaoHang(event);"
                        class="custom-btn d-flex align-items-center h-100" id="btn-submit" style="margin-right:10px">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M6.75 1V6.75C6.75 7.5297 7.34489 8.17045 8.10554 8.24313L8.25 8.25H14V13C14 14.1046 13.1046 15 12 15H4C2.89543 15 2 14.1046 2 13V3C2 1.89543 2.89543 1 4 1H6.75ZM8 1L14 7.03022H9C8.44772 7.03022 8 6.5825 8 6.03022V1Z" fill="white"/>
                            </svg>
                        </span>
                        <input type="hidden" id="hiddenAction" name="action" value="action_1">
                        <span class="text-btnIner-primary ml-2">Lưu</span>
                    </button>
                    <button id="sideGuest" type="button" class="btn-option border-0">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect x="16" width="16" height="16" rx="5" transform="rotate(90 16 0)"
                                fill="#ECEEFA" />
                            <path
                                d="M15 11C15 13.2091 13.2091 15 11 15L5 15C2.7909 15 1 13.2091 1 11L1 5C1 2.79086 2.7909 1 5 1L11 1C13.2091 1 15 2.79086 15 5L15 11ZM10 13.5L10 2.5L5 2.5C3.6193 2.5 2.5 3.61929 2.5 5L2.5 11C2.5 12.3807 3.6193 13.5 5 13.5H10Z"
                                fill="#26273B" fill-opacity="0.8" />
                        </svg>
                    </button>
                </div>
            </div>
        </section>
        <!-- Main content -->
        <section class="content margin-top-fixed2">
                <div class="container-fluided margin-250">
                    <div class="row">
                        <div class="col-12 col-xl-9 col-lg-12 col-sm-12 col-md-12 p-0 pl-2">
                            <div class="info-chung">
                                <div class="bg-filter-search border-top-0 text-center border-custom">
                                    <p class="font-weight-bold text-uppercase info-chung--heading text-center">THÔNG TIN SẢN PHẨM</p>
                                </div>  
                                <div class="content-info position-relative table-responsive text-nowrap">
                                    <table class="table table-hover bg-white rounded">
                                        <thead>
                                            <tr style="height:44px;">
                                                <th class="border-right p-0 px-2 text-13" style="width:15%;">
                                                    <span class="mx-1 mr-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                                            <path d="M6.37 7.63C6.49289 7.75305 6.56192 7.91984 6.56192 8.09375C6.56192 8.26766 6.49289 8.43445 6.37 8.5575L4.375 10.5L5.46875 11.5938C5.46875 11.7678 5.39961 11.9347 5.27654 12.0578C5.15347 12.1809 4.98655 12.25 4.8125 12.25H2.40625C2.2322 12.25 2.06528 12.1809 1.94221 12.0578C1.81914 11.9347 1.75 11.7678 1.75 11.5938V9.1875C1.75 9.01345 1.81914 8.84653 1.94221 8.72346C2.06528 8.60039 2.2322 8.53125 2.40625 8.53125L3.5 9.625L5.4425 7.63C5.56555 7.50711 5.73234 7.43808 5.90625 7.43808C6.08016 7.43808 6.24695 7.50711 6.37 7.63ZM7.63 6.37C7.50711 6.24695 7.43808 6.08016 7.43808 5.90625C7.43808 5.73234 7.50711 5.56555 7.63 5.4425L9.625 3.5L8.53125 2.40625C8.53125 2.2322 8.60039 2.06528 8.72346 1.94221C8.84653 1.81914 9.01345 1.75 9.1875 1.75H11.5938C11.7678 1.75 11.9347 1.81914 12.0578 1.94221C12.1809 2.06528 12.25 2.2322 12.25 2.40625V4.8125C12.25 4.98655 12.1809 5.15347 12.0578 5.27654C11.9347 5.39961 11.7678 5.46875 11.5938 5.46875L10.5 4.375L8.5575 6.37C8.43445 6.49289 8.26766 6.56192 8.09375 6.56192C7.91984 6.56192 7.75305 6.49289 7.63 6.37Z" fill="#26273B" fill-opacity="0.8"/>
                                                        </svg>
                                                    </span>
                                                    <span class="pl-3">Mã sản phẩm</span>
                                                </th>
                                                <th class="border-right p-0 px-2 text-13" style="width:17%;" >Tên sản phẩm</th>
                                                <th class="border-right p-0 px-2 text-13" style="width:7%;">Đơn vị</th>
                                                <th class="border-right p-0 px-2 text-center text-13" style="width:10%;">Số lượng</th>
                                                <th class="border-right p-0 px-2 text-right text-13" style="width:10%;">Đơn giá</th>
                                                <th class="border-right p-0 px-2 text-center text-13" style="width:10%;">Thuế</th>
                                                <th class="border-right p-0 px-1 text-center text-13"style="width:15%;">Thành tiền</th>
                                                <th class="border-right p-0 px-2 text-center note text-13">Ghi chú sản phẩm</th>
                                                <th class="border-right p-0 px-2 text-center note text-13"></th>
                                            </tr>
                                        </thead>
                                        <tbody>     
                                            @foreach ($quoteExport as $item_quote)
                                                <tr class="bg-white addProduct" style="height:80px;">
                                                    <td class='border-right p-2 text-13 align-top' style="">
                                                        <span class="ml-1 mr-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="6" height="10" viewBox="0 0 6 10" fill="none">
                                                                <g clip-path="url(#clip0_1710_10941)">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M1 8C1.55228 8 2 8.44772 2 9C2 9.55228 1.55228 10 1 10C0.447715 10 0 9.55228 0 9C0 8.44772 0.447715 8 1 8ZM5 8C5.55228 8 6 8.44772 6 9C6 9.55228 5.55228 10 5 10C4.44772 10 4 9.55228 4 9C4 8.44772 4.44772 8 5 8ZM1 4C1.55228 4 2 4.44772 2 5C2 5.55228 1.55228 6 1 6C0.447715 6 0 5.55228 0 5C0 4.44772 0.447715 4 1 4ZM5 4C5.55228 4 6 4.44772 6 5C6 5.55228 5.55228 6 5 6C4.44772 6 4 5.55228 4 5C4 4.44772 4.44772 4 5 4ZM1 0C1.55228 0 2 0.447715 2 1C2 1.55228 1.55228 2 1 2C0.447715 2 0 1.55228 0 1C0 0.447715 0.447715 0 1 0ZM5 0C5.55228 0 6 0.447715 6 1C6 1.55228 5.55228 2 5 2C4.44772 2 4 1.55228 4 1C4 0.447715 4.44772 0 5 0Z" fill="#282A30"/>
                                                                </g>
                                                                <defs>
                                                                    <clipPath id="clip0_1710_10941">
                                                                        <rect width="6" height="10" fill="white"/>
                                                                    </clipPath>
                                                                </defs>
                                                            </svg>
                                                        </span>
                                                        <input type="checkbox" class="cb-element checkall-btn">
                                                        <input type="text" autocomplete="off"
                                                                value="{{ $item_quote->product_code }}"
                                                                class="border-0 px-2  py-1 w-75 product_code"
                                                                name="product_code[]">
                                                    </td>

                                                    <td class='border-right p-2 text-13 align-top position-relative'>
                                                        <ul class='list_product bg-white position-absolute w-100 rounded shadow p-0 scroll-data' 
                                                                style='z-index: 99;top: 44%;left: 0%;display: none;'>
                                                            @foreach ($product as $product_value)
                                                                <li>
                                                                    <a href='javascript:void(0);' 
                                                                        class='text-dark d-flex justify-content-between p-2 idProduct w-100' 
                                                                        id='{{ $product_value->id }}' name='idProduct'> 
                                                                        <span class='w-50 text-13-black'>{{ $product_value->product_name }}</span> 
                                                                    </a> 
                                                                </li> 
                                                            @endforeach 
                                                        </ul> 
                                                        <div class='d-flex align-items-center'> 
                                                            <input type='text' class='border-0 px-2 py-1 w-100 product_name' 
                                                                autocomplete='off' required name='product_name[]' value="{{ $item_quote->product_name }}"> 

                                                            <input type='hidden' class='product_id' autocomplete='off' 
                                                                value="{{ $item_quote->product_id }}" name="product_id[]"> 

                                                            <div class='info-product' style='display: none;' data-toggle='modal' data-target='#productModal'> 
                                                                <svg xmlns='http://www.w3.org/2000/svg' width='14' height='14' viewBox='0 0 14 14' fill='none'>                                     
                                                                    <g clip-path='url(#clip0_2559_39956)'>                                         
                                                                    <path d='M6.99999 1.48362C5.53706 1.48362 4.13404 2.06477 3.09959 3.09922C2.06514 4.13367 1.48399 5.53669 1.48399 6.99963C1.48399 8.46256 2.06514 9.86558 3.09959 10.9C4.13404 11.9345 5.53706 12.5156 6.99999 12.5156C8.46292 12.5156 9.86594 11.9345 10.9004 10.9C11.9348 9.86558 12.516 8.46256 12.516 6.99963C12.516 5.53669 11.9348 4.13367 10.9004 3.09922C9.86594 2.06477 8.46292 1.48362 6.99999 1.48362ZM0.265991 6.99963C0.265991 5.21366 0.975464 3.50084 2.23833 2.23797C3.5012 0.975098 5.21402 0.265625 6.99999 0.265625C8.78596 0.265625 10.4988 0.975098 11.7616 2.23797C13.0245 3.50084 13.734 5.21366 13.734 6.99963C13.734 8.78559 13.0245 10.4984 11.7616 11.7613C10.4988 13.0242 8.78596 13.7336 6.99999 13.7336C5.21402 13.7336 3.5012 13.0242 2.23833 11.7613C0.975464 10.4984 0.265991 8.78559 0.265991 6.99963Z' fill='#282A30'/>                                         <path d='M7.07004 4.34488C6.92998 4.33528 6.78944 4.35459 6.65715 4.40161C6.52487 4.44863 6.40367 4.52236 6.30109 4.61821C6.19851 4.71406 6.11674 4.82999 6.06087 4.95878C6.00499 5.08757 5.9762 5.22648 5.97629 5.36688C5.97629 5.52851 5.91208 5.68352 5.79779 5.79781C5.6835 5.91211 5.52849 5.97631 5.36685 5.97631C5.20522 5.97631 5.05021 5.91211 4.93592 5.79781C4.82162 5.68352 4.75742 5.52851 4.75742 5.36688C4.75733 4.9557 4.87029 4.55241 5.08394 4.2011C5.2976 3.84979 5.60373 3.56398 5.96886 3.37492C6.33399 3.18585 6.74408 3.10081 7.15428 3.12909C7.56449 3.15737 7.95902 3.29788 8.29475 3.53526C8.63049 3.77265 8.8945 4.09776 9.05792 4.47507C9.22135 4.85237 9.2779 5.26735 9.22139 5.67462C9.16487 6.0819 8.99748 6.4658 8.7375 6.78436C8.47753 7.10292 8.13497 7.34387 7.74729 7.48088C7.70694 7.49534 7.67207 7.52196 7.64747 7.55706C7.62287 7.59216 7.60975 7.63402 7.60992 7.67688V8.22463C7.60992 8.38626 7.54571 8.54127 7.43142 8.65557C7.31712 8.76986 7.16211 8.83407 7.00048 8.83407C6.83885 8.83407 6.68383 8.76986 6.56954 8.65557C6.45525 8.54127 6.39104 8.38626 6.39104 8.22463V7.67688C6.39096 7.38197 6.48229 7.0943 6.65247 6.85345C6.82265 6.6126 7.0633 6.43042 7.34129 6.332C7.56313 6.25339 7.7511 6.10073 7.87356 5.89975C7.99603 5.69877 8.0455 5.46172 8.01366 5.22853C7.98181 4.99534 7.87059 4.78025 7.69872 4.61946C7.52685 4.45867 7.30483 4.36114 7.07004 4.34488Z' fill='#282A30'/>                                         <path d='M7.04382 10.1242C7.00228 10.1242 6.96245 10.1408 6.93307 10.1701C6.9037 10.1995 6.8872 10.2393 6.8872 10.2809C6.8872 10.3224 6.9037 10.3623 6.93307 10.3916C6.96245 10.421 7.00228 10.4375 7.04382 10.4375C7.08536 10.4375 7.1252 10.421 7.15457 10.3916C7.18395 10.3623 7.20045 10.3224 7.20045 10.2809C7.20045 10.2393 7.18395 10.1995 7.15457 10.1701C7.1252 10.1408 7.08536 10.1242 7.04382 10.1242ZM7.04382 10.9371C7.13 10.9371 7.21534 10.9201 7.29496 10.8872C7.37458 10.8542 7.44692 10.8059 7.50786 10.7449C7.5688 10.684 7.61714 10.6116 7.65012 10.532C7.6831 10.4524 7.70007 10.3671 7.70007 10.2809C7.70007 10.1947 7.6831 10.1094 7.65012 10.0297C7.61714 9.95012 7.5688 9.87777 7.50786 9.81684C7.44692 9.7559 7.37458 9.70756 7.29496 9.67458C7.21534 9.6416 7.13 9.62462 7.04382 9.62462C6.86977 9.62462 6.70286 9.69376 6.57978 9.81684C6.45671 9.93991 6.38757 10.1068 6.38757 10.2809C6.38757 10.4549 6.45671 10.6218 6.57978 10.7449C6.70286 10.868 6.86977 10.9371 7.04382 10.9371Z' fill='#282A30'/>                                     </g>                                     <defs>                                         <clipPath id='clip0_2559_39956'>                                             <rect width='14' height='14' fill='white'/>                                         </clipPath>                                     </defs>                                 
                                                                </svg>                             
                                                            </div>                     
                                                        </div>                                                     
                                                    </td>

                                                    <td class='border-right p-2 text-13 align-top'>
                                                        <input type='text' autocomplete='off' value="{{ $item_quote->product_unit }}"
                                                                class='border-0 px-2 py-1 w-100 product_unit' readonly name='product_unit[]'>
                                                    </td>  

                                                    <td class='border-right p-2 text-13 align-top'>
                                                            <div>
                                                                <input type='text' class='text-right border-0 px-2 py-1 w-100 quantity-input' 
                                                                        value="{{ is_int($item_quote->product_qty) ? $item_quote->product_qty : rtrim(rtrim(number_format($item_quote->product_qty, 4, '.', ''), '0'), '.') }}"
                                                                        autocomplete='off' required name='product_qty[]'>
                                                                <input type='hidden' class='tonkho'>
                                                            </div>
                                                            <div class='mt-3 text-13-blue inventory'>Tồn kho: <span class='pl-1 soTonKho'>35</span></div>
                                                    </td>

                                                    <td class='border-right p-2 text-13 align-top'>
                                                            <div>
                                                                <input type='text' class='text-right border-0 px-2 py-1 w-100 product_price' autocomplete='off' 
                                                                    name='product_price[]' required value="{{ number_format($item_quote->price_export) }}">
                                                            </div>
                                                            <div class='mt-3 text-13-blue transaction'>Giao dịch gần đây</div>
                                                    </td>

                                                    <td class='border-right p-2 text-13 align-top'>
                                                            <select name='product_tax[]' class='border-0 px-2 py-1 w-100 text-left product_tax' required="">
                                                                <option value="0" <?php if ($item_quote->product_tax == 0) { echo 'selected';} ?>>0% </option>
                                                                <option value="8" <?php if ($item_quote->product_tax == 8) { echo 'selected'; } ?>>8%</option>
                                                                <option value="10" <?php if ($item_quote->product_tax == 10) {echo 'selected';} ?>>10%</option>
                                                                <option value="99" <?php if ($item_quote->product_tax == 99) {echo 'selected';} ?>>NOVAT</option>
                                                            </select>
                                                    </td>

                                                    <td class='border-right p-2 text-13 align-top'>
                                                            <input type='text' 
                                                                readonly value="{{ number_format($item_quote->product_total) }}"
                                                                class='text-right border-0 px-2 py-1 w-100 total-amount'>
                                                    </td>

                                                    <td class='border-right p-2 note text-13 align-top'>
                                                            <input type='text' name="product_note[]"
                                                                value="{{ $item_quote->product_note }}"
                                                                class='border-0 py-1 w-100' placeholder='Nhập ghi chú'>
                                                    </td>

                                                    <td class='border-right p-2 align-top'>
                                                        <svg width='17' height='17' viewBox='0 0 17 17' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                                            <path fill-rule='evenodd' clip-rule='evenodd' d='M13.1417 6.90625C13.4351 6.90625 13.673 7.1441 13.673 7.4375C13.673 7.47847 13.6682 7.5193 13.6589 7.55918L12.073 14.2992C11.8471 15.2591 10.9906 15.9375 10.0045 15.9375H6.99553C6.00943 15.9375 5.15288 15.2591 4.92702 14.2992L3.34113 7.55918C3.27393 7.27358 3.45098 6.98757 3.73658 6.92037C3.77645 6.91099 3.81729 6.90625 3.85826 6.90625H13.1417ZM9.03125 1.0625C10.4983 1.0625 11.6875 2.25175 11.6875 3.71875H13.8125C14.3993 3.71875 14.875 4.19445 14.875 4.78125V5.3125C14.875 5.6059 14.6371 5.84375 14.3438 5.84375H2.65625C2.36285 5.84375 2.125 5.6059 2.125 5.3125V4.78125C2.125 4.19445 2.6007 3.71875 3.1875 3.71875H5.3125C5.3125 2.25175 6.50175 1.0625 7.96875 1.0625H9.03125ZM9.03125 2.65625H7.96875C7.38195 2.65625 6.90625 3.13195 6.90625 3.71875H10.0938C10.0938 3.13195 9.61805 2.65625 9.03125 2.65625Z' fill='#6B6F76'/>
                                                        </svg>
                                                    </td>
                                                    <td style="display:none;" class="">
                                                        <input type="text" class="product_tax1">
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <section class="content margin-left32">
                                <div class="container-fluided ">
                                    <div class="d-flex">
                                        <button type="button" data-toggle="dropdown" id="add-field-btn"
                                            class="btn-save-print d-flex align-items-center h-100 py-1 px-2 rounded"
                                            style="margin-right:10px">
                                            <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                viewBox="0 0 18 18" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M9 0C9.58186 -2.96028e-08 10.0536 0.471694 10.0536 1.05356L10.0536 16.9464C10.0536 17.5283 9.58186 18 9 18C8.41814 18 7.94644 17.5283 7.94644 16.9464V1.05356C7.94644 0.471694 8.41814 -2.96028e-08 9 0Z"
                                                    fill="#42526E"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M18 9C18 9.58187 17.5283 10.0536 16.9464 10.0536H1.05356C0.471694 10.0536 -2.07219e-07 9.58187 0 9C-7.69672e-07 8.41814 0.471695 7.94644 1.05356 7.94644H16.9464C17.5283 7.94644 18 8.41814 18 9Z"
                                                    fill="#42526E"></path>
                                            </svg>
                                            <span class="text-table text-13-black">Thêm sản phẩm</span>
                                        </button>
                                        <button type="button" data-toggle="dropdown" id="add-field-btn"
                                            class="btn-save-print d-flex align-items-center h-100 py-1 px-2 rounded"
                                            style="margin-right:10px">
                                            <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                viewBox="0 0 18 18" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M9 0C9.58186 -2.96028e-08 10.0536 0.471694 10.0536 1.05356L10.0536 16.9464C10.0536 17.5283 9.58186 18 9 18C8.41814 18 7.94644 17.5283 7.94644 16.9464V1.05356C7.94644 0.471694 8.41814 -2.96028e-08 9 0Z"
                                                    fill="#42526E"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M18 9C18 9.58187 17.5283 10.0536 16.9464 10.0536H1.05356C0.471694 10.0536 -2.07219e-07 9.58187 0 9C-7.69672e-07 8.41814 0.471695 7.94644 1.05356 7.94644H16.9464C17.5283 7.94644 18 8.41814 18 9Z"
                                                    fill="#42526E"></path>
                                            </svg>
                                            <span class="text-table text-13-black">Thêm đầu mục</span>
                                        </button>
                                        <button type="button" data-toggle="dropdown"
                                            class="btn-save-print d-flex align-items-center h-100 py-1 px-2 rounded"
                                            style="margin-right:10px">
                                            <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                viewBox="0 0 18 18" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M9 0C9.58186 -2.96028e-08 10.0536 0.471694 10.0536 1.05356L10.0536 16.9464C10.0536 17.5283 9.58186 18 9 18C8.41814 18 7.94644 17.5283 7.94644 16.9464V1.05356C7.94644 0.471694 8.41814 -2.96028e-08 9 0Z"
                                                    fill="#42526E"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M18 9C18 9.58187 17.5283 10.0536 16.9464 10.0536H1.05356C0.471694 10.0536 -2.07219e-07 9.58187 0 9C-7.69672e-07 8.41814 0.471695 7.94644 1.05356 7.94644H16.9464C17.5283 7.94644 18 8.41814 18 9Z"
                                                    fill="#42526E"></path>
                                            </svg>
                                            <span class="text-table text-13-black">Thêm hàng loạt</span>
                                        </button>
                                        <button type="button" class="btn-option py-1 px-2 bg-white border-0">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M21 12C21 10.8954 20.1046 10 19 10C17.8954 10 17 10.8954 17 12C17 13.1046 17.8954 14 19 14C20.1046 14 21 13.1046 21 12Z"
                                                    fill="#42526E"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M14 12C14 10.8954 13.1046 10 12 10C10.8954 10 10 10.8954 10 12C10 13.1046 10.8954 14 12 14C13.1046 14 14 13.1046 14 12Z"
                                                    fill="#42526E"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M7 12C7 10.8954 6.10457 10 5 10C3.89543 10 3 10.8954 3 12C3 13.1046 3.89543 14 5 14C6.10457 14 7 13.1046 7 12Z"
                                                    fill="#42526E"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </section>
                            <div class="content">
                                <div class="row" style="width:95%;">
                                    <div class="position-relative col-lg-4 px-0"></div>
                                    <div class="position-relative col-lg-5 col-md-7 col-sm-12 margin-left180">
                                        <div class="m-3 ">
                                            <div class="d-flex justify-content-between">
                                                <span class="text-13-black">
                                                    Giá trị trước thuế:
                                                </span>
                                                <span id="total-amount-sum" class="text-13-black text-right">0đ</span>
                                            </div>
                                            <div class="d-flex justify-content-between mt-2">
                                                <span class="text-13-black">
                                                    Thuế VAT:
                                                </span>
                                                <span id="product-tax" class="text-13-black text-right">0đ</span>
                                            </div>
                                            <div class="d-flex justify-content-between mt-2">
                                                <span class="text-13-bold text-lg font-weight-bold">
                                                    Tổng cộng:
                                                </span>
                                                <span class="text-13-bold text-lg font-weight-bold text-right" id="grand-total" data-value="0">0đ</span>
                                                <input type="text" hidden="" name="totalValue" value="0" id="total"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-3 col-lg-12 col-sm-12 col-md-12 p-0 border">
                            <div class="info-chung" id="show_info_Guest" style="height:100vh;">
                                <div class="bg-filter-search border-0 text-center border-custom">
                                    <p class="font-weight-bold text-uppercase info-chung--heading text-center">THÔNG TIN KHÁCH HÀNG</p>
                                </div>
                                <div class="d-flex justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative" style="height:44px;" style="height:44px;">
                                        <span class="text-13 btn-click" style="flex: 1.5;">
                                            Khách hàng
                                        </span>
                                        <span class="mx-1 text-13" style="flex: 2;">
                                            <input type="text" placeholder="Chọn thông tin"
                                                value="{{ $detailExport->guest_name_display }}"
                                                class="border-0 w-100 bg-input-guest py-0 py-2 px-2 nameGuest" id="myInput"
                                                style="background-color:#F0F4FF; border-radius:4px;"
                                                autocomplete="off" required >
                                            <input type="hidden" class="idGuest" autocomplete="off" 
                                                value="{{ $detailExport->maKH }}" name="guest_id">
                                        </span>
                                        <div class="d-flex align-items-center justify-content-between border-0">
                                            <div id="myUL"
                                                class="bg-white position-absolute rounded shadow p-1 list-guest z-index-block"
                                                style="z-index: 99;display: none;">
                                                <div class="p-1">
                                                    <div class="position-relative">
                                                        <input type="text" placeholder="Nhập công ty"
                                                            class="pr-4 w-100 input-search bg-input-guest" id="companyFilter">
                                                        <span id="search-icon" class="search-icon"><i
                                                                class="fas fa-search text-table" aria-hidden="true"></i></span>
                                                    </div>
                                                </div>
                                                <ul class="m-0 p-0 scroll-data">
                                                    @foreach ($guest as $guest_value)
                                                        <li class="p-2 align-items-center text-wrap" style="border-radius:4px;border-bottom: 1px solid #d6d6d6;">
                                                            <a href="#" title="{{ $guest_value->guest_name_display }}" style="flex:2;"
                                                                id="{{ $guest_value->id }}" name="search-info" class="search-info" > 
                                                                    <span class="text-13-black">{{ $guest_value->guest_name_display }}</span>
                                                            </a>
                                                            <a type="button" data-toggle="modal" data-target="#guestModalEdit" >
                                                                <span>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                                                        <path d="M4.15625 1.75006C2.34406 1.75006 0.875 3.21912 0.875 5.03131V9.84377C0.875 11.656 2.34406 13.125 4.15625 13.125H8.96884C10.781 13.125 12.2501 11.656 12.2501 9.84377V7.00006C12.2501 6.63763 11.9563 6.34381 11.5938 6.34381C11.2314 6.34381 10.9376 6.63763 10.9376 7.00006V9.84377C10.9376 10.9311 10.0561 11.8125 8.96884 11.8125H4.15625C3.06894 11.8125 2.1875 10.9311 2.1875 9.84377V5.03131C2.1875 3.944 3.06894 3.06256 4.15625 3.06256H6.125C6.48743 3.06256 6.78125 2.76874 6.78125 2.40631C6.78125 2.04388 6.48743 1.75006 6.125 1.75006H4.15625Z" fill="black"/>
                                                                        <path d="M10.6172 4.54529L9.37974 3.30785L5.7121 6.97547C5.05037 7.6372 4.5993 8.48001 4.41577 9.3977C4.40251 9.46402 4.46099 9.52247 4.52733 9.50926C5.44499 9.32568 6.2878 8.87462 6.94954 8.21291L10.6172 4.54529Z" fill="black"/>
                                                                        <path d="M11.7739 1.27469C11.608 1.21937 11.4249 1.26257 11.3013 1.38627L10.3077 2.37977L11.5452 3.61721L12.5387 2.62371C12.6625 2.5 12.7056 2.31702 12.6503 2.15105C12.5124 1.73729 12.1877 1.41261 11.7739 1.27469Z" fill="black"/>
                                                                    </svg>
                                                                </span>
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                                <a type="button"
                                                    class="d-flex align-items-center p-2 position-sticky addGuestNew mt-2"
                                                    data-toggle="modal" data-target="#guestModal" style="bottom: 0;border-radius:4px;background-color:#F2F2F2;">
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                            <path d="M8.75 3C8.75 2.58579 8.41421 2.25 8 2.25C7.58579 2.25 7.25 2.58579 7.25 3V7.25H3C2.58579 7.25 2.25 7.58579 2.25 8C2.25 8.41421 2.58579 8.75 3 8.75H7.25V13C7.25 13.4142 7.58579 13.75 8 13.75C8.41421 13.75 8.75 13.4142 8.75 13V8.75H13C13.4142 8.75 13.75 8.41421 13.75 8C13.75 7.58579 13.4142 7.25 13 7.25H8.75V3Z" fill="#282A30"/>
                                                        </svg>
                                                    </span>
                                                    <span class="text-13-black pl-3 pt-1" style="font-weight: 600 !important;">Thêm khách hàng</span>
                                                </a>
                                            </div>
                                        </div>
                                </div>
                                <div class="">
                                    <div class="content-info--common" id="show-info-guest">
                                        <ul class="p-0 m-0">
                                            <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left position-relative" style="height:44px;">
                                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Người đại diện</span>

                                                <input class="text-13-black w-50 border-0 bg-input-guest" 
                                                    type="text" placeholder="Chọn thông tin" id="represent_guest"
                                                    style="flex:2;" alue="{{ $detailExport->represent_name }}">


                                                <input type="hidden" class="represent_guest_id" 
                                                    value="{{ $detailExport->represent_id }}" name="represent_guest_id"
                                                    autocomplete="off">

                                                <div id="myUL7"
                                                    class="bg-white position-absolute rounded shadow p-1 list-guest z-index-block"
                                                    style="z-index: 99;display: none;">
                                                    <div class="p-1">
                                                        <div class="position-relative">
                                                            <input type="text" placeholder="Nhập công ty"
                                                                class="pr-4 w-100 input-search bg-input-guest" id="companyFilter7">
                                                            <span id="search-icon" class="search-icon"><i
                                                                class="fas fa-search text-table" aria-hidden="true"></i></span>
                                                        </div>
                                                    </div>
                                                    <ul class="m-0 p-0 scroll-data" id="representativeList"></ul>
                                                    <a type="button"
                                                        class="d-flex align-items-center p-2 position-sticky addGuestNew mt-2"
                                                        data-toggle="modal" data-target="#guestModal" style="bottom: 0;border-radius:4px;background-color:#F2F2F2;">
                                                        <span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                                <path d="M8.75 3C8.75 2.58579 8.41421 2.25 8 2.25C7.58579 2.25 7.25 2.58579 7.25 3V7.25H3C2.58579 7.25 2.25 7.58579 2.25 8C2.25 8.41421 2.58579 8.75 3 8.75H7.25V13C7.25 13.4142 7.58579 13.75 8 13.75C8.41421 13.75 8.75 13.4142 8.75 13V8.75H13C13.4142 8.75 13.75 8.41421 13.75 8C13.75 7.58579 13.4142 7.25 13 7.25H8.75V3Z" fill="#282A30"/>
                                                            </svg>
                                                        </span>
                                                        <span class="text-13-black pl-3 pt-1" style="font-weight: 600 !important;">Thêm người đại diện</span>
                                                    </a>
                                                </div>
                                            </li>
                                            <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left" style="height:44px;">
                                                <span class="text-13 text-nowrap mr-3"style="flex: 1.5;">Số báo giá</span>
                                                <input class="text-13-black w-50 border-0 bg-input-guest" style="flex:2;" 
                                                    value="{{ $detailExport->quotation_number }}" name="quotation_number" />
                                            </li>
                                            <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left" style="height:44px;">
                                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Số tham chiếu</span>
                                                <input class="text-13-black w-50 border-0 bg-input-guest" 
                                                placeholder="Chọn thông tin" style="flex:2;" value="{{ $detailExport->reference_number }}" name="reference_number" />
                                            </li>
                                            <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left" style="height:44px;">
                                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Ngày báo giá</span>
                                                <input class="text-13-black w-50 border-0 bg-input-guest "
                                                    name="date_quote" style="flex:2;"  value="{{ date_format(new DateTime($detailExport->ngayBG), 'Y-m-d') }}" />
                                            </li>
                                            <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left position-relative" style="height:44px;">
                                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Hiệu lực báo giá</span>

                                                <input class="text-13-black w-50 border-0 bg-input-guest " placeholder="Chọn thông tin" name="price_effect" id="myInput-quote"
                                                    style="flex:2;"  value="{{ $detailExport->price_effect }}" 
                                                        value="{{ isset($dataForm['quote']) ? $dataForm['quote']->form_desc : '' }}"/>

                                                <input type="hidden" class="idDateForm" autocomplete="off" name="idDate[quote]"
                                                    value="{{ isset($dataForm['quote']) ? $dataForm['quote']->id : '' }}">

                                                <input type="hidden" class="nameDateForm" autocomplete="off"
                                                    name="fieldDate[quote]"
                                                    value="{{ isset($dataForm['quote']) ? $dataForm['quote']->form_field : '' }}">
                                                    <div id="myUL2"
                                                        class="bg-white position-absolute rounded shadow p-1 list-guest z-index-block"
                                                        style="z-index: 99;">
                                                        <div class="p-1">
                                                            <div class="position-relative">
                                                                <input type="text" placeholder="Nhập hiệu lực"
                                                                    class="pr-4 w-100 input-search bg-input-guest" id="companyFilter2">
                                                                <span id="search-icon" class="search-icon"><i
                                                                        class="fas fa-search text-table" aria-hidden="true"></i></span>
                                                            </div>
                                                        </div>
                                                        <ul class="m-0 p-0 scroll-data">
                                                        @foreach ($date_form as $item)
                                                            @if ($item->form_field == 'quote')
                                                                <li class="p-2 align-items-center text-wrap item-{{ $item->id }}" style="border-radius:4px;border-bottom: 1px solid #d6d6d6;">
                                                                    <a href="#"
                                                                        class="text-dark d-flex justify-content-between p-2 search-date-form"
                                                                        name="search-date-form"
                                                                        id="{{ $item->id }}" name="search-date-form"
                                                                        data-name="quote">
                                                                        <span class="w-100 text-13-black overflow-hidden" id="{{ $item->form_field . $item->id }}">
                                                                            {{ $item->form_name }}
                                                                        </span>
                                                                    </a>
                                                                    <div class="dropdown">
                                                                        <button type="button" data-toggle="dropdown"
                                                                                    class="btn-save-print d-flex align-items-center h-100 border-0 bg-transparent">
                                                                                    <i class="fa-solid fa-ellipsis"></i>
                                                                        </button>
                                                                        <div class="dropdown-menu date-form-setting p-0"
                                                                            style="z-index: 100;">
                                                                            <a class="dropdown-item search-date-form" data-toggle="modal"
                                                                                data-target="#formModalpayment" data-name="quote"
                                                                                data-id="{{ $item->id }}"
                                                                                id="{{ $item->id }}">
                                                                                <i class="fa-regular fa-pen-to-square"></i>
                                                                            </a>
                                                                            <a class="dropdown-item delete-item" 
                                                                                href="#"  data-id="{{ $item->id }}" data-name="{{ $item->form_field }}">
                                                                                <i class="fa-solid fa-trash-can"></i>
                                                                            </a>
                                                                            <a class="dropdown-item set-default default-id{{ $item->form_field }}" data-id="{{ $item->id }}"
                                                                                data-name="{{ $item->form_field }}" href="#" id="default-id{{ $item->id }}">
                                                                                @if ($item->default_form === 1)
                                                                                    <i class="fa-solid fa-link-slash"></i>
                                                                                @else
                                                                                    <i class="fa-solid fa-link"></i>
                                                                                @endif
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                        <a type="button"
                                                            class="d-flex align-items-center p-2 position-sticky addGuestNew mt-2"
                                                            data-toggle="modal" data-target="#guestModal" style="bottom: 0;border-radius:4px;background-color:#F2F2F2;">
                                                            <span>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                                    <path d="M8.75 3C8.75 2.58579 8.41421 2.25 8 2.25C7.58579 2.25 7.25 2.58579 7.25 3V7.25H3C2.58579 7.25 2.25 7.58579 2.25 8C2.25 8.41421 2.58579 8.75 3 8.75H7.25V13C7.25 13.4142 7.58579 13.75 8 13.75C8.41421 13.75 8.75 13.4142 8.75 13V8.75H13C13.4142 8.75 13.75 8.41421 13.75 8C13.75 7.58579 13.4142 7.25 13 7.25H8.75V3Z" fill="#282A30"/>
                                                                </svg>
                                                            </span>
                                                            <span class="text-13-black pl-3 pt-1" style="font-weight: 600 !important;">Thêm mới</span>
                                                        </a>
                                                    </div>
                                            </li>
                                            <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left position-relative" style="height:44px;">
                                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Điều khoản</span>

                                                <input class="text-13-black w-50 border-0 bg-input-guest" id="myInput-payment"
                                                        placeholder="Chọn thông tin" style="flex:2;" name="terms_pay"
                                                        value="{{ $detailExport->terms_pay }}"
                                                        value="{{ isset($dataForm['payment']) ? $dataForm['payment']->form_desc : '' }}"/>

                                                <input type="hidden" class="idDateForm" autocomplete="off" name="idDate[payment]"
                                                        value="{{ isset($dataForm['payment']) ? $dataForm['payment']->id : '' }}">

                                                <input type="hidden" class="nameDateForm" autocomplete="off"
                                                        name="fieldDate[payment]"
                                                        value="{{ isset($dataForm['payment']) ? $dataForm['payment']->form_field : '' }}">
                                                <div id="myUL1"
                                                    class=" bg-white position-absolute rounded shadow p-1 list-guest z-index-block"
                                                    style="z-index: 99;">
                                                    <div class="p-1">
                                                        <div class="position-relative">
                                                            <input type="text" placeholder="Nhập điều khoản"
                                                                class="pr-4 w-100 input-search" id="companyFilter1">
                                                            <span id="search-icon" class="search-icon"><i
                                                                    class="fas fa-search text-table" aria-hidden="true"></i></span>
                                                        </div>
                                                    </div>
                                                    <ul class="m-0 p-0 scroll-data">
                                                        @foreach ($date_form as $item)
                                                            @if ($item->form_field == 'payment')
                                                            <li class="item-{{ $item->id }} p-2 align-items-center text-wrap" style="border-radius:4px;border-bottom: 1px solid #d6d6d6;">
                                                                <a href="#"
                                                                    class="text-dark d-flex justify-content-between p-2 search-date-form"
                                                                    name="search-date-form"  id="{{ $item->id }}"
                                                                    data-name="payment">
                                                                    <span class="w-100 text-13-black overflow-hidden" id="{{ $item->form_field . $item->id }}">{{ $item->form_name }}</span>
                                                                </a>
                                                                <div class="dropdown">
                                                                    <button type="button" data-toggle="dropdown"
                                                                                class="btn-save-print d-flex align-items-center h-100 border-0 bg-transparent">
                                                                                <i class="fa-solid fa-ellipsis"></i>
                                                                    </button>
                                                                    <div class="dropdown-menu date-form-setting p-0"
                                                                                style="z-index: 100;">
                                                                                <a class="dropdown-item search-date-form" data-toggle="modal"
                                                                                    data-target="#formModalpayment" data-name="payment">
                                                                                    <i class="fa-regular fa-pen-to-square"></i>
                                                                                </a>
                                                                                <a class="dropdown-item delete-item" href="#">
                                                                                    <i class="fa-solid fa-trash-can"></i>
                                                                                </a>
                                                                                <a class="dropdown-item set-default" href="#">
                                                                                    <i class="fa-solid fa-link"></i>
                                                                                </a>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                    <a type="button"
                                                        class="d-flex align-items-center p-2 position-sticky addGuestNew mt-2"
                                                        data-toggle="modal" data-target="#guestModal" style="bottom: 0;border-radius:4px;background-color:#F2F2F2;">
                                                        <span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                                <path d="M8.75 3C8.75 2.58579 8.41421 2.25 8 2.25C7.58579 2.25 7.25 2.58579 7.25 3V7.25H3C2.58579 7.25 2.25 7.58579 2.25 8C2.25 8.41421 2.58579 8.75 3 8.75H7.25V13C7.25 13.4142 7.58579 13.75 8 13.75C8.41421 13.75 8.75 13.4142 8.75 13V8.75H13C13.4142 8.75 13.75 8.41421 13.75 8C13.75 7.58579 13.4142 7.25 13 7.25H8.75V3Z" fill="#282A30"/>
                                                            </svg>
                                                        </span>
                                                        <span class="text-13-black pl-3 pt-1" style="font-weight: 600 !important;">Thêm mới</span>
                                                    </a>
                                                </div>
                                            </li>
                                            <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left position-relative" style="height:44px;">
                                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Dự án</span>
                                                <input class="text-13-black w-50 border-0 bg-input-guest" style="flex:2;" 
                                                       placeholder="Chọn thông tin" id="ProjectInput" 
                                                       value="{{ $detailExport->project_name }}"/>
                                                <input type="hidden" class="idProject" autocomplete="off" name="project_id" class="idProject"
                                                        value="{{ $detailExport->id_project }}">
                                                
                                                <div id="listProject"
                                                    class=" bg-white position-absolute rounded shadow p-1 list-guest z-index-block"
                                                    style="z-index: 99; display:none">
                                                    <div class="p-1">
                                                        <div class="position-relative">
                                                            <input type="text" placeholder="Nhập dự án"
                                                                class="pr-4 w-100 input-search" id="companyFilter1">
                                                            <span id="search-icon" class="search-icon"><i
                                                                    class="fas fa-search text-table" aria-hidden="true"></i></span>
                                                        </div>
                                                    </div>
                                                    <ul class="m-0 p-0 scroll-data">
                                                        @foreach ($date_form as $item)
                                                            @if ($item->form_field == 'payment')
                                                            <li class="p-2 align-items-center text-wrap" style="border-radius:4px;border-bottom: 1px solid #d6d6d6;">
                                                                <a href="#"
                                                                            class="text-dark d-flex justify-content-between p-2 search-date-form"
                                                                            name="search-date-form"
                                                                            data-name="payment">
                                                                            <span class="w-100 text-13-black overflow-hidden">form_name</span>
                                                                </a>
                                                                <div class="dropdown">
                                                                    <button type="button" data-toggle="dropdown"
                                                                                class="btn-save-print d-flex align-items-center h-100 border-0 bg-transparent">
                                                                                <i class="fa-solid fa-ellipsis"></i>
                                                                    </button>
                                                                    <div class="dropdown-menu date-form-setting p-0"
                                                                                style="z-index: 100;">
                                                                                <a class="dropdown-item search-date-form" data-toggle="modal"
                                                                                    data-target="#formModalpayment" data-name="payment">
                                                                                    <i class="fa-regular fa-pen-to-square"></i>
                                                                                </a>
                                                                                <a class="dropdown-item delete-item" href="#">
                                                                                    <i class="fa-solid fa-trash-can"></i>
                                                                                </a>
                                                                                <a class="dropdown-item set-default" href="#">
                                                                                    <i class="fa-solid fa-link"></i>
                                                                                </a>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                    <a type="button"
                                                        class="d-flex align-items-center p-2 position-sticky addGuestNew mt-2"
                                                        data-toggle="modal" data-target="#guestModal" style="bottom: 0;border-radius:4px;background-color:#F2F2F2;">
                                                        <span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                                <path d="M8.75 3C8.75 2.58579 8.41421 2.25 8 2.25C7.58579 2.25 7.25 2.58579 7.25 3V7.25H3C2.58579 7.25 2.25 7.58579 2.25 8C2.25 8.41421 2.58579 8.75 3 8.75H7.25V13C7.25 13.4142 7.58579 13.75 8 13.75C8.41421 13.75 8.75 13.4142 8.75 13V8.75H13C13.4142 8.75 13.75 8.41421 13.75 8C13.75 7.58579 13.4142 7.25 13 7.25H8.75V3Z" fill="#282A30"/>
                                                            </svg>
                                                        </span>
                                                        <span class="text-13-black pl-3 pt-1" style="font-weight: 600 !important;">Thêm mới</span>
                                                    </a>
                                                </div>        
                                            </li>
                                            <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left position-relative" style="height:44px;">
                                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Hàng hóa</span>
                                                <input class="text-13-black w-50 border-0 bg-input-guest " style="flex:2;"
                                                        id="myInput-goods" placeholder="Chọn thông tin" name="goods"
                                                        value="{{ isset($dataForm['goods']) ? $dataForm['goods']->form_desc : '' }}" />
                                                <input type="hidden" class="idDateForm" autocomplete="off" name="idDate[goods]"
                                                        value="{{ isset($dataForm['goods']) ? $dataForm['goods']->id : '' }}">
                                                <input type="hidden" class="nameDateForm" autocomplete="off"
                                                        name="fieldDate[goods]"
                                                        value="{{ isset($dataForm['goods']) ? $dataForm['goods']->form_field : '' }}">
                                                
                                                <div id="myUL4"
                                                    class=" bg-white position-absolute rounded shadow p-1 list-guest z-index-block"
                                                    style="z-index: 99;">
                                                    <div class="p-1">
                                                        <div class="position-relative">
                                                            <input type="text" placeholder="Nhập hàng hóa"
                                                                class="pr-4 w-100 input-search" id="companyFilter1">
                                                            <span id="search-icon" class="search-icon"><i
                                                                    class="fas fa-search text-table" aria-hidden="true"></i></span>
                                                        </div>
                                                    </div>
                                                    <ul class="m-0 p-0 scroll-data">
                                                        @foreach ($date_form as $item)
                                                            @if ($item->form_field == 'payment')
                                                                <li class="item-{{ $item->id }} border text-wrap">
                                                                    <a href="#"
                                                                        class="text-dark d-flex justify-content-between p-2 search-date-form"
                                                                        id="{{ $item->id }}" name="search-date-form"
                                                                        data-name="payment">
                                                                        <span class="w-100 text-nav text-dark overflow-hidden"
                                                                            id="{{ $item->form_field . $item->id }}">{{ $item->form_name }}</span>
                                                                    </a>
                                                                    <div class="dropdown">
                                                                        <button type="button" data-toggle="dropdown"
                                                                            class="btn-save-print d-flex align-items-center h-100 border-0 bg-transparent"
                                                                            style="margin-right:10px">
                                                                            <i class="fa-solid fa-ellipsis"></i>
                                                                        </button>
                                                                        <div class="dropdown-menu date-form-setting"
                                                                            style="z-index: 100;">
                                                                            <a class="dropdown-item search-date-form" data-toggle="modal"
                                                                                data-target="#formModalpayment" data-name="payment"
                                                                                data-id="{{ $item->id }}"
                                                                                id="{{ $item->id }}"><i
                                                                                    class="fa-regular fa-pen-to-square"></i></a>
                                                                            <a class="dropdown-item delete-item" href="#"
                                                                                data-id="{{ $item->id }}"
                                                                                data-name="{{ $item->form_field }}"><i
                                                                                    class="fa-solid fa-trash-can"></i></a>
                                                                            <a class="dropdown-item set-default default-id{{ $item->form_field }}"
                                                                                id="default-id{{ $item->id }}" href="#"
                                                                                data-name="{{ $item->form_field }}"
                                                                                data-id="{{ $item->id }}">
                                                                                @if ($item->default_form === 1)
                                                                                    <i class="fa-solid fa-link-slash"></i>
                                                                                @else
                                                                                    <i class="fa-solid fa-link"></i>
                                                                                @endif
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                    <a type="button"
                                                        class="d-flex align-items-center p-2 position-sticky addGuestNew mt-2"
                                                        data-toggle="modal" data-target="#guestModal" style="bottom: 0;border-radius:4px;background-color:#F2F2F2;">
                                                        <span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                                <path d="M8.75 3C8.75 2.58579 8.41421 2.25 8 2.25C7.58579 2.25 7.25 2.58579 7.25 3V7.25H3C2.58579 7.25 2.25 7.58579 2.25 8C2.25 8.41421 2.58579 8.75 3 8.75H7.25V13C7.25 13.4142 7.58579 13.75 8 13.75C8.41421 13.75 8.75 13.4142 8.75 13V8.75H13C13.4142 8.75 13.75 8.41421 13.75 8C13.75 7.58579 13.4142 7.25 13 7.25H8.75V3Z" fill="#282A30"/>
                                                            </svg>
                                                        </span>
                                                        <span class="text-13-black pl-3 pt-1" style="font-weight: 600 !important;">Thêm mới</span>
                                                    </a>
                                                </div>
                                            </li>
                                            <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left position-relative" style="height:44px;">
                                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Giao hàng</span>
                                                <input class="text-13-black w-50 border-0 bg-input-guest " style="flex:2;" 
                                                        placeholder="Chọn thông tin" name="delivery" id="myInput-delivery"
                                                        value="{{ isset($dataForm['delivery']) ? $dataForm['delivery']->form_desc : '' }}"/>
                                                <input type="hidden" class="idDateForm" autocomplete="off" name="idDate[delivery]"
                                                        value="{{ isset($dataForm['delivery']) ? $dataForm['delivery']->id : '' }}">
                                                <input type="hidden" class="nameDateForm" autocomplete="off"
                                                        name="fieldDate[delivery]"
                                                        value="{{ isset($dataForm['delivery']) ? $dataForm['delivery']->form_field : '' }}">

                                                <div id="myUL5"
                                                    class=" bg-white position-absolute rounded shadow p-1 list-guest z-index-block"
                                                    style="z-index: 99;">
                                                    <div class="p-1">
                                                        <div class="position-relative">
                                                            <input type="text" placeholder="Nhập giao hàng"
                                                                class="pr-4 w-100 input-search" id="companyFilter1">
                                                            <span id="search-icon" class="search-icon"><i
                                                                    class="fas fa-search text-table" aria-hidden="true"></i></span>
                                                        </div>
                                                    </div>
                                                    <ul class="m-0 p-0 scroll-data">
                                                        @foreach ($date_form as $item)
                                                            @if ($item->form_field == 'payment')
                                                                <li class="item-{{ $item->id }} border text-wrap">
                                                                    <a href="#"
                                                                        class="text-dark d-flex justify-content-between p-2 search-date-form"
                                                                        id="{{ $item->id }}" name="search-date-form"
                                                                        data-name="payment">
                                                                        <span class="w-100 text-nav text-dark overflow-hidden"
                                                                            id="{{ $item->form_field . $item->id }}">{{ $item->form_name }}</span>
                                                                    </a>
                                                                    <div class="dropdown">
                                                                        <button type="button" data-toggle="dropdown"
                                                                            class="btn-save-print d-flex align-items-center h-100 border-0 bg-transparent"
                                                                            style="margin-right:10px">
                                                                            <i class="fa-solid fa-ellipsis"></i>
                                                                        </button>
                                                                        <div class="dropdown-menu date-form-setting"
                                                                            style="z-index: 100;">
                                                                            <a class="dropdown-item search-date-form" data-toggle="modal"
                                                                                data-target="#formModalpayment" data-name="payment"
                                                                                data-id="{{ $item->id }}"
                                                                                id="{{ $item->id }}"><i
                                                                                    class="fa-regular fa-pen-to-square"></i></a>
                                                                            <a class="dropdown-item delete-item" href="#"
                                                                                data-id="{{ $item->id }}"
                                                                                data-name="{{ $item->form_field }}"><i
                                                                                    class="fa-solid fa-trash-can"></i></a>
                                                                            <a class="dropdown-item set-default default-id{{ $item->form_field }}"
                                                                                id="default-id{{ $item->id }}" href="#"
                                                                                data-name="{{ $item->form_field }}"
                                                                                data-id="{{ $item->id }}">
                                                                                @if ($item->default_form === 1)
                                                                                    <i class="fa-solid fa-link-slash"></i>
                                                                                @else
                                                                                    <i class="fa-solid fa-link"></i>
                                                                                @endif
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                    <a type="button"
                                                        class="d-flex align-items-center p-2 position-sticky addGuestNew mt-2"
                                                        data-toggle="modal" data-target="#guestModal" style="bottom: 0;border-radius:4px;background-color:#F2F2F2;">
                                                        <span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                                <path d="M8.75 3C8.75 2.58579 8.41421 2.25 8 2.25C7.58579 2.25 7.25 2.58579 7.25 3V7.25H3C2.58579 7.25 2.25 7.58579 2.25 8C2.25 8.41421 2.58579 8.75 3 8.75H7.25V13C7.25 13.4142 7.58579 13.75 8 13.75C8.41421 13.75 8.75 13.4142 8.75 13V8.75H13C13.4142 8.75 13.75 8.41421 13.75 8C13.75 7.58579 13.4142 7.25 13 7.25H8.75V3Z" fill="#282A30"/>
                                                            </svg>
                                                        </span>
                                                        <span class="text-13-black pl-3 pt-1" style="font-weight: 600 !important;">Thêm mới</span>
                                                    </a>
                                                </div>
                                            </li>
                                            <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left position-relative" style="height:44px;">
                                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Địa điểm</span>
                                                <input class="text-13-black w-50 border-0 bg-input-guest " style="flex:2;" 
                                                        placeholder="Chọn thông tin" name="location" id="myInput-location"
                                                        value="{{ isset($dataForm['location']) ? $dataForm['location']->form_desc : '' }}"/>
                                                <input type="hidden" class="idDateForm" autocomplete="off"
                                                        name="idDate[location]"
                                                        value="{{ isset($dataForm['location']) ? $dataForm['location']->id : '' }}">
                                                <input type="hidden" class="nameDateForm" autocomplete="off"
                                                        name="fieldDate[location]"
                                                        value="{{ isset($dataForm['location']) ? $dataForm['location']->form_field : '' }}">

                                                <div id="myUL6"
                                                    class=" bg-white position-absolute rounded shadow p-1 list-guest z-index-block"
                                                    style="z-index: 99;">
                                                    <div class="p-1">
                                                        <div class="position-relative">
                                                            <input type="text" placeholder="Nhập địa điểm"
                                                                class="pr-4 w-100 input-search" id="companyFilter1">
                                                            <span id="search-icon" class="search-icon"><i
                                                                    class="fas fa-search text-table" aria-hidden="true"></i></span>
                                                        </div>
                                                    </div>
                                                    <ul class="m-0 p-0 scroll-data">
                                                        @foreach ($date_form as $item)
                                                            @if ($item->form_field == 'payment')
                                                                <li class="item-{{ $item->id }} border text-wrap">
                                                                    <a href="#"
                                                                        class="text-dark d-flex justify-content-between p-2 search-date-form"
                                                                        id="{{ $item->id }}" name="search-date-form"
                                                                        data-name="payment">
                                                                        <span class="w-100 text-nav text-dark overflow-hidden"
                                                                            id="{{ $item->form_field . $item->id }}">{{ $item->form_name }}</span>
                                                                    </a>
                                                                    <div class="dropdown">
                                                                        <button type="button" data-toggle="dropdown"
                                                                            class="btn-save-print d-flex align-items-center h-100 border-0 bg-transparent"
                                                                            style="margin-right:10px">
                                                                            <i class="fa-solid fa-ellipsis"></i>
                                                                        </button>
                                                                        <div class="dropdown-menu date-form-setting"
                                                                            style="z-index: 100;">
                                                                            <a class="dropdown-item search-date-form" data-toggle="modal"
                                                                                data-target="#formModalpayment" data-name="payment"
                                                                                data-id="{{ $item->id }}"
                                                                                id="{{ $item->id }}"><i
                                                                                    class="fa-regular fa-pen-to-square"></i></a>
                                                                            <a class="dropdown-item delete-item" href="#"
                                                                                data-id="{{ $item->id }}"
                                                                                data-name="{{ $item->form_field }}"><i
                                                                                    class="fa-solid fa-trash-can"></i></a>
                                                                            <a class="dropdown-item set-default default-id{{ $item->form_field }}"
                                                                                id="default-id{{ $item->id }}" href="#"
                                                                                data-name="{{ $item->form_field }}"
                                                                                data-id="{{ $item->id }}">
                                                                                @if ($item->default_form === 1)
                                                                                    <i class="fa-solid fa-link-slash"></i>
                                                                                @else
                                                                                    <i class="fa-solid fa-link"></i>
                                                                                @endif
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                    <a type="button"
                                                        class="d-flex align-items-center p-2 position-sticky addGuestNew mt-2"
                                                        data-toggle="modal" data-target="#guestModal" style="bottom: 0;border-radius:4px;background-color:#F2F2F2;">
                                                        <span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                                <path d="M8.75 3C8.75 2.58579 8.41421 2.25 8 2.25C7.58579 2.25 7.25 2.58579 7.25 3V7.25H3C2.58579 7.25 2.25 7.58579 2.25 8C2.25 8.41421 2.58579 8.75 3 8.75H7.25V13C7.25 13.4142 7.58579 13.75 8 13.75C8.41421 13.75 8.75 13.4142 8.75 13V8.75H13C13.4142 8.75 13.75 8.41421 13.75 8C13.75 7.58579 13.4142 7.25 13 7.25H8.75V3Z" fill="#282A30"/>
                                                            </svg>
                                                        </span>
                                                        <span class="text-13-black pl-3 pt-1" style="font-weight: 600 !important;">Thêm mới</span>
                                                    </a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>           
                </div>
        </section>
        <!-- CREATE GUEST -->
        <div class="modal fade" id="guestModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel"aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="content-info">
                                <div class="ml-2">
                                    <div class="py-2 border-0">
                                        <p class="p-0 m-0 text-13"> Tên hiển thị </p>
                                    </div>
                                    <input name="guest_name_display" type="text" placeholder="Nhập thông tin"
                                        class="border w-100 py-2 border-top-0 border-left-0 border-right-0 bg-input-guest text-13-black"
                                        id="guest_name_display" autocomplete="off">
                                </div>
                                <div class="ml-2">
                                    <div class="py-2 border-0 text-13">
                                        <p class="p-0 m-0">
                                            Mã số thuế
                                        </p>
                                    </div>
                                    <input name="guest_code" type="text" placeholder="Nhập thông tin"
                                        class="border w-100 py-2 border-top-0 border-left-0 border-right-0 bg-input-guest text-13-black" id="guest_code"
                                        autocomplete="off">
                                </div>
                                <div class="ml-2">
                                    <div class="py-2 border-0 ">
                                        <p class="p-0 m-0 text-13">
                                            Địa chỉ
                                        </p>
                                    </div>
                                    <input name="guest_address" type="text" placeholder="Nhập thông tin"
                                        class="border w-100 py-2 border-top-0 border-left-0 border-right-0 bg-input-guest text-13-black" id="guest_address"
                                        autocomplete="off">
                                </div>
                                <div class="ml-2">
                                    <div class="py-2 border-0">
                                        <p class="p-0 m-0 text-13">Tên viết tắt</p>
                                    </div>
                                    <input name="key" type="text" placeholder="Nhập thông tin" id="key"
                                        class="border w-100 py-2 border-top-0 border-left-0 border-right-0 bg-input-guest text-13-black" autocomplete="off">
                                </div>
                                <div class="ml-2">
                                    <div class="py-2 border-0">
                                        <p class="p-0 m-0 text-13">Tên đầy đủ</p>
                                    </div>
                                    <input name="guest_name" type="text" placeholder="Nhập thông tin"
                                        class="border w-100 py-2 border-top-0 border-left-0 border-right-0 bg-input-guest text-13-black" id="guest_name"
                                        autocomplete="off">
                                </div>
                                <div class="ml-2">
                                    <div class="py-2 border-0">
                                        <p class="p-0 m-0 text-13">Người đại diện</p>
                                    </div>
                                    <input name="" type="text" placeholder="Nhập thông tin"
                                        class="border w-100 py-2 border-top-0 border-left-0 border-right-0 bg-input-guest text-13-black" id=""
                                        autocomplete="off">
                                </div>
                                <div class="ml-2">
                                    <div class="py-2 border-0">
                                        <p class="p-0 m-0 text-13">
                                            Số điện thoại
                                        </p>
                                    </div>
                                    <input name="guest_phone" type="text" placeholder="Nhập thông tin"
                                        class="border w-100 py-2 border-top-0 border-left-0 border-right-0 bg-input-guest text-13-black" id="guest_phone"
                                        autocomplete="off">
                                </div>
                                <div class="ml-2">
                                    <div class="py-2 border-0">
                                        <p class="p-0 m-0 text-13">
                                            Email
                                        </p>
                                    </div>
                                    <input name="guest_email" type="text" placeholder="Nhập thông tin"
                                        class="border w-100 py-2 border-top-0 border-left-0 border-right-0 bg-input-guest text-13-black" id="guest_email"
                                        autocomplete="off">
                                </div>
                                <!-- <div class="ml-2">
                                    <div class="title-info py-2 border border-left-0">
                                        <p class="p-0 m-0 px-3">
                                            Người nhận hàng
                                        </p>
                                    </div>
                                    <input name="guest_receiver" type="text" placeholder="Nhập thông tin"
                                        class="border w-100 py-2 border-left-0 border-right-0 px-3" id="guest_receiver"
                                        autocomplete="off">
                                </div>
                                <div class="ml-2">
                                    <div class="title-info py-2 border border-left-0">
                                        <p class="p-0 m-0 px-3">
                                            Email cá nhân
                                        </p>
                                    </div>
                                    <input name="guest_email_personal" type="text" placeholder="Nhập thông tin"
                                        class="border w-100 py-2 border-left-0 border-right-0 px-3"
                                        id="guest_email_personal" autocomplete="off">
                                </div>
                                <div class="ml-2">
                                    <div class="title-info py-2 border border-left-0">
                                        <p class="p-0 m-0 px-3">
                                            SĐT người nhận
                                        </p>
                                    </div>
                                    <input name="guest_phone_receiver" type="text" placeholder="Nhập thông tin"
                                        class="border w-100 py-2 border-left-0 border-right-0 px-3"
                                        id="guest_phone_receiver" autocomplete="off">
                                </div> -->
                                <div class="ml-2">
                                    <div class="py-2 border-0">
                                        <p class="p-0 m-0 text-13">Địa chỉ nhận hàng</p>
                                    </div>
                                    <input name="" type="text" placeholder="Nhập thông tin"
                                        class="border w-100 py-2 border-top-0 border-left-0 border-right-0 bg-input-guest text-13-black" id=""
                                        autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer border-top-0">
                            <button type="button" class="btn-destroy btn-light" data-dismiss="modal">
                                <span>Trở về</span>
                            </button>
                            <button type="button" class="custom-btn" id="addGuest">
                                <span>Thêm khách hàng</span>
                            </button>
                        </div>
                    </div>
                </div>
        </div>
    </form>
    <x-date-form-modal title="Điều khoản thanh toán" name="payment" idModal="formModalpayment"></x-date-form-modal>
    <x-date-form-modal title="Hiệu lực báo giá" name="quote" idModal="formModalquote"></x-date-form-modal>
    <x-date-form-modal title="Hàng hóa" name="goods" idModal="formModalgoods"></x-date-form-modal>
    <x-date-form-modal title="Giao hàng" name="delivery" idModal="formModaldelivery"></x-date-form-modal>
    <x-date-form-modal title="Địa điểm" name="location" idModal="formModallocation"></x-date-form-modal>
    {{-- Thông tin sản phẩm --}}
    <div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thông tin sản phẩm</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('/dist/js/export.js') }}"></script>

<script type="text/javascript">
    $("table tbody").sortable({
        axis: "y",
        handle: "td",
    });
    getKeyGuest($('#guest_name_display'));

    $("#myUL").hide();
    $("#myUL1").hide();
    $("#myUL2").hide();
    $("#myUL4").hide();
    $("#myUL5").hide();
    $("#myUL6").hide();
    $(document).ready(function() {
        function toggleList(input, list) {
            input.on("click", function() {
                list.show();
            });

            $(document).click(function(event) {
                if (!$(event.target).closest(input).length) {
                    list.hide();
                }
            });

            input.on("keyup", function() {
                var value = $(this).val().toUpperCase();
                list.find("li").each(function() {
                    var text = $(this).find("a").text().toUpperCase();
                    $(this).toggle(text.indexOf(value) > -1);
                });
            });
        }
        function toggleListGuest(input, list, filterInput) {
            input.on("click", function() {
                list.show();
            });

            $(document).click(function(event) {
                if (!$(event.target).closest(input).length && !$(event.target).closest(filterInput)
                    .length) {
                    list.hide();
                }
            });

            var applyFilter = function() {
                var value = filterInput.val().toUpperCase();
                list.find("li").each(function() {
                    var text = $(this).find("a").text().toUpperCase();
                    $(this).toggle(text.indexOf(value) > -1);
                });
            };

            input.on("keyup", applyFilter);
            filterInput.on("keyup", applyFilter);
        }

        toggleListGuest($("#myInput"), $("#myUL"),$("#companyFilter"));
        toggleList($("#myInput-payment"), $("#myUL1"));
        toggleListGuest($("#myInput-quote"), $("#myUL2"),$("#companyFilter2"));
        toggleList($("#myInput-goods"), $("#myUL4"));
        toggleList($("#myInput-delivery"), $("#myUL5"));
        toggleList($("#myInput-location"), $("#myUL6"));
        toggleListGuest($("#represent_guest"), $("#myUL7"), $("#companyFilter7"));
    });

    $(document).ready(function() {
        $(document).on('click', '.search-date-form', function(e) {
            $('.modal').on('hidden.bs.modal', function() {
                $('#form-name-' + name).val('')
                $('#form-desc-' + name).val('')
                $('.btn-submit').attr('data-action', 'insert').text('Lưu');
                $('.title-dateform').text('Biểu mẫu mới');
            });
            var idDateForm = $(this).attr('id');
            var name = $(this).data('name');
            var dataid = $(this).data('id');
            // console.log(dataid);
            if (dataid) {
                $('.btn-submit').attr('data-action', 'update').text(
                    'Cập nhật');
                $('.title-dateform').text('Cập nhật');
            }
            $.ajax({
                url: '{{ route('searchDateForm') }}',
                type: 'GET',
                data: {
                    idDateForm: idDateForm
                },
                success: function(data) {
                    $('#myInput-' + name).val(data.form_desc);
                    $("input[name='idDate[" + data.form_field + "]']").val(data
                        .id);
                    $("input[name='fieldDate[" + data.form_field + "]']").val(data
                        .form_field);
                    if (dataid) {
                        $('#form-name-' + name).val(data.form_name)
                        $('#form-desc-' + name).val(data.form_desc)
                        $('.btn-submit').attr('data-id', dataid)
                    }
                    if (dataid) {
                        $('.btn-submit').attr('data-action', 'update').text(
                            'Cập nhật');
                        $('.title-dateform').text('Cập nhật');
                    }
                }
            });
        });
        // Xóa form date
        $(document).on('click', '.delete-item', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var name = $(this).data('name');
            console.log(id);
            if (confirm('Bạn có chắc chắn muốn xóa không?')) {
                $.ajax({
                    url: '{{ route('deleteDateForm') }}',
                    type: 'GET',
                    data: {
                        id: id
                    },
                    success: function(data) {
                        $(".item-" + id).remove();
                        $('#myInput-' + name).val('');
                        $("input[name='idDate[" + name + "]']").val(null);
                        $("input[name='fieldDate[" + data.form_field + "]']").val();
                    }
                });
            }
        });
        // Set mặc định có các dateForm
        $(document).on('click', '.set-default', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var name = $(this).data('name');
            console.log(id);
            $.ajax({
                url: '{{ route('setDefault') }}',
                type: 'GET',
                data: {
                    id: id,
                    name: name,
                },
                success: function(data) {
                    data.update_form.forEach(item => {
                        if (item.default_form === 1) {
                            $('#default-id' + item.id).html(
                                '<i class="fa-solid fa-link-slash"></i>');
                        } else {
                            $('#default-id' + item.id).html(
                                '<i class="fa-solid fa-link"></i>');
                        }
                    });
                }
            });
        });

        // submit thêm mới các trường
        $('.btn-submit').click(function(event) {
            event.preventDefault();
            var name = $(this).data('button-name');
            var inputName = $('#form-name-' + name).val();
            var inputDesc = $('#form-desc-' + name).val();
            var action = $(this).data('action');

            if ($('.btn-submit' + name).text() === 'Lưu') {
                console.log('Đây là thêm mới');
                $('#form-name-' + name).val('')
                $('#form-desc-' + name).val('')
                $.ajax({
                    url: '{{ route('addDateForm') }}',
                    type: 'GET',
                    data: {
                        name: name,
                        inputName: inputName,
                        inputDesc: inputDesc,
                    },
                    success: function(data) {
                        $('#myInput-' + name).val(data.new_date_form.form_desc);
                        alert(data.msg);
                        $("input[name='idDate[" + data.new_date_form.form_field + "]']")
                            .val(data.new_date_form
                                .id);
                        $("input[name='fieldDate[" + data.new_date_form.form_field + "]']")
                            .val(data.new_date_form
                                .form_field);
                        $('.modal [data-dismiss="modal"]').click();

                        // Đoạn html của set default
                        let originalHTML =
                            '<a class="dropdown-item set-default default-id' + data
                            .new_date_form.form_field + '"' +
                            'id="default-id' + data.new_date_form.id + '" href="#"' +
                            'data-name="' + data.new_date_form.form_field + '"' +
                            'data-id="' + data.new_date_form.id + '">' +
                            '<i class="fa-solid fa-link"></i>' +
                            '</a>';
                        // Thêm phần tử mới vào trong form tìm kiếm
                        var newListItem =
                            '<li class="item-' + data.new_date_form.id +
                            '"><a href="#" class="text-dark d-flex justify-content-between p-2 search-date-form" id="' +
                            data.new_date_form.id +
                            '" name="search-date-form" data-name="' +
                            name + '">' +
                            '<span class="w-50" id="' + data.new_date_form.form_field + data
                            .new_date_form.id + '">' + data.new_date_form.form_name +
                            '</span></a><div class="dropdown">' +
                            '<button type="button" data-toggle="dropdown" class="btn-save-print d-flex align-items-center h-100" style="margin-right:10px">' +
                            '<i class="fa-solid fa-ellipsis"></i>' + '</button>' +
                            '<div class="dropdown-menu date-form-setting" style="z-index: 100;">' +
                            '<a class="dropdown-item search-date-form" data-toggle="modal" data-target="#formModal' +
                            name + '" data-name="' +
                            name + '" data-id="' + data.new_date_form.id +
                            '" id="' + data.new_date_form.id +
                            '"><i class="fa-regular fa-pen-to-square"></i></a>' +
                            '<a class="dropdown-item delete-item" href="#" data-id="' + data
                            .new_date_form.id +
                            '" data-name="' + data.new_date_form.form_field +
                            '"><i class="fa-solid fa-trash-can"></i></a>' + originalHTML +
                            '</div>' +
                            '</div></li>';
                        // Thêm mục mới vào danh sách
                        var addButton = $(".addDateForm" + name);
                        $(newListItem).insertBefore(addButton);
                        //clear
                        $('.search-date-form').click(function() {
                            $('.modal').on('hidden.bs.modal', function() {
                                $('#form-name-' + name).val('')
                                $('#form-desc-' + name).val('')
                                $('.btn-submit').attr('data-action',
                                    'insert').text('Lưu');
                                $('.title-dateform').text('Biểu mẫu mới');
                            });
                            var idDateForm = $(this).attr('id');
                            var name = $(this).data('name');
                            var dataid = $(this).data('id');
                            // console.log(name);
                            if (dataid) {
                                $('.btn-submit').attr('data-action', 'update').attr(
                                    'data-id', dataid).text(
                                    'Cập nhật');
                                $('.title-dateform').text('Cập nhật');
                            }
                            $.ajax({
                                url: '{{ route('searchDateForm') }}',
                                type: 'GET',
                                data: {
                                    idDateForm: idDateForm
                                },
                                success: function(data) {
                                    $("input[name='idDate[" + data
                                        .form_field + "]']").val(
                                        data
                                        .id);
                                    $("input[name='fieldDate[" + data
                                        .form_field + "]']").val(
                                        data
                                        .form_field);
                                    $('#myInput-' + name).val(data
                                        .form_desc);
                                    if (dataid) {
                                        $('#form-name-' + name).val(data
                                            .form_name)
                                        $('#form-desc-' + name).val(data
                                            .form_desc)
                                    }
                                }
                            });
                        });
                    }
                });
            }
            if ($('.btn-submit' + name).text() === 'Cập nhật') {
                console.log('Đây là update');
                var id = $(this).data('id');
                console.log(id);
                $.ajax({
                    url: '{{ route('updateDateForm') }}',
                    type: 'GET',
                    data: {
                        id: id,
                        name: name,
                        inputName: inputName,
                        inputDesc: inputDesc,
                    },
                    success: function(data) {
                        console.log(data);
                        $('.modal [data-dismiss="modal"]').click();
                        $("input[name='idDate[" + data.new_date_form.form_field + "]']")
                            .val(data.new_date_form
                                .id);
                        $("input[name='fieldDate[" + data.new_date_form.form_field + "]']")
                            .val(data.new_date_form
                                .form_field);
                        $("#" + name + id).text(data.new_date_form.form_name)
                        console.log(name, id);
                        $('#myInput-' + name).val(data.new_date_form.form_desc);
                        alert(data.msg);
                    }
                });
            }
        });


        let fieldCounter = 1;
        $("#add-field-btn").click(function() {
            let nextSoTT = $(".soTT").length + 1;
            // Tạo các phần tử HTML mới
            const newRow = $("<tr>", {
                "id": `dynamic-row-${fieldCounter}`,
                "class": `bg-white addProduct`,
            });
            const maSanPham = $(
                "<td class='border border-left-0 border-top-0 border-bottom-0 position-relative'>" +
                "<div class='d-flex w-100 justify-content-between align-items-center'>" +
                "<svg width='24' height='24' viewBox='0 0 24 24'" +
                "fill='none' xmlns='http://www.w3.org/2000/svg'>" +
                "<path fill-rule='evenodd' clip-rule='evenodd' d='M9 3C7.89543 3 7 3.89543 7 5C7 6.10457 7.89543 7 9 7C10.1046 7 11 6.10457 11 5C11 3.89543 10.1046 3 9 3Z' fill='#42526E'/>" +
                "<path fill-rule='evenodd' clip-rule='evenodd'" +
                "d='M9 10C7.89543 10 7 10.8954 7 12C7 13.1046 7.89543 14 9 14C10.1046 14 11 13.1046 11 12C11 10.8954 10.1046 10 9 10Z'" +
                "fill='#42526E' />" +
                "<path fill-rule='evenodd' clip-rule='evenodd'" +
                "d='M9 17C7.89543 17 7 17.8954 7 19C7 20.1046 7.89543 21 9 21C10.1046 21 11 20.1046 11 19C11 17.8954 10.1046 17 9 17Z'" +
                "fill='#42526E' />" +
                "<path fill-rule='evenodd' clip-rule='evenodd'" +
                "d='M15 3C13.8954 3 13 3.89543 13 5C13 6.10457 13.8954 7 15 7C16.1046 7 17 6.10457 17 5C17 3.89543 16.1046 3 15 3Z'" +
                "fill='#42526E' />" +
                "<path fill-rule='evenodd' clip-rule='evenodd'" +
                "d='M15 10C13.8954 10 13 10.8954 13 12C13 13.1046 13.8954 14 15 14C16.1046 14 17 13.1046 17 12C17 10.8954 16.1046 10 15 10Z'" +
                "fill='#42526E' />" +
                "<path fill-rule='evenodd' clip-rule='evenodd'" +
                "d='M15 17C13.8954 17 13 17.8954 13 19C13 20.1046 13.8954 21 15 21C16.1046 21 17 20.1046 17 19C17 17.8954 16.1046 17 15 17Z'" +
                "fill='#42526E' />" +
                "</svg>" +
                "<input type='checkbox' class='cb-element'>" +
                "<input type='text' autocomplete='off' class='border-0 px-2 py-1 w-75 product_code' name='product_code[]'>" +
                "</td>");
            const tenSanPham = $(
                "<td class='border border-top-0 border-bottom-0 position-relative'>" +
                "<ul class='list_product bg-white position-absolute w-100 rounded shadow p-0 scroll-data' style='z-index: 99;top: 75%;left: 10%;'>" +
                "@foreach ($product as $product_value)" +
                "<li>" +
                "<a href='javascript:void(0);' class='text-dark d-flex justify-content-between p-2 idProduct' id='{{ $product_value->id }}' name='idProduct'>" +
                "<span class='w-50'>{{ $product_value->product_name }}</span>" +
                "</a>" +
                "</li>" +
                "@endforeach" +
                "</a></ul>" +
                "<div class='d-flex align-items-center'>" +
                "<input type='text' class='border-0 px-2 py-1 w-100 product_name' autocomplete='off' required name='product_name[]'>" +
                "<input type='hidden' class='product_id' autocomplete='off' name='product_id[]'>" +
                "<div class='info-product' style='display: none;' data-toggle='modal' data-target='#productModal'>" +
                "<svg width='18' height='18' viewBox='0 0 18 18' fill='none' xmlns='http://www.w3.org/2000/svg'>" +
                "<path d='M8.99998 4.5C8.45998 4.5 8.09998 4.86 8.09998 5.4C8.09998 5.94 8.45998 6.3 8.99998 6.3C9.53998 6.3 9.89998 5.94 9.89998 5.4C9.89998 4.86 9.53998 4.5 8.99998 4.5Z' fill='#42526E'/>" +
                "<path d='M9 0C4.05 0 0 4.05 0 9C0 13.95 4.05 18 9 18C13.95 18 18 13.95 18 9C18 4.05 13.95 0 9 0ZM9 16.2C5.04 16.2 1.8 12.96 1.8 9C1.8 5.04 5.04 1.8 9 1.8C12.96 1.8 16.2 5.04 16.2 9C16.2 12.96 12.96 16.2 9 16.2Z' fill='#42526E'/>" +
                "<path d='M8.99998 7.2002C8.45998 7.2002 8.09998 7.5602 8.09998 8.10019V12.6002C8.09998 13.1402 8.45998 13.5002 8.99998 13.5002C9.53998 13.5002 9.89998 13.1402 9.89998 12.6002V8.10019C9.89998 7.5602 9.53998 7.2002 8.99998 7.2002Z' fill='#42526E'/>" +
                "</svg></div></div></td>"
            );
            const dvTinh = $(
                "<td class='border border-top-0 border-bottom-0'><input type='text' autocomplete='off' class='border-0 px-2 py-1 w-100 product_unit' required name='product_unit[]'></td>"
            );
            const soLuong = $(
                "<td class='border border-top-0 border-bottom-0 position-relative'>" +
                "<input type='text' class='border-0 px-2 py-1 w-100 quantity-input' autocomplete='off' required name='product_qty[]'>" +
                "<input type='hidden' class='tonkho'>" +
                "<p class='text-primary text-center position-absolute inventory' style='top: 68%;display: none;'>Tồn kho: <span class='soTonKho'>35</span></p>" +
                "</td>"
            );
            const donGia = $(
                "<td class='border border-top-0 border-bottom-0 position-relative'>" +
                "<input type='text' class='border-0 px-2 py-1 w-100 product_price' autocomplete='off' name='product_price[]' required>" +
                "<p class='text-primary text-right position-absolute transaction' style='top: 68%;right: 5%;'>Giao dịch gần đây</p>" +
                "</td>"
            );
            const thue = $(
                "<td class='border border-top-0 border-bottom-0 px-4'>" +
                "<select name='product_tax[]' class='border-0 text-center product_tax' required>" +
                "<option value='0'>0%</option>" +
                "<option value='8'>8%</option>" +
                "<option value='10'>10%</option>" +
                "<option value='99'>NOVAT</option>" +
                "</select>" +
                "</td>"
            );
            const thanhTien = $(
                "<td class='border border-top-0 border-bottom-0'><input type='text' readonly class='border-0 px-2 py-1 w-100 total-amount'>" +
                "</td><td class='border-top border-secondary p-0 bg-secondary Daydu' style='width:1%;'></td>"
            );
            const option = $(
                "<td class='border border-top-0 border-bottom-0 border-right-0 text-right'>" +
                "<svg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>" +
                "<path fill-rule='evenodd' clip-rule='evenodd' d='M10.5454 5C10.2442 5 9.99999 5.24421 9.99999 5.54545C9.99999 5.8467 10.2442 6.09091 10.5454 6.09091H13.4545C13.7558 6.09091 14 5.8467 14 5.54545C14 5.24421 13.7558 5 13.4545 5H10.5454ZM6 7.72726C6 7.42601 6.24421 7.18181 6.54545 7.18181H7.63637H16.3636H17.4545C17.7558 7.18181 18 7.42601 18 7.72726C18 8.02851 17.7558 8.27272 17.4545 8.27272H16.9091V17C16.9091 18.2113 15.9118 19.1818 14.7135 19.1818H9.25891C8.97278 19.1816 8.68906 19.1247 8.42499 19.0145C8.16092 18.9044 7.92126 18.7431 7.71979 18.5399C7.51833 18.3367 7.35905 18.0957 7.25112 17.8307C7.14347 17.5664 7.08903 17.2834 7.09091 16.9981V8.27272H6.54545C6.24421 8.27272 6 8.02851 6 7.72726ZM8.18182 17.0041V8.27272H15.8182V17C15.8182 17.5966 15.3216 18.0909 14.7135 18.0909H9.25938C9.11713 18.0908 8.97632 18.0625 8.84503 18.0077C8.71375 17.953 8.5946 17.8728 8.49444 17.7718C8.39429 17.6707 8.3151 17.5509 8.26144 17.4192C8.20779 17.2874 8.18074 17.1464 8.18182 17.0041ZM13.4545 10.0909C13.7558 10.0909 14 10.3351 14 10.6364V15.7273C14 16.0285 13.7558 16.2727 13.4545 16.2727C13.1533 16.2727 12.9091 16.0285 12.9091 15.7273V10.6364C12.9091 10.3351 13.1533 10.0909 13.4545 10.0909ZM11.0909 10.6364C11.0909 10.3351 10.8467 10.0909 10.5454 10.0909C10.2442 10.0909 9.99999 10.3351 9.99999 10.6364V15.7273C9.99999 16.0285 10.2442 16.2727 10.5454 16.2727C10.8467 16.2727 11.0909 16.0285 11.0909 15.7273V10.6364Z' fill='#42526E'/>" +
                "</svg>" +
                "</td>" +
                "<td style='display:none;'><input type='text' class='product_tax1'></td>"
            );
            const heSoNhan = $(
                "<td class='border border-top-0 border-bottom-0 position-relative product_ratio'>" +
                "<input type='text' class='border-0 px-2 py-1 w-100 heSoNhan' autocomplete='off' name='product_ratio[]'>" +
                "</td>"
            );
            const giaNhap = $(
                "<td class='border border-top-0 border-bottom-0 position-relative price_import'>" +
                "<input type='text' class='border-0 px-2 py-1 w-100 giaNhap' autocomplete='off' required name='price_import[]'>" +
                "</td>"
            );
            const ghiChu = $(
                "<td class='border border-top-0 border-bottom-0 position-relative note p-1'>" +
                "<input type='text' class='border-0 py-1 w-100' placeholder='Nhập ghi chú' name='product_note[]'>" +
                "</td>"
            );
            // Gắn các phần tử vào hàng mới
            newRow.append(maSanPham, tenSanPham, dvTinh,soLuong, donGia, thue, thanhTien, heSoNhan, giaNhap, ghiChu, option
            );
            $("#dynamic-fields").before(newRow);
            // Tăng giá trị fieldCounter
            fieldCounter++;
            //kéo thả vị trí sản phẩm
            $("table tbody").sortable({
                axis: "y",
                handle: "td",
            });
            //Xóa sản phẩm
            option.click(function() {
                $(this).closest("tr").remove();
                fieldCounter--;
                calculateTotalAmount();
                calculateGrandTotal();
                var productTaxText = $('#product-tax').text();
                var productTaxValue = parseFloat(productTaxText.replace(/,/g, ''));
                var taxAmount = parseFloat(('.product_tax1').text());
                var totalTax = productTaxValue - taxAmount;
                $('#product-tax').text(totalTax);
            });
            // Checkbox
            $('#checkall').change(function() {
                $('.cb-element').prop('checked', this.checked);
                updateMultipleActionVisibility();
            });
            $('.cb-element').change(function() {
                updateMultipleActionVisibility();
                if ($('.cb-element:checked').length === $('.cb-element').length) {
                    $('#checkall').prop('checked', true);
                } else {
                    $('#checkall').prop('checked', false);
                }
            });
            $(document).on('click', '.cancal_action', function(e) {
                e.preventDefault();
                $('.cb-element:checked').prop('checked', false);
                $('#checkall').prop('checked', false);
                updateMultipleActionVisibility()
            })

            function updateMultipleActionVisibility() {
                if ($('.cb-element:checked').length > 0) {
                    $('.multiple_action').show();
                    $('.count_checkbox').text('Đã chọn ' + $('.cb-element:checked').length);
                } else {
                    $('.multiple_action').hide();
                }
            }
            //Hiển thị danh sách mã sản phẩm
            // $(".list_code").hide();
            // $('.product_code').on("click", function(e) {
            //     e.stopPropagation();
            //     $(this).closest('tr').find(".list_code").show();
            // });
            // $(document).on("click", function(e) {
            //     if (!$(e.target).is(".product_code")) {
            //         $(".list_code").hide();
            //     }
            // });
            //Hiển thị danh sách tên sản phẩm
            $(".list_product").hide();
            $('.product_name').on("click", function(e) {
                e.stopPropagation();
                $(this).closest('tr').find(".list_product").show();
            });
            $(document).on("click", function(e) {
                if (!$(e.target).is(".product_name")) {
                    $(".list_product").hide();
                }
            });
            //search mã sản phẩm
            // $(".product_code").on("keyup", function() {
            //     var value = $(this).val().toUpperCase();
            //     var $tr = $(this).closest("tr");
            //     $tr.find(".list_code li").each(function() {
            //         var text = $(this).find("a").text().toUpperCase();
            //         $(this).toggle(text.indexOf(value) > -1);
            //     });
            // });
            //search tên sản phẩm
            $(".product_name").on("keyup", function() {
                var value = $(this).val().toUpperCase();
                var $tr = $(this).closest("tr");
                $tr.find(".list_product li").each(function() {
                    var text = $(this).find("a").text().toUpperCase();
                    $(this).toggle(text.indexOf(value) > -1);
                });
            });
            //lấy thông tin sản phẩm
            $(document).ready(function() {
                $('.idProduct').click(function() {
                    var productName = $(this).closest('tr').find('.product_name');
                    var productUnit = $(this).closest('tr').find('.product_unit');
                    var thue = $(this).closest('tr').find('.product_tax');
                    var product_id = $(this).closest('tr').find('.product_id');
                    var tonkho = $(this).closest('tr').find('.tonkho');
                    var idProduct = $(this).attr('id');
                    var soTonKho = $(this).closest('tr').find('.soTonKho');
                    var infoProduct = $(this).closest('tr').find('.info-product');
                    var inventory = $(this).closest('tr').find('.inventory');

                    $.ajax({
                        url: '{{ route('getProduct') }}',
                        type: 'GET',
                        data: {
                            idProduct: idProduct
                        },
                        success: function(data) {
                            productName.val(data.product_name);
                            productUnit.val(data.product_unit);
                            thue.val(data.product_tax);
                            product_id.val(data.id);
                            tonkho.val(data.product_inventory)
                            soTonKho.text(parseFloat(data.product_inventory == null ? 0 : data.product_inventory));
                            infoProduct.show();
                            if (data.product_inventory > 0) {
                                inventory.show();
                            }
                        }
                    });
                });
            });
            //lấy thông tin mã sản phẩm
            // $(document).ready(function() {
            //     $('.maSP').click(function() {
            //         var idCode = $(this).attr('id');
            //         var productCode = $(this).closest('tr').find('.product_code');
            //         $.ajax({
            //             url: '{{ route('getProductCode') }}',
            //             type: 'GET',
            //             data: {
            //                 idCode: idCode
            //             },
            //             success: function(data) {
            //                 productCode.val(data.product_code);
            //             }
            //         });
            //     });
            // });
            //Xem thông tin sản phẩm
            $('.info-product').click(function() {
                var productName = $(this).closest('tr').find('.product_name').val();
                var dvt = $(this).closest('tr').find('.product_unit').val();
                var thue = $(this).closest('tr').find('.product_tax').val();
                var tonKho = $(this).closest('tr').find('.tonkho').val();
                $('#productModal').find('.modal-body').html('<b>Tên sản phẩm: </b> ' +
                    productName + '<br>' +
                    '<b>Đơn vị: </b>' + dvt + '<br>' + '<b>Tồn kho: </b>' + tonKho +
                    '<br>' + '<b>Thuế: </b>' +
                    (thue == 99 || thue == null ? "NOVAT" : thue + '%'));
            });
            //Mở rộng
            if (status_form == 1) {
                $('.change_colum').text('Tối giản');
                $('.product_price').attr('readonly', false);
                // Xóa dữ liệu trường hệ số nhân, giá nhập
                $(this).closest("tr").find('.product_ratio').val('')
                $(this).closest("tr").find('.price_import').val('')
                // Xóa required
                $('tbody .giaNhap').removeAttr('required');
                $('.product-ratio').hide();
                $('.product_ratio').hide()
                $('.price_import').hide();
                $('.note').hide();
                $('.Daydu').hide();
                $('.heSoNhan').val('')
                $('.giaNhap').val('')
            } else {
                $('.change_colum').text('Đầy đủ');
                $('.product_price').attr('readonly', true);
                $(this).closest("tr").find('.product_price').val('');
                // Xóa dữ liệu trương đơn giá
                $(this).closest("tr").find('.price_export').val('')
                // Thêm required
                $('tbody .giaNhap').attr('required', true);
                $('.product_ratio').show()
                $('.price_import').show();
                $('.note').show();
                $('.Daydu').show();
                $(this).closest("tr").find('.heSoNhan').val('');
                $(this).closest("tr").find('.giaNhap').val('');
            }
        });
    });
    //Lấy thông tin khách hàng
    $(document).ready(function() {
        var idGuest = $('.idGuest').val();
        $(document).on('click', '.search-info', function(e) {
            var idGuest = $(this).attr('id');
            $.ajax({
                url: '{{ route('searchExport') }}',
                type: 'GET',
                data: {
                    idGuest: idGuest
                },
                success: function(data) {
                    if (data.key) {
                        quotation = getQuotation(data.key, data['count'], data['date']);
                    } else {
                        quotation = getQuotation(data['provide'].provide_name_display, data[
                            'count'], data['date']);
                    }
                    $('input[name="quotation_number"]').val(quotation);
                    $('.nameGuest').val(data['guest'].guest_name_display);
                    $('.idGuest').val(data['guest'].id);
                    $.ajax({
                        url: '{{ route('searchFormByGuestId') }}',
                        type: 'GET',
                        data: {
                            idGuest: idGuest
                        },
                        success: function(data) {
                            Object.keys(data).forEach(function(key) {
                                var formField = data[key].form
                                    .form_field;
                                var dateFormId = data[key].date_form_id;
                                var formDesc = data[key].form.form_desc;
                                $("input[name='fieldDate[" + key +
                                        "]']")
                                    .val(key);
                                $("input[name='idDate[" + key +
                                        "]']")
                                    .val(dateFormId);
                                $('#myInput-' + key).val(formDesc);
                            });
                        }
                    });
                }
            });
            $.ajax({
                url: '{{ route('getRepresentGuest') }}',
                type: 'GET',
                data: {
                    idGuest: idGuest
                },
                success: function(data) {
                    $('#representativeList').empty();
                     $.each(data, function(index, representative) {
                         var listItem = $('<li class="p-2 align-items-center" style="border-radius:4px;border-bottom: 1px solid #d6d6d6;">')
                            .append($('<a>').attr({
                                    href: '#',
                                    title: representative.represent_name,
                                    class: 'text-dark d-flex justify-content-between search-represent p-2 w-100',
                                    id: representative.id,
                                    name: 'search-represent',
                                 }).append(
                                     $('<span>').addClass('text-13-black').text(representative.represent_name)
                                 ))
                         $('#representativeList').append(listItem);
                    });
                 }
            });
        });
    });
    
    // Lấy người đại diện theo khách hàng
    $(document).ready(function(){
        var idGuest = $('.idGuest').val();
        $.ajax({
                url: '{{ route('getRepresentGuest') }}',
                type: 'GET',
                data: {
                    idGuest: idGuest
                },
                success: function(data) {
                    $('#representativeList').empty();
                     $.each(data, function(index, representative) {
                         var listItem = $('<li class="p-2 align-items-center" style="border-radius:4px;border-bottom: 1px solid #d6d6d6;">')
                            .append($('<a>').attr({
                                    href: '#',
                                    title: representative.represent_name,
                                    class: 'text-dark d-flex justify-content-between search-represent p-2 w-100',
                                    id: representative.id,
                                    name: 'search-represent',
                                 }).append(
                                     $('<span>').addClass('text-13-black').text(representative.represent_name)
                                 ))
                         $('#representativeList').append(listItem);
                    });
                 }
        });
        $.ajax({
            url: '{{ route('getRepresentGuest') }}',
            type: 'GET',
            data: {
                idGuest: idGuest
            },
             success: function(data) {
                var defaultGuestItem = data.find(item => item
                      .default_guest === 1);
                    if (data.length > 1 && defaultGuestItem) {
                        $('#represent_guest').val(defaultGuestItem.represent_name);
                         $('.represent_guest_id').val(defaultGuestItem.id);
                    } else if (data.length === 1) {
                      $('#represent_guest').val(data[0].represent_name);
                      $('.represent_guest_id').val(data[0].id);
                } else {
                       $('#represent_guest').val('');
                       $('.represent_guest_id').val('');
                    }
            }
        });
    })
    //Thêm thông tin khách hàng
    $(document).on('click', '#addGuest', function(e) {
        var guest_name_display = $('input[name="guest_name_display"]').val();
        var guest_name = $('#guest_name').val();
        var guest_address = $('#guest_address').val();
        var guest_code = $('#guest_code').val();
        var guest_email = $('#guest_email').val();
        var guest_phone = $('#guest_phone').val();
        var guest_receiver = $('#guest_receiver').val();
        var guest_email_personal = $('#guest_email_personal').val();
        var guest_phone_receiver = $('#guest_phone_receiver').val();
        var guest_note = $('#guest_note').val();
        var key = $("input[name='key']").val().trim();
        $('.nameGuest').val(null);
        $('.idGuest').val(null);
        $.ajax({
            url: "{{ route('addGuest') }}",
            type: "get",
            data: {
                guest_name_display: guest_name_display,
                guest_name: guest_name,
                guest_address: guest_address,
                guest_code: guest_code,
                guest_email: guest_email,
                guest_phone: guest_phone,
                guest_receiver: guest_receiver,
                guest_email_personal: guest_email_personal,
                guest_phone_receiver: guest_phone_receiver,
                guest_note: guest_note,
                key: key,
            },
            success: function(data) {
                if (data.success) {
                    quotation = getQuotation(data.key, '1')
                    $('input[name="quotation_number"]').val(quotation);
                    $('.nameGuest').val(data.guest_name_display);
                    alert(data.msg);
                    $('.idGuest').val(data.id);
                    $('.modal [data-dismiss="modal"]').click();
                    // Nếu thành công, tạo một mục mới
                    var newGuestInfo = data;
                    var guestList = $('#myUL'); // Danh sách hiện có
                    var newListItem =
                        '<li><a href="#" class="text-dark d-flex justify-content-between p-2 search-info" id="' +
                        newGuestInfo.id + '" name="search-info">' +
                        '<span class="w-50">' + newGuestInfo.guest_name_display +
                        '</span></a></li>';
                    // Thêm mục mới vào danh sách
                    var addButton = $(".addGuestNew");
                    $(newListItem).insertBefore(addButton);
                    //clear
                    $('#guest_name_display').val('');
                    $("input[name='key']").val('');
                    $('#guest_address').val(null);
                    $('#guest_code').val(null);
                } else {
                    alert(data.msg);
                }
            }
        });
    });

    //Mở rộng
    var status_form = 0;
    $('.change_colum').off('click').on('click', function() {
        if (status_form == 0) {
            $(this).text('Tối giản');
            $('.product_price').attr('readonly', false);
            // Xóa dữ liệu trường hệ số nhân, giá nhập
            $('.product_ratio').val('')
            $('.price_import').val('')
            // Xóa required
            $('tbody .heSoNhan').removeAttr('required');
            $('tbody .giaNhap').removeAttr('required');
            $('.product-ratio').hide();
            $('.product_ratio').hide()
            $('.price_import').hide();
            $('.note').hide();
            $('.Daydu').hide();
            $('.heSoNhan').val('');
            $('.giaNhap').val('');
            status_form = 1;
        } else {
            $(this).text('Đầy đủ');
            $('.product_price').attr('readonly', true);
            // Xóa dữ liệu trương đơn giá
            $('.product_price').val('');
            $('.total-amount').val('');
            $('#total-amount-sum').text('0đ');
            $('#grand-total').text('0đ');
            $('#product-tax').text('0đ');
            // Thêm required
            $('tbody .heSoNhan').attr('required', true);
            $('tbody .giaNhap').attr('required', true);
            $('.product_ratio').show();
            $('.price_import').show();
            $('.note').show();
            $('.Daydu').show();
            status_form = 0;
        }
    });

    //format giá
    $('body').on('input', '.product_price, #transport_fee, .giaNhap, #voucher', function(event) {
        // Lấy giá trị đã nhập
        var value = event.target.value;

        // Xóa các ký tự không phải số và dấu phân thập phân từ giá trị
        var formattedValue = value.replace(/[^0-9.]/g, '');

        // Định dạng số với dấu phân cách hàng nghìn và giữ nguyên số thập phân
        var formattedNumber = numberWithCommas(formattedValue);

        event.target.value = formattedNumber;
    });

    function numberWithCommas(number) {
        // Chia số thành phần nguyên và phần thập phân
        var parts = number.split('.');
        var integerPart = parts[0];
        var decimalPart = parts[1];

        // Định dạng phần nguyên số với dấu phân cách hàng nghìn
        var formattedIntegerPart = integerPart.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");

        // Kết hợp phần nguyên và phần thập phân (nếu có)
        var formattedNumber = decimalPart !== undefined ? formattedIntegerPart + '.' + decimalPart :
            formattedIntegerPart;

        return formattedNumber;
    }

    //xóa sản phẩm
    $('.delete-product').click(function() {
        $(this).closest("tr").remove();
        calculateTotals();
        calculateGrandTotal();
        var productTaxText = $('#product-tax').text();
        var productTaxValue = parseFloat(productTaxText.replace(/,/g, ''));
        var taxAmount = parseFloat(('.product_tax1').text());
        var totalTax = productTaxValue - taxAmount;
        $('#product-tax').text(totalTax);
    });

    //Hiển thị danh sách tên sản phẩm
    // $(".list_product").hide();
    $('.product_name').on("click", function(e) {
        e.stopPropagation();
        $(this).closest('tr').find(".list_product").show();
    });
    $(document).on("click", function(e) {
        if (!$(e.target).is(".product_name")) {
            $(".list_product").hide();
        }
    });
    //search tên sản phẩm
    $(".product_name").on("keyup", function() {
        var value = $(this).val().toUpperCase();
        var $tr = $(this).closest("tr");
        $tr.find(".list_product li").each(function() {
            var text = $(this).find("a").text().toUpperCase();
            $(this).toggle(text.indexOf(value) > -1);
        });
    });
    //lấy thông tin sản phẩm
    $(document).ready(function() {
        $('.idProduct').click(function() {
            var productName = $(this).closest('tr').find('.product_name');
            var productUnit = $(this).closest('tr').find('.product_unit');
            var thue = $(this).closest('tr').find('.product_tax');
            var product_id = $(this).closest('tr').find('.product_id');
            var tonkho = $(this).closest('tr').find('.tonkho');
            var idProduct = $(this).attr('id');
            var soTonKho = $(this).closest('tr').find('.soTonKho');
            $.ajax({
                url: '{{ route('getProduct') }}',
                type: 'GET',
                data: {
                    idProduct: idProduct
                },
                success: function(data) {
                    productName.val(data.product_name);
                    productUnit.val(data.product_unit);
                    thue.val(data.product_tax);
                    product_id.val(data.id);
                    tonkho.val(data.product_inventory)
                    $('.info-product').show();
                    soTonKho.text(parseFloat(data
                        .product_inventory));
                    if (data.product_inventory !== null) {
                        $('.inventory').show();
                        $('.transaction').show();
                    }
                }
            });
        });
    });

    //tính thành tiền của sản phẩm
    $(document).ready(function() {
        calculateTotals();
    });

    $(document).on('input', '.quantity-input, [name^="product_price"], .product_tax, .heSoNhan, .giaNhap', function() {
        calculateTotals();
    });

    function calculateTotals() {
        var totalAmount = 0;
        var totalTax = 0;

        // Lặp qua từng hàng
        $('tr').each(function() {
            var productQty = parseFloat($(this).find('.quantity-input').val());
            var productPriceElement = $(this).find('[name^="product_price"]');
            var productPrice = 0;
            var giaNhap = 0;
            var taxValue = parseFloat($(this).find('.product_tax option:selected').val());
            var heSoNhan = parseFloat($(this).find('.heSoNhan').val()) || 0;
            var giaNhapElement = $(this).find('.giaNhap');
            if (taxValue == 99) {
                taxValue = 0;
            }
            if (productPriceElement.length > 0) {
                var rawPrice = productPriceElement.val();
                if (rawPrice !== "") {
                    productPrice = parseFloat(rawPrice.replace(/,/g, ''));
                }
            }
            if (giaNhapElement.length > 0) {
                var rawGiaNhap = giaNhapElement.val();
                if (rawGiaNhap !== "") {
                    giaNhap = parseFloat(rawGiaNhap.replace(/,/g, ''));
                }
            }

            if (!isNaN(productQty) && !isNaN(taxValue)) {
                if (giaNhap > 0) {
                    var donGia = ((heSoNhan + 100) * giaNhap) / 100;
                } else {
                    var donGia = productPrice;
                }
                var rowTotal = productQty * donGia;
                var rowTax = (rowTotal * taxValue) / 100;

                // Làm tròn từng thuế
                rowTax = Math.round(rowTax);
                $(this).find('.product_tax1').val(formatCurrency(rowTax));

                // Hiển thị kết quả
                $(this).find('.total-amount').val(formatCurrency(Math.round(rowTotal)));

                if (status_form == 0) {
                    // Đơn giá
                    $(this).find('.product_price').val(formatCurrency(donGia));
                }

                // Cộng dồn vào tổng totalAmount và totalTax
                totalAmount += rowTotal;
                totalTax += rowTax;
            }
        });

        // Hiển thị tổng totalAmount và totalTax
        $('#total-amount-sum').text(formatCurrency(Math.round(totalAmount)));
        $('#product-tax').text(formatCurrency(Math.round(totalTax)));

        // Tính tổng thành tiền và thuế
        calculateGrandTotal(totalAmount, totalTax);
    }

    function calculateGrandTotal(totalAmount, totalTax) {
        if (!isNaN(totalAmount) || !isNaN(totalTax)) {
            var grandTotal = totalAmount + totalTax;
            $('#grand-total').text(formatCurrency(Math.round(grandTotal)));
        }

        // Cập nhật giá trị data-value
        $('#grand-total').attr('data-value', grandTotal);
        $('#total').val(totalAmount);
    }

    function formatCurrency(value) {
        // Làm tròn đến 2 chữ số thập phân
        value = Math.round(value * 100) / 100;

        // Xử lý phần nguyên
        var parts = value.toString().split(".");
        var integerPart = parts[0];
        var formattedValue = "";

        // Định dạng phần nguyên
        var count = 0;
        for (var i = integerPart.length - 1; i >= 0; i--) {
            formattedValue = integerPart.charAt(i) + formattedValue;
            count++;
            if (count % 3 === 0 && i !== 0) {
                formattedValue = "," + formattedValue;
            }
        }

        // Nếu có phần thập phân, thêm vào sau phần nguyên
        if (parts.length > 1) {
            formattedValue += "." + parts[1];
        }

        return formattedValue;
    }
    //
    var productNameInputs = document.querySelectorAll('.product_name');

    productNameInputs.forEach(function(input) {
        input.addEventListener('input', function() {
            var productIdInput = this.parentElement.querySelector('.product_id');
            productIdInput.value = '';
        });
    });

    function kiemTraFormGiaoHang(event) {
        event.preventDefault();

        var rows = document.querySelectorAll('tr');
        var hasProducts = false;

        for (var i = 1; i < rows.length; i++) {
            if (rows[i].classList.contains('addProduct')) {
                hasProducts = true;
            }
        }

        // Hiển thị thông báo nếu không có sản phẩm
        if (!hasProducts) {
            alert("Không có sản phẩm để báo giá");
            event.preventDefault();
        }
        var quotetion_number = $('input[name="quotation_number"]').val();
        var detail_id = {{ $detailExport->maBG }}
        $('button[name="action"]').val('action_1');

        if (hasProducts) {
            $.ajax({
                url: "{{ route('checkQuotetionExport') }}",
                type: "get",
                data: {
                    quotetion_number: quotetion_number,
                    detail_id: detail_id

                },
                success: function(data) {
                    if (!data['status']) {
                        alert('Số báo giá đã tồn tại')
                    } else {
                        $('input[name="action"]').val('action_1');
                        $('form')[0].submit();
                    }
                }
            })
        }
    }
    //xem thông tin sản phẩm
    $('.info-product').click(function() {
        var idProduct = $(this).closest('tr').find('.product_id').val();

        $.ajax({
            url: '{{ route('getProductFromQuote') }}',
            type: 'GET',
            data: {
                idProduct: idProduct
            },
            success: function(data) {
                if (Array.isArray(data) && data.length > 0) {
                    var productData = data[0];
                    $('#productModal').find('.modal-body').html('<b>Tên sản phẩm: </b> ' +
                        productData.product_name + '<br>' + '<b>Đơn vị: </b>' + productData
                        .product_unit + '<br>' + '<b>Tồn kho: </b>' + (productData
                            .product_inventory == null ? 0 : productData
                            .product_inventory) + '<br>' + '<b>Thuế: </b>' + (productData
                            .product_tax == 99 || productData.product_tax == null ? "NOVAT" :
                            productData.product_tax + '%'
                        ));
                }
            }
        });
    });
</script>
</body>

</html>
