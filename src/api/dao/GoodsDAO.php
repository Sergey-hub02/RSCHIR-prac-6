<?php

namespace Dao;

require_once $_SERVER["DOCUMENT_ROOT"] . "/api/models/Goods.php";

use PDO;
use Models\Goods;

class GoodsDAO {
  private PDO $conn;

  /**
   * @param PDO $conn       подключение к БД
   */
  public function __construct(PDO $conn) {
    $this->conn = $conn;
  }

  /**
   * Создаёт запись в базе данных
   * @param Goods $goods
   * @return bool
   */
  public function create(Goods $goods): bool {
    $query = "INSERT INTO `Goods`(`title`, `description`) VALUES(?, ?)";
    $stmt = $this->conn->prepare($query);

    return $stmt->execute([
      $goods->getTitle(),
      $goods->getDescription()
    ]);
  }

  /**
   * Возвращает одну запись из базы данных
   * @param int $userId       id записи
   * @return Goods
   */
  public function readOne(int $goodsId): array {
    $query = <<<EOT
      SELECT
        `goods_id` AS `id`,
        `title`,
        `description`
      FROM `Goods`
      WHERE `goods_id` = :id
    EOT;

    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":id", $goodsId);

    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
  }

  /**
   * Возвращает все записи из таблицы
   * @return array
   */
  public function readAll(): array {
    $query = <<<EON
      SELECT
        `goods_id` AS `id`,
        `title`,
        `description`
      FROM `Goods`
    EON;

    $stmt = $this->conn->query($query);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  /**
   * Обновляет запись в таблице
   * @param Goods $user
   * @return bool
   */
  public function update(Goods $goods): bool {
    $query = <<<EOM
      UPDATE
        `Goods`
      SET
        `title` = ?,
        `description` = ?
      WHERE `goods_id` = ?
    EOM;

    $stmt = $this->conn->prepare($query);

    return $stmt->execute([
      $goods->getTitle(),
      $goods->getDescription(),
      $goods->getGoodsId()
    ]);
  }

  /**
   * Удаляет запись из таблицы
   * @param int $goodsId
   * @return bool
   */
  public function delete(int $goodsId): bool {
    $query = "DELETE FROM `Goods` WHERE `goods_id` = :id";

    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":id", $goodsId);

    return $stmt->execute();
  }
}
