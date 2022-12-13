$(document).ready(function(){
    $('#fullName').keyup(function(){
        $('#typeChars').text($('#fullName').val().length)
        if ($('#fullName').val().length > 256){
            $('#typeChars').css('color','red')
            $('#submit-btn').attr('disabled',true)
        }else {
            $('#typeChars').css('color','white')
            $('#submit-btn').attr('disabled',false)
        }

    });
    $('#reset-btn').click(function (){
        ($('#typeChars').text(0))
    });
});
