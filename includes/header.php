<? 
require 'config/config.php';
include("includes/classes/User.php");
include("includes/classes/Post.php");
include("includes/classes/Message.php");

if(isset($_SESSION['username'])) {
    $userLoggedIn = $_SESSION['username'];
    $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$userLoggedIn'");
    $user = mysqli_fetch_array($user_details_query);
}
else {
    header("Location: register.php");
}

?>


<html>
<head>
<title>Twitter</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/bootbox.min.js"></script>
<script src="assets/js/twitter.js"></script>
<script src="assets/js/jcrop_bits.js"></script>
<script src="assets/js/jquery.Jcrop.js"></script>


<link rel="stylesheet" href="assets/css/jquery.Jcrop.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="assets/css/style.css">

</head>
<body>

<div class="top_bar">
    <div class="logo">
        <a href="index.php">Twitter</a>
    </div>

    <nav>
        <a href="<? echo($userLoggedIn); ?>">
            <? echo($user['first_name']); ?>
        </a>
        <a href="index.php">Home</a>
        <a href="javascript:void(0);" onclick="getDropdownData('<? echo $userLoggedIn; ?>', 'message')">Messages</a>
        <a href="requests.php">Requests</a>
        <a href="#">Settings</a>
        <a href="includes/handlers/logout.php">Logout</a>
    </nav>

    <div class="dropdown_data_window" style="height:0px;">
        <input type="hidden" id="dropdown_data_type" value="">
    </div>

</div>

<script>
        var userLoggedIn = '<? echo($userLoggedIn); ?>';

        $(document).ready(function() {

            $(window).scroll(function() {
                var inner_height = $('.dropdown_data_window').innerHeight(); // div containing data
                var scroll_top = $('.dropdown_data_window').scrollTop();
                var page = $('.dropdown_data_window').find('.nextPageDropDownData').val();
                var noMoreData = $('.dropdown_data_window').find('.noMoreDropdownData').val();

                if ((scroll_top + inner_height >= $('.dropdown_data_window')[0].scrollHeight) && noMoreData == 'false') {

                    var pageName; // holds name of page to send ajax request to
                    var type = $('#dropdown_data_type').val();


                    if(type == 'notification')
                        pageName = "ajax_load_notifications.php";
                    else if (type == 'message')


                    var ajaxReq = $.ajax({
                        url: "includes/handlers/ajax_load_posts.php",
                        type: "POST",
                        data: "page=" + page + "&userLoggedIn=" + userLoggedIn,
                        cache:false,

                        success: function(response){
                            $('.posts_area').find('.nextPage').remove(); // removes current .nextpage
                            $('.posts_area').find('.noMorePosts').remove(); // removes current .nextpage
                            $('#loading').hide();
                            $('.posts_area').append(response);
                        }
                    });

                } // End if

                return false;
            }); // End (window).scroll(fnction())


        });
    </script>

<div class="wrapper"><!-- closed in index -->    