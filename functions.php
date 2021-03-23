<?php

// connect to database
include "dbconn.php";
// variable declaration
$username = "";
$email    = "";
$errors   = array();

// initialize variables
$id = 0;
$update = false;
// call the register() function if register_btn is clicked
if (isset($_POST['register_btn'])) {
	register();
}

// REGISTER USER
function register(){
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $username, $email;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$username    =  e($_POST['username']);
	$email       =  e($_POST['email']);
	$password_1  =  e($_POST['password_1']);
	$password_2  =  e($_POST['password_2']);

	// form validation: ensure that the form is correctly filled
	if (empty($username)) {
		array_push($errors, "이름은 필수 정보입니다.");
	}
	if (empty($email)) {
		array_push($errors, "이메일은 필수 정보입니다.");
	}
	if (empty($password_1)) {
		array_push($errors, "비밀번호는 필수 정보입니다.");
	}
	if ($password_1 != $password_2) {
		array_push($errors, "비밀번호가 일치하지 않습니다.");
	}

	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$password = md5($password_1);//encrypt the password before saving in the database

		if (isset($_POST['user_type'])) {
				$user_type = e($_POST['user_type']);
				$query = "INSERT INTO users (username, email, user_type, password)
						  VALUES('$username', '$email', '$user_type', '$password')";
				mysqli_query($db, $query);
				$_SESSION['success']  = "새 사용자를 등록하였습니다.";
				header('location: login.php');
			}else{
				$query = "INSERT INTO users (username, email, user_type, password)
						  VALUES('$username', '$email', 'user', '$password')";
				mysqli_query($db, $query);

				// get id of the created user
				$logged_in_user_id = mysqli_insert_id($db);

				$_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
				$_SESSION['success']  = "로그인 되었습니다.";
				header('location: index.php');
			}
		}
	}

	// return user array from their id
	function getUserById($id){
		global $db;
		$query = "SELECT * FROM users WHERE id=" . $id;
		$result = mysqli_query($db, $query);

		$user = mysqli_fetch_assoc($result);
		return $user;
	}

	// escape string
	function e($val){
		global $db;
		return mysqli_real_escape_string($db, trim($val));
	}

	function display_error() {
		global $errors;

		if (count($errors) > 0){
			echo '<div class="error">';
				foreach ($errors as $error){
					echo $error .'<br>';
				}
			echo '</div>';
		}
	}

	function isLoggedIn()
{
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		return false;
	}
}

// log user out if logout button clicked
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: login.php");
}

// call the login() function if register_btn is clicked
if (isset($_POST['login_btn'])) {
	login();
}

// LOGIN USER
function login(){
	global $db, $email, $errors;

	// grap form values
	$email = e($_POST['email']);
	$password = e($_POST['password']);

	// make sure form is filled properly
	if (empty($email)) {
		array_push($errors, "이메일을 입력해주세요.");
	}
	if (empty($password)) {
		array_push($errors, "비밀번호를 입력해주세요.");
	}

	// attempt login if no errors on form
	if (count($errors) == 0) {
		$password = md5($password);

		$query = "SELECT * FROM users WHERE email='$email' AND password='$password' LIMIT 1";
		$results = mysqli_query($db, $query);

		$useremail= $row[email];
		if (mysqli_num_rows($results) == 1) { // user found
			// check if user is admin or user
			$logged_in_user = mysqli_fetch_assoc($results);
			if ($logged_in_user['user_type'] == 'admin') {

				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location: home.php');
			}else{
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";

				header('location: index.php');
			}
		}else {
			array_push($errors, "아이디 혹은 비밀번호 오류입니다.");
		}
	}
}


// ...
function isAdmin()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
		return true;
	}else{
		return false;
	}
}

if(isset($_POST['comment_btn']))
{
	$cover     	= $_POST['cover'];
	$useremail  = $_SESSION['user']['email'];
	$username 	= $_SESSION['user']['username'];
	$title 		=  e($_POST['title']);
	$artist 	=  e($_POST['artist']);
	$comment  =  e($_POST['comment']);
	$regist_date = date("Ymd");
	// form validation: ensure that the form is correctly filled
	if (empty($title)) {
		array_push($errors, "제목 필수 정보입니다.");
	}
	if (empty($artist)) {
		array_push($errors, "가수는 필수 정보입니다.");
	}
	if (empty($comment)) {
		array_push($errors, "코멘트는 필수 정보입니다.");
	}

				$query = "INSERT INTO tempdiary (title, artist, email, username, comment, registdate, album_cover)
							VALUES('$title', '$artist', '$useremail', '$username', '$comment', $regist_date, '$cover')";
				mysqli_query($db, $query);


				header('location: music.php');
}

