<?php

if (isset($_REQUEST["register"])) {
  $username = $_REQUEST["username"];
  $email = $_REQUEST["email"];
  $password = $_REQUEST["password"];

  // все поля формы должны быть заполнены
  if (
    empty($username)
    || empty($email)
    || empty($password)
  ) {
    echo "[ERROR]: Неполные данные!" . PHP_EOL;
    die();
  }

  // установка соединения с БД
  try {
    $conn = new PDO(
      "mysql:host=MYSQL;dbname=appDB",
      "admin",
      "admin"
    );

    // хеширование пароля
    $encryptedPassword = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO `users`(`username`, `password`, `email`) VALUES (:username, :password, :email)";
    $preparedStmt = $conn->prepare($query);

    $preparedStmt->bindParam(":username", $username);
    $preparedStmt->bindParam(":password", $encryptedPassword);
    $preparedStmt->bindParam(":email", $email);

    // если удалось зарегистрироваться, то происходит редирект на страницу авторизации
    if ($preparedStmt->execute()) {
      header("Location: /public/login.php");
      die();
    }

    // всё плохо
    echo "<pre>";
    echo "[ERROR]: Ошибка выполнения запроса!" . PHP_EOL;
    echo "</pre>";
  }
  catch (PDOException $e) {
    echo "<pre>";
    echo "[ERROR]: Ошибка подключения к БД!" . PHP_EOL;
    echo $e->getMessage() . PHP_EOL;
    echo "</pre>";
  }
}
