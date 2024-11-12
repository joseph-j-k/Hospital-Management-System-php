     
<?php 
include('../Assets/Connection/Connection.php');
session_start();
include("Head.php");

if(isset($_POST["btn_appointment"]))
{
    $doctor_id = $_POST["selectDoctor"]; // Sanitize input
    $new_token = $_POST["txt_token"];    // Token value from AJAX
    $details = $_POST["txt_details"]; // Sanitize input

    // Insert the new token into the database
     $insert = "INSERT INTO tbl_appoinment (doctor_id, appoinment_token, appoinment_datetime, appoinment_details, patient_id) VALUES ('".$doctor_id."', '".$new_token."', CURDATE(), '".$details."','".$_GET['pid']."')";
    
    if ($con->query($insert)) {
        // Return success or redirect
        echo "<script>
				alert('Appointment successfully booked');
				window.location = 'Appoinments.php';
			 </script>";
    } else {
        // Return an error message
        echo "error=Error inserting token: " . $con -> error;
    }
}
?>

    <!-- MAKE AN APPOINTMENT -->
     <section id="appointment" data-stellar-background-ratio="3">
          <div class="container">
               <div class="row">

                    <div class="col-md-6 col-sm-6">
                         <img src="https://images.pexels.com/photos/5214995/pexels-photo-5214995.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" class="img-responsive" alt="">
                    </div>

                    <div class="col-md-6 col-sm-6">
                         <!-- CONTACT FORM HERE -->
                         <form id="appointment-form" role="form" method="post" action="#">

                              <!-- SECTION TITLE -->
                              <div class="section-title wow fadeInUp" data-wow-delay="0.4s">
                                   <h2>Make an appointment</h2>
                              </div>
                              <div class="col-md-6 col-sm-6">
                                        <label for="select">Select Department</label>
                                        <select class="form-control" name="selectDept" id="selectDept" onchange="loadDoctors(this.value)" required>
                                             <option>Available Department</option>
                                             <?php 
                                            $sel = "select * from tbl_department";
                                            $result = $con->query($sel);
                                            while($data = $result->fetch_assoc()) {
                                            ?>
                                            <option value="<?php echo $data["dept_id"]; ?>"><?php echo $data["dept_name"]; ?></option>
                                            <?php } ?>
                                        </select>
                                   </div>
                              <div class="wow fadeInUp" data-wow-delay="0.8s"> 
                                   <div class="col-md-6 col-sm-6">
                                        <label for="select">Select Doctor</label>
                                        <select class="form-control" name="selectDoctor" id="selectDoctor"onchange="getToken(this.value)" required>
                                             <option>Available Doctors</option>
                                        </select>
                                   </div>
                                   <div class="col-md-12 col-sm-12">
                                        <label for="txt_details">Details</label>
                                        <textarea class="form-control" rows="5" id="txt_details" name="txt_details" placeholder="Details" required></textarea>
                                   </div>

                                   <div class="col-md-6 col-sm-6">
                                        <label for="name">Token</label>
                                        <input type="text" class="form-control" id="txt_token" name="txt_token" placeholder="Token" readonly>
                                   </div>

                                   <div class="col-md-12 col-sm-12">
                                        <button type="submit" class="form-control" id="cf-submit" name="btn_appointment">Book Appointment</button>
                                   </div>
                              </div>
                        </form>
                    </div>

               </div>
          </div>
     </section>

     <script src="../Assets/JQ/jQuery.js"></script> 
     <script>
           // Function to load doctors based on the selected department
    function loadDoctors(deptId) {
        if (deptId) {
            $.ajax({
                url: "../Assets/AjaxPages/AjaxLoadDoctors.php",
                method: "GET",
                data: { dept_id: deptId },
                success: function(response) {
                    $("#selectDoctor").html(response);
                }
            });
        } else {
            $("#selectDoctor").html('<option value="">Available Doctors</option>');
            $("#txt_token").val('');
        }
    }
     </script>


    <script>
    function getToken(did) {
        if (did) {
            $.ajax({
                url: "../Assets/AjaxPages/AjaxTokenNumber.php",
                method: "GET",
                data: { did: did },
                success: function(response) {
                    $("#txt_token").val(response);
                }
            });
        } else {
            $("#txt_token").val('');
        }
    }
    </script>

