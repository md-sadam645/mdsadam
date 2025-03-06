$(document).ready(function () {
    // Click event for adding elements
    $(".desig-add-el").click(function () {
        var el = `
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="designation" name="designation[]" placeholder="Enter Your Designation" required>
                <span class="input-group-text desig-remove-el" style="cursor:pointer;"><i class="fa fa-minus"></i></span>
            </div>
            `;
        $("#desig-con").append(el);
    });

    // Click event for removing elements
    $(document).on('click', '.desig-remove-el', function () {
        $(this).closest('.input-group').remove();
    });

    $(".skill-add-el").click(function () {
        var el = `
            <div class="input-group mt-3">
                <input type="text" class="form-control" id="skill" name="skill[]" placeholder="Enter Your Skill" required>
                <span class="input-group-text skill-remove-el" style="cursor:pointer;"><i class="fa fa-minus"></i></span>
            </div>
            `;
        $("#skill-con").append(el);
    });

    $(document).on('click', '.skill-remove-el', function () {
        $(this).closest('.input-group').remove();
    });
});

// service add remove
$(document).ready(function () {
    // Click event for adding elements
    $(".serviceone-add-el").click(function () {
        var el = `
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="serviceOne" name="serviceOne[]" placeholder="Enter services" required>
                <span class="input-group-text serviceone-remove-el" style="cursor:pointer;"><i class="fa fa-minus"></i></span>
            </div>
            `;
        $("#serviceOne-con").append(el);
    });

    // Click event for removing elements
    $(document).on('click', '.serviceone-remove-el', function () {
        $(this).closest('.input-group').remove();
    });

    $(".servicetwo-add-el").click(function () {
        var el = `
            <div class="input-group mt-3">
                <input type="text" class="form-control" id="servicetwo" name="serviceTwo[]" placeholder="Enter services" required>
                <span class="input-group-text servicetwo-remove-el" style="cursor:pointer;"><i class="fa fa-minus"></i></span>
            </div>
            `;
        $("#servicetwo-con").append(el);
    });

    $(document).on('click', '.servicetwo-remove-el', function () {
        $(this).closest('.input-group').remove();
    });
});

$(document).ready(function(){
    // slider image validation
    $("#image").on("change",function(){
        var input = this;

        if(input.files[0].size<2000000)
        {
            var reader = new FileReader();
            //Read the contents of Image File.
            reader.readAsDataURL(input.files[0]);
            reader.onload = function(e) 
            {
                var image = new Image();
                image.src = e.target.result;
                image.onload = function()
                {
                    var height = this.height;
                    var width = this.width;
                    if(height == 960 && width == 700)
                    {
                        $(".slider-btn").removeAttr("disabled");
                        $(".slider-img-error").html("( 700 * 960 )");
                        $(".slider-img-error").removeClass("text-danger animate__animated animate__flash animate_infinite");
                        $(".slider-img-error").addClass("text-success");
                    }
                    else
                    {
                        $(".slider-img-error").html("( 700 * 960 )");
                        $(".slider-img-error").addClass("text-danger animate__animated animate__flash animate_infinite");
                        $(".slider-btn").attr("disabled","disabled");
                    }
                };
            };
        }
        else
        {
            $(".slider-img-error").html(" Image less than 2 MB");
            $(".slider-img-error").addClass("text-danger animate__animated animate__flash animate_infinite");
            $(".slider-btn").attr("disabled","disabled");
        }
    });

    //Contact detail image validation
    $("#cimage").on("change",function(){
        var input = this;

        if(input.files[0].size<400000)
        {
            var reader = new FileReader();
            //Read the contents of Image File.
            reader.readAsDataURL(input.files[0]);
            reader.onload = function(e) 
            {
                var image = new Image();
                image.src = e.target.result;
                image.onload = function()
                {
                    var height = this.height;
                    var width = this.width;
                    if(height == 288 && width == 460)
                    {
                        $(".slider-btn").removeAttr("disabled");
                        $(".slider-img-error").html("(460 * 288 )");
                        $(".slider-img-error").removeClass("text-danger animate__animated animate__flash animate_infinite");
                        $(".slider-img-error").addClass("text-success");
                    }
                    else
                    {
                        $(".slider-img-error").html("( 460 * 288 )");
                        $(".slider-img-error").addClass("text-danger animate__animated animate__flash animate_infinite");
                        $(".slider-btn").attr("disabled","disabled");
                    }
                };
            };
        }
        else
        {
            $(".slider-img-error").html(" Image less than 400 kb");
            $(".slider-img-error").addClass("text-danger animate__animated animate__flash animate_infinite");
            $(".slider-btn").attr("disabled","disabled");
        }
    });
});