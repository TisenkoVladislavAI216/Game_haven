<?php
  $login = filter_var(trim($_POST['login']),
  FILTER_SANITIZE_STRING);

  $pass = filter_var(trim($_POST['pass']),
  FILTER_SANITIZE_STRING);

  $name = filter_var(trim($_POST['name']),
  FILTER_SANITIZE_STRING);

  if(mb_strlen($login) < 6 || mb_strlen($login) > 20){
    echo "Помилка! Логін має бути від 6 до 20 символів";
    exit;
  }
  if(mb_strlen($pass) < 8 || mb_strlen($pass) > 32){
    echo "Помилка! Пароль має бути від 8 до 32 символів";
    exit;
  }

  if(mb_strlen($name) < 3 || mb_strlen($name) > 20){
    echo "Помилка! Пароль має бути від 3 до 20 символів";
    exit;
  }

  $pass = md5($pass);

  $mysql = new mysqli('localhost', 'root', 'root', 'game_haven_db');
  $mysql->query("INSERT INTO `users` (`login`, `pass`, `name`)
  VALUES('$login', '$pass', '$name')");

  $mysql->close();
  header('Location: /main.php');
?>
