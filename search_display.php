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
<form method="post" action="search_display.php?go" id="searchform">
<input type="text" name="name">
<input type="submit" name="submit" value="Search">
</form>
<?aspx

if(isset($_POST['submit'])){
if(isset($_GET['go'])){
if(preg_match("/[A-Z | a-z]+/", $_POST['name'])){
$name=$_POST['name'];

$mysql_host = "localhost";
$mysql_user = "root";
$mysql_password = "gkswn0584";
$mysql_db="projectdb";

$db = mysqli_connect($mysql_host, $mysql_user, $mysql_password, $mysql_db);

//-query the database table
$sql="SELECT * FROM music WHERE title LIKE '%" . $name . "%' OR artist LIKE '%" . $name ."%'";

//-run the query against the mysql query function
$result=mysqli_query($db, $sql);

//-create while loop and loop through result set
while($row=mysqli_fetch_array($result)){

	$FirstName =$row['FirstName'];
	$LastName=$row['LastName'];
	$ID=$row['ID'];

//-display the result of the array

echo "<ul>\n";
echo "<li>" . "<a href=\"search_display.php?id=$ID\">"  .$FirstName . " " . $LastName . "</a></li>\n";
echo "</ul>";
}
}
else{
echo "<p>Please enter a search query</p>";
}
}
}
?>
</body>
</html>
