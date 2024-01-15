$(document).ready(function () {
    $("#ConfirmPassword").on('keyup', function(){
        var password = $("#Password").val();
        var confirmPassword = $("#ConfirmPassword").val();
        if (password != confirmPassword)
        {
            $("#CheckPasswordMatch").html("password tidak sama!").css("color","red");
            $("#btn_update").prop('disabled', true);
        }
        else { 
            $("#CheckPasswordMatch").html("password sama!").css("color","green");
            $("#btn_update").prop('disabled', false);
        }
    });
});