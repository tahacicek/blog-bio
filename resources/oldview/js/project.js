

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
                window.location.href = "/proje/" + response.username + '/' + response.slug;
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
        var task = jQuery(".js-task-content").html();
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

    $('#create_key').click(function () {
        console.log('test')
        var key = 'BIO' + '-' + Math.random().toString(36).substring(2, 5).toUpperCase() + Math.random()
            .toString(36).substring(2, 5).toUpperCase() + '-' + 'BLOG';
        $('#invite_code').val(key);
    });

    //if click js-task-star post id
    $('.js-task-star').on('click', function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        console.log(id);
        $.ajax({
            method: "POST",
            url: "/todo/func",
            data: {
                'id': id,
                status: 'star',
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                console.log(data.data);
                if (data.data == 'star') {
                    iziToast.success({
                        title: 'Başarılı',
                        message: 'Görev başarıyla favorilere eklendi.',
                        position: 'topRight'
                    });
                } else {
                    if(data.data == 'completed'){
                        iziToast.error({
                            title: 'Başarılı',
                            message: 'Görev tamamlananlar arasında bulunuyor.',
                            position: 'topRight'
                        });
                    }else{
                    iziToast.success({
                        title: 'Başarılı',
                        message: 'Görev başarıyla favorilerden çıkarıldı.',
                        position: 'topRight'
                    });
                }
                }
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

    $('.js-task-remove').on('click', function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        iziToast.question({
            timeout: 20000,
            close: false,
            overlay: true,
            displayMode: 'once',
            id: 'question',
            zindex: 999,
            title: 'Uyarı',
            message: 'Görevi silmek istediğinize emin misiniz?',
            position: 'center',
            buttons: [
                ['<button><b>Evet</b></button>', function (instance, toast) {
                    instance.hide({
                        transitionOut: 'fadeOutUp'
                    }, toast, 'button');
                    $.ajax({
                        method: "POST",
                        url: "/todo/func",
                        data: {
                            'id': id,
                            status: 'remove',
                            _token: $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (data) {
                            iziToast.success({
                                title: 'Başarılı',
                                message: 'Görev başarıyla silindi.',
                                position: 'topRight'
                            });
                        },
                        error: function (data) {
                            location.reload();
                            iziToast.error({
                                title: 'Hata',
                                message: response.message,
                                position: 'topRight'
                            });

                        }
                    });
                }
                ],
                ['<button>HAYIR</button>', function (instance, toast) {
                    instance.hide({
                        transitionOut: 'fadeOutUp'
                    }, toast);
                    location.reload();
                }
                ],
            ]
        });
    });

    //input checked with id todo id tasks-cb-id{{ $todo->id }}
    $('.tasks-cb').on('change', function (e) {
        e.preventDefault();

        var id = $(this).data('id');
        var type = $('#tasks-cb-id' + id).is(':checked');
        console.log(id, type)
        $.ajax({
            method: "POST",
            url: "/todo/func",
            data: {
                'id': id,
                'type': type,
                status: 'todo-status',
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                iziToast.success({
                    title: 'Başarılı',
                    message: 'Görev başarıyla güncellendi.',
                    position: 'topRight'
                });
                $('.statu').html(data.data);
            },
            error: function (data) {
                iziToast.error({
                    title: 'Hata',
                    message: 'Görev güncellenemedi.',
                    position: 'topRight'
                });
            }
        });
    });


    //if click go_invite modal ajax
    $('#go_invite').on('click', function (e) {
        e.preventDefault();
        $.ajax({
            method: "POST",
            url: "/proje/func",
            data: {
                status: 'invite',
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                $('#modal-block-slideleft').find('.invite-content').html(data.data);
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

    //if invite_form submit
    $('#invite_form').on('submit', function (e) {
        e.preventDefault();
        var code = $('#invite_code').val();
        $.ajax({
            method: "POST",
            url: '/proje/func',
            data:  {
                code: code,
                status: 'invite-control',
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            contentType: false,
            processData: false,
            success: function (data) {
                iziToast.success({
                    title: 'Başarılı',
                    message: `${data.data} projesine katıldınız galiba.. Lütfen biraz bekleyin.`,
                    position: 'topRight'
                });
                location.reload(
                    setTimeout(function () {
                        $('#modal-block-slideleft').modal('hide');
                    }, 1500)
                );
            },
            error: function (data) {
                iziToast.error({
                    title: 'Hata',
                    message: 'Davet gönderilemedi.',
                    position: 'topRight'
                });
            }
        });
    });


});

