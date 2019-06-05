<?php

class Database {
  private $connection;

  public function __construct() {
    $this -> connect_db();
  }
  
  public function connect_db() {
    try {
      $this -> connection = new PDO('mysql:host=localhost;dbname=crud', 'keroles', 'password');
      $this -> connection -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      die("ERROR: Could not connect. " . $e->getMessage());
    }
  }

}