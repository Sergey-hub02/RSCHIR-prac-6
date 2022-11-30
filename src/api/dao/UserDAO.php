<?php

namespace Dao;

require_once $_SERVER["DOCUMENT_ROOT"] . "/api/models/User.php";

use PDO;
use Models\User;

class UserDAO {
  private PDO $conn;

  /**
   * @param PDO $conn       подключение к БД
   */
  public function __construct(PDO $conn) {
    $this->conn = $conn;
  }

  /**
   * Создаёт запись в базе данных
   * @param User $user
   * @return bool
   */
  public function create(User $user): bool {
    $query = "INSERT INTO `User`(`username`, `email`, `password`) VALUES(?, ?, ?)";
    $stmt = $this->conn->prepare($query);

    return $stmt->execute([
      $user->getUsername(),
      $user->getEmail(),
      password_hash($user->getPassword(), PASSWORD_DEFAULT)
    ]);
  }

  /**
   * Возвращает одну запись из базы данных
   * @param int $userId       id записи
   * @return User
   */
  public function readOne(int $userId): array {
    $query = <<<EOT
      SELECT
        `user_id` AS `id`,
        `username` AS `name`,
        `email`
      FROM `User`
      WHERE `user_id` = :id
    EOT;

    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":id", $userId);

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
        `user_id` AS `id`,
        `username` AS `name`,
        `email`
      FROM `User`
    EON;

    $stmt = $this->conn->query($query);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  /**
   * Обновляет запись в таблице
   * @param int $userId
   * @param User $user
   * @return bool
   */
  public function update(User $user): bool {
    $query = <<<EOM
      UPDATE
        `User`
      SET
        `username` = ?,
        `email` = ?,
        `password` = ?
      WHERE `user_id` = ?
    EOM;

    $stmt = $this->conn->prepare($query);

    return $stmt->execute([
      $user->getUsername(),
      $user->getEmail(),
      password_hash($user->getPassword(), PASSWORD_DEFAULT),
      $user->getUserId()
    ]);
  }

  /**
   * Удаляет запись из таблицы
   * @param int $userId
   * @return bool
   */
  public function delete(int $userId): bool {
    $query = "DELETE FROM `User` WHERE `user_id` = :id";

    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":id", $userId);

    return $stmt->execute();
  }
}
