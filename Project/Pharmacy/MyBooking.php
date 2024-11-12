<?php
include("../Assets/Connection/Connection.php");
session_start();
$selqry="select * from tbl_booking b inner join tbl_cart c on c.booking_id=b.booking_id inner join tbl_medicine m on m.medicine_id = c.medicine_id where booking_staus > 1 and cart_status>0 and  appointment_id ='".$_SESSION["aid"]."'";
$result=$con->query($selqry);	
include("Head.php");	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Galerie DArt::My Booking</title>
</head>

<body>
<div id="tab" align="center">
<h1>My Booking</h1>
<form id="form1" name="form1" method="post" action="">
  <table border="1">
    <tr align="center">
      <td>SlNO</td>
      <td>Name</td>
      <td>Quantity</td>
      <td>Price</td>
      <td>Total amount</td>
      <td>Status</td>
    </tr>
     <?php
	 $i=0;
	while($row=$result->fetch_assoc())
	{
		
		$qty=$row["cart_qty"];
	$price=$row["medicine_price"];
	$totalamt=$qty*$price;
		 $i++;
  ?>
  <tr align="center">
          <td><?php echo $i; ?></td>
          <td><?php echo $row["medicine_name"];?></td>
          <td><?php echo $row["cart_qty"];?></td>
          <td><?php echo $row["medicine_price"];?></td>
          <td><?php echo $totalamt;?></td>
          <td>
          <?php
                
					if($row["booking_staus"]==1 && $row["cart_status"]==0)
					{
						echo "Payment Pending....";
					}
					else if($row["booking_staus"]==2 && $row["cart_status"]==1)
					{
						?>
                        Payment Completed 
                        <?php
					}
					else if($row["booking_staus"]==2 && $row["cart_status"]==2)
					{
						?>
                        Order Completed 
                        <?php
					}
				
				
				?>
          </td>

  </tr>
  <?php
	}
	?>
  </table>
</form>
</div>
</body>
<?php
include("Foot.php");
?>
</html>