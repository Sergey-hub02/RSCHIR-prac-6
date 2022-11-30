<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");

require_once $_SERVER["DOCUMENT_ROOT"] . "/api/config/Database.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/api/models/Goods.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/api/dao/GoodsDAO.php";

use Dao\GoodsDAO;
use Models\Goods;
use Config\Database;

if (empty($_REQUEST["id"])) {
  http_response_code(400);

  echo json_encode([
    "message" => "[ERROR]: Невозможно выполнить запрос! Не задан id товара!"
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
  empty($reqBody["title"])
  || empty($reqBody["description"])
) {
  // некоторые данные отсутствуют
  http_response_code(400);

  echo json_encode([
    "message" => "[ERROR]: Невозможно выполнить запрос! Неполные данные!"
  ], JSON_UNESCAPED_UNICODE);

  die();
}

// все данные полные
$goodsDAO = new GoodsDAO((new Database())->connect());

$goods = new Goods(
  intval($_REQUEST["id"]),
  $reqBody["title"],
  $reqBody["description"]
);

if ($goodsDAO->update($goods)) {
  // создание записи прошло успешно
  http_response_code(200);

  echo json_encode([
    "message" => "[SUCCESS]: Данные товара были успешно обновлены!"
  ], JSON_UNESCAPED_UNICODE);

  die();
}

// произошла ошибка при добавлении записи
http_response_code(503);

echo json_encode([
  "message" => "[ERROR]: Произошла ошибка при обновлении товара!"
], JSON_UNESCAPED_UNICODE);
