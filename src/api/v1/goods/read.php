<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");

require_once $_SERVER["DOCUMENT_ROOT"] . "/api/config/Database.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/api/models/Goods.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/api/dao/GoodsDAO.php";

use Dao\GoodsDAO;
use Config\Database;

$goodsDAO = new GoodsDAO((new Database())->connect());

if (!empty($_REQUEST["id"])) {
  // нужно вывести одного пользователя
  $id = intval($_REQUEST["id"]);
  $goods = $goodsDAO->readOne($id);

  http_response_code(200);
  echo json_encode($goods, JSON_UNESCAPED_UNICODE);

  die();
}

// нужно вывести всех пользователей
$goods = $goodsDAO->readAll();

http_response_code(200);
echo json_encode($goods, JSON_UNESCAPED_UNICODE);
