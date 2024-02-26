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
                        <input class="form-control" type="text" name="workspace_name">
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



    </x-app-layout>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
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
