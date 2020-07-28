<?php

include("includes/header.php");

if(isset($_GET['q'])) {
    $query = $_GET['q'];
}
else {
    $query = "";
}
if(isset($_GET['type'])) {
    $type = $_GET['type'];
}
else {
    $type = "name";
}

?>

<div class="main_column column" id="main_column">
    <?php
        if($query == "")
            echo "You must enter something in the search box.";
        else {

            

            // If query contains an underscore, assume user is searching for usernames
            if($type == "username")
            $usersReturnedQuery = mysqli_query($con, "SELECT * FROM users WHERE username LIKE '$query%' AND user_closed='no' LIMIT 8");
            // If there are two words, assume they are first and last names
            else {

                $names = explode(" ", $query);

                if(count($names) == 3)
                $usersReturnedQuery = mysqli_query($con, "SELECT * FROM users WHERE (first_name LIKE '$names[0]%' AND last_name LIKE '$names[2]%') AND user_closed='no'");
                // If query has one word only, search first names or last names
                else if(count($names) == 2)
                    $usersReturnedQuery = mysqli_query($con, "SELECT * FROM users WHERE (first_name LIKE '$names[0]%' AND last_name LIKE '$names[1]%') AND user_closed='no'");
                else 
                    $usersReturnedQuery = mysqli_query($con, "SELECT * FROM users WHERE (first_name LIKE '$names[0]%' OR last_name LIKE '$names[0]%') AND user_closed='no'");
               
            }

            //Check if results were found
            if(mysqli_num_rows($usersReturnedQuery) == 0)
                echo  "Can't find anyone with a " . $type . " like: " .$query;
            else
                echo mysqli_num_rows($usersReturnedQuery) . " results found: <br><br>";


            echo "<p id='grey'>Try searching for:</p>";
            echo "<a href='search.php?q=" . $query ."&type=name'>Names</a>, <a href='search.php?q=" . $query ."&type=username'>Usernames</a><br><br><hr>";

            while($row = mysqli_fetch_array($usersReturnedQuery)) {
                $user_obj = new User($con, $user['username']);

                $button = "";
                $mutual_friends = "";

                if($user['username'] != $row['username']) {

                    //Generate button depending on friendship status
                    if($user_obj->isFriend($row['username']))
                        $button = "<input type='submit' name='" . $row['username'] . "'  class='danger' value='Remove Friend'>";
                    else if($user_obj->didReceiveRequest($row['username']))
                        $button = "<input type='submit' name='" . $row['username'] . "'  class='warning' value='Respond to Request'>";
                    else if($user_obj->didSendRequest($row['username']))
                        $button = "<input class='default' value='Request Sent'>";
                    else
                        $button = "<input type='submit' name='" . $row['username'] . "'  class='success' value='Add Friend'>";

                    $mutual_friends = $user_obj->getMutualFriends($row['username']) . " friends in common";


                    // Button forms

                    
                }
            }
        }

    ?>

</div>