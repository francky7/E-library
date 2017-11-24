<?php
session_start();
// $name=$_SESSION['name'];
include_once 'new.php';
if(isset ($_POST['Logout'])){
  session_destroy();
  header('Location:index.php');
}
$result = (isset($_SESSION['result'])?$_SESSION['result']:'');
$name = (isset($_SESSION['rollnumber1'])?$_SESSION['rollnumber1']:'');
$password1 = (isset($_SESSION['password1'])?$_SESSION['password1']:'');

$sql = "SELECT * FROM student WHERE student_id='$name' AND student_password='$password1'";
$result = $db->query($sql);
$res = mysqli_fetch_assoc($result);


 ?>
-->
<!DOCTYPE HTML>

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

    <div class="down">
          <a href="index.html"><img src="images/<?=$res['student_image'];?>" width=100px height=100px></a>

         <p><?=$name;  ?></p>
        <ul>
        <li><a class="tooltips" href="student_profile.php"><span>Profile</span><i class="lnr lnr-user"></i></a></li>
          <li><a class="tooltips" name="Log" href="Logout.php"><span>Log out</span><i class="lnr lnr-power-switch"></i></a></li>
          </ul>
        </div>


           <!-- <?php
          include 'include/actions.php'
          ?> -->


<!-- <center> body center  </center> -->
<!--  make this part dynamic take the file inside the database-->
  <div class="gallery">
     <div class="gallery-bottom grid">
       <div class="col-md-3 g-left">

         </div>
         <div class="col-md-3 g-left">
           <a href="images/p4.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox">
             <figure class="effect-oscar">
               <img src="images/p4.jpg" alt=""/>
               <figcaption>
                 <h4>Read This Book Online</h4>
                   <!-- <p><i class="lnr lnr-magnifier"></i></p> -->
               </figcaption>
             </figure>
           </a>
         </div>

       </div>
     </div>







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
