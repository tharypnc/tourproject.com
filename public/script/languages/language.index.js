(function(){

    $('.list-group-item:eq(2)').addClass('active');
    ViewItem();

    function ViewItem(){
        GetItems(function(languages){
            RenderTable(languages, function(element){
                $('#languageTable tbody').html(element);
            });
        });
    }

    function GetItems(callback) {
        $('body').append(Loading());
        $.ajax({
            url: burl + '/find/language',
            type: 'GET',
            dataType: 'JSON',
            contentType: 'application/json; charset=utf-8',
        }).done(function (data) {
            if(data.IsError == false){
                if(typeof callback == 'function'){
                    callback(data.Data);
                }
            }
        }).complete(function (data) {
            $('body').find('.loading').remove();
        });
    }

    function RenderTable(languages, callback){
        var element = '';
        var i =1;
        if((languages != null) && (languages.length > 0)){
            $.each(languages, function(index, item){
                var status = 'Active';
                if(item.Lang_status == 2){
                    status = 'Inactive';
                }
                element += '<tr data-id="' + item.Id + '">' +
                                '<td>' + (i++) + '</td>' +
                                '<td>' + item.Lang_prefix + '</td>' +
                                '<td class="center">' + item.Lang_fullname + '</td>' +
                                '<td class="center">' + item.Lang_description + '</td>' +
                                '<td class="center">' + status + '</td>' +
                                '<td class="center">' + item.DateCreated + '</td>' +
                                '<td class="center">' +
                                    '<a href="' + burl + '/edit/language/' + item.Id + '" class="btn btn-success btn-e"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> ' +
                                    '<button type="button" class="btn btn-danger btn-e delete"><i class="fa fa-trash-o" aria-hidden="true"></i></button>' +
                                '</td>'
                            '</tr>';
            });
        }
        if(typeof callback == 'function'){
            callback(element);
        }
    }

    $('body').on('click', '.delete', function () {
        var select = $(this).closest('tr');
        var id = $(select).attr('data-id');
        swal({
            title: 'Delete',
            text: 'Are you sure you want to delete?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
            closeOnConfirm: false
        }, function () {
            $('body').append(Loading());
            $.ajax({
                type: 'GET',
                url: burl + '/delete/language/' + id,
                dataType: "JSON",
                contentType: 'application/json; charset=utf-8',
            }).done(function (data) {
                if (data.IsError == false) {
                    swal('Data have been deleted', '', 'success');
                    $(select).remove();
                } else {
                    swal(data.Message, '', 'success');
                }
            }).complete(function (data) {
                $('body').find('.loading').remove();
            });
        });
    });
})();
