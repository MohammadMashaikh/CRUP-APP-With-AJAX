<?php

require '../Database.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $data = GetItems();
    echo $data;
} else {
    echo 'No action specified';
}


function GetItems()
{
    $db = new Database;
    $pdo = $db->connection();
    $sql = "SELECT * FROM items";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($data) > 0) {
        return json_encode($data);
    } else {
        return json_encode("No items found");
    }
}
