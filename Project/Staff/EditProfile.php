<?php 
include('../Assets/Connection/Connection.php');
session_start();

if(isset($_POST["btn_edit"]))
{
    $update = "UPDATE tbl_staff SET staff_name = '".$_POST["txt_name"]."', staff_email = '".$_POST["txt_email"]."', staff_contact = '".$_POST["txt_contact"]."' WHERE staff_id = '".$_SESSION["sid"]."'";
    
    if($con->query($update))
    {
        echo "<script>
                alert('Updated');
                window.location = 'EditProfile.php';
              </script>";
    }
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Profile</title>
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
        text-align: center;
        color: #333;
        padding: 20px 0;
        font-size: 28px;
        background-color: #4CAF50;
        color: white;
        border-radius: 8px 8px 0 0;
    }
    form {
        width: 100%;
        max-width: 500px;
        margin: 30px auto;
        padding: 20px;
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    td {
        padding: 10px;
        text-align: left;
    }
    input[type="text"] {
        width: 100%;
        padding: 8px;
        margin: 4px 0;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
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
<h1>Edit Profile</h1>
<?php
$sel = "SELECT * FROM tbl_staff WHERE staff_id = '".$_SESSION["sid"]."'";
$result = $con->query($sel);
if($data = $result->fetch_assoc())
{
?>
<table border="0" align="center">
  <tr>
    <td>Name</td>
    <td><input type="text" name="txt_name" id="txt_name" value="<?php echo $data["staff_name"]?>" required="required"/></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><input type="text" name="txt_email" id="txt_email" value="<?php echo $data["staff_email"]?>" required="required"/></td>
  </tr>
  <tr>
    <td>Contact</td>
    <td><input type="text" name="txt_contact" id="txt_contact" value="<?php echo $data["staff_contact"]?>" required="required"/></td>
  </tr>
  <tr>
    <td colspan="2" align="center">
      <input type="submit" name="btn_edit" id="btn_edit" value="Edit" />
      <a href="MyProfile.php" class="button-link">Go Back</a>
    </td>
  </tr>
</table>
<?php } ?>
</form>
</body>
</html>
