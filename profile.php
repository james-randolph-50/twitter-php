<?
include("includes/header.php");


if(isset($_GET['profile_username'])) {
    $username = $_GET['profile_username'];
    $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$username'");
    $user_array = mysqli_fetch_array($user_details_query);

    $num_friends = (substr_count($user_array['friend_array'], ",")) - 1;
}

    if(isset($_POST['remove_friend'])) {
        $user = new User($con, $userLoggedIn);
        $user->removeFriend($username);
    }

    if(isset($_POST['add_friend'])) {
        $user = new User($con, $userLoggedIn);
        $user->sendRequest($username);
    }

    if(isset($_POST['respond_request'])) {
        header("Location: requests.php");
    }


?>

<style>
.wrapper {
    margin: 0;
    padding: 0;
}
</style>

    <div class="profile_left">
        <img src="<? echo($user_array['profile_pic']);?>" alt="profile picture">
        
        <div class="profile_info">
            <p><? echo("Posts: " . $user_array['num_posts']);?></p>
            <p><? echo("Likes: " . $user_array['num_likes']);?></p>
            <p><? echo("Friends: " . $num_friends);?></p>
        </div>

        <form action="<?echo($username);?>" method="POST">
            <? 
                $profile_user_obj = new User($con, $username); 
            
                if($profile_user_obj->isClosed()) {
                    header("Location: user_closed.php");
                }

                $logged_in_user_obj = new User($con, $userLoggedIn);
                
                if($userLoggedIn != $username) {

                    if($logged_in_user_obj->isFriend($username)) {
                        echo('<input type="submit" name="remove_friend" class="danger" value="Remove Friend"><br>');
                    }
                    else if ($logged_in_user_obj->didReceiveRequest($username)) {
                        echo('<input type="submit" name="respond_request" class="warning" value="Respond to Request"><br>');
                    }
                    else if ($logged_in_user_obj->didSendRequest($username)) {
                        echo('<input type="submit" name="" class="default" value="Request Sent"><br>');
                    }
                    else {
                        echo('<input type="submit" name="add_friend" class="success" value="Add Friend"><br>');
                    }

                } // close if

            ?>

        </form>
        <input type="submit" class="info" data-toggle="modal" data-target="#post_form" value="Post Something">

    </div>

    <div class="main_column column">
       <? echo($username); ?>

    </div>


<!-- Modal -->
<div class="modal fade" id="post_form" tabindex="-1" role="dialog" aria-labelledby="postModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Post Something</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Post something on the user's profile page and feed for your friends to see.</p>

        <form action="" class="profile_post" method="POST">
            <div class="form-group">
                <textarea class="form-control" name="post_body" id="" cols="30" rows="10"></textarea>
                <input type="hidden" name="user_from" value="<? echo($userLoggedIn);?>">
                <input type="hidden" name="user_to" value="<? echo($username);?>">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Post</button>
      </div>
    </div>
  </div>
</div>



    </div> <!-- this is the wrapper tag that's opened in header -->

</body>
</html>