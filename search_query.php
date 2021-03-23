<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Search Music</title>
<style type="text/css" media="screen">
ul li{
  list-style-type:none;
}
</style>
</head>

<body>
<h3>Search Music</h3>
<p>You may search either by title or artist</p>
<form method="post" action="search.php?go" id="searchform">
<input type="text" name="name">
<input type="submit" name="submit" value="Search">
</form>
<?php

if(isset($_POST['submit'])){
if(isset($_GET['go'])){
if(preg_match("/[A-Z | a-z]+/", $_POST['name'])){
$name=$_POST['name'];


//-query the database table
$sql="SELECT * FROM music WHERE title LIKE '%" . $name . "%' OR artist LIKE '%" . $name ."%'";


}
else{
echo "<p>Please enter a search query</p>";
}
}
}
?>
</body>
</html>
