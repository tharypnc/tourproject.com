(function(){
    $(':radio').iCheck({
        radioClass: 'iradio_minimal'
    });

    SetValidation();
    function SaveOrUpdate() {
        $('body').append(Loading());
        var item = $('#formCustomer').serialize();
        $.ajax({
            type: 'POST',
            url: burl + '/update/customer',
            data: item
        }).done(function (data) {
            if (data.IsError == false) {
                window.location.href = burl + '/view/customer';
            } else {
                swal(data.Message, '', 'success');
            }
        }).complete(function (data) {
            $('body').find('.loading').remove();
        });
    }
    function SetValidation() {
        var form = $('body').find('#formCustomer');
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
                            message: 'Customer Name is requried'
                        }
                    }
                },
                Email: {
                    validators: {
                        notEmpty: {
                            message: 'Customer Email is required'
                        }
                    }
                },
                Phone: {
                    validators: {
                        notEmpty: {
                            message: 'Customer Phone is required'
                        }
                    }
                }
            }
        }).on('success.form.bv', function (e) {
            SaveOrUpdate();
        });
    }
})();
