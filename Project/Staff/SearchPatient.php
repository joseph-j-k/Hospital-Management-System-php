<?php include('../Assets/Connection/Connection.php') ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SEARCH PATIENT</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <h1 align="center">Search Patient</h1>
  <table border="1" align="center">
    <tr>
      <td>OP Number</td>
      <td><label for="txt_opNumber"></label>
        <input type="text" name="txt_opNumber" id="txt_opNumber" required="required"/></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="button" name="btn_submit" id="btn_submit" onclick="getPatient()"  value="Search"/></td>
    </tr>
  </table>
</form>
<br />
<br />
<div id="patientList"> </div>
<script src="../Assets/JQ/jQuery.js"></script> 
<script>

	function getPatient()
{
	var did = document.getElementById('txt_opNumber').value
	
	$.ajax({
		url:"../Assets/AjaxPages/AjaxSearchPatient.php?did="+did,
		success: function(html){
			$("#patientList").html(html);
			
			}
		
		
		});
	
	}

</script>
</body>
</html>