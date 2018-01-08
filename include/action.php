<div class="menu">
<ul id="menu" >

<li><a href="admin_event.php"><i class="fa fa-tachometer"></i> <span>Event</span></a></li>
<li><a href="admin_event.php"><i class="fa fa-tachometer"></i> <span>Admin</span></a></li>

<li id="menu-academico" ><a href="#"><i class="fa fa-table"></i> <span> Students</span> <span class="fa fa-angle-right" style="float: right"></span></a>
<ul id="menu-academico-sub" >
<li id="menu-academico-avaliacoes" ><a href="student_list.php"> List</a></li>
</ul></li>
<li id="menu-academico" ><a href="#"><i class="fa fa-table"></i> <span> Book</span> <span class="fa fa-angle-right" style="float: right"></span></a>
<ul id="menu-academico-sub" >
<li id="menu-academico-avaliacoes" ><a href="#">

  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Borrow
  </button>
  </a></li>

  <li id="menu-academico-avaliacoes" ><a href="#">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2">
      Return
    </button>
  </a></li>

  <li id="menu-academico-avaliacoes" ><a href="admin_add_book.php">Add</a></li>
  </ul></li>
</div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Borrow A Book</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!--  php code for the modal borrow book -->
      <?php
        if (isset($_GET['submit_borrow_check'])) {
        $id_book = (isset($_GET['id_book'])?$_GET['id_book']:"");
        $id_borrower = (isset($_GET['id_borrower'])?$_GET['id_borrower']:"");
        
        }

       ?>
      <div class="modal-body">
      <form class="" action="" method="post">
        <input type="text" name="id_book" value="" placeholder="book id">
        <input type="text" name="id_borrower" value="" placeholder="borrower id">
          <input type="submit" name="submit_borrow_check" value="check">
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Borrow</button>
      </div>
    </div>
  </div>
</div>

<!--  modal for return -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel2">Return A Book</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="" action="#" method="post">
        <input type="text" name="" value="" placeholder="borrow id or student Id">
        <!-- <input type="text" name="" value="" placeholder="borrower id"> -->
        <input type="submit" name="" value="check">
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Return</button>
      </div>
    </div>
  </div>
</div>

<div class="clearfix"></div>
</div>
<script>
var toggle = true;

$(".sidebar-icon").click(function() {
if (toggle)
{
$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
$("#menu span").css({"position":"absolute"});
}
else
{
$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
setTimeout(function() {
$("#menu span").css({"position":"relative"});
}, 400);
}

toggle = !toggle;
});
</script>
