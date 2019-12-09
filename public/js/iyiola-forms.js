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
        let notifyMsg = $(this).data('notifymsg');
        if (notifyMsg == null) {
            notify('Submitting form...', 'Please wait');
        } else {
            notify(notifyMsg, 'Please wait');
        }

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
            complete: function (response, status) {
                if (status == 'success') {
                    response = JSON.parse(response.responseText);
                    if (response.ok == true) {
                        notify(response.message, 'Success');
                        setTimeout(function () {
                            if (response.data.redirect != null) {
                                window.location = response.data.redirect;
                            } else if (form.data('redirect') != null) {
                                window.location = form.data('redirect');
                            } else if (response.data.reload == true) {
                                window.location.reload();
                            } else if (form.data('reload') == 'true') {
                                window.location.reload();
                            }
                        }, 1000);
                    } else {
                        notify(response.message, 'This is bad');
                    }
                } else {
                    notify('An error occured while submitting the form!', 'This is bad');
                }
                form.find(inputElements).removeAttr('disabled');
            }
        });
    });
})();
