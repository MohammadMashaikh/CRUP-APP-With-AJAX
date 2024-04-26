<?php

require '../Database.php';

// Call the DeleteItem function
DeleteItem();

function DeleteItem()
{
    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        $db = new Database;
        $sql = $db->connection();
        $stmt = $sql->prepare("DELETE FROM items WHERE id = :id");
        $success = $stmt->execute(['id' => $id]);

        if ($success) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to delete item']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'No item id provided']);
    }
}
