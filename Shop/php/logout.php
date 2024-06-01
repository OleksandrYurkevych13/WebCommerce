<?php 

session_start();
session_destroy();

header("Location: /Shop/php/index.php");
exit;
?>