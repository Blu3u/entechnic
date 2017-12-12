<?php
require_once 'Modules\Database\MySQLInterface.class.php';
require_once 'Modules\Interface\HTMLInterface.class.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src="js/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="css/index.css" />
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
</head>
<body class="container-fluid">
  <canvas id="nokey" width="100%" height="100vh">
      Your Browser Don't Support Canvas, Please Download Chrome ^_^``
  </canvas>
  <!--    NAV   -->
    <nav class="navbar navbar-expand-md navbar-dark navbar-fixed-top navbar-fixed" id="navMain">
        <a class="navbar-brand" href="index.html"><img src="#" alt="logo" /></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navBtns" ><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse justify-content-md-end" id="navBtns">
          <?php HTMLInterface::GetNavigation() ?>
        </div>
    </nav>

    <div class="main">
      <div class="welcome">
        <h1>Welcome in our site bitches!</h1>
      </div>
      <div class="row">
      <div class="clearfix col-12">
        <h1>Introduction</h1>
      </div>
      <div class="text col-7">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam at rutrum metus. Nam eu ornare sem. Proin nec laoreet elit. Nam gravida, felis ut consequat maximus, metus ipsum lacinia leo, vel hendrerit tellus enim ac lorem. Ut nec tincidunt tortor, non faucibus orci. Praesent nisl risus, pellentesque eu iaculis dignissim, varius eget purus. In fringilla volutpat nisl sed fermentum. Etiam leo dolor, molestie sit amet lectus et, molestie placerat magna. Ut gravida turpis libero, at faucibus neque bibendum vitae. Etiam ornare, tortor non elementum rhoncus, ante risus mattis elit, id efficitur ligula sapien at eros. In vitae ullamcorper sapien. Duis ac imperdiet diam. Sed et sapien sapien. Fusce at mollis sapien. Pellentesque venenatis orci at sapien auctor sollicitudin. Etiam nibh quam, gravida a tincidunt a, facilisis non lacus. Etiam sed tempus ipsum. Mauris facilisis fermentum blandit. Sed eu nisl facilisis, blandit ante vitae, elementum purus. Aenean nec lorem id quam varius lacinia quis eu dui. Vivamus vulputate euismod mollis. Proin id pharetra quam. Etiam hendrerit tincidunt aliquam. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
      Lorem ipsum dolor sit amet, consectetur adipiscing elit.  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam at rutrum metus.
    </div>
    <div class="text1 col-5">
      <img src="img/bg1.jpg" alt="#" width="50%">
    </div>
    <div class="clear"></div>
    <div class="text2 col-5">
      <img src="img/bg1.jpg" alt="#" width="50%">
    </div>
    <div class="text3 col-7">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam at rutrum metus. Nam eu ornare sem. Proin nec laoreet elit. Nam gravida, felis ut consequat maximus, metus ipsum lacinia leo, vel hendrerit tellus enim ac lorem. Ut nec tincidunt tortor, non faucibus orci. Praesent nisl risus, pellentesque eu iaculis dignissim, varius eget purus. In fringilla volutpat nisl sed fermentum. Etiam leo dolor, molestie sit amet lectus et, molestie placerat magna. Ut gravida turpis libero, at faucibus neque bibendum vitae. Etiam ornare, tortor non elementum rhoncus, ante risus mattis elit, id efficitur ligula sapien at eros. In vitae ullamcorper sapien. Duis ac imperdiet diam. Sed et sapien sapien. Fusce at mollis sapien. Pellentesque venenatis orci at sapien auctor sollicitudin. Etiam nibh quam, gravida a tincidunt a, facilisis non lacus. Etiam sed tempus ipsum. Mauris facilisis fermentum blandit. Sed eu nisl facilisis, blandit ante vitae, elementum purus. Aenean nec lorem id quam varius lacinia quis eu dui. Vivamus vulputate euismod mollis. Proin id pharetra quam. Etiam hendrerit tincidunt aliquam. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam at rutrum metus. Nam eu ornare sem. Proin nec laoreet elit. Nam gravida, felis ut consequat maximus, metus ipsum lacinia leo, vel hendrerit tellus enim ac lorem. Ut nec tincidunt tortor, non faucibus orci. Praesent nisl risus, pellentesque eu iaculis dignissim, varius eget purus. In fringilla volutpat nisl sed fermentum. Etiam leo dolor, molestie sit amet lectus et, molestie placerat magna. Ut gravida turpis libero, at faucibus
  </div>
    </div>
<footer><p>Designed by <span>Our Company</span></p></footer>
<!--  Modals -->
<!--  Login -->
    <div class="modal fade" id="signIn-mod">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h2>Sign Me In:</h2>
            <button type="button" class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
          </div>
          <div class="modal-body">
              <div>
                <div class="form-group">
                  <label for="login">E-mail:</label>
                  <input type="text" class="form-control" id="mail" placeholder="Enter your email adress here..."/>
                  <div class="form-control-feedback"></div>
                </div>
                <div class="form-group">
                  <label for="fName">Password:</label>
                  <input type="password" class="form-control" id="passwd" autocomplete="off" placeholder="Enter your password here..."/>
                  <div class="form-control-feedback"></div>
                </div>
              </div>
          </div>
          <div class="modal-footer" id="mf-signUp">
            <div class="form-control-feedback"></div>
            <button class="btn btn-secondary" id="resetSI" >Reset</button>
            <button class="btn btn-primary" id="signInBtn" >Sign Me In</button><br />
          </div>
        </div>
      </div>
    </div>
