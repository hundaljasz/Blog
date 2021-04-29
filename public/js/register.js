$(document).ready(function(){
    $("#profile").on("change",function() {
        var pattern = /(.jpeg|.png|.jpg)$/;
        var profile = $("#profile").val();
        if(!pattern.test(profile))
        {
            alert("please Upload JPEG or PNG File only")
            $("#profile").val(null);
        }
    })
    $('.register_form').on('submit',function(e){
        e.preventDefault();
        var first_name = $("#first_name").val();
        var last_name = $("#last_name").val();
        var email = $("#email").val();
        var password = $("#password").val();
        var confirm_pass = $("#confirm_password").val();

        var flag = null;
        if(first_name == "")
        {
            $("#first_name_error").fadeIn(1000);
            $("#first_name_error").fadeOut(5000);
            flag = false
        }
        else if(last_name == "")
        {
            $("#last_name_error").fadeIn(1000);
            $("#last_name_error").fadeOut(5000);
            flag = false 
        }
        else if(email == "")
        {
            $("#email_error").fadeIn(1000);
            $("#email_error").fadeOut(5000);
            flag = false  
        }
        else if(password == "")
        {
            $("#password_error").fadeIn(1000);
            $("#password_error").fadeOut(5000);
            flag = false 
        }
        else if(confirm_pass == "")
        {
            $("#confirm_password_error").fadeIn(1000);
            $("#confirm_password_error").fadeOut(5000);
            flag = false  
        }
       
        else{
            flag = true
        }

        if(flag)
        {
            var formdata = new FormData(this);
            var form = $(this);
            $.ajax({
                type: 'post',
                url: '/register_user',
                data: formdata,
                contentType:false,
                processData: false,
                success: function(data)
                {
                    if(!($.isEmptyObject(data.errors)))
                        {
                            printErrorMsg(data.errors);
                        }
                    if(data == "success")
                    {
                        form[0].reset();
                        window.location.href = 'login';
                    }
                    else 
                    {
                        alert('Something Went Wrong, Please Try Again Later or Try Contacting The Admin');
                    }
                }
            })
        }
    })

    function printErrorMsg(msg)
    {
        $.each( msg, function( key, value ) {
              $('.'+key+'_error').text(value).fadeIn(1000);
              $('.'+key+'_error').fadeOut(5000);
            }); 
    }
})