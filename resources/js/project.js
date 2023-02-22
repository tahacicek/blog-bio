

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

    //if click todo-edit modal ajax
    $('.todo-edit').on('click', function (e) {
        e.preventDefault();
        var todo = $(this).data('todo');
        var project = $(this).data('project');
        $.ajax({
            method: "POST",
            url: "/todo/func",
            data: {
                'todo_id': todo,
                'project_id': project,
                'status': 'todo-edit',
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                $('#modal-block-slideright').find('.body').html(data[1]);
            },
            error: function (data) {
                iziToast.error({
                    title: 'Hata',
                    message: response.message,
                    position: 'topRight'
                });
            }
        });
    });

});
