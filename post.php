<?php
include("includes/header.php");

if(isset($_GET['id'])) {
    $id = $_GET['id'];
}
else  {
    $id = 0;
}

?>

<div class="user_details column">
            <a href="<? echo($userLoggedIn); ?>"> <img src="<? echo $user['profile_pic'];?>" /></a>

            <div class="user_details_left_right">
            <a href="<? echo($userLoggedIn); ?>">
            <?
                echo($user['first_name'] . " " . $user['last_name']);
            ?></a>
            <br>
            <? echo("Posts: " . $user['num_posts']. "<br>");
            echo("Likes: " . $user['num_likes']); ?>
        </div>
    </div>

    <div class="main_column column" id="main_column">

        <div class="posts_area">
            <?
                $post = new Post($con, $userLoggedIn);
                $post->getSinglePost($id);
            ?>
    </div>

    </div>