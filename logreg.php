
<?php
session_start();
// include "int.php";

$db = mysqli_connect('localhost', 'root', '','labrary');
  $error = 1;
//connect to db
if(isset($_POST['signup_submit'])){

// declaration de variables pour user

$rollnumber = (isset($_POST['roll'])? $_POST['roll']:'');
$name = (isset($_POST['name'])? $_POST['name']:'');
$email =(isset($_POST['email'])? $_POST['email']: '');
$password = (isset($_POST['password'])? $_POST['password']: '');
$course = (isset($_POST['course'])? $_POST['course']: '');
//$image = (isset($_POST['image'])? $_POST['image']: '');

//check if the roll number exist in the database
$checking = "SELECT * FROM student WHERE student_id = '$rollnumber'";
$toBeCount = $db->query($checking);
$checking_count = mysqli_num_rows($toBeCount);

if($checking_count >= 1){
  echo $checking_count;
echo "<li class='text-danger'><p> roll number or password is wrong </p></h1>";
}else{
//in case of there is not student_id in the database now we can add that id onto it
//insert to database

// store the path of the upload
$rollnumber = (isset($_POST['roll'])? $_POST['roll']:'');
$name = (isset($_POST['name'])? $_POST['name']:'');
$email =(isset($_POST['email'])? $_POST['email']: '');
$password = (isset($_POST['password'])? $_POST['password']: '');
$course = (isset($_POST['course'])? $_POST['course']: '');
$target = "images/".basename($_FILES['image']['name']);

$image =(isset($_FILES['image']['name'])?$_FILES['image']['name']:'');


$sql_create = "INSERT INTO `student`(`student_count`, `student_id`, `student_image`, `student_mail`, `student_course`, `student_password`, `student_name`)
VALUES ('','$rollnumber','$image','$email','$course','$password','$name')";

$db->query($sql_create);

// moving the images into the image

if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  echo 'Image uploaded done ... ';
}else{
 echo 'Image not uploaded ...';
// echo $_FILES['image']['error'];
    }
  }

}

if (isset($_POST['signin'])) {
  //declaration de variables pour admin
$rollnumber1 = (isset($_POST['roll1'])? $_POST['roll1']:'');
$password1 = (isset($_POST['password1'])? $_POST['password1']:'');

$sql_admin = "SELECT * FROM admin WHERE admin_id = '$rollnumber1' AND admin_password = '$password1'";
$result_admin = $db->query($sql_admin);
$count_admin=mysqli_num_rows($result_admin);

if($count_admin == 1){
  header('Location:admin.php');
  $_SESSION['rollnumber1']=$rollnumber1;
  $_SESSION['password1']=$password1;
}


$sql_student = "SELECT * FROM student WHERE student_id = '$rollnumber1' AND student_password = '$password1'";
$result_student=$db->query($sql_student);
$count_student=mysqli_num_rows($result_student);
if ($count_student == 1) {

  echo 'connected';
  header('Location:student.php');
  $_SESSION['rollnumber1']=$rollnumber1;
  $_SESSION['password1']=$password1;
}
else {
  echo 'Password Error';
  $error = 0;
}
}
?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login page :</title>



      <link rel="stylesheet" href="css/style.css">


</head>
<body>
  <div id="login-box">
  <div class="left">
    <h1>Sign up</h1>
    <form method="post" enctype="multipart/form-data">
      <!-- <input type = "hidden" name = "size" value = "100000"> -->
    <input type="file" name="image" value = ''>

    <input type="text" name="name" placeholder="name" />
    <input type="text" name="roll" id="roll" placeholder="Roll number" />
    <input type="text" name="email" placeholder="E-mail" />
    <input type="password" name="password" placeholder="Password" />
    <input type="text" name="course" placeholder="course" />

    <input type="submit" name="signup_submit" value="Sign up" >
    </form>

  </div>

  <div class="right">
   <h1>Login</h1>
    <form method="post">
     <input type="text" name="roll1" placeholder="Roll number" />
    <input type="password" name="password1" placeholder="Password" />
    <input type="submit" name="signin" value="Login" />
    </form>
    <?php if($error==0){
      echo "<h5 style='color:red; background-color:#dc6d6d'><i> roll number or password are wrong<i> </h5>";
    } ?>

  </div>
  <div class="or">OR</div>
</div>


</body>
</html>
