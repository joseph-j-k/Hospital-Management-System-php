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
    background-color: #f4f4f9;
    margin: 0;
    padding: 0;
  }
  .container {
    width: 80%;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }
  h1 {
    color: #333;
    font-size: 2em;
    margin-bottom: 20px;
    text-align: center;
  }
  img {
    border-radius: 10px;
    border: 2px solid #ddd;
  }
  table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
  }
  td {
    padding: 15px;
    text-align: left;
    border-bottom: 1px solid #ddd;
  }
  td:first-child {
    background-color: #f7f7f7;
    font-weight: bold;
  }
  td:last-child {
    background-color: #fff;
  }
  .button {
    display: inline-block;
    padding: 12px 24px;
    margin: 5px;
    text-decoration: none;
    color: white;
    background: linear-gradient(to right, #ff8c00, #ff4500);
    border-radius: 8px;
    text-align: center;
    font-size: 1em;
    font-weight: bold;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: background 0.3s, transform 0.2s;
  }
  .button:hover {
    background: linear-gradient(to right, #ff4500, #ff8c00);
    transform: scale(1.05);
  }
  .button:active {
    background: linear-gradient(to right, #ff8c00, #ff4500);
    transform: scale(0.95);
  }
</style>
</head>

<body>
<div class="container">
  <form action="" method="post">
    <?php 
    $sel = "select * from tbl_doctor doc inner join tbl_department dep on dep.dept_id = doc.dept_id where doctor_id = '".$_SESSION["docid"]."'";
    $result = $con -> query($sel);
    $data = $result -> fetch_assoc();
    ?>
    <table>
      <tr>
        <td colspan="2" align="center">
          <img src="../Assets/File/Doctor/<?php echo $data["doctor_photo"]?>" width="300" height="300"/>
        </td>
      </tr>
      <tr>
        <td>Name</td>
        <td><?php echo $data["doctor_name"]?></td>
      </tr>
      <tr>
        <td>Email</td>
        <td><?php echo $data["doctor_email"]?></td>
      </tr>
      <tr>
        <td>Contact</td>
        <td><?php echo $data["doctor_contact"]?></td>
      </tr>
      <tr>
        <td>Address</td>
        <td><?php echo $data["doctor_address"]?></td>
      </tr>
      <tr>
        <td>Department</td>
        <td><?php echo $data["dept_name"]?></td>
      </tr>
      <tr>
        <td>Qualification</td>
        <td><?php echo $data["doctor_qualification"]?></td>
      </tr>
      <tr>
        <td>Experience</td>
        <td><?php echo $data["doctor_experience"]?></td>
      </tr>
      <tr>
        <td colspan="2" align="center">
          <a href="EditProfile.php" class="button">Edit Profile</a>
          <a href="ChangePassword.php" class="button">Change Password</a>
          <a href="HomePage.php" class="button">Back</a>
        </td>
      </tr>
    </table>
  </form>
</div>
</body>
</html>