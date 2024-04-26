
// Insert an item to database
$(document).ready(function () {
    $('#submitButton').click(function () {
        const item_name = document.getElementById('item_name').value;
        const item_price = document.getElementById('item_price').value;
        const item_quantity = document.getElementById('item_quantity').value;

        if (item_name === '' || item_price === '' || item_quantity === '') {
            alert("Please Fill all fields");

        } else {
            var data = {
                item_name: item_name,
                item_price: item_price,
                item_quantity: item_quantity
            };

            $.ajax({
                type: "POST",
                url: "../Database/AddItem.php",
                data: data,
                success: function (response) {
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }
    })
});

// Fetch the items from database
$(document).ready(function () {
    let tbody = $('#tbody');

    $.ajax({
        type: "GET",
        url: "../Database/Get_Items.php",
        dataType: "json",
        cache: false,
        success: function (data) {
            if (Array.isArray(data)) {
                data.forEach((item) => {
                    tbody.append(`
            <tr data-id=${item.id}>
            <td>${item.item_name}</td>
            <td>${item.item_price}</td>
            <td>${item.item_quantity}</td>
            <td>${item.created_at}</td>
            <td>${item.updated_at}</td>
            <td>
            <a href="../app/edit.php?id=${item.id}&item_name=${item.item_name}&item_price=${item.item_price}&item_quantity=${item.item_quantity}" class="btn btn-outline-warning">Edit</a>
            <button data-delete-id="${item.id}" class="border-0"><i class="fa-solid fa-trash btn btn-danger"></i></button>
             </td>
            </tr>
            `);
                    // Delete an item from database
                    $(`button[data-delete-id="${item.id}"]`).click(function () {
                        const itemId = $(this).data('delete-id');

                        $.ajax({
                            type: "POST",
                            url: "../Database/Delete_Item.php",
                            data: { id: itemId },
                            success: function (response) {
                                $(`tr[data-id="${itemId}"]`).remove();
                            },
                            error: function (xhr, status, error) {
                                console.error(xhr.responseText);
                            }
                        });
                    });
                });
            }
            else {
                console.log("No items returned from server.");
            }
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
        }

    });
});

// Update an item from database
$(document).ready(function () {
    $('#UpdateButton').click(function () {
        const item_id = $('#item_id').val();
        const item_name = $('#item_name').val();
        const item_price = $('#item_price').val();
        const item_quantity = $('#item_quantity').val();

        var data = {
            id: item_id,
            item_name: item_name,
            item_price: item_price,
            item_quantity: item_quantity
        };
        $.ajax({
            type: "POST",
            url: "../Database/UpdateItem.php",
            data: data,
            success: function (response) {
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }

        });
    })
});