/* global grecaptcha */

$(document).ready(function () {
    (function () {

        var app = {

            initialize: function () {
                this.setUpListeners();
            },

            setUpListeners: function () {
                $('form').on('submit', app.submitForm);
                $('form').on('keydown', 'input, textarea', app.removeError);
                $('form').on('blur', 'input, textarea', app.addSuccess);
            },

            submitForm: function (e) {
                var form = $('#validateForm'),
                    submitBtn = form.find('button[type="submit"]');

                if (app.validateForm(form) === false) {
                    e.preventDefault();
                    submitBtn.attr('disabled', 'disabled');
                    return false;
                } else {
                    submitBtn.removeAttr('disabled');
                    return true;
                }
                ;
            },

            validateForm: function (form) {
                var inputs = form.find('input').not('#site'),
                    reg = '^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$',
                    captcha = grecaptcha.getResponse(),
                    textarea = form.find('#text'),
                    text = textarea.val(),
                    valid = true;

                $("div.invalid-feedback").remove();

                $.each(inputs, function (index, val) {
                    var input = $(val),
                        val = input.val(),
                        email = $('#email'),
                        formGroup = input.parents('.form-group');

                    if (val.length === 0) {
                        input.addClass('is-invalid').removeClass('is-valid');
                        formGroup.append('<div class="invalid-feedback">Заповніть поле</div>');
                        valid = false;
                    } else {

                        input.addClass('is-valid').removeClass('is-invalid');

                        if (email.val().match(reg)) {
                            email.removeClass('is-invalid').addClass('is-valid');
                        }
                        if (!email.val().match(reg) && email.val().length !== 0) {
                            email.removeClass('is-valid').addClass('is-invalid');
                            $("div.wrongEmail").remove();
                            email.parents('.form-group').append('<div class="wrongEmail invalid-feedback">Невірний формат email</div>');
                            valid = false;
                        }
                    }
                });

                if (text.length === 0) {
                    textarea.addClass('is-invalid').removeClass('is-valid');
                    textarea.parents('.form-group').append('<div class="invalid-feedback">Заповніть поле</div>');
                    valid = false;
                } else {
                    textarea.addClass('is-valid').removeClass('is-invalid');
                }

                return valid;
            },

            removeError: function () {
                $('#validateForm').find('button[type="submit"]').removeAttr('disabled');
                $(this).removeClass('is-invalid');
            },

            addSuccess: function () {
                var form = $('#validateForm');
                app.validateForm(form);
            }
        };

        app.initialize();

    }());

});