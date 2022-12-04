
<form name="registration" id="registration_form" >
    <h2>Форма регистрации </h2>
    <p><input class="input" name="login" type="text" minlength="6" required style="width:25%" /> Логин</p>
    <p><input class="input" name="password" type="password" minlength="6" required style="width:25%" /> Введите пароль</p>
    <p><input class="input" name="confirm_password" type="password" minlength="6" required style="width:25%" /> Повторите пароль</p>
    <p><input class="input" name="email" type="email" required style="width:25%" /> Email</p>
    <p><input class="input" name="name" type="text" minlength="2" required style="width:25%" /> Имя</p>
    <p><input value="Отправить" type="submit" /></p>
</form>

<div id="result_form"></div>

<script type="text/javascript" src="../js/jquery-3.6.1.min.js"></script>
<script src="../js/ajax.js"></script>