<!--  Registration -->
<div class="modal fade" id="signUp-mod">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h2>Sign Up:</h2>
          <button type="button" class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div>
              <div class="form-group">
                <label for="fName">First name:</label>
                <input type="text" class="form-control" id="fName" placeholder="Enter your first name..." />
                <div class="form-control-feedback"></div>
              </div>
              <div class="form-group">
                <label for="lName">Last name:</label>
                <input type="text" class="form-control" id="lName" placeholder="Enter your last name..." />
                <div class="form-control-feedback"></div>
              </div>
              <div class="form-group">
                <label>Username:</label>
                <input type="text" class="form-control" id="username" placeholder="Enter your username..." />
                <div class="form-control-feedback"></div>
              </div>
              <div class="form-group">
                <label>Email:</label>
                <input type="text" class="form-control" id="email" placeholder="Enter your email..." />
                <div class="form-control-feedback"></div>
              </div>
              <div class="form-group">
                <label>Password:</label>
                <input type="password" class="form-control" id="password" placeholder="Enter your password..." />

                <div class="progress">
                  <div class="progress-bar progress-bar-animated bg-danger" id="prog-passwd"></div>
                </div>  <div class="form-control-feedback"></div>
              </div>
              <div class="form-group">
                <label>Password repeat:</label>
                <input type="password" class="form-control" id="passwordR" placeholder="Repeat your password..." />
                <div class="form-control-feedback"></div>
              </div>
              <div class="form-group">
                Birthdate: <br />
                  <div class="form-row">
                    <div class="col">
                      <select id="day" class="form-control">
                          <option value="0" selected> Day</option>
                      </select>
                    </div>
                    <div class="col">
                      <select id="month" class="form-control">
                          <option value="0" selected>Month</option>
                          <option value="1">January</option>
                          <option value="2">February</option>
                          <option value="3">March</option>
                          <option value="4">April</option>
                          <option value="5">May</option>
                          <option value="6">June</option>
                          <option value="7">July</option>
                          <option value="8">August</option>
                          <option value="9">September</option>
                          <option value="10">October</option>
                          <option value="11">November</option>
                          <option value="12">December</option>
                      </select>
                    </div>
                    <div class="col">
                      <select id="year" class="form-control">
                          <option value="0" selected>Year</option>
                      </select>
                      </div>
                      </div>
                <div class="form-control-feedback"></div>
              </div>
              <div class="form-group">
                Gender: <br />
                <label class="custom-control custom-radio">
              <input type="radio" class="custom-control-input" value="female" name="gender">
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">Female</span>
              </label>
              <label class="custom-control custom-radio">
              <input type="radio" class="custom-control-input" value="male" name="gender">
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">Male</span>
              </label>
                <div class="form-control-feedback"></div>
              </div>
              <label class="custom-control custom-checkbox">
<input type="checkbox" class="custom-control-input" id="agree">
<span class="custom-control-indicator"></span>
<span class="custom-control-description">I agree to the terms of service</span>
</label>
            </div>
        </div>

        <div class="modal-footer" id="mf-signUp">
          <div class="form-control-feedback"></div>
          <button class="btn btn-secondary" id="reset" >Reset</button>
          <button class="btn btn-primary" id="signUpBtn" >Sign Me Up</button><br />

        </div>
      </div>
    </div>
  </div>
    <script>
    $(document).ready(function() {
      $(window).bind('beforeunload',function(){
        window.scroll(0,0);
      });
        $(window).scroll( function(){
            /* Check the location of each desired element */
            $('.text').each( function(i){
                var bottom_of_object = $(this).offset().top + $(this).outerHeight();
                var bottom_of_window = $(window).scrollTop() + $(window).height();
                /* If the object is completely visible in the window, fade it it */
                if( bottom_of_window > bottom_of_object ){
                    $(this).animate({right:'750px','opacity':'1'},1000);
                }
            });
            $('.text1').each( function(i){
                var bottom_of_object = $(this).offset().top + $(this).outerHeight();
                var bottom_of_window = $(window).scrollTop() + $(window).height();
                /* If the object is completely visible in the window, fade it it */
                if( bottom_of_window > bottom_of_object ){
                    $(this).animate({right:'750px','opacity':'1'},1000);
                }
            });
            $('.text2').each( function(i){
                var bottom_of_object = $(this).offset().top + $(this).outerHeight();
                var bottom_of_window = $(window).scrollTop() + $(window).height();
                /* If the object is completely visible in the window, fade it it */
                if( bottom_of_window > bottom_of_object ){
                    $(this).animate({left:'750px','opacity':'1'},1000);
                }
            });
            $('.text3').each( function(i){
                var bottom_of_object = $(this).offset().top + $(this).outerHeight();
                var bottom_of_window = $(window).scrollTop() + $(window).height();
                /* If the object is completely visible in the window, fade it it */
                if( bottom_of_window > bottom_of_object ){
                    $(this).animate({left:'750px','opacity':'1'},1000);
                }
            });
        });
    });
    </script>
    <script src="js/jquery.bootstrap-autohidingnavbar.min.js"></script>
    <script>
      $(".navbar-fixed-top").autoHidingNavbar();
    </script>
    <script src="js/modal.js"></script>
    <script src="js/signUp.js"></script>
    <script src="js/signIn.js"></script>
    <script src="js/canvas.js"></script>
</body>
</html>
