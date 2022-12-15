$(document).ready(function (){
    let noData = ' <tr> <td align="center" colspan="5">No Data Found</td> </tr>';
    function fetch_customer_data(query = '', page = 1)
    {
        $.ajax({
            url:"/user/all",
            method:'GET',
            data:{
                query:query,
                page: page
            },
            dataType:'json',
            success:function (viewRendered)
            {
                if(viewRendered.html === false){
                    $('tbody').html(noData);
                }else {
                    $('#content').html(viewRendered.html);
                }
            },
            complete:function (viewRendered)
            {
                $('#mainContent').html(viewRendered.responseText);

            },
        })
    }
    $(document).on('keyup','#searchUser',function (){
        let query = $(this).val();
        fetch_customer_data(query);
    })

    $(document).on('click','#navigation a',function (event){
        event.preventDefault()
        let page = parseInt($(this).html());
        let query = $('#searchUser').val();

        fetch_customer_data(query, page);

        return false;
    })
});
