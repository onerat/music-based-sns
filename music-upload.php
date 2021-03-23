<?php
  include "dbconn.php";
?>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>프로필 편집</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/assets/css/profile.css">

  </head>
  <body>
        <div class="container">
          <div class="row">
            <div class="col-4 offset-md-4 form-div">
                <form action="music-process.php" method="post" enctype="multipart/form-data">
                  <h2 class="text-center mb-3 mt-3">음악 넣기</h2>
                      <div class="form-group text-center" style="position: relative;" >
                        <span class="img-div">
                          <div class="text-center img-placeholder"  onClick="triggerClick()">
                            <h4>이미지 업로드</h4>
                          </div>
                          <img src="images/avatar.jpg" onClick="triggerClick()" id="profileDisplay">
                        </span>
                        <input type="file" name="profileImage" onChange="displayImage(this)" id="profileImage" class="form-control">
                      </div>

                      <div class="form-group">
                        <label>제목</label>
                        <input class="form-control" type="text" size="35" name="title">
                      </div>
                      <div class="form-group">
                        <label>가수</label>
                        <input class="form-control" type="text" size="35" name="artist" >
                      </div>
                      <div class="form-group">
                        <label>연도</label>
                        <input type="Integer" name="year" class="form-control">
                      </div>
            <div class="form-group">
              <button type="submit" name="save_music" class="btn btn-primary btn-block">제출</button>
            </div>
            </form>
         </div>
       </div>
     </div>
    </body>
    </html>
  <script src="assets/js/script.js"></script>
