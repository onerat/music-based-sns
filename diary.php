<?php
  include "functions.php";
  $email = $_SESSION['user']['email'];
  $results = mysqli_query($db, "SELECT * FROM diary where email='$email'");
  $users = mysqli_fetch_all($results, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Diary Preview</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" />
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-4 offset-md-4" style="margin-top: 30px;">
        <br>
        <br>
        <table class="table table-bordered">
          <thead>
            <th>제목</th>
            <th>가수</th>
            <th>글쓴이</th>
          </thead>
          <tbody>
            <?php foreach ($users as $user): ?>
              <a data-toggle="modal" href="#diaryModal">
              <tr>
                <td> <?php echo $user['title']; ?> </td>
                <td> <?php echo $user['artist']; ?> </td>
                <td> <?php echo $user['username']; ?> </td>
              </tr>
            </a>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>


      <!-- Modal -->
      <div class="modal fade" id="diaryModal" tabindex="-1" role="dialog" aria-labelledby="diaryModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">코멘트</h4>
            </div>

            <div class="modal-body">
              <label>제목</label>
              <input class="form-control" type="text" size="10" name="title">
              <label>가수</label>
              <input class="form-control" type="text" size="10" name="artist">
              <br>
              <textarea rows="15" cols="75" name="diary" placeholder="이 노래에 대한 생각을 자유롭게 표현해주세요."></textarea>
            </div>
          </div>
        </div>
      </div>
</body>
</html>
