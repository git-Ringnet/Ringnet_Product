<div>
    <table class="table table-hover bg-white rounded">
        <thead>
            <tr>
                <th class="border-right p-1 border-bottom"><input type="checkbox"></th>
                <th class="border-right p-1 border-bottom">
                    <span class="text-table text-secondary">Tên file</span>
                </th>
                <th class="border-right p-1 border-bottom">
                    <span class="text-table text-secondary">Chủ nhân</span>
                </th>
                <th class="border-right p-1 border-bottom">
                    <span class="text-table text-secondary">Chỉnh sửa cuối</span>
                </th>
                <th class="border-right p-1 border-bottom">
                    <span class="text-table text-secondary">Kích cỡ</span>
                </th>
                <th class="p-1 border-bottom border-right"></th>
                <th class="p-1 border-bottom"></th>
            </tr>
        </thead>
        <tbody>
            @if ($value->getAttachment($name))
                @foreach ($value->getAttachment($name) as $item)
                    <tr>
                        <td class="p-1 border-right"><input type="checkbox"></td>
                        <td class="p-1 border-right">{{ $item->file_name }}</td>
                        <td class="p-1 border-right">
                            @if ($item->getUsers)
                                {{ $item->getUsers->name }}
                            @endif
                        </td>
                        <td class="p-1 border-right">{{ date_format(new DateTime($item->created_at), 'd-m-Y') }}</td>
                        <td class="p-1 border-right">
                            {{ $item->size }} KB
                        </td>
                        <td class="p-1 border-right">
                            <a href="{{ route('downloadFile', ['folder' => $name, 'file' => $item->file_name]) }}"
                                download><svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M20.0004 10.4023H22.0002C22.5306 10.4023 23.0392 10.613 23.4143 10.9881C23.7893 11.3631 24 11.8718 24 12.4021V22.8024C24 23.3328 23.7893 23.8414 23.4143 24.2165C23.0392 24.5915 22.5306 24.8022 22.0002 24.8022H9.99982C9.46943 24.8022 8.96077 24.5915 8.58573 24.2165C8.21069 23.8414 8 23.3328 8 22.8024V12.4021C8 11.8718 8.21069 11.3631 8.58573 10.9881C8.96077 10.613 9.46943 10.4023 9.99982 10.4023H11.9996"
                                        stroke="#555555" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M11.9996 15.1992L15.9993 19.1988L20.0004 15.1992" stroke="#555555"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M16.0007 4V18.3999" stroke="#555555" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </a>
                        </td>
                        <td class="p-1 border-right">
                            <form onclick="return confirm('Bạn có chắc chắn muốn xoá !!')"
                                action="{{ route('deleteFile', ['folder' => $name, 'file' => $item->file_name]) }}"
                                method="post">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="table_id" value={{ $item->id }}>
                                <button type="submit" class="btn ml-1 btn-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                        viewBox="0 0 32 32" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M14.0606 6.66675C13.6589 6.66675 13.3333 6.99236 13.3333 7.39402C13.3333 7.79568 13.6589 8.12129 14.0606 8.12129H17.9394C18.341 8.12129 18.6667 7.79568 18.6667 7.39402C18.6667 6.99236 18.341 6.66675 17.9394 6.66675H14.0606ZM8 10.3031C8 9.90143 8.32561 9.57582 8.72727 9.57582H10.1818H21.8182H23.2727C23.6744 9.57582 24 9.90143 24 10.3031C24 10.7048 23.6744 11.0304 23.2727 11.0304H22.5455V22.6667C22.5455 24.2819 21.2158 25.5758 19.6179 25.5758H12.3452C11.9637 25.5755 11.5854 25.4997 11.2333 25.3528C10.8812 25.2059 10.5617 24.9908 10.2931 24.7199C10.0244 24.449 9.81206 24.1276 9.66816 23.7743C9.52463 23.4219 9.45204 23.0447 9.45455 22.6642V11.0304H8.72727C8.32561 11.0304 8 10.7048 8 10.3031ZM10.9091 22.6723V11.0304H21.0909V22.6667C21.0909 23.4623 20.4288 24.1213 19.6179 24.1213H12.3458C12.1562 24.1211 11.9684 24.0834 11.7934 24.0104C11.6183 23.9374 11.4595 23.8304 11.3259 23.6958C11.1924 23.5611 11.0868 23.4013 11.0153 23.2257C10.9437 23.05 10.9076 22.8619 10.9091 22.6723ZM17.9394 13.4546C18.3411 13.4546 18.6667 13.7802 18.6667 14.1819V20.9698C18.6667 21.3714 18.3411 21.6971 17.9394 21.6971C17.5377 21.6971 17.2121 21.3714 17.2121 20.9698V14.1819C17.2121 13.7802 17.5377 13.4546 17.9394 13.4546ZM14.7879 14.1819C14.7879 13.7802 14.4623 13.4546 14.0606 13.4546C13.6589 13.4546 13.3333 13.7802 13.3333 14.1819V20.9698C13.3333 21.3714 13.6589 21.6971 14.0606 21.6971C14.4623 21.6971 14.7879 21.3714 14.7879 20.9698V14.1819Z"
                                            fill="#555555"></path>
                                    </svg></button>
                            </form>
                        </td class="p-1">
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>
