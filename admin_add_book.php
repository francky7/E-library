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
if($db){
  echo "connect to dabase";
}else{
  echo "not connected to database";
}
$rollnumber1 = ((isset($_SESSION['rollnumber1']))?$_SESSION['rollnumber1']:'');
$password1 = ((isset($_SESSION['password1']))?$_SESSION['password1']:'');
$sql = "SELECT * FROM admin WHERE admin_id = '$rollnumber1' AND admin_password = '$password1'";
$result=$db->query($sql);
$res=mysqli_fetch_assoc($result);
$image = $res['admin_image'];
$name = $res['admin_name'];

if(isset($_POST['add_book'])){
  $book_name = (isset($_POST['book_name'])?$_POST['book_name']:'');
  $book_author = (isset($_POST['book_author'])?$_POST['book_author']:'');
  $book_quantity = (isset($_POST['book_quantity'])?$_POST['book_quantity']:'');
  $book_quantity = (int)$book_quantity;

  // $book_cover = (isset($_POST['book_cover'])?$_POST['book_cover']:'');
  // $book_file = (isset($_POST['book_file'])?$_POST['book_file']:'');

  $cover_target = "books/".basename($_FILES['book_cover']['name']);
  $file_target = "books/".basename($_FILES['book_file']['name']);

  $book_cover = $_FILES['book_cover']['name'];
  $book_file = $_FILES['book_file']['name'];

  $query_add_book = "INSERT INTO books (book_name, book_author, book_quantity, book_cover, book_image) VALUES ('$book_name', '$book_author', '$book_quantity', '$book_cover', '$book_file')";
  if($db->query($query_add_book)){
    if(move_uploaded_file($_FILES['book_cover']['tmp_name'], $cover_target)){
      echo "cover uploaded ";
    }
    if(move_uploaded_file($_FILES['book_file']['tmp_name'], $file_target)){
      echo " file uploaded ";
    }
    echo "confirmed ";
    header('Location:admin.php');
  }else {
    echo "not confirmed error ";

  }
}

if(isset($_POST['cancel'])){
  header('Location:admin.php');
}
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

      <!--/charts-->
      <div class="row">

        <div class="col-md-offset-4 col-md-4">

          <table class="table">
            <form class=""  method="post" enctype="multipart/form-data">
              <tr>
                <td>Book name</td>
              </tr>
              <tr>
                <td>
                   <!-- <form class="" action="index.html" method="post"> -->
                  <input type="text" name="book_name" value="">
                <!-- </form> -->
              </td>
              </tr>

              <tr>
                <td>Book Author</td>
              </tr>
              <tr>
                <td>
                   <!-- <form class="" action="admin_add_book.php" method="post"> -->
                  <input type="text" name=book_author"" value="">
                <!-- </form> -->
              </td>
              </tr>

              <tr>
                <td>Book Quantity</td>
              </tr>
              <tr>
                <td>
                   <!-- <form class="" action="admin_add_book.php" method="post"> -->
                  <input type="number" name="book_quantity" value="">
                <!-- </form> -->
              </td>
              </tr>

              <tr>
                <td>Book Cover</td>
              </tr>
              <tr>
                <td>
                   <!-- <form class="" method="post" enctype="multipart/form-data"> -->
                  <input type="file" name="book_cover" value="">
                <!-- </form> -->
              </td>
              </tr>

              <tr>
                <td>Book File </td>
              </tr>
              <tr>
                <td>
                   <!-- <form class=""  method="post" enctype="multipart/form-data"> -->
                  <input type="file" name="book_file" value="">
                <!-- </form> -->
              </td>
              </tr>

                <tr>
                  <td>
                    <!-- <form class="" action="admin_add_book.php" method="post"> -->
                    <input type="submit" name="add_book" value="Add A New Book ">
                  <!-- </form> -->
                </td>
                <td> <input type="submit" name="cancel" name="canceled" value="Cancel" style="background-color:red;"></td>
                </tr>
              <tr>
                <td>...</td>
              </tr>
                </form>
          </table>
        </div>
      </div>








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
