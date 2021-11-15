<?php 
unset($_SESSION["Kullanici"]);
session_destroy();

header("Location:AnaSayfa");
exit();

?>