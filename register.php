<? 
require 'config/config.php';
require 'includes/form_handlers/register_handler.php';
require 'includes/form_handlers/login_handler.php';
?>

<html>
<head>
<title>Welcome to Basically Twitter</title>
<link rel="stylesheet" type="text/css" href="assets/css/register_style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="assets/js/register.js"></script>
</head>
<body>

<div class="wrapper">
    <div class="login_box">
        <h1>Basically Twitter</h1>
        <h3>Login or signup</h3>

            <div id="first">
                <form action="register.php" method="POST">
                    <input type="email" name="log_email" placeholder="Email Address" value="<? 
                    if(isset($_SESSION['reg_fname'])) {
                        echo($_SESSION['reg_fname']);
                    }
                    ?>" required>
                    <br>
                    <input type="password" name="log_password" placeholder="Password">
                    <br>
                    <? if(in_array("Email or password was incorrect<br>", $error_array)) echo("Email or password was incorrect<br>"); ?>
                    <input type="submit" name="login_button" value="Login">
                    <br>
                    <a href="#" id="signup" class="signup">Need an account? Register here?</a>
                </form>
            </div>
            
            <div id="second">
                <form action="register.php" method="POST">
                    <input type="text" name="reg_fname" placeholder="First Name" value="<? 
                    if(isset($_SESSION['reg_fname'])) {
                        echo($_SESSION['reg_fname']);
                    } ?>" required>
                    <br>
                    <? if(in_array("First name must be between 2 and 25 characters.<br>", $error_array)) echo("First name must be between 2 and 25 characters.<br>"); ?>


                    <input type="text" name="reg_lname" placeholder="Last Name" value="<? 
                    if(isset($_SESSION['reg_lname'])) {
                        echo($_SESSION['reg_lname']);
                    } ?>" required>
                    <br>
                    <? if(in_array("Last name must be between 2 and 25 characters.<br>", $error_array)) echo("Last name must be between 2 and 25 characters.<br>"); ?>


                    <input type="email" name="reg_email" placeholder="Email" value="<? 
                    if(isset($_SESSION['reg_email'])) {
                        echo($_SESSION['reg_email']);
                    } ?>" required>
                    <br>
                    <input type="email" name="reg_email2" placeholder="Confirm Email" value="<? 
                    if(isset($_SESSION['reg_email2'])) {
                        echo($_SESSION['reg_email2']);
                    } ?>" required>
                    <br>
                    <? if(in_array("Email already in use!<br>", $error_array)) echo("Email already in use!<br>");
                    else if(in_array("Invalid email format<br>", $error_array)) echo("Invalid email format<br>");
                    else if(in_array("Emails don't match.<br>", $error_array)) echo("Emails don't match.<br>"); ?>
                    
                    <input type="password" name="reg_password" placeholder="Password" required>
                    <br>
                    <input type="password" name="reg_password2" placeholder="Confirm Password" required>
                    <br>

                    <? if(in_array("Your passwords do not match<br>", $error_array)) echo("Your passwords do not match<br>");
                    else if(in_array("Your password can only contain english characters or numbers<br>", $error_array)) echo("Your password can only contain english characters or numbers<br>");
                    else if(in_array("Your password must be between 5 and 30 characters<br>", $error_array)) echo("Your password must be between 5 and 30 characters<br>"); ?>
                    <input type="submit" name="register_button" value="Register">
                    <br>

                    <? if(in_array("<span style='color: #14C800;'>You're all set! Go ahead and login!</span>", $error_array)) echo("<span style='color: #14C800;'>You're all set! Go ahead and login!</span>"); ?>
                    <a href="#" id="signin" class="signin">Already have an account? Sign in here.</a>
                </form>
            </div>

        </div>
    </div>
</div>
</body>
</html>