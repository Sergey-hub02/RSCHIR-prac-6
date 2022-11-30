<?php

class Fixture {
  private int $id;
  private string $firstName;
  private string $lastName;
  private int $firstValue;
  private int $lastValue;

  public function __construct(
    int $id = 0,
    string $firstName = "",
    string $lastName = "",
    int $firstValue = 0,
    int $lastValue = 0
  ) {
    $this->id = $id;
    $this->firstName = $firstName;
    $this->lastName = $lastName;
    $this->firstValue = $firstValue;
    $this->lastValue = $lastValue;
  }

  /**
   * @return int
   */
  public function getId(): int {
    return $this->id;
  }

  /**
   * @param int $id
   */
  public function setId(int $id): void {
    $this->id = $id;
  }

  /**
   * @return string
   */
  public function getFirstName(): string {
    return $this->firstName;
  }

  /**
   * @param string $firstName
   */
  public function setFirstName(string $firstName): void {
    $this->firstName = $firstName;
  }

  /**
   * @return string
   */
  public function getLastName(): string {
    return $this->lastName;
  }

  /**
   * @param string $lastName
   */
  public function setLastName(string $lastName): void {
    $this->lastName = $lastName;
  }

  /**
   * @return int
   */
  public function getFirstValue(): int {
    return $this->firstValue;
  }

  /**
   * @param int $firstValue
   */
  public function setFirstValue(int $firstValue): void {
    $this->firstValue = $firstValue;
  }

  /**
   * @return int
   */
  public function getLastValue(): int {
    return $this->lastValue;
  }

  /**
   * @param int $lastValue
   */
  public function setLastValue(int $lastValue): void {
    $this->lastValue = $lastValue;
  }
}
