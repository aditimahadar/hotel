<?php
   include "db.php"; 
    
    $room = $_GET['room'];
    $room = preg_replace('/[^A-Za-z0-9\-]/', ' ', $room);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>RESERVATION SUNRISE HOTEL</title>
      <!-- Bootstrap Styles-->
      <link href="assets/css/bootstrap.css" rel="stylesheet" />
      <!-- FontAwesome Styles-->
      <link href="assets/css/font-awesome.css" rel="stylesheet" />
      <!-- Custom Styles-->
      <link href="assets/css/custom-styles.css" rel="stylesheet" />
      <!-- Google Fonts-->
      <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   </head>
   <body>
      <div id="wrapper">
         <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
               <ul class="nav" id="main-menu">
                  <li>
                     <a  href="../index.php"><i class="fa fa-home"></i> Homepage</a>
                  </li>
               </ul>
            </div>
         </nav>
         <div id="page-wrapper" >
            <div id="page-inner">
               <div class="row">
                  <div class="col-md-12">
                     <h1 class="page-header">
                        RESERVATION <small></small>
                     </h1>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-5 col-sm-5">
                     <div class="panel panel-primary">
                        <div class="panel-heading">
                           PERSONAL INFORMATION
                        </div>
                        <div class="panel-body">
                           <form name="form" method="post"  onsubmit="return validateForm()" id="form" >
                              <div class="form-group">
                                 <label>Title <span style="color:red">*</span></label>
                                 <select name="title" id="titlename" class="form-control" >
                                    <option value selected ></option>
                                    <option value="Miss.">Miss.</option>
                                    <option value="Mr.">Mr.</option>
                                    <option value="Mrs.">Mrs.</option>
                                 </select>
                              </div>
                              <div class="form-group">
                                 <label>Full Name<span style="color:red">*</span></label>
                                 <input name="fname" id="fullname" class="form-control">
                              </div>
                              <div class="form-group">
                                 <label>Email<span style="color:red">*</span></label>
                                 <input name="email" id="email" type="email" class="form-control">
                              </div>
                              <div class="form-group">
                                 <label>Phone Number<span style="color:red">*</span></label>
                                 <input name="Phone" id="phonenumber" type ="text" class="form-control">
                              </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                  <div class="col-md-6 col-sm-6">
                  <div class="panel panel-primary">
                  <div class="panel-heading">
                  RESERVATION INFORMATION
                  </div>
                  <div class="panel-body">
                  <div class="form-group">
                     <label>Type Of Room <span style="color:red">*</span></label>
                     <input type="text" name="troom" id="typeofroom" value="<?php echo $room; ?>" class="form-control" disabled>
                  </div>
                  <div class="form-group">
                        <label>Bedding Type <span style="color:red">*</span></label>
                        <select name="bed" id="beddingtype" class="form-control"">
                        <option value selected ></option>
                        <option value="Single">Single</option>
                        <option value="Double">Double</option>
                        <option value="Triple">Triple</option>
                        <option value="Quad">Quad</option>
                        <option value="None">None</option>
                        </select>
                  </div>
                  <div class="form-group">
                  <label>No.of Rooms <span style="color:red">*</span></label>
                        <select name="nroom" id="norroms" class="form-control"">
                        <option value selected ></option>
                        <option value="1">1</option>
                        <!--  <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option> -->
                        </select>
                  </div>
                  <div class="form-group">
                  <label>Meal Plan <span style="color:red">*</span></label>
                        <select name="meal" id="mealplan" class="form-control">
                        <option value selected ></option>
                        <option value="Room only">Room only</option>
                        <option value="Breakfast">Breakfast</option>
                        <option value="Half Board">Half Board</option>
                        <option value="Full Board">Full Board</option>
                        </select>
                  </div>
                  <div class="form-group">
                        <label>Check-In <span style="color:red">*</span></label>
                        <input name="cin" id="checkin" type ="date" class="form-control">
                  </div>
                  <div class="form-group">
                        <label>Check-Out <span style="color:red">*</span></label>
                        <input name="cout" id="checkout" type ="date" class="form-control">                                            
                  </div>
                  </div>
                  </div>
                  </div>
                  <div class="col-md-12 col-sm-12">
                    <div class="well">
                    <input type="submit" name="submit" class="btn btn-primary">
                    <?php if (isset($_POST["submit"])) {
                        $new = "Not Conform";
                        $newUser = "INSERT INTO `roombook`(`Title`, `FName`, `Email`, `Phone`, `TRoom`, `Bed`, `NRoom`, `Meal`, `cin`, `cout`,`stat`,`nodays`) VALUES ('$_POST[title]','$_POST[fname]','$_POST[email]','$_POST[Phone]','$_POST[troom]','$_POST[bed]','$_POST[nroom]','$_POST[meal]','$_POST[cin]','$_POST[cout]','$new',datediff('$_POST[cout]','$_POST[cin]'))";
                        if (mysqli_query($con, $newUser)) {
                            echo "<script type='text/javascript'> alert('Your Booking application has been sent')</script>";
                        } else {
                            echo "<script type='text/javascript'> alert('Error adding user in database')</script>";
                        }
                        } ?>
                    </form>
                  </div>
                  </div>
                  </div>
               </div>
            </div>
            <!-- /. PAGE INNER  -->
         </div>
         <!-- /. PAGE WRAPPER  -->
      </div>
      <!-- /. WRAPPER  -->
      <!-- JS Scripts-->
      <!-- jQuery Js -->
      <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
      <script src="assets/js/bootstrap.min.js"></script>
      <!-- Metis Menu Js -->
      <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- Custom Js -->
      <script src="assets/js/custom-scripts.js"></script>
      <script>
      function validateForm() {        
          var titlename = document.forms["form"]["titlename"].value;
          var fullname = document.forms["form"]["fullname"].value;
          var email = document.forms["form"]["email"].value;
          var phonenumber = document.forms["form"]["phonenumber"].value;
          var typeofroom = document.forms["form"]["typeofroom"].value;
          var beddingtype = document.forms["form"]["beddingtype"].value;
          var norroms = document.forms["form"]["norroms"].value;
          var mealplan = document.forms["form"]["mealplan"].value;
          var checkin = document.forms["form"]["checkin"].value;
          var checkout = document.forms["form"]["checkout"].value;

          if (titlename == null || titlename == "") {
              alert("Please select title.");
              return false;
          } else if (fullname == null || fullname == "") {
              alert("Please enter full name.");
              return false;
          } else if (email == null || email == "") {
              alert("Please enter email ID");
              return false;
          }
          else if (phonenumber == null || phonenumber == "") {
              alert("Please enter phone no");
              return false;
          }
          else if (typeofroom == null || typeofroom == "") {
              alert("Please select type of room");
              return false;
          }
          else if (norroms == null || norroms == "") {
              alert("Please select no of rooms");
              return false;
          }
          else if (mealplan == null || mealplan == "") {
              alert("Please select meal plan");
              return false;
          }
          else if (checkin == null || checkin == "") {
              alert("Please select check in date");
              return false;
          }
          else if (checkout == null || checkout == "") {
              alert("Please select check out date");
              return false;
          }
        }
    </script>
   </body>
</html>