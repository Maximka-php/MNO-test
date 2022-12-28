<?php

require 'functions.php';

if ($_COOKIE['token']) {
    search_token();
    echo "Hello, {$_SESSION['name']}";
} else {
    header('Location: ../form/avtoriz_form.php');
}

echo '<form action="../exit.php">
                <p><input value="Выход" type="submit"/></p>
                </form>';
?>

