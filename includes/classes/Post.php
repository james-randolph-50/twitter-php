<?
class Post {
    private $user_obj;
    private $con;

    public function __construct($con, $user){
        $this->con = $con;
        $this->user_obj = new User($con, $user);
    }

    public function submitPost($body, $user_to) {
        $body = strip_tags($body); // removes html tags
        $body = mysqli_real_escape_string($this->con, $body);
        $check_empty = preg_replace('/\s+/', '', $body); // deletes all spaces

        if($check_empty != "") {

            //Current date and time
            $date_added = date("Y-m-d H:i:s");
            // Get username
            $added_by = $this->user_obj->getUsername();

            // If user is on own profile, user_to is 'none'
            if($user_to == $added_by) {
                $user_to = "none";
            }



        }
    }


}

?>