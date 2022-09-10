<?php
include "dbconnect.php";
$id = $_GET["id"];
$sql="SELECT * FROM personalinfo WHERE id='$id'";
$result=$conn->query($sql);
if($result->num_rows>0){
  while($row=$result->fetch_assoc()){
    $fname=$row["firstname"];
    $lname=$row["lastname"];
    $a=$row["usn"];
    $radio=$row["branch"];
    $sem=$row["semester"];
    $male=$row["gender"];
    $mail=$row["mail"];
    $phone=$row["phone"];
    $dob=$row["dob"];
  }
}
else {
  echo " 0 Result";
}
?>
<!DOCTYPE html>
<html>
<body>
  <form action="updateuser.php" method="post">
  <table>
    <tr><td>First Name</td>
<td><input type="text" name="fname" value="<?php echo $fname;?>"required></td>
</tr>
<tr>
  <tr><td>Last Name</td>
<td><input type="text" name="lname" value="<?php echo $lname;?>"required></td>
</tr>
<tr><td>USN</td>
<td><input type="text" name="usn" value="<?php echo $a;?>"required></td>
</tr>
<tr>
<td>Branch:</td>
<td>CSE<input type=radio id="radio" name="radio" value="CSE" required>
ISE<input type=radio id="radio" name="radio" value="ISE" required>
EC<input type=radio id="radio" name="radio" value="EC" required>
CV<input type=radio id="radio" name="radio" value="CV" required>
MECH<input type=radio id="radio" name="radio" value="MECH" required>
</td>
</tr>
<tr>
  <td>Semester:</td>
  <td><select id="sem" name="sem" required>
  <option value="1st Semester">1st Semester</option>
  <option value="2nd Semester">2nd Semester</option>
  <option value="3rd Semester">3rd Semester</option>
  <option value="4th Semester">4th Semester</option>
  <option value="5th Semester">5th Semester</option>
  <option value="6th Semester">6th Semester</option>
  <option value="7th Semester">7th Semester</option>
  <option value="8th Semester">8th Semester</option>
  </td>
  </tr>
  <tr>
  <td>Gender:</td>
  <td>Male:<input type=radio id="male" name="male" value="Male" required>&nbsp;&nbsp;Female:
  <input type=radio id="male" name="male" value="Female" required></td>
  </tr>
  <tr>
  <td>Mail Id:</td>
  <td><input type=email id="mail" name="mail" value="<?php echo $mail;?>" required></td>
  </tr>
  <tr>
  <td>Phone Number:</td>
  <td><input type="tel" id="phone" name="phone" value="<?php echo $phone;?>" required></td>
  </tr>
  <tr>
  <td>select your brithday:  </td>
  <td><input type="text" id="dob" name="dob" value="<?php echo $dob;?>" required>
  </td></tr>
</table>
<input type="submit" value="update"><br><br>
<input type="hidden" name="id" value="<?php echo $id;?>" >
</form>
<?php
$conn->close();
 ?>
</body>
</html>
