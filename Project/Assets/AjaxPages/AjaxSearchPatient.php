<?php include("../Connection/Connection.php");?>

<br />
<br />
<table  border="1" align="center">
  <tr align="center">
    <td>OpNumber</td>
    <td>Name</td>
    <td>Contact</td>
    <td>Gender</td>
    <td>DOB</td>
    <td>Address</td>
    <td>District</td>
    <td>Place</td>
  </tr>
  <?php 
	$sel = "select * from tbl_patient pa inner join tbl_place p on p.place_id = pa.place_id inner join tbl_district d on d.district_id = p.district_id where patient_opno = ".$_GET['did'];  
	$result = $con -> query($sel);
	
			$row = $result -> fetch_assoc()
		
	?>
  <tr align="center">
    <td><?php echo $row["patient_opno"] ?></td>
    <td><?php echo $row["patient_name"] ?></td>
    <td><?php echo $row["patient_contact"] ?></td>
    <td><?php echo $row["patient_gender"] ?></td>
    <td><?php echo $row["patient_dob"] ?></td>
    <td><?php echo $row["patient_address"] ?></td>
    <td><?php echo $row["district_name"] ?></td>
    <td><?php echo $row["place_name"] ?></td>
  </tr>
</table>
