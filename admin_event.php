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

// post method exploitation
if(isset($_POST['submit'])){

$event_title = (isset($_POST['event_title'])?$_POST['event_title']:"");
$event_contain = (isset($_POST['event_contain'])?$_POST['event_contain']:"");

    if(isset($_FILES['event_image']['name'])){
      $event_image = $_FILES['event_image']['name'];
      move_uploaded_file($_FILES['event_image']['tmp_name'], $target);
      $target = "images/".basename($_FILES['event_image']['name']);
    }

  $sql_event = "INSERT INTO event (information_title, information_content, information_image) VALUES ('$event_title', '$event_contain', '$target')";
  $db->query($sql_event);
}
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

             <!-- Button trigger modal -->
<!-- here the empty space to put new


statement
  -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-4 col-md-offset-4">

        <form method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="exampleInputEmail1">Event title</label>
          <input type="text" name="event_title" class="form-control" id="exampleInputEmail1" placeholder="Event title here ">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Event Content</label>

          <textarea rows="4" cols="40" name="event_contain" placeholder="... Write Event Content Here...."></textarea>
        </div>
        <div class="form-group">
          <label for="exampleInputFile">Upload Event Poster</label>
          <input type="file" name="event_image" id="exampleInputFile">
          <!-- <p class="help-block">Example block-level help text here.</p> -->
        </div>

        <button type="submit" name="submit" class="btn btn-default">Add New Event</button>
      </form>

      </div>
    </div>
  </div>
<center>

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
