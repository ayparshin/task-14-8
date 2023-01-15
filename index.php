<?php
session_start();
//var_dump($_SESSION);

// Защита от перехода по стрелке Назад браузера, если пользователь нажал Выйти.
if ($_COOKIE['auth'] == !true){
    header('Location: /task-14-8/login.php');
}
?>

<html>
  <body>
    <?php
    require __DIR__ . '/functions.php';
    print_r("Привет, " . getCurrentUser()); 
    ?>
    <form action="logout.php" method="post">
        <input name="submit" type="submit" value="Выйти">
    </form>

    <?php
    // Таймер персональной скидки
    date_default_timezone_set('Europe/Moscow');

    $now = new DateTime('now');
    $tomorrow= new DateTime('tomorrow');

    if($now < $tomorrow) {
        $interval = $now->diff($tomorrow);
        echo ('Скидка сгорит через ' . $interval->format('%h : %I : %S') . ' UTC Москва');
    }
    ?>
    <!-- Задачу с днем рождения пользователя сделать уже не успеваю.
    <br>
    <br>
    <form action="index.php" method="post">
        <input name="date" type="date">
        <input name="submit" type="submit" value="Ввод">
    </form>
    -->
    
    <?php

    $birthday = $_POST['date'] ?? null;
    //var_dump($birthday);
    ?>

  </body>
  </html>

