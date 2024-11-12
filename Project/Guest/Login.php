<?php include("Head.php")?>
<?php include('../Assets/Connection/Connection.php') ?>
<?php 
session_start();
if(isset($_POST["btn_submit"]))
{
	
	$email = $_POST["txt_email"];
	$password = $_POST["txt_password"];
	
	$selStaff = "select * from tbl_staff where staff_email = '".$email."' and staff_password = '".$password."'";
	
	$selDoctor = "select * from tbl_doctor where doctor_email = '".$email."' and doctor_password = '".$password."'";
	
		
	$selpharmacy = "select * from tbl_pharmacy where pharmacy_email = '".$email."' and pharmacy_password = '".$password."'";

     $selAdmin = "select * from tbl_admin where admin_email = '".$email."' and admin_password = '".$password."'";
	
	
	
	
	$result1 = $con -> query($selStaff);
	if($dataStaff = $result1 -> fetch_assoc())
	{
		
		$_SESSION["sid"] = $dataStaff["staff_id"];
          $_SESSION["sname"] = $dataStaff["staff_name"];
		header("location:../Staff/HomePage.php");
		
		
		}
	
	
	$result2 = $con -> query($selDoctor);
	if($dataDoctor = $result2 -> fetch_assoc())
	{
		
		$_SESSION["docid"] = $dataDoctor["doctor_id"];
          $_SESSION["dname"] = $dataDoctor["doctor_name"];
		header("location:../Doctor/HomePage.php");
		
		
		}
	$result3 = $con -> query($selpharmacy);
	if($dataPharmacy = $result3 -> fetch_assoc())
	{
		
		$_SESSION["phid"] = $dataPharmacy["pharmacy_id"];
          $_SESSION["phname"] = $dataPharmacy["pharmacy_name"];
		header("location:../Pharmacy/HomePage.php");
		
		
		}	


     $result4 = $con -> query($selAdmin);
     if($dataAdmin = $result4 -> fetch_assoc())
     {
               
          $_SESSION["aid"] = $dataAdmin["admin_id"];
          $_SESSION["aname"] = $dataAdmin["admin_name"];
          header("location:../Admin/Dashboard.php");
               
               
          }	

	}

?>
<!-- MAKE AN APPOINTMENT -->
<section id="appointment" data-stellar-background-ratio="3">
          <div class="container">
               <div class="row">

                    <div class="col-md-6 col-sm-6">
                         <img src="../Assets/Templates/User/Main/images/appointment-image.jpg" class="img-responsive" alt="">
                    </div>

                    <div class="col-md-6 col-sm-6">
                         <!-- CONTACT FORM HERE -->
                         <form id="appointment-form" role="form" method="post" action="">

                              <!-- SECTION TITLE -->
                              <div class="section-title wow fadeInUp" data-wow-delay="0.4s">
                                   <h3>#Your health, our priority</h3>
								   <h2>Log in to continue</h2>
                              </div>

                              <div class="wow fadeInUp" data-wow-delay="0.8s">
                                   <div class="col-md-12 col-sm-12">
                                        <label for="txt_email">Email</label>
                                        <input type="email" class="form-control" id="txt_email" name="txt_email" placeholder="Your Email" required autocomplete="off">
                                   </div>
								   <div class="col-md-12 col-sm-12">
                                        <label for="txt_password">Password</label>
                                        <input type="Password" class="form-control" id="txt_password" name="txt_password" placeholder="Your Password" required autocomplete="off">
                                   </div>
                                   <div class="col-md-12 col-sm-12">
                                        <button type="submit" class="form-control" id="cf-submit" name="btn_submit">Login</button>
                                   </div>
                              </div>
                        </form>
                    </div>

               </div>
          </div>
     </section>
     
<?php include("Foot.php")?>
