<script>
    $('#btn-edit').on('click', function () {
        $('input[name="name"]').attr('readonly', false);
        $('textarea[name="description"]').attr('readonly', false);
        $('input[name="price"]').attr('readonly', false);
        $('input[name="stock"]').attr('readonly', false);
        $('input[name="unit"]').attr('readonly', false);
        $('select[name="id_poli"]').attr('readonly', false);

        $('#btn-edit').css('display', 'none');
        $('#btn-cancel').css('display', 'block');
        $('#btn-save').removeAttr('disabled');
    });

    $('#btn-cancel').on('click', function () {
        $('input[name="name"]').attr('readonly', true);
        $('textarea[name="description"]').attr('readonly', true);
        $('input[name="price"]').attr('readonly', true);
        $('input[name="stock"]').attr('readonly', true);
        $('input[name="unit"]').attr('readonly', true);
        $('select[name="id_poli"]').attr('readonly', true);

        $('#btn-edit').css('display', 'block');
        $('#btn-cancel').css('display', 'none');
        $('#btn-save').attr('disabled', true);
    });

    function onDelete(id) {
        var url    = $('#url-delete' + id).val();
        console.log(url);
        swal({
                title   : 'Anda yakin',
                text    : 'Apakah anda yakin ingin menghapus data ini ?',
                type    :  'warning',
                showCancelButton : true
            },
            function (isConfirm) {
                if (isConfirm) {
                    location = url;
                }
            });
    }
</script>