{{-- @props(['name', 'title']) --}}
<div class="block-options checkbox-options" id="{{ $name }}-options" style="display: none">
    <div class="wrap w-100">
        <div class="heading-title title-wrap">
            <h5>{{ $title }}</h5>
        </div>
        <div class="search-container px-2 mt-2">
            <input type="text" placeholder="Tìm kiếm" id="myInput-{{ $name }}" class="pr-4 w-100 input-search"
                onkeyup="filter{{ $name }}()">
            <span class="search-icon"><i class="fas fa-search"></i></span>
        </div>
        <div class="select-checkbox d-flex justify-contents-center align-items-baseline pb-2 px-2">
            <a class="cursor select-all-{{ $name }} mr-auto" data-button-name="{{ $name }}">Chọn tất
                cả</a>
            <a class="cursor deselect-all-{{ $name }}"data-button-name="{{ $name }}">Hủy chọn</a>
        </div>
        <div class="ks-cboxtags-container">
            <ul class="ks-cboxtags ks-cboxtags-{{ $name }} p-0 mb-1 px-2">
                @foreach ($dataa as $item)
                    <li>
                        <input type="checkbox" id="{{ $name }}" name="{{ $name }}[]"
                            value="{{ $item->id }}">
                        <label for="">{{ $item->{$namedisplay} }}</label>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="d-flex justify-contents-center align-items-baseline p-2">
        <button type="submit" class="btn btn-primary btn-block btn-submit" id="btn-submit-{{ $name }}"
            data-title="{{ $title }}" data-button-name="{{ $name }}"
            data-button="{{ $button }}">Xác
            Nhận</button>
        <button type="button" id="cancel-{{ $name }}" class="btn btn-default btn-block">Hủy</button>
    </div>
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


        $('.ks-cboxtags-{{ $name }} li').on('click', function(event) {
            if (event.target.tagName !== 'INPUT') {
                var checkbox = $(this).find('input[type="checkbox"]');
                checkbox.prop('checked', !checkbox.prop('checked')); // Đảo ngược trạng thái checked
            }
        });
    });
</script>