if(isset($_POST['memo_btn1']))
{
	$receiver  = e($_POST['receiver']);
	$sender 	 = $_SESSION['user']['email'];
	$memo  =  e($_POST['memo']);
	$send_date = date("Ymd");


$query = "INSERT INTO memo (me_recv_mb_id, me_send_mb_id, me_send_datetime, me_read_datetime, me_memo)
					VALUES('$receiver',  '$sender', '$send_date', '$memo' )";
	mysqli_query($db, $query);


			header('location: index.php');
}

if(isset($_POST['memo_btn2']))
{
	$receiver  = e($_POST['receiver']);
	$sender 	 = $_SESSION['user']['email'];
	$memo  =  e($_POST['memo']);
	$send_date = date("Ymd");


$query = "INSERT INTO memo (me_recv_mb_id, me_send_mb_id, me_send_datetime, me_read_datetime, me_memo)
					VALUES('$receiver',  '$sender', '$send_date', '$memo' )";
	mysqli_query($db, $query);


			header('location: user.php');
}

function show_users(){
		  global $db;
			$users = array();
	    $sql = "SELECT email, username FROM users";
	    $result = mysqli_query($db, $sql);

	    while ($data = mysqli_fetch_object($result)){
	        $users[$data->email] = $data->username;
	    }
	    return $users;
}

function following($userid){
		global $db;

    $users = array();

    $sql = "SELECT DISTINCT user_id FROM followers
            WHERE follower_id = '$userid'";
    $result = mysqli_query($db, $sql);

    while($data = mysqli_fetch_object($result)){
        array_push($users, $data->user_id);

    }

    return $users;

}

function check_count($first, $second){
		global $db;

    $sql = "SELECT count(*) FROM followers
            WHERE user_id='$second' AND follower_id='$first'";
    $result = mysqli_query($db, $sql);

    $row = mysqli_fetch_row($result);
    return $row[0];

}

function follow_user($me,$them){
		global $db;

    $count = check_count($me,$them);

    if ($count == 0){
        $sql = "INSERT INTO followers (user_id, follower_id)
                VALUES ('$them','$me')";

        $result = mysqli_query($db, $sql);
    }
}


function unfollow_user($me,$them){
		global $db;
    $count = check_count($me,$them);

    if ($count != 0){
        $sql = "DELETE FROM followers
                WHERE user_id='$them' AND follower_id='$me'
                LIMIT 1";

        $result = mysqli_query($db, $sql);
    }
}

function show_posts($userid,$limit=0){
    $posts = array();

    $user_string = implode(',', $userid);
    $extra =  " and id in ($user_string)";

    if ($limit > 0){
        $extra = "limit $limit";
    }else{
        $extra = '';
    }

    $sql = "SELECT user_id,body, stamp FROM posts
        WHERE user_id IN ($user_string)
        ORDER BY stamp DESC $extra";
    echo $sql;
    $result = mysqli_query($db, $sql);

    while($data = mysqli_fetch_object($result)){
        $posts[] = array(   'stamp' => $data->stamp,
                            'userid' => $data->user_id,
                            'body' => $data->body
                    );
    }
    return $posts;

}

// CRUD

//create
	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$address = $_POST['address'];

		mysqli_query($db, "INSERT INTO info (name, address) VALUES ('$name', '$address')");
		$_SESSION['message'] = "Address saved";
		header('location: user.php');
	}

//update

  if (isset($_POST['update'])) {
		$comment = $_POST['comment'];
		$email = $_SESSION['user']['email'];
		$id = $_POST['id'];
		mysqli_query($db, "UPDATE tempdiary SET comment='$comment' WHERE email='$email' AND num=$id");
		$_SESSION['message'] = "Comment updated!";
		header('location: user.php');
}

//delete
if (isset($_GET['del'])) {
	$email  = $_SESSION['user']['email'];
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM tempdiary WHERE email='$email' AND num=$id");
	$_SESSION['message'] = "Comment deleted!";
	header('location: user.php');
}
