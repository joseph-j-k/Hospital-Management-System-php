<?php
include('../Assets/Connection/Connection.php');
if(isset($_POST['btn_submit'])){
	
	$room = $_POST['txt_roomno'];
	$status = $_POST['txt_status'];
	
	$insQry="insert into tbl_room(room_no,room_status)values('".$room."','".$status."')";
	if($con->query($insQry)){
		?>
        <script>
		alert('Inserted')
		window.location="Room.php"
		</script>
        <?php
	}
	else{
		?>
        <script>
		alert('Failed')
		</script>
        <?php
	}
}
if(isset($_GET['del']))
{
	$del="delete from tbl_room where room_id ='".$_GET['del']."'";
	
	if($con->query($del))
	{
	
	?>
        <script>
		alert('Deleted');
		window.location = "room.php";
		</script>
        <?php
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body><form action="" method="post">
<table  border="1" align="center">
  <tr>
    <td>Room_no</td>
    <td><label for="txt_roomno."></label>
      <input type="text" name="txt_roomno" id="txt_roomno" required="required"/>
    </td>
  </tr>
  <tr>
    <td>Room_status</td>
    <td><label for="txt_status"></label>
      <label for="txt_status"></label>
      <input type="text" name="txt_status" id="txt_status" required="required"/></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" /></td>
  </tr>
</table>
<br /><br />
<table  border="1" align="center">



  <tr>
    <td>SI.No</td>
    <td>Room_no.</td>
    <td>Room_status</td>
    <td>Actions</td>
  </tr>
  <?php
	$i = 0;
	$selQry = "select * from tbl_room";
	$result = $con->query($selQry);
	while($data = $result -> fetch_assoc()) 
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data['room_no'];?></td>
      <td><?php echo $data['room_status'];?></td>
      <td><a href="Room.php?del=<?php echo $data["room_id"]?>">Delete</a>
    	<a href="Room.php?edi=<?php echo $data['room_id'];?>">Edit</a>
        </td>
    </tr>
    <?php
	}
	?>
  
</table>
</form>
</body>
</html>