<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Регистрация</title>
  <link href="style.css" rel="stylesheet">
</head>


<body>

<div class="container">
  <div class="form-box">
    <form action="scripts/register.php" class="form" method="post">
      <!-- Имя пользователя -->
      <div class="form-field">
        <label for="username" class="label">Имя пользователя</label>

        <div class="form-controls">
          <input
            type="text"
            id="username"
            name="username"
            class="input"
            placeholder="Имя"
            required
          >
        </div>
      </div>

      <!-- Email -->
      <div class="form-field">
        <label for="email" class="label">Email</label>

        <div class="form-controls">
          <input
            type="email"
            id="email"
            name="email"
            class="input"
            placeholder="Email"
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
          name="register"
          value="Регистрация"
          class="button"
        >
      </div>
    </form>
  </div>
</div>

</body>

</html>
