<?
include("includes/header.php");
include("includes/classes/User.php");
include("includes/classes/Post.php");

if(isset($_POST['post'])){
    $post = new Post($con, $userLoggedIn);
    $post->submitPost($_POST['post_text'], 'none');
    header("Location:  index.php");
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

    <div class="main_column column">
        <form class="post_form" action="index.php" method="POST">
            <textarea name="post_text" id="post_text" placeholder="Type your post here..."></textarea>
            <input type="submit" name="post" id="post_button" value="Post">
            <hr>
        </form>

        <? 
        $post = new Post($con, $userLoggedIn);
        $post->loadPostsFriends();
        
        ?>
    </div>



    </div> <!-- this is the wrapper tag that's opened in header -->

</body>
</html>