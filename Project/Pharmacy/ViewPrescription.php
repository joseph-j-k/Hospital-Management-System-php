<?php 
include('../Assets/Connection/Connection.php');
session_start();
if(isset($_SESSION["docid"])) {
    $doctor_id = $_SESSION["docid"];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Prescription</title>
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
  }

  h1 {
    color: #333;
  }

  table {
    width: 90%;
    margin: 20px auto;
    border-collapse: collapse;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }

  th, td {
    padding: 10px;
    text-align: center;
    border: 1px solid #ddd;
  }

  th {
    background-color: #009688;
    color: #fff;
  }

  tr:nth-child(even) {
    background-color: #f9f9f9;
  }

  a {
    color: #009688;
    text-decoration: none;
    font-weight: bold;
  }

  a:hover {
    text-decoration: underline;
  }

  textarea {
    width: 100%;
    box-sizing: border-box;
    border: 1px solid #ddd;
    border-radius: 4px;
    padding: 10px;
    resize: none;
    background-color: #fafafa;
    font-size:15px;
    font-weight: bold;
    text-align:justify
  }

  .action-link {
    display: inline-block;
    padding: 8px 16px;
    background-color: #007bff;
    color: #fff;
    border-radius: 4px;
    text-decoration: none;
  }

  .action-link:hover {
    background-color: #0056b3;
  }

  .vertical-text {
    writing-mode: vertical-rl;
    text-orientation: mixed;
  }
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<h1 align="center">View Prescription</h1>
  <table border="1" align="center">
    <tr align="center">
      <td>#</td>
      <td>OP Number</td>
      <td>Token Number</td>
      <td>Patient Name</td>
      <td>Gender</td>
      <td>Details</td>
      <td>Pescription</td>
      <td>Action</td>
    </tr>
    <?php 
	$i=0;
	$sel = "select * from tbl_appoinment a inner join tbl_patient p on p.patient_id = a.patient_id inner join tbl_doctor d on d.doctor_id = a.doctor_id where a.doctor_id = '".$doctor_id."' ORDER BY a.appoinment_datetime ASC";
	$result = $con -> query($sel);
	while($data = $result -> fetch_assoc())
	{
		$i++;
	?>
    <tr align="center">
      <td><?php echo $i ?></td>
      <td><?php echo $data["patient_opno"] ?></td>
      <td><?php echo $data["appoinment_token"] ?></td>
      <td><?php echo $data["patient_name"] ?></td>
      <td><?php echo $data["patient_gender"] ?></td>
      <td><?php echo $data["appoinment_details"] ?></td>
      <td><label>
        <textarea name="txt_pesrciption" id="txt_pesrciption" cols="20" rows="5" readonly="readonly" class=""><?php echo $data["appoinment_medicine"] ?></textarea>
      </label></td>
      <td>
      <a href="SearchMedicine.php?aid=<?php echo $data['appoinment_id'];?>">Search Medicine</a>
      </td>
    </tr>
    <?php } ?>
  </table>
</form>
</body>
</html>
