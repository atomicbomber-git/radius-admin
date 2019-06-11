<script>
    $(document).ready(function() {
        $('form.confirmed').submit(function(e) {
            e.preventDefault()

            swal({
                icon: 'warning',
                text: 'Apakah Anda yakin anda ingin melakukan tindakan tersebut?',
                dangerMode: true,
                buttons: ['Tidak', 'Ya'],
            })
            .then(will_submit => {
                if (will_submit) {
                    $(this).off('submit')
                        .submit()
                }
            })
        })
    });
</script>