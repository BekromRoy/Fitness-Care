<?php

session_start();
include '../login/dbconn.php';
$name = $_SESSION['username'];
$namequry = " select * from fitness_table where name='$name' ";
$query = mysqli_query($con,$namequry);
$userdata = mysqli_fetch_assoc($query);
$useremail = $userdata['email'];
$mobile = $userdata['mobile'];
$id = $userdata['id'];
if(!isset($_SESSION['username'])) {

           header('location:../login/login.php');
}
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../index/index.css">
  <title>FAQ | Fitness Care</title>
  <link rel='stylesheet' href='https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'>
  <link type="text/css" href="../bootstrap/css/bootstrap.css" rel="stylesheet">
  <link rel="icon" type="image/png" href="../logo/logo.png">
<link rel="stylesheet" href="faq.css">
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
            <span><a class="nav-link bek-link" href="faq.php" id="faq"><button class="bek-dropbtn">faq  <i class="fas fa-caret-down bek-rotate"></i></button></a></span>
            <div class="bek-dropdown2 bek-dropdown6 bek-dropdown-in">
              <a href="faq.php" id="faq2"><img src="../dashboard/faq.png" width="40px;" style="filter: invert(100%);">&nbsp;&nbsp;faq</a>
              <a href="../contact/contactus.php"><img src="../dashboard/contact.png" width="40px;">&nbsp;&nbsp;contact us</a>
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

<!-- section1 -->
<section class="sectionfaq1">
  <div class="container2">
    <div class="row bek-out">
      <div class="bek-col-md-6">
        <p><span style="font-weight: 800;">help and support</span><br> For Your Every Question.</p>
      </div>
      <div class="bek-col-md-6">
        <img src="img2.jpg">
      </div>
    </div>
  </div>
