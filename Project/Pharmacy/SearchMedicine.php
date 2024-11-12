<?php
include("../Assets/Connection/Connection.php");
session_start();
include("Head.php");
$_SESSION['aid']=$_GET['aid'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Search</title>
<link rel="stylesheet" href="../Assets/Templates/Search/bootstrap.min.css">
   <style>
            body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
    margin: 0;
    padding: 0;
}

.container-fluid {
    margin-top: 20px;
}

h5 {
    color: #343a40;
    font-weight: bold;
}

h6 {
    color: #007bff;
    font-weight: bold;
}

ul.list-group {
    margin-bottom: 20px;
}

.list-group-item {
    border-radius: 5px;
    border: 1px solid #dee2e6;
    margin-bottom: 10px;
    transition: background-color 0.3s ease;
}

.list-group-item:hover {
    background-color: #e9ecef;
}

button {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #0056b3;
}

.text-center img {
    margin-top: 20px;
}

.custom-alert-box {
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    margin: 20px;
}

.alert-box {
    width: 300px;
    padding: 15px;
    border-radius: 5px;
    margin-bottom: 10px;
}

.success {
    color: #3c763d;
    background-color: #dff0d8;
    border-color: #d6e9c6;
    display: none;
}

.failure {
    color: #a94442;
    background-color: #f2dede;
    border-color: #ebccd1;
    display: none;
}

.warning {
    color: #8a6d3b;
    background-color: #fcf8e3;
    border-color: #faebcc;
    display: none;
}

        </style>
</head>

<body onload="productCheck()">
        <div class="custom-alert-box">
            <div class="alert-box success">Successful Added to Cart !!!</div>
            <div class="alert-box failure">Failed to Add Cart !!!</div>
            <div class="alert-box warning">Already Added to Cart !!!</div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <h5>Filter Product</h5>
                    <hr>
                    <br />
                    <h6 class="text-info"> Select Category</h6>
                    <ul class="list-group">
                        <?php                           
						 $selCat = "SELECT * from tbl_category";
                            $result = $con->query($selCat);
                            while ($row=$result->fetch_assoc()) {
                        ?>
                        <li class="list-group-item">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" onclick="changeSub(),productCheck()" class="form-check-input product_check" value="<?php echo $row["category_id"]; ?>" id="category"><?php echo $row["category_name"]; ?>
                                </label>
                            </div>
                        </li>
                        <?php
                            }
                        ?>	
                    </ul>
                    <br />
                    <h6 class="text-info"> Select Sub Category</h6>
                    <ul class="list-group" id="subcat">
                        <?php                           
						   $selSubCat = "SELECT * from tbl_subcategory";
                           $resultsc = $con->query($selSubCat);
                            while ($rowsc=$resultsc->fetch_assoc()) {
                        ?>
                         <li class="list-group-item">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" onchange="productCheck()" class="form-check-input product_check" value="<?php echo $rowsc["subcat_id"]; ?>" id="subcategory"><?php echo $rowsc["subcat_name"]; ?>
                                </label>
                            </div>
                        </li> 
                        <?php
                             }
                        ?>
                    </ul>
                    <br />
                    
                </div>
                <div class="col-lg-9">
                    <h5 class="text-center" id="textChange">All Products</h5><a href="MyCart.php"><button class="btn btn-primary">View Cart</button></a>

                    <hr>
                    <div class="text-center">
                        <img src="../Assets/Templates/Search/loader.gif" id='loder' width="200" style="display: none"/>
                    </div>
                    <div class="row" id="result">

                    </div>

                </div>

            </div>
                        </div>
<script src="../Assets/Templates/Search/jquery.min.js"></script>
        <script src="../Assets/Templates/Search/bootstrap.min.js"></script>
<script src="../Assets/Templates/Search/popper.min.js"></script>
        <script>


function changeSub()
            {
                var cat = get_filter_text('category');
                if (cat.length !== 0)
                {
                    $.ajax({
                        url: "../Assets/AjaxPages/AjaxSearchSubCategory.php?data=" + cat,
                        success: function(response) {
                            $("#subcat").html(response);
                        }
                    });

                }
                else
                {
                    $("#subcat").html("");
                }


                function get_filter_text(text_id)
                {
                    var filterData = [];

                    $('#' + text_id + ':checked').each(function() {
                        filterData.push("\'" + $(this).val() + "\'");
                    });
                    return filterData;
                }
            }

            function addCart(id)
            {
                $.ajax({
                    url: "../Assets/AjaxPages/AjaxAddCart.php?id=" + id,
                    success: function(response) {
                        if (response.trim() === "Added to Cart")
                        {
                            $("div.success").fadeIn(300).delay(1500).fadeOut(400);
                        }
                        else if (response.trim() === "Already Added to Cart")
                        {
                            $("div.warning").fadeIn(300).delay(1500).fadeOut(400);
                        }
                        else
                        {
                            $("div.failure").fadeIn(300).delay(1500).fadeOut(400);
                        }
                    }
                });
            }


            function productCheck(){
                    $("#loder").show();

                    var action = 'data';
                    var category = get_filter_text('category');
                    var subcategory = get_filter_text('subcategory');
				

                    $.ajax({
                        url: "../Assets/AjaxPages/AjaxSearchMedicine.php?action=" + action +"&category=" + category+"&subcategory=" + subcategory  ,
                        success: function(response) {
							
                            $("#result").html(response);
                            $("#loder").hide();
                            $("#textChange").text("Filtered Products");
                        }
                    });


                }



                function get_filter_text(text_id)
                {
                    var filterData = [];

                    $('#' + text_id + ':checked').each(function() {
                        filterData.push($(this).val());
                    });
                    return filterData;
                }
            
        </script>
        <?php include("Foot.php");?>
    </body>
</html>