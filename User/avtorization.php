<?php

if (!($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
    die('Это не AJAX-запрос');
}

require_once 'User.php';

if (!$_POST['login']) die(json_encode('Не указан логин'));
if (!$_POST['password']) die(json_encode('Не указан пароль'));

$login = trim(htmlspecialchars($_POST['login']));
$password = trim(htmlspecialchars($_POST['password']));

$user = new User($login, $password);

if ($user->login()) {
    setcookie('token', $_SESSION['token'], time() + 24 * 60 * 60, '/');
    header( 'Location: /', true, 307 );
    exit();
}


