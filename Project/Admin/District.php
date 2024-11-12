<?php
include("Head.php");
include('../Assets/Connection/Connection.php');
if(isset($_POST['btn_sub'])){
	$dist=$_POST['txt_disname'];
	$insQry="insert into tbl_district(district_name) values('".$dist."')";
	if($con->query($insQry)){
		?>
        <script>
		alert('Inserted')
		window.location="District.php"
		</script>
        <?php
	}
}


if(isset($_GET["did"]))
{
	$del = "delete from tbl_district where district_id = '".$_GET["did"]."'";
	
	if($con -> query($del))
	{
		echo "<script>
			 alert('Deleted');
			 window.location='District.php';
			</script>";
		
		}
	
	
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>District</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        color: #333;
        margin: 0;
        padding: 0;
    }
    h1 {
        text-align: center;
        color: #444;
    }
    table {
        width: 80%;
        margin: 20px auto;
        border-collapse: collapse;
    }
    table, th, td {
        border: 1px solid #ddd;
    }
    th, td {
        padding: 10px;
        text-align: center;
    }
    th {
        background-color: #4CAF50;
        color: white;
    }
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    tr:hover {
        background-color: #ddd;
    }
    form {
        width: 80%;
        margin: 20px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    input[type="text"] {
        width: calc(100% - 22px);
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    input[type="submit"], input[type="reset"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    input[type="submit"], input[type="reset"]:hover {
        background-color: #45a049;
    }
    .a {
        color: #4CAF50;
        text-decoration: none;
        margin: 0 5px;
    }
    .a:hover {
        text-decoration: underline;
    }
</style>
</head>

<body>
<form action="" method="post">
<table border="1">
  <tr>
    <td >DISTRICT NAME</td>
    <td >
      <label for="txt_disname"></label>
      <input type="text" name="txt_disname" id="txt_disname" required="required"/></td>
  </tr>
  <tr>
    <td colspan="2">
        <input type="submit" name="btn_sub" id="btn_sub" value="SUBMIT" /> 
        <input type="reset" name="btn_clear" id="btn_clear" value="CLEAR" /></td>
  </tr>
</table>
</form>
<table  border="1">



  <tr>
    <td>SI.No</td>
    <td>District</td>
    <td>Actions</td>
  </tr>
  <?php
	$i = 0;
	$selQry = "select * from tbl_district";
	$result = $con->query($selQry);
	while($data = $result -> fetch_assoc()) 
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data['district_name'];?></td>
      <td> 
      <a href="District.php?did=<?php echo $data['district_id'] ?>" class="a">Delete</a></td>
    </tr>
    <?php
	}
	?>
  
</table>
</body>
</html>
<?php include("Foot.php"); ?>