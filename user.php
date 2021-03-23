<?php
include('functions.php');
if (!isLoggedIn()) {
  $_SESSION['msg'] = "You must log in first";
  header('location: login.php');
}
$email = $_SESSION['user']['email'];
$results = mysqli_query($db, "SELECT * FROM tempdiary WHERE email='$email'");
$diarys = mysqli_fetch_all($results, MYSQLI_ASSOC);
 ?>
<meta charset="utf-8">
<html>
<head>
<title>
 <?php echo $_SESSION['user']['username'];?>님의 음악 보관함
</title>

    <!DOCTYPE html>
    <html lang="en">
      <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="">

        <title>

            Profile &middot;

        </title>

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
        <link href="../assets/css/toolkit.css" rel="stylesheet">

        <link href="../assets/css/application.css" rel="stylesheet">

        <style>
          /* note: this is a hack for ios iframe for bootstrap themes shopify page */
          /* this chunk of css is not part of the toolkit :) */
          body {
            width: 1px;
            min-width: 100%;
            *width: 100%;
          }
        </style>

      </head>


    <body class="with-top-navbar">



    <div class="modal fade" id="msgModal" tabindex="-1" role="dialog" aria-labelledby="msgModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <a data-toggle="modal" href="#memoModal"><button type="button" class="btn btn-sm btn-primary pull-right app-new-msg js-newMsg">New message</button></a>
            <h4 class="modal-title">Messages</h4>
          </div>

          <div class="modal-body p-a-0 js-modalBody">
            <div class="modal-body-scroller">
              <div class="media-list media-list-users list-group js-msgGroup">
                <a href="#" class="list-group-item">
                  <div class="media">
                    <span class="media-left">
                    <img class="img-circle media-object" src="../assets/img/avatar-fat.jpg">
                    </span>
                    <div class="media-body">
                      <strong>Jacob Thornton</strong> and <strong>1 other</strong>
                      <div class="media-body-secondary">
                        Aenean eu leo quam. Pellentesque ornare sem lacinia quam &hellip;
                      </div>
                    </div>
                  </div>
                </a>
                <a href="#" class="list-group-item">
                  <div class="media">
                    <span class="media-left">
                      <img class="img-circle media-object" src="../assets/img/avatar-mdo.png">
                    </span>
                    <div class="media-body">
                      <strong>Mark Otto</strong> and <strong>3 others</strong>
                      <div class="media-body-secondary">
                        Brunch sustainable placeat vegan bicycle rights yeah…
                      </div>
                    </div>
                  </div>
                </a>
                <a href="#" class="list-group-item">
                  <div class="media">
                    <span class="media-left">
                      <img class="img-circle media-object" src="<?php echo 'images/' . $_SESSION['user']['profile_image'] ?>">
                    </span>
                    <div class="media-body">
                      <strong><?=$username?></strong>
                      <div class="media-body-secondary">
                        Brunch sustainable placeat vegan bicycle rights yeah…
                      </div>
                    </div>
                  </div>
                </a>
                <a href="#" class="list-group-item">
                  <div class="media">
                    <span class="media-left">
                      <img class="img-circle media-object" src="../assets/img/avatar-fat.jpg">
                    </span>
                    <div class="media-body">
                      <strong>Jacob Thornton</strong> and <strong>1 other</strong>
                      <div class="media-body-secondary">
                        Aenean eu leo quam. Pellentesque ornare sem lacinia quam &hellip;
                      </div>
                    </div>
                  </div>
                </a>
                <a href="#" class="list-group-item">
                  <div class="media">
                    <span class="media-left">
                      <img class="img-circle media-object" src="../assets/img/avatar-mdo.png">
                    </span>
                    <div class="media-body">
                      <strong>Mark Otto</strong> and <strong>3 others</strong>
                      <div class="media-body-secondary">
                        Brunch sustainable placeat vegan bicycle rights yeah…
                      </div>
                    </div>
                  </div>
                </a>
                <a href="#" class="list-group-item">
                  <div class="media">
                    <span class="media-left">
                      <img class="img-circle media-object" src="../assets/img/avatar-dhg.png">
                    </span>
                    <div class="media-body">
                      <strong>Dave Gamache</strong>
                      <div class="media-body-secondary">
                        Brunch sustainable placeat vegan bicycle rights yeah…
                      </div>
                    </div>
                  </div>
                </a>
                <a href="#" class="list-group-item">
                  <div class="media">
                    <span class="media-left">
                      <img class="img-circle media-object" src="../assets/img/avatar-fat.jpg">
                    </span>
                    <div class="media-body">
                      <strong>Jacob Thornton</strong> and <strong>1 other</strong>
                      <div class="media-body-secondary">
                        Aenean eu leo quam. Pellentesque ornare sem lacinia quam &hellip;
                      </div>
                    </div>
                  </div>
                </a>
                <a href="#" class="list-group-item">
                  <div class="media">
                    <span class="media-left">
                      <img class="img-circle media-object" src="../assets/img/avatar-mdo.png">
                    </span>
                    <div class="media-body">
                      <strong>Mark Otto</strong> and <strong>3 others</strong>
                      <div class="media-body-secondary">
                        Brunch sustainable placeat vegan bicycle rights yeah…
                      </div>
                    </div>
                  </div>
                </a>
                <a href="#" class="list-group-item">
                  <div class="media">
                    <span class="media-left">
                      <img class="img-circle media-object" src="../assets/img/avatar-dhg.png">
                    </span>
                    <div class="media-body">
                      <strong>Dave Gamache</strong>
                      <div class="media-body-secondary">
                        Brunch sustainable placeat vegan bicycle rights yeah…
                      </div>
                    </div>
                  </div>
                </a>
              </div>

              <div class="hide m-a js-conversation">
                <ul class="media-list media-list-conversation">
                  <li class="media media-current-user m-b-md">
                    <div class="media-body">
                      <div class="media-body-text">
                        Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Nulla vitae elit libero, a pharetra augue. Maecenas sed diam eget risus varius blandit sit amet non magna. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Sed posuere consectetur est at lobortis.
                      </div>
                      <div class="media-footer">
                        <small class="text-muted">
                          <a href="#">Dave Gamache</a> at 4:20PM
                        </small>
                      </div>
                    </div>
                    <a class="media-right" href="#">
                      <img class="img-circle media-object" src="../assets/img/avatar-dhg.png">
                    </a>
                  </li>

                  <li class="media m-b-md">
                    <a class="media-left" href="#">
                      <img class="img-circle media-object" src="../assets/img/avatar-fat.jpg">
                    </a>
                    <div class="media-body">
                      <div class="media-body-text">
                       Cras justo odio, dapibus ac facilisis in, egestas eget quam. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.
                      </div>
                      <div class="media-body-text">
                       Vestibulum id ligula porta felis euismod semper. Aenean lacinia bibendum nulla sed consectetur. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam quis risus eget urna mollis ornare vel eu leo. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.
                      </div>
                      <div class="media-body-text">
                       Cras mattis consectetur purus sit amet fermentum. Donec sed odio dui. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Nulla vitae elit libero, a pharetra augue. Donec id elit non mi porta gravida at eget metus.
                      </div>
                      <div class="media-footer">
                        <small class="text-muted">
                          <a href="#">Fat</a> at 4:28PM
                        </small>
                      </div>
                    </div>
                  </li>

                  <li class="media m-b-md">
                    <a class="media-left" href="#">
                      <img class="img-circle media-object" src="../assets/img/avatar-mdo.png">
                    </a>
                    <div class="media-body">
                      <div class="media-body-text">
                       Etiam porta sem malesuada magna mollis euismod. Donec id elit non mi porta gravida at eget metus. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Etiam porta sem malesuada magna mollis euismod. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Aenean lacinia bibendum nulla sed consectetur.
                      </div>
                      <div class="media-body-text">
                       Curabitur blandit tempus porttitor. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.
                      </div>
                      <div class="media-footer">
                        <small class="text-muted">
                          <a href="#">Mark Otto</a> at 4:20PM
                        </small>
                      </div>
                    </div>
                  </li>

                  <li class="media media-current-user m-b-md">
                    <div class="media-body">
                      <div class="media-body-text">
                        Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Nulla vitae elit libero, a pharetra augue. Maecenas sed diam eget risus varius blandit sit amet non magna. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Sed posuere consectetur est at lobortis.
                      </div>
                      <div class="media-footer">
                        <small class="text-muted">
                          <a href="#">Dave Gamache</a> at 4:20PM
                        </small>
                      </div>
                    </div>
                    <a class="media-right" href="#">
                      <img class="img-circle media-object" src="../assets/img/avatar-dhg.png">
                    </a>
                  </li>

                  <li class="media m-b-md">
                    <a class="media-left" href="#">
                      <img class="img-circle media-object" src="../assets/img/avatar-fat.jpg">
                    </a>
                    <div class="media-body">
                      <div class="media-body-text">
                       Cras justo odio, dapibus ac facilisis in, egestas eget quam. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.
                      </div>
                      <div class="media-body-text">
                       Vestibulum id ligula porta felis euismod semper. Aenean lacinia bibendum nulla sed consectetur. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam quis risus eget urna mollis ornare vel eu leo. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.
                      </div>
                      <div class="media-body-text">
                       Cras mattis consectetur purus sit amet fermentum. Donec sed odio dui. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Nulla vitae elit libero, a pharetra augue. Donec id elit non mi porta gravida at eget metus.
                      </div>
                      <div class="media-footer">
                        <small class="text-muted">
                          <a href="#">Fat</a> at 4:28PM
                        </small>
                      </div>
                    </div>
                  </li>

                  <li class="media m-b">
                    <a class="media-left" href="#">
                      <img class="img-circle media-object" src="../assets/img/avatar-mdo.png">
                    </a>
                    <div class="media-body">
                      <div class="media-body-text">
                       Etiam porta sem malesuada magna mollis euismod. Donec id elit non mi porta gravida at eget metus. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Etiam porta sem malesuada magna mollis euismod. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Aenean lacinia bibendum nulla sed consectetur.
                      </div>
                      <div class="media-body-text">
                       Curabitur blandit tempus porttitor. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.
                      </div>
                      <div class="media-footer">
                        <small class="text-muted">
                          <a href="#">Mark Otto</a> at 4:20PM
                        </small>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="growl" id="app-growl"></div>

    <nav class="navbar navbar-inverse navbar-fixed-top app-navbar">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-main">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="./index.php">
            <img src="../assets/img/brand-white.png" alt="brand">
          </a>
        </div>
        <div class="navbar-collapse collapse" id="navbar-collapse-main">

            <ul class="nav navbar-nav hidden-xs">
              <li class="active">
                <a href="user.php">마이페이지</a>
              </li>
              <li>
                <a data-toggle="modal" href="#msgModal">쪽지</a>
              </li>
              <li class="active">
                <a href="music.php">음악</a>
              </li>
            </ul>

            <ul class="nav navbar-nav navbar-right m-r-0 hidden-xs">
              <li >
                <a class="app-notifications" href="../notifications/index.html">
                  <span class="icon icon-bell"></span>
                </a>
              </li>
              <li>
                <button class="btn btn-default navbar-btn navbar-btn-avitar" data-toggle="popover">
                  <img class="img-circle" src="<?php echo 'images/' . $_SESSION['user']['profile_image'] ?>">
                </button>
              </li>
            </ul>

            <form class="navbar-form navbar-right app-search" role="search" method="post" action="search.php?go" id="searchform">
    					<div class="form-group">
    				<input type="text" name="name" data-action="grow" placeholder="노래 제목, 가수를 검색해보세요.">
    				<input type="submit" name="submit" value="검색">
    				  </div>
    				</form>


            <ul class="nav navbar-nav hidden-sm hidden-md hidden-lg">
              <li><a href="./user.php">마이페이지</a></li>
              <li><a data-toggle="modal" href="#msgModal">쪽지</a></li>
              <li><a href="./music.php">음악</a></li>
              <li><a href="edit.php" data-action="growl">프로필 편집</a></li>
              <li><a href="index.php?logout='1'">로그아웃</a></li>
            </ul>

            <ul class="nav navbar-nav hidden">
              <li><a href="#" data-action="growl">프로필 편집</a></li>
              <li><a href="index.php?logout='1'">로그아웃</a></li>
            </ul>
          </div>
      </div>
    </nav>


    <div class="profile-header text-center"
         style="background-image: url(./background_1.jpg);">
      <div class="container">
        <div class="container-inner">
          <img class="img-circle media-object" src="<?php echo 'images/' . $_SESSION['user']['profile_image'] ?>">
          <h3 class="profile-header-user">  <?php  if (isset($_SESSION['user']))  ?>
          <strong>  <?php echo $_SESSION['user']['username']; ?></strong></h3>
          <p class="profile-header-bio">
          </p>
          <small> <a href="edit.php">프로필 편집</a></small>
          <p class="m-b-md"></p>

          <?php
            $query = "SELECT * FROM users";
            $data = mysqli_query($db, $query);
            $total_rows = mysqli_num_rows($data);
          ?>
          <ul class="panel-menu">
            <li class="panel-menu-item">
              <a href="#userModal" class="text-inherit" data-toggle="modal">
                팔로워
                <h5 class="m-y-0"><?php echo $total_rows; ?></h5>
              </a>
            </li>

            <li class="panel-menu-item">
              <a href="#userModal" class="text-inherit" data-toggle="modal">
                팔로우
                <h5 class="m-y-0"><?php echo $total_rows; ?></h5>
              </a>
            </li>
          </ul>
        </div>
      </div>

      <?
      $music_rows = mysqli_num_rows($results);
      ?>

      <nav class="profile-header-nav">
        <ul class="nav nav-tabs">
          <li class="active">
          음악 <strong><?php echo $music_rows; ?></strong>
          </li>
          <li class="active">
              <a data-toggle="modal" href="#commentModal">+</a>
          </li>
        </ul>
      </nav>
    </div>

    <table class="table table-bordered">
      <thead>
        <th>COVER</th>
        <th>TITLE</th>
        <th>ARTIST</th>
        <th colspan="2">ACTION</th>
      </thead>
      <tbody>
        <?php foreach ($diarys as $diary): ?>
          <tr>
            <td> <a href="comment-view.php?id=<?php echo $diary['num']; ?>">  <img class="media-object img-circle" src="<?php echo 'cover/' . $diary['album_cover'] ?>"></a></td>
            <td> <a href="comment-view.php?id=<?php echo $diary['num']; ?>"><?php echo $diary['title']; ?> </a></td>
            <td> <a href="comment-view.php?id=<?php echo $diary['num']; ?>"><?php echo $diary['artist']; ?> </a></td>
            <td>
              <a href="comment-write.php?cover=<?php echo $diary['album_cover']; ?>&title=<?php echo $diary['title'];?>&artist=<?php echo $diary['artist'];?>&comment=<?php echo $diary['comment'];?>" onclick="win_memo(this.href); return false;">
                <button type="button" class="btn btn-sm btn-primary pull-right app-new-msg js-newMsg">수정</button></a>
            </td>
            <td>
              <a href="functions.php?del=<?php echo $diary['num']; ?>" class="btn btn-sm btn-primary pull-right app-new-msg js-newMsg">삭제</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="memoModal" tabindex="-1" role="dialog" aria-labelledby="memoModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form method="post" action="user.php">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">쪽지</h4>
          </div>

          <div class="modal-body">
            <input class="form-control" type="hidden" size="10" name="receiver">
            <input class="form-control" type="hidden" size="10" name="sender">
            <br>
            <textarea rows="10" cols="75" name="memo" ></textarea>
          </div>
          <div class="modal-footer">
            <button type="submit" name="memo_btn2" class="btn btn-sm btn-primary pull-right app-new-msg js-newMsg">보내기</button>
          </div>
        </form>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="commentModal" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form method="post" action="user.php">
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
            <textarea rows="15" cols="75" name="comment" placeholder="이 노래에 대한 생각을 자유롭게 표현해주세요."></textarea>
          </div>
          <div class="modal-footer">
            <button type="submit" name="comment_btn" class="btn btn-sm btn-primary pull-right app-new-msg js-newMsg">코멘트 작성</button>
          </div>
        </form>
        </div>
      </div>
    </div>



    <?php
    $result = mysqli_query($db, "SELECT * FROM users");
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
     ?>
    <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Users</h4>
          </div>

          <div class="modal-body p-a-0">
            <div class="modal-body-scroller">

              <ul class="media-list media-list-users list-group">
    						<?php foreach ($users as $user): ?>
                <li class="list-group-item">
                  <div class="media">
                    <a class="media-left" href="#">
                      <img class="media-object img-circle" src="<?php echo 'images/' . $user['profile_image'] ?>">
                    </a>
                    <div class="media-body">
                      <a data-toggle="modal" href="#memoModal"><button type="button" class="btn btn-sm btn-primary pull-right app-new-msg js-newMsg">새 쪽지</button></a>
                      <button class="btn btn-default btn-sm pull-right">
                        <span class="glyphicon glyphicon-user"></span> 팔로우
                      </button>
                      <strong><?php echo $user['username']; ?></strong>
                      <p><?php echo $user['email']; ?></p>
                    </div>
                  </div>
                </li>
    						<?php endforeach; ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/js/chart.js"></script>
        <script src="../assets/js/toolkit.js"></script>
        <script src="../assets/js/application.js"></script>
        <script>
          // execute/clear BS loaders for docs
          $(function(){
            if (window.BS&&window.BS.loader&&window.BS.loader.length) {
              while(BS.loader.length){(BS.loader.pop())()}
            }
          })
        </script>
      </body>
    </html>

</html>
