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

    <div class="dropdown_data_window">
        <input type="hidden" id="dropdown_data_type" value="">
    </div>

</div>

<div class="wrapper"><!-- closed in index -->    