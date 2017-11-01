
<?php
session_start();
include "int.php";




//connect to db
if (isset($_POST['signup_submit']))

 {

// declaration de variables pour user
$rollnumber='';
$rollnumber = (isset($_POST['roll'])? $_POST['roll']:'');
$name = (isset($_POST['name'])? $_POST['name']:'');
$email =(isset($_POST['email'])? $_POST['email']: '');
$password = (isset($_POST['password'])? $_POST['password']: '');
$course = (isset($_POST['course'])? $_POST['course']: '');
//$image = (isset($_POST['image'])? $_POST['image']: '');

// store the path of the upload
$target = "C:\Users\hp\Desktop\image\\".basename($_FILES['image']['name']);

//connect to the db

// $get all submit data from the form

$image = $_FILES['image']['name'];


//insert to database
$sql = "INSERT INTO user_id (user_rollnumber, user_name, user_email, user_passw, user_course, user_image) 
VALUES ('$rollnumber', '$name', '$email', '$password', 
'$course', '$image')";
$db->query($sql);
  

// moving the images into the image folder

if (move_uploaded_file($_FILES['image']['tmp_name'],  $target)) {
  $msg = 'Message uploaded done ... ';
  # code...
}else{
 // $msg = 'Message not uploaded ...';
echo $_FILES['image']['error'];
}

  }
if (isset($_POST['signin'])) {
  //declaration de variables pour admin
$rollnumber1 = (isset($_POST['roll1'])? $_POST['roll1']:'');
$password1 = (isset($_POST['password1'])? $_POST['password1']:'');

  echo $rollnumber1;
$sql = "SELECT * FROM user_id WHERE user_rollnumber = '$rollnumber1' AND user_passw = '$password1'";
$_SESSION['name']=$rollnumber1;
$_SESSION['password']=$password1;
$result=$db->query($sql);
$res=mysqli_fetch_assoc($result);
$count=mysqli_num_rows($result);

echo $count;
if ($count == 1) {
  echo 'connected';
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
    <form method="post" enctype = "multipart/form-data">
      <input type = "hidden" name = "size" value = "100000">
       <input type="file" name="image" value = ''>
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
