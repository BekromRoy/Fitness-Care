<?php

         session_start();
                   // DATABASE CONNECTION
         include '../login/dbconn.php';
         $name2 = $_SESSION['username'];
          $namequry = " select * from fitness_table where name='$name2' ";
          $query = mysqli_query($con,$namequry);
          $userdata = mysqli_fetch_assoc($query);
          $useremail = $userdata['email'];
          $mobile2 = $userdata['mobile'];
          $id = $userdata['id'];
          if(!isset($_SESSION['username'])) {
            header('location:../login/login.php');
          }
         if(isset($_POST['con_submit'])){
         
                   // TAKING INPUT FROM USER USING FORM
              $name = $_POST['con_name'];
              $email = $_POST['con_email'];
              $mobile = $_POST['con_mobile'];
              $message = $_POST['con_msg'];
         
              
                        // QUERY FOR INSERT DATA
            $insert_query = "insert into feedback(name, email, mobile, message) values('$name','$email','$mobile','$message')";
          $query = mysqli_query($con,$insert_query);
              if ($query) {
                $subject = "Account Activation - FITNESS CARE";
                $body = "Hello $name, This is from FITNESS CARE we have received your response. If there is any problem we will try to solve it for you. If you face any problem regurding exercise or fitness let us know, we will help you. To contact : http://fitnesscare.ultimatefreehost.in/contact/contact.php. Stay connected, Thank You.";
                $headers = "From: samar80fk@gmail.com";
                if (mail($email, $subject, $body, $headers)){
                  $_SESSION['msg'] = "Thank you '$name' for your feedback.";
                }
 
                header('location:contact.php');
         }else {
          $_SESSION['msg'] = "'Somthing went wrong.' Try again. ";
              
          header('location:contact.php');
         }
              }
         
         ?>


<html lang="en">

<head>
          <meta charset="UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
          <link type="text/css" href="../bootstrap/css/bootstrap.css" rel="stylesheet">          
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../dashboard/dashboard.css">
          <link rel="icon" type="image/png" href="../logo/logo.png">
          <title>Contact | Fitness Care</title>
          <style>
                    body{
                              display: flex;
                              flex-direction: column;
                              align-items: center;
                              justify-content: center;
                                overflow-x: hidden;
                                font-family: "Roboto", "Arial", "sans-serif";
                    }
                    * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
