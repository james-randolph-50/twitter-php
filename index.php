<? 
$con = mysqli_connect("localhost", "root", "", "twitter");

if(mysqli_connect_errno()) {
    echo("Failed to connect: " . mysqli_connect_errno());
}

$query = mysqli_query($con, "INSERT INTO test VALUES(NULL, 'testing name')");
?>


<html>
<head>
<title>Twitter</title></head>
<body>
Hey there php twitter
</body>
</html>