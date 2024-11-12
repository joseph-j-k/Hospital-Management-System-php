<?php
include('../Assets/Connection/Connection.php');
session_start();


$pid = $_GET["m"];

if(isset($_POST["btn_submit"]))
{
	$qty = $_POST["txt_quantity"];
	
	$insQry = "insert into tbl_stock(stock_qty, stock_date, medicine_id) values('".$qty."', curdate(), '".$pid."')";
	if($con->query($insQry))
	{
		
		?>
		<script>
			alert('Inserted')
			window.location.href="Stock.php?m=<?php echo $pid; ?>"
			</script>
        <?php
            
	}
	
}
if(isset($_GET['did']))
{
	$del="delete from tbl_stock where stock_id ='".$_GET['did']."'";
	
	if($con->query($del))
	{
	
        ?>
		<script>
			alert('Deleted')
			window.location.href="Stock.php?m=<?php echo $pid; ?>"
			</script>
        <?php
	}
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Stock</title>
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
        background: #fff;
    }
    th, td {
        padding: 10px;
        border: 1px solid #ccc;
        text-align: left;
    }
    th {
        background-color: #f2f2f2;
        color: #333;
    }
    tr:hover {
        background-color: #e8e8e8;
    }
    input[type="text"] {
        width: 70%;
        padding: 8px;
        margin: 10px 0;
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
        color: #ff0000;
        text-decoration: none;
    }
    .a:hover {
        text-decoration: underline;
    }
</style>
</head>

<body>
<form action="" method="post">
<h1 align="center">Stock</h1>
<table  border="1" align="center">
  <tr>
    <td>Quantity</td>
    <td><label for="txt_quantity"></label>
      <input type="text" name="txt_quantity" id="txt_quantity" required/></td>
     </tr>
  <tr>
    <td colspan="2" align="center">
    <input type="submit" name="btn_submit" id="btn_submit" value="Add" />
    
     
    </tr>
</table>

<br /><br />

<table  border="1" align="center">
  <tr>
    <td>SIno.</td>
    <td>Medicine</td>
    <td>Qunatity</td>
    <td>Date</td>
    <td>Action</td>
  </tr>
  <?php 
  $i=0;
  $stock1 = "select * from tbl_stock s inner join tbl_medicine m on m.medicine_id = s.medicine_id where m.medicine_id = '".$pid."'";
  $result1 = $con -> query($stock1);

  while($data = $result1 -> fetch_assoc())
  	{
		$i++;
  ?>
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $data["medicine_name"]?></td>
    <td><?php echo $data["stock_qty"]?></td>
    <td><?php echo $data["stock_date"]?></td>
    <td>
    <a href="Stock.php?m=<?php echo $pid; ?>&did=<?php echo $data1["stock_id"]; ?>" class="a">Delete</a>
    </td>
  </tr>
  <?php } ?>
</table>


<h1>Stock Table</h1>
<table  border="1" align="center">
  <tr>
    <td align="center">Total Stock</td>
    <td align="center">Stock Sold out</td>
    <td align="center">Remaining Stock</td>
  </tr>
  <?php 
  $totalStockQuery = "select SUM(stock_qty) AS total_stock from tbl_stock WHERE medicine_id = '".$pid."'";
  $totalStockResult = $con -> query($totalStockQuery);
  $totalStockData = $totalStockResult -> fetch_assoc();
  $totalStock = isset($totalStockData['total_stock']) ? $totalStockData['total_stock'] : 0;

  $cartQuery = "SELECT SUM(cart_qty) AS cart_qty FROM tbl_cart WHERE medicine_id = '".$pid."'";
  $cartResult = $con->query($cartQuery);
  $cartData = $cartResult->fetch_assoc();
  $cartQty = isset($cartData['cart_qty']) ? $cartData['cart_qty'] : 0;

  $remainingStock = $totalStock - $cartQty;
  ?>
  <tr>
    <td align="center"><?php echo $totalStock ?></td>
    <td align="center"><?php echo $cartQty ?></td>
    <td align="center"><?php echo $remainingStock ?></td>
  </tr>
</table>

</form>

</body>
</html>