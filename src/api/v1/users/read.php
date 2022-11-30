<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");

require_once $_SERVER["DOCUMENT_ROOT"] . "/api/config/Database.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/api/models/User.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/api/dao/UserDAO.php";

use Dao\UserDAO;
use Config\Database;

$userDAO = new UserDAO((new Database())->connect());

if (!empty($_REQUEST["id"])) {
  // нужно вывести одного пользователя
  $id = intval($_REQUEST["id"]);
  $user = $userDAO->readOne($id);

  http_response_code(200);
  echo json_encode($user, JSON_UNESCAPED_UNICODE);

  die();
}

// нужно вывести всех пользователей
$users = $userDAO->readAll();

http_response_code(200);
echo json_encode($users, JSON_UNESCAPED_UNICODE);
