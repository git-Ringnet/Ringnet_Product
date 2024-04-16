<x-navbar-setting title="Tổng quan" activeName="overview"></x-navbar-setting>
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
                <div class="container-fluided pt-5">
                    <form action="{{ route('updateWorkspaceName') }}" method="POST">
                        @csrf
                        <div class="form-group d-flex align-items-center justify-content-between">
                            <div class="title_view" for="">Tổng quan</div>
                        </div>
                        <div class="div-url form-group d-flex align-items-center justify-content-between w-100">
                            <div class="input-icon w-75">
                                <label for="">Tên workspace</label>
                                <br>
                                <input class="url_link" style="padding-right: 30px;" type="text"
                                    name="workspace_name" value="{{ $workspace_name }}">
                                <div class="text-wp" style="color: red"></div>
                                <label class="pt-2" for="">Đường dẫn workspace</label>
                                <br>
                                <input class="url_link" style="padding-right: 30px;" type="text"
                                    value="{{ url('/') }}/{{ $workspace_name }}" disabled>
                                <br>
                            </div>
                        </div>
                        <div class="input-icon w-75">
                            <div class="btn-apply float-right" style="display: none">
                                <button class="btn btn-update btn-primary">Cập nhật</button>
                            </div>
                        </div>
                    </form>
                    <br>
                    <form action="{{ route('deleteAllTable') }}" method="POST">
                        @csrf
                        <div class="pt-5 form-group d-flex align-items-center justify-content-between">
                            <div class="title_view" for="">Xoá workspace</div>
                        </div>
                        <div class="input-icon w-75"
                            style="font-family: Inter;font-size: 15px;font-weight: 500;line-height: 24px;text-align: left;">
                            <p>Nếu bạn muốn xoá vĩnh viễn workspace này và tất cả dữ liệu trong đó, bạn có thể thực hiện
                                việc đó bên dưới</p>
                        </div>
                        <div class="input-icon w-75">
                            <div class="btn-apply float-right">
                                <button class="btn btn-delete-workspace btn-danger"
                                    onclick="return confirm('Bạn có chắc chắn muốn xoá workspace không?')">Xoá
                                    workspace</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('/dist/js/import.js') }}"></script>

<script>
    // Ajax checks if workspace_name already exists in the system on input
    $(document).ready(function() {
        var previousValue = '';
        $('input[name="workspace_name"]').on('input', function() {
            var workspace_name = $(this).val();
            // Kiểm tra nếu giá trị thay đổi so với giá trị trước đó
            if (workspace_name !== previousValue) {
                previousValue = workspace_name;
                $.ajax({
                    url: '{{ route('checkWorkspaceName') }}',
                    type: 'GET',
                    data: {
                        workspace_name: workspace_name,
                    },
                    success: function(data) {
                        if (data.success) {
                            $('.btn-apply').attr('disabled', true);
                            $('.text-wp').css('color', 'red');
                            $('.text-wp').text(data.msg);
                            $('.btn-apply').hide()
                        } else {
                            $('.btn-apply ').attr('disabled', false);
                            $('.text-wp').css('color', 'green');
                            $('.text-wp').text(data.msg);
                            $('.btn-apply').show()
                        }
                        if (workspace_name == '') {
                            $('.text-wp').text('Không được để trống tên workspace');
                            $('.text-wp').css('color', 'red');
                            $('.btn-apply').hide()
                        }
                    }
                });
            }
        });
    });
</script>
</body>

</html>
