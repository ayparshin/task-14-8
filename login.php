<?php

require __DIR__ . '/functions.php';

$username = $_POST['login'] ?? null;
$password = $_POST['password'] ?? null;


if (checkPassword($username, $password)){
    session_start();
    $_SESSION['auth'] = true; 
    $_SESSION['login'] = $username; 
    $_SESSION['password'] = $password;
    setcookie('auth', 'yes', 0, '/'); 
};


$auth = $_SESSION['auth'] ?? null;
//var_dump($_SESSION);

if(!$auth) { ?>
  <html>
  <body>
      <form action="login.php" method="post">
          <input name="login" type="text" placeholder="Логин">
          <input name="password" type="password" placeholder="Пароль">
          <input name="submit" type="submit" value="Войти">
      </form>
  </body>
  </html>

<?php }
else{
    header('Location: /task-14-8/index.php');
}

?>
