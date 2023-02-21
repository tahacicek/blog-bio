$(document).ready(function () {
    $('#createProject').on('submit', function (e) {
        e.preventDefault();
        var form = $(this);
        $.ajax({
            method: "POST",
            url: "/proje/func",
            data: form.serialize(),
            success: function (response) {
                iziToast.success({
                   title: 'Başarılı',
                   message: 'Proje başarıyla oluşturuldu.',
                   position: 'topRight'
                });
                window.location.href = "/proje/" + response.slug;
            },
            error: function (response) {
                iziToast.error({
                    title: 'Hata',
                    message: response.message,
                    position: 'topRight'
                });
            }
        });
    });

});
