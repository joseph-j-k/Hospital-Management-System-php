<?php 
include('../Assets/Connection/Connection.php');
session_start();

if(isset($_POST["btn_edit"])) {
    $update = "update  tbl_doctor set doctor_name = '".$_POST["txt_name"]."', doctor_email = '".$_POST["txt_email"]."', doctor_contact = '".$_POST["txt_contact"]."', doctor_address = '".$_POST["txt_address"]."', doctor_qualification = '".$_POST["txt_qualification"]."', doctor_experience = '".$_POST["txt_experience"]."' WHERE doctor_id = '".$_SESSION["docid"]."'";
    
    if($con->query($update)) {
        echo "<script>
                alert('Updated');
                window.location = 'EditProfile.php';
              </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
        }
        form {
            width: 80%;
            max-width: 800px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #FFA500; /* Orange */
            color: white;
            border: none;
            padding: 12px 24px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 10px 0;
            cursor: pointer;
            border-radius: 4px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s, transform 0.2s;
        }
        input[type="submit"]:hover {
            background-color: #FF8C00; /* Darker Orange */
            transform: scale(1.05);
        }
        input[type="submit"]:active {
            background-color: #FF7F00; /* Even Darker Orange */
            transform: scale(0.95);
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <h1 align="center">Edit Profile</h1>
            <?php
            $sel = "SELECT * FROM tbl_doctor WHERE doctor_id = '".$_SESSION["docid"]."'";
            $result = $con->query($sel);
            $data = $result->fetch_assoc();
            ?>
            <table>
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="txt_name" id="txt_name" value="<?php echo htmlspecialchars($data["doctor_name"], ENT_QUOTES, 'UTF-8')?>" required /></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="text" name="txt_email" id="txt_email" value="<?php echo htmlspecialchars($data["doctor_email"], ENT_QUOTES, 'UTF-8')?>" required /></td>
                </tr>
                <tr>
                    <td>Contact</td>
                    <td><input type="text" name="txt_contact" id="txt_contact" value="<?php echo htmlspecialchars($data["doctor_contact"], ENT_QUOTES, 'UTF-8')?>" /></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td><input type="text" name="txt_address" id="txt_address" value="<?php echo htmlspecialchars($data["doctor_address"], ENT_QUOTES, 'UTF-8')?>" required /></td>
                </tr>
                <tr>
                    <td>Qualification</td>
                    <td><input type="text" name="txt_qualification" id="txt_qualification" value="<?php echo htmlspecialchars($data["doctor_qualification"], ENT_QUOTES, 'UTF-8')?>" required /></td>
                </tr>
                <tr>
                    <td>Experience</td>
                    <td><input type="text" name="txt_experience" id="txt_experience" value="<?php echo htmlspecialchars($data["doctor_experience"], ENT_QUOTES, 'UTF-8')?>" required /></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" name="btn_edit" id="btn_edit" value="Edit" /></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
