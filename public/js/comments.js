$(document).ready(function(){
    $(".login_first").on('click',function(){
        if(confirm('Please Login First To Add Your Comment! Click Ok To Login'))
        {
            window.location.href = "/login";
        }
    })

    $('#comments_form').on('submit',function(e){
        e.preventDefault();
        var email = $("#mail").val();
        var name = $("#name").val();
        var comment = $("#comment").val();
        var flag = null;
        if(email == "")
        {
            $("#comment_email_error").fadeIn(1000);
            $("#comment_email_error").fadeOut(5000);
            flag = false
        }
        else if(name == "")
        {
            $("#comment_name_error").fadeIn(1000);
            $("#comment_name_error").fadeOut(5000);
            flag = false
        }
        else if(comment == "")
        {
            $("#comment_error").fadeIn(1000);
            $("#comment_error").fadeOut(5000);
            flag = false
        }
        else{
            flag = true
        }

        if(flag)
        {
            var form = $(this);
            $.ajax({
                type: 'post',
                url: '/comment',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(data)
                {
                    if(data.response == "success")
                    {
                        form[0].reset();
                        $(".comments").append(`
                            <div class="container mt-3">
                            <div class="media border p-3">
                            <div class="media-body">
                                <h4>${data.data['username']} <small><i>Posted on ${data.data['created_at']}</i></small></h4>
                                <p>${data.data['comment']}</p>      
                            </div>
                            </div>
                        </div>`)
                    }

                }
            })
        }
    })
})