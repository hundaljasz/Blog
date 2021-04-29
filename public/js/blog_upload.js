$(document).ready(function(){

    $("#blog_picture").on("change",function() {
        var pattern = /(.jpeg|.png|.jpg)$/;
        var profile = $("#blog_picture").val();
        if(!pattern.test(profile))
        {
            alert("please Upload JPEG or PNG File only")
            $("#blog_picture").val(null);
        }
    })

    var curday = function(sp){
        today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1; //As January is 0.
        var yyyy = today.getFullYear();
        
        if(dd<10) dd='0'+dd;
        if(mm<10) mm='0'+mm;
        return (yyyy+sp+mm+sp+dd);
        };
        $("#date").val(curday('-'))
        
    $("#new_blog_form").on('submit',function(e){
        e.preventDefault();
        var title = $("#title").val();
        var email = $("#email").val();
        var category = $("#category").val();
        var blog = $("#blog").val();

        var flag = null;
        if(title == "")
        {
            $("#blog_name_error").fadeIn(1000);
            $("#blog_name_error").fadeOut(5000);
            flag = false
        }
        else if(email == "")
        {
            $("#blog_email_error").fadeIn(1000);
            $("#blog_email_error").fadeOut(5000);
            flag = false
        }
        else if(category == "")
        {
            $("#blog_category_error").fadeIn(1000);
            $("#blog_category_error").fadeOut(5000);
            flag = false
        }
        else if(blog == "")
        {
            $("#blog_error").fadeIn(1000);
            $("#blog_error").fadeOut(5000);
            flag = false 
        }
        else{
            flag = true
        }

        if(flag)
        {
            var formdata = new FormData(this);
            var blog_form = $(this);
            $.ajax({
                type: 'post',
                url: '/add_blog',
                data: formdata,
                contentType: false,
                processData: false,
                success: function(data)
                {
                    if(data.response == "success")
                    {
                        alert('Blog Added Successfully');
                        blog_form[0].reset();
                        window.location.href = '/';
                    }
                    else
                    {
                        alert('Something Went Wrong, Please Try Again Later');
                    }
                }
            })
        }
    })
})