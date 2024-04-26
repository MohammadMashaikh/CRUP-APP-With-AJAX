<?php

require '../Database.php';
require '../functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    AddItem();
} else {
    echo 'No action specified';
}


function AddItem()
{
    $item_name = FilterRequest($_POST['item_name']);
    $item_price = FilterRequest($_POST['item_price']);
    $item_quantity = FilterRequest($_POST['item_quantity']);

    if (empty($item_name) || empty($item_price) || empty($item_quantity)) {
        echo 'Error: Please fill in all fields';
        return;
    }

    $db = new Database;
    $sql = $db->connection();
    $stmt = $sql->prepare("INSERT INTO items (`item_name`, `item_price`, `item_quantity`) VALUES (:item_name, :item_price, :item_quantity)");
    $success = $stmt->execute([
        'item_name' => $item_name,
        'item_price' => $item_price,
        'item_quantity' => $item_quantity
    ]);
}