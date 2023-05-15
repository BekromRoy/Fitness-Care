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
  <title>Nutrition | Fitness Care</title>
  <link rel='stylesheet' href='https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'>
  <link type="text/css" href="../bootstrap/css/bootstrap.css" rel="stylesheet">
  <link rel="icon" type="image/png" href="../logo/logo.png">
  <link rel="stylesheet" href="food.css">
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
            <span><a class="nav-link bek-link" href="food.php"><button class="bek-dropbtn">Food  <i class="fas fa-caret-down bek-rotate"></i></button></a></span>
            <div class="bek-dropdown2 bek-dropdown4 bek-dropdown-in">
              <a href="../meal-plans/meal-plans.php" id="meal-plans"><img src="../dashboard/foodplan.png" width="40px;">&nbsp;&nbsp;Meal Plans</a>
              <a href="food.php"><img src="../dashboard/nutrition.png" width="40px;">&nbsp;&nbsp;Nutrition</a>
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
  <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1" style="width: 5px;height: 6px;border-radius: 50%;border: 2px solid #009dff;"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2" style="width: 5px;height: 6px;border-radius: 50%;border: 2px solid #009dff;"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3" style="width: 5px;height: 6px;border-radius: 50%;border: 2px solid #009dff;"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active bek-back1">
        <div class="carousel-caption bek-yoga-center">
          <p>Let's make your life</p>
          <h1>Healthy Living</h1>
          <a href="#stamina"><button>stamina booster</button></a>
        </div>
      </div>
      <div class="carousel-item bek-back2">
        <div class="carousel-caption bek-yoga-center">
          <p>life is almost dead</p>
          <h1>Without Health</h1>
          <a href="#loss"><button>wight loss</button></a>
        </div>
      </div>
      <div class="carousel-item bek-back3">
        <div class="carousel-caption bek-yoga-center">
          <p>health is wealth</p>
          <h1>Keep This Treasure Safe</h1>
          <a href="#gain"><button>weight gain</button></a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- end of section1 -->
<!-- stamina section -->
<section id="stamina">
  <h1>Stamina Booster</h1>
  <div class="container">
    <!-- 1st row -->
    <div class="row">
      <div class="col-md-4">
        <img src="images/yoghurt.jpg">
        <h3>Yoghurt</h3>
        <hr class="dropdown-divider">
        <p class="bek-muted">Yoghurt or dahi has calcium and protein. But that’s not all it does. Since it is soothing for your stomach and easy to digest, it is a great food to have before your workout or even on an empty stomach. Adding some fruit to your yoghurt can give you an extra boost of nutrition and stamina.</p>
      </div>
      <div class="col-md-4">
        <img src="images/banana.jpg">
        <h3>Banana</h3>
        <hr class="dropdown-divider">
        <p class="bek-muted">Banana is one food that is loved by most people, irrespective of their age. It also happens to be one of the best foods to increase stamina. This fruit is rich in carbohydrates and also has natural sugar and starch which gives you the energy to keep going throughout the day.</p>
      </div>
      <div class="col-md-4">
        <img src="images/oatmeal.jpg">
        <h3>Oatmeal</h3>
        <hr class="dropdown-divider">
        <p class="bek-muted">Oatmeal is one of the best things you can start your day with. Being nutrient-dense and rich in fibre, oatmeal provides your body with the much-needed energy. It is also a great pre-workout meal if stamina is what you are after. Add in some nuts and seeds to make it even better!</p>
      </div>
    </div>
    <!-- 2nd row -->
    <div class="row">
      <div class="col-md-4">
        <img src="images/eggs.jpg">
        <h3>Eggs</h3>
        <hr class="dropdown-divider">
        <p class="bek-muted">Eggs are the most versatile, healthy, and easy to cook food on this planet. And we cannot be thankful enough for it. Eggs are not only rich in protein and other nutrients, but they help in muscle repair and build stamina. Packed with essential amino acids, eggs can keep fatigue away!</p>
      </div>
      <div class="col-md-4">
        <img src="images/peanut butter.jpg">
        <h3>Peanut Butter</h3>
        <hr class="dropdown-divider">
        <p class="bek-muted">Peanut butter is one breakfast essentials that you cannot miss out on. If you aren’t allergic to peanuts, then you can have it with a slice of multigrain bread the first thing in the morning to kickstart your day. It has healthy fats and proteins, which can keep your hunger at bay while boosting your stamina in a jiffy.</p>
      </div>
      <div class="col-md-4">
        <img src="images/almonds.jpg">
        <h3>Almonds</h3>
        <hr class="dropdown-divider">
        <p class="bek-muted">Almonds are nutrient-dense nuts which not only help in boosting metabolism but also improving your stamina. Undeniably, almonds are a powerhouse of healthy fats that you cannot ignore.</p>
      </div>
    </div>
    <div style="width: 100%;align-items: center;justify-content: center;display: flex;margin: 30px 0;"><button class="more"><i class="fas fa-arrow-down"></i>&nbsp;&nbsp;load more</button></div>
  </div>
