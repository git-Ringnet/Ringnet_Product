<x-navbar-setting title="Thông tin doanh nghiệp" activeName="viewCompany"></x-navbar-setting>
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

    #banks-option {
        padding: 10px 10px 10px 10px;
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
                            <div class="title_view" for="">Thông tin doanh nghiệp</div>
                        </div>
                        <div class="div-url form-group d-flex align-items-center justify-content-between w-100">
                            <div class="input-icon w-75">
                                <label for="">Tên công ty</label>
                                <input placeholder="Nhập thông tin" class="url_link"
                                    style="padding-right: 30px;margin-bottom: 10px;" type="text" name="name_company"
                                    value="{{ $workspace_name->name_company }}">
                                <label class="pt-2" for="">Địa chỉ</label>
                                <input placeholder="Nhập thông tin" class="url_link"
                                    style="padding-right: 30px;margin-bottom: 10px;" type="text"
                                    name="address_company" value="{{ $workspace_name->address_company }}">
                                <label for="">Mã số thuế</label>
                                <input placeholder="Nhập thông tin" class="url_link"
                                    style="padding-right: 30px;margin-bottom: 10px;" type="text" name="mst"
                                    value="{{ $workspace_name->mst }}">
                                <label for="">Tài khoản ngân hàng</label>
                                <select class="" style="width: 100%" name="name_bank" id="banks-option">
                                </select>
                                <label for="">Số tài khoản</label>
                                <input placeholder="Nhập thông tin" class="url_link"
                                    style="padding-right: 30px;margin-bottom: 10px;" type="text" name="number_bank"
                                    value="{{ $workspace_name->number_bank }}">
                            </div>
                        </div>
                        <div class="input-icon w-75">
                            <div class="btn-apply float-right">
                                <button type="submit" class="btn btn-update btn-primary">Cập nhật</button>
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
    // Get API Banks https://api.vietqr.io/v2/banks select option in form
    $.ajax({
        url: 'https://api.vietqr.io/v2/banks',
        type: 'GET',
        success: function(data) {
            let banks = data.data;
            banks.forEach(bank => {
                $('#banks-option').append(`<option class="url_link" value="${bank.shortName}" ${bank.shortName === '{{ $workspace_name->name_bank }}' ? 'selected' : ''}>
            <img src="${bank.logo}" alt="${bank.shortName}" style="width: 20px; height: 20px;"> 
             ${bank.shortName}
            </option>`);
            });
        }
    });
</script>
</body>

</html>
