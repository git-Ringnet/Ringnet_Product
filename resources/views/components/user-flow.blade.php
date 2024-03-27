<script>
    //Lưu thao tác chức năng
    $(document).ready(function() {
        $('.activity').click(function() {
            var name = $(this).data('name1'); // Lấy giá trị của thuộc tính data-name1
            var des = $(this).data('des'); // Lấy giá trị của thuộc tính data-des
            $.ajax({
                url: '{{ route('addActivity') }}',
                type: 'GET',
                data: {
                    name: name,
                    des: des,
                },
                success: function(data) {
                    console.log(data);
                }
            });
        });
    });
</script>
