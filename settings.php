<?php
include("includes/header.php");
include("includes/settings_handler.php");

?>

<div class="main_column column">

    <h4 class="">Account Settings</h4>
    <? echo "<img src='" . $user['profile_pic'] . "' id='small_profile_pics'>"; ?>
    <br>
    <a href="upload.php">Upload new profile picture</a><br><br><br>

    Modify the values and click 'Update Details'

    <form action="settings.php" method="POST">
        First Name: <input type="text" name="first_name" value="<? echo $user['first_name'] ?>"><br>
        Last Name: <input type="text" name="last_name" value="<? echo $user['last_name'] ?>"><br>
        Email: <input type="text" name="email" value="<? echo $user['email'] ?>"><br>
        <input type="submit" name="update_details" id="save_details" value="Update Details"><br>

    </form>

    <h4>Change Password</h4>
    <form action="settings.php" method="POST">
        Old Password: <input type="password" name="old_password"><br>
        New Password: <input type="password" name="new_password_1"><br>
        New Password Confirmation: <input type="password" name="new_password_2"><br>
        <input type="submit" name="update_password" id="close_account" value="update password"><br>

    </form>

    <h4>Close Account</h4>
    <form action="settings.php">
        <input type="submit" name="close_account" id="close_account" value="Close Account">
    </form>

</div>