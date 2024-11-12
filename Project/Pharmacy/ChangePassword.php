<?php 
include('../Assets/Connection/Connection.php');
session_start();


if(isset($_POST["btn_submit"]))
{
	
		$currentPassword = $_POST["txt_password"];
		$newPassword = $_POST["txt_newpassword"];
		$rePassword = $_POST["txt_repassword"];
		
		$sel = "select * from tbl_pharmacy where pharmacy_id = '".$_SESSION["phid"]."'";
		
		$result = $con -> query($sel);
		$data = $result -> fetch_assoc();
		$dbPassword = $data["pharmacy_password"];
		
		
		if($dbPassword == $currentPassword)
		{
			
				if($newPassword == $rePassword)
					{
				
				
				$update = "update  tbl_pharmacy set pharmacy_password = '".$newPassword."' where pharmacy_id = '".$_SESSION["phid"]."'";
				
				if($con -> query($update))
				
				{
					
					echo "<script>
				alert('Updated');
				window.location = 'ChangePassword.php'
			  </script>";
					
					
					}
				
				
				}
				
				else
				{
					echo "<script>
				alert('Password Incorrect');
				window.location = 'ChangePassword.php'
			  </script>";
					
					}
			
			
			}
			
	
	else
		{
		echo "<script>
		alert('Incorrect Current Password');
		window.location = 'ChangePassword.php'
		</script>";
					
		}		
	
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Change Password</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    h1 {
        color: #333;
    }

    form {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    td {
        padding: 10px;
        font-size: 16px;
    }

    input[type="text"], input[type="password"] {
        width: 100%;
        padding: 8px;
        margin: 4px 0;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    input[type="submit"], input[type="button"] {
        background-color: #1E90FF;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        margin-top: 10px;
    }

    input[type="reset"] {
        background-color: #1C86EE;
    }

    input[type="submit"]:hover, input[type="reset"]:hover {
        opacity: 0.8;
    }

    td[colspan="2"] {
        text-align: center;
    }
</style>
</head>

<body>
<form action="" method="post">
  <h1 align="center">Change Password</h1>
  <table  align="center">
    <tr>
      <td >Old Password</td>
      <td><label for="txt_password"></label>
        <input type="text" name="txt_password" id="txt_password" required="required"/></td>
    </tr>
    <tr>
      <td>New Password</td>
      <td><label for="txt_newpassword"></label>
        <input type="text" name="txt_newpassword" id="txt_newpassword" required="required"/></td>
    </tr>
    <tr>
      <td>Re-Type Password</td>
      <td><label for="txt_repassword"></label>
        <input type="text" name="txt_repassword" id="txt_repassword" required="required"/></td>
    </tr>
    <tr>
      <td colspan="2" align="center">
      <input type="submit" name="btn_submit" id="btn_submit" value="Change Password" />
        <input type="button" value="Back" onclick="window.location.href='MyProfile.php'"/></td>
    </tr>
  </table>
</form>
</body>
</html>