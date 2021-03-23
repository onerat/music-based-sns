<?php
include "functions.php";

$email = $_GET['email'];
$do = $_GET['do'];

switch ($do){
    case "follow":
        follow_user($_SESSION['user']['email'],$email);
        $msg = "You have followed a user!";
    break;

    case "unfollow":
        unfollow_user($_SESSION['user']['email'],$email);
        $msg = "You have unfollowed a user!";
    break;

}
$_SESSION['message'] = $msg;

header("Location:following.php");
?>
