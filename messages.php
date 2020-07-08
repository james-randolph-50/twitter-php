<?
include("includes/header.php");

$message_obj = new Message($con, $userLoggedIn);

if(isset($_GET['u']))
    $user_to = $_GET['u'];
else {
    $user_to = $message_obj->getMostRecentUser();
    if($user_to == false)
        $user_to = 'new';
}

if($user_to != "new")
    $user_to_obj = new User($con, $user_to);

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
        <?
            if($user_to  != "new")
                echo("<h4>You and <a href='$user_to'>" . $user_to_obj->getFirstAndLastName() . "</a></h4><hr><br>");
        ?>
    
    </div>