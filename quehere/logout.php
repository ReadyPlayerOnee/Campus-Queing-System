<?php
session_start();
session_destroy();
header('Location: login_1.php');
exit();
?>