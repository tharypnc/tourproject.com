(function(){

    $('.list-group-item:eq(4)').addClass('active');
    var idAdmin = $("#isAdmin").val();

    ViewUser(idAdmin);
    
    function ViewUser(){
        GetUsers(function(item){
            RenderTable(item.Users, idAdmin, function(element){
                $('#userTable tbody').html(element);
            });
        });
    }

    function GetUsers(callback) {
        $('body').append(Loading());
        $.ajax({
            url: burl + '/find/user',
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

    function RenderTable(users,idAdmin, callback){
        var element = '';
        if((users != null) && (users.length > 0)){
            $.each(users, function(index, item){
                var status = 'Active';
                var color ='blue';
                if(item.Status == 0){
                    status = 'Block';
                    var color ='red';
                }
                if( Number(idAdmin) === 0 && Number(item.isAdmin) === 0 ){ 

                element += '<tr data-id="' + item.Id + '">' +
                    '<td>' + item.Name + '</td>' +
                    '<td>' + item.Email + '</td>' +
                    '<td style="color:'+color+'">' + status + '</td>' +
                    '<td class="center">' + item.DateCreated + '</td>' +
                    '<td class="center">'+
                    '<a href="' + burl + '/edit/user/' + item.Id + '" class="btn btn-success btn-e"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>'+
                    '&nbsp;<button type="button" class="btn btn-danger btn-e delete"><i class="fa fa-trash-o" aria-hidden="true"></i></button>';
                
                }else if( Number(idAdmin) === 1){

                element += '<tr data-id="' + item.Id + '">' +
                    '<td>' + item.Name + '</td>' +
                    '<td>' + item.Email + '</td>' +
                    '<td style="color:'+color+'">' + status + '</td>' +
                    '<td class="center">' + item.DateCreated + '</td>' +
                    '<td class="center">'+
                    '<a href="' + burl + '/edit/user/' + item.Id + '" class="btn btn-success btn-e"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>'+
                    '&nbsp;<button type="button" class="btn btn-danger btn-e delete"><i class="fa fa-trash-o" aria-hidden="true"></i></button>';
                
                }

                element += '</td></tr>';
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
                url: burl+'/delete/user/'+id,
                dataType: "JSON",
                contentType: 'application/json; charset=utf-8',
            }).done(function (data) {
                if (data.IsError == false) {
                    swal('Data has been deleted', '', 'success');
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
