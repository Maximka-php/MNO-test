<?php

if ($_COOKIE['PHPSESSID']) {
    session_start();
    echo(json_encode("Hello, {$_SESSION['name']}"));
    echo '<br>';
    echo '<form action="../exit.php">
          <p><input value="Выход" type="submit"/></p>
          </form>';
    die();
}
?>

<form name="avtoriz" id="avtoriz_form">
    <h2>Форма авторизации </h2>
    <p><input class="input" name="login" type="text" minlength="6" pattern="[a-zA-Z0-9]+" required style="width:25%"/>Логин</p>
    <p><input class="input" name="password" type="password" minlength="6" pattern="(?=.*[a-z])(?=.*\d)^[a-z\d]+$" required style="width:25%"/> Введите пароль</p>
    <p><input value="Отправить" type="submit"/></p>
</form>

<div id="result_form"></div>

<form action="../form/registration_form.php" id="avt_reg">
    <p>Если у вас нет логина и пароля - <input value="Регистрация" type="submit"/></p>
</form>

<script type="text/javascript" src="../js/jquery-3.6.1.min.js"></script>
<script src="../js/ajax.js "></script>