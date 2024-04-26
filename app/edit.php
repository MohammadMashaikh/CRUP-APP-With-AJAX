<?php require '../includes/header.php'; ?>

<div class="container mt-5">
    <h1>Edit Item</h1>

    <form method="post">
        <div class="mb-3">
            <label for="item_name" class="form-label">Item Name</label>
            <input name="item_name" type="text" class="form-control" id="item_name" value="<?= $_GET['item_name'] ?>">
        </div>
        <div class="mb-3">
            <label for="item_price" class="form-label">Item Price</label>
            <input name="item_price" type="number" class="form-control" id="item_price"
                value="<?= $_GET['item_price'] ?>">
        </div>
        <div class="mb-3">
            <label for="item_quantity" class="form-label">Item Quantity</label>
            <input name="item_quantity" type="number" class="form-control" id="item_quantity"
                value="<?= $_GET['item_quantity'] ?>">
        </div>
        <input type="hidden" id="item_id" value="<?= $_GET['id'] ?>">
        <button type="submit" class="btn btn-secondary" id="UpdateButton">Update Item</button>
    </form>
</div>

<?php require '../includes/footer.php'; ?>