<script>
    $('#btn-edit').on('click', function () {
        $('input[name="name"]').attr('readonly', false);
        $('textarea[name="description"]').attr('readonly', false);
        $('input[name="price"]').attr('readonly', false);

        $('#btn-edit').css('display', 'none');
        $('#btn-cancel').css('display', 'block');
        $('#btn-save').removeAttr('disabled');
    });

    $('#btn-cancel').on('click', function () {
        $('input[name="name"]').attr('readonly', true);
        $('textarea[name="description"]').attr('readonly', true);
        $('input[name="price"]').attr('readonly', true);
        
        $('#btn-edit').css('display', 'block');
        $('#btn-cancel').css('display', 'none');
        $('#btn-save').attr('disabled', true);
    });

//    $('#btn-delete').on('click', function (event) {
//        event.preventDefault();
//        console.log('delete');
//        var url    = $('#url-delete').val();
//        swal({
//                title   : 'Anda yakin',
//                text    : 'Apakah anda yakin ingin menghapus data ini ?',
//                type    :  'warning',
//                showCancelButton : true
//            },
//            function (isConfirm) {
//                if (isConfirm) {
//                    window.location(url);
//                }
//            });
//    });

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