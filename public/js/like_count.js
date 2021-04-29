$(document).ready(function(){
    
    $(".add_like").on('click',function()
    {
        var blogID =$(this).attr("data-ID");
        // $.ajax({
        //     url: '/like',
        //     method: 'get',
        //     data: {like: blogID},
        //     success: function(data)
        //     {
        //         if(data.response != "fail")
        //         {
        //             $("#blog_likes").text(data.response['likes'])
        //             $(".add_like").addClass("remove_like");
        //             $(".remove_like").removeClass("add_like");
        //         }
        //     }
        // })
    })

    $(".remove_like").on('click',function(){
        var blogID = $(this).attr("data-ID");
        $.ajax({
            url: '/remove_like',
            method: 'get',
            data: {like: blogID},
            success: function(data)
            {
                if(data.response != "fail")
                {
                    $("#blog_likes").text(data.response['likes']);
                    $(".remove_like").addClass("add_like");
                    $(".add_like").removeClass("remove_like");
                }
            }
        })
    })
})