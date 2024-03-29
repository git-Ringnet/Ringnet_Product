    <div class="block-options" id="{{ $name }}-options" style="display:none">
        <div class="wrap w-100">
            <div class="heading-title title-wrap">
                <h5>{{ $title }}</h5>
            </div>
            <div class="input-group p-2 justify-content-around">
                <select class="{{ $name }}-operator operator" name="{{ $name }}operator"
                    style="width: 40%">
                    <option value=">=">>=</option>
                    <option value="<=">
                        <= </option>
                </select>
                <input class="w-50 {{ $name }}-quantity quantity" type="text"
                    oninput="this.value = this.value.replace(/[^0-9]/g, '')" name="{{ $name }}" value=""
                    placeholder="Nhập thông tin">
            </div>
        </div>
        <div class="d-flex justify-contents-center align-items-baseline p-2">
            <button type="submit" class="btn btn-primary btn-block btn-submit" data-title="{{ $title }}"
                data-button-name="{{ $name }}" data-button="{{ $button }}">Xác
                Nhận</button>
            <button type="button" id="cancel-{{ $name }}" class="btn btn-default btn-block">Hủy</button>
        </div>
    </div>
