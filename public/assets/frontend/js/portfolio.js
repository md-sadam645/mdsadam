$(document).ready(function(){
    $(".portfolio-con").click(function(){
        var id = $(this).attr('contentid');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $.ajax({
            url:"/portfolioData",
            type:"POST",
            data:{
                id:id,
            },
            dataType: 'json',
            success: function(response)
            {
                // alert();
                $("#slider-img").html(" ");
                // console.log(response);
                $("#m-cat").html(response.category);
                $("#project-link").attr("href",response.plink);
                $("#m-name").html(response.pname);
                $("#p-desc").html(response.description);

                var img = JSON.parse(response.slider);
                var imgOne = `<div class="carousel-item active">
                    <img src="`+img[0]+`" class="d-block w-100" alt="`+img[0]+`">
                  </div>`;

                $("#slider-img").append(imgOne);
                img.splice(0, 1);
                img.forEach(function(data)
                {
                    var imgs = `<div class="carousel-item">
                        <img src="`+data+`" class="d-block w-100" alt="`+data+`">
                    </div>`;

                    $("#slider-img").append(imgs);
                });
            },
            error : function(err)
            {
                console.log(err);
            }
        });
    });
});