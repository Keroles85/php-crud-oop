<?php


class Category
{
  private $conn;
  private $id;

  public function __construct($db) {
    $this -> conn = $db;
  }

  public function read() {
    $query = "SELECT id, name FROM categories";
    $stmt = $this -> conn -> prepare($query);
    $stmt -> execute();
    return $stmt -> fetchAll();
  }

  public function readName($id) {
    $this -> id = $id;
    $query = "SELECT name FROM categories WHERE id = ?";
    $stmt = $this -> conn -> prepare($query);
    $stmt -> execute([$this -> id]);
    $row = $stmt -> fetch(PDO::FETCH_ASSOC);
    return $row['name'];
  }

}