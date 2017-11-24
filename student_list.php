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
$sql_student = "SELECT * FROM student ORDER BY student_id";
$result_student = $db->query($sql_student);

$result=$db->query($sql);
$res=mysqli_fetch_assoc($result);
$image = $res['admin_image'];
$name = $res['admin_name'];

if(isset($_GET['edit'])){
  $value = (isset($_GET['edit'])?$_GET['edit']:'');
  $reset_password_query = "UPDATE student SET student_password = '123456789' WHERE student_count = '$value'";
  $db->query($reset_password_query);
  header('Location:student_list.php');
}

if(isset($_GET['delete']) && !empty($_GET['delete'])){
  $delete = (isset($_GET['delete'])?$_GET['delete']:'');
  $del_query = "DELETE FROM student WHERE student_count='$delete'";
  $db->query($del_query);
    header('Location:student_list.php');
}

// function resetThis(){
// $reset_password_query = "UPDATE student SET student_password = '123456789' WHERE student_id = '$value'";
// $db->query($reset_password_query);
// }
 ?>

<!DOCTYPE HTML>

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

      <!--/charts-->

<!--  here for fetching the list of student -->
<div class="row">
  <div class="col-md-offset-2 col-md-10">
    <table class="table table-striped">
      <tr>
        <td> ID </td>
        <td> Roll-Number </td>
        <td> Course </td>
        <td> Email </td>
        <td> Reset Password</td>
        <td> Delete Student</td>
      </tr>
      <?php while($std = mysqli_fetch_assoc($result_student)): ?>
      <tr>
        <td width=10px><?=$std['student_count'];?></td>
        <td><?=$std['student_id']; ?></td>
        <td><?=$std['student_course']; ?></td>
        <td><?=$std['student_mail']; ?></td>
        <td width=50px>
          <a class="btn btn-primary" href="student_list.php?edit=<?=$std['student_count'];?>" > Reset this </a>
      </td>
      <td width=50px>
        <a class="btn btn-danger" href="student_list.php?delete=<?=$std['student_count'];?>" >Delete this </a>
      </td>
      </tr>
    <?php endwhile; ?>
    </table>
  </div>
</div>


<!--  end of the list of student-->

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



     sdsdsd
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
