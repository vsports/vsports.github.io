<?php
// starting sessions 
ob_start();
session_start();

// establishing connection with database 
include "assets/php/db-config.php";

// getting data from the popup registration form
if(isset($_POST["register"]))
{
    // getting data storing in php variables
    $team_name = $_POST["teamname"];
    $contact = $_POST["contact"];
    $captain = $_POST["captain"];
    $vcaptain = $_POST["vice"];
    $player1 = $_POST["player1"];
    $player2 = $_POST["player2"];
    $player3 = $_POST["player3"];
    $player4 = $_POST["player4"];
    $player5 = $_POST["player5"];
    $player6 = $_POST["player6"];

    // cheking if the credential matches one of our database
    $sql = "SELECT * FROM team_registration WHERE contact=$contact";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    
    if(mysqli_num_rows($result) != 0)
    {
        $_SESSION["msg"] = "info";
        header("location:index.php");
        exit;
    }

    // if false putting data to the our database
    else
    {
        $query = mysqli_query($db, "INSERT INTO team_registration (teamname, contact, captain, vcaptain, player1, player2, player3, player4, player5, player6) VALUES ('$team_name', '$contact', '$captain', '$vcaptain', '$player1', '$player2', '$player3', '$player4', '$player5', '$player6')");
        if($query){
            $_SESSION["msg"] = "register";
            header("location:index.php");
            die();
        }
    }
}

// getting data from the contact form
else if(isset($_POST["contact"]))
{

    // getting data storing in php variables
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // sending contact information
    $query = mysqli_query($db, "INSERT INTO contact (name, email, message) VALUES ('$name', '$email', '$message')");

    if($query)
    {
        $_SESSION["msg"] = "contact";
        mail($email,"Victory Hello","Hi ".$name."! Thanks for reaching out, This is an auto generated reply, we'll be back to you soon.","Victory");
        header("location:index.php");
        die();
    }
}

?>




