<?php
session_start();

const UPLOAD_DIR = "/var/www/apache-server/html/uploads/documents";

if (isset($_REQUEST["load"])) {
  $fileInfo = $_FILES["document"];

  print_r($fileInfo);

  // принимаем только PDF
  if ($fileInfo["type"] !== "application/pdf") {
    echo "[ERROR]: Можно загружать только файлы с расширением \".pdf\"!";
    die();
  }

  // переносим файл в спец. директрию
  $uploadPath = UPLOAD_DIR . "/" . $fileInfo["name"];

  if (move_uploaded_file($fileInfo["tmp_name"], $uploadPath)) {
    $pdo = new PDO("mysql:host=MYSQL;dbname=lombard", "admin", "admin");

    $query = "INSERT INTO `File`(`path`, `user_id`) VALUES (?, ?)";
    $stmt = $pdo->prepare($query);

    $stmt->execute([
      $uploadPath,
      $_SESSION["user_id"]
    ]);

    header("Location: /redis");
    die();
  }

  echo "[ERROR]: Ошибка загрузки файла!";
}
