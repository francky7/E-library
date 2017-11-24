<div class="menu">
<ul id="menu" >

<li><a href="index.html"><i class="fa fa-tachometer"></i> <span>Event</span></a></li>

<li id="menu-academico" ><a href="#"><i class="fa fa-table"></i> <span> Students</span> <span class="fa fa-angle-right" style="float: right"></span></a>
<ul id="menu-academico-sub" >
<li id="menu-academico-avaliacoes" ><a href="student_list.php"> List</a></li>
</ul></li>
<li id="menu-academico" ><a href="#"><i class="fa fa-table"></i> <span> Book</span> <span class="fa fa-angle-right" style="float: right"></span></a>
<ul id="menu-academico-sub" >
<li id="menu-academico-avaliacoes" ><a href="tabs.html"> Borrow</a></li>
<li id="menu-academico-avaliacoes" ><a href="tabs.html">Return</a></li>
<li id="menu-academico-avaliacoes" ><a href="tabs.html">Add</a></li>
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
