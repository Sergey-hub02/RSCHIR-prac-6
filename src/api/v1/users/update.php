<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");

require_once $_SERVER["DOCUMENT_ROOT"] . "/api/config/Database.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/api/models/User.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/api/dao/UserDAO.php";

use Dao\UserDAO;
use Models\User;
use Config\Database;

if (empty($_REQUEST["id"])) {
  http_response_code(400);

  echo json_encode([
    "message" => "[ERROR]: Невозможно выполнить запрос! Не задан id пользователя!"
  ]);

  die();
}

// получаем тело запроса в формате JSON
$reqBody = json_decode(
  file_get_contents("php://input"),
  true
);

// проверка данных пользователя
if (
  empty($reqBody["username"])
  || empty($reqBody["email"])
  || empty($reqBody["password"])
) {
  // некоторые данные отсутствуют
  http_response_code(400);

  echo json_encode([
    "message" => "[ERROR]: Невозможно выполнить запрос! Неполные данные!"
  ], JSON_UNESCAPED_UNICODE);

  die();
}

// все данные полные
$userDAO = new UserDAO((new Database())->connect());

$user = new User(
  intval($_REQUEST["id"]),
  $reqBody["username"],
  $reqBody["email"],
  $reqBody["password"]
);

if ($userDAO->update($user)) {
  // создание записи прошло успешно
  http_response_code(200);

  echo json_encode([
    "message" => "[SUCCESS]: Данные пользователя были успешно обновлены!"
  ], JSON_UNESCAPED_UNICODE);

  die();
}

// произошла ошибка при добавлении записи
http_response_code(503);

echo json_encode([
  "message" => "[ERROR]: Произошла ошибка при обновлении пользователя!"
], JSON_UNESCAPED_UNICODE);
