<?php
include("../Connection/Connection.php");

    if (isset($_GET["action"])) {

         $sqlQry = "select * from tbl_medicine m inner join tbl_subcategory s on s.subcat_id = m.subcat_id inner join tbl_category c on c.category_id=s.category_id where true ";
        $row = "SELECT count(*) as count from tbl_medicine m inner join tbl_subcategory s on s.subcat_id = m.subcat_id  inner join tbl_category c on c.category_id=s.category_id where true ";


        if ($_GET["category"] != null) {

            $category = $_GET["category"];

            $sqlQry = $sqlQry." AND c.category_id IN(".$category.")";
            $row = $row." AND c.category_id IN(".$category.")";
        }
        if ($_GET["subcategory"] != null) {

            $subcategory = $_GET["subcategory"];

            $sqlQry = $sqlQry." AND s.subcat_id IN(".$subcategory.")";
            $row = $row." AND s.subcat_id IN(".$subcategory.")";
        }

		//   echo $sqlQry;
        $resultS = $con->query($sqlQry);
        $resultR = $con->query($row);
     
	 
        if ($resultR && $resultS) {  // Check if both queries were successful
            $rowR = $resultR->fetch_assoc();

        if ($rowR["count"] > 0) {
            while ($row1 = $resultS->fetch_assoc()) {
            ?>
                        <div class="col-md-3 mb-2">
                            <div class="card-deck">
                                <div class="card border-secondary">
                                    <div class="card-img-secondary">
                                        <h6  class="text-light bg-info text-center rounded p-1"><?php echo $row1["medicine_name"]; ?></h6>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title text-danger" align="center">
                                            Price : <?php echo $row1["medicine_price"]; ?>/-
                                        </h4>
                                        <div class="card-body">
                                       
                                        <p align="center">
                                            <?php echo $row1["category_name"]; ?><br>
                                            <?php echo $row1["subcat_name"]; ?><br>
                                        </p>
                                        <?php
                                           
                                            $stock = "select sum(stock_qty) as stock from tbl_stock where medicine_id = '" . $row1["medicine_id"] . "'";
											 $result2 = $con -> query($stock);
                            				$row2 = $result2 -> fetch_assoc();


                                            $stocka = "select sum(cart_qty) as stock from tbl_cart where medicine_id = '" . $row1["medicine_id"] . "'";
                                            $result2a = $con -> query($stocka);
                                           $row2a = $result2a -> fetch_assoc();

                                           $stock = $row2["stock"] - $row2a["stock"];
										   if ($stock > 0) {
                                            ?>
                                                <a href="javascript:void(0)" onclick="addCart('<?php echo $row1['medicine_id'] ?>')" class="btn btn-success btn-block">Add to Cart</a>
                                            <?php
                                            } else if ($stock == 0) {
                                            ?>
                                                <a href="javascript:void(0)" class="btn btn-danger btn-block">Out of Stock</a>
                                            <?php
                                            } else {
                                            ?>
                                                <a href="javascript:void(0)" class="btn btn-warning btn-block">Stock Not Found</a>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
            <?php
                        }
                    } else {
                        echo "<h4 align='center'>Medicine Not Found!!!!</h4>";
                    }
                } else {
                    echo "Error executing queries.";
                }
            }
            ?>