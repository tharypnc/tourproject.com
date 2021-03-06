(function(){
    $('.list-group-item:eq(1)').addClass('active');
    $(':radio').iCheck({
        radioClass: 'iradio_minimal'
    });
    
    var posStr='';

    /*
     *Function Select Image preview//
     */

    var app = $('.newPos');
    var countData = 0;
    var str ='';

    $(document).on("click", ".pos-image", function () {
        str = '<input type="file" class="ref-'+countData+'" id="files" name="files" style="width: 95px;display:none"/>';
        app.before(str);
        $(".ref-"+countData).click();

    });

    //Function Upload Image//
    $(document).on("change","#files", function (e) {
        unsaved =true;
        var data_file = e.target.files;
        //Allow Extension
        var allowed_extensions = new Array("x-png","gif","png","jpeg","jpg");
        //Allow Size
        var allowed_size = 2; //2MB
        var fileName = data_file[0].name;
        var ext = fileName.substring(fileName.lastIndexOf('.') + 1).toLowerCase();

        if (extensionType(allowed_extensions,fileName) && (fileSize(data_file[0].size,allowed_size))) {
            
            posStr = '<div class="img-preview">' +
                     '<div class="img">' +
                     '<img class="img-center img-responsive" src="' + URL.createObjectURL(data_file[0]) +'">'+
                     '</div>' +
                     '<span title="Remove" data-id='+countData+' class="fa fa-times pointer removeImage" style="position: absolute;right: 2px;top: -2px;color: #fc0404; display: none;"></span>' +
                     '</div>';

            $('.newPos').before(posStr);
            $('.Ref-'+countData).hide();

        }else{
            alert('Error some image upload not allow size or extension,Pls try again!!');
            $('.ref-'+countData).remove();
        }
        countData++;
        $("#pos-image").css("display","none");
    });

    /*Function For Remove Form Div*/
    $('body').on('click' ,'.removeImage' , function(){
        var rem = $(this).attr('data-id');
        $('.ref-'+rem).remove();
        $(this).parents('.img-preview').remove();
        $("#pos-image").css("display","block");
    });

    SetValidation();
    function SaveOrUpdate() {
        $('body').append(Loading());
        var item = $('#formCountry').serialize();
        $.ajax({
            type: 'POST',
            url: burl + '/update/country',
            data: item
        }).done(function (data) {
            if (data.IsError == false) {
                window.location.href = burl + '/view/country';
            } else {
                swal(data.Message, '', 'success');
            }
        }).complete(function (data) {
            $('body').find('.loading').remove();
        });
    }
    function SetValidation() {
        var form = $('body').find('#formCountry');
        form.bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                Country_Name: {
                    validators: {
                        notEmpty: {
                            message: 'Name is required'
                        }
                    }
                }
            }
        }).on('success.form.bv', function (e) {
            SaveOrUpdate();
        });
    }
})();
