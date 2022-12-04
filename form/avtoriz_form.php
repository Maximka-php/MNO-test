
<form  name="avtoriz" id="avtoriz_form" >
    <h2>Форма авторизации </h2>
    <p><input class="input" name="login" type="text" minlength="6" required style="width:25%" /> Логин</p>
    <p><input class="input" name="password" type="password" minlength="6" required style="width:25%" /> Введите пароль</p>
    <p><input value="Отправить" type="submit" /></p>
</form>

<div id="result_form"></div>

<form action="../form/registration_form.php"  id="avt_reg">
    <p>Если у вас нет логина и пароля - <input value="Регистрация" type="submit" /></p>
</form>

<script type="text/javascript" src="../js/jquery-3.6.1.min.js"></script>
<script src="../js/ajax.js "></script>