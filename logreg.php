
<?php
session_start();
include "new.php";

// declaration de variables pour user
if (isset($_POST['signup_submit'])){
$rollnumber='';
$rollnumber = (isset($_POST['roll'])? $_POST['roll']:'');
$name = (isset($_POST['name'])? $_POST['name']:'');
$email =(isset($_POST['email'])? $_POST['email']: '');
$password = (isset($_POST['password'])? $_POST['password']: '');
$course = (isset($_POST['course'])? $_POST['course']: '');


//insert to database
$sql = "INSERT INTO user (user_id, user_name, user_email, user_passw, user_course) VALUES ('$rollnumber', '$name', '$email', '$password', '$course')";
$db->query($sql);
}

//connect to db
if (isset($_POST['signin'])) {
  //declaration de variables pour admin
  $rollnumber1 = (isset($_POST['roll1'])? $_POST['roll1']:'');
  $password1 = (isset($_POST['password1'])? $_POST['password1']:'');



$sql="SELECT * FROM user WHERE user_id ='$rollnumber1' AND user_passw='$password1'";
$result=$db->query($sql);
$student=mysqli_fetch_assoc($result);
$count=mysqli_num_rows($result);
$_SESSION['name']=$student['user_name'];
if ($count==1) {
  $_SESSION['connect']=1;
  header('Location:admin.php');
}
else {
  echo 'Password Error';
}
}
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
    <input type="submit" name="signin" value="Login" />
    </form>

  </div>
  <div class="or">OR</div>
</div>


</body>
</html>
