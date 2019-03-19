(function(){

    
    var posStr='';

    /*
     *Function Select Image preview//
     */

    var app = $('.newPos');
    var countData = 0;
    var str ='';
    $(document).on("click", ".pos-image", function () {
        
        str = '<input type="file" class="ref-'+countData+'" id="files" name="files[]" style="width: 95px;display:none"/>';
        app.before(str);
        $(".ref-"+countData).click();

    });

    //Function Upload Image
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
                     '</div>'+
                     '<span title="Remove" data-id='+countData+' class="fa fa-times pointer removeImage" style="position: absolute;right: 2px;top: -2px;color: #fc0404; display: none;"></span>' +
                     '</div>';

            $('.newPos').before(posStr);
            countImage();
            $('.Ref-'+countData).hide();

        }else{
            alert('Error some image upload not allow size or extension,Pls try again!!');
            $('.ref-'+countData).remove();
        }
        countData++;
    });

    /*Function For Remove Form Div*/
    $('body').on('click' ,'.removeImage' , function(){
        var rem = $(this).attr('data-id');
        $('.ref-'+rem).remove();
        $(this).parents('.img-preview').remove();
        countImage();
    });

    function countImage(){
        $('#have_file').val($('.img-preview').length);
        $('#countImg').html($('.img-preview').length);
    }

    SetValidation();

    function SaveOrUpdate() {
        $('body').append(Loading());
        var item = $('#formLanguage').serialize();
        $.ajax({
            type: 'POST',
            url: burl + '/insert/language',
            data: item
        }).done(function (data) {
            if (data.IsError == false) {

                window.location.href = burl + '/view/language';

            } else {
                swal(data.Message, '', 'warning');
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

        $('body').on('click', '#save', function (e) {
            form.bootstrapValidator('validate');
        });
    }
})();