</section>
<!-- end of stamina section -->

<!-- loss section -->
<section id="loss">
  <h1>Weight Loss</h1>
  <div class="container">
    <!-- 1st row -->
    <div class="row">
      <div class="col-md-4">
        <img src="images/leafygreen.jpg">
        <h3>Leafy Greens</h3>
        <hr class="dropdown-divider">
        <p class="bek-muted">Leafy greens include kale, spinach, collards, swiss chards and a few others. They have several properties that make them perfect for a weight loss diet, such as being low in calories and carbohydrates and loaded with fiber. Eating leafy greens is a great way to increase the volume of your meals, without increasing the calories. Leafy greens are also incredibly nutritious and very high in many vitamins, antioxidants and minerals, including calcium, which has been shown to aid fat burning.</p>
      </div>
      <div class="col-md-4">
        <img src="images/salmon.jpg">
        <h3>Salmon</h3>
        <hr class="dropdown-divider">
        <p class="bek-muted">Salmon is incredibly healthy and very satisfying, keeping you full for many hours with relatively few calories.\ Salmon is also loaded with omega-3 fatty acids, which have been shown to help reduce inflammation, which is known to play a major role in obesity and metabolic disease.</p>
      </div>
      <div class="col-md-4">
        <img src="images/cruciferous vegetables.jpg">
        <h3>Cruciferous Vegetables</h3>
        <hr class="dropdown-divider">
        <p class="bek-muted">Cruciferous vegetables include broccoli, cauliflower, cabbage and Brussels sprouts. Like other vegetables, they’re high in fiber and tend to be incredibly filling. A combination of protein, fiber and low energy density makes cruciferous vegetables the perfect foods to include in your meals if you need to lose weight. They’re also highly nutritious and contain cancer-fighting substances.</p>
      </div>
    </div>
    <!-- 2nd row -->
    <div class="row">
      <div class="col-md-4">
        <img src="images/boiled potatoes.jpg">
        <h3>Boiled Potatoes</h3>
        <hr class="dropdown-divider">
        <p class="bek-muted">White potatoes seem to have fallen out of favor for some reason. However, they have several properties that make them a perfect food — both for weight loss and optimal health. They contain an incredibly diverse range of nutrients — a little bit of almost everything you need.</p>
      </div>
      <div class="col-md-4">
        <img src="images/tuna.jpg">
        <h3>Tuna</h3>
        <hr class="dropdown-divider">
        <p class="bek-muted">Tuna is another low-calorie, high-protein food. It’s lean fish, meaning it’s low in fat. Tuna is popular among bodybuilders and fitness models who’re on a cut, as it’s a great way to increase protein intake while keeping total calories and fat low. If you’re trying to emphasize protein intake, make sure to choose tuna canned in water, not oil.</p>
      </div>
      <div class="col-md-4">
        <img src="images/grape fruit.jpg">
        <h3>Grape Fruit</h3>
        <hr class="dropdown-divider">
        <p class="bek-muted">One fruit that deserves to be highlighted is grapefruit. Its effects on weight control have been studied directly. In a 12-week study in 91 obese individuals, eating half a fresh grapefruit before meals led to weight loss of 3.5 pounds (1.6 kg). The grapefruit group also had reduced insulin resistance, a metabolic abnormality that is implicated in various chronic diseases. Therefore, eating half a grapefruit about half an hour before some of your daily meals may help you feel more satiated and eat fewer overall calories.</p>
      </div>
    </div>
    <div style="width: 100%;align-items: center;justify-content: center;display: flex;margin: 30px 0;"><button class="more"><i class="fas fa-arrow-down"></i>&nbsp;&nbsp;load more</button></div>
  </div>
</section>
<!-- end of loss section -->

