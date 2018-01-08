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

$sql_book = "SELECT * FROM books";
$result_book = $db->query($sql_book);


 ?>



<style media="screen">

</style>
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
          <a href="#"><img src="images/<?=$res['student_image'];?>" width=100px height=100px></a>

         <p><?=$name;  ?></p>
        <ul>
        <li><a class="tooltips" href="student_profile.php"><span>Profile</span><i class="lnr lnr-user"></i></a></li>
          <li><a class="tooltips" name="Log" href="Logout.php"><span>Log out</span><i class="lnr lnr-power-switch"></i></a></li>
          </ul>
        </div>


           <!-- <?php
          include 'include/student_left_bar.php';
          ?> -->


<center> body center



<!--  make this part dynamic take the file inside the database-->
  <div class="gallery">
     <div class="gallery-bottom grid">
       <div class="container-fluid">

         <div class="row">
           <div class="col-md-offset-2">

             <?php
             while($array_book = mysqli_fetch_assoc($result_book)):
               ?>
               <!-- <div class="col-md-3 g-left"> -->
               <div class="col-md-3">
                 <a href="#" rel="title" class="b-link-stripe b-animate-go  thickbox">
                   <figure class="effect-oscar">
                     <img src="books/<?=$array_book['book_cover'];?>" alt="" width="200px" height="250px"/>
                     <figcaption>
                       <!-- <p><i class="lnr lnr-magnifier"></i></p> -->
                       <a href="#" onclick="window.open('books/<?=$array_book['book_image'];?>', '_blank', 'fullscreen=yes'); return false;">
                          <span class="glyphicon glyphicon-align-left" aria-hidden="true">read</span></a> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;

                                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample<?=$array_book['book_id'];?>" aria-expanded="false" aria-controls="collapseExample">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true">Infos</span>
                              </button>
                              <div class="collapse" id="collapseExample<?=$array_book['book_id'];?>">
                                <div class="well">
                                <?php

                                  echo  "Book Name: ".$array_book['book_name']."<br>";
                                    echo "Book Quantity: ".$array_book['book_quantity']."<br>";
                                    echo "Book Description: ".$array_book['book_description']."<br>";
                                    echo "Book category: ".$array_book['book_category']."<br>";
                                 ?>
                                </div>
                              </div>

                       <!-- <h4><a href="student_read_book.php?read=<?=$array_book['book_image'];?>">Read Online</a></h4> -->
                     </figcaption>
                   </figure>
                 </a>
               </div>

             <?php endwhile; ?>

           </div>
         </div>
       </div>
       </div>
     </div>
</center>
<!--  test open pdf in tap-->
<!-- <embed src="books/yss.pdf" type="application/pdf"   height="300px" width="100%"> -->






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
