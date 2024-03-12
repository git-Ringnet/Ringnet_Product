    <style>
        .toggle {
            margin-bottom: 10px;

            label {
                position: relative;
                display: inline-block;
                width: 90px;
                height: 50px;
                background-color: #e1e1e1;
                border-radius: 50px;
                transition: all 0.3s ease-in-out;
                cursor: pointer;
                box-shadow: inset 0 0 2px 1px rgba(0, 0, 0, 0.1);
                -webkit-tap-highlight-color: transparent;

                &:before {
                    content: "";
                    position: absolute;
                    top: 3px;
                    left: 3px;
                    height: 44px;
                    width: 44px;
                    background-color: #fff;
                    border-radius: 46px;
                    box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.1);
                    transition: box-shadow 0.3s ease-in-out;
                    animation: moveLeft 0.3s ease-in-out;
                }
            }

            input {
                display: none;

                &:checked+label {
                    background-color: #57de72;

                    &:before {
                        transform: translateX(40px);
                        box-shadow: -1px -1px 5px rgba(0, 0, 0, 0.1);
                        animation: moveRight 0.3s ease-in-out;
                    }
                }
            }
        }

        @keyframes moveRight {
            0% {
                width: 46px;
                transform: translateX(0);
            }

            45% {
                width: 52px;
            }

            100% {
                width: 46px;
                transform: translateX(40px);
            }
        }

        @keyframes moveLeft {
            0% {
                width: 46px;
                transform: translateX(40px);
            }

            45% {
                width: 52px;
            }

            100% {
                width: 46px;
                transform: translateX(0);
            }
        }

        .url_link,
        #email,
        .search-input,
        #roles-option {
            height: 30px;
            padding: 6px 20px 7px 16px !important;
            border-radius: 4px !important;
            border: 1px solid #DFE1E4;
            font-size: 12px;
        }
    </style>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Quản lý workspace
            </h2>
        </x-slot>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                @if (!$issetworkspace)
                    <form action="{{ route('createWorkspace') }}" method="POST">
                        @csrf
                        <input class="form-control" type="text" name="workspace_name" required>
                        <button>Gửi</button>
                    </form>
                @endif
                <h2 class="text-dark">Danh sách workspaces</h2>
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    {{-- <x-welcome /> --}}
                    {{-- @dd($workspaceNames) --}}
                    @foreach ($workspaceNames as $item)
                        <a class="workspace-link" href="{{ route('welcome', $item['workspace_name']) }}"
                            data-id="{{ $item['id'] }}">{{ $item['workspace_name'] }}</a>
                        <br>
                    @endforeach
                    <input type="hidden" id="idUser" name="idUser" value="{{ Auth::user()->id }}">
                </div>
                <br>
                <div class="d-none" style="display: none">
                    @if ($invitation)
                        <label for="">Bật tắt Invite</label>
                        <div class="toggle">
                            <input type="checkbox" id="toggle2" name="toggle_invitation"
                                {{ $invitation->status ? 'checked' : '' }} />
                            <label for="toggle2"></label>
                        </div>
                        <input type="hidden" name="invi_workspace_id" value="{{ $invitation->workspace_id }}">
                        <input type="hidden" name="invi_token" value="{{ $invitation->token }}">
                        <br>
                        <div class="div-url"
                            style="{{ $invitation && $invitation->status == 1 ? 'display: block;' : 'display: none;' }}">
                            <label for="">URL LINK</label>
                            <input class="url_link" style="width: 100%" type="text"
                                value="{{ route('invite', ['token' => $invitation->token, 'workspace_id' => $invitation->workspace_id]) }}">
                            <button id="toggle1">Random</button>
                        </div>
                        <br>
                    @endif

                    <form action="{{ route('sendInvitation') }}" method="post">
                        @csrf
                        <label for="email">Email:</label>
                        <input type="email" name="email" required>
                        <button type="submit">Send Invitation</button>
                    </form>
                </div>
            </div>
        </div>
        <form action="{{ route('import') }}" enctype="multipart/form-data" method="POST" id="restore_data"
            class="btn btn-outline-primary d-flex align-items-center h-100 custom-btn">
            @csrf
            <label class="btn-file mb-0 wf-500" style="color:#0095F6; font-weight : 500">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    class="mr-1">
                    <path
                        d="M6.78565 11.9915C7.26909 11.9915 7.71035 11.9915 8.1516 11.9915C8.23486 11.9915 8.31812 11.9899 8.40082 11.9926C8.5923 11.9987 8.72995 12.0903 8.80599 12.2657C8.88425 12.445 8.84429 12.6071 8.71108 12.7425C8.40082 13.0589 8.08666 13.3713 7.77362 13.6855C7.28519 14.1762 6.79731 14.6679 6.30721 15.1569C6.03135 15.4322 5.81489 15.4322 5.54125 15.158C4.75809 14.3737 3.97771 13.5873 3.19344 12.8047C3.03969 12.6509 2.94423 12.4861 3.03581 12.2679C3.13016 12.0431 3.31666 11.9871 3.54367 11.9899C4.02822 11.996 4.51221 11.9915 5.01619 11.9915C5.03173 11.7812 5.04227 11.5769 5.0617 11.3732C5.33145 8.55805 6.6752 6.39617 9.13957 5.02744C14.0156 2.31941 19.6492 5.27333 20.8021 10.2814C21.7784 14.5225 19.0442 18.8202 14.7788 19.7643C12.3693 20.2977 10.1664 19.8015 8.1838 18.3334C7.74531 18.0087 7.65762 17.4681 7.964 17.0546C8.26983 16.6422 8.80821 16.5761 9.25003 16.9114C10.4556 17.825 11.811 18.2396 13.3223 18.1885C16.042 18.0969 18.502 16.0228 19.0726 13.3219C19.8113 9.82465 17.4652 6.4217 13.9246 5.85334C10.641 5.32605 7.4134 7.66055 6.89777 10.9414C6.84504 11.28 6.8245 11.6241 6.78565 11.9915Z"
                        fill="#0095F6" />
                    <path
                        d="M12.129 10.7643C12.129 10.2315 12.1274 9.69806 12.1296 9.16522C12.1312 8.74062 12.406 8.44811 12.7945 8.44922C13.183 8.45033 13.4567 8.74339 13.4578 9.17022C13.4606 10.091 13.4617 11.0118 13.4556 11.9326C13.4545 12.0675 13.4955 12.143 13.6132 12.2118C14.4075 12.6758 15.1973 13.1476 15.9876 13.6183C16.238 13.7676 16.3568 13.9952 16.3246 14.281C16.2935 14.5602 16.1342 14.7733 15.8572 14.8244C15.6868 14.8555 15.4692 14.8433 15.3238 14.7606C14.398 14.2344 13.485 13.6855 12.5714 13.1382C12.2767 12.9611 12.1279 12.6925 12.129 12.3434C12.1301 11.8166 12.129 11.2905 12.129 10.7643Z"
                        fill="#0095F6" />
                </svg>
                Khôi phục<input type="file" style="display: none;" id="file_restore" name="file">
            </label>
        </form>


    </x-app-layout>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).on('change', '#file_restore', function(e) {
            e.preventDefault();
            $('#restore_data')[0].submit();
        })
        $('.workspace-link').on('click', function(event) {
            var workspaceId = $(this).data('id');
            var idUser = $('#idUser').val();
            $.ajax({
                url: '{{ route('updateWorkspaceUser') }}',
                type: 'GET',
                data: {
                    idUser: idUser,
                    workspaceId: workspaceId,
                },
                success: function(data) {
                    // console.log(data);
                }
            });
        });
        $(document).ready(function() {
            $('#toggle2,#toggle1').on('click', function() {
                var isChecked = $('input[name="toggle_invitation"]').is(':checked');
                var invi_token = $('input[name="invi_token"]').val();
                var invi_workspace_id = $('input[name="invi_workspace_id"]').val();
                // Thực hiện AJAX để gửi thông tin về trạng thái của checkbox

                $.ajax({
                    url: '{{ route('updateInvitations') }}',
                    type: 'GET',
                    data: {
                        'isChecked': isChecked,
                        'invi_token': invi_token,
                        'invi_workspace_id': invi_workspace_id,
                    },
                    success: function(data) {
                        console.log(data);
                        if (isChecked) {
                            $('.div-url').show();
                            $('.url_link').val(data.url)
                            $('.url_link').prop('disabled', false);
                        } else {
                            $('.url_link').prop('disabled', true);
                            $('.div-url').hide();

                        }
                    }
                });


            });
        });
    </script>
