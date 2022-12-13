
$(document).ready(function (){
    $('#manager_id').keyup(function (){
        let query = $(this).val();
        if (query != ''){
            let _token = $('input[name="_token"]').val();
            $.ajax({
                url:"/user/create/search",
                method:"POST",
                data:{query:query,_token:_token},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:function (data){
                    $('#managerList ul li').each(function (index){
                        if ($('#manager_id').val() === 'None'){
                            $('#submit-btn').attr('disabled',false)
                        }
                        else if ($( this ).text() != $('#manager_id').val() && $('#manager_id').val() !== 'None' ){
                            $('#submit-btn').attr('disabled',true)
                        }else {
                            $('#submit-btn').attr('disabled',false)
                        }
                    })
                    $('#managerList' ).fadeIn();
                    $('#managerList').html(data);
                }
            });
        }
    });

    $(document).on('click','li',function (){
        $('#manager_id').val($(this).text());
        $('#managerList').fadeOut();
        $('#submit-btn').attr('disabled',false)
    });

    $(document).on('change','#manager_id',function (){
        if ($('#manager_id').val() === ''){
            $('#managerList').fadeOut();
        }
    });
});

