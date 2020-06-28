<?
include("includes/header.php");

if(isset($_GET['profile_username'])) {
    $username = $_GET['profile_username'];
    $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$username'");
    $user_array = mysqli_fetch_array($user_details_query);

    $num_friends = (substr_count($user_array['friend_array'], ",")) - 1;
}
?>

    <div class="profile_left">
        <img src="<? echo($user_array['profile_pic']);?>" alt="profile picture">
        
        <div class="profile_info">
            <p><? echo("Posts: " . $user_array['num_posts']);?></p>
            <p><? echo("Likes: " . $user_array['num_likes']);?></p>
            <p><? echo("Friends: " . $num_friends);?></p>
        </div>
    </div>

    <div class="main_column column">
       <? echo($username); ?>
    </div>



    </div> <!-- this is the wrapper tag that's opened in header -->

</body>
</html>