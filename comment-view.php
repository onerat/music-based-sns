<?php
include "dbconn.php";
include "functions.php";

$id = $_GET['id'];
$results = mysqli_query($db, "SELECT * FROM tempdiary WHERE num=$id");
$row = mysqli_fetch_assoc($results);
$title = $row['title'];
$artist = $row['artist'];
$comment = $row['comment'];
 ?>
 <html>
 <body>
   <center>
     <div>
     <table>
     <tbody>
   <center>	<tr>
     <td>
         <input type="text" name="title" size="30" value="<?php echo $title ?>" id="title" readonly></br>
       </td>
     </tr>
   </center>
     <tr>
       <td>
         <input type="text" name="artist" value="<?php echo $artist ?>"id="artist"  readonly></br>
       </td>
     </tr>
     <tr>
       <td><input type="text" name="comment" value="<?php echo $comment; ?>" readonly></textarea></td>
     </tr>
     </tbody>
     </table>
   </div>
 </center>

</body>
</html>
