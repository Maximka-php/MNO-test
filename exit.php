<?php
ob_start();
session_destroy();
setcookie('token','',time()-100);
setcookie('PHPSESSID','', time()-100);
header('Location: index.php');
ob_end_flush();