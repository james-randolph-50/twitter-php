$(document).ready(function() {

    // on click signup, hide login and show register form
    $("#signup").click(function() {
        $("#first").slideUp("medium", function(){
            $("#second").slideDown("medium");
        });
    });

    //opposite
    $("#signin").click(function() {
        $("#second").slideUp("medium", function(){
            $("#first").slideDown("medium");
        });
    });

});