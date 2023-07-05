<?php
  include  "./new_signup.php";
?>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login page</title>
  <link rel="stylesheet" href="./new_login.css" />
  <script src="https://kit.fontawesome.com/7b39153ed3.js" crossorigin="anonymous"></script>
</head>


<body>
  <?php echo isset($success_msg) ? $success_msg : null ; ?>
  <div class="container" id="container">
    <!-- sign Up form section start-->
    <div class="form sign_up">
      <form action="./new_login.php" method="post">
        <!-- heading -->
        <h1>Create An Account</h1>
        <!-- social media icons -->
        <div class="social-container">
          <a href="#"><i class="fa-brands fa-facebook"></i></a>
          <a href="#"><i class="fa-brands fa-google"></i></a>
          <a href="#"><i class="fa-brands fa-github"></i></a>
        </div>
        <span>use email for registration</span>
        <!-- input fields start -->
        <input type="text" name="username" class = "username" placeholder="User Name">
        <p id ="userErr" style="color:red;"></p>
        <input type="email" name="email" class = "user_email" placeholder="Email">
        <p id ="emailErr" style="color:red;"></p>
        <input type="password" name="pass" class = "user_pass" placeholder="Password">
        <p id ="passErr" style="color:red;"></p>
        <input type="password" class = "user_cpass" placeholder="Confirm Password">
        <p id ="cpassErr" style="color:red;"></p>
        <button type="submit" class = "signup-button" name="signup-btn">Create Account</button>

        <!-- input fields end -->
      </form>
    </div>
    <!-- sign Up form section end-->

    <!-- sign in form section start-->
    <div class="form sign_in">
      <form action="./new_login.php" method="post">
        <!-- heading -->
        <h1>Login In</h1>
        <!-- social media icons -->
        <div class="social-container">
          <a href="#"><i class="fa-brands fa-facebook"></i></a>
          <a href="#"><i class="fa-brands fa-google"></i></a>
          <a href="#"><i class="fa-brands fa-github"></i></a>
        </div>
        <span>Login In with your Account</span>
        <!-- input fields start -->

        <?php echo isset($error) ? $error : null ; ?>
        <input type="email" name="email" class="e_mail" placeholder="Email">
        <p id="emailError" style="color:red;"></p>
        <input type="password" name="password" class="user_password" placeholder="Password" >
        <p id="passError" style="color:red;"></p>
        <span>Forgot your <span class="forgot">password?</span></span>
        <button type="submit" class = "login-btn" name="login-btn">Login</button>
        <!-- input fields end -->
      </form>
    </div>
    <!-- sign in form section end-->

    <!-- overlay section start-->
    <div class="overlay-container">
      <div class="overlay">
        <div class="overlay-pannel overlay-left">
          <h1>Already have an account</h1>
          <p>Please Login</p>
          <button id="signIn" class="overBtn">SignIn</button>
        </div>
        <div class="overlay-pannel overlay-right">
          <h1>Create Account</h1>
          <p>Start Your Journey with Us</p>
          <button id="signUp" class="overBtn">Sign Up</button>
        </div>
      </div>
    </div>
    <!-- overlay section start-->
  </div>

  <script src="./new_login.js"></script>
  <script src="../jquery.js"></script>
  <script>
  $(document).ready(function() {

$("#userErr").hide();
let userError = true;
$(".username").keyup(function() {
   validateUser();
});

function validateUser() {
   let userValue = $(".username").val();
   if (userValue == "") {
      $("#userErr").show();
      $("#userErr").text('*Field is required !!')
   } else {
      $("#userErr").hide();
      userError = false;
   }
}

$("#emailErr").hide();
let emailError = true;
$(".user_email").keyup(function() {
   validateEmail();
});

function validateEmail() {
   let emailValue = $(".user_email").val();
   if (emailValue == "") {
      $("#emailErr").show();
      $("#emailErr").text('*Field is required !!')
   } else {
      $("#emailErr").hide();
      emailError = false;
   }
}

$("#passErr").hide();
let passError = true;
$(".user_pass").keyup(function() {
   validatePass();
});

function validatePass() {
   let passValue = $(".user_pass").val();
   if (passValue == "") {
      $("#passErr").show();
      $("#passErr").text('*Field is required !!')
   } else {
      $("#passErr").hide();
      passError = false;
   }
}

$("#cpassErr").hide();
let cpassError = true;
$(".user_cpass").keyup(function() {
   validateCpass();
});

function validateCpass() {
   let passValue = $(".user_cpass").val();
   if (passValue == "") {
      $("#cpassErr").show();
      $("#cpassErr").text('*Field is required !!')
   } else {
      $("#cpassErr").hide();
      cpassError = false;
   }
}

$('.signup-button').click(function(event) {
   validateUser();
   validateEmail();
   validatePass();
   validateCpass();
   if (userError == true &&
      emailError == true &&
      passError == true &&
      cpassError == true) 
      {
      event.preventDefault();
   }
});



$("#emailError").hide();
let emailErr = true;
$(".e_mail").keyup(function() {
   validateEm();
});

function validateEm() {
   let userValue = $(".e_mail").val();
   if (userValue == "") {
      $("#emailError").show();
      $("#emailError").text('*Field is required !!')
   } else {
      $("#emailError").hide();
      emailError = false;
   }
}

$("#passError").hide();
let passErr = true;
$(".user_password").keyup(function() {
   validatePassword();
});

function validatePassword() {
let passValue = $(".user_password").val();
   if (passValue == "") {
      $("#passError").show();
      $("#passError").text('*Field is required !!');
   } else {
      $("#passError").hide();
      passErr = false;
   }
}

$('.login-btn').click(function(event) {
   validateEm();
   validatePassword();

   if (
      emailErr == true &&
      passErr == true
      ) {
      event.preventDefault();
   }
});
});

</script>
</body>

</html>