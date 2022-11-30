<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");

require_once $_SERVER["DOCUMENT_ROOT"] . "/api/config/Database.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/api/models/Goods.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/api/dao/GoodsDAO.php";

use Dao\GoodsDAO;
use Config\Database;

if (empty($_REQUEST["id"])) {
  http_response_code(400);

  echo json_encode([
    "message" => "[ERROR]: Невозможно выполнить запрос! Не задан id товара!"
  ]);

  die();
}

$id = intval($_REQUEST["id"]);
$goodsDAO = new GoodsDAO((new Database())->connect());

if ($goodsDAO->delete($id)) {
  http_response_code(200);

  echo json_encode([
    "message" => "[SUCCESS]: Удаление товара прошло успешно!"
  ], JSON_UNESCAPED_UNICODE);

  die();
}

http_response_code(503);
echo json_encode([
  "message" => "[ERROR]: Произошла ошибка при удалении товара!"
], JSON_UNESCAPED_UNICODE);
