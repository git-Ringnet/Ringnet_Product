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
    .search-input {
        height: 30px;
        padding: 20px 10px 20px 10px;
        border-radius: 4px;
        border: 1px solid #DFE1E4;
        font-size: 15px;
    }

    #roles-option {
        height: 30px;
        border-radius: 4px;
        border: 1px solid #DFE1E4;
        font-size: 15px;
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
        padding: 8px 8px;
        gap: 6px;
        box-shadow: 0px 1px 2px 0px #00000017;
        color: #FFFFFF;
        font-size: 15px;
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
        font-size: 13px;
        font-weight: 500;
        color: #282A30;
    }

    .email,
    .role {

        font-size: 13px;
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

    #add-email-btn {
        border: 1px solid #DFE1E4;
        border-radius: 4px;
        padding: 6px 20px 7px 16px;
        font-size: 13px;
        font-weight: 500;
        color: #6D7075;
    }

    .info-invite-mail {
        position: relative;
    }

    .clear-input {
        position: absolute;
        right: 5px;
        top: 10%;
        cursor: pointer;
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
                                <input type="text" placeholder="Tìm kiếm bằng tên hoặc email" id="search"
                                    name="keywords" class="pr-4 pl-4 w-100 search-input" value="">
                                <span id="icon-search" class="icon-search btn-submit"><i class="fas fa-search"
                                        aria-hidden="true"></i></span>
                                <input class="btn-submit" type="submit" id="hidden-submit" name="hidden-submit"
                                    style="display: none;">
                            </div>
                            <div class="dropdown ml-1 d-none">
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
                            <div class="user-workspaces">
                                <input type="hidden" name="id-info" class="id-info" id="id-info"
                                    value="{{ $item->id }}">
                                <div
                                    class="row row-user d-flex align-items-center justify-content-center pt-2 m-0 border-bottom w-100">
                                    <div class="col">
                                        <div class="info-user">
                                            <div class="name">{{ $item->name }}</div>
                                            <p class="email"> {{ $item->email }}</p>
                                        </div>
                                    </div>
                                    <div class="col role d-flex justify-content-center">
                                        <input type="hidden" name="idUser" value="{{ $item->user_id }}" />
                                        <select name="role-user-workspace" id="roles-option"
                                            class="role-user-workspace mb-1">
                                            @isset($roles)
                                                @foreach ($roles as $role)
                                                    <option {{ $item->vaitro == $role->name ? 'selected' : '' }}
                                                        value="{{ $role->id }}">{{ $role->name }}{{ $role->id }}
                                                    </option>
                                                @endforeach
                                            @endisset
                                        </select>
                                    </div>
                                    <div class="col d-flex justify-content-end">
                                        <div class="dropdown ml-1">
                                            <button class="filter-btn ml-2 align-items-center d-flex border-0 h-100"
                                                data-toggle="dropdown" aria-expanded="false">
                                                <span class="text-secondary mx-1 filter-dropdown"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M21 12C21 10.8954 20.1046 10 19 10C17.8954 10 17 10.8954 17 12C17 13.1046 17.8954 14 19 14C20.1046 14 21 13.1046 21 12Z"
                                                            fill="#42526E"></path>
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M14 12C14 10.8954 13.1046 10 12 10C10.8954 10 10 10.8954 10 12C10 13.1046 10.8954 14 12 14C13.1046 14 14 13.1046 14 12Z"
                                                            fill="#42526E"></path>
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M7 12C7 10.8954 6.10457 10 5 10C3.89543 10 3 10.8954 3 12C3 13.1046 3.89543 14 5 14C6.10457 14 7 13.1046 7 12Z"
                                                            fill="#42526E"></path>
                                                    </svg></span>
                                            </button>
                                            <div class="dropdown-menu" style="">
                                                <div class="delete-user-workspace">
                                                    <form onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                                                        action="{{ route('userWorkspace.destroy', ['workspace' => $item->nameWP, 'userWorkspace' => $item->user_id]) }}"
                                                        method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm">
                                                            <svg width="16" height="16" viewBox="0 0 16 16"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path opacity="0.936" fill-rule="evenodd"
                                                                    clip-rule="evenodd"
                                                                    d="M6.40625 0.968766C7.44813 0.958304 8.48981 0.968772 9.53125 1.00016C9.5625 1.03156 9.59375 1.06296 9.625 1.09436C9.65625 1.49151 9.66663 1.88921 9.65625 2.28746C10.7189 2.277 11.7814 2.28747 12.8438 2.31886C12.875 2.35025 12.9063 2.38165 12.9375 2.41305C12.9792 2.99913 12.9792 3.58522 12.9375 4.17131C12.9063 4.24457 12.8542 4.2969 12.7813 4.32829C12.6369 4.35948 12.4911 4.36995 12.3438 4.35969C12.3542 7.45762 12.3438 10.5555 12.3125 13.6533C12.1694 14.3414 11.7632 14.7914 11.0938 15.0034C9.01044 15.0453 6.92706 15.0453 4.84375 15.0034C4.17433 14.7914 3.76808 14.3414 3.625 13.6533C3.59375 10.5555 3.58333 7.45762 3.59375 4.35969C3.3794 4.3844 3.18148 4.34254 3 4.2341C2.95833 3.62708 2.95833 3.02007 3 2.41305C3.03125 2.38165 3.0625 2.35025 3.09375 2.31886C4.15605 2.28747 5.21855 2.277 6.28125 2.28746C6.27088 1.88921 6.28125 1.49151 6.3125 1.09436C6.35731 1.06018 6.38856 1.01832 6.40625 0.968766ZM6.96875 1.65951C7.63544 1.65951 8.30206 1.65951 8.96875 1.65951C8.96875 1.86882 8.96875 2.07814 8.96875 2.28746C8.30206 2.28746 7.63544 2.28746 6.96875 2.28746C6.96875 2.07814 6.96875 1.86882 6.96875 1.65951ZM3.65625 2.9782C6.53125 2.9782 9.40625 2.9782 12.2813 2.9782C12.2813 3.18752 12.2813 3.39684 12.2813 3.60615C9.40625 3.60615 6.53125 3.60615 3.65625 3.60615C3.65625 3.39684 3.65625 3.18752 3.65625 2.9782ZM4.34375 4.35969C6.76044 4.35969 9.17706 4.35969 11.5938 4.35969C11.6241 7.5032 11.5929 10.643 11.5 13.7789C11.3553 14.05 11.1366 14.2279 10.8438 14.3127C8.92706 14.3546 7.01044 14.3546 5.09375 14.3127C4.80095 14.2279 4.5822 14.05 4.4375 13.7789C4.34462 10.643 4.31337 7.5032 4.34375 4.35969Z"
                                                                    fill="#6C6F74" />
                                                                <path opacity="0.891" fill-rule="evenodd"
                                                                    clip-rule="evenodd"
                                                                    d="M5.78125 5.28118C6.0306 5.2259 6.20768 5.30924 6.3125 5.53118C6.35419 8.052 6.35419 10.5729 6.3125 13.0937C6.08333 13.427 5.85417 13.427 5.625 13.0937C5.58333 10.552 5.58333 8.01037 5.625 5.46868C5.69031 5.4141 5.7424 5.3516 5.78125 5.28118Z"
                                                                    fill="#6C6F74" />
                                                                <path opacity="0.891" fill-rule="evenodd"
                                                                    clip-rule="evenodd"
                                                                    d="M7.78125 5.28118C8.03063 5.2259 8.20769 5.30924 8.3125 5.53118C8.35419 8.052 8.35419 10.5729 8.3125 13.0937C8.08331 13.427 7.85419 13.427 7.625 13.0937C7.58331 10.552 7.58331 8.01037 7.625 5.46868C7.69031 5.4141 7.74238 5.3516 7.78125 5.28118Z"
                                                                    fill="#6C6F74" />
                                                                <path opacity="0.891" fill-rule="evenodd"
                                                                    clip-rule="evenodd"
                                                                    d="M9.78125 5.28118C10.0306 5.2259 10.2077 5.30924 10.3125 5.53118C10.3542 8.052 10.3542 10.5729 10.3125 13.0937C10.0833 13.427 9.85419 13.427 9.625 13.0937C9.58331 10.552 9.58331 8.01037 9.625 5.46868C9.69031 5.4141 9.74238 5.3516 9.78125 5.28118Z"
                                                                    fill="#6C6F74" />
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                        <div class="w-100 d-flex input-invite-form">
                                            <div class="email-invite w-75">
                                                <div class="info-invite-mail">
                                                    <input class="w-100 email-input mb-1" type="email"
                                                        id="email" name="emails[]">
                                                    <span class="clear-input"><svg width="12" height="12"
                                                            viewBox="0 0 12 12" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M2.22725 2.22725C2.44692 2.00758 2.80308 2.00758 3.02275 2.22725L6 5.20425L8.97727 2.22725C9.19695 2.00758 9.55305 2.00758 9.77272 2.22725C9.9924 2.44692 9.9924 2.80308 9.77272 3.02275L6.79575 6L9.77272 8.97727C9.97245 9.17692 9.9906 9.48945 9.82717 9.70965L9.77272 9.77272C9.55305 9.9924 9.19695 9.9924 8.97727 9.77272L6 6.79575L3.02275 9.77272C2.80308 9.9924 2.44692 9.9924 2.22725 9.77272C2.00759 9.55305 2.00759 9.19695 2.22725 8.97727L5.20425 6L2.22725 3.02275C2.02755 2.82304 2.0094 2.51055 2.17279 2.29034L2.22725 2.22725Z"
                                                                fill="#8E8E8E" />
                                                        </svg>
                                                    </span>
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
                                        <div class="w-100 btn-add-more">
                                            <button id="add-email-btn" class="btn"><svg width="16"
                                                    height="16" viewBox="0 0 16 16" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M8.75 3C8.75 2.58579 8.41421 2.25 8 2.25C7.58579 2.25 7.25 2.58579 7.25 3V7.25H3C2.58579 7.25 2.25 7.58579 2.25 8C2.25 8.41421 2.58579 8.75 3 8.75H7.25V13C7.25 13.4142 7.58579 13.75 8 13.75C8.41421 13.75 8.75 13.4142 8.75 13V8.75H13C13.4142 8.75 13.75 8.41421 13.75 8C13.75 7.58579 13.4142 7.25 13 7.25H8.75V3Z"
                                                        fill="#6D7075" />
                                                </svg>
                                                Thêm email</button>
                                        </div>
                                    </div>
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
<script src="{{ asset('/dist/js/import.js') }}"></script>

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
            var newLine = $('.input-invite-form').first().clone();
            newLine.find('.email-input').val('');
            $('.btn-add-more').before(newLine);
        });

    });
    $(document).ready(function() {
        $(document).on('click', '.clear-input', function() {
            var $inputForm = $(this).closest('.input-invite-form');
            var $emailInputs = $inputForm.siblings('.input-invite-form')
                .addBack();
            if ($emailInputs.length > 1) {
                $inputForm.remove();
            }
        });
    });


    //Cập nhật role cho user trong workspace
    $(document).ready(function() {
        $('.role-user-workspace').change(function() {
            var selectedRoleId = $(this).val();
            // Lấy giá trị của idUser/Role tương ứng
            var idUser = $(this).closest('.role').find('input[name="idUser"]').val();
            $.ajax({
                url: "{{ route('updateRoleWorkspace') }}",
                type: "get",
                data: {
                    roleid: selectedRoleId,
                    idUser: idUser,
                },
                success: function(data) {
                    $('.message-success-text').text(data.msg);
                    $('.message-success').fadeIn();
                    $('.messagesss').fadeIn();
                    setTimeout(function() {
                        $('.message-success').fadeOut();
                    }, 4000);
                }
            })

        });
        $(document).on('click', '.btn-submit', function(e) {
            e.preventDefault();
            var search = $('#search').val();
            $.ajax({
                url: "{{ route('searchUserWorkspace') }}",
                type: "get",
                data: {
                    search: search,
                },
                success: function(data) {
                    var userIds = [];
                    data.forEach(function(item) {
                        var userId = item.id;
                        userIds.push(userId);
                    });
                    $('.user-workspaces').each(function() {
                        var value = parseInt($(this).find('.id-info').val());
                        if (userIds.includes(value)) {
                            $(this).show();
                        } else {
                            $(this).hide();
                        }
                    });
                }
            })
        });


    });
</script>
</body>

</html>
