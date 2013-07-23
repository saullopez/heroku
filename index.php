<?php

// check for form submission - if it doesn't exist then send back to contact form
if (!isset($_POST["save"]) || $_POST["save"] != "contact") {
    header("Location: http://web.mit.edu/user/s/a/saulopez/www/contactalt.html"); exit;
}
  
// get the posted data
$name = $_POST["contact_name"];
$email_address = $_POST["contact_email"];
$message = $_POST["contact_message"];
  
// check that a name was entered
if (empty ($name))
    $error = "You must enter your name.";
// check that an email address was entered
elseif (empty ($email_address)) 
    $error = "You must enter your email address.";
// check for a valid email address
elseif (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", $email_address))
    $error = "You must enter a valid email address.";
// check that a message was entered
elseif (empty ($message))
    $error = "You must enter a message.";
    
// check if an error was found - if there was, send the user back to the form
if (isset($error)) {
    header("Location: http://web.mit.edu/user/s/a/saulopez/www/contactalt.html?e=".urlencode($error)); exit;
}
    
// write the email content
$email_content = "Name: $name\n";
$email_content .= "Email Address: $email_address\n";
$email_content .= "Message:\n\n$message";
  
// send the email
mail ("saullopez23@aol.com", "New Web Message", $email_content);
  
// send the user back to the form
header("Location: http://web.mit.edu/user/s/a/saulopez/www/contactalt.html?s=".urlencode("Thank you for your message! We will do our best to get back to you within 24 hours :]")); exit;

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Palisades Painting</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="http://web.mit.edu/user/s/a/saulopez/www/stylesheet.css" rel="stylesheet">

    <style>
      body {
        margin-top: 3%;
        margin-top: 60px;
        max-width: 1300px;
        }

            /* Customize the navbar links to be fill the entire space of the .navbar */
            .navbar .navbar-inner {
                padding: 0;
                margin-bottom: 40px;
                display: block;
                width: 100%;
            }
            .navbar .nav li a {
                font-weight: bold;
                border-left: 1px solid rgba(255, 255, 255, .75);
                border-right: 1px solid rgba(0, 0, 0, .1);
            }
            .navbar .nav li:first-child a {
                border-left: 0;
                border-radius: 3px 0 0 3px;
            }
            .navbar .nav li:last-child a {
                border-right: 0;
                border-radius: 0 3px 3px 0;
            }

    /* GLOBAL STYLES
    -------------------------------------------------- */
    /* Padding below the footer and lighter body text */

    body {
      padding-bottom: 40px;
      background-color: #FAFAFA;
    padding-top: 20px;
      max-width: 1300px;
    }

hr {margin:20px 0;border:0;border-top:1px solid #eeeeee;border-bottom: 1px solid #eeee;}

    /* CUSTOMIZE THE NAVBAR
    -------------------------------------------------- */

    /* Offset the responsive button for proper vertical alignment */
    .navbar .btn-navbar {
      margin-top: 10px;
    }



    /* CUSTOMIZE THE NAVBAR
    -------------------------------------------------- */

    /* Carousel base class */
    .carousel {
      margin-bottom: 60px;
    }

    .carousel .container {
      position: relative;
      z-index: 9;
    }

    .carousel-control {
      height: 80px;
      margin-top: 0;
      font-size: 120px;
      text-shadow: 0 1px 1px rgba(0,0,0,.4);
      background-color: transparent;
      border: 0;
    }

    .carousel .item {
      height: 500px;
    }
    .carousel img {
      position: absolute;
      top: 0;
      left: 0;
      min-width: 100%;
      height: 500px;
    }

    .carousel-caption {
      background-color: transparent;
      position: static;
      max-width: 550px;
      padding: 0 20px;
      margin-top: 200px;
    }
    .carousel-caption h1,
    .carousel-caption .lead {
      margin: 0;
      line-height: 1.25;
      color: #fff;
      text-shadow: 0 1px 1px rgba(0,0,0,.4);
    }
    .carousel-caption .btn {
      margin-top: 10px;
    }


    /* MARKETING CONTENT
    -------------------------------------------------- */

    /* Center align the text within the three columns below the carousel */
    .marketing .span4 {
      text-align: center;
    }
    .marketing h2 {
      font-weight: normal;
    }


    /* Featurettes
    ------------------------- */

    .featurette-divider {
      margin: 0 5% 0 5%; /* Space out the Bootstrap <hr> more */
    }
    .featurette { 
    background-color: white;
    padding: 10px 10px 0 10px;
      padding-top: 120px; /* Vertically center images part 1: add padding above and below text. */
      overflow: hidden; /* Vertically center images part 2: clear their floats. */
    }
    .featurette-image {
      margin-top: -120px; /* Vertically center images part 3: negative margin up the image the same amount of the padding to center it. */
    }

    /* Give some space on the sides of the floated elements so text doesn't run right into it. */
    .featurette-image.pull-left {
      margin-right: 40px;
    }
    .featurette-image.pull-right {
      margin-left: 40px;
    }

    /* Thin out the marketing headings */
    .featurette-heading {
      font-size: 50px;
    color: #01AB8E;
      font-weight: 300;
      line-height: 1;
      letter-spacing: -1px;
    z-index: 10;
    }



    /* RESPONSIVE CSS
    -------------------------------------------------- */

    @media (max-width: 979px) {

      .container.navbar-wrapper {
        margin-bottom: 0;
        width: auto;
      }
      .navbar-inner {
        border-radius: 0;
        margin: -20px 0;
      }

      .carousel .item {
        height: 500px;
      }
      .carousel img {
        width: auto;
        height: 500px;
      }

      .featurette {
        height: auto;
        padding: 0;
      }
      .featurette-image.pull-left,
      .featurette-image.pull-right {
        display: block;
        float: none;
        max-width: 40%;
        margin: 0 auto 20px;
      }
    }


    @media (max-width: 767px) {

      .navbar-inner {
        /*margin: -20px;*/
      }

      .carousel {
        /*margin-left: -20px;
        margin-right: -20px;*/
      }
      .carousel .container {
    margin: 0 20% 0 20%;
    z-index: 11;
      }
      .carousel .item {
        height: 300px;
      }
      .carousel img {
        height: 300px;
      }
      .carousel-caption {
        width: 65%;
        padding: 0 70px;
        margin-top: 100px;
      }
      .carousel-caption h1 {
        font-size: 30px;
      }
      .carousel-caption .lead,
      .carousel-caption .btn {
        font-size: 18px;
      }

      .marketing .span4 + .span4 {
        margin-top: 40px;
      }

      .featurette-heading {
        font-size: 30px;
      }
      .featurette .lead {
        font-size: 18px;
        line-height: 1.5;
      }

    }
    </style>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="../assets/ico/favicon.png">
  </head>
  <body>
               <div class="fluf navbar-fixed-top"><p>&nbsp;</p></div>
                <div class="navbar navbar-fixed-top">
                    <div class="navbar-inner">
                        <div class="container-fluid">
                             <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    </a>
<a class="brand" >&nbsp;&nbsp;Pali Painting&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
                            <!-- Everything you want hidden at 940px or less, place within here -->
          <div class="nav-collapse collapse">
                                <!-- .nav, .navbar-search, .navbar-form, etc -->
                            <ul class="nav">
                                <li class="divider-vertical"></li>
                                <li><a href="http://web.mit.edu/user/s/a/saulopez/www/index.html">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Home&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>

                                </li>
                                <li><a href="http://web.mit.edu/user/s/a/saulopez/www/about.html">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;About&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
                                <li><a href="http://web.mit.edu/user/s/a/saulopez/www/projects.html">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Projects&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>

                                <li class="active"><a href="http://web.mit.edu/user/s/a/saulopez/www/contactalt.html">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Contact&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>

                                </li>
                                <li class="divider-vertical"></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
                <!-- /.navbar -->
  <div class="container-fluid">
  
        <div class="page-header">
            <h1>Contact Us!</h1>
        </div>
<?php  
  
        // check for a successful form post  
        if (isset($_GET['s'])) echo "<div class=\"alert alert-success\">".$_GET['s']."</div>";  
  
        // check for a form error  
        elseif (isset($_GET['e'])) echo "<div class=\"alert alert-error\">".$_GET['e']."</div>";  
  
?>
<form method="POST" class="form-horizontal">
            <div class="control-group">
                <label class="control-label" for="input1">Name</label>
                <div class="controls">
                    <input type="text" name="contact_name" id="input1" placeholder="Your name">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="input2">Email Address</label>
                <div class="controls">
                    <input type="text" name="contact_email" id="input2" placeholder="Your email address">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="input3">Message</label>
                <div class="controls">
                    <textarea name="contact_message" id="input3" rows="8" class="span5" placeholder="The message you want to send to me."></textarea>
                </div>
            </div>
            <div class="form-actions">
                <input type="hidden" name="save" value="contact">
                <button type="submit" class="btn btn-primary">Send</button>
            </div>
        </form>
        
    </div>
          
    <!-- Wrap the rest of the page in another container to center all the content. -->
    <div class="container-fluid marketing rowcol">

      <!-- FOOTER -->
                  <div>    
          <hr>
                    <div class="footer">
                        <p>&copy; Palisades Paiting 2013</p>
                    </div>
          </div>

    </div><!-- /.container -->



    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap-transition.js"></script>
    <script src="../assets/js/bootstrap-alert.js"></script>
    <script src="../assets/js/bootstrap-modal.js"></script>
    <script src="../assets/js/bootstrap-dropdown.js"></script>
    <script src="../assets/js/bootstrap-scrollspy.js"></script>
    <script src="../assets/js/bootstrap-tab.js"></script>
    <script src="../assets/js/bootstrap-tooltip.js"></script>
    <script src="../assets/js/bootstrap-popover.js"></script>
    <script src="../assets/js/bootstrap-button.js"></script>
    <script src="../assets/js/bootstrap-collapse.js"></script>
    <script src="../assets/js/bootstrap-carousel.js"></script>
    <script src="../assets/js/bootstrap-typeahead.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.1.0.js"></script>
  <script src= "http://web.mit.edu/user/s/a/saulopez/www/bootstrap.min.js"></script>
    <script>
      !function ($) {
        $(function(){
          // carousel demo
          $('#myCarousel').carousel()
        })
      }(window.jQuery)
    </script> 
</body>
</html>
