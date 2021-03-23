<?php
$mysql_host = "localhost";
$mysql_user = "root";
$mysql_password = "gkswn0584";
$mysql_db="projectdb";

$db = mysqli_connect($mysql_host, $mysql_user, $mysql_password, $mysql_db);
if(!$db)
{
  die("연결 실패: ". mysqli_connect_error());
}
 ?>
