<?php

require 'functions.php';

if ($_COOKIE['token']) {
    search_token();
    echo(json_encode("Hello, {$_SESSION['name']}"));
} else {
    header('Location: ../form/avtoriz_form.php');
}

?>
<form action="http://localhost/exit.php">
    <p><input value="Выход" type="submit"/></p>
</form>

