$(document).ready(function () {
    $('#manager_id').keyup(function () {
        let query = $(this).val();
        if (query != '') {
            let _token = $('input[name="_token"]').val();
            $.ajax({
                url: "/user/create/search",
                method: "POST",
                data: {query: query, _token: _token},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    console.log($('#manager_id').val().length)
                    let managers = '';
                    for (key in data) {
                        for (i in data[key]) {
                            managers += '<li>' + data[key][i] + '</li>';
                        }
                    }
                    $('#managerList').html(managers)
                }
            });
        }
    });
    $(document).on('click', 'li', function () {
        $('#manager_id').val($(this).text());
        $('#managerList').fadeOut();
        // $('#submit-btn').attr('disabled', false)
    });


    $(document).on('change', '#manager_id', function () {
        if ($('#manager_id').val() === '') {
            $('#managerList').fadeOut();
        }
    });
});

