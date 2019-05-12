(function(){

    $('.list-group-item:eq(5)').addClass('active');

    ViewCustomer();

    function ViewCustomer(){
        GetCustomers(function(Customers){
            RenderTable(Customers, function(element){
                $('#customerTable tbody').html(element);
            });
        });
    }

    function GetCustomers(callback) {
        $('body').append(Loading());
        $.ajax({
            url: burl + '/find/customer',
            type: 'GET',
            dataType: 'JSON',
            contentType: 'application/json; charset=utf-8',
        }).done(function (data) {
            if(data.IsError == false){
                if(typeof callback == 'function'){
                    callback(data.Data.Customers);
                }
            }
        }).complete(function (data) {
            $('body').find('.loading').remove();
        });
    }

    function RenderTable(Customers, callback){
       
        var element = '';
        if((Customers != null) && (Customers.length > 0)){
            $.each(Customers, function(index, item){
                var verify = 'Trail';
                if(item.Verify == 1){
                    verify = 'Verified';
                }

                var status = 'Inactive';
                if(item.Status == 1){
                    status = 'Active';
                }

                element += '<tr data-id="' + item.Id + '">' +
                                '<td>' + (i++) + '</td>' +
                                '<td>' + item.Name + '</td>' +
                                '<td class="center">' + item.Email + '</td>' +
                                '<td class="center">' + item.Phone + '</td>' +
                                '<td class="center">' + verify + '</td>' +
                                '<td class="center">' + status + '</td>' +
                                '<td class="center">' +
                                    '<a href="' + burl + '/edit/customer/' + item.Id + '" class="btn btn-success btn-e"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> ' +
                                '</td>'
                            '</tr>';
            });
        }
        if(typeof callback == 'function'){
            callback(element);
        }
    }

})();
