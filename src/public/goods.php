<?php

try {
  $conn = new PDO(
    "mysql:host=MYSQL;dbname=appDB",
    "admin",
    "admin"
  );

  $query = "SELECT `ID`, `title`, `description` FROM `goods`";
  print_r($conn->query($query));
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
  <title>Товары</title>
</head>


<body>

<table border="1">
  <thead>
    <tr>
      <th>ID</th>
      <th>title</th>
      <th>description</th>
    </tr>
  </thead>

  <tbody>
    <?php foreach ($conn->query($query) as $row): ?>
      <tr>
        <td><?= $row["ID"] ?></td>
        <td><?= $row["title"] ?></td>
        <td><?= $row["description"] ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

</body>

</html>
