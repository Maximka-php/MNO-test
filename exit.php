<?php
session_destroy();
setcookie('token','',time()-100);
setcookie('PHPSESSID','', time()-100);
header('Location: index.php');