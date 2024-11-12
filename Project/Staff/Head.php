<!DOCTYPE html>
<html lang="en">
<head>

     <title>Health - Medical Website Template</title>
<!--

Template 2098 Health

http://www.tooplate.com/view/2098-health

-->
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="Tooplate">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="../Assets/Templates/User/Main/css/bootstrap.min.css">
     <link rel="stylesheet" href="../Assets/Templates/User/Main/css/font-awesome.min.css">
     <link rel="stylesheet" href="../Assets/Templates/User/Main/css/animate.css">
     <link rel="stylesheet" href="../Assets/Templates/User/Main/css/owl.carousel.css">
     <link rel="stylesheet" href="../Assets/Templates/User/Main/css/owl.theme.default.min.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="../Assets/Templates/User/Main/css/tooplate-style.css">

</head>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

     <!-- PRE LOADER -->
     <!-- <section class="preloader">
          <div class="spinner">

               <span class="spinner-rotate"></span>
               
          </div>
     </section> -->


     <!-- HEADER -->
     <header>
          <div class="container">
               <div class="row">

                    <div class="col-md-4 col-sm-5">
                    <span style="font-family: 'Arial', sans-serif; font-size: 24px; color: #28a745;">
                     Welcome back, <?php echo $_SESSION["sname"]; ?>
                    </span>
                    </div>
               </div>
          </div>
     </header>


     <!-- MENU -->
     <section class="navbar navbar-default navbar-static-top" role="navigation">
          <div class="container">

               <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>

                    <!-- lOGO TEXT HERE -->
                    <a href="index.html" class="navbar-brand"><i class="fa fa-h-square"></i>ealth Center</a>
               </div>

              <!-- MENU LINKS -->
              <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                         <li><a href="Homepage.php" class="smoothScroll">Home</a></li>
                         <li><a href="MyProfile.php" class="smoothScroll">My profile</a></li>
                         <li><a href="AddPatient.php" class="smoothScroll">Add Patient</a></li>
                         <li><a href="ViewPatient.php" class="smoothScroll">Search Patient</a></li>
                         <li class="appointment-btn"><a href="Logout.php">Logout</a></li>
                    </ul>
               </div>

          </div>
     </section>