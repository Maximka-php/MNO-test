<?php

if (!($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
    die(json_encode('Это не AJAX-запрос'));
}

require_once 'User.php';

if (!$_POST['login']) die(json_encode('Не указан логин'));
if (!$_POST['password']) die(json_encode('Не указан пароль'));
if (!$_POST['confirm_password']) die(json_encode('Не указан повтор пароля'));
if (!$_POST['email']) die(json_encode('Не указан e-mail'));
if (!$_POST['name']) die(json_encode('Не указано имя'));

$login = trim(htmlspecialchars($_POST['login']));
$password = trim(htmlspecialchars($_POST['password']));
$confirm_password = trim(htmlspecialchars($_POST['confirm_password']));
$email = trim(htmlspecialchars($_POST['email']));
$name = trim(htmlspecialchars($_POST['name']));

$user = new User($login, $password, $confirm_password, $email, $name);

$user->validate();
$user->unique();
$user->create();

setcookie('token', $user->token, time() + 24 * 60 * 60, '/');
header("Location: http://localhost/index.php",true,301);
exit();

