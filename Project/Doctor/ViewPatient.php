<?php 
include('../Assets/Connection/Connection.php');
session_start();

if(isset($_SESSION["docid"])) {
    $doctor_id = $_SESSION["docid"];
}

?>
<?php include("Head.php"); ?>
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
        padding: 20px;
    }

    h1 {
        color: #333;
        text-align: center;
        font-size: 24px;
        margin-bottom: 20px;
    }

    table {
        width: 80%;
        margin: 0 auto;
        border-collapse: collapse;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    table, th, td {
        border: 1px solid #ddd;
    }

    th, td {
        padding: 10px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
        font-weight: bold;
        color: #555;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tr:hover {
        background-color: #f1f1f1;
    }

    .a {
        text-decoration: none;
        color: #fff;
        background-color: #ff6600;
        padding: 5px 10px;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .a:hover {
        background-color: #e65c00;
    }
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <h1>View Patient</h1>
  <table border="1">
    <tr>
      <th>OP Number</th>
      <th>Name</th>
      <th>Address</th>
      <th>District</th>
      <th>Place</th>
      <th>Gender</th>
      <th>DOB</th>
      <th>Contact Number</th>
      <th>Action</th>
    </tr>
    <?php 
	$selQry = "select * from tbl_appoinment a inner join tbl_patient p on p.patient_id = a.patient_id inner join tbl_place pl on pl.place_id = p.place_id inner join tbl_district d on d.district_id = pl.district_id where a.doctor_id = '".$doctor_id."' ORDER BY a.appoinment_datetime ASC";
	 
	 $result = $con -> query($selQry);
	 while($data = $result -> fetch_assoc())
		{
	?>
    <tr>
      <td><?php echo $data["patient_opno"]?></td>
      <td><?php echo $data["patient_name"]?></td>
      <td><?php echo $data["patient_address"]?></td>
      <td><?php echo $data["district_name"]?></td>
      <td><?php echo $data["place_name"]?></td>
      <td><?php echo $data["patient_gender"]?></td>
      <td><?php echo $data["patient_dob"]?></td>
      <td><?php echo $data["patient_contact"]?></td>
      <td><a href="Prescription.php?api=<?php echo $data["appoinment_id"]?>" class="a">Add&nbsp;Prescription</a></td>
    </tr>
    <?php } ?>
  </table>
</form>
</body>
</html> 
