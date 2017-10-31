<?php
include_once 'new.php';
$name=(isset($_POST['username'])?$_POST['username']:'empty');
echo $name;
 ?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Material design sign up form</title>



      <link rel="stylesheet" href="css/style.css">


</head>

<body>
  <div id="login-box">
  <div class="left">
    <h1>Sign up</h1>
<form class=""  method="post">
  <input type="text" name="username" placeholder="Username" />
  <input type="text" name="email" placeholder="E-mail" />
  <input type="password" name="password" placeholder="Password" />
  <input type="password" name="password2" placeholder="Retype password" />

  <input type="submit" name="signup_submit" value="Sign me up" />
</form>

  </div>

  <div class="right">
   <h1>Login</h1>

     <input type="text" name="username" placeholder="Username" />
    <input type="password" name="password" placeholder="Password" />

    <input type="submit" name="signup_submit" value="Login" />

  </div>
  <div class="or">OR</div>
</div>


</body>
</html>
