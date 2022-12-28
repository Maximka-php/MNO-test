<?php

if ($_COOKIE['PHPSESSID']) {
    session_start();
    echo"Hello, {$_SESSION['name']}";
    echo '<br>';
    echo '<form action="../exit.php">
          <p><input value="Выход" type="submit"/></p>
          </form>';
    die();
}
?>

<form name="registration" id="registration_form" >
    <h2>Форма регистрации </h2>
    <p><input class="input" name="login" type="text" minlength="6"  pattern="[a-zA-Z0-9]+" required style="width:25%" /> Логин</p>
    <p><input class="input" name="password" type="password"   minlength="6" pattern="(?=.*[a-z])(?=.*\d)^[a-z\d]+$" required style="width:25%" /> Введите пароль</p>
    <p><input class="input" name="confirm_password" type="password" minlength="6" pattern="(?=.*[a-z])(?=.*\d)^[a-z\d]+$" required style="width:25%" /> Повторите пароль</p>
    <p><input class="input" name="email"  pattern="[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z0-9]+" required style="width:25%" /> Email</p>
    <p><input class="input" name="name" type="text" minlength="2" pattern="[a-zA-Z]+" required style="width:25%" /> Имя</p>
    <p><input value="Отправить" type="submit" /></p>
</form>

<div id="result_form"></div>

<script type="text/javascript" src="../js/jquery-3.6.1.min.js"></script>
<script src="../js/ajax.js"></script>