html {
  scroll-behavior: smooth;
}
body {
}
/* scroll bar */
::-webkit-scrollbar {
  width: 5px;
  background-color: #ddd;
}
::-webkit-scrollbar-track {
  border-radius: 0px;
}
::-webkit-scrollbar-thumb {
  background: red; 
  border-radius: 10px;
}
/* mouse circle */
.bek-mouse-circle {
  display: none;
  position: absolute;
  border: solid 2px #00c7ff;
  width: 40px; 
  height: 40px; 
  border-radius: 50%;
  pointer-events: none;
  will-change: transform;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
  z-index: 99999999999999;
}
/* preloader section */
.preloader {
  position: fixed;
  overflow: hidden;
  top: 0;
  left: 0;
  width: 100%;
  height: 100vh;
  display: block;
  background-color: #ff2b2b;
  z-index: 9999;
  align-items: center;
  text-align: center;
  justify-content: center;
  display: flex;
}
.preloaderin {
  width: 100%;
  height: 100%;
  position: absolute;
  display: flex;
  justify-content: center;
  align-items: center;
}
.preloaderin1 {
  width: 300px;
  height: 70%;
  box-shadow: 0 18px 16px -16px black;
  z-index: 999;
  position: absolute;
  top: 0;
  display: flex;
  justify-content: center;
  align-items: center;
}
.preloaderin2 {
  width: 80px;
  height: 80px;
  background-color: green;
  position: absolute;
  animation: box 4s linear infinite;
}
/* navbar section */
.bek-nav1 {
  height: 80px;
}
.bek-dropbtn {
  background-color: #fff;
  border: none;
  outline: none;
  margin: 0 15px;
  text-transform: uppercase;
  font-size: 14px;
}
.bek-dropdown1 {
  position: relative;
  display: inline-block;
}
.bek-dropdown2 {
  text-align: center;
  align-items: center;
  justify-content: center;
  display: flex;
  display: none;
  position: fixed;
  background-color: #222638;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
  transition: .4s;
  width: 100%;
  right: 0;
}
.bek-dropdown8 {
  width: 100vw;
  right: 0;
  display: none;
  position: fixed;
  background-color: #222638;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}
.bek-dropdown7 {
  display: none;
  position: fixed;
  background-color: #222638;
  min-width: 160px;
  padding: 5px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}
.bek-dropdown2 a {
  color: #fff;
  padding: 12px 16px;
  text-decoration: none;
  margin: 0 30px;
  text-transform: uppercase;
}
.bek-dropdown7 a {
  color: #fff;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: center;
}
.bek-dropdown1:hover .bek-dropdown2 {
  display: block;
}
.bek-dropdown1:hover .bek-dropdown7 {
  display: block;
}
.bek-dropbtn .bek-rotate {
  color: #ff2b2b;
  transition: .2s;
}
.bek-dropdown1:hover .bek-rotate {
  transform: rotate(180deg);
}
.bek-link {
  color: #000;
  text-transform: uppercase;
}
.bek-dropdown-in {
  padding: 30px 10%;
}
.bek-search {
  width: 100%;
  outline: none;
  border: none;
  border-bottom: 1px solid #fff;
}
ul a {
  color: #fff;
}
.bek-join {
  border: 1px solid #ff2b2b;
  color: #ff2b2b;
  transition: .2s;
}
.bek-join:hover {
  background-color: #ff2b2b;
  color: #fff;
}
.bek-dropdown2 a:hover {
  color: #ff2b2b;
}
.bek-dropdown7 a:hover {
  background-color: #2e3247;
  color: #fff;
}
.bek-dropdown7 .bek-join {
  color: #ff2b2b;
}
.bek-dropdown7 .bek-join:hover {
  background-color: #ff2b2b;
  color: #fff;
}
input:focus {
  outline: none;
}
.active {
  border-bottom: 1 px solid gray;
}
          .card{
                              overflow: hidden;
                              border: 0 !important;
                              border-radius: 30px !important;
                              box-shadow: 0 1rem 3rem 0 rgb(12, 12, 12);
                              background-color: #fff5;
                              padding: 30px 0;
                              backdrop-filter: blur(8px);
                    }
           .img-left{
                    width: 45%;
                    }
          .card-body{
                    padding: 1rem;
          }
          .title{
                    margin-bottom: 0.5rem;
          }
          .form-group{
                    position: relative;

          }
          .form-group input{
                    width: 100%; height: 45px;
                    padding-left: 40px; margin-bottom: 10px;
                    box-sizing: border-box; 
                    box-shadow: 0 0.2rem 0.4rem 0 rgb(12, 12, 12);
                    border: 1px solid black; border-radius: 50px;
                    outline: none; background: transparent;
          }
          .form-group textarea{
                    width: 100%; height: 65px;
                    padding-left: 40px; margin-bottom: 10px;
                    box-sizing: border-box; 
                    box-shadow: 0 0.2rem 0.4rem 0 rgb(12, 12, 12);
                    border: 1px solid black; border-radius: 10px;
                    outline: none; background: transparent;
          }
          .form-input span{
                              position: absolute; top: 15px;
                              padding-left: 15px; 
                              color: blue;
                    }
          .form-group input::placeholder{
                    padding-left: 0px;
                    }
          .form-group input:focus, .form-group input:valid{
                    border: 2px solid #007bff;
          }
          .form-group input:focus::placeholder{
                    color: #454b69;
          }
          .form.box button[type="submit"]{
                    margin-top: 100px; border: none;
                    cursor: pointer;
                    border-radius: 50px;
                    background-color: #007bff;
                    color: #fff;
                    font-size: 90%;
                    font-weight: bold;
                    letter-spacing: .1rem;
                    transition: 0.5s;
                    padding: 12px;
          }

          .btn1{
              border: none; outline: none; width: 100%;
              background-color: rgb(255, 106, 0);
              color: aliceblue;
              border-radius: 20px;
              font-weight: bold;
    }
    .btn1:hover{
              background-color: #bf4c00;
              color: rgb(255, 255, 255);
              
    }
    a{
      text-decoration: none;
    }

    #sesn{
      text-align:center;
      width: 100%; height:auto;
      /* background-color:lightgreen;
      border-radius:25px; */
      font-weight:bold;
      color :red;
      padding: 15px 20px 10px 15px;
    }

    .circle1 {
      position: absolute;
      width: 600px;
      height: 600px;
      background: -webkit-linear-gradient(to right, #fdbb2d, #b21f1f, #1a2a6c);
      background: linear-gradient(to right, #fdbb2d, #b21f1f, #1a2a6c);
      z-index: -1;
      border-radius: 50%;
      top: 0%;
      left: 0%;
      transform: translate(-50%,-50%);
    }
    .circle2 {
      position: absolute;
      width: 300px;
      height: 300px;
      background: -webkit-linear-gradient(to top, #0052D4, #65C7F7, #9CECFB);
      background: linear-gradient(to top, #0052D4, #65C7F7, #9CECFB);
      z-index: -1;
      border-radius: 50%;
      bottom: 0%;
      right: 0%;
    }
    /* footer section*/
.bek-footer-out1 {
  width: 100%;
  background-color: #2b1616;
  padding: 50px 50px 0 50px;
}
.bek-footer-out2 {
  padding: 50px 50px 80px 50px;
  border-bottom: 1px solid #888;
}
.bek-footer-out2 p {
  color: #aaa;
  font-weight: 200;
  font-size: 13px;
  margin-top: 5px;
  text-transform: uppercase;
}
.bek-footer-out2 a {
  text-decoration: none;
  color: #888;
  text-transform: uppercase;
  font-size: 12px;
}
.bek-footer-out2 a:hover {
  color: #555;
}
.bek-footer-out3 {
  width: 100%;
  padding: 10px 0 0 0;
  text-align: center;
  align-items: center;
  justify-content: center;
  display: flex;
  padding: 20px 0 0 0;
}
.bek-footer-out3 p {
  color: #888;
  font-weight: 200;
  font-size: 12px;
  text-transform: uppercase;
}
.frame-section {
  width: 100%;
}
.frame-section #iframe {
  width: 100%;
}
.iframe-height {
  height: 3550px;
}
.change-nm {
  position: relative;
  color: #aaa;
}
.change-nm:before {
  content: '';
  animation: change-nm 12s linear infinite;
}
@keyframes change-nm {
  0% {
    content: 'Amritanshu';
  }
  14.29% {
    content: 'Anurag';
  }
  28.58% {
    content: 'Bekrom';
  }
  42.87% {
    content: 'Harikesh';
  }
  57.16% {
    content: 'Mallik';
  }
  71.45% {
    content: 'Sahil';
  }
  85.74% {
    content: 'Saurabh';
  }
  100% {
    content: 'Amritanshu';
  }
}
#myBtn {
  display: none;
  position: fixed;
  bottom: 10px;
  right: 10px;
  z-index: 99;
  font-size: 18px;
  border: none;
  outline: none;
  background-color: #fff;
  color: white;
  cursor: pointer;
  padding: 5px;
  border-radius: 4px;
  border: 2px solid red;
}
          </style>
</head>

<body>
<!--preloader section-->
<link rel="stylesheet" type="text/css" href="../preloader/preloader.css">
<section class="bek-preloader-one">
  <div class="bek-preloader-one-out3"></div>
  <div class="bek-preloader-one-out4"></div>
  <div class="bek-preloader-one-out1">
    <img src="../logo/logo.png">
  </div>
  <div class="bek-preloader-one-out2">
    <span style="--i:1;">F</span>
    <span style="--i:2;">I</span>
    <span style="--i:3;">T</span>
    <span style="--i:4;">N</span>
    <span style="--i:5;">E</span>
    <span style="--i:6;">S</span>
    <span style="--i:7;">S</span>
    <span style="--i:8;">&nbsp;</span>
    <span style="--i:9;">C</span>
    <span style="--i:10;">A</span>
    <span style="--i:11;">R</span>
    <span style="--i:12;">E</span>
  </div>
</section>
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script src="../preloader/preloader.js"></script>
<!--end of preloader section-->

<!-- mouse circle -->
<div id="bek-mouse-circle" class="bek-mouse-circle"></div>
<!-- end of mouse circle -->
<!-- nav bar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top bek-nav1" style="border-bottom: 1px solid #ffe0e0;">
  <div class="container-xl">
    <a class="navbar-brand" href="../dashboard/dashboard.php">
      <img src="../logo/logo.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
      Fitness Care
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <span><a class="nav-link bek-link" aria-current="page" href="../dashboard/dashboard.php" id="home" style="text-transform: uppercase;color: #000;margin: 3px 0 0 10px;font-size: 14px;">Home</a></span>
        </li>
        <li class="nav-item">
          <div class="bek-dropdown1">
            <span><a class="nav-link bek-link" href="../about/about.php" id="about"><button class="bek-dropbtn">About  <i class="fas fa-caret-down bek-rotate"></i></button></a></span>
            <div class="bek-dropdown2 bek-dropdown3 bek-dropdown-in">
              <a href="../about/about.php" id="about2"><img src="../logo/logo.png" width="30px;">&nbsp;&nbsp;About Us</a>
              <a href="../career/career.php" id="career"><img src="../dashboard/career.png" width="40px;" style="filter: invert(100%);">&nbsp;&nbsp;Careers</a>
              <a href="../tutorial/tutorial.php" id="tutorial"><img src="../dashboard/tutorial.png" width="40px;">&nbsp;&nbsp;Tutorials</a>
            </div>
          </div>
        </li>
        <li class="nav-item">
          <div class="bek-dropdown1">
            <span><a class="nav-link bek-link" href="../food/food.php"><button class="bek-dropbtn">Food  <i class="fas fa-caret-down bek-rotate"></i></button></a></span>
            <div class="bek-dropdown2 bek-dropdown4 bek-dropdown-in">
              <a href="../meal-plans/meal-plans.php" id="meal-plans"><img src="../dashboard/foodplan.png" width="40px;">&nbsp;&nbsp;Meal Plans</a>
              <a href="../food/food.php"><img src="../dashboard/nutrition.png" width="40px;">&nbsp;&nbsp;Nutrition</a>
            </div>
          </div>
        </li>
        <li class="nav-item">
          <div class="bek-dropdown1">
            <span><a class="nav-link bek-link" href="../exercise/exercise.php"><button class="bek-dropbtn">Workouts  <i class="fas fa-caret-down bek-rotate"></i></button></a></span>
            <div class="bek-dropdown2 bek-dropdown5 bek-dropdown-in">
              <a href="../exercise/exercise.php"><img src="../dashboard/workout.png" width="40px;">&nbsp;&nbsp;Exercise</a>
              <a href="../yoga/yoga.php"><img src="../dashboard/fitness.png" width="40px;">&nbsp;&nbsp;Yoga</a>
              <a href="../workout-programs/workout-programs.php" id="workout-programs"><img src="../dashboard/workout-program.png" width="40px;">&nbsp;&nbsp;workout  programs</a>
            </div>
          </div>
        </li>
        <li class="nav-item">
          <div class="bek-dropdown1">
            <span><a class="nav-link bek-link" href="../faq/faq.php" id="faq"><button class="bek-dropbtn">faq  <i class="fas fa-caret-down bek-rotate"></i></button></a></span>
            <div class="bek-dropdown2 bek-dropdown6 bek-dropdown-in">
              <a href="../faq/faq.php" id="faq2"><img src="../dashboard/faq.png" width="40px;" style="filter: invert(100%);">&nbsp;&nbsp;faq</a>
              <a href="contactus.php"><img src="../dashboard/contact.png" width="40px;">&nbsp;&nbsp;contact us</a>
            </div>
          </div>
        </li>
        <li class="nav-item">
          <span><a class="nav-link bek-link" aria-current="page" href="../store/store.php" style="text-transform: uppercase;color: #000; margin: 3px 0 0 20px;font-size: 14px;">Store</a></span>
        </li>
      </ul>
      <ul class="mb-2 mb-lg-0" style="list-style: none;">
        <li class="nav-item">
          <div class="bek-dropdown1">
            <span><a class="nav-link bek-link" href="../account/account.php"><button class="bek-dropbtn" style="margin: 0 0;align-items: center;text-align: center;justify-content: center;display: flex;flex-direction: row;"><div style="width: 35px;height: 35px;border-radius: 50%;overflow: hidden;"><img src="../logo/logo.png" style="width: 100%;height: 100%;"></div>&nbsp;<span style="width: 100px;"><?php echo $_SESSION['username']; ?></span>&nbsp;<i class="fas fa-caret-down bek-rotate"></i></button></a></span>
            <div class="bek-dropdown7">
              <a href="../account/account.php" id="account"><i class="fas fa-user-circle" style="color: #ff2b2b;"></i>&nbsp;&nbsp;Account</a>
              <a href="../notifications/notifications.php" id="notifications"><i class="fas fa-bell" style="color: #ff2b2b;"></i>&nbsp;&nbsp;Notifications</a>
              <a href="../calender/calender.php" id="calender"><i style="color: #ff2b2b;" class="fas fa-calendar-alt"></i></i>&nbsp;&nbsp;Calender</a>
              <a href="../join/join.php"><i class="fas fa-user-plus" style="color: #ff2b2b;"></i>&nbsp;&nbsp;Fitness Care+</a>
              <a href="../login/logout.php"><i class="fas fa-sign-out-alt" style="color: #ff2b2b;"></i>&nbsp;&nbsp;Sign Out</a>
            </div>
          </div>
        </li>
      </ul>
      <form class="d-flex">
        <div class="bek-dropdown1">
          <a class="nav-link bek-link" href="#"><button class="bek-dropbtn" style="margin: 0;"><span><i class="fas fa-search"></i></span></button></a>
          <div class="bek-dropdown2 bek-dropdown8 bek-dropdown-in">
            <input class="form-control me-2 bek-search" type="search" placeholder="SEARCH PRODUCT" aria-label="Search" style="width: 100%;outline: none;border: none;border-bottom: 1px solid #fff;background-color: #222638;border-radius: 0;color: #fff;">
          </div>
        </div>
      </form>
    </div>
  </div>
</nav>
<div style="width: 100%;height: 80px;" id="gotop"></div>
<!-- end of nav bar -->

  <!-- contact part -->
   <div class="container-fluid" style="height: ;position: relative;padding-top: 80px; padding-bottom: 80px;">

     <div class="row px-3">
        <div class="col-md-12 col-lg-9 card flex-row mx-auto px-0">
          <div class="img-left d-none d-sm-flex">
            <video width="100%" loop muted autoplay style="width: 100%;">
              <source src="contact.mp4" type="video/mp4">
            </video>
          </div>

        <div class="card-body"> 
           <h1 class="title text-center mt-4" style="color:#007bff;">Contact us</h1>
           <div>
        <p id="sesn">
        <?php
           if(isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            }
          ?>
        </p>
      </div>
           <!-- FORM TAG START -->
      <form class="form-box px-3" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" autocomplete="on">
            <!-- For name input -->
            <div class="form-group">
          <span><i class="fa fa-user-circle" style="font-size:20px; color:#55acee"></i> Full Name:</span>
            <input type="text" name="con_name" id="" placeholder="Enter full name here" tabindex="10" required value="<?php echo $_SESSION['username']; ?>">
                    </div>
                    <!-- For email input -->
                    <div class="form-group">
          <span><i class="fa fa-envelope-o" style="font-size:20px; color:#55acee"></i> Email:</span>
            <input type="email" name="con_email" id="" placeholder="example@gmail.com"  required value="<?php echo $useremail; ?>">
                    </div>
                   <!-- For mobile input -->
                   <div class="form-group">
          <span><i class="fa fa-phone" style="font-size:20px; color:#55acee"></i> Mobile:</span>
            <input type="text" name="con_mobile" id="" placeholder="10 digit mobile number" required value="<?php echo $mobile2; ?>">
                    </div>
                     <!-- For message input -->
                     <div class="form-group">
          <label for="msg"><i class="fa fa-comments" style="font-size:20px; color:#55acee"></i> Message:</label>
          <textarea name="con_msg" class="form-control" cols="30" rows="2" required autofocus placeholder="Enter your message here...."></textarea>
          
        </div>
                    <!-- For submit button -->
        <div class="mb-3">
            <button type="submit" name="con_submit" class="btn btn-primary text-center btn1">Submit</button>
                    </div>

                    </form>
             </div>
          </div>
      </div>
    <div class="circle1"></div>
    <div class="circle2"></div>
    </div>
    

<!-- back to top button-->
<a href="#gotop"><button id="myBtn" title="Go to top"><img src="../index/arrow.png" width="30"></button></a>
<!-- end of back to top button-->
<!-- footer bar -->
<div class="bek-footer-out1">
  <div class="container bek-footer-out2">
    <div class="row">
      <div class="col-md-4">
        <img src="../logo/logo.png" width="80">
        <p>Your daily workout partner.</p>
      </div>
      <div class="col-md-8">
        <div class="row">
          <div class="col-md-6">
            <div class="row">
              <div class="col-sm-6">
                <p><a href="../about/about.php" id="about3" style="color: #fff;font-size: 13px;">about</a></p>
                <p><a href="../career/career.php" id="career2">careers</a></p>
                <p><a href="../tutorial/tutorial.php" id="tutorial2">tutorials</a></p>
              </div>
              <div class="col-sm-6">
                <p><a href="../food/food.php" style="color: #fff;font-size: 13px;">food</a></p>
                <p><a href="../meal-plans/meal-plans.php" id="meal-plans2">meal plans</a></p>
                <p><a href="../food/food.php">nutrition</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="row">
              <div class="col-sm-6">
                <p><a href="../exercise/exercise.php" style="color: #fff;font-size: 13px;">workout</a></p>
                <p><a href="../exercise/exercise.php">exercise</a></p>
                <p><a href="../yoga/yoga.php">yoga</a></p>
                <p><a href="../workout-programs/workout-programs.php" id="workout-programs2">workout programs</a></p>
              </div>
              <div class="col-sm-6">
                <p><a href="../faq/faq.php" style="color: #fff;font-size: 13px;" id="faq3">faq</a></p>
                <p><a href="contactus.php">contact us</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container bek-footer-out3">
    <p>Copyright <i class="far fa-copyright"></i> 2021 . Designed By  Group - H .(&nbsp;<span class="change-nm"></span>&nbsp;)</p>
  </div>
</div>
<!-- end of footer bar -->

<script src="https://kit.fontawesome.com/72c6e5ab9f.js" crossorigin="anonymous"></script>
<script src="../dashboard/dashboard.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js?ver=1.3.2'></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="../denie/denie.js"></script>
      <!-- jQuery program -->
      <script>
          $(document).ready(function(){
         $("input").focus(function(){
          $(this).css("background-color", "#ffff42");
        });
           $("input").blur(function(){
          $(this).css("background-color", "lightgreen");
        });
          });


//mouse circle
jQuery(document).ready(function() {

  var mouseX = 0, mouseY = 0;
  var xp = 0, yp = 0;
   
  $(document).mousemove(function(e){
    mouseX = e.pageX - 20;
    mouseY = e.pageY - 20; 
    $("#bek-mouse-circle").css("display", "block");
  });
    
  setInterval(function(){
    xp += ((mouseX - xp)/6);
    yp += ((mouseY - yp)/6);
    $("#bek-mouse-circle").css({left: xp +'px', top: yp +'px'});
  }, 20);

});

// go to top 
var mybutton = document.getElementById("myBtn");
           </script>
</body>

</html>