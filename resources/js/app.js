import './bootstrap';

import Alpine from 'alpinejs';

import '../../public/custom/assets/js/dashmix.app.min.js';

import '../../public/custom/assets/js/lib/jquery.min.js';
import '../../public/custom/assets/js/lib/iziToast.min.js';
import '../../public/custom/assets/js/plugins/jquery-sparkline/jquery.sparkline.min.js';





window.Alpine = Alpine;

Alpine.start();

$(document).ready(function() {


    $('#postolsturyor').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: '/post/olustur',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                form.reset();
                iziToast.success({
                    title: 'Başarılı',
                    message: 'Post başarıyla oluşturuldu.',
                    position: 'topCenter'
                });
            },
            error: function(data) {
                iziToast.error({
                    title: 'Hata',
                    message: 'Post oluşturuldu.',
                    position: 'topCenter'
                });
            }
        });
    });


});
