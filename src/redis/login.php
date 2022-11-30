<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Авторизация</title>
  <link rel="stylesheet" href="style.css">
</head>


<body>

<div class="container">
  <div class="form-box">
    <form action="/redis/scripts/login.php" class="form" method="post">
      <!-- Логин -->
      <div class="form-field">
        <label for="login" class="label">Логин</label>

        <div class="form-controls">
          <input
            type="text"
            id="login"
            name="login"
            class="input"
            placeholder="Логин"
            required
          >
        </div>
      </div>
      
      <div class="form-field">
        <span>Тема</span>
        
        <div class="form-controls">
          <label for="light"><input type="radio" name="theme" id="light" value="light"> Светлая</label>
          <label for="dark"><input type="radio" name="theme" id="dark" value="dark"> Тёмная</label>
        </div>
      </div>

      <div class="form-field">
        <label for="language">Язык</label>

        <div class="form-controls">
          <select class="select" name="language" id="language">
            <option value="ru">Русский</option>
            <option value="en">Английский</option>
            <option value="kor">Корейский</option>
            <option value="tat">Татарский</option>
          </select>
        </div>
      </div>

      <!-- Пароль -->
      <div class="form-field">
        <label for="password" class="label">Пароль</label>

        <div class="form-controls">
          <input
            type="password"
            id="password"
            name="password"
            class="input"
            placeholder="Пароль"
            required
          >
        </div>
      </div>

      <!-- Отправка формы -->
      <div class="form-field --text-center">
        <input
          type="submit"
          name="submit"
          value="Авторизоваться"
          class="button"
        >
      </div>
    </form>
  </div>
</div>

</body>

</html>
