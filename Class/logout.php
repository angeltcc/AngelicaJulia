<?php 
session_start();
session_destroy();
echo"<script> window.location.assign('../Public/index.php') </script>";

?>