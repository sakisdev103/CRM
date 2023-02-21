$(document).ready(function(){
    //DOM Manipulation

    $("#sidebar").click(function(){
        $(".sidebar-container").show("");
    });

    $("#close-btn").click(function(){
        $(".sidebar-container").hide("");
    });

    $("#clients-trigger").click(function(){
        $(".sidebar-container").hide("");
        $("#custom-content").addClass("custom-content");
        $("#settings").hide();
        $("#clients").show("");
    });

    $(".editInfo").submit(function(e){
        e.preventDefault();
        $(".content-container").hide("");
        $(".modal").show("");
        $.ajax({
            url: './actions/edit.php',
            method: 'POST',
            data: $(this).serialize(),
            error:err=>{
                console.log(err)
            }, 
            success: function(data){
                $(".modal").html(data);
            }
        });
    });

})