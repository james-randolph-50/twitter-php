<?
include("../../config/config.php");
include("../classes/User.php");
include("../classes/Notification.php");

$limit = 7; // numb of notifications to load

$notification = new Notification($con, $_REQUEST['userLoggedIn']);
echo($notification->getNotifications($_REQUEST, $limit));

?>