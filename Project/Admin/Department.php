<?php
include("Head.php");
include('../Assets/Connection/Connection.php');
$deptid=$deptname='';
if(isset($_POST['btn_sub'])){
	$name=$_POST['txt_dpname'];
	$id=$_POST['txt_id'];
	if($id=='')
	{
	$insQry="insert into tbl_department(dept_name) values('".$name."')";
	if($con->query($insQry)){
		?>
        <script>
		alert('Inserted')
		window.location="Department.php"
		</script>
        <?php
	}
	else{
		?>
        <script>nam
		alert('Failed')
		</script>
        <?php
	}
	}
	else
	{
		$update=" update tbl_department set dept_name='".$name."'  where dept_id ='".$id."'";
		if($con->query($update)){
		?>
        <script>
		alert('Updated')
		window.location="Department.php"
		</script>
        <?php
	}
	}
}
if(isset($_GET['del']))
{
	$del="delete from tbl_department where dept_id ='".$_GET['del']."'";
	
	if($con->query($del))
	{
	
	?>
        <script>
		alert('Deleted');
		window.location = "Department.php";
		</script>
        <?php
	}
}
if(isset($_GET['edi']))
{
	$sel="select * from tbl_department where dept_id='".$_GET['edi']."'";
	$res=$con->query($sel);
	$resdata=$res->fetch_assoc();
	$deptname=$resdata['dept_name'];
	$deptid=$resdata['dept_id'];
	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Department</title>
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
<h1 align="center">Department</h1>
<table  border="1" align="center">
  <tr>
    <td  height="80">DEPARTMENT NAME</td>
    <td>
      <label for="txt_dpname"></label>
      <input type="text" name="txt_dpname" id="txt_dpname" value="<?php echo $deptname ?>" required/>
       <input type="hidden" name="txt_id" id="txt_id" value="<?php echo $deptid ?>" /></td>
    </td>
  </tr>
  <tr>
    <td colspan="2">
      <div align="center">
        <input type="submit" name="btn_sub" id="btn_sub" value="Submit" />
        <input type="reset" name="btn_cel" id="btn_cel" value="Cancel" />
      </div></td>
  </tr>
</table>
</br></br>
<table align="center" border="2">
<tr>
<td>SI.no</td>
<td>NAME</td>
<td>ACTION</td>
</tr>
<?php 
$i=0;
$sel = "select * from tbl_department";
$result = $con -> query($sel);
while($data = $result -> fetch_assoc())

{
	$i++;
?>
<tr>
	  <td><?php echo $i ?></td>
      <td><?php echo $data['dept_name'];?></td>
      <td><a href="Department.php?del=<?php echo $data['dept_id'];?>" class="a">Delete</a>
      <a href="Department.php?edi=<?php echo $data['dept_id'];?>" class="a">Edit</a></td>
</tr>
<?php } ?>
</table>
</form>
</body>
</html>

<?php include("Foot.php"); ?>