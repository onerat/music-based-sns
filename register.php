<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>회원가입</title>
  <link rel="stylesheet" href="assets/css/register.css"/>
</head>
<body>
<div class="header">
	<h2>회원가입</h2>
</div>
<form method="post" action="register.php">
	<div class="input-group">
		<label>이름</label>
		<input type="text" name="username" value="<?php echo $username; ?>"
	</div>
	<div class="input-group">
		<label>이메일</label>
		<input type="email" name="email" value="<?php echo $email; ?>">
	</div>
	<div class="input-group">
		<label>비밀번호</label>
		<input type="password" name="password_1">
	</div>
	<div class="input-group">
		<label>비밀번호 확인</label>
		<input type="password" name="password_2">
	</div>
	<div class="input-group">
		<button type="submit" class="btn" name="register_btn">회원가입</button>
	</div>
	<p>
		이미 가입하셨나요? <a href="login.php">로그인</a>
	</p>
</form>
</body>
</html>
