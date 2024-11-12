<?php
include('../Assets/Connection/Connection.php');


if(isset($_POST["btn_submit"]))
{
	$name = $_POST["txt_name"];
	$mail = $_POST["txt_email"];
	$password = $_POST["txt_password"];
	$hid = $_POST["hidden_id"];
	
	if($hid == "")
	{
	$insQry = "insert into tbl_admin(admin_name, admin_email, admin_password)values('".$name."','".$mail."','".$password."')";
	
	if($con -> query($insQry))
	{
		echo "<script>
			alert('Inserted')
			window.location='AdminRegistration.php'
			</script>";
	}
	}
	else
	{
		$update = " update tbl_admin set admin_name = '".$name."', admin_email = '".$mail."', admin_password = '".$password."' where admin_id ='".$hid."'";
		if($con->query($update))
		{
		echo "<script>
			alert('Updated')
			window.location='AdminRegistration.php'
			</script>";
		}
	}
	
}
	
	
if(isset($_GET["did"]))
{
	$del = "delete from tbl_admin where admin_id = '".$_GET["did"]."'";
	
	if($con -> query($del))
	{
		echo "<script>
			 alert('Deleted');
			 window.location='AdminRegistration.php';
			</script>";
	}
}


$eid ="";
$ename="";
$email="";
$epassword="";

if(isset($_GET['eid']))
{
	$sel="select * from tbl_admin where admin_id ='".$_GET['eid']."'";
	$result = $con->query($sel);
	if($data = $result -> fetch_assoc())
	{
	$eid = $data["admin_id"];
	$ename = $data["admin_name"];
	$email = $data["admin_email"];
	$epassword = $data["admin_password"];
	}
	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Registration</title>
</head>

<body>
<form action="" method="post">
<h1 align="center">Admin Registration</h1>
  <table  border="1" align="center">
    <tr>
      <td >Name</td>
      <td ><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" value="<?php echo $ename ?>" required="required"/>
       <input type="hidden" name="hidden_id" id="hidden_id" value="<?php echo $eid ?>" /></td>    
       </tr>
    <tr>
      <td>Email</td>
      <td><label for="txt_email"></label>
      <input type="text" name="txt_email" id="txt_email" value="<?php echo $email ?>" required="required"/>
      </td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="txt_password"></label>
       <input type="text" name="txt_password" id="txt_password" value="<?php echo $epassword ?>" required="required"/>
       </td>  
    </tr>
    <tr>
      <td colspan="2" align="center">
      <input type="submit" name="btn_submit" id="btn_submit" value="Register" /></td>
    </tr>
  </table>
  <br /><br />
  <table border="1" align="center">
    <tr>
      <td>Sl No</td>
      <td>Name </td>
      <td>Email</td>
      <td>Action</td>
    </tr>
    <?php
	$i = 0;
	$selQry = "select * from tbl_admin";
	$result = $con -> query($selQry);
	while($data = $result -> fetch_assoc()) 
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data["admin_name"]?></td>
      <td><?php echo $data["admin_email"]?></td>
      <td><a href="AdminRegistration.php?did=<?php echo $data["admin_id"]?>">Delete</a>
      <a href="AdminRegistration.php?eid=<?php echo $data["admin_id"]?>">Edit</a></td>
    </tr>
    <?php } ?>
  </table>
</form>
</body>
</html>
