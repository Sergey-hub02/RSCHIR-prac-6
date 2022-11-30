<?php

namespace Models;

class Goods {
  private int $goodsId;
  private string $title;
  private string $description;

  /**
   * @param int $goodsId            id товара
   * @param string $title           название товара
   * @param string $description     описание товара
   */
  public function __construct(
    int $goodsId,
    string $title,
    string $description
  ) {
    $this->goodsId = $goodsId;
    $this->title = $title;
    $this->description = $description;
  }

  /**
   * @return int
   */
  public function getGoodsId(): int {
    return $this->goodsId;
  }

  /**
   * @param int $goodsId
   */
  public function setGoodsId(int $goodsId): void {
    $this->goodsId = $goodsId;
  }

  /**
   * @return string
   */
  public function getTitle(): string {
    return $this->title;
  }

  /**
   * @param string $title
   */
  public function setTitle(string $title): void {
    $this->title = $title;
  }

  /**
   * @return string
   */
  public function getDescription(): string {
    return $this->description;
  }

  /**
   * @param string $description
   */
  public function setDescription(string $description): void {
    $this->description = $description;
  }
}
