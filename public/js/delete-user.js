$(document).on('click','#btn-delete',function (e){
    e.preventDefault();
    let $btn = $(this);
    $.ajax({
        url: $btn.data('route'),
        type: 'DELETE',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        complete(){
            window.location.href = 'all';
        }
    })


})
