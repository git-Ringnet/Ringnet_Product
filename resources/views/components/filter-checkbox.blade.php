{{-- @props(['name', 'title']) --}}
<div class="block-options checkbox-options" id="{{ $name }}-options" style="display: none">
    <div class="wrap w-100">
        <div class="heading-title title-wrap">
            <h5>{{ $title }}</h5>
        </div>
        <div class="search-container px-2 mt-2">
            <input type="text" placeholder="Tìm kiếm" id="myInput-{{ $name }}" class="pr-4 w-100 input-search"
                onkeyup="filter{{ $name }}()">
            <span class="search-icon mr-2"><i class="fas fa-search"></i></span>
        </div>
        <div class="select-checkbox text-right pb-2 px-2">
            {{-- <a class="cursor select-all-{{ $name }} mr-auto" data-button-name="{{ $name }}">Chọn tất
                cả</a> --}}
            <a class="cursor deselect-all-{{ $name }} btn-submit" data-button-name="{{ $name }}"
                data-button="{{ isset($button) ? $button : '' }}">Hủy chọn</a>
        </div>
        <div class="outer3-srcoll">
            <ul class="ks-cboxtags-{{ $name }} p-0 mb-1 px-2">
                @php
                    $usedValues = [];
                @endphp
                @foreach ($dataa as $item)
                    @php
                        $value = $item->id;
                        $display = $item->{$namedisplay};
                    @endphp

                    @if ($item && $display && !in_array($value, $usedValues))
                        <li class="btn-submit" data-button-name="{{ $name }}"
                            data-button="{{ isset($button) ? $button : '' }}">
                            <input type="checkbox" id="{{ $name }}_{{ $value }}"
                                name="{{ $name }}[]" value="{{ $value }}">
                            <label for="">{{ $display }}</label>
                        </li>
                        @php
                            $usedValues[] = $value;
                        @endphp
                    @endif
                @endforeach
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
        // $('.ks-cboxtags-{{ $name }} li, .ks-cboxtags-{{ $name }} label').on('click', function(
        //     event) {
        //     if (event.target.tagName !== 'INPUT') {
        //         var checkbox = $(this).find('input[type="checkbox"]');
        //         checkbox.prop('checked', !checkbox.prop('checked')); // Đảo ngược trạng thái checked
        //     }
        // });
    });
    $(document).on("click", ".ks-cboxtags-{{ $name }} li, .ks-cboxtags-{{ $name }} label", function(
        e) {
        e.preventDefault();
        if (e.target.tagName !== 'INPUT') {
            var checkbox = $(this).find('input[type="checkbox"]');
            checkbox.prop('checked', !checkbox.prop('checked')); // Đảo ngược trạng thái checked
        }
    });
</script>
