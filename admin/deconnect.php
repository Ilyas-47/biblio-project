<?php
session_start();
session_destroy();
header("Location: ../user/acc.php"); 
exit();
?>
