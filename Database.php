<?php

class Database
{

    private $db;

    public function __construct()
    {
        $this->db = $this->connection();
    }


    public function connection()
    {
        $localhost = "localhost";
        $db_name = "php_ajax_test";
        $db_username = "root";
        $db_password = "";

        try {
            $this->db = new PDO("mysql:host=$localhost;dbname=$db_name", $db_username, $db_password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $this->db;
        } catch (PDOException $e) {
            echo "Connection failed " . $e->getMessage();
        }
    }
}