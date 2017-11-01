<?php
session_start();
$name=$_SESSION['name'];
if(isset ($_POST['Logout'])){
  session_destroy();
  header('Location:index.php');
}
 ?>
-->
<!DOCTYPE HTML>
<?php
if ($_SESSION['connect']==1):
?>
<html>
<?php
include 'include/head.php' ;
 ?>
 <body>




<!--/profile_details-->
            <?php
            include 'include/notifications.php';
             ?>
  <!--//profile_details-->


                 <!--footer section start-->
                
    <!--/sidebar-menu-->
      <?php
      include 'include/slides_bar.php';
       ?>
    <!--/down-->

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
          include 'include/actions.php'
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
