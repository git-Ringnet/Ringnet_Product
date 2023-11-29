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
                        </td>
                        <td>
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M27.9998 15.9997C27.9998 14.5269 26.8059 13.333 25.3332 13.333C23.8604 13.333 22.6665 14.5269 22.6665 15.9997C22.6665 17.4724 23.8604 18.6663 25.3332 18.6663C26.8059 18.6663 27.9998 17.4724 27.9998 15.9997Z"
                                    fill="#42526E" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M18.6668 15.9997C18.6668 14.5269 17.4729 13.333 16.0002 13.333C14.5274 13.333 13.3335 14.5269 13.3335 15.9997C13.3335 17.4724 14.5274 18.6663 16.0002 18.6663C17.4729 18.6663 18.6668 17.4724 18.6668 15.9997Z"
                                    fill="#42526E" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M9.33333 15.9997C9.33333 14.5269 8.13943 13.333 6.66667 13.333C5.19391 13.333 4 14.5269 4 15.9997C4 17.4724 5.19391 18.6663 6.66667 18.6663C8.13943 18.6663 9.33333 17.4724 9.33333 15.9997Z"
                                    fill="#42526E" />
                            </svg>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>
