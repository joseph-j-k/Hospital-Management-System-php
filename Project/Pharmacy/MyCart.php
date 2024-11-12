
<?php
session_start();
include("../Assets/Connection/Connection.php");
include("Head.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <style>
         /* General Styles */
body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 20px;
}

h1 {
    color: #333;
    font-weight: 300;
    text-align: center;
    margin-bottom: 20px;
}

/* Shopping Cart Styles */
.shopping-cart {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.column-labels {
    display: flex;
    justify-content: space-between;
    padding-bottom: 15px;
    border-bottom: 1px solid #eee;
    margin-bottom: 20px;
}

.column-labels label {
    font-weight: bold;
    text-align: center;
}

/* Product Styles */
.product {
    display: flex;
    justify-content: space-between;
    padding: 10px 0;
    border-bottom: 1px solid #eee;
}

.product-details {
    display: flex;
    align-items: center;
    flex: 2;
}

.product-title {
    font-size: 16px;
    font-weight: bold;
    margin-right: 20px;
}

.product-description {
    font-size: 14px;
    color: #666;
}

.product-price,
.product-quantity,
.product-removal,
.product-line-price {
    display: flex;
    align-items: center;
    justify-content: center;
    flex: 1;
}

.product-price,
.product-line-price {
    font-weight: bold;
}

.product-quantity input {
    width: 60px;
    padding: 5px;
    border: 1px solid #ddd;
    border-radius: 4px;
    text-align: center;
}

.remove-product {
    background-color: #e74c3c;
    color: #fff;
    border: none;
    padding: 5px 10px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 14px;
}

.remove-product:hover {
    background-color: #c0392b;
}

/* Totals Section */
.totals {
    margin-top: 20px;
    text-align: right;
    font-size: 16px;
    font-weight: bold;
}

.totals-item {
    margin-bottom: 10px;
}

.checkout {
    display: block;
    width: 10%;
    background-color: #2ecc71;
    color: #fff;
    border: none;
    padding: 15px;
    border-radius: 4px;
    font-size: 18px;
    cursor: pointer;
    text-align: center;
    text-decoration: none;
}

.checkout:hover {
    background-color: #27ae60;
}

/* Responsive Styles */
@media screen and (max-width: 650px) {
    .column-labels {
        display: none;
    }

    .product {
        flex-direction: column;
    }

    .product-details,
    .product-price,
    .product-quantity,
    .product-removal,
    .product-line-price {
        width: 100%;
        text-align: center;
    }

    .product-quantity input {
        width: 100%;
        margin-top: 10px;
    }

    .product-removal {
        margin-top: 10px;
    }
}

@media screen and (max-width: 350px) {
    .checkout {
        font-size: 16px;
    }
}

        </style>
    </head>
    <?php
        if (isset($_POST["btn_checkout"])) {        
                 $amt = $_POST["carttotalamt"];
				$selC = "select * from tbl_booking where appointment_id ='" .$_SESSION["aid"]. "'and booking_staus = '0'";
                $rs = $con->query($selC);
                $row=$rs->fetch_assoc();
                $upQry1 = "update tbl_booking set booking_datetime = curdate(), booking_amt = '".$amt."', booking_staus = '1' where appointment_id ='" .$_SESSION["aid"]. "'";
                if($con->query($upQry1))
                {
					$upQry1s = "update tbl_cart set cart_status = '1' where booking_id='" .$row["booking_id"]. "'";
					if($con->query($upQry1s))
					{
					  $_SESSION["bid"] = $row["booking_id"];
					  ?>
					  <script>
						 window.location="Bill.php";
					  </script>
					  <?php
					}    
                }
			}
	?>
    <body onload="recalculateCart()">
        <h1>Cart</h1>
            <div class="column-labels">
                <label class="product-price" style="width: 16%; text-align:center" align="center">Medicine</label>	
                <label class="product-price" style="width: 16%; text-align:center" align="center">Details</label>	
                <label class="product-price" style="width: 10%; text-align:center" align="center">Price</label>
                <label class="product-price" style="width: 10%; text-align:center" align="center">Qty</label>
                <label class="product-price" style="width: 10%; text-align:center" align="center">Stock</label>
                <label class="product-price" style="width: 10%; text-align:center" align="center">Remove</label>
                <label class="product-price" style="width: 16%; text-align:center" align="center">Total</label>
            </div>
<form method="post">
        <div class="shopping-cart" style="margin-top: 50px">            
            <?php                
            $sel = "select * from tbl_booking b inner join tbl_cart c on c.booking_id=b.booking_id where b.appointment_id ='" .$_SESSION["aid"]. "' and booking_staus = '0'";
               $res = $con->query($sel);
                while ($row=$res->fetch_assoc()) {
                    $selPr = "select * from tbl_medicine where medicine_id ='" .$row["medicine_id"]. "'";
                    $respr = $con->query($selPr);
                    if ($rowpr=$respr->fetch_assoc()) {
                         $selstock = "select sum(stock_qty) as stock from tbl_stock where medicine_id='".$rowpr["medicine_id"]."'";
                        $resst = $con->query($selstock);


                    if ($rowst=$resst->fetch_assoc()) {

                        $selstocka = "select sum(cart_qty) as stock from tbl_cart where medicine_id='".$rowpr["medicine_id"]."' and cart_status > 0";
                        $ressta = $con->query($selstocka);
                        $rowsta=$ressta->fetch_assoc();

                        $stock = $rowst["stock"] - $rowsta["stock"];
            ?>
            <div class="product">
                <div class="product-details">
                    <div class="product-title" style="margin-left:50px; margin-right:90px;"><?php echo $rowpr["medicine_name"] ?></div>
                    <p class="product-description">
                    <?php echo $rowpr["medicine_details"] ?>
                    </p>
                </div>
                <div class="product-price"><?php echo $rowpr["medicine_price"] ?></div>
                <div class="product-quantity" style="margin-right: 10px;">
                    <input alt="<?php echo $row["cart_id"] ?>" type="number" value="<?php echo $row["cart_qty"] ?>" min="1" max="<?php echo $stock ?>" align="center"/>
                </div>
                <div class="product-quantity" style="margin-left: 30px;">
                    <input  type="number" value="<?php echo $stock ?>" readonly align="center"/>
                </div>
                <div class="product-removal">
                    <button class="remove-product" value="<?php echo $row["cart_id"] ?>">Remove</button>
                </div>
                <div class="product-line-price" >
                    <?php
                        $pr = $rowpr["medicine_price"];
                        $qty = $row["cart_qty"];
                        $tot = (int)$pr * (int)$qty;
                        echo $tot;
                    ?>
                </div>
            </div>
            <?php
                    }
                }
              
                }
            ?>

            <div class="totals">
                <div class="totals-item totals-item-total" style="margin-right:50px">
                    <label>Grand Total</label>
                    <div class="totals-value" id="cart-total" style="margin-right: 10px">0</div>
                    <input type="hidden" id="cart-totalamt" name="carttotalamt" value=""/>
                </div>
            </div>
                <button type="submit" class="checkout" name="btn_checkout">Bill</button>
        </div>
</form>
        <!-- partial -->
        <script src="../Assets/JQ/jQuery.js"></script>
        <script>
        /* Set rates + misc */
        var fadeTime = 300;
        /* Assign actions */
        $(".product-quantity input").change(function() {
            $.ajax({
                url: "../Assets/AjaxPages/AjaxCart.php?action=Update&id=" + this.alt + "&qty=" + this.value
            });
            updateQuantity(this);
        });
        $(".product-removal button").click(function() {
            $.ajax({
                url: "../Assets/AjaxPages/AjaxCart.php?action=Delete&id=" + this.value
            });
            removeItem(this);
        });
        /* Recalculate cart */
        function recalculateCart() {
            var subtotal = 0;
            /* Sum up row totals */
            $(".product").each(function() {
                subtotal += parseFloat(
                        $(this).children(".product-line-price").text()
                        );
            });
            /* Calculate totals */
            var total = subtotal;
            /* Update totals display */
            $(".totals-value").fadeOut(fadeTime, function() {
                $("#cart-total").html(total.toFixed(2));
                document.getElementById("cart-totalamt").value = total.toFixed(2);
                if (total == 0) {
                    $(".checkout").fadeOut(fadeTime);
                } else {
                    $(".checkout").fadeIn(fadeTime);
                }
                $(".totals-value").fadeIn(fadeTime);
            });
        }
        /* Update quantity */
        function updateQuantity(quantityInput) {
            /* Calculate line price */
            var productRow = $(quantityInput).parent().parent();
            var price = parseFloat(productRow.children(".product-price").text());
            var quantity = $(quantityInput).val();
            var linePrice = price * quantity;
            /* Update line price display and recalc cart totals */
            productRow.children(".product-line-price").each(function() {
                $(this).fadeOut(fadeTime, function() {
                    $(this).text(linePrice.toFixed(2));
                    recalculateCart();
                    $(this).fadeIn(fadeTime);
                });
            });
        }
        /* Remove item from cart */
        function removeItem(removeButton) {
            /* Remove row from DOM and recalc cart total */
            var productRow = $(removeButton).parent().parent();
            productRow.slideUp(fadeTime, function() {
                productRow.remove();
                recalculateCart();
            });
        }
        $('.switch2 input').on('change', function() {
            var dad = $(this).parent();
            if ($(this).is(':checked'))
                dad.addClass('switch2-checked');
            else
                dad.removeClass('switch2-checked');
        });
        </script>
    </body>
    <?php
	include("Foot.php");
	?>
</html>
