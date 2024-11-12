<?php
include("../Assets/Connection/Connection.php");
session_start(); 
$selqryP = "select * from tbl_appoinment a inner join tbl_patient p on  p.patient_id = a.patient_id where a.appoinment_id = '".$_SESSION['aid']."'";
$result1 = $con -> query($selqryP);
$data1 = $result1 -> fetch_assoc();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Tax Invoice</title>
    <link rel="shortcut icon" type="image/png" href="./favicon.png" />
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Roboto', Arial, Helvetica, sans-serif;
            background-color: #f9fafb;
            color: #333;
            line-height: 1.6;
            padding: 20px;
        }

        .main-pd-wrapper {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 30px;
            max-width: 900px;
            margin: auto;
        }

        h4 {
            font-size: 22px;
            margin-bottom: 15px;
            color: #555;
        }

        .table-bordered {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
            border: 1px solid #ddd;
        }

        .table-bordered th, .table-bordered td {
            padding: 15px;
            border: 1px solid #ddd;
            text-align: left;
            font-size: 16px;
        }

        .table-bordered th {
            background-color: #f1f5f8;
            color: #444;
            font-weight: 600;
        }

        .table-bordered tbody tr:nth-child(odd) {
            background-color: #f9f9f9;
        }

        .table-bordered tbody tr:nth-child(even) {
            background-color: #ffffff;
        }

        .header-title {
            text-align: center;
            font-size: 28px;
            font-weight: 700;
            color: #ff6f61;
            margin-bottom: 30px;
        }

        .address-section {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
        }

        .address-section div {
            flex: 1;
            padding: 10px;
            font-size: 16px;
        }

        .address-section div h4 {
            margin-bottom: 10px;
            color: #ff6f61;
        }

        .order-summary {
            margin-top: 30px;
            background-color: #f5f5f5;
            padding: 15px;
            border-radius: 5px;
            font-weight: 500;
        }

        .order-summary td {
            text-align: right;
        }

        button#cmd {
            color: #FFF;
            background: #ff6f61;
            border: none;
            padding: 12px 25px;
            font-size: 18px;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
            float: right;
        }

        button#cmd:hover {
            background: #ff4c3b;
        }

        .invoice-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .invoice-header span {
            color: #ff6f61;
            font-size: 36px;
            font-weight: 700;
        }

        .invoice-header p {
            margin: 5px 0;
            font-size: 16px;
            color: #555;
        }

        .invoice-header a {
            color: #00bb07;
            text-decoration: none;
        }

        @media print {
            body {
                background-color: white;
            }
            .main-pd-wrapper {
                box-shadow: none;
                margin: 0;
            }
            button#cmd {
                display: none;
            }
        }
    </style>
  </head>
  <body>
 <br /><br /><br /><br /><br /><br />
  <button id="cmd" onClick="printDiv('content')" style="float:right;color:#FFF;background:#0C0;border:none;margin:20px;padding:10px;border-radius:10px" >Download Bill</button>
    <section class="main-pd-wrapper" style="width: 1000px; margin: auto" id="content">
      <div style="display: table-header-group">
        <h4 style="text-align: center; margin: 0">
          <b>Tax Invoice</b>
        </h4>

        <table style="width: 100%; table-layout: fixed">
          <tr>
            <td
              style="border-left: 1px solid #ddd; border-right: 1px solid #ddd"
            >
              <div
                style="
                  text-align: center;
                  margin: auto;
                  line-height: 1.5;
                  font-size: 14px;
                  color: #4a4a4a;
                "
              >
              	<span
                style="color:#F93;font-size:56px"><?php echo  $_SESSION["phname"] ?></span>

                <p style="font-weight: bold; margin-top: 15px">
                  GST TIN : 06AAFCD6498P1ZT
                </p>
                <p style="font-weight: bold">
                  Toll Free No. :
                  <a href="tel:018001236477" style="color: #00bb07"
                    >1800-123-6477</a
                  >
                </p>
              </div>
            </td>
            <td
              align="right"
              style="
                text-align: right;
                padding-left: 50px;
                line-height: 1.5;
                color: #323232;
              "
            >
              <div>
                <h4 style="margin-top: 5px; margin-bottom: 5px">
                  Bill to/ Ship to
                </h4>
                <p style="font-size: 14px">
                <?php echo $data1["patient_name"] ?>
                <br />
                  <?php echo $data1["patient_address"] ?>
                  <br />
                  Tel:<?php echo $data1["patient_contact"] ?>
                </p>
              </div>
            </td>
          </tr>
        </table>
      </div>
      <table
        class="table table-bordered h4-14"
        style="width: 100%; -fs-table-paginate: paginate; margin-top: 15px"
      >
        <thead style="display: table-header-group">
          <tr
            style="
              margin: 0;
              background: #fcbd021f;
              padding: 15px;
              padding-left: 20px;
              -webkit-print-color-adjust: exact;
            "
          >
            <td colspan="3">
              <p>Booking Date:- <?php echo $data1["appoinment_datetime"] ?></p>
              <p style="margin: 5px 0">Invoice Generated:- <?php echo date("Y-m-d"); ?></p>
            </td>
            <td colspan="3" style="width: 300px">
              <h4 style="margin: 0">Sold By:</h4>
              <p>
                <!-- Hospital Address -->
                 Medicine for Research Center 
              </p>
            </td>
          </tr>

          <tr>
            <th style="width: 50px">#</th>
            <th style="width: 150px">Medicine</th>
            <th style="width: 150px">Price</th>
            <th style="width: 80px">Qty</th>
            <th style="width: 120px"><h4>TOTAL Value</h4></th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $i=0;
        $selqryC = "select * from tbl_cart c inner join tbl_booking b on b.booking_id = c.booking_id inner join tbl_appoinment a on a.appoinment_id = b.appointment_id  inner join tbl_medicine m on m.medicine_id = c.medicine_id where a.appoinment_id='".$_SESSION['aid']."'";
          $result2 = $con -> query($selqryC);
          $total=0;
          while($data2 = $result2 -> fetch_assoc())
          {
            $i++;
          ?>
          <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $data2["medicine_name"] ?></td>
            <td><?php echo $data2["medicine_price"] ?></td>
            <td><?php echo $data2["cart_qty"] ?></td>
            <td><?php echo $data2["medicine_price"] * $data2["cart_qty"] ?></td>
          </tr>
          <?php 
           $total = $total + ($data2["medicine_price"] * $data2["cart_qty"]);
        } ?>
        </tbody>
        <tfoot></tfoot>
      </table>

      
      <table class="hm-p table-bordered" style="width: 100%; margin-top: 30px">
        
        <tr style="background: #fcbd02">
          <th>Total Order Value</th>
          <td style="width: 70px; text-align: right; border-right: none">
            <b><?php echo $total ?></b>
          </td>
          <td colspan="5" style="border-left: none"></td>
        </tr>
      </table>
    </section>
    
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js'></script>
<script>
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
</body>
</html>