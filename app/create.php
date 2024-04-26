<?php require '../includes/header.php'; ?>

<div class="container mt-5">
    <h1>Add Item</h1>

    <form method="post">
        <div class="mb-3">
            <label for="item_name" class="form-label">Item Name</label>
            <input name="item_name" type="text" class="form-control" id="item_name">
        </div>
        <div class="mb-3">
            <label for="item_price" class="form-label">Item Price</label>
            <input name="item_price" type="number" class="form-control" id="item_price">
        </div>
        <div class="mb-3">
            <label for="item_quantity" class="form-label">Item Quantity</label>
            <input name="item_quantity" type="number" class="form-control" id="item_quantity">
        </div>
        <button type="submit" class="btn btn-secondary" id="submitButton">Add Item</button>
    </form>
</div>
<?php require '../includes/footer.php'; ?>