<!-- gain section -->
<section id="gain">
  <h1>Weight Gain</h1>
  <div class="container">
    <!-- 1st row -->
    <div class="row">
      <div class="col-md-4">
        <img src="images/protein smoothy.jpg">
        <h3>Home Made Protein Smoothies</h3>
        <hr class="dropdown-divider">
        <p class="bek-muted">Drinking homemade protein smoothies can be a highly nutritious and quick way to gain weight. It also gives you full control over the flavor and nutrient content. Here are just a few tasty variations you can try. You can combine each with 2 cups (470 mL) of dairy milk or soy milk if you have lactose intolerance. Both have more nutrients and calories than other alternative milks.</p>
        <p><span class="bek-muted-half">Chocolate banana nut shake : </span><span class="bek-muted">Combine 1 banana, 1 scoop of chocolate whey protein, and 1 tablespoon (15 mL) of peanut or another nut butter.</span></p>
        <p><span class="bek-muted-half">Vanilla berry shake : </span><span class="bek-muted"> Combine 1 cup (237 mL) of fresh or frozen mixed berries, ice, 1 cup (237 mL) of high protein, full fat Greek yogurt, and 1 scoop of vanilla whey protein.</span></p>
      </div>
      <div class="col-md-4">
        <img src="images/milk.jpg">
        <h3>Milk</h3>
        <hr class="dropdown-divider">
        <p class="bek-muted">Milk has been used as a weight gainer or muscle builder for decades. It provides a good balance of proteins, carbs, and fats and is a good source of calcium, as well as other vitamins and minerals. For those trying to add more muscle, milk is an excellent protein source that provides both casein and whey proteins. <br>Try drinking one or two glasses of whole milk (149 calories per cup) as a snack, with a meal, or before and after a workout if you’re training.</p>
      </div>
      <div class="col-md-4">
        <img src="images/rice.jpg">
        <h3>Rice</h3>
        <hr class="dropdown-divider">
        <p class="bek-muted">Rice is a convenient, low cost carb source to help you gain weight. Just 1 cup (158 grams) of cooked white rice provides 204 calories, 44 grams of carbs, and very little fat. Rice is also fairly calorie-dense, meaning you can easily obtain a high amount of carbs and calories from a single serving. This helps you eat more food, especially if you have a poor appetite or get full quickly.</p>
      </div>
    </div>
    <!-- 2nd row -->
    <div class="row">
      <div class="col-md-4">
        <img src="images/nuts.jpg">
        <h3>Nuts and Nut-Butter</h3>
        <hr class="dropdown-divider">
        <p class="bek-muted">Nuts and nut butters are perfect choices if you’re looking to gain weight. Just one small handful of raw almonds (1/4 cup) contains 170 calories, 6 grams of protein, 4 grams of fiber, and 15 grams of healthy fats. Since nuts are very calorie-dense, just two handfuls per day with a meal or as a snack can quickly add hundreds of calories. You can add nut butters to a variety of snacks or dishes, such as smoothies, yogurts, and crackers, to turn them into a high calorie snack in no time.</p>
      </div>
      <div class="col-md-4">
        <img src="images/protein.jpg">
        <h3>Protein Supplements</h3>
        <hr class="dropdown-divider">
        <p class="bek-muted">Taking protein supplements is a common strategy for athletes and bodybuilders who want to gain weight. There are many types available, including whey, soy, egg, and pea protein. Whey protein supplements and mass gainers (supplements that can help you gain muscle mass) can be very easy and cost-effective strategies to gain weight, especially when combined with strength training. Some people think whey protein is unhealthy or unnatural, but this isn’t the case. Whey protein is made from dairy and has been shown to help improve health markers and reduce the risk of disease</p>
      </div>
      <div class="col-md-4">
        <img src="images/dried fruits.jpg">
        <h3>Dried Fruits</h3>
        <hr class="dropdown-divider">
        <p class="bek-muted">Dried fruit is a high calorie snack that also provides antioxidants and micronutrients. You can get many different types of dried fruit, and they all have a naturally high sugar content. This makes them great for gaining weight, especially since they’re convenient to eat and taste great. While many people think fruits lose most of their nutrients when dried, this isn’t the case. Dried fruits contain lots of fiber and most of their vitamins and minerals remain intact. Try combining some dried fruit with a protein source, such as cuts of meat, cheese, or a whey protein shake. They also mix well with nuts and full fat plain Greek yogurt, providing a blend of healthy fats, protein, and other key nutrients.</p>
      </div>
    </div>
    <div style="width: 100%;align-items: center;justify-content: center;display: flex;margin: 30px 0;"><button class="more"><i class="fas fa-arrow-down"></i>&nbsp;&nbsp;load more</button></div>
  </div>
</section>
<!-- end of gain section -->

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
                <p><a href="food.php" style="color: #fff;font-size: 13px;">food</a></p>
                <p><a href="../meal-plans/meal-plans.php" id="meal-plans2">meal plans</a></p>
                <p><a href="food.php">nutrition</a></p>
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
<script  src="food.js"></script>
<script src="https://kit.fontawesome.com/72c6e5ab9f.js" crossorigin="anonymous"></script>
<script src="../bootstrap/js/bootstrap.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js?ver=1.3.2'></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="../index/index.js"></script>
<script src="../denie/denie.js"></script>

</body>
</html>