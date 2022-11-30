<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");

require_once $_SERVER["DOCUMENT_ROOT"] . "/api/config/Database.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/api/models/User.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/api/dao/UserDAO.php";

use Dao\UserDAO;
use Config\Database;

if (empty($_REQUEST["id"])) {
  http_response_code(400);

  echo json_encode([
    "message" => "[ERROR]: Невозможно выполнить запрос! Не задан id пользователя!"
  ]);

  die();
}

$id = intval($_REQUEST["id"]);
$userDAO = new UserDAO((new Database())->connect());

if ($userDAO->delete($id)) {
  http_response_code(200);

  echo json_encode([
    "message" => "[SUCCESS]: Удаление пользователя прошло успешно!"
  ], JSON_UNESCAPED_UNICODE);

  die();
}

http_response_code(503);
echo json_encode([
  "message" => "[ERROR]: Произошла ошибка при удалении пользователя!"
], JSON_UNESCAPED_UNICODE);
