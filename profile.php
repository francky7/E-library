<!DOCTYPE HTML>
<center>
<?php
session_start();
 // include 'new.php';
// if(isset ($_POST['Logout'])){
//   session_destroy();
//   header('Location:index.php');
// }
$db = mysqli_connect('localhost','root','','labrary');
$rollnumber1 = ((isset($_SESSION['rollnumber1']))?$_SESSION['rollnumber1']:'');
$password1 = ((isset($_SESSION['password1']))?$_SESSION['password1']:'');
$sql = "SELECT * FROM admin WHERE admin_id = '$rollnumber1' AND admin_password = '$password1'";
$result=$db->query($sql);
$res=mysqli_fetch_assoc($result);
$image = $res['admin_image'];
$name = $res['admin_name'];
$id = $res['admin_id'];
if (isset($_POST['submit'])){

$passw = ((isset($_POST['password']))?$_POST['password']:'');
$Npassw = ((isset($_POST['Npassword']))?$_POST['Npassword']:'');
$target = "images/".basename($_FILES['image2']['name']);
$image2 = ($_FILES['image2']['name']);
if (!empty($image2) && !empty($Npassw)) {
  $sql = "UPDATE admin SET admin_image = '$image2' , admin_password = '$Npassw' WHERE admin_id = '$rollnumber1'";
  $_SESSION['password1']=$Npassw;
}
if ($image2 && empty($Npassw)) {
   $sql = "UPDATE admin SET admin_image = '$image2'  WHERE admin_id = '$rollnumber1'";
}
 if ($Npassw && empty($image2)) {
  $sql = "UPDATE admin SET  admin_password = '$Npassw' WHERE admin_id = '$rollnumber1'";
$_SESSION['password1']=$Npassw;
}

if ($db->query($sql)){
  $sql = "SELECT * FROM admin WHERE admin_id = '$rollnumber1' AND admin_password = '$Npassw'";
  $result=$db->query($sql);
  $res=mysqli_fetch_assoc($result);
  $image = $res['admin_image'];
  $name = $res['admin_name'];
  $_SESSION['password1']=$Npassw;

header('Location:admin.php');

}

if (move_uploaded_file($_FILES['image2']['tmp_name'], $target)) {
  echo 'Image uploaded done ... ';
}else{
 echo 'Image not uploaded ...';}}

 ?>



<?php
if (isset($_SESSION['rollnumber1'])):
?>
<?php
include 'include/head.php';
?>
<body>

      <!--//custom-widgets-->
            <?php
            include 'include/notification.php';
             ?>
             <!DOCTYPE html>

             <html>
             <head>
              <style>
            form{
     border-radius: 25px;
     border: 2px solid #0000AA;
     padding: 20px;
     width: 550px;
     height: 450px;
       }
      </style>
               </head>


<body>
      <!--/charts-->
      <div class="row">
  <div class="col-md-4"></div>
    <center>
      <div class="col-md-4">
      <form method="post" enctype="multipart/form-data">
<div class="form-group">
  <img src="images/<?php echo $image; ?>" width="40%" height="50%" ><br>

  <label for="exampleInputFile">Edit file</label>
  <input type="file" value="Edit" name="image2" id="exampleInputFile"></div>

<div class="form-group">
<label for="exampleInputPassword1">Password</label>
<input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
</div>

<div class="form-group">
<label for="exampleInputPassword1">NewPassword</label>
<input type="text" class="form-control" name="Npassword" id="exampleInputPassword1" placeholder="Password">
</div>

<input type="submit" class="btn btn-default" value="submit" name="submit">
</form>
</div>
</div>
</center>
</body>
      <!--footer section start-->
                  <footer>
                     <p> & copy 2016 Augment . All Rights Reserved | Design by <a href="https://w3layouts.com/" target="_blank">W3layouts.</a></p>
                  </footer>
      <!--footer section end-->
              </div>
            </div>
    <!--//content-inner-->
    <!--/sidebar-menu-->
      <?php
      include 'include/slide_bar.php';
      ?>
        <!--<img id="logo" src="" alt="Logo"/>-->

     <!--footer section start-->
                  <footer>
                     <p>GlocalUniversity.edu.in  BCA 5th Semester</a></p>
                  </footer>
                <!--footer section end-->
              </div>
            </div>
      <!--//content-inner-->
    <!--/sidebar-menu-->
      <div class="sidebar-menu">
        <header class="logo">
        <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="index.html"> <span id="logo"> <h1>E-library</h1></span>
        <!--<img id="logo" src="" alt="Logo"/>-->
        </a>
      </header>
    <div style="border-top:1px solid rgba(69, 74, 84, 0.7)"></div>

    <!--/down-->
    <?php
    include 'include/admi.php';
     ?>
    <!--//down-->
    <?php
     include 'include/action.php';
     ?>
<!--js -->
<link rel="stylesheet" href="css/vroom.css">
<script type="text/javascript" src="js/vroom.js"></script>
<script type="text/javascript" src="js/TweenLite.min.js"></script>
<script type="text/javascript" src="js/CSSPlugin.min.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>

<!-- Bootstrap Core JavaScript -->
 <script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php
endif;
?>
