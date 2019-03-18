(function(){

    SetValidation();

    function SetValidation() {
        var form = $('body').find('#formLogin');
        form.bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                name: {
                    validators: {
                        notEmpty: {
                            message: 'Username is required'
                        }
                    }
                },
                password: {
                    validators: {
                        notEmpty: {
                            message: 'Password is required'
                        }
                    }
                }
            }
        }).on('success.form.bv', function (e) {
        });
        $('body').on('click', '#btnLogin', function (e) {
            form.bootstrapValidator('validate');
        });
    }

})();
