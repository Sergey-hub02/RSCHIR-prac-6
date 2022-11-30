<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Главная страница</title>
</head>


<body
  <?php if (isset($_SESSION["theme"]) && $_SESSION["theme"] === "dark"): ?>
    style="background-color: black; color: white"
  <?php else: ?>
    style="background-color: white; color: black"
  <?php endif; ?>
>

<?php if (isset($_SESSION["username"])): ?>
  <div>Добро пожаловать, <?= $_SESSION["username"] ?>!</div>

  <form action="/redis/scripts/handleFile.php" method="post" enctype="multipart/form-data">
    <div class="form-field">
      <label for="file" class="label">Загрузите файл</label>

      <div class="form-controls">
        <input
          type="file"
          name="document"
          id="file"
        >
      </div>
    </div>

    <div class="form-field">
      <button type="submit" name="load">Загрузить</button>
    </div>
  </form>

  <div class="files">
    <?php
    $pdo = new PDO("mysql:host=MYSQL;dbname=lombard", "admin", "admin");
    $query = "SELECT * FROM `File` WHERE `user_id` = ?";

    $stmt = $pdo->prepare($query);
    $stmt->execute([$_SESSION["user_id"]]);

    $files = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <?php foreach ($files as $file): ?>
      <div class="file">
        <a href="/uploads/documents/<?= basename($file['path']) ?>" download><?= $file['path'] ?></a>
      </div>
    <?php endforeach; ?>
  </div>
<?php else: ?>
  <div>Пожалуйста, авторизуйтесь!</div>
<?php endif; ?>

</body>

</html>
