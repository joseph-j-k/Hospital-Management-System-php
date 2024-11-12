  <?php 
  include('../Assets/Connection/Connection.php');
  session_start();
  $appointment_id = "";
  if (isset($_GET["api"])) {
      $_SESSION["api"] = $_GET["api"];
  } 

  if(isset($_POST["prescribe"])) {

    $token = $_POST["txt_token"];
    $details = $_POST["txt_details"];
    $medicine = $_POST["text_prescription"];
  ;
    
    
      $check_query = "select * from tbl_appoinment where appoinment_id = '".$_SESSION["api"]."'";
      $result = $con->query($check_query);

      if($result -> num_rows > 0) {
          $update = "update tbl_appoinment set 
                      appoinment_token = '$token',
                      appoinment_details = '$details',
                      appoinment_medicine = '$medicine',
                      appoinment_status = 1 
                  WHERE appoinment_id = '".$_SESSION["api"]."'";

          if($con -> query($update)) {
              echo "<script>    
                      alert('Prescription Updated');
                      window.location='ViewPatient.php';
                    </script>";
          } 
      } else {
      $patient = $data['patient_id'];
          $insert = "insert into tbl_appoinment (appoinment_token, appoinment_details, appoinment_medicine,  appoinment_datetime, patient_id)values ('".$token."', '".$details."', '".$medicine."',  curdate(),  '".$patient."')";

          if($con->query($insert)) {
              echo "<script>    
                      alert('Prescription Added');
                      window.location='ViewPatient.php';
                    </script>";
          } 
      }
  }

  ?>

  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Prescription</title>
  <style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
  }

  h1 {
    color: #333;
    margin-top: 20px;
  }

  table {
    width: 80%;
    margin: 20px auto;
    border-collapse: collapse;
    background-color: #fff;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  }

  table, th, td {
    border: 1px solid #ddd;
  }

  th, td {
    padding: 12px;
    text-align: left;
  }

  th {
    background-color: #f2f2f2;
    color: #333;
  }

  tr:nth-child(even) {
    background-color: #f9f9f9;
  }

  input[type="text"], textarea {
    width: 99.2%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
  }

  textarea {
    resize: vertical;
  }

  input[type="submit"] {
    background-color: #e65c00;
    color: white;
    padding: 14px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
  }

  input[type="submit"]:hover {
    background-color: #ff6600;
  }

  .form-container {
    width: 80%;
    margin: 0 auto;
  }
</style>
  </head>

  <body>
  <form id="form1" name="form1" method="post" action="">
    <h1 align="center">Prescription</h1>
    <?php
  $sel = "SELECT * FROM tbl_patient p INNER JOIN tbl_appoinment a ON p.patient_id = a.patient_id WHERE a.appoinment_id = '".$_SESSION["api"]."'";
  $result = $con -> query($sel);
  if($result->num_rows > 0) {
      $data = $result->fetch_assoc();
  ?>
    <table  border="1" align="center">
      <tr>
        <td>OP Number</td>
        <td><?php echo $data["patient_opno"]?></td>
      </tr>
      <tr>
        <td>Token Number</td>
        <td><input type="text" name="txt_token" value="<?php echo $data["appoinment_token"] ?>" readonly/></td>
      <tr>
        <td>Patient Name</td>
        <td><input type="text" name="txt_name" value="<?php echo $data["patient_name"] ?>" readonly/></td>
      </tr>
      <tr>
        <td>Gender</td>
        <td><?php echo $data["patient_gender"]?></td>
      </tr>
      <tr>
        <td>Details</td>
        <td><label for="txt_details"></label>
          <input type="text" name="txt_details" value="<?php echo $data["appoinment_details"] ?>" readonly/></td>
          </td>
      </tr>
      <tr>
        <td>Prescribe Medicine</td>
        <td><textarea name="text_prescription" id="text_prescription" cols="45" rows="5" required><?php echo $data["appoinment_medicine"] ?></textarea></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><input type="submit" value="Prescribe" name="prescribe"  /></td>
      </tr>
    </table>
    <?php } ?>
  </form>
  </body>
  </html>