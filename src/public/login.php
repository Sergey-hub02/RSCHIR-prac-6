<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Авторизация</title>
  <link href="style.css" rel="stylesheet">
</head>


<body>

<div class="container">
  <div class="form-box">
    <form action="/login" class="form" method="post">
      <!-- Логин -->
      <div class="form-field">
        <label for="login" class="label">Логин</label>

        <div class="form-controls">
          <input
            type="text"
            id="login"
            name="httpd_username"
            class="input"
            placeholder="Логин"
            required
          >
        </div>
      </div>

      <!-- Пароль -->
      <div class="form-field">
        <label for="password" class="label">Пароль</label>

        <div class="form-controls">
          <input
            type="password"
            id="password"
            name="httpd_password"
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
          name="login"
          value="Авторизоваться"
          class="button"
        >
      </div>
    </form>
  </div>
</div>

</body>

</html>
