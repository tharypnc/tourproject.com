(function(){
    $(':radio').iCheck({
        radioClass: 'iradio_minimal'
    });
    
    SetValidation();
    function SaveOrUpdate() {
        $('body').append(Loading());
        var item = $('#formLanguage').serialize();
        $.ajax({
            type: 'POST',
            url: burl + '/update/language',
            data: item
        }).done(function (data) {
            if (data.IsError == false) {
                window.location.href = burl + '/view/language';
            } else {
                swal(data.Message, '', 'success');
            }
        }).complete(function (data) {
            $('body').find('.loading').remove();
        });
    }
    function SetValidation() {
        var form = $('body').find('#formLanguage');
        form.bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                Lang_prefix: {
                    validators: {
                        notEmpty: {
                            message: 'Prefix is required'
                        }
                    }
                },
                Lang_fullname: {
                    validators: {
                        notEmpty: {
                            message: 'Full Name is required'
                        }
                    }
                },
            }
        }).on('success.form.bv', function (e) {
            SaveOrUpdate();
        });
    }
})();
