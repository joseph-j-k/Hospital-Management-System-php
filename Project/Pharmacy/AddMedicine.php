<?php
include('../Assets/Connection/Connection.php');
session_start();

if(isset($_POST["btn_submit"]))
{
	$subcategory = $_POST["selSubCategory"];
	$medicine = $_POST["txt_name"];
	$detail = $_POST["txt_detail"];
	$price = $_POST["txt_price"];
	
	$insQry = "insert into tbl_medicine(subcat_id,medicine_name,medicine_details,medicine_price) values('".$subcategory."','".$medicine."','".$detail."','".$price."')";
	if($con->query($insQry))
	{
		?>
        <script>
		alert('Inserted')
		window.location="AddMedicine.php"
		</script>
        <?php
	}
	
}

if(isset($_GET["did"]))
{
	$del="delete from tbl_medicine where medicine_id ='".$_GET["did"]."'";
	
	if($con->query($del))
	{
	
	?>
        <script>
		alert('Deleted');
		window.location = "AddMedicine.php";
		</script>
        <?php
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Medicine</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 20px;
    }
    h1 {
        text-align: center;
        color: #333;
    }
    table {
        width: 80%;
        margin: 20px auto;
        border-collapse: collapse;
        background-color: white;
    }
    th, td {
        padding: 12px;
        text-align: left;
        border: 1px solid #ddd;
    }
    th {
        background-color: #f2f2f2;
    }
    tr:hover {
        background-color: #f1f1f1;
    }
    input[type="text"], textarea, select {
        width: calc(100% - 20px);
        padding: 10px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 10px 15px;
        cursor: pointer;
        border-radius: 4px;
    }
    input[type="submit"]:hover {
        background-color: #45a049;
    }
    .action-links a {
        margin-right: 10px;
        color: #007BFF;
        text-decoration: none;
    }
    .action-links a:hover {
        text-decoration: underline;
    }
    button {
        background-color: #1E90FF;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button:hover {
        opacity: 0.8;
    }
</style>
</head>

<body>
<form action="" method="post">
<h1 align="center">Medicines</h1>
<table  border="1" align="center">
  <tr>
    <td>Sub-Category</td>
    <td>
    <select name="selSubCategory" id="selSubCategory" required>
    <option>---List---</option>
    <?php
	$sel = "select * from  tbl_subcategory";
	$result = $con -> query($sel);
	while($data = $result -> fetch_assoc())
	{
	 ?>
    <option value="<?php echo $data["subcat_id"]?>"><?php echo $data["subcat_name"]?></option>
    <?php } ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Name</td>
    <td><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" required /></td>
  </tr>
  <tr>
    <td> Detail</td>
    <td><textarea name="txt_detail" cols="" rows="" required></textarea></td>
  </tr>
  <tr>
    <td>Price</td>
    <td><label for="txt_price"></label>
      <input type="text" name="txt_price" id="txt_price" required/></td>
  </tr>
  <tr>
    <td colspan="2" align="center">
    <input type="submit" name="btn_submit" id="btn_submit" value="Add" required/>
    
     
    </tr>
</table>

<br /><br />

<table  border="1" align="center">
  <tr>
    <td>SIno.</td>
    <td>Sub-Category</td>
    <td>Name</td>
    <td>Detail</td>
    <td>Price</td>
    <td>Remaning Stock</td>
    <td colspan="2" align="center">Action</td>
  </tr>
  <?php 
  $i=0;
  $sel = "select * from tbl_medicine m inner join tbl_subcategory s on s.subcat_id = m.subcat_id";
  
  $result = $con -> query($sel);
  while($data1 = $result -> fetch_assoc())
  	{
		$i++;
        $stock2 = "SELECT SUM(stock_qty) as stock_qty FROM tbl_stock where medicine_id = ".$data1['medicine_id'];
        $result2 = $con -> query($stock2);
        $data2 = $result2 -> fetch_assoc();
        
  ?>
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $data1["subcat_name"]?></td>
    <td><?php echo $data1["medicine_name"]?></td>
    <td><?php echo $data1["medicine_details"]?></td>
    <td><?php echo $data1["medicine_price"]?></td>
    <td><?php 
    if($data2["stock_qty"] == NULL )
    {


        echo "Stock Dones't exist";
    }
    else{

        echo $data2["stock_qty"];
    }
    ?></td>
    <td>
    	<a href="AddMedicine.php?did=<?php echo $data1["medicine_id"]?>">Delete</a>
        <a href="Stock.php?m=<?php echo $data1["medicine_id"]?>">Stock</a>
    </td>
  </tr>
  <?php } ?>
</table>

</form>

</body>
</html>