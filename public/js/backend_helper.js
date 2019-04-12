var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

var callDelete = function(el){

    url = el.attr('href');

    data = {_token: CSRF_TOKEN, _method: "delete"};

    $.ajax({
        url: url,
        type: 'post',
        data: data,
        success: function(data){
            
            location.reload();                    

        }, error: function(data){

            swal("", data.responseJSON.message, "error");

        }
    });
}

var switchStatus = function(el){

    url = el.attr('href');
    status = el.attr('data-status');

    if (status == 'enable') {
        status = 'disabled';
        switch_status = false;
    }else{
        status = 'enable';
        switch_status = true;
    }


    data = {_token: CSRF_TOKEN, _method: 'PATCH', status:status };

    $.ajax({
        url: url,
        type: 'POST',
        data: data,
        success: function(data){

            el.attr('data-status', status);
            el.prop('checked', switch_status);

            swal.close();

        }
    });

}

$(document).on('click', '.btn-action', function(e){

    e.preventDefault();

    el = $(this);

    var icon    = (el.attr('name') == 'btn-delete')  ? 'warning' : 'info';
    var message = (el.attr('name') == 'btn-delete')  ? 'This action cannot be undone.' : '';

    swal({
        title: 'Are you sure?',
        text: message,
        type: icon,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    }).then((result) => {

        if (result.value) {

            swalLoader();

            if (el.data('action') == 'delete') {

                callDelete(el);

            }else if (el.data('action') == 'switch') {

                switchStatus(el);

            }else{

                ajaxFunction(el);
                
            }

        }
    })

});


var swalLoader = function() {
    swal({  
        imageUrl: window.location.origin + "/img/dual-ring.svg",
        showConfirmButton: false,
        allowOutsideClick: false
    });
};