<?php

session_start();
unset($_SESSION['logged_id']);
unset($_SESSION['username']);
unset($_SESSION['role']);
header('Location: index.php');


?>