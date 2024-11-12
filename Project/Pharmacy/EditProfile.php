<?php 
include('../Assets/Connection/Connection.php');
session_start();

if(isset($_POST["btn_edit"]))
{
    $update = "update tbl_pharmacy set pharmacy_email = '".$_POST["txt_email"]."' where pharmacy_id = '".$_SESSION["phid"]."'";
    
    if($con -> query($update))
    {
        echo "<script>
                alert('Updated');
                window.location = 'EditProfile.php'
              </script>";
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
<h1 align="center">Edit Profile</h1>
<?php
$sel = "select * from tbl_pharmacy where pharmacy_id = '".$_SESSION["phid"]."'";
$result = $con -> query($sel);
if($data = $result -> fetch_assoc())
{
?>
<table  align="center">
  <tr>
    <td>Email</td>
   <td><label for="txt_email"></label>
   <input type="text" name="txt_email" id="txt_email" value="<?php echo $data["pharmacy_email"]?>" required="required"/></td>
  </tr>
  <tr>
    <td colspan="2" align="center">
    <input type="submit" name="btn_edit" id="btn_edit" value="Edit" />
    <input type="button"  value="Back" onclick="window.location.href='MyProfile.php'"/>
  </td>
    </tr>
</table>
<?php } ?>
</form>
</body>
</html>
