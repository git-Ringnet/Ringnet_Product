<x-navbar-setting title="Thành viên" activeName="members"></x-navbar-setting>
<style>
    .toggle {
        margin-bottom: 10px;
    }

    .toggle label {
        position: relative;
        display: inline-block;
        width: 35px;
        height: 19px;
        background-color: #e1e1e1;
        border-radius: 10px;
        transition: all 0.3s ease-in-out;
        cursor: pointer;
        box-shadow: inset 0 0 2px 1px rgba(0, 0, 0, 0.1);
        -webkit-tap-highlight-color: transparent;
    }

    .toggle label:before {
        content: "";
        position: absolute;
        top: 1.5px;
        left: 1.5px;
        height: 16px;
        width: 16px;
        background-color: #fff;
        border-radius: 50%;
        box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s ease-in-out, transform 0.3s ease-in-out;
        animation: moveLeft 0.3s ease-in-out;
    }

    .toggle input {
        display: none;
    }

    .toggle input:checked+label {
        background-color: #575bc7;
    }

    .toggle input:checked+label:before {
        transform: translateX(16px);
        box-shadow: -1px -1px 5px rgba(0, 0, 0, 0.1);
        animation: moveRight 0.3s ease-in-out;
    }

    @keyframes moveRight {
        0% {
            width: 14px;
            transform: translateX(0);
        }

        45% {
            width: 16px;
        }

        100% {
            width: 14px;
            transform: translateX(16px);
        }
    }

    @keyframes moveLeft {
        0% {
            width: 14px;
            transform: translateX(16px);
        }

        45% {
            width: 16px;
        }

        100% {
            width: 14px;
            transform: translateX(0);
        }
    }

    .form-group label,
    .label {

        font-size: 20px !important;
        font-weight: 500 !important;
    }

    .url_link,
    #email,
    .search-input,
    #roles-option {
        height: 30px;
        padding: 6px 20px 7px 16px;
        border-radius: 4px;
        border: 1px solid #DFE1E4;
        font-size: 12px;
    }

    .input-icon {
        position: relative;
    }

    .input-icon input {
        width: 100%;
    }

    .input-icon button {
        position: absolute;
        top: 0;
        right: 0;
        height: 100%;
        padding: 5px;
        background: none;
        border: none;
        cursor: pointer;
    }

    #copyButton,
    #invite-member,
    .btn-send-invites {
        background: #6E79D6;
        padding: 4px 8px;
        gap: 6px;
        box-shadow: 0px 1px 2px 0px #00000017;
        color: #FFFFFF;

        font-size: 13px;
        font-weight: 500;
        border-radius: 4px;
        border: 1px solid #DFE1E4;
    }

    .icon-search {
        z-index: 1000;
        cursor: pointer;
        font-size: 12px;
        position: absolute;
        left: 5px;
        top: 50%;
        transform: translateY(-50%);
    }

    .url_link:disabled {
        opacity: .5;
        pointer-events: none;
    }

    #copyButton:disabled {
        opacity: .5;
    }

    .count-member {

        font-size: 14px;
        font-weight: 500;
        color: #282A30;
    }

    .name {

        font-size: 12px;
        font-weight: 500;
        color: #282A30;
    }

    .email,
    .role {

        font-size: 12px;
        font-weight: 500;
        color: #6B6F76;
    }

    .filter-dropdown {

        font-size: 13px;
        font-weight: 500;
    }

    .modal-body .title {
        color: #282A30;
        font-size: 12px;
        font-weight: 500;
    }

    #exampleModal {
        top: 20% !important;
    }
