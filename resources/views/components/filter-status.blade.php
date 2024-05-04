{{-- @props(['name', 'title']) --}}
<div class="block-options checkbox-options" id="{{ $name }}-options" style="display: none">
    <div class="wrap w-100">
        <div class="heading-title text-center title-wrap">
            <h5>{{ $title }}</h5>
        </div>
        {{-- <div class="search-container px-2 mt-2">
            <input type="text" placeholder="Tìm kiếm" id="myInput-{{ $name }}" class="pr-4 w-100 input-search"
                onkeyup="filter{{ $name }}()">
            <span class="search-icon mr-2"><i class="fas fa-search"></i></span>
        </div>
        <div class="select-checkbox d-flex justify-contents-center align-items-baseline pb-2 px-2">
            <a class="cursor select-all-{{ $name }} mr-auto" data-button-name="{{ $name }}">Chọn tất
                cả</a>
            <a class="cursor deselect-all-{{ $name }}"data-button-name="{{ $name }}">Hủy chọn</a>
        </div> --}}
        <div class="outer3-srcoll">
            <ul class="ks-cboxtags-{{ $name }} p-0 mb-1 px-2">
                @if (isset($key1) && isset($value1))
                    <li class="btn-submit" data-button-name="{{ $name }}"
                        data-button="{{ isset($button) ? $button : '' }}">
                        <input type="checkbox" id="{{ $name }}_{{ $key1 }}" name="{{ $name }}[]"
                            value="{{ $key1 }}">
                        <label style="color: {{ $color1 }}" for="">{{ $value1 }}</label>
                    </li>
                @endif
                @if (isset($key2) && isset($value2))
                    <li class="btn-submit" data-button-name="{{ $name }}"
                        data-button="{{ isset($button) ? $button : '' }}">
                        <input type="checkbox" id="{{ $name }}_{{ $key2 }}"
                            name="{{ $name }}[]" value="{{ $key2 }}">
                        <label style="color: {{ $color2 }}"for="">{{ $value2 }}</label>
                    </li>
                @endif
                @if (isset($key3) && isset($value3))
                    <li class="btn-submit" data-button-name="{{ $name }}"
                        data-button="{{ isset($button) ? $button : '' }}">
                        <input type="checkbox" id="{{ $name }}_{{ $key3 }}"
                            name="{{ $name }}[]" value="{{ $key3 }}">
                        <label style="color: {{ $color3 }}"for="">{{ $value3 }}</label>
                    </li>
                @endif
                @if (isset($key4) && isset($value4))
                    <li class="btn-submit" data-button-name="{{ $name }}"
                        data-button="{{ isset($button) ? $button : '' }}">
                        <input type="checkbox" id="{{ $name }}_{{ $key4 }}"
                            name="{{ $name }}[]" value="{{ $key4 }}">
                        <label style="color: {{ $color4 }}"for="">{{ $value4 }}</label>
                    </li>
                @endif
                @if (isset($key5) && isset($value5))
                    <li class="btn-submit" data-button-name="{{ $name }}"
                        data-button="{{ isset($button) ? $button : '' }}">
                        <input type="checkbox" id="{{ $name }}_{{ $key5 }}"
                            name="{{ $name }}[]" value="{{ $key5 }}">
                        <label style="color: {{ $color5 }}"for="">{{ $value5 }}</label>
                    </li>
                @endif
                @if (isset($key6) && isset($value6))
                    <li class="btn-submit" data-button-name="{{ $name }}"
                        data-button="{{ isset($button) ? $button : '' }}">
                        <input type="checkbox" id="{{ $name }}_{{ $key6 }}"
                            name="{{ $name }}[]" value="{{ $key6 }}">
                        <label style="color: {{ $color6 }}"for="">{{ $value6 }}</label>
                    </li>
                @endif
            </ul>
        </div>
    </div>
    {{-- <div class="d-flex justify-contents-center align-items-baseline p-2">
        <button type="submit" class="btn btn-primary btn-block btn-submit" id="btn-submit-{{ $name }}"
            data-title="{{ $title }}" data-button-name="{{ $name }}"
            data-button="{{ isset($button) ? $button : '' }}">Xác
            Nhận</button>
        <button type="button" id="cancel-{{ $name }}" class="btn btn-default btn-block">Hủy</button>
    </div> --}}
</div>
<script>
    $(document).ready(function() {
        // Chọn tất cả
        $('.select-all-{{ $name }}').click(function() {
            $('.ks-cboxtags-{{ $name }} input[type="checkbox"]:visible').prop('checked', true);
        });

        // Hủy chọn tất cả
        $('.deselect-all-{{ $name }}').click(function() {
            $('.ks-cboxtags-{{ $name }} input[type="checkbox"]').prop('checked', false);
        });


        $('.ks-cboxtags-{{ $name }} li, .ks-cboxtags-{{ $name }} label').on('click', function(
            event) {
            if (event.target.tagName !== 'INPUT') {
                var checkbox = $(this).find('input[type="checkbox"]');
                checkbox.prop('checked', !checkbox.prop('checked')); // Đảo ngược trạng thái checked
            }
        });
    });
</script>
