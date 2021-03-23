<?php
include "dbconn.php";  // DB연결을 위한 같은 경로의 dbconn.php를 인클루드합니다.
include "functions.php";

if (isset($_GET['edit'])) {
	$id = $_GET['edit'];
	$update = true;
	$record = mysqli_query($db, "SELECT comment FROM tempdiary WHERE num=$id");

	if (count($record) == 1 ) {
		$n = mysqli_fetch_array($record);
		$comment = $n['comment'];
	}
}

$cover = $_GET['cover'];
$title = $_GET['title'];
$artist = $_GET['artist'];
?>
<html>
<head>
	<title>코멘트</title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
	<link href="../assets/css/toolkit.css" rel="stylesheet">

	<link href="../assets/css/application.css" rel="stylesheet">
</head>
<body id="comment">
	<!-- 코멘트 시작 -->
	<div>

		<form name="comment" action="comment-write.php" onsubmit="return fmemoform_submit(this);" method="post" enctype="multipart/form-data">
		<center>
			<div>
			<table>
			<tbody>
				<tr>
					<td>
						<span class="img-div">
							<div class="text-center img-placeholder"  onClick="triggerClick()">
							</div>
							<img name="cover" src="<?php echo 'cover/' . $cover ?>" width="120" height="120" onClick="triggerClick()" id="profileDisplay">
						</span></br>
					</td>
				</tr>
		<center>	<tr>
			<td>
					<input type="text" name="title" value="<?php echo $title ?>" id="title" readonly></br>
				</td>
			</tr>
		</center>
      <tr>
        <td>
          <input type="text" name="artist" value="<?php echo $artist ?>"id="artist"  readonly></br>
        </td>
      </tr>
			<tr>
				<td><textarea rows="15" cols="75" name="comment" value="<?php echo $comment; ?>" placeholder="이 노래에 대한 생각을 자유롭게 표현해주세요."></textarea></td>
			</tr>
			</tbody>
			</table>
		</div>

		<div class="input-group">
			<?php if ($update == true): ?>
				 <button class="btn" type="submit" name="update" style="background: #556B2F;">코멘트 수정</button>
			 <?php else: ?>
					<button class="btn" type="submit" name="comment_btn" >코멘트 저장</button>
				<?php endif ?> 
		</div>
	</cetner>
		</form>
	</div>
	<!-- 코멘트 작성 끝 -->
</body>
</html>
