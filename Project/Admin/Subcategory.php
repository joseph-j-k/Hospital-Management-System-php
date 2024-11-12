<?php
include("Head.php");
include('../Assets/Connection/Connection.php');
if(isset($_POST["btn_submit"]))
{
	$subcategory = $_POST["txt_subcategory"];
	$category = $_POST["select_category"];
	
	$insQry = "insert into tbl_subcategory(subcat_name,category_id) values('".$subcategory."','".$category."')";
	if($con->query($insQry))
	{
		?>
        <script>
		alert('Inserted')
		window.location="subcategory.php"
		</script>
        <?php
	}
	
}

if(isset($_GET["did"]))
{
	$del="delete from tbl_subcategory where subcat_id ='".$_GET["did"]."'";
	
	if($con->query($del))
	{
	
	?>
        <script>
		alert('Deleted');
		window.location = "subcategory.php";
		</script>
        <?php
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Subcategory</title>
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
<h1 align="center">SubCategory</h1>
<table  border="1" align="center">
  <tr>
    <td>Category</td>
    <td>
    <select name="select_category" id="select_category">
    <option>---Select---</option> 
	<?php
	$sel = "select * from  tbl_category";
	$result = $con -> query($sel);
	while($data = $result -> fetch_assoc())
	{
	 ?>
    <option value="<?php echo $data["category_id"]?>"><?php echo $data["category_name"]?></option>
    <?php } ?>
    </select></td>
  </tr>
  <tr>
   <td>Sub_category</td>
    <td><input type="text" name="txt_subcategory" required="required"/> </td>
    </tr>
  <tr>
    <td colspan="2" align="center">
    <input name="btn_submit" type="submit" value="Submit" />
    <input name="btn_cancel" type="reset" value="Cancel"/>
    </td>
    </tr>
</table>
<br /><br />

<table  border="1" align="center">
  <tr>
    <td>Si.No</td>
    <td>Category</td>
    <td>SubCategory</td>
    <td>Action</td>
  </tr>
    <?php 
  $i=0;
  $sel = "select * from tbl_subcategory s inner join tbl_category c on c.category_id = s.category_id";
  
  $result = $con -> query($sel);
  while($data = $result -> fetch_assoc())
  	{
		$i++;
  ?>
  <tr>
  	<td><?php echo $i ?></td>
    <td><?php echo $data["category_name"]?></td>
    <td><?php echo $data["subcat_name"]?></td>
    <td>
    <a href="Subcategory.php?did=<?php echo $data["subcat_id"]?>" class="a">Delete</a></td>
    </tr>
    <?php } ?>
</table>
</form>
</body>
</html>

<?php include("Foot.php"); ?>