
<?php
include "int.php";

// declaration de variables pour user
$rollnumber = (isset($_POST['roll'])? $_POST['roll']:'');
$name = (isset($_POST['name'])? $_POST['name']:'');
$email =(isset($_POST['email'])? $_POST['email']: '');
$password = (isset($_POST['password'])? $_POST['password']: '');
$course = (isset($_POST['course'])? $_POST['course']: '');

//declaration de variables pour admin
$rollnumber1 = (isset($_POST['roll1'])? $_POST['roll1']:'');
$password1 = (isset($_POST['password1'])? $_POST['password1']:'');

//insert to database
$sql = "INSERT INTO user_id (user_rollnumber, user_name, user_email, user_passw, user_course) VALUES ('$rollnumber', '$name', '$email', '$password', '$course')";
$db->query($sql);

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
    <form method="post">
       <input type="file" id="file"/>
    <input type="text" name="name" placeholder="name" /> 
    <input type="text" name="roll" id="roll" placeholder="Roll number" />
    <input type="text" name="email" placeholder="E-mail" />
    <input type="password" name="password" placeholder="Password" />
    <input type="text" name="course" placeholder="course" />
    
    <input type="submit" name="signup_submit" value="Sign me up" action="logreg.php"/>
    </form>
   
  </div>
  
  <div class="right">
   <h1>Login</h1>
    <form method="post">
     <input type="text" name="roll1" placeholder="Roll number" />
    <input type="password" name="password1" placeholder="Password" />
</form>
    <input type="submit" name="signup_submit" value="Login" />
    
  </div>
  <div class="or">OR</div>
</div>
  
  
</body>
</html>