</section>
<!-- end of section1 -->
<!-- faq section -->
<section>
  <div class="mota-container">

  <h1>Frequently Asked Questions (FAQs) </h1>

  <div class="accordion">
    <div class="accordion-item">
      <a>How often should I train? How hard? How long?</a>
      <div class="content">
        <p>Most experts agree that 3-5 times per week is sufficient. Exercise for a duration of 20-60 minutes at 60-90% of age-specific maximal heartrate or 50-85% of VO2max (heart rate reserve).</p>
      </div>
    </div>

    <div class="accordion-item">
      <a>What factors affect aerobic training?</a>
      <div class="content">
      <p>Frequency, duration and intensity. Frequency refers to how often you perform aerobic activity, duration refers to the time consumed during each session, and intensity refers to the percentage of your maximum heartrate or heartrate reserve at which the activity is performed.</p>
      </div>
    </div>

    <div class="accordion-item">
      <a>How much should I weigh?</a>
      <div class="content">
      <p>Since muscle weighs more per volume than fat, and you want to have firm muscles throughout your body, you may weigh more than you thought was average for your height and build. There is no ideal bodyweight. While some body fat is essential to sustain life, it is generally thought that a healthy bodyfat percentage for males is 8-20% and for females is 13-25%.</p>
      </div>
    </div>

    <div class="accordion-item">
      <a>What is aerobic exercise?</a>
      <div class="content">
      <p>The word aerobic literally means "with oxygen" or "in the presence of oxygen." Aerobic exercise is any activity that rhythmically uses large muscle groups. Aerobic activity increases the heart, lungs and cardiovascular system's ability to deliver oxygen more quickly and efficiently to the body. As the heart muscle becomes stronger and more efficient, a larger amount of blood can be pumped with each stroke thereby decreasing the number of strokes required for oxygen transport. An aerobically fit individual can produce more work for a longer period of time and recover faster.</p>
      </div>
    </div>

    <div class="accordion-item">
      <a>What's the best way to determine Body Fat Percentage?</a>
      <div class="content">
      <p>The Hydrostatic method (weighing in water) is the most accurate. This is not always convenient. The skin-fold calipers is the next best for in-home and gym measurements.</p>
    </div>
    </div>

    <div class="accordion-item">
      <a>Is it better to break up my exercise sessions?</a>
      <div class="content">
      <p>For aerobic exercise, it would be better to do a single workout and give you body the rest it needs to repair. For weight training, two sessions might be better providing different muscle groups are worked during each session. In either case, the question is whether too many workout sessions are being scheduled. The body doesn't build until after the exercise is over, during the rest periods. No rest periods, no rebuilding.</p>
    </div>
    </div>

    <div class="accordion-item">
      <a>What should I eat as my meal before an aerobic workout?</a>
      <div class="content">
      <p>A light carbohydrate snack about an hour before. A banana, fruit or a bagel with low fat cream cheese. A glass of water should not be forgotten. You'll probably lose that and more in perspiration.</p>
    </div>
    </div>

    <div class="accordion-item">
      <a>How soon and how much should I eat after an aerobic workout?</a>
      <div class="content">
      <p>Eat light after a workout. Remember, the blood supply is concentrated in the muscles at this point and may not be fully available for the digestive system for about an hour.</p>
    </div>
    </div>

    <div class="accordion-item">
      <a>How do I know when I am burning fat?</a>
      <div class="content">
      <p>The most fat is burned when your body is exercising in its aerobic range. A good rule of thumb is that after 20 minutes in your aerobic zone, you will be burning more fat than carbs. Your muscles will continue to burn fat after both aerobic and anaerobic (muscle training) exercise.
      Based on recent studies, in terms of absolute fat burning, a moderate intensity workout burns the most fat. At a heart rate equal to about 75% of max, fat burning will be between 0.5 grams - 1.0 grams of fat per minute for a 100 to 200 pound person respectively. Fat burning increases by roughly another 10% after one hour of continuous exercise. This is true for aerobic fit people. Less fit people will burn more sugar and less fat.
      </p>
    </div>
    </div>

    <div class="accordion-item">
      <a>What other methods are used for judging workout intensity?</a>
      <div class="content">
      <p>The talk test is another measure of intensity. You should be able to talk without gasping for air while working at optimal intensity. If you cannot, you should reduce your intensity.</p>
    </div>
    </div>

    <div class="accordion-item">
      <a>What is proper stepping technique?</a>
      <div class="content">
      <p>Proper alignment includes head up, shoulders down and back, chest up, abdominals and buttocks tight. When stepping up, lean from the ankles and not the waist to avoid placing excessive stress on the lumbar spine. Contact the platform with the entire foot flat. When stepping down, step close to the platform and roll the foot toe to heel.

      When doing lunges or repeater steps, however, the heel should not come in contact with the floor, and the weight should be on the opposite leg. Step Aerobics may aggrevate existing knee problems even if done correctly.</p>
    </div>
    </div>

    <div class="accordion-item">
      <a>How can I increase intensity?</a>
      <div class="content">
      <p>There are several ways to increase intensity. Increase your step height, use longer lever arms or add power moves (where both feet are in the air at the same time). If you are going to add power, don't exceed one minute at a time. All power moves should be done up onto the platform never down off the step. Power moves are considered advanced, and should not be attempted by beginners.</p>
    </div>
    </div>

    <div class="accordion-item">
      <a>What is the best time of day to exercise?</a>
      <div class="content">
      <p>The best time to work out is when you want to, so pick a time of day that feels comfortable. The morning (before you eat breakfast) is the best time for cardio work because your glycogen stores within the muscles and liver are at their lowest. This causes the body to look for other sources of energy, i.e., fat stores.</p>
    </div>
    </div>

    <div class="accordion-item">
      <a>Why is warm-up an important part of aerobic activity?</a>
      <div class="content">
      <p>A warm-up helps your body prepare itself for exercise and reduces the chance of injury. The warm-up should be a combination of rhythmic exercise to raise the heartrate, core body and muscle temperature, and static stretching through a full range of motion. The stretches in the warm-up should be non-ballistic and include all of the major muscle groups. A lower back stretch should be performed before doing any lateral movement of the upper torso such as side bends.</p>
    </div>
    </div>

    <div class="accordion-item">
      <a>Do Crunches and Bun work slim those areas down?</a>
      <div class="content">
      <p>There is no such thing as "spot reducing". Fat generally is used up in pretty much the reverse order it was first put on, (LIFO - Last In First Out). Aerobic exercise reduces body fat deposits as they are used for energy. Weight training increases the overall resting metabolism by 50 calories for each 1 pound of muscle added.</p>
    </div>
    </div>

    <div class="accordion-item">
      <a>Are abdominal exercises effective if I want to lose extra fat around my stomach?</a>
      <div class="content">
      <p>No. Abdominal exercises are great for strengthening your core and back but there is no such thing as spot-reducing fat. Comprehensive cardiovascular workouts throughout the week are the most effective and will reduce the amount of fat that has accumulated on the body.</p>
      </div>
    </div>

    <div class="accordion-item">
      <a>How many calories are burned while walking or jogging one mile?</a>
      <div class="content">
      <p>On average, the caloric expenditure per 100 pounds of body weight per mile is 62 calories. So if a person weighs 200 pounds, they would burn approximately 124 calories while walking or jogging.</p>
      </div>
    </div>

    <div class="accordion-item">
      <a>I have been working out for a while now and stopped losing weight. What is happening?</a>
      <div class="content">
      <p>More than likely, you have hit a plateau. This means that your body has become used to the activity you have been doing to lose weight. Our bodies are smart machines and become very efficient over time when the same activity is performed.

      To challenge your body, do a variety of exercises. If you like to run or walk, increase your speed every 2 minutes to increase your heart rate even more. For example, walk 2 minutes, run 2 minute, and repeat for 20-30 minutes. For runners, run 2 minutes at your normal speed then sprint for 1 minute and repeat for 20-30 minutes.</p>
      </div>
    </div>

    <div class="accordion-item">
      <a>How many calories does it take to burn one pound of fat?</a>
      <div class="content">
      <p>It takes 3,500 calories to gain or lose one pound. To lose one pound per week, you need to decrease your calories by 500 every day. This is usually done by cutting 250 calories out of your diet and burning the other 250 through activity.</p>
      </div>
    </div>

    <div class="accordion-item">
      <a>I have no time to exercise, what can I do?</a>
      <div class="content">
      <p>This is – by far – the most common complaint I hear. If this is a challenge for you, concentrate on getting small workouts in throughout the day. If your job takes the majority of your time, consider taking 3-10 minute breaks and walk at moderate intensity, where you break a little sweat and are slightly out of breath. Taking these breaks are not only good for physical health, but also for mental health. You will go back to work feeling refreshed and satisfied. If home life consumes most of your time, consider doing squats or other muscle toning exercises while doing housework.</p>
      </div>
    </div>
    
    </div>
</section>
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
                <p><a href="faq.php" style="color: #fff;font-size: 13px;" id="faq3">faq</a></p>
                <p><a href="../contact/contactus.php">contact us</a></p>
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
<!-- end of faq section -->
<script src='https://code.jquery.com/jquery-3.2.1.min.js'></script>
<script  src="faq.js"></script>
<script src="https://kit.fontawesome.com/72c6e5ab9f.js" crossorigin="anonymous"></script>
<script src="../bootstrap/js/bootstrap.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js?ver=1.3.2'></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="../index/index.js"></script>
<script src="../denie/denie.js"></script>

</body>
</html>