{{-- @props(['name', 'title']) --}}
<div class="block-options border" id="{{ $name }}-options" style="display: none">
    <div class="wrap w-100">
        <div class="heading-title title-wrap">
            <h5>{{ $title }}</h5>
        </div>
        <div class="input-groups p-2">
            <div class="filter-container">
                <select id="month-filter">
                    <option value="">Chọn tháng</option>
                    <option value="1">January</option>
                    <option value="2">February</option>
                    <option value="3">March</option>
                    <option value="4">April</option>
                    <option value="5">May</option>
                    <option value="6">June</option>
                    <option value="7">July</option>
                    <option value="8">August</option>
                    <option value="9">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
                <select id="year-filter">
                    <option value="">Chọn năm</option>
                    <!-- Options will be populated dynamically -->
                </select>
            </div>
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
<script>
    $(document).ready(function() {
        // Populate year dropdown with the last 10 years
        var currentYear = new Date().getFullYear();
        var yearSelect = $('#year-filter');
        for (var i = currentYear; i >= currentYear - 10; i--) {
            var option = $('<option></option>').val(i).text(i);
            yearSelect.append(option);
        }

        // Set current month as selected
        $('#month-filter').val(new Date().getMonth() + 1);

        // Toggle filter visibility
        $('.btn-toggle-filter').on('click', function() {
            var filterContainer = $(this).closest('.filter-container');
            var filterOptions = filterContainer.find('.block-options');
            filterOptions.toggle();
            var isVisible = filterOptions.is(':visible');
            $(this).text(isVisible ? 'Ẩn bộ lọc' : 'Hiển thị bộ lọc');
        });

        // Handle apply filter button click
        $('.btn-submit').on('click', function() {
            var month = $('#month-filter').val();
            var year = $('#year-filter').val();
            var title = $(this).data('title');
            var buttonName = $(this).data('button-name');
            var button = $(this).data('button');
        });

        // Handle cancel button click
        $('.btn-cancel-filter').on('click', function() {
            var filterContainer = $(this).closest('.filter-container');
            filterContainer.find('select').val('');
            filterContainer.find('.block-options').hide();
            $('.btn-toggle-filter').text('Hiển thị bộ lọc');
        });

        $('#filter-date').on('click', function() {
            $('#btn-date').click();
        });
    });
</script>
