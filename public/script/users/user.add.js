(function(){
    $('.list-group-item:eq(10)').addClass('active');
    SetValidation();
    function SaveOrUpdate() {
        $('body').append(Loading());
        var item = $('#formUser').serialize();
        $.ajax({
            type: 'POST',
            url: burl + '/insert/user',
            data: item
        }).done(function (data) {
            if (data.IsError == false) {
                window.location.href = burl + '/view/user';
            } else {
                swal(data.Message, '', 'warning');
            }
        }).complete(function (data) {
            $('body').find('.loading').remove();
        });
    }
    function SetValidation() {
        var form = $('body').find('#formUser');
        form.bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                Name: {
                    validators: {
                        notEmpty: {
                            message: "Username is required"
                        },
                        stringLength: {
                            min: 5,
                            max: 32,
                            message: "Input Username as charactor between 5 to 32"
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9\-_@]+$/,
                            message: "Allow only [a-z]-[A-Z]-[_ @] "
                        }
                    }
                },
                Email: {
                    validators: {
                        notEmpty: {
                            message: 'Email is required'
                        },
                        emailAddress: {
                            message: 'Wrong format email!'
                        }
                    }
                },
                Password: {
                    validators: {
                        notEmpty: {
                            message: "Password is required"
                        },
                        stringLength: {
                            min: 6,
                            max: 32,
                            message: "Please input password between 6 to 32"
                        },
                        different: {
                            field: "Name",
                            message: "Password note allow input the same username"
                        }
                    }
                },
                Verify: {
                    validators: {
                        notEmpty: {
                            message: "Re-Password is required"
                        },
                        identical: {
                            field: "Password",
                            message: "Password not match"
                        }
                    }
                }
            }
        }).on('success.form.bv', function (e) {
            SaveOrUpdate();
        });

        $('body').on('click', '#submit', function (e) {
            form.bootstrapValidator('validate');
        });
    }
})();
