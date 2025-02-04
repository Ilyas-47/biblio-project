<?php
session_start();
session_destroy();
header("Location: ../user/acc.php"); // Redirect to the login page or any other page
exit();
?>
