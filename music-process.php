<?php
  $msg = "";
  $msg_class = "";
  $conn = mysqli_connect("localhost", "root", "gkswn0584", "projectdb");
  if (isset($_POST['save_music'])) {
    // for the database
    $title = $_POST['title'];
    $aritst = $_POST['artist'];
    $year = $_POST['year'];

    $profileImageName = time() . '-' . $_FILES["profileImage"]["name"];
    // For image upload
    $target_dir = "cover/";
    $target_file = $target_dir . basename($profileImageName);
    // VALIDATION
    // validate image size. Size is calculated in Bytes
    if($_FILES['profileImage']['size'] > 200000) {
      $msg = "Image size should not be greated than 200Kb";
      $msg_class = "alert-danger";
    }
    // check if file exists
    if(file_exists($target_file)) {
      $msg = "File already exists";
      $msg_class = "alert-danger";
    }
    // Upload image only if no errors
    if (empty($error)) {
      if(move_uploaded_file($_FILES["profileImage"]["tmp_name"], $target_file)) {
        $sql = "INSERT INTO music SET album_cover='$profileImageName', title='$title', artist='$aritst', year=$year";
        if(mysqli_query($conn, $sql)){
          $msg = "Image uploaded and saved in the Database";
          $msg_class = "alert-success";
        } else {
          $msg = "There was an error in the database";
          $msg_class = "alert-danger";
        }
      } else {
        $error = "There was an erro uploading the file";
        $msg = "alert-danger";
      }
    }
  }

  header('location: music.php');
?>
