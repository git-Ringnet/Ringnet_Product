<x-navbar-setting title="Thông tin cá nhân" activeName="user"></x-navbar-setting>
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
        font-family: Inter;
        font-size: 16px;
        font-weight: 500;
        line-height: 24px;
    }

    .title_view {
        font-family: Inter;
        font-size: 24px;
        font-weight: 500;
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
        opacity: 1;
        pointer-events: none;
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

    .btn {
        font-family: Inter;
        font-size: 13px;
        font-weight: 500;
        padding: 8px 14px 8px 14px;
        gap: 4px;
        border-radius: 4px;
    }

    .btn-update {
        background: #575BC7;
    }

    .btn-delete-workspace {
        background-color: #EB5757;

    }
</style>
<div class="container">
    <div class="container">
        <div class="content-wrapper py-0 px-2" style="min-height: 335px;">
            {{-- Content --}}
            <section class="content">
                <form action="{{ route('user.update') }}" method="POST">
                    @csrf
                    <div class="container-fluided pt-5">
                        <div class="form-group d-flex align-items-center justify-content-between">
                            <div class="title_view" for="">Thông tin cá nhân</div>
                        </div>
                        <div class="div-url form-group d-flex align-items-center justify-content-between w-100">
                            <div class="input-icon w-75">
                                <label for="">Họ và tên</label>
                                <br>
                                <input class="url_link" id="name" name="name" style="padding-right: 30px;"
                                    type="text" value="{{ $user_info->name }}" required>

                                <label class="pt-2" for="">Email</label>
                                <br>
                                <input class="url_link" id="email" style="padding-right: 30px;" type="text"
                                    value="{{ $user_info->email }}" disabled>
                                <br>
                                <label class="pt-2" for="">Số điện thoại*</label>
                                <br>
                                {{-- Input phone number valid ator --}}

                                <input class="url_link" id="phone_number" style="padding-right: 30px;" type="number"
                                    name="phone_number" value="{{ $user_info->phone_number }}" required>
                                <div class="text-noiti text-13-red"></div>
                                <br>
                            </div>
                        </div>
                        <div class="input-icon w-75">
                            <div class="btn-apply float-right">
                                <button type="submit" class="btn btn-update-user btn-submit btn-primary">Cập
                                    nhật</button>
                            </div>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('/dist/js/import.js') }}"></script>

<script>
    // js check phone_number valid or not cancel submit form note for user to input phone number length in valid
    $(document).ready(function() {
        $('#phone_number').on('input', function() {
            var phone_number = $('#phone_number').val();
            if (phone_number.length < 10 || phone_number.length > 11) {
                $('#phone_number').css('border', '1px solid red');
                $('.btn-submit').attr('disabled', true);
                $('.text-noiti').text('Số điện thoại phải từ 10 đến 11 số');
            } else {
                $('#phone_number').css('border', '1px solid #DFE1E4');
                $('.btn-submit').attr('disabled', false);
                $('.text-noiti').text('');
            }
        });
    });
</script>
</body>

</html>
