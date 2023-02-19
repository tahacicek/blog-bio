import './bootstrap';
import jQuery from "jquery";
import Alpine from 'alpinejs';

window.$ = jQuery;
window.Alpine = Alpine;

Alpine.start();


$(document).ready(function () {


    $('#like').click(function () {
        //data-id al
        var id = $(this).data('id');
        var user = $(this).data('user');
        //ajax
        $.ajax({
            type: "post",
            url: "{{ route('post.like') }}",
            data: {
                id: id,
                user: user,
                _token: $('meta[name="csrf-token"]').attr('content'),
            },
            success: function (data) {
                console.log(data.likeCount);
                //likec +1
                $('#likec').html(+data.likeCount);

                if (data.success == true) {
                    iziToast.show({
                        theme: 'dark',
                        icon: 'icon-person',
                        iconColor: 'white',
                        timeout: 1000,
                        title: 'Hey',
                        message: 'Gönderi beğenildi..',
                        position: 'bottomLeft', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
                        progressBarColor: 'rgb(0, 255, 184)',
                    });
                } else {
                    iziToast.show({
                        theme: 'dark',
                        icon: 'icon-person',
                        iconColor: 'white',
                        timeout: 1000,
                        title: 'Hey',
                        message: 'Bunu zaten beğendiğini düşünüyoruz..',
                        position: 'center', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
                        progressBarColor: 'rgb(0, 255, 184)',
                    });
                }
            }
        });
    });

    $('#dislike').click(function () {
        var id = $(this).data('id');
        var user = $(this).data('user');
        $.ajax({
            type: "post",
            url: "{{ route('post.dislike') }}",
            data: {
                id: id,
                user: user,
                _token: $('meta[name="csrf-token"]').attr('content'),
            },
            success: function (data) {
                if (data.success == true) {
                    $('#dlikec').html(+data.disslikeCount);
                    iziToast.show({
                        theme: 'dark',
                        icon: 'icon-person',
                        iconColor: 'white',
                        timeout: 1000,
                        title: 'Hey',
                        message: 'Başarıyla beğenmedin..',
                        position: 'bottomLeft', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
                        progressBarColor: 'rgb(0, 255, 184)',
                    });
                } else {
                    iziToast.show({
                        theme: 'dark',
                        icon: 'icon-person',
                        iconColor: 'white',
                        timeout: 1000,
                        title: 'Hey',
                        message: 'Bunu zaten beğenmediğini düşünüyoruz.. Ne istiyorsun ?',
                        position: 'center', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
                        progressBarColor: 'rgb(0, 255, 184)',
                    });
                }
            }
        });
    });

    $('#bookmark').click(function () {
        //data-id al
        var id = $(this).data('id');
        var user = $(this).data('user');
        $.ajax({
            type: "post",
            url: "{{ route('post.bookmark') }}",
            data: {
                id: id,
                user: user,
                _token: $('meta[name="csrf-token"]').attr('content'),
            },
            success: function (data) {
                if (data.success == true) {
                    $('#bookc').html(+data.bookmarkCount);
                    iziToast.show({
                        theme: 'dark',
                        icon: 'icon-person',
                        iconColor: 'white',
                        timeout: 1000,
                        title: 'Hey',
                        message: 'Gönderi kaydedildi..',
                        position: 'bottomLeft', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
                        progressBarColor: 'rgb(0, 255, 184)',
                    });
                    //change text
                    $('#bookmark').addClass('btn-primary');
                } else {
                    iziToast.show({
                        theme: 'dark',
                        icon: 'icon-person',
                        iconColor: 'white',
                        timeout: 1000,
                        title: 'Hey',
                        message: 'Kendi gönderini kaydedemezsin..',
                        position: 'center', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
                        progressBarColor: 'rgb(0, 255, 184)',
                    });
                    $('#bookmark').removeClass('btn-primary');
                }
            }
        });
    });

    //comment form submit

    $('#commentForm').submit(function (e) {
        e.preventDefault();
        var id = $('#post_id').val();
        var user = $('#user_id').val();
        var comment = $('#comment').val();
        $.ajax({
            type: "post",
            url: '/post/yorum',
            data: {
                id: id,
                user: user,
                comment: comment,
                _token: $('meta[name="csrf-token"]').attr('content'),
            },
            success: function (data) {
                if (data.success == true) {
                    console.log(data.comment.comment, data.user.avatar);
                    //gelen datayı yazdır
                    $('#comment_detail').html(`<div class="d-flex">
                <a class="flex-shrink-0 img-link me-2" href="javascript:void(0)">
                    <img class="img-avatar img-avatar32 img-avatar-thumb"
                        src="${data.user.avatar}" alt="">
                </a>
                <div class="flex-grow-1">
                    <p class="mb-1">
                        <a class="fw-semibold" id="user" href="javascript:void(0)">@${data.user.username}</a> diyo ki
                        <button class="float-end border-0 btn-outline-dark bg-white"><i class="fa text-danger fa-trash" aria-hidden="true"></i></button>
                        <button class="float-end border-0 me-1  bg-white"><i class="fa fa-pencil text-warning" aria-hidden="true"></i></button>
                        <button class="float-end border-0 me-1 bg-white"><i class="fa  fa-thumbs-down text-secondary" aria-hidden="true"></i></button>
                        <button class="float-end border-0 me-1  bg-white"><i class="fa fa-thumbs-up text-secondary" aria-hidden="true"></i></button>
                        <button  id="${data.comment.id}" class="reply float-end border-0 me-1 text-center bg-white"><i class="fa fa-reply text-black" aria-hidden="true"></i></button>

                        <br >
                       ${data.comment.comment}
                    </p>
                </div>
            </div>`);
                    iziToast.show({
                        theme: 'dark',
                        icon: 'icon-person',
                        iconColor: 'white',
                        timeout: 1000,
                        title: 'Hey',
                        message: 'Yorumun gönderildi..',
                        position: 'bottomLeft', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
                        progressBarColor: 'rgb(0, 255, 184)',
                    });
                    $('#commentForm').addClass('btn-primary');
                } else {
                    iziToast.show({
                        theme: 'dark',
                        icon: 'icon-person',
                        iconColor: 'white',
                        timeout: 1000,
                        title: 'Hey',
                        message: 'Bir şeyler ters gitti..',
                        position: 'center', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
                        progressBarColor: 'rgb(0, 255, 184)',
                    });
                    $('#commentForm').removeClass('btn-primary');
                }
            }
        });
    });

    $('#commentParent').submit(function (e) {
        console.log('test');
        e.preventDefault();
        var id = $('#post_id').val();
        var user = $('#user_id').val();
        var comment = $('#comments').val();
        var parent_id = $('#parent_id').val();
        $.ajax({
            type: "POST",
            url: "/post/yorum",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                "parent_id": parent_id,
                "id": id,
                "user": user,
                "comment": comment,
            },
            success: function (data) {
                $('#parent_detail').html(` <a class="flex-shrink-0 img-link me-2" href="javascript:void(0)">
                    <img class="img-avatar img-avatar32 img-avatar-thumb"
                        src="${data.user.avatar}" alt="">
                         </a>
                    <div class="flex-grow-1">
                        <p class="mb-1">
                            <a class="fw-semibold" href="javascript:void(0)">@${data.user.username}</a>
                            <button class="float-end border-0 btn-outline-dark bg-white"><i class="fa text-danger fa-trash" aria-hidden="true"></i></button>
                            <button class="float-end border-0 me-1 bg-white"><i class="fa  fa-thumbs-down text-secondary" aria-hidden="true"></i></button>
                            <button class="float-end border-0 me-1  bg-white"><i class="fa fa-thumbs-up text-secondary" aria-hidden="true"></i></button>
                            <button class="float-end border-0 me-1 text-center bg-white"><i class="fa fa-reply text-black" aria-hidden="true"></i></button>
                            <br >
                            ${data.comment.comment}
                        </p>
                        <p>
                            <a class="me-1" href="javascript:void(0)">Like</a>
                            <a href="javascript:void(0)">Comment</a>
                        </p>
                    </div>`);

                iziToast.show({
                    theme: 'dark',
                    icon: 'icon-person',
                    iconColor: 'white',
                    timeout: 1000,
                    title: 'Hey',
                    message: 'Yorumun gönderildi..',
                    position: 'bottomLeft', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
                    progressBarColor: 'rgb(0, 255, 184)',
                });
                $('#commentParent').addClass('btn-primary');
            },
            error: function (error) {
                console.log(error);
            }
        });
    });

    $('#comment').on('input', function () {
        var inputText = $(this).val();
        if (inputText.includes('@')) {
            $.ajax({
                url: '/biolog/username', // Sunucu tarafında kullanıcı adlarını getiren bir PHP dosyası
                method: 'GET',
                data: {
                    search: inputText.substring(1)
                },
                success: function (response) {
                    var userList = $('#userList');
                    userList.empty();
                    $.each(response, function (index, users) {
                        console.log(users);
                        for (var i = 0; i < users.length; i++) {
                            userList.append(
                                `<button href="${users[i].username}" id="users" class="text-center me-3 text-primary">${users[i].username}</button>`
                            );
                        }

                    });
                    $('#users').click(function () {
                        $('#comment').val('');
                        var username = $(this).text();
                        var inputText = $('#comment').val();
                        var index = inputText.indexOf('@');
                        var str1 = inputText.substring(0, index);
                        var str2 = inputText.substring(index + 1);
                        var id = $(this).attr('id');
                        $('#comment').val(str1 + '@' + username + ' ');
                        $('#userList').empty();
                    });
                }
            });
        } else {
            $('#userList').empty();
        }
    });
    $('#comments').on('input', function () {
        var inputText = $(this).val();
        if (inputText.includes('@')) {
            $.ajax({
                url: '/biolog/username', // Sunucu tarafında kullanıcı adlarını getiren bir PHP dosyası
                method: 'GET',
                data: {
                    search: inputText.substring(1)
                },
                success: function (response) {
                    var userList = $('#userList2');
                    userList.empty();
                    $.each(response, function (index, users) {
                        console.log(users);
                        for (var i = 0; i < users.length; i++) {
                            userList.append(
                                `<button href="${users[i].username}" id="users" class="text-center me-3 text-primary">${users[i].username}</button>`
                            );
                        }

                    });
                    $('#users').click(function () {
                        $('#comments').val('');
                        var username = $(this).text();
                        var inputText = $('#comments').val();
                        var index = inputText.indexOf('@');
                        var str1 = inputText.substring(0, index);
                        var str2 = inputText.substring(index + 1);
                        var id = $(this).attr('id');
                        $('#comments').val(str1 + '@' + username + '');
                        $('#userList2').empty();
                    });
                }
            });
        } else {
            $('#userList2').empty();
        }
    });

    //if click child_trash
    $('.comment_trash').click(function () {
        //with question
        var id = $(this).attr('id');
        iziToast.question({
            timeout: 20000,
            close: false,
            overlay: true,
            displayMode: 'once',
            id: 'question',
            zindex: 999,
            title: 'Hey',
            message: 'Yorumu silmek istediğinize emin misiniz?',
            position: 'center',
            buttons: [
                ['<button><b>EVET</b></button>', function (instance, toast) {
                    $.ajax({
                        type: "POST",
                        url: "/post/yorum/sil",
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content'),
                            id: id,
                        },
                        success: function (data) {
                            if(data.message != 0){
                                iziToast.show({
                                    theme: 'dark',
                                    icon: 'icon-person',
                                    iconColor: 'white',
                                    timeout: 1000,
                                    title: 'Hey',
                                    message: 'Yorumun silindi..',
                                    position: 'bottomLeft', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
                                    progressBarColor: 'rgb(0, 255, 184)',
                                });
                            }else{
                                iziToast.show({
                                    theme: 'dark',
                                    icon: 'icon-person',
                                    iconColor: 'white',
                                    timeout: 1000,
                                    title: 'Hey',
                                    message: 'Bu yorumu zaten sildiğini düşünüyoruz..',
                                    position: 'center', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
                                    progressBarColor: 'rgb(0, 255, 184)',
                                });
                            }
                            if(data.comment.comment == 0){
                                $('#comment_statu' + id).html('Bu yorum silinmiştir.');
                            }else{
                                $('#comment' + id).remove();
                            }
                            instance.hide({
                                transitionOut: 'fadeOutUp'
                            }, toast);
                        },
                        error: function (error) {
                            console.log(error);
                        }
                    });
                }
                ],
                ['<button>HAYIR</button>', function (instance, toast) {
                    instance.hide({
                        transitionOut: 'fadeOutUp'
                    }, toast);
                }
                ],
            ]

        });
    });


    $('.reply').click(function () {
        var id = $(this).attr('id');
        $('#reply_form' + id).toggle();
    });
});
