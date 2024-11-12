<?php
include("Head.php");
include('../Assets/Connection/Connection.php');
if(isset($_POST["btn_submit"]))
{
	$place = $_POST["txt_place"];
	$district = $_POST["selDistrict"];
	
	$insQry = "insert into tbl_place(place_name,district_id) values('".$place."','".$district."')";
	if($con->query($insQry))
	{
		?>
        <script>
		alert('Inserted')
		window.location="Place.php"
		</script>
        <?php
	}
	
}

if(isset($_GET["did"]))
{
	$del="delete from tbl_place where place_id ='".$_GET["did"]."'";
	
	if($con->query($del))
	{
	
	?>
        <script>
		alert('Deleted');
		window.location = "Place.php";
		</script>
        <?php
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Place</title>
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
        margin-top: 20px;
    }
    table {
        width: 80%;
        margin: 20px auto;
        border-collapse: collapse;
        background-color: #fff;
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
    input[type="text"], select {
        width: calc(100% - 22px);
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        margin-top: 5px;
    }
    input[type="submit"], input[type="reset"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        margin: 10px 5px;
    }
    input[type="submit"]:hover, input[type="reset"]:hover {
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
<h1 align="center">Place</h1>
<table  border="1" align="center">
<tr>
    <td>Distrct</td>
    <td>
    <select name="selDistrict" id="selDistrict">
    <option>---District---</option>
    <?php
	$sel = "select * from  tbl_district";
	$result = $con -> query($sel);
	while($data = $result -> fetch_assoc())
	{
	 ?>
    <option value="<?php echo $data["district_id"]?>"><?php echo $data["district_name"]?></option>
    <?php } ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Place</td>
    <td><label for="txt_place"></label>
      <input type="text" name="txt_place" id="txt_place" value required="required"/></td>
  </tr>
  <tr>
    <td colspan="2" align="center">
    <input type="submit" name="btn_submit" id="btn_submit" value="Submit" /></td>
    </tr>
</table>

<br /><br />

<table  border="1" align="center">
  <tr>
    <td>Slno</td>
    <td>District</td>
    <td>Place</td>
    <td>Action</td>
  </tr>
  <?php 
  $i=0;
  $sel = "select * from tbl_place p inner join tbl_district d on d.district_id = p.district_id";
  
  $result = $con -> query($sel);
  while($data = $result -> fetch_assoc())
  	{
		$i++;
  ?>
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $data["district_name"]?></td>
    <td><?php echo $data["place_name"]?></td>
    <td>
    	<a href="place.php?did=<?php echo $data["place_id"]?>" class="a">Delete</a>
    </td>
  </tr>
  <?php } ?>
</table>
</form>
</body>
</html>

<?php include("Foot.php"); ?>