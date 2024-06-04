// Function to show edit form for products
function showEditForm(prodId, name, category, desc, price) {
    const editForm = document.createElement('div');
    editForm.classList.add('edit-form');
    editForm.innerHTML = `
        <div class="edit-form-container">
            <h4>Edit Product</h4>
            <label for="edit-prod-name">Product Name</label>
            <input type="text" id="edit-prod-name" name="edit-prod-name" value="${name}" required>
            <label for="edit-prod-category">Category</label>
            <input type="text" id="edit-prod-category" name="edit-prod-category" value="${category}" required>
            <label for="edit-prod-desc">Description</label>
            <input type="text" id="edit-prod-desc" name="edit-prod-desc" value="${desc}" required>
            <label for="edit-prod-price">Price</label>
            <input type="text" id="edit-prod-price" name="edit-prod-price" value="${price}" required>
            <input type="hidden" id="edit-prod-id" name="edit-prod-id" value="${prodId}">
            <div class="edit-form-buttons">
                <button type="button" onclick="updateProduct()">Update</button>
                <button type="button" onclick="cancelEdit()">Cancel</button>
            </div>
        </div>
    `;
    
    const mainContent = document.querySelector('.content');
    mainContent.appendChild(editForm);
}

// Function to update product details
function updateProduct() {
    const prodId = document.getElementById('edit-prod-id').value;
    const newName = document.getElementById('edit-prod-name').value;
    const newCategory = document.getElementById('edit-prod-category').value;
    const newDesc = document.getElementById('edit-prod-desc').value;
    const newPrice = document.getElementById('edit-prod-price').value;

    const formData = new FormData();
    formData.append('prod_id', prodId);
    formData.append('new_name', newName);
    formData.append('new_category', newCategory);
    formData.append('new_desc', newDesc);
    formData.append('new_price', newPrice);

    fetch('update_product.php', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (response.ok) {
            window.location.reload();
        } else {
            console.error('Update failed');
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

// Function to cancel edit
function cancelEdit() {
    const editForm = document.querySelector('.edit-form');
    if (editForm) {
        editForm.remove();
    }
}
