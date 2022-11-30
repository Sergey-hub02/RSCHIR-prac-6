<?php
session_start();

if (isset($_REQUEST["submit"])) {
  $login = $_REQUEST["login"];
  $theme = $_REQUEST["theme"];
  $language = $_REQUEST["language"];
  $password = $_REQUEST["password"];

  $pdo = new PDO("mysql:host=MYSQL;dbname=lombard", "admin", "admin");
  $query = "SELECT `user_id`, `password` FROM `User` WHERE `username` = :username";

  $stmt = $pdo->prepare($query);
  $stmt->bindParam(":username", $login);

  if ($stmt->execute()) {
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
    $dbPassword = $row["password"];

    if (password_verify($password, $dbPassword)) {
      if (empty($_SESSION["user_id"])) {
        $_SESSION["user_id"] = $row["user_id"];
      }

      if (empty($_SESSION["username"])) {
        $_SESSION["username"] = $login;
      }

      if (empty($_SESSION["theme"])) {
        $_SESSION["theme"] = $theme;
      }

      if (empty($_SESSION["language"])) {
        $_SESSION["language"] = $language;
      }

      header("Location: /redis");
      return;
    }

    echo "Failure!";
    return;
  }

  echo "[ERROR]: Произошла ошибка при запросе к базе данных!";
}
