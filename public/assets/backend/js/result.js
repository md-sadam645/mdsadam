$(document).ready(function(){
    $(".result-name").on("change",function(){
        if(this.value != "select game name")
        {
            var gameName = this.value;

            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });

            $.ajax({
                type : "post",
                url : "/check-result-time",
                data : {
                    gameName : gameName
                },
                success : function(response){
                    alert(response);
                },
                error : function(err) {
                    console.log('Error!', err);
                }

            });
        }
    });
});