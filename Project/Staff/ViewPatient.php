<?php 
include('../Assets/Connection/Connection.php');
session_start();

   $sel = "select * from tbl_patient pa inner join tbl_place p on p.place_id = pa.place_id inner join tbl_district d on d.district_id = p.district_id";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Patient</title>
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
        margin-bottom: 20px;
    }
    table {
        width: 80%;
        margin: 20px auto;
        border-collapse: collapse;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    }
    table, th, td {
        border: 1px solid #ddd;
    }
    th, td {
        padding: 12px;
        text-align: center;
    }
    th {
        background-color: #28a745;
        color: white;
        text-transform: uppercase;
        font-size: 14px;
    }
    tr:nth-child(even) {
        background-color: #f9f9f9;
    }
    tr:hover {
        background-color: #f1f1f1;
    }
    input[type="text"] {
        width: 100%;
        padding: 10px;
        margin: 4px 0;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    input[type="submit"] {
        background-color: #28a745;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }
    input[type="submit"]:hover {
        background-color: #218838;
    }
    td a {
        color: #007bff;
        text-decoration: none;
    }
    td a:hover {
        text-decoration: underline;
    }
    .search-button {
        text-align: left;
    }
    .home-button {
        display: inline-block;
        background-color: #28a745;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        text-align: center;
        text-decoration: none;
        font-size: 16px;
        margin-top: 10px;
    }
    .home-button:hover {
        background-color: #218838;
    }
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<h1>Search Patient</h1>
  <table>
    <tr>
      <td style="font-family: 'Arial', sans-serif; font-size: 24px; color: #28a745;">OP Number</td>
      <td><label for="txt_opNumber"></label>
        <input type="text" name="txt_opNumber" id="txt_opNumber" required="required"/></td>
    </tr>
    <tr>
      <td colspan="2" class="search-button">
        <input type="submit" name="btn_submit" id="btn_submit" value="Search"/>
        <a href="HomePage.php" class="home-button">Back</a>
      </td>
    </tr>
  </table>
  
<h1>View Patient</h1>
<table>
  <tr>
    <th>OP Number</th>
    <th>Name</th>
    <th>District</th>
    <th>Place</th>
    <th>Contact</th>
    <th>Gender</th>
    <th>DOB</th>
    <th colspan="2" align="center">Action</th>
  </tr>
  <?php
if(isset($_POST['btn_submit'])){
    $sel = "select * from tbl_patient pa inner join tbl_place p on p.place_id = pa.place_id inner join tbl_district d on d.district_id = p.district_id where patient_opno = '".$_POST["txt_opNumber"]."'";    
}
   $result = $con -> query($sel);
   while($data = $result -> fetch_assoc())
  {
     
  ?>
  <tr>
    <td><?php echo $data["patient_opno"]?></td>
    <td><?php echo $data["patient_name"]?></td>
    <td><?php echo $data["district_name"]?></td>
    <td><?php echo $data["place_name"]?></td>
    <td><?php echo $data["patient_contact"]?></td>
    <td><?php echo $data["patient_gender"]?></td>
    <td><?php echo $data["patient_dob"]?></td>
    <td>
    <a href="Appoinments.php?pid=<?php echo $data["patient_id"]?>">Appointments</a>
    </td>
  </tr>
  <?php } ?>
</table> 
</form>
</body>
</html>
