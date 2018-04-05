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
    <title>Victory | Cricket Registration</title>
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
      <nav class="navbar navbar-custom navbar-fixed-top navbar bg-dark" id="menu" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#custom-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a class="navbar-brand" href="index.php">Victory</a>
          </div>
          <div class="collapse navbar-collapse" id="custom-collapse">
            <ul class="nav navbar-nav navbar-right">
              <li class=""><a class="" href="index.php">Home</a></li>
              <li class=""><a class="" href="#info">Terms</a></li>
              <li class=""><a class="" href="#register">Register</a></li>
              
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!--<section class="home-section home-parallax home-fade home-full-height parallax-bg">-->
      <!--  <div class="hero-slider">-->
      <!--    <ul class="slides">-->
      <!--      <li class="bg-dark-30 bg-dark" style="background-image:url(assets/images/sd1.jpg);">-->
      <!--        <div class="titan-caption">-->
      <!--          <div class="caption-content">-->
      <!--            <div class="font-alt mb-30 titan-title-size-1">Hello &amp; Welcome to</div>-->
      <!--            <div class="font-alt mb-40 titan-title-size-4">Victory</div><a class="section-scroll btn btn-border-w btn-round" href="#info">Move On</a>-->
      <!--          </div>-->
      <!--        </div>-->
      <!--      </li>-->
      <!--      <li class="bg-dark-30 bg-dark" style="background-image:url(assets/images/sd2.jpeg);">-->
      <!--        <div class="titan-caption">-->
      <!--          <div class="caption-content">-->
      <!--            <div class="font-alt mb-30 titan-title-size-2">We Are Not A Team Because We Work Together<br/>We Are A Team Because We Respect Each Other-->
      <!--            </div><a class="btn btn-border-w btn-round" href="#info">Move On</a>-->
      <!--          </div>-->
      <!--        </div>-->
      <!--      </li>-->
      <!--      <li class="bg-dark-30 bg-dark" style="background-image:url(assets/images/sd3.jpeg);">-->
      <!--        <div class="titan-caption">-->
      <!--          <div class="caption-content">-->
      <!--            <div class="font-alt mb-30 titan-title-size-1">Victory provides sport and recreational activities to youth</div>-->
      <!--            <div class="font-alt mb-40 titan-title-size-3">we offer a safe place to play and grow</div><a class="section-scroll btn btn-border-w btn-round" href="#info">Move On</a>-->
      <!--          </div>-->
      <!--        </div>-->
      <!--      </li>-->
      <!--    </ul>-->
      <!--  </div>-->
      <!--</section>-->
      <div class="main">
      <div id="info"></div>
        <section class="module">
          <div class="container">
            <div class="row">
              <div class="col-sm-12">
                <h2 class="module-title font-alt">Terms & Conditions</h2>
                <div class="module-subtitle font-serif align-left">
                  <button class="accordion">Tournament Format</button>
                  <div class="panel">
                    <h3>
                      <strong>Knockout</strong>
                    </h3>
                    <p>
                        A single-elimination, knockout, or sudden death tournament is a type of elimination tournament where the loser of each match-up is immediately eliminated from the tournament. Each winner will play another in the next round, until the final match-up, whose winner becomes the tournament champion.
                    </p>
                  </div>
                  <div class="col-sm-6">
                      <button class="accordion">Changes to the Terms</button>
                      <div class="panel">
                        <p>
                            We may modify these Terms from time to time.
                        </p>
                      </div>
                      
                      <button class="accordion">Eligibility</button>
                      <div class="panel">
                        <p>
                          You must be 18 years or older for entering the tournament.
                          You may not eligible, if we have previously banned you from the tours.
                        </p>
                      </div>

                      <button class="accordion">Tournament Rules</button>
                      <div class="panel">
                        <p>
                          You are not suppose to violate any of the following rules, or you can be disqualified.
                        </p>
                        <ul class="text-left">
                          <li>
                            During the tournament all participants are expected to behave professionally and should avoid abusive language/gestures/ question umpires decisions. The participants must also remember to treat other players with respect as well as have fun.
                          </li>
                          <li>
                            The Team Captain is responsible for informing all of the teammates about when the team will be playing and on what dates. Our responsibility is to tell the Captain when his team will be playing.
                          </li>
                          <li>
                            At no account is <strong>Victory</strong> held accountable for any injuries happening during a game.
                          </li>
                          <li>
                            If any player is deemed to be violent, ill-cooperative, or dangerous to anyone around him, he will be removed, and possibly a police report will be filed.
                          </li>
                        </ul>
                      </div>
                  </div>
                  <div class="col-sm-6">
                      <button class="accordion">Translation</button>
                      <div class="panel">
                        <p>
                            We may translate these Terms into other languages for your convenience. Nevertheless, the English version governs your relationship with <strong>Victory</strong>, and any inconsistencies among the different versions will be resolved in favor of the English version.
                        </p>
                      </div>
                      
                      <button class="accordion">Site Availability</button>
                      <div class="panel">
                        <p>
                            The Site may be modified, updated, interrupted, suspended or discontinued at any time with a notice on our socail links.
                        </p>
                      </div>
                      
                      <button class="accordion">Game Rules</button>
                      
                      <div class="panel">
                        
                        <p> <h3><strong>Fee will be refundable in the case of cancelation of the tournament.</strong></h3>
                          You are not suppose to violate any of the following rules, or you can be disqualified.
                        </p>
                        <ul>
                          <li>
                            One team will consist of 8 players
                          </li>
                          <li>
                            One inning will be 6 overs long
                          </li>
                          <li>
                            Matches will starts on the time decided by <strong>Victory</strong> <em>sharp</em>.
                          </li>
                          <li>
                            Walk Over Time: <strong>15 minutes</strong> after the time decided.
                          </li>
                          <li>
                            Toss will be conducted by <strong>Victory Ambassador</strong>.
                          </li>
                          <li>
                            It is mandatory to place 2 fielders behind the wicket keeper.
                          </li>
                          <li>
                            Runs from over throws and byes will be allowed.
                          </li>
                          <!--<li>-->
                          <!--  Runs from Leg-byes will not be allowed.-->
                          <!--</li>-->
                          <li>
                            Scorer will be appointed by the <strong>Victory Controller</strong>.
                          </li>
                          <li>
                            A written list must be presented at the time of the coin toss <strong>NO SUBSTITUTION ALLOWED</strong>.
                          </li>
                          <li>
                            In the case of a tie in a match where runs both teams scored are the same, the deciding factor of who wins will be decided by comparing the run rate of each team. If the run rate of both teams are the same, the deciding factor will be a bowl out. Both teams will select 5 bowlers. Each bowler will be given two tries to try to hit the wicket without a batter's presence. Victory of the match will proceed to whichever team is able to score the most wickets.
                          </li>
                          <!--<li>-->
                          <!--  During bowling your arm must be completely straight, zero degrees of bending is allowed,  any noticeable bending of the arm will result in being called a 'no ball' and three or most of such deliveries will result in loss of bowling privilege.-->
                          <!--</li>-->
                          <li>
                            <strong>Umpire’s decision will be final.</strong>
                          </li>
                          <li>
                            Tournament will be played on the basis of knock-out.
                          </li>
                          <li>
                            Winning team of the tournament will be awarded <strong>THRICE</strong> of the ammount they paid.
                          </li>
                          <li>
                            Tournament Entry Fees: <strong>Rs 100</strong> <em>per head</em>, will be submitted to the <strong>Victory Controller</strong>. 
                          </li>
                          <li>
                            Protest Fees: <strong>Rs 500</strong> <em>per protest</em>.
                            <ul>
                            <li><strong>
                            Protest Fees will be charged only if a team regrets Umpire's Decision.</strong>
                            </li></ul>
                          </li>
                          <li>
                            Due to any unfavourable condition a match goes unfinished then a new date will be announced by <strong>Victory</strong> for rest of the match.
                          </li>
                        </ul>
                       
                      </div>
                  </div>        
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-2 col-sm-offset-5">
                <div class="large-text align-center"><a class="section-scroll" href="#register"><i class="fa fa-angle-down"></i></a></div>
              </div>
            </div>
          </div>
        </section>
    <div id="register"></div>
        <section class="module module-video bg-dark-30 parallax">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3" style="background-color:rgba(0,0,0,0.7); padding-top:5%;">
                <h2 class="module-title font-alt" style="margin-top:15px;">Registration</h2>
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
                    <div class="field name-box">
                      <input type="radio" name="tearmsCheck" id="terms" required data-parsley-required-message="You are not allowed to proceed without the agreement.">
                      <span style="color: #ffff00;">       
                          I have read and agree to the <strong>Victory</strong> terms and condition mentioned above.
                      </span>
                    </div>
                    <div class="field name-box">
                      <input name="register" type="submit" class="btn btn-default btn-block btn-submit" value="Register">
                    </div>
                </form>
              </div>
            </div>
          </div>
          <div class="video-player parallax" data-property="{videoURL:'https://www.youtube.com/watch?v=xQ_IQS3VKjA', containment:'.module-video', startAt:0, mute:true, autoPlay:true, loop:true, opacity:1, showControls:false, showYTLogo:false, vol:25}"></div>
          <div class="video-controls-box">
            <div class="container">
              <div class="video-controls"><a class="fa fa-volume-up" id="video-volume" href="#">&nbsp;</a><a class="fa fa-pause" id="video-play" href="#">&nbsp;</a></div>
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