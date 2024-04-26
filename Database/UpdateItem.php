<?php
require '../Database.php';
require '../functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    UpdateItem();
}


function UpdateItem()
{
    // Validate and sanitize id
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    if ($id === false || $id === null) {
        echo 'No ID provided';
        return;
    }
    $item_name = FilterRequest($_POST['item_name']);
    $item_price = FilterRequest($_POST['item_price']);
    $item_quantity = FilterRequest($_POST['item_quantity']);

    $db = new Database;
    $pdo = $db->connection();
    $sql = "UPDATE items SET item_name = :item_name, item_price = :item_price, item_quantity = :item_quantity WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'item_name' => $item_name,
        'item_price' => $item_price,
        'item_quantity' => $item_quantity,
        'id' => $id
    ]);
}