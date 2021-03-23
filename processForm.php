<?php
  include "functions.php";

  if (isset($_POST['edit_btn'])) {

      $msg = "";
      $msg_class = "";
      $id          = e($_POST['id']);
      $username    = e($_POST['username']);
      $password    = e($_POST['password']);
      $bio         = e($_POST['bio']);

      $profileImageName = time() . '-' . $_FILES["profileImage"]["name"];
      // For image upload
      $target_dir = "images/";
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

      move_uploaded_file($_FILES["profileImage"]["tmp_name"], $target_file);


      $sql = "UPDATE users SET profile_image='$profileImageName', username='$username',password='$password', bio='$bio' WHERE id=$id";
      if(mysqli_query($db, $sql)){
          $msg = "Image uploaded and saved in the Database";
          $msg_class = "alert-success";
      } else {
          $msg = "There was an error in the database";
          $msg_class = "alert-danger";
      }
        header('location: edit.php');
    }



?>
