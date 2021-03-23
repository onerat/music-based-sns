<?php
include('functions.php');
if (!isLoggedIn()) {
  $_SESSION['msg'] = "You must log in first";
  header('location: login.php');
}
?>
  <html lang="en">
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="keywords" content="">
      <meta name="author" content="">
      <!-- Bootstrap core CSS -->
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom styles for this template -->
      <link href="css/heroic-features.css" rel="stylesheet">

      <title>

          검색

      </title>

      <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
      <link href="assets/css/toolkit.css" rel="stylesheet">

      <link href="assets/css/application.css" rel="stylesheet">

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


  	<div class="content">

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
          <img src="assets/img/brand-white.png" alt="brand">
        </a>
      </div>
      <div class="navbar-collapse collapse" id="navbar-collapse-main">

          <ul class="nav navbar-nav hidden-xs">
            <li>
              <a href="./user.php">마이페이지</a>
            </li>
            <li>
              <a data-toggle="modal" href="#msgModal">쪽지</a>
            </li>
  					<li>
  						<a  href="music.php">음악</a>
  					</li>

          </ul>

          <ul class="nav navbar-nav navbar-right m-r-0 hidden-xs">
            <li >
              <a class="app-notifications" href="./index.php">
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
            <li><a href="./user.php">Profile</a></li>
            <li><a href="./index.php">Notifications</a></li>
            <li><a data-toggle="modal" href="#msgModal">Messages</a></li>
            <li><a href="./edit.php">프로필 편집</a></li>
            <li><a href="index.php?logout='1'">로그아웃</a></li>
          </ul>

          <ul class="nav navbar-nav hidden">
            <li><a href="./edit.php">프로필 편집</a></li>
            <li><a href="index.php?logout='1'">로그아웃</a></li>
          </ul>
        </div>
    </div>
  </nav>

  <div class="modal fade" id="msgModal" tabindex="-1" role="dialog" aria-labelledby="msgModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <a data-toggle="modal" href="#memoModal"><button type="button" class="btn btn-sm btn-primary pull-right app-new-msg js-newMsg">새 쪽지</button></a>
          <h4 class="modal-title">Messages</h4>
        </div>

        <div class="modal-body p-a-0 js-modalBody">
          <div class="modal-body-scroller">
            <div class="media-list media-list-users list-group js-msgGroup">
              <a href="#" class="list-group-item">
                <div class="media">
                  <span class="media-left">
                  <img class="img-circle media-object" src="<?php echo 'images/' . $_SESSION['user']['profile_image'] ?>">
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
                    <img class="img-circle media-object" src="assets/img/avatar-mdo.png">
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
                    <img class="img-circle media-object" src="assets/img/avatar-dhg.png">
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
                    <img class="img-circle media-object" src="assets/img/avatar-fat.jpg">
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
                    <img class="img-circle media-object" src="assets/img/avatar-mdo.png">
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
                    <img class="img-circle media-object" src="assets/img/avatar-fat.jpg">
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
                    <img class="img-circle media-object" src="assets/img/avatar-mdo.png">
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
                    <img class="img-circle media-object" src="assets/img/avatar-dhg.png">
                  </span>
                  <div class="media-body">
                    <strong><?=$username?></strong>
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
                        <a href="#"><?=$username?></a> at 4:20PM
                      </small>
                    </div>
                  </div>
                  <a class="media-right" href="#">
                    <img class="img-circle media-object" src="assets/img/avatar-dhg.png">
                  </a>
                </li>

                <li class="media m-b-md">
                  <a class="media-left" href="#">
                    <img class="img-circle media-object" src="assets/img/avatar-fat.jpg">
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
                    <img class="img-circle media-object" src="assets/img/avatar-mdo.png">
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
                        <a href="#"><?=$username?></a> at 4:20PM
                      </small>
                    </div>
                  </div>
                  <a class="media-right" href="#">
                    <img class="img-circle media-object" src="assets/img/avatar-dhg.png">
                  </a>
                </li>

                <li class="media m-b-md">
                  <a class="media-left" href="#">
                    <img class="img-circle media-object" src="assets/img/avatar-fat.jpg">
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
                    <img class="img-circle media-object" src="assets/img/avatar-mdo.png">
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


  <body>
    <div class="container">
    <?php
     if(isset($_POST['submit'])){
      if(isset($_GET['go'])){
      if(preg_match("/[A-Z | a-z]+/", $_POST['name'])){
        $name=$_POST['name'];
        $conn = mysqli_connect("localhost", "root", "gkswn0584", "projectdb");
        $result = mysqli_query($conn, "SELECT * FROM music WHERE title LIKE '%" . $name . "%' OR artist LIKE '%" . $name ."%'");
        $numrows= mysqli_num_rows($result);
        $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
        echo "<h2>" . stripslashes($name) . " 에 대한 검색 결과 " . $numrows . "</h2>";
 foreach ($users as $user): ?>
<div class="row text-center">
  <div class="col-lg-3 col-md-6 mb-4">
    <div class="card h-100">
    <img src="<?php echo 'cover/' . $user['album_cover']; ?>" width="100" height="100" alt="">
      <div class="card-body">
        <h4 class="card-title"><?php echo $user['title']; ?></h4>
        <h6 class="card-text"><?php echo $user['artist']; ?> &middot; <?php echo $user['year']; ?> </h6>
      </div>
      <div class="card-footer">
        <a href="comment-write.php?cover=<?php echo $user['album_cover']; ?>&title=<?php echo $user['title'];?>&artist=<?php echo $user['artist'];?>" onclick="win_memo(this.href); return false;">
          <button type="button" class="btn btn-sm btn-primary pull-right app-new-msg js-newMsg">코멘트 작성하기</button></a>
      </div>
    </div>
  </div>
  </div>
    <?php endforeach;
  }}}?>
</div>
<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
