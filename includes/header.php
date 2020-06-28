<? 
require 'config/config.php';

if(isset($_SESSION['username'])) {
    $userLoggedIn = $_SESSION['username'];
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
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>

<div class="top_bar">
    <div class="logo">
        <a href="index.php">Twitter</a>
    </div>
</div>
    