$(document).ready(function () {
    $('#input_acount').keyup(function (e) { 
        var value = $(this).val();
        $.post("./Ajax/check_user", {user_ac:value},
            function (data) {
                $('#check_user').html(data);
            }
        );
    });
});