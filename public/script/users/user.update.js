(function(){

    $('.list-group-item:eq(10)').addClass('active');
    SetValidation();
    function SaveOrUpdate() {
        $('body').append(Loading());
        var item = $('#formUser').serialize();
        $.ajax({
            type: 'POST',
            url: burl + '/update/user',
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
                Password: {
                    validators: {
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
