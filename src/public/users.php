<?php

try {
  $conn = new PDO(
    "mysql:host=MYSQL;dbname=appDB",
    "admin",
    "admin"
  );

  $query = "SELECT `ID`, `username`, `email` FROM `users`";
}
catch (PDOException $e) {
  echo "<pre>";

  echo "[ERROR]: Ошибка подключения к БД!" . PHP_EOL;
  echo $e->getMessage() . PHP_EOL;

  echo "</pre>";
  die();
}

?>
<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Пользователи</title>
</head>


<body>

<table border="1">
  <thead>
    <tr>
      <th>ID</th>
      <th>username</th>
      <th>email</th>
    </tr>
  </thead>

  <tbody>
    <?php foreach ($conn->query($query) as $row): ?>
      <tr>
        <td><?= $row["ID"] ?></td>
        <td><?= $row["username"] ?></td>
        <td><?= $row["email"] ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

</body>

</html>