<!DOCTYPE html>
<html lang="en-US" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--  
    Document Title
    =============================================
    -->
    <title>Victory | Official</title>
    <!--  
    Favicons
    =============================================
    -->
    <link rel="shortcut icon" href="assets/images/icons/LogoT.png" type="image/png">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/images/favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--  
    Stylesheets
    =============================================
    
    -->
    <!-- Default stylesheets-->
    <link href="assets/lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Template specific stylesheets-->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Volkhov:400i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="assets/lib/animate.css/animate.css" rel="stylesheet">
    <link href="assets/lib/components-font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/lib/et-line-font/et-line-font.css" rel="stylesheet">
    <link href="assets/lib/flexslider/flexslider.css" rel="stylesheet">
    <link href="assets/lib/owl.carousel/dist/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/lib/owl.carousel/dist/assets/owl.theme.default.min.css" rel="stylesheet">
    <link href="assets/lib/magnific-popup/dist/magnific-popup.css" rel="stylesheet">
    <link href="assets/lib/simple-text-rotator/simpletextrotator.css" rel="stylesheet">
    <!-- Main stylesheet and color file-->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/parsley.css" rel="stylesheet">
    <link href="assets/css/toastr.min.css" rel="stylesheet">
    <link id="color-scheme" href="assets/css/colors/default.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
  </head>
  <body data-spy="scroll" data-target=".onpage-navigation" data-offset="60">
    <main id="wrapper">
      <div class="page-loader">
        <div class="loader">Loading...</div>
      </div>
      <div id="home"></div>
      <nav class="navbar navbar-custom navbar-fixed-top navbar-transparent" id="menu" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#custom-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a class="navbar-brand" href="index.php">Victory</a>
          </div>
          <div class="collapse navbar-collapse" id="custom-collapse">
            <ul class="nav navbar-nav navbar-right">
              <li class=""><a class="" href="#home">Home</a></li>
              <li class=""><a class="" href="#about">About</a></li>
              <li class=""><a class="" href="#vision">Vision</a></li>
              <li class=""><a class="" href="#tour">Tournaments</a></li>
              <li class=""><a class="" href="#contact">Contact</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <section class="home-section home-parallax home-fade home-full-height parallax-bg">
        <div class="hero-slider">
          <ul class="slides">
            <li class="bg-dark-30 bg-dark" style="background-image:url(assets/images/sd1.jpg);">
              <div class="titan-caption">
                <div class="caption-content">
                  <div class="font-alt mb-30 titan-title-size-1">Hello &amp; Welcome to</div>
                  <div class="font-alt mb-40 titan-title-size-4">Victory</div><a class="section-scroll btn btn-border-w btn-round" href="#about">Move On</a>
                </div>
              </div>
            </li>
            <li class="bg-dark-30 bg-dark" style="background-image:url(assets/images/sd2.jpeg);">
              <div class="titan-caption">
                <div class="caption-content">
                  <div class="font-alt mb-30 titan-title-size-2">We Are Not A Team Because We Work Together<br/>We Are A Team Because We Respect Each Other
                  </div><a class="btn btn-border-w btn-round" href="#about">Move On</a>
                </div>
              </div>
            </li>
            <li class="bg-dark-30 bg-dark" style="background-image:url(assets/images/sd3.jpeg);">
              <div class="titan-caption">
                <div class="caption-content">
                  <div class="font-alt mb-30 titan-title-size-1">Victory provides sport and recreational activities to youth</div>
                  <div class="font-alt mb-40 titan-title-size-3">we offer a safe place to play and grow</div><a class="section-scroll btn btn-border-w btn-round" href="#about">Move On</a>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </section>
      <div class="main">
      <div id="about"></div>
        <section class="module">
          <div class="container">
            <div class="row">
              <div class="col-sm-8 col-sm-offset-2">
                <h2 class="module-title font-alt">Who We Are?</h2>
                <div class="module-subtitle font-serif large-text">We the Victory provides sport and recreational activities to youth, offering a safe place to play and grow, establishing values of accountability and responsibility, teaching goal setting and instilling in youth the ability to dream and go out and achieve their goals.</div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-2 col-sm-offset-5">
                <div class="large-text align-center"><a class="section-scroll" href="#vision"><i class="fa fa-angle-down"></i></a></div>
              </div>
            </div>
          </div>
        </section>
        <div id="vision"></div>
        <section class="module module-video bg-dark-30 parallax">
          <div class="container">
            <div class="row">
              <div class="col-sm-5 col-sm-offset-1">
                <h2 class="module-title font-alt">Vision</h2>
              </div>
              <div class="col-sm-5">
                  <p class="font-serif">Our vision is to raise healthy, happy and educated youth who have the opportunity to go out and pursue the careers and goals they have dreamt of. In our vision we see a community where there is significantly reduced alcohol and drug abuse, crime and social deviance.</p>
              </div>
            </div>
            <br><br><br>
            <div class="row">
              <div class="col-sm-5 col-sm-offset-1">
                  <h2 class="module-title font-alt">Mission</h2>
              </div>
              <div class="col-sm-5">
                <p class="font-serif">Our mission is to run a consistent and sustainable sports development program providing youth with opportunities to participate in recreational and competitive sporting activities while contributing to the social upliftment of the community.</p>
              </div>
            </div>
          </div>
          <div class="row">
              <div class="col-sm-2 col-sm-offset-5">
                <div class="large-text align-center"><a class="section-scroll" href="#tour"><i class="fa fa-angle-down" style="color:#fff;"></i></a></div>
              </div>
            </div>
          <div class="video-player parallax" data-property="{videoURL:'https://www.youtube.com/watch?v=Cgp8eP9wh14&t=35s', containment:'.module-video', startAt:0, mute:true, autoPlay:true, loop:true, opacity:1, showControls:false, showYTLogo:false, vol:25}"></div>
          <div class="video-controls-box">
            <div class="container">
              <div class="video-controls"><a class="fa fa-volume-up" id="video-volume" href="#">&nbsp;</a><a class="fa fa-pause" id="video-play" href="#">&nbsp;</a></div>
            </div>
          </div>
        </section>
        <hr class="divider-w">
        <div id="tour"></div>
        <section class="module">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <div class="module-title font-alt">TOURNAMENTS</div>
                <div class="module-subtitle font-serif">List of the tournaments we offer</div>
              </div>
            </div>
          </div>
          <ul class="works-grid works-grid-gut works-grid-3 works-hover-w" id="works-grid">
            <a href="cricketRegister.php">
            <li class="work-item illustration webdesign">
                <div class="work-image"><img src="assets/images/tour/Cricket.png" alt="Portfolio Item"/></div>
                <div class="work-caption font-alt">
                  <h3 class="work-title">Cricket</h3>
                <div class="btn-group btn-group-block" role="group">
                    Registration
                </div>
                </div>
            </li>
            </a>
            <a href="#">
            <li class="work-item marketing photography">
                <div class="work-image"><img src="assets/images/tour/Football.png" alt="Portfolio Item"/></div>
                <div class="work-caption font-alt">
                  <h3 class="work-title">Football</h3>
                <div class="btn-group btn-group-block" role="group">
                    Comming Soon
                </div>
                </div>
            </li>
            </a>
            <a href="#">
            <li class="work-item illustration photography">
                <div class="work-image"><img src="assets/images/tour/Volleyball.png" alt="Portfolio Item"/></div>
                <div class="work-caption font-alt">
                  <h3 class="work-title">Volleyball</h3>
                <div class="btn-group btn-group-block" role="group">
                    Comming Soon
                </div>
                </div>
            </li>
            </a>
            <a href="#">
            <li class="work-item marketing photography">
                <div class="work-image"><img src="assets/images/tour/tennis.png" alt="Portfolio Item"/></div>
                <div class="work-caption font-alt">
                  <h3 class="work-title">Table Tennis</h3>
                <div class="btn-group btn-group-block" role="group">
                    Comming Soon
                </div>
                </div>
            </li>
            </a>
            <a href="#">
            <li class="work-item marketing webdesign">
                <div class="work-image"><img src="assets/images/tour/Snooker.png" alt="Portfolio Item"/></div>
                <div class="work-caption font-alt">
                  <h3 class="work-title">Snooker</h3>
                <div class="btn-group btn-group-block" role="group">
                    Comming Soon
                </div>
                </div>
            </li>
            </a>
            <a href="#">
            <li class="work-item marketing webdesign">
                <div class="work-image"><img src="assets/images/tour/Badminton.png" alt="Portfolio Item"/></div>
                <div class="work-caption font-alt">
                  <h3 class="work-title">Badminton</h3>
                <div class="btn-group btn-group-block" role="group">
                    Comming Soon
                </div>
                </div>
            </li>
            </a>
            <a href="#">
            <li class="work-item marketing photography">
                <div class="work-image"><img src="assets/images/tour/Foosball.png" alt="Portfolio Item"/></div>
                <div class="work-caption font-alt">
                  <h3 class="work-title">Foosball</h3>
                <div class="btn-group btn-group-block" role="group">
                    Comming Soon
                </div>
                </div>
            </li>
            </a>
            <a href="#">
            <li class="work-item illustration webdesign">
                <div class="work-image"><img src="assets/images/tour/Chess.png" alt="Portfolio Item"/></div>
                <div class="work-caption font-alt">
                  <h3 class="work-title">Chess</h3>
                <div class="btn-group btn-group-block" role="group">
                    Comming Soon
                </div>
                </div>
            </li>
            </a>
            <a href="#">
            <li class="work-item marketing webdesign">
                <div class="work-image"><img src="assets/images/tour/Common.png" alt="Portfolio Item"/></div>
                <div class="work-caption font-alt">
                  <h3 class="work-title">Commonwealth Games</h3>
                <div class="btn-group btn-group-block" role="group">
                    Comming Soon
                </div>
                </div>
            </li>
            </a>
          </ul>
          <br><br>
          <div class="row">
              <div class="col-sm-2 col-sm-offset-5">
                <div class="large-text align-center"><a class="section-scroll" href="#contact"><i class="fa fa-angle-down"></i></a></div>
              </div>
            </div>
        </section>
        <section class="module bg-dark-60 pt-0 pb-0 parallax-bg testimonial" data-background="assets/images/quote.jpg">
          <div class="testimonials-slider pt-140 pb-140">
            <ul class="slides">
              <li>
                <div class="container">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="module-icon"><span class="icon-quote"></span></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                      <blockquote class="testimonial-text font-alt">Gold medals aren't really made of gold. They're made of sweat, determination, and a hard-to-find alloy called guts</blockquote>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4 col-sm-offset-4">
                      <div class="testimonial-author">
                        <div class="testimonial-caption font-alt">
                          <div class="testimonial-descr">Victory</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <li>
                <div class="container">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="module-icon"><span class="icon-quote"></span></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                      <blockquote class="testimonial-text font-alt">Victory is always possible for the person who refuses to stop fighting</blockquote>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4 col-sm-offset-4">
                      <div class="testimonial-author">
                        <div class="testimonial-caption font-alt">
                            <div class="testimonial-descr">Victory</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <li>
                <div class="container">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="module-icon"><span class="icon-quote"></span></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                      <blockquote class="testimonial-text font-alt">Sports do not build character. They reveal it</blockquote>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4 col-sm-offset-4">
                      <div class="testimonial-author">
                        <div class="testimonial-caption font-alt">
                            <div class="testimonial-descr">Victory</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </section>
        <section class="module" id="contact">
            <div class="container">
              <div class="row">
                <div class="col-sm-8">
                  <h2 class="module-title font-alt">Say Hello!</h2>
                  <div class="module-subtitle font-serif"></div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-8">
                  <form role="form" method="post" data-parsley-validate="">
                    <div class="field name-box">
                      <input class="card-4" name="name" type="text" id="name" placeholder="Who are you?" required data-parsley-minlength="6" data-parsley-maxlength="20" data-parsley-pattern="^[a-zA-Z\s]+$" data-parsley-pattern-message="You are not allowed to use any number or special character."/>
                      <label for="name">Name</label>
                      <span class="ss-icon">check</span>
                    </div>
                    <div class="field name-box">
                        <input class="card-4" name="email" type="text" id="name" placeholder="abc@example.com" required data-parsley-type="email" data-parsley-email-message="Please enter a valid email" />
                        <label for="name">Email</label>
                        <span class="ss-icon">check</span>
                      </div>
                    <div class="field name-box">
                      <textarea row="1" class="card-4" name="message" type="text" id="name" placeholder="Say something . . . " required data-parsley-minlength="10" data-parsley-maxlength="1000" data-parsley-pattern="^[a-zA-Z\d\-\_\.\%\$\@\#\=\*\&\!\s]+$" data-parsley-pattern-message="You are not allowed to use any special character."></textarea>
                    </div>
                      <input name="contact" type="submit" class="btn btn-default btn-block btn-submit" value="Send">
                  </form>
                  <!--<div class="ajax-response font-alt" id="contactFormResponse"></div>-->
                </div><br><br>
                <div class="col-sm-4">
                  <div class="alt-features-item mt-0">
                    <div class="alt-features-icon"><span class="icon-megaphone"></span></div>
                    <h3 class="alt-features-title font-alt">Where to meet</h3>
                      <div class="footer-social-links"><a href="#"><i class="fa fa-facebook socialSize"></i></a><a href="#"><i class="fa fa-twitter socialSize"></i></a><a href="#"><i class="fa fa-dribbble socialSize"></i></a><a href="#"><i class="fa fa-skype socialSize"></i></a>                    
                      </div>
                    </div>
                  <div class="alt-features-item mt-xs-60">
                    <div class="alt-features-icon"><span class="icon-map"></span></div>
                    <h3 class="alt-features-title font-alt">Say Hello</h3>Email: info_victory@gmail.com<br/>Phone: +92-3323605392
                  </div>
                </div>
              </div>
            </div>
          </section>
        
        <hr class="divider-d">
        <footer class="footer bg-dark">
          <div class="container">
            <div class="row">
              <div class="col-sm-6">
                <p class="copyright font-alt">&copy; 2018&nbsp;<a href="index.html">Victory</a>, All Rights Reserved</p>
              </div>
            </div>
          </div>
        </footer>
      </div>
      <div class="scroll-up"><a href="#totop"><i class="fa fa-angle-double-up"></i></a></div>
    </main>

