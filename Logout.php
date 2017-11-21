<?php
session_start();
$_SESSION['connect']=0;
session_destroy();
header('Location:index.php');
exit;
 ?>
