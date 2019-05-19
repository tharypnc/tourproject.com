(function(){

    $('.list-group-item:eq(1)').addClass('active');
    
    var getParam = GetURLParameter('page');

    function GetURLParameter(sParam){

        var sPageURL = window.location.search.substring(1);
        var sURLVariables = sPageURL.split('&');
    
        for (var i = 0; i < sURLVariables.length; i++) {
            var sParameterName = sURLVariables[i].split('=');
    
            if (sParameterName[0] == sParam)
    
            {
                return sParameterName[1];
    
            }
        }
    }

    var URI = '/find/country';

    if( getParam != '' ){

        URI = '/find/country?page='+getParam+'';
    }

    ViewItem();
    function ViewItem(){
        GetItems(function(countries){
            RenderTable(countries, function(element){
                $('#countryTable tbody').html(element);
            });
        });
    }

    function GetItems(callback) {
        $('body').append(Loading());
        $.ajax({
            url: burl + URI,
            type: 'GET',
            dataType: 'JSON',
            contentType: 'application/json; charset=utf-8',
        }).done(function (data) {
            if(data.IsError == false){
                if(typeof callback == 'function'){
                    callback(data.Data.data);
                }
            }
        }).complete(function (data) {
            $('body').find('.loading').remove();
        });
    }

    function RenderTable(countries, callback){
        var element = '';
        var color ='';
        var i =1;
        if((countries != null) && (countries.length > 0)){
            $.each(countries, function(index, item){
              
                var status = 'Active';
                if(item.Status == 2){
                    status = 'Inactive';
                    color = 'style="color:red"';    
                }
                if(item.Photo ==''){
                    img_path = '../img/placeholder.png';
                }else{
                    img_path = '../uploads/countries/'+item.Photo+'';
                }
                element += '<tr data-id="' + item.Id + '">' +
                                '<td>' + (i++) + '</td>' +
                                '<td>' + item.Country_Name + '</td>' +
                                '<td class="center"><img style="width: 70px; height: 50px; float:left;padding: 2px;border: solid 1px #e4dfdf;" src="'+img_path+'"/></td>' +
                                '<td class="center" '+color+' >' + status + '</td>' +
                                '<td class="center">' + item.DateCreated + '</td>' +
                                '<td class="center">' +
                                    '<a href="' + burl + '/edit/country/' + item.Id + '" class="btn btn-success btn-e"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> ' +
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
                url: burl + '/delete/country/' + id,
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
