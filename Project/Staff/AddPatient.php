<?php
 include('../Assets/Connection/Connection.php'); 
 session_start();
 ?>
 <?php include("Head.php") ?>
<?php 

// Fetch the latest patient_id
$fetchQry = "SELECT MAX(patient_id) as max_id FROM tbl_patient";
$result = $con -> query($fetchQry);

$row = $result -> fetch_assoc();
$patientId = $row['max_id'] ? $row['max_id'] + 1 : 1;  // If no patients, start from 1

// Generate OP number (1000 + primary key of patient)
$OP = 1000 + $patientId;


if(isset($_POST["btn_submit"]))
{	

	$place = $_POST["selPlace"];
	$name = $_POST["txt_name"];
	$contact = $_POST["txt_contact"];
	$address = $_POST["txt_address"];
	$gender = $_POST["radio_gender"];
	$dob = $_POST["txtDate"];
	$OP = $_POST["txtOP"];
	

		$insQry = "insert into  tbl_patient(patient_name, patient_contact, patient_address, patient_gender, patient_dob, patient_opno, place_id)values('".$name."','".$contact."','".$address."','".$gender."','".$dob."','".$OP."','".$place."')";
		
		if($con -> query($insQry))
		{
			
			echo "<script>
			alert('Inserted');
			window.location = 'AddPatient.php';
				</script>";
			
			}
	
	
	
	}


?>
<!-- MAKE AN APPOINTMENT -->
<section id="appointment" data-stellar-background-ratio="3">
          <div class="container">
               <div class="row">

                    <div class="col-md-6 col-sm-6">
                         <img src="https://cdn.pixabay.com/photo/2015/05/24/06/13/medical-781422_1280.jpg" class="img-responsive" alt="">
                    </div>

                    <div class="col-md-6 col-sm-6">
                         <!-- CONTACT FORM HERE -->
                         <form id="appointment-form" role="form" method="post" action="" enctype="multipart/form-data">

                              <!-- SECTION TITLE -->
                              <div class="section-title wow fadeInUp" data-wow-delay="0.4s">
                                   <h4>#Caring for patients</h4>
                                   <h2>One heartbeat at a time</h2>
                              </div>

                              <div class="wow fadeInUp" data-wow-delay="0.8s">
                              <div class="col-md-12 col-sm-12">
                                        <label for="txtOP">OP Number (Auto-Generated)</label>
                                        <input type="text" class="form-control" name="txtOP" id="txtOP" readonly value="<?php echo isset($OP) ? $OP : ''; ?>" >
                                   </div>

                                   <div class="col-md-12 col-sm-12">
                                        <label for="txt_name">Name</label>
                                        <input type="text" class="form-control" name="txt_name" id="txt_name" placeholder=" Your Full Name" required autocomplete="off">
                                   </div>

                                   <div class="col-md-6 col-sm-6">
                                        <label for="txt_contact">Contact</label>
                                        <input type="text" class="form-control" name="txt_contact" id="txt_contact" placeholder="Your Contact" required pattern="[0-9]{10,10}" autocomplete="off">
                                   </div>

                                   <div class="col-md-6 col-sm-6">
                                        <label for="txt_contact">DOB</label>
                                        <input type="date" class="form-control" name="txtDate" id="txtDate"  required >
                                   </div>

                                   <div class="col-md-6 col-sm-6">
                                   <label for="radio_gender">Gender</label>
                                   <br>
                                   <div style="display: flex; align-items: center;">
                                        <input type="radio" name="radio_gender" id="radio_gender" value="Male"/>
                                        <label for="radio_gender" style="margin-right: 20px; margin-left: 5px;">Male</label>
                                        
                                        <input type="radio" name="radio_gender" id="radio_gender" value="Female"/>
                                        <label for="radio_gender" style="margin-left: 5px;">Female</label>
                                   </div>
                                   </div>


                                   <div class="col-md-12 col-sm-12">
                                        <label for="select">Select Distrct</label>
                                        <select class="form-control" name="selDistrict" id="selDistrict" onChange="getPlace(this.value)" required>
                                             <option>---Select---</option>
                                             <?php 
                                              $sel = "select * from tbl_district";
                                              $result = $con -> query($sel);
                                              while($data = $result -> fetch_assoc())
                                              {
                                              ?>
                                                <option value="<?php echo $data["district_id"] ?>"><?php echo $data["district_name"] ?></option>
                                                
                                                <?php } ?>
                                        </select>
                                   </div>


                                   <div class="col-md-12 col-sm-12">
                                        <label for="select">Select Place</label>
                                        <select class="form-control" name="selPlace" id="selPlace" required>
                                             <option>---Select---</option>
                                        </select>
                                   </div>

                              
                                   <div class="col-md-12 col-sm-12">
                                        <label for="txt_address">Address</label>
                                        <textarea class="form-control" rows="5" name="txt_address" id="txt_address" placeholder="Your Address" required autocomplete="off"></textarea>
                                   </div>

                                   <div>
                                        <button type="submit" class="form-control" id="cf-submit" name="btn_submit">Register</button>
                                   </div>
                              </div>
                        </form>
                    </div>

               </div>
          </div>
     </section>

     <script src="../Assets/JQ/jQuery.js"></script>
      <script>
      function getPlace(did)
      {
        
        $.ajax({
          url:"../Assets/AjaxPages/AjaxPlace.php?did="+did,
          success: function(html){
            $("#selPlace").html(html);
            
            }
          
          
          });
        
        }

      </script>

     <?php include("Foot.php"); ?>




