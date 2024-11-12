<?php
include("Head.php");
include('../Assets/Connection/Connection.php');
$catid=$catname='';
if(isset($_POST['btn_submit'])){
	$name=$_POST['cat_txt'];
	$id=$_POST['txt_id'];
	if($id=='')
	{
	$insQry="insert into tbl_category(category_name) values('".$name."')";
	if($con->query($insQry)){
		?>
        <script>
		alert('Inserted')
		window.location="Category.php"
		</script>
        <?php
	}
	else{
		?>
        <script>
		alert('Failed')
		</script>
        <?php
	}
	}
	else
	{
		$update=" update tbl_category set category_name='".$name."'  where category_id ='".$id."'";
		if($con->query($update)){
		?>
        <script>
		alert('Updated')
		window.location="Category.php"
		</script>
        <?php
	}
	}
}
if(isset($_GET['id']))
{
	$del="delete from tbl_category where category_id ='".$_GET['id']."'";
	
	if($con->query($del))
	{
	
	?>
        <script>
		alert('Deleted');
		window.location = "Category.php";
		</script>
        <?php
	}
}
if(isset($_GET['eid']))
{
	$sel="select * from tbl_category where category_id='".$_GET['eid']."'";
	$res=$con->query($sel);
	$resdata=$res->fetch_assoc();
	$catname=$resdata['category_name'];
	$catid=$resdata['category_id'];
	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Category</title>
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
    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    input[type="submit"]:hover {
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
<h1 align="center">Category</h1>
<table border="1" align="center">
  <tr>
    <td>Category</td>
    <td><label for="cat_txt"></label>
      <input type="text" name="cat_txt" id="cat_txt" value="<?php echo $catname ?>" required="required"/>
      <input type="hidden" name="txt_id" id="txt_id" value="<?php echo $catid ?>" /></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" /></td>
    </tr>
</table>
<br/><br/>
<table border="1" align="center">
    <tr>
      <td>Sl No</td>
      <td>Name</td>
      <td>Action</td>
    </tr>
    <?php
	$i = 0;
	$selQry = "select * from tbl_category";
	$result = $con->query($selQry);
	while($data = $result -> fetch_assoc()) 
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data['category_name'];?></td>
      <td><a href="Category.php?id=<?php echo $data['category_id'];?>" class="a">Delete</a>
      <a href="Category.php?eid=<?php echo $data['category_id'];?>" class="a">Edit</a></td>
    </tr>
    <?php
	}
	?>
  </table>
</form>
</body>
</html>

<?php include("Foot.php"); ?>