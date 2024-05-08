<div>
    <div id="list_modal">
        {{-- @dd($receive) --}}
        <?php $stt = 0; ?>
        @foreach ($product as $pro)
            <div class="modal fade" id="exampleModal{{ $stt }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                style="display: none;" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header align-items-center">
                            <h5 class="modal-title" id="exampleModalLabel">Thông tin Serial Number</h5>

                            <div>
                                <button type="button" class="btn-destroy btn-light mx-1 d-flex align-items-center h-100" data-dismiss="modal">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                            viewBox="0 0 14 14" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M7 14C10.866 14 14 10.866 14 7C14 3.13401 10.866 0 7 0C3.13401 0 0 3.13401 0 7C0 10.866 3.13401 14 7 14ZM5.03033 3.96967C4.73744 3.67678 4.26256 3.67678 3.96967 3.96967C3.67678 4.26256 3.67678 4.73744 3.96967 5.03033L5.93934 7L3.96967 8.96967C3.67678 9.26256 3.67678 9.73744 3.96967 10.0303C4.26256 10.3232 4.73744 10.3232 5.03033 10.0303L7 8.06066L8.96967 10.0303C9.26256 10.3232 9.73744 10.3232 10.0303 10.0303C10.3232 9.73744 10.3232 9.26256 10.0303 8.96967L8.06066 7L10.0303 5.03033C10.3232 4.73744 10.3232 4.26256 10.0303 3.96967C9.73744 3.67678 9.26256 3.67678 8.96967 3.96967L7 5.93934L5.03033 3.96967Z"
                                                fill="#6D7075"></path>
                                        </svg>
                                    </span>
                                    <span class="text-btnIner-primary ml-2">Hủy</span>
                                </button>
                                <button type="button" class="custom-btn mx-1 d-flex align-items-center h-100" data-dismiss="modal">
                                    <span><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                            viewBox="0 0 14 14" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M7 14C10.866 14 14 10.866 14 7C14 3.13401 10.866 0 7 0C3.13401 0 0 3.13401 0 7C0 10.866 3.13401 14 7 14ZM10.7836 5.42901C11.0858 5.08709 11.0695 4.55006 10.7472 4.22952C10.4248 3.90897 9.9186 3.9263 9.6164 4.26821L6.14921 8.19122L4.3315 6.4773C4.00127 6.16593 3.49561 6.19748 3.20208 6.54777C2.90855 6.89806 2.93829 7.43445 3.26852 7.74581L5.28032 9.6427C5.82041 10.152 6.64463 10.1122 7.13886 9.553L10.7836 5.42901Z"
                                                fill="white"></path>
                                        </svg>
                                    </span>
                                    <span class="text-btnIner-primary ml-2">Xác nhận</span>
                                </button>
                            </div>
                            {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button> --}}
                        </div>
                        <div class="modal-body">
                            <table id="table_SNS">
                                <thead>
                                    <tr>
                                        <th class="text-table text-secondary border-bottom" style="width:15%">STT</th>
                                        <th class="text-table text-secondary border-bottom" style="width:100%">Serial number</th>
                                        <th style="width:3%" class="border-bottom"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($pro->getSerialNumber && count($pro->getSerialNumber) > 0)
                                        @php $st = 1; @endphp
                                        @foreach ($pro->getSerialNumber as $item)
                                            <tr>
                                                @if ($pro->quoteImport_id == $item->quoteImport_id)
                                                    <td class="border-bottom">{{ $st++ }}</td>
                                                    <td class="border-bottom">
                                                        <input class="form-control w-100 border-0 pl-0" type="text"
                                                            name="seri{{ $stt }}[]"
                                                            value="{{ $item->serinumber }}" readonly
                                                            style="background: none">
                                                    </td>
                                                    <td class="border-bottom"
                                                        @if (!$receive) class="deleteRow1" @endif>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                            height="14" viewBox="0 0 12 14" fill="none">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M10.3687 5.5C10.6448 5.5 10.8687 5.72386 10.8687 6C10.8687 6.03856 10.8642 6.07699 10.8554 6.11452L9.3628 12.4581C9.1502 13.3615 8.3441 14 7.41597 14H4.58403C3.65593 14 2.84977 13.3615 2.6372 12.4581L1.14459 6.11452C1.08135 5.84572 1.24798 5.57654 1.51678 5.51329C1.55431 5.50446 1.59274 5.5 1.6313 5.5H10.3687ZM6.5 0C7.88071 0 9 1.11929 9 2.5H11C11.5523 2.5 12 2.94772 12 3.5V4C12 4.27614 11.7761 4.5 11.5 4.5H0.5C0.22386 4.5 0 4.27614 0 4V3.5C0 2.94772 0.44772 2.5 1 2.5H3C3 1.11929 4.11929 0 5.5 0H6.5ZM6.5 1.5H5.5C4.94772 1.5 4.5 1.94772 4.5 2.5H7.5C7.5 1.94772 7.05228 1.5 6.5 1.5Z"
                                                                fill="#6D7075" />
                                                        </svg>
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td>1</td>
                                            <td><input class="form-control w-100" type="text"
                                                    name="seri{{ $stt }}[]"></td>
                                            <td class="deleteRow1"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="32" height="32" viewBox="0 0 32 32" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M14.0606 6.66675C13.6589 6.66675 13.3333 6.99236 13.3333 7.39402C13.3333 7.79568 13.6589 8.12129 14.0606 8.12129H17.9394C18.341 8.12129 18.6667 7.79568 18.6667 7.39402C18.6667 6.99236 18.341 6.66675 17.9394 6.66675H14.0606ZM8 10.3031C8 9.90143 8.32561 9.57582 8.72727 9.57582H10.1818H21.8182H23.2727C23.6744 9.57582 24 9.90143 24 10.3031C24 10.7048 23.6744 11.0304 23.2727 11.0304H22.5455V22.6667C22.5455 24.2819 21.2158 25.5758 19.6179 25.5758H12.3452C11.9637 25.5755 11.5854 25.4997 11.2333 25.3528C10.8812 25.2059 10.5617 24.9908 10.2931 24.7199C10.0244 24.449 9.81206 24.1276 9.66816 23.7743C9.52463 23.4219 9.45204 23.0447 9.45455 22.6642V11.0304H8.72727C8.32561 11.0304 8 10.7048 8 10.3031ZM10.9091 22.6723V11.0304H21.0909V22.6667C21.0909 23.4623 20.4288 24.1213 19.6179 24.1213H12.3458C12.1562 24.1211 11.9684 24.0834 11.7934 24.0104C11.6183 23.9374 11.4595 23.8304 11.3259 23.6958C11.1924 23.5611 11.0868 23.4013 11.0153 23.2257C10.9437 23.05 10.9076 22.8619 10.9091 22.6723ZM17.9394 13.4546C18.3411 13.4546 18.6667 13.7802 18.6667 14.1819V20.9698C18.6667 21.3714 18.3411 21.6971 17.9394 21.6971C17.5377 21.6971 17.2121 21.3714 17.2121 20.9698V14.1819C17.2121 13.7802 17.5377 13.4546 17.9394 13.4546ZM14.7879 14.1819C14.7879 13.7802 14.4623 13.4546 14.0606 13.4546C13.6589 13.4546 13.3333 13.7802 13.3333 14.1819V20.9698C13.3333 21.3714 13.6589 21.6971 14.0606 21.6971C14.4623 21.6971 14.7879 21.3714 14.7879 20.9698V14.1819Z"
                                                        fill="#555555"></path>
                                                </svg>
                                            </td>
                                        </tr>
                                    @endif
                                    {{-- @else
                                        @if ($pro->getProductImport->getSerialNumber)
                                            @foreach ($pro->getProductImport->getSerialNumber as $sn)
                                                <tr>
                                                    <td><input type="checkbox"></td>
                                                    <td>1</td>
                                                    <td><input class="form-control w-25" type="text"
                                                            name="seri{{ $stt }}[]"
                                                            value="{{ $sn->serinumber }}" readonly></td>
                                                    <td class="@if ($status == 1) deleteRow1 @endif">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="32"
                                                            height="32" viewBox="0 0 32 32" fill="none">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M14.0606 6.66675C13.6589 6.66675 13.3333 6.99236 13.3333 7.39402C13.3333 7.79568 13.6589 8.12129 14.0606 8.12129H17.9394C18.341 8.12129 18.6667 7.79568 18.6667 7.39402C18.6667 6.99236 18.341 6.66675 17.9394 6.66675H14.0606ZM8 10.3031C8 9.90143 8.32561 9.57582 8.72727 9.57582H10.1818H21.8182H23.2727C23.6744 9.57582 24 9.90143 24 10.3031C24 10.7048 23.6744 11.0304 23.2727 11.0304H22.5455V22.6667C22.5455 24.2819 21.2158 25.5758 19.6179 25.5758H12.3452C11.9637 25.5755 11.5854 25.4997 11.2333 25.3528C10.8812 25.2059 10.5617 24.9908 10.2931 24.7199C10.0244 24.449 9.81206 24.1276 9.66816 23.7743C9.52463 23.4219 9.45204 23.0447 9.45455 22.6642V11.0304H8.72727C8.32561 11.0304 8 10.7048 8 10.3031ZM10.9091 22.6723V11.0304H21.0909V22.6667C21.0909 23.4623 20.4288 24.1213 19.6179 24.1213H12.3458C12.1562 24.1211 11.9684 24.0834 11.7934 24.0104C11.6183 23.9374 11.4595 23.8304 11.3259 23.6958C11.1924 23.5611 11.0868 23.4013 11.0153 23.2257C10.9437 23.05 10.9076 22.8619 10.9091 22.6723ZM17.9394 13.4546C18.3411 13.4546 18.6667 13.7802 18.6667 14.1819V20.9698C18.6667 21.3714 18.3411 21.6971 17.9394 21.6971C17.5377 21.6971 17.2121 21.3714 17.2121 20.9698V14.1819C17.2121 13.7802 17.5377 13.4546 17.9394 13.4546ZM14.7879 14.1819C14.7879 13.7802 14.4623 13.4546 14.0606 13.4546C13.6589 13.4546 13.3333 13.7802 13.3333 14.1819V20.9698C13.3333 21.3714 13.6589 21.6971 14.0606 21.6971C14.4623 21.6971 14.7879 21.3714 14.7879 20.9698V14.1819Z"
                                                                fill="#555555"></path>
                                                        </svg>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    @endif --}}
                                </tbody>
                            </table>
                            <div class="mt-4">
                                @if (!$receive)
                                    <button type="button" class="btn btn-primary addRow">Thêm
                                        dòng</button>
                                @endif
                            </div>

                        </div>
                        {{-- <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Lưu</button>
                        </div> --}}
                    </div>
                </div>
            </div>
            <?php $stt++; ?>
        @endforeach
    </div>
</div>
