$(document).ready(function () {

    //if createPrject form submitted
    $('#createProject').on('submit', function (e) {
        e.preventDefault();
        var form = $(this);
        var status = "create-project"
        var serializedData = form.serialize();
        $.ajax({
            method: "POST",
            url: "/proje/func",
            data: form.serialize(),
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

});
