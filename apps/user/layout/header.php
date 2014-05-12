<!DOCTYPE html>
<html lang="en">
  
  <head>
    <meta charset="utf-8">
    <title><?php echo Dinkly::getConfigValue('app_name'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Le styles -->
    <link href="/css/bootstrap.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <style>
      body { 
      padding-top: 60px; /* 60px to make the container go all the way
      to the bottom of the topbar */ }
    </style>
<!--     <link href="/css/bootstrap-responsive.css" rel="stylesheet"> -->

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js">
      </script>
    <![endif]-->
    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="/img/logo.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
    
    <script type="text/javascript" src="/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.js"></script>

    <script type="text/javascript">
    $("#sign-in").click(function() {
      $('#sign-in-form').submit();
    });
    // $("#sign-up").click(function() {
    //   console.log("here");
    //   $('#sign-up-form').submit();
    // });
    $("#forgot-pwd").click(function() {
      $('#forgot-password-form').submit();
    });
    //forgot password swap for login form
    function swapForm() {
      $("#form_sub_container1").hide();
      $("#form_sub_container2").show();
    }
    //handle account setting edit button click
    function handleEdit(){
      //alert("test");
      $("#edit").hide();
      $("#save_user_info").show();
      $("#username").removeAttr('disabled');
      $("#firstname").removeAttr('disabled');
      $("#lastname").removeAttr('disabled');
      $("#title").removeAttr('disabled');
      //username.disabled=false;
      
    }
$(document).ready(function() {
//save user information
$('body').on('click','.save_user_info',function(){
  var username= document.getElementById('username').value;
  var firstname= document.getElementById('firstname').value;
  var lastname= document.getElementById('lastname').value;
  var title= document.getElementById('title').value;
 //console.log(username + firstname +lastname+title);
 //ajax code goes here to make database changes
    $.ajax({
          type: "POST",
          url: "/api/api/save_user_info/",
          data: {username: username,firstname:firstname,lastname:lastname,title:title},
    success: function(msg) {        
          $("#save_user_info").hide();
          $("#edit").show();
          $("#username").prop('disabled', true);
          $("#firstname").prop('disabled', true);
          $("#lastname").prop('disabled', true);
          $("#title").prop('disabled', true);
          //var message = "Tag deleted successfully";
          console.log("success")
          //showMessage(message, 'success');
        },
        error: function(error){
          var message = "There was an error processing your request. Please try again later.";
          //showMessage(message, "error");
        }
    });
  
});
//sign up user
//save user information
$('body').on('click','.sign-up',function(){
  var username= document.getElementById('username').value;
  var email= document.getElementById('email').value;
  var password = document.getElementById('password').value;
  var firstname= document.getElementById('firstname').value;
  var lastname= document.getElementById('lastname').value;
  var title= document.getElementById('title').value;
  // console.log(username + firstname +lastname+title);
 //ajax code goes here to make database changes
    $.ajax({
          type: "POST",
          url: "/api/api/sign_up_user/",
          data: {username: username,email:email,password: password,firstname:firstname,lastname:lastname,title:title},
    success: function(msg) {        
          console.log("success");
          //showMessage(message, 'success');
        
        },
        error: function(error){
          var message = "There was an error processing your request. Please try again later.";
          //showMessage(message, "error");
        }
    });
  
});
});
    </script>

    <?php echo $this->getModuleHeader(); ?>

  </head>
  <body>
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">
            <?php echo Dinkly::getConfigValue('app_name'); ?>
          </a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            </ul>
          <div class="nav navbar-nav navbar-right" >
            <li>
              <a href="/">
                Home
              </a>
            </li>
            <?php if(User::isLoggedIn()): ?>
            <li>
             <!--  <ul class="nav nav-pills"> -->
                <li class="dropdown">
                  <a class="dropdown-toggle"
                     data-toggle="dropdown"
                     href="#">
                      <?php echo User::getLoggedUsername();?>
                      <b class="caret"></b>
                    </a>
                  <ul class="dropdown-menu" >
                    <!-- links -->
                    <li>
                      <a href="/account/">
                        Settings
                       </a>
                    </li>
                    <li>
                     <a href="/login/logout/">
                      Logout
                     </a>
                    </li>
                  </ul>
                </li>
              <!-- </ul> -->
            </li>
            <?php else: ?>
                <li class="dropdown">
                  <a class="dropdown-toggle"
                     data-toggle="dropdown"
                     href="#">
                      My Account
                      <b class="caret"></b>
                    </a>
                  <ul class="dropdown-menu" >
                    <!-- links -->
                      <li >
                        <a href="/login" >
                          Login
                        </a>
                      </li>
                      <li >
                        <a href="/home/sign_up" >
                          Sign Up
                        </a>
                      </li>
                  </ul>
                </li>


            <?php endif; ?>
      <!--     </ul> -->
        </div><!--/.navbar-collapse -->
      </div>
    </div>
  </div>
<!--   <div class="navbar navbar-fixed-top navbar-inverse">
      <div class="navbar-inner">
        <div class="container">
          <a class="brand" href="/">
            <?php echo Dinkly::getConfigValue('app_name'); ?>
          </a>
          <ul class="nav">


          </ul>
          <ul class="nav pull-right">
            <li>
              <a href="/">
                Home
              </a>
            </li>
            <?php if(User::isLoggedIn()): ?>
            <li>
              <ul class="nav nav-pills">
                <li class="dropdown">
                  <a class="dropdown-toggle"
                     data-toggle="dropdown"
                     href="#">
                      <?php echo User::getLoggedUsername();?>
                      <b class="caret"></b>
                    </a>
                  <ul class="dropdown-menu" >
                    <!-- links -->
<!--                     <li>
                      <a href="/account/">
                        Settings
                       </a>
                    </li>
                    <li>
                     <a href="/login/logout/">
                      Logout
                     </a>
                    </li>
                  </ul>
                </li>
              </ul>
            </li>
            <?php else: ?>
            <li >
              <a href="/login" >
                Login
              </a>
            </li>
            <li >
              <a href="/home/sign_up" >
                Sign Up
              </a>
            </li>
            <?php endif; ?>

          </ul>
        </div>
      </div>
    </div>  --> 

    <div class="container">
      <img src="/img/logo.png" style="width:100px;" class="fixed-top"></img>
      <?php if(isset($_SESSION['dinkly']['badlogin'])): ?>
      <div class="alert alert-error">Invalid login</div>
      <?php endif; ?>

