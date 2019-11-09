/**
 * Forms utility library
 * Automatically converts a form into an ajx form
 * 
 * @author Iyiola-am
 */
var forms = (function () {
    let inputElements = 'input, select, textarea, radio, checkbox, button';

    function notify(message, title = 'Alert') {
        $.gritter.add({
            title: '<b>' + title + '</b><br>',
            text: message,
            sticky: false
        });
    }

    $('form.ajax-form').on('submit', function (e) {
        e.preventDefault();
        notify('Submitting form...', 'Please wait');

        let data = new FormData(this);
        let form = $(this);
        form.find(inputElements).attr('disabled', true);

        // Send the ajax request
        $.ajax({
            type: form.attr('method'),
            url: form.attr('action'),
            data: data,
            contentType: false,
            cache: false,
            processData: false,
            complete: function (reponse, status) {
                if (status == 'success') {
                    var obj = JSON.parse(reponse);
                    if (obj.ok == true) {
                        notify(obj.message, 'Success');
                        setTimeout(function () {
                            if (obj.data.redirect != null) {
                                window.location = redirect;
                            } else if (form.data('redirect') != null) {
                                window.location = obj.data.redirect;
                            } else if (obj.data.reload != null) {
                                window.location.reload();
                            } else if (form.data('reload') != null) {
                                window.location.reload();
                            }
                        }, 1000);
                    } else {
                        notify(obj.message, 'This is bad');
                    }
                } else {
                    notify('An error occured while submitting the form!', 'This is bad');
                }
                form.find(inputElements).removeAttr('disabled');
            }
        });
    });
})();