</style>
<div class="container">
    <div class="container">
        <div class="content-wrapper py-0 px-2" style="min-height: 335px;">
            {{-- Content --}}
            <section class="content">
                <div class="container-fluided pt-5">
                    @if ($invitation)
                        <div class="form-group d-flex align-items-center justify-content-between">
                            <label for="">Invite link</label>
                            <div class="toggle">
                                <input type="checkbox" id="toggle2" name="toggle_invitation"
                                    {{ $invitation->status ? 'checked' : '' }} />
                                <label for="toggle2"></label>
                            </div>
                        </div>
                        <input type="hidden" name="invi_workspace_id" value="{{ $invitation->workspace_id }}">
                        <input type="hidden" name="invi_token" value="{{ $invitation->token }}">
                        <br>
                        {{-- <div class="div-url"> --}}
                        <div class="div-url form-group d-flex align-items-center justify-content-between w-100"
                            style="{{ $invitation && $invitation->status == 1 ? 'display: block;' : 'display: none;' }}">
                            <div class="input-icon w-75">
                                <input class="url_link" style="padding-right: 30px;" type="text"
                                    value="{{ route('invite', ['token' => $invitation->token, 'workspace_id' => $invitation->workspace_id]) }}"
                                    {{ $invitation->status ? '' : 'disabled' }}>
                                <button id="toggle1">
                                    <i class="fa-solid fa-rotate-right"></i>
                                </button>
                            </div>
                            <button id="copyButton" {{ $invitation->status ? '' : 'disabled' }}><svg width="16"
                                    height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M4.25 1C3.38805 1 2.5614 1.34241 1.9519 1.9519C1.34241 2.5614 1 3.38805 1 4.25V8.75C1 9.61195 1.34241 10.4386 1.9519 11.0481C2.5614 11.6576 3.38805 12 4.25 12H8.75C9.61195 12 10.4386 11.6576 11.0481 11.0481C11.6576 10.4386 12 9.61195 12 8.75V4.25C12 3.38805 11.6576 2.5614 11.0481 1.9519C10.4386 1.34241 9.61195 1 8.75 1H4.25ZM2.5 4.25C2.5 3.284 3.284 2.5 4.25 2.5H8.75C9.716 2.5 10.5 3.284 10.5 4.25V8.75C10.5 9.21413 10.3156 9.65925 9.98744 9.98744C9.65925 10.3156 9.21413 10.5 8.75 10.5H4.25C3.78587 10.5 3.34075 10.3156 3.01256 9.98744C2.68437 9.65925 2.5 9.21413 2.5 8.75V4.25ZM5.043 14.136C4.556 13.685 4.98 13 5.645 13C5.889 13 6.117 13.105 6.323 13.235C6.592 13.403 6.91 13.5 7.25 13.5H11.75C12.227 13.5 12.66 13.31 12.975 13H13V12.975C13.31 12.659 13.5 12.227 13.5 11.75V7.25C13.5 6.91 13.403 6.592 13.235 6.323C13.105 6.117 13 5.889 13 5.645C13 4.981 13.684 4.555 14.136 5.043C14.672 5.623 15 6.398 15 7.25V11.75C15 12.1768 14.9159 12.5994 14.7526 12.9937C14.5893 13.388 14.3499 13.7463 14.0481 14.0481C13.7463 14.3499 13.388 14.5893 12.9937 14.7526C12.5994 14.9159 12.1768 15 11.75 15H7.25C6.43158 15.0013 5.64304 14.6926 5.043 14.136Z"
                                        fill="white" />
                                </svg>
                                Copy</button>
                        </div>
                        {{-- </div> --}}
                        <br>
                    @endif
                    <hr>
                    <br>
                    <label class="label" for="">Quản lý thành viên</label>
                    <div class="form-group d-flex align-items-center w-100 justify-content-between">
                        <div class="d-flex w-75">
                            <div class="position-relative ml-1 w-50">
                                <input type="text" placeholder="Tìm kiếm bằng tên hoặc email" name="keywords"
                                    class="pr-4 pl-4 w-100 search-input" value="">
                                <span id="icon-search" class="icon-search"><i class="fas fa-search"
                                        aria-hidden="true"></i></span>
                            </div>
                            <div class="dropdown ml-1">
                                <button class="filter-btn ml-2 align-items-center d-flex border h-100"
                                    data-toggle="dropdown" aria-expanded="false">
                                    <span class="text-secondary mx-1 filter-dropdown">Tất cả</span>
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M5.42342 6.92342C5.65466 6.69219 6.02956 6.69219 6.26079 6.92342L9 9.66264L11.7392 6.92342C11.9704 6.69219 12.3453 6.69219 12.5766 6.92342C12.8078 7.15466 12.8078 7.52956 12.5766 7.76079L9.41868 10.9187C9.18745 11.1499 8.81255 11.1499 8.58132 10.9187L5.42342 7.76079C5.19219 7.52956 5.19219 7.15466 5.42342 6.92342Z"
                                            fill="#6D7075"></path>
                                    </svg>
                                </button>
                                <div class="dropdown-menu" style="">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <button id="invite-member" class="btn btn-primary" data-toggle="modal"
                            data-target="#exampleModal">
                            Mời thành viên</button>
                    </div>
                    <div class="count-member">
                        {{ count($user_workspaces) }} thành viên
                    </div>
                    <br>
                    @isset($user_workspaces)
                        @foreach ($user_workspaces as $item)
                            <div
                                class="row row-user d-flex align-items-center justify-content-center pt-2 m-0 border-bottom w-100">
                                <div class="col">
                                    <div class="info-user">
                                        <div class="name">{{ $item->name }}</div>
                                        <p class="email"> {{ $item->email }}</p>
                                    </div>
                                </div>
                                <div class="col role d-flex justify-content-center">Admin{{ $item->roleid }}</div>
                                <div class="col d-flex justify-content-end"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M21 12C21 10.8954 20.1046 10 19 10C17.8954 10 17 10.8954 17 12C17 13.1046 17.8954 14 19 14C20.1046 14 21 13.1046 21 12Z"
                                            fill="#42526E"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M14 12C14 10.8954 13.1046 10 12 10C10.8954 10 10 10.8954 10 12C10 13.1046 10.8954 14 12 14C13.1046 14 14 13.1046 14 12Z"
                                            fill="#42526E"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M7 12C7 10.8954 6.10457 10 5 10C3.89543 10 3 10.8954 3 12C3 13.1046 3.89543 14 5 14C6.10457 14 7 13.1046 7 12Z"
                                            fill="#42526E"></path>
                                    </svg></div>
                            </div>
                            {{-- @dd($user_workspaces); --}}
                        @endforeach
                    @endisset
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <form action="{{ route('sendInvitation') }}" method="post">
                            @csrf
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header border-0">
                                        <h5 class="modal-title" id="exampleModalLabel">Invite to your workspace</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body w-100">
                                        <div class="w-100 d-flex">
                                            <div class="w-75 title">
                                                Email
                                            </div>
                                            <div class="title">
                                                Vai trò
                                            </div>
                                        </div>
                                        <div class="w-100 d-flex" id="input-invite-form">
                                            <div class="email-invite w-75">
                                                <div class="info-invite-mail">
                                                    <input class="w-100 email-input mb-1" type="email"
                                                        id="email" name="emails[]">
                                                </div>
                                            </div>
                                            <div class="role-invite pl-2">
                                                <div class="info-invite-roles w-100">
                                                    <select name="roles[]" id="roles-option" class="mb-1">
                                                        @isset($roles)
                                                            @foreach ($roles as $role)
                                                                <option value="{{ $role->id }}">{{ $role->name }}
                                                                </option>
                                                            @endforeach
                                                        @endisset
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button id="add-email-btn" class="btn btn-primary">Thêm dòng</button>
                                    <div class="modal-footer border-0">
                                        <button type="submit" type="button"
                                            class="btn-send-invites btn btn-primary">Send
                                            invites
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </section>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
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
                        $('#copyButton').prop('disabled', false);
                        $('.url_link').val(data.url)
                        $('.url_link').prop('disabled', false);
                    } else {
                        $('.url_link').prop('disabled', true);
                        $('.div-url').hide();
                        $('#copyButton').prop('disabled', true);
                    }
                    var svgIcon =
                        '<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">' +
                        '<path d="M4.25 1C3.38805 1 2.5614 1.34241 1.9519 1.9519C1.34241 2.5614 1 3.38805 1 4.25V8.75C1 9.61195 1.34241 10.4386 1.9519 11.0481C2.5614 11.6576 3.38805 12 4.25 12H8.75C9.61195 12 10.4386 11.6576 11.0481 11.0481C11.6576 10.4386 12 9.61195 12 8.75V4.25C12 3.38805 11.6576 2.5614 11.0481 1.9519C10.4386 1.34241 9.61195 1 8.75 1H4.25ZM2.5 4.25C2.5 3.284 3.284 2.5 4.25 2.5H8.75C9.716 2.5 10.5 3.284 10.5 4.25V8.75C10.5 9.21413 10.3156 9.65925 9.98744 9.98744C9.65925 10.3156 9.21413 10.5 8.75 10.5H4.25C3.78587 10.5 3.34075 10.3156 3.01256 9.98744C2.68437 9.65925 2.5 9.21413 2.5 8.75V4.25ZM5.043 14.136C4.556 13.685 4.98 13 5.645 13C5.889 13 6.117 13.105 6.323 13.235C6.592 13.403 6.91 13.5 7.25 13.5H11.75C12.227 13.5 12.66 13.31 12.975 13H13V12.975C13.31 12.659 13.5 12.227 13.5 11.75V7.25C13.5 6.91 13.403 6.592 13.235 6.323C13.105 6.117 13 5.889 13 5.645C13 4.981 13.684 4.555 14.136 5.043C14.672 5.623 15 6.398 15 7.25V11.75C15 12.1768 14.9159 12.5994 14.7526 12.9937C14.5893 13.388 14.3499 13.7463 14.0481 14.0481C13.7463 14.3499 13.388 14.5893 12.9937 14.7526C12.5994 14.9159 12.1768 15 11.75 15H7.25C6.43158 15.0013 5.64304 14.6926 5.043 14.136Z" fill="white" />' +
                        '</svg>';
                    $('#copyButton').html(svgIcon + ' Copy');
                }
            });
        });

        $('#copyButton').click(function() {
            var urlInput = $('.url_link');
            urlInput.select();
            document.execCommand('copy');
            var svgCheck = '<i class="fa-solid fa-check"></i>';
            $('#copyButton').html(svgCheck + ' Copied');
            setTimeout(function() {
                var svgIcon =
                    '<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">' +
                    '<path d="M4.25 1C3.38805 1 2.5614 1.34241 1.9519 1.9519C1.34241 2.5614 1 3.38805 1 4.25V8.75C1 9.61195 1.34241 10.4386 1.9519 11.0481C2.5614 11.6576 3.38805 12 4.25 12H8.75C9.61195 12 10.4386 11.6576 11.0481 11.0481C11.6576 10.4386 12 9.61195 12 8.75V4.25C12 3.38805 11.6576 2.5614 11.0481 1.9519C10.4386 1.34241 9.61195 1 8.75 1H4.25ZM2.5 4.25C2.5 3.284 3.284 2.5 4.25 2.5H8.75C9.716 2.5 10.5 3.284 10.5 4.25V8.75C10.5 9.21413 10.3156 9.65925 9.98744 9.98744C9.65925 10.3156 9.21413 10.5 8.75 10.5H4.25C3.78587 10.5 3.34075 10.3156 3.01256 9.98744C2.68437 9.65925 2.5 9.21413 2.5 8.75V4.25ZM5.043 14.136C4.556 13.685 4.98 13 5.645 13C5.889 13 6.117 13.105 6.323 13.235C6.592 13.403 6.91 13.5 7.25 13.5H11.75C12.227 13.5 12.66 13.31 12.975 13H13V12.975C13.31 12.659 13.5 12.227 13.5 11.75V7.25C13.5 6.91 13.403 6.592 13.235 6.323C13.105 6.117 13 5.889 13 5.645C13 4.981 13.684 4.555 14.136 5.043C14.672 5.623 15 6.398 15 7.25V11.75C15 12.1768 14.9159 12.5994 14.7526 12.9937C14.5893 13.388 14.3499 13.7463 14.0481 14.0481C13.7463 14.3499 13.388 14.5893 12.9937 14.7526C12.5994 14.9159 12.1768 15 11.75 15H7.25C6.43158 15.0013 5.64304 14.6926 5.043 14.136Z" fill="white" />' +
                    '</svg>';
                $('#copyButton').html(svgIcon + ' Copy');
            }, 3000);
        });

    });
    $(document).ready(function() {
        $('#add-email-btn').click(function() {
            event.preventDefault();

            var newLine = $('#input-invite-form').first().clone();

            // Xóa giá trị của trường email mới
            newLine.find('.email-input').val('');

            // Thêm dòng mới vào cuối danh sách
            $('.modal-body').append(newLine);
        });
    });
</script>
</body>

</html>