<!-- custom html/bootstrap modal form  -->

<!-- Popup Modal Form -->
<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content card-5">
      <div class="modal-header">
        <h3 class="modal-title text-center" id="exampleModalLabel">Registration</h3>
      </div>
      <form method="POST" data-parsley-validate="">
        <div class="field name-box">
          <input class="card-4" name="teamname" type="text" id="name" placeholder="Name" required data-parsley-minlength="6" data-parsley-maxlength="20" data-parsley-pattern="^[a-zA-Z0-9\-\s]+$" data-parsley-pattern-message="You are not allowed to use any special character."/>
          <label for="name">Your Team</label>
          <span class="ss-icon">check</span>
        </div>
        <div class="field name-box">
          <input class="card-4" name="contact" type="text" id="name" placeholder="03##-#######" required data-parsley-type="number" data-parsley-minlength="11" data-parsley-maxlength="11" data-parsley-pattern="^03\d{9}" data-parsley-pattern-message="Please use a valid contact number (03#########)" />
          <label for="name">Contact</label>
          <span class="ss-icon">check</span>
        </div>
        <div class="field name-box">
          <input class="card-4" name="captain" type="text" id="name" placeholder="Name" required data-parsley-minlength="3" data-parsley-maxlength="20" data-parsley-pattern="^[a-zA-Z\s]+$" data-parsley-pattern-message="You are not allowed to use any number or special character."/>
          <label for="name">Captain</label>
          <span class="ss-icon">check</span>
        </div>
        <div class="field name-box">
          <input class="card-4" name="vice" type="text" id="name" placeholder="Name" required data-parsley-minlength="3" data-parsley-maxlength="20" data-parsley-pattern="^[a-zA-Z\s]+$" data-parsley-pattern-message="You are not allowed to use any number or special character."/>
          <label for="name">V. Captain</label>
          <span class="ss-icon">check</span>
        </div>
        <div class="field name-box">
          <input class="card-4" name="player1" type="text" id="name" placeholder="Name" required data-parsley-minlength="3" data-parsley-maxlength="20" data-parsley-pattern="^[a-zA-Z\s]+$" data-parsley-pattern-message="You are not allowed to use any number or special character."/>
          <label for="name">Teammate 1</label>
          <span class="ss-icon">check</span>
        </div>
        <div class="field name-box">
          <input class="card-4" name="player2" type="text" id="name" placeholder="Name" required data-parsley-minlength="3" data-parsley-maxlength="20" data-parsley-pattern="^[a-zA-Z\s]+$" data-parsley-pattern-message="You are not allowed to use any number or special character."/>
          <label for="name">Teammate 2</label>
          <span class="ss-icon">check</span>
        </div>
        <div class="field name-box">
          <input class="card-4" name="player3" type="text" id="name" placeholder="Name" required data-parsley-minlength="3" data-parsley-maxlength="20" data-parsley-pattern="^[a-zA-Z\s]+$" data-parsley-pattern-message="You are not allowed to use any number or special character."/>
          <label for="name">Teammate 3</label>
          <span class="ss-icon">check</span>
        </div>
        <div class="field name-box">
          <input class="card-4" name="player4" type="text" id="name" placeholder="Name" required data-parsley-minlength="3" data-parsley-maxlength="20" data-parsley-pattern="^[a-zA-Z\s]+$" data-parsley-pattern-message="You are not allowed to use any number or special character."/>
          <label for="name">Teammate 4</label>
          <span class="ss-icon">check</span>
        </div>
        <div class="field name-box">
          <input class="card-4" name="player5" type="text" id="name" placeholder="Name" required data-parsley-minlength="3" data-parsley-maxlength="20" data-parsley-pattern="^[a-zA-Z\s]+$" data-parsley-pattern-message="You are not allowed to use any number or special character."/>
          <label for="name">Teammate 5</label>
          <span class="ss-icon">check</span>
        </div>
        <div class="field name-box">
          <input class="card-4" name="player6" type="text" id="name" placeholder="Name" required data-parsley-minlength="3" data-parsley-maxlength="20" data-parsley-pattern="^[a-zA-Z\s]+$" data-parsley-pattern-message="You are not allowed to use any number or special character."/>
          <label for="name">Teammate 6</label>
          <span class="ss-icon">check</span>
        </div>
          <input name="register" type="submit" class="btn btn-default btn-block btn-submit" value="Register">
    </form>
  </div>
  </div>
