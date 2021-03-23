<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>로그인</title>
	<link rel="stylesheet" type="text/css" href="assets/css/register.css">
</head>
<body>
	<div class="header">
		<h2>로그인</h2>
	</div>
	<form method="post" action="login.php">
		<?php echo display_error(); ?>
		<div class="input-group">
			<label>이메일</label>
			<input type="text" name="email" >
		</div>
		<div class="input-group">
			<label>비밀번호</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_btn">로그인</button>
		</div>
		<p>
			아직 회원이 아니신가요? <a href="register.php">회원가입</a>
		</p>
	</form>
</body>
</html>
