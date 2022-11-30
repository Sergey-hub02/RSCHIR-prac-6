<?php

namespace Models;

class User {
  private int $userId;
  private string $username;
  private string $email;
  private string $password;

  /**
   * @param int $userId               id пользователя
   * @param string $username          имя пользователя
   * @param string $email             адрес электронной почты
   * @param string $password          пароль
   */
  public function __construct(
    int $userId,
    string $username,
    string $email,
    string $password
  ) {
    $this->userId = $userId;
    $this->username = $username;
    $this->email = $email;
    $this->password = $password;
  }

  /**
   * @return int
   */
  public function getUserId(): int {
    return $this->userId;
  }

  /**
   * @param int $userId
   */
  public function setUserId(int $userId): void {
    $this->userId = $userId;
  }

  /**
   * @return string
   */
  public function getUsername(): string {
    return $this->username;
  }

  /**
   * @param string $username
   */
  public function setUsername(string $username): void {
    $this->username = $username;
  }

  /**
   * @return string
   */
  public function getEmail(): string {
    return $this->email;
  }

  /**
   * @param string $email
   */
  public function setEmail(string $email): void {
    $this->email = $email;
  }

  /**
   * @return string
   */
  public function getPassword(): string {
    return $this->password;
  }

  /**
   * @param string $password
   */
  public function setPassword(string $password): void {
    $this->password = $password;
  }
}
