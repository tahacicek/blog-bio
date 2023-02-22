

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

    //js-task-form on submit
    $('#js-task-form').on('submit', function (e) {
        e.preventDefault();
        var task =jQuery(".js-task-content").html();
        jQuery("#js-task-input").val("");
        jQuery("#js-task-input").focus();
        $.ajax({
            method: "POST",
            url: "/proje/func",
            data: {
                'project_id': $('#project_id').val(),
                title: task,
                'status': $('#status').val(),
                 _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                iziToast.success({
                    title: 'Başarılı',
                    message: 'Görev başarıyla oluşturuldu.',
                    position: 'topRight'
                });
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
