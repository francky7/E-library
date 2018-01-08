<div class="down">
      <a href="index.html"><img src="images/<?=$image;?>"></a>

     <p><?= $name;  ?></p>
    <ul>
    <li><a class="tooltips" href="profile.php"><span>Profile</span><i class="lnr lnr-user"></i></a></li>




      <li><a class="tooltips" name="Log" href="Logout.php"><span>Log out</span><i class="lnr lnr-power-switch"></i></a></li>
      </ul>
    </div>
   <!--//down-->
             <div class="menu">
    <ul id="menu" >

      <li><a href="student_event.php"><i class="fa fa-tachometer"></i> <span>Event</span></a></li>

      <li id="menu-academico" ><a href="#"><i class="fa fa-table"></i> <span> Book</span> <span class="fa fa-angle-right" style="float: right"></span></a>
         <ul id="menu-academico-sub" >
        <li id="menu-academico-avaliacoes" ><a href="student.php"> List</a></li>
        <li id="menu-academico-avaliacoes" ><a href="tabs.html">Return</a></li>
        <li id="menu-academico-avaliacoes" ><a href="tabs.html">My list</a></li>
        </ul></li>

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
