  <?php
  session_start();
include 'new.php';
  // if(isset ($_POST['Logout'])){
  //   session_destroy();
  //   header('Location:index.php');
  // }
  $rollnumber1 = ((isset($_SESSION['rollnumber1']))?$_SESSION['rollnumber1']:'');
  $password1 = ((isset($_SESSION['password1']))?$_SESSION['password1']:'');
  $sql = "SELECT * FROM student WHERE student_id = '$rollnumber1' AND student_password = '$password1'";
  $result=$db->query($sql);
  $res=mysqli_fetch_assoc($result);
  $image = $res['student_image'];
  $name = $res['student_id'];
   ?>

<!DOCTYPE HTML>
<?php
if (isset($_SESSION['name'])):
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
							<?php
              include 'include/statistics.php'
               ?>
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
