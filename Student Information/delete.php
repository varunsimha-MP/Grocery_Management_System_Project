<html>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<?php
include "dbconnect.php";
$sql = "SELECT * FROM personalinfo";
$result = $conn->query($sql);

?>
<center><br>
<table width="300" border="1" cellspacing="1" cellpadding="1">

</center>
<?php
if(isset($_GET["message"])){
  if($_GET["message"]=="successfully")
  {?>
    <div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <b>Update Successfully</b></div>
      <?php }
}
    ?>
    <?php
    if(isset($_GET["message"])){
      if($_GET["message"]=="delete")
      {?>
        <div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <b>delete Successfully</b></div>
          <?php }
    }
        ?>
	<?php
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
	?>
	  <tr>
		<td>ID</td>
		<td><?php echo $row["id"]; ?></td>
		<td><a href="delinfo.php?id=<?php echo $row["id"] ?>">Delete</a>
    <a href="update.php?id=<?php echo $row["id"] ?>">Edit</a></td>
	  </tr>
	  <tr>
		<td>First Name</td>
		<td><?php echo $row["firstname"]; ?></td>

	  </tr>
	  <tr>
		<td>Last Name</td>
		<td><?php echo $row["lastname"]; ?></td>
		<td>&nbsp;</td>
	  </tr>
    <tr>
		<td>USN</td>
		<td><?php echo $row["usn"]; ?></td>
		<td>&nbsp;</td>
	  </tr>
    <tr>
		<td>branch</td>
		<td><?php echo $row["branch"]; ?></td>
		<td>&nbsp;</td>
	  </tr>
    <tr>
      <td>semester</td>
  		<td><?php echo $row["semester"]; ?></td>
  		<td>&nbsp;</td>
  	  </tr>
      <tr>
		<td>Gender</td>
		<td><?php echo $row["gender"]; ?></td>
		<td>&nbsp;</td>
	  </tr>
	  <tr>
		<td>Mail</td>
		<td><?php echo $row["mail"]; ?></td>
		<td>&nbsp;</td>
	  </tr>
    <tr>
		<td>Phone Number</td>
		<td><?php echo $row["phone"]; ?></td>
		<td>&nbsp;</td>
  </tr>
  <td>DOB</td>
  <td><?php echo $row["dob"]; ?></td>
  <td>&nbsp;</td>
  </tr>
  <tr>
  <td>Image</td>
  <td><?php echo "<img src='".$row['image']."' style='width:200px',height:200px;>" ?></td>
  <td>&nbsp;</td>
  </tr>
  <td>Upload Time</td>
  <td><?php echo $row["clock"]; ?></td>
  <td>&nbsp;</td>
  </tr>
  <tr>
  <tr>
  <tr>
  <td colspan="3">&nbsp;</td>
</tr>
	<?php
		}
	?>
</table>
<?php
	} else {
			echo "0 results";
	}
  $sql = "SELECT * FROM personalinfo";
  $result = $conn->query($sql);
		$row = mysqli_num_rows($result);
    ?>
    <br>
    <table width="300" border="1" cellspacing="1" cellpadding="1">
      <tr>
    <td>Total Number of Register</td>
    <td><?php echo $row ?></td>
    </tr>
  </table>
  <?php

$conn->close();
?>
<a href="web.html">Insert</a>
</html>
