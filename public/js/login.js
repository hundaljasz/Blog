$(document).ready(function(){
    $("#login_form").on('submit',function(e){
        e.preventDefault();
        var email = $("#email").val();
        var password = $("#password").val();
        var flag = null;
        if(email == "")
        {
            $("#login_email_error").fadeIn(1000);
            $("#login_email_error").fadeOut(5000);
            flag = false
        }
        else if(password == "")
        {
            $("#login_password_error").fadeIn(1000);
            $("#login_password_error").fadeOut(5000);
            flag = false
        }
        else{
            flag = true
        }
        if(flag)
        {
            var formdata = new FormData(this);
            $.ajax({
                type: 'post',
                url: '/login_user',
                data: formdata,
                contentType: false,
                processData: false,
                success: function(data){
                    if(data == "success")
                    {
                        location.reload();
                    }else{
                        alert("Please Create Your Account!");
                        window.location.href = "register";
                    }
                }
            })
        }
    })
});