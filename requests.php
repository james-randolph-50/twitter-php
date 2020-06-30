<?
include("includes/header.php");
?>

<div class="main_column column" id="main_column">

    <h4>Friend Requests</h4>

    <?
    $query = mysqli_query($con, "SELECT * FROM friend_requests WHERE user_to='$userLoggedIn'");
    if(mysqli_num_rows($query) == 0) {
        echo("You have no friend requests");
    }
    else {
        while($row = mysqli_fetch_array($query)) {
            $user_from = $row['user_from'];
            $user_from_obj = new User($con, $user_from);

            echo($user_from_obj->getFirstAndLastName() . " sent you a friend request.");

            $user_from_friend_array = $user_from_obj->getFriendArray();

            if(isset($_POST['accept_request'] . $user_from)) {
                
            }

            if(isset($_POST['ignore_request'] . $user_from)) {

            }
        }
    }
    
    ?>
</div>