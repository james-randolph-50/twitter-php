<? 
$con = mysqli_connect("localhost", "root", "", "twitter");

if(mysqli_connect_errno()) {
    echo("Failed to connect: " . mysqli_connect_errno());
}
?>


<html>
<head>
<title>Twitter</title></head>
<body>
Hey there php twitter
</body>
</html>