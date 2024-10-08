<?php
// models/Model.php

require_once 'Database.php';

class Model {
    protected $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }
}