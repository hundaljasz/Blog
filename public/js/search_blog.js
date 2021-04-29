$(document).ready(function(){
    $(".search-blog").on('submit',function(e)
    {
        e.preventDefault();
        var value = $("#search").val();
        var flag = null;
        if(value == "")
        {
            $("#search_error").fadeIn(1000);
            $("#search_error").fadeOut(5000);
            $(".modal-body").html(`<b>Please Search Something!</b>`);
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
                url: '/search',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(data)
                {
                    if(data.response == 'success')
                    {
                        $(".modal-body").empty();
                        (data.data).forEach(blogs);
                        form[0].reset();
                        console.log()
                    }
                }
            })
        }
    })

    function blogs(items)
    {
        console.log(items['getuser']['full_name'])

        var blog = `<div class="card-deck">
        <div class="card" style="width:400px">
            <h2 style="padding: 10px;" >${items['name']}</h2>`;
        var picture = $("#url").val();
        if(items['blog_pic'] == "")
        {
            blog+= `<img class="card-img-top" src='${picture}/no_image.png' alt="Card image" style="width:100%">`;
        }
        else
        {
            blog+= `<img class="card-img-top" src="${picture}/${items['blog_pic']}" alt="${items['name']}" style="width:100%">`;
        }
        var content = items['content'];
        var newContent = content.substring(0, 100);
        blog += ` <div class="card-body">
                    <h6 class="card-title">Author: ${ items['getuser']['full_name'] } / 
                    <span class="card-title">Date: ${ items['blog_date'] }</span></h6>
                    <p class="card-text">${ newContent }....</p>
                    <a href="/read/${ items['id'] }" class="btn btn-primary">Read More...</a>
                    </div>
                    </div><br>
                </div>`;

        $(".modal-body").append(blog);
    }
})