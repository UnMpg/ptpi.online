$(function () {
    $('.delete-confirm').on('click', function (event) {
        event.preventDefault();
        const url = $(this);
        console.log(url)
        Swal.fire({
            text: "Apakah Anda Yakin Untuk Menghapus ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: "Batal!",
        }).then((result) => {
            if (result.value) {
                $(this)[0].form.submit();
            }
        })
    });

    $('input[type="file"]').change(function (e) {
        var fileName = e.target.files[0].name;
        $('.inputFileName').html(fileName);
    });
})
