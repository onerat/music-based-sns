<?php
include("./dbconn.php");  // DB연결을 위한 같은 경로의 dbconn.php를 인클루드합니다.

$sender = $_SESSION['user']['email'];
$me_send_datetime = date('Y-m-d H:i:s', time()); // 메모 작성일

$recv_list = explode(',', trim($_POST['receiver']));
$str_name_list = '';

$error_list = array();
$member_list = array();
for ($i=0; $i<count($recv_list); $i++) {
	$sql = " SELECT email, username FROM users WHERE email = '{$recv_list[$i]}' ";
	$result = mysqli_query($db, $sql);
	$row = mysqli_fetch_assoc($result);
	if ($row) { // 해당 회원이 존재한다면
		$member_list['email'][]   = $row['email'];
		$member_list['name'][] = $row['username'];
	} else { // 해당 회원이 존재하지 않는다면
		$error_list[]   = $recv_list[$i];
	}
}

$error_msg = implode(",", $error_list);

if ($error_msg) {
	echo "<script>alert('회원아이디 {$error_msg} 은(는) 존재하지 않는 회원아이디 입니다.\\n쪽지를 발송하지 않았습니다.');window.close();</script>";
	exit;
}

for ($i=0; $i<count($member_list['email']); $i++) {
    $receiver = $member_list['email'][$i];
    // 쪽지 INSERT
    $sql = " INSERT INTO memo
				SET	me_recv_mb_id		= '$receiver',
					me_send_mb_id			= '$sender',
					me_send_datetime		= '$me_send_datetime',
					me_memo				= '{$_POST['me_memo']}'	";
    $result = mysqli_query($db, $sql);
}

mysqli_close($db); // 데이터베이스 접속 종료

if ($member_list) {
    $str_name_list = implode(',', $member_list['name']);
	echo "<script>alert('{$str_name_list} 님께 쪽지를 전달하였습니다.');window.close();</script>";
	exit;
} else {
	echo "<script>alert('회원아이디 오류 같습니다.');window.close();</script>";
	exit;
}
?>
