<div>
    <table class="table table-hover bg-white rounded">
        <thead>
            <tr>
                <th class="border-right"><input type="checkbox"></th>
                <th class="border-right">Tên file</th>
                <th class="border-right">Chủ nhân</th>
                <th class="border-right">Chỉnh sửa cuối</th>
                <th class="border-right">Kích cỡ</th>
                <th class="border-right"></th>
            </tr>
        </thead>
        <tbody>
            @if ($import->getAttachment('DMH'))
                @foreach ($import->getAttachment('DMH') as $item)
                    <tr>
                        <td><input type="checkbox"></td>
                        <td>{{ $item->file_name }}</td>
                        <td>
                            @if ($item->getUsers)
                                {{ $item->getUsers->name }}
                            @endif
                        </td>
                        <td>{{ date_format(new DateTime($item->created_at), 'd-m-Y') }}</td>
                        <td>
                            {{ filesize(storage_path('backup/DMH/' . $item->file_name)) }}
                        </td>
                        <td>
                            <a href="{{ route('downloadFile', ['file' => $item->file_name]) }}" download><svg
                                    width="32" height="32" viewBox="0 0 32 32" fill="none"
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
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>
