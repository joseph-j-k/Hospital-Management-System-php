<?php 
include('../Assets/Connection/Connection.php');
session_start();

if(isset($_POST["btn_submit"]))
{
    $currentPassword = $_POST["txt_password"];
    $newPassword = $_POST["txt_newpassword"];
    $rePassword = $_POST["txt_repassword"];
    
    $sel = "select * from tbl_staff where staff_id = '".$_SESSION["sid"]."'";
    $result = $con -> query($sel);
    $data = $result -> fetch_assoc();
    $dbPassword = $data["staff_password"];
    
    if($dbPassword == $currentPassword)
    {
        if($newPassword == $rePassword)
        {
            $update = "update tbl_staff set staff_password = '".$newPassword."' where staff_id = '".$_SESSION["sid"]."'";
            if($con -> query($update))
            {
                echo "<script>
                    alert('Updated');
                    window.location = 'ChangePassword.php';
                </script>";
            }
        }
        else
        {
            echo "<script>
                alert('Password Mismatch');
                window.location = 'ChangePassword.php';
            </script>";
        }
    }
    else
    {
        echo "<script>
            alert('Incorrect Current Password');
            window.location = 'ChangePassword.php';
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
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #e9ecef;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        color: #495057;
    }

    h1 {
        text-align: center;
        color: #343a40;
        margin-bottom: 30px;
        font-size: 28px;
        text-transform: uppercase;
        font-weight: bold;
    }

    table {
        width: 100%;
        max-width: 500px;
        border-collapse: collapse;
        background-color: #ffffff;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        border-radius: 10px;
        overflow: hidden;
    }

    td {
        padding: 20px;
        text-align: left;
        border-bottom: 1px solid #dee2e6;
        font-size: 16px;
    }

    td[colspan="2"] {
        text-align: center;
        border-bottom: none;
    }

    input[type="text"], input[type="password"] {
        width: 100%;
        padding: 12px;
        margin: 6px 0;
        box-sizing: border-box;
        border: 1px solid #ced4da;
        border-radius: 8px;
        font-size: 16px;
    }

    input[type="submit"], input[type="reset"], .button-link {
        background-color: #4CAF50; /* Green background */
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        margin: 5px;
        text-align: center;
        display: inline-block;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }
    input[type="submit"]:hover, input[type="reset"]:hover, .button-link:hover {
        background-color: #45a049; /* Darker green on hover */
    }
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
</style>
</head>

<body>
<form action="" method="post">
  <table border="1" align="center">
    <tr>
      <td>Old Password</td>
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
        <a href="MyProfile.php" class="button-link">Go Back</a>
    </tr>
  </table>
</form>
</body>
</html>
