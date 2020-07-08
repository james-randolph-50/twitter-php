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


if(isset($_POST['post_message'])) {

    if(isset($_POST['message_body'])) {
        $body = mysqli_real_escape_string($con, $_POST['message_body']);
        $date  = date("Y-m-d H:i:s");
        $message_obj->sendMessage($user_to, $body, $date);
    }
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
        <?
            if($user_to  != "new") {
                echo("<h4>You and <a href='$user_to'>" . $user_to_obj->getFirstAndLastName() . "</a></h4><hr><br>");
                echo("<div class='loaded_messages'>");
                echo($message_obj->getMessages($user_to));
                echo("</div>");
            }
            else {
                echo("<h4>New Message</h4>");
            }
        ?>

        <div class="message_post">
            <form action="" method="POST">
                <?
                    if($user_to ==  "new") {
                        echo("Select the friend you'd like to message <br><br>");
                        echo("To: <input type='text' >");
                        echo("<div class='results'></div>");
                    }
                    else {
                        echo("<textarea name='message_body' id='message_textarea' placeholder='Write your message...'></textarea>");
                        echo("<input type='submit' name='post_message' class='info' id='message_submit' value='Send'>");
                    }

                ?>
            
            </form>
        </div>
    
    </div>