{{-- @props(['name', 'title']) --}}
<div class="block-options border" id="{{ $name }}-options" style="display: none">
    <div class="wrap w-100">
        <div class="heading-title title-wrap">
            <h5>{{ $title }}</h5>
        </div>
        <div class="input-group p-2">
            {{-- <label class="title mr-1 text-13-black" for="">Chứa kí tự</label> --}}
            <input type="text" name="{{ $name }}" id="{{ $name }}"
                @if ($name == 'phone') oninput="this.value = this.value.replace(/[^0-9]/g, '')" @endif
                class="form-control text-13-black" value="" placeholder="Nhập thông tin..">
        </div>
    </div>
    <div></div>
    <div class="d-flex align-items-baseline p-2">
        <button type="button" id="cancel-{{ $name }}"
            class="btn mx-1 btn-block text-13-black btn-cancel-filter">
            Hủy
        </button>
        <button type="submit" class="btn mx-1 btn-block btn-submit text-btnIner-filter"
            data-title="{{ $title }}" data-button-name="{{ $name }}"
            data-button="{{ $button }}">Xác Nhận</button>
    </div>
</div>