</div>


<!-- Popup Modal Cricket Info -->






    <!--  
    JavaScripts
    =============================================
    -->
    <script src="assets/lib/jquery/dist/jquery.js"></script>
    <script src="assets/lib/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/lib/wow/dist/wow.js"></script>
    <script src="assets/lib/jquery.mb.ytplayer/dist/jquery.mb.YTPlayer.js"></script>
    <script src="assets/lib/isotope/dist/isotope.pkgd.js"></script>
    <script src="assets/lib/imagesloaded/imagesloaded.pkgd.js"></script>
    <script src="assets/lib/flexslider/jquery.flexslider.js"></script>
    <script src="assets/lib/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="assets/lib/smoothscroll.js"></script>
    <script src="assets/lib/magnific-popup/dist/jquery.magnific-popup.js"></script>
    <script src="assets/lib/simple-text-rotator/jquery.simple-text-rotator.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/parsley.min.js"></script>
    <script src="assets/js/toastr.min.js"></script>

    <!-- toastr alerts -->
    <script>
    toastr.options = {
      "closeButton": false,
      "debug": false,
      "newestOnTop": false,
      "progressBar": true,
      "positionClass": "toast-top-right",
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }
    var type = "<?php if(isset($_SESSION['msg'])){echo $_SESSION['msg'];session_destroy();}?>";
    switch(type){
		case 'info':
            toastr.info("<strong>Info!</strong> Your registration request <strong>submitted already!</strong>");
            break;
        case 'contact':
            toastr.success("<strong>Success!</strong> Your message is <strong>successfully sent!</strong>");
            break;
        case 'register':
            toastr.success("<strong>Success!</strong> You are <strong>successfully registered!</strong>");
            break;
    }
    </script>
    <!-- smooth scroller -->
    <script>
    $(document).on('click', 'a[href^="#"]', function (event) {
            event.preventDefault();
        
            $('html, body').animate({
                scrollTop: $($.attr(this, 'href')).offset().top
            }, 1000);
        });

    </script>
  </body>
</html>