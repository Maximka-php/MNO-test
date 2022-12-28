<?php

class User
{
    function __construct($login, $password, $confirm_password = null, $email = null, $name = null, $token = null)
    {
        $this->login = $login;
        $this->password = $password;
        $this->email = $email;
        $this->name = $name;
        $this->token = $token;
        $this->confirm_password = $confirm_password;
    }

    function create()
    {
        $this->token = $this->generate_token();
        $this->password = $this->generate_password();
        $array_insert = ['login' => $this->login, 'password' => $this->password,
            'email' => $this->email, 'name' => $this->name, 'token' => $this->token];
        $db = file_get_contents('../DB/DB.json');
        $array_db = json_decode($db, true);
        $array_db[count($array_db)] = $array_insert;
        $array_result = json_encode($array_db);
        file_put_contents('../DB/DB.json', $array_result);
        session_start();
        $_SESSION['name'] = $this->name;
        $_SESSION['token'] = $this->token;

    }

    function login()
    {
        $db = file_get_contents('../DB/DB.json');
        $array_db = json_decode($db, true);
        foreach ($array_db as $user) {
            if ($user['login'] == $this->login) {
                if ($user['password'] == $this->generate_password()) {
                    session_start();
                    $_SESSION['name'] = $user['name'];
                    $_SESSION['token'] = $user['token'];
                    return true;
                } else {
                    header('Content-Type: application/json; charset=utf-8',JSON_UNESCAPED_UNICODE);
                    die(json_encode('Неправильный пароль'));
                }
            }
        }
        header('Content-Type: application/json; charset=utf-8',JSON_UNESCAPED_UNICODE);
        die(json_encode('Несуществующий логин'));
    }

    function validate()
    {

        if (strlen($this->login) < 6) {
            header('Content-Type: application/json; charset=utf-8',JSON_UNESCAPED_UNICODE);
            die(json_encode('Логин не должен быть меньше 6ти символов',JSON_UNESCAPED_UNICODE));
        }
        if (!preg_match('/^[a-zA-Z\d]+$/', $this->login)) {
            header('Content-Type: application/json; charset=utf-8',JSON_UNESCAPED_UNICODE);
            die(('Логин должен состоять обязательно из цифр и латинских букв'));
        }
        if (!preg_match('/(?=.*[a-z])(?=.*\d)^[a-z\d]+$/', $this->password)) {
            header('Content-Type: application/json; charset=utf-8',JSON_UNESCAPED_UNICODE);
            die(json_encode('Пароль обязательно должен содержать и буквы и цифры'));
        }
        if (strlen($this->password) < 6) {
            header('Content-Type: application/json; charset=utf-8',JSON_UNESCAPED_UNICODE);
            die (json_encode('Пароль не должен быть меньше 6ти символов'));
        }
        if ($this->password !== $this->confirm_password) {
            header('Content-Type: application/json; charset=utf-8',JSON_UNESCAPED_UNICODE);
            die(json_encode('Пароль и повторный пароль должны совпадать'));
        }
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            header('Content-Type: application/json; charset=utf-8',JSON_UNESCAPED_UNICODE);
            die(json_encode('Некорректный email'));
        }
        if (strlen($this->name) < 2) {
            header('Content-Type: application/json; charset=utf-8',JSON_UNESCAPED_UNICODE);
            die(json_encode('Имя должно состоять как минимум из двух букв'));
        }
        if (!preg_match('/^[a-zA-Zа-яёА-ЯЁ]+$/', $this->name)) {
            header('Content-Type: application/json; charset=utf-8',JSON_UNESCAPED_UNICODE);
            die(json_encode('Имя должно состоять только из букв'));
        }
    }

    function generate_token()
    {
        return uniqid($this->login);
    }

    function generate_password()
    {
        return md5($this->login . $this->password);
    }

    function unique()
    {
        $db = file_get_contents('../DB/DB.json');
        $array_db = json_decode($db, true);
        for ($i = 0; $i < count($array_db); $i++) {
            if ($array_db[$i]['login'] == $this->login) {
                header('Content-Type: application/json; charset=utf-8',JSON_UNESCAPED_UNICODE);
                die(json_encode('Такой логин уже существует'));
            }
            if ($array_db[$i]['email'] == $this->email) {
                header('Content-Type: application/json; charset=utf-8',JSON_UNESCAPED_UNICODE);
                die(json_encode('Такой email уже существует'));
            }
        }
    }
}