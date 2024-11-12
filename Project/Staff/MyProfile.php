<?php 
include('../Assets/Connection/Connection.php');
session_start();
include("Head.php");
?>

<!DOCTYPE html>
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
    }

    h1 {
        color: #333;
        text-align: center;
        margin-top: 20px;
        font-size: 24px;
        text-transform: uppercase;
    }

    table {
        width: 50%;
        margin: 30px auto;
        border-collapse: collapse;
        background-color: #fff;
        box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        overflow: hidden;
    }

    td {
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
        font-size: 16px;
    }

    td img {
        border-radius: 50%;
        border: 3px solid #ddd;
    }

    td[colspan="2"] {
        text-align: center;
        border-bottom: none;
    }

    .a {
        display: inline-block;
        margin: 10px 5px;
        padding: 10px 20px;
        text-decoration: none;
        color: #fff;
        background-color: #28a745; /* Green background */
        border-radius: 5px;
        font-size: 14px;
        transition: background-color 0.3s ease, transform 0.1s ease;
        position: relative;
    }

    .a:hover {
        background-color: #218838; /* Darker green on hover */
    }

    .a:active {
        transform: scale(0.95); /* Scale down the button on click */
    }
</style>
</head>

<body>
<form action="" method="post">
<?php 
$sel = "SELECT * FROM tbl_staff WHERE staff_id = '".$_SESSION["sid"]."'";
$result = $con -> query($sel);
if($data = $result -> fetch_assoc())
{
?>
<table border="1" align="center">
  <tr>
    <td colspan="2" align="center"><img src="../Assets/File/Staff/<?php echo $data["staff_photo"]?>" width="250" height="250"/></td>
  </tr>
  <tr>
    <td>Name</td>
    <td width="93"><?php echo $data["staff_name"]?></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><?php echo $data["staff_email"]?></td>
  </tr>
  <tr>
    <td>Contact</td>
    <td><?php echo $data["staff_contact"]?></td>
  </tr>
  <tr>
    <td colspan="2" align="center">
    	<a href="EditProfile.php" class="a">Edit Profile</a>
    	<a href="ChangePassword.php" class="a">Change Password</a>
    </td>
  </tr>
</table>
<?php } ?>
</form>
</body>
</html>
<?php include("Foot.php"); ?>
