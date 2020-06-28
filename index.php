<?
include("includes/header.php");
?>
    <div class="user_details column">
            <a href="#"> <img src="<? echo $user['profile_pic'];?>" /></a>

            <div class="user_details_left_right">
            <a href="#">
            <?
                echo($user['first_name'] . " " . $user['last_name']);
            ?></a>
            <br>
            <? echo("Posts: " . $user['num_posts']. "<br>");
            echo("Likes: " . $user['num_likes']); ?>
        </div>
    </div>



    </div> <!-- this is the wrapper tag that's opened in header -->

</body>
</html>