<?php

function search_token()
{
    $db = file_get_contents('./DB/DB.json');
    $array_db = json_decode($db, true);
    foreach ($array_db as $user) {
        if ($user['token'] == $_COOKIE['token']) {
            $_SESSION['name'] = $user['name'];
            $_SESSION['token'] = $user['token'];
        }
    }

}