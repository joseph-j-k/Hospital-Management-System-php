<?php 
include('../Assets/Connection/Connection.php');
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Profile</title>
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
        margin-bottom: 20px;
        text-align: center;
    }

    form {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 400px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    td {
        padding: 10px;
        font-size: 16px;
    }

    td:first-child {
        font-weight: bold;
        color: #555;
    }

    input[type="submit"], input[type="button"] {
        background-color: #1E90FF;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        margin-top: 10px;
        width: 48%;
    }

    input[type="reset"] {
        background-color: #1C86EE;
    }

    input[type="submit"]:hover, input[type="reset"]:hover {
        opacity: 0.8;
    }

    td[colspan="2"] {
        text-align: center;
        padding-top: 20px;
    }

    .action-links button {
        width: 48%;
        margin-right: 2%;
    }

    .action-links button:last-child {
        margin-right: 0;
    }

    button {
        background-color: #1E90FF;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button:hover {
        opacity: 0.8;
    }
</style>
</head>

<body>
<form action="" method="post">
<?php 
$sel = "select * from tbl_pharmacy where pharmacy_id = '".$_SESSION["phid"]."'";
$result = $con -> query($sel);
if($data = $result -> fetch_assoc())
{
?>
<h1 align="center">My Profile</h1>
<table  align="center">
  <tr>
    <td>Email</td>
    <td width="93"><?php echo $data["pharmacy_email"]?></td>
  </tr>
  <tr>
    <td colspan="2" class="action-links">
        <button type="button" onclick="window.location.href='EditProfile.php'">Edit Profile</button>
        <button type="button" onclick="window.location.href='ChangePassword.php'">Change Password</button>
    </td>
  </tr>
</table>
<?php } ?>
</form>
</body>
</html>
