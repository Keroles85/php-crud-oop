<?php


class product
{
  private $conn;
  private $name;
  private $description;
  private $price;
  private $category_id;
  private $timestamp;

  public function __construct($conn) {
    $this->conn = $conn;
  }

  public function create($name, $description, $price, $category_id) {
    $this->name = $name;
    $this->description = $description;
    $this->price = $price;
    $this->category_id = $category_id;
    $this->timestamp = date('Y-m-d H:i:s');

    $query = "INSERT INTO products (name, description, price, category_id, created) 
        VALUES (:name, :description, :price, :category_id, :created)";

    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":name", $this->name);
    $stmt->bindParam(":price", $this->price);
    $stmt->bindParam(":description", $this->description);
    $stmt->bindParam(":category_id", $this->category_id);
    $stmt->bindParam(":created", $this->timestamp);

    return $stmt->execute() ? true : false;
  }

}