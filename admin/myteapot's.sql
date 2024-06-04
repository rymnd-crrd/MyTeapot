--
-- FOR CRUD
--
// Insert operation 
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['insert'])) {
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Escape user inputs to prevent SQL injection
    $uname = mysqli_real_escape_string($con, $uname);
    $email = mysqli_real_escape_string($con, $email);
    $password = mysqli_real_escape_string($con, $password);

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO users (name, email, password) VALUES ('$uname', '$email', '$hashed_password')";

    if (mysqli_query($con, $query)) {
        $_SESSION['success_message'] = "User added successfully!";
        header('Location: crud.php'); // Redirect to the CRUD page after insertion
        exit();
    } else {
        $_SESSION['error_message'] = "Error adding user: " . mysqli_error($con);
    }
}

// Read operation - Fetch all users
$query = "SELECT * FROM users";
$result = mysqli_query($con, $query);

// Update operation
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['update'])) {
    $userid = $_POST['userid'];
    $newName = $_POST['new_name'];
    $newEmail = $_POST['new_email'];

    $updateQuery = "UPDATE users SET name='$newName', email='$newEmail' WHERE id='$userid'";
    if (mysqli_query($con, $updateQuery)) {
        $_SESSION['success_message'] = "User updated successfully!";
        echo json_encode(['success' => true, 'message' => 'User updated successfully']);
        exit();
    } else {
        $_SESSION['error_message'] = "Error updating user: " . mysqli_error($con);
        echo json_encode(['success' => false, 'message' => 'Error updating user']);
        exit();
    }
}

// Delete operation
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['delete'])) {
    $userid = $_POST['userid'];

    $deleteQuery = "DELETE FROM users WHERE id='$userid'";
    if (mysqli_query($con, $deleteQuery)) {
        $_SESSION['success_message'] = "User deleted successfully!";
        header('Location: crud.php'); // Redirect after deletion
        exit();
    } else {
        $_SESSION['error_message'] = "Error deleting user: " . mysqli_error($con);
    }
}

-- Function to show edit form
function showEditForm(userId, name, email) {
    const editForm = document.createElement('form');
    editForm.classList.add('edit-form');
    editForm.innerHTML = `
        <div class="edit-form-container">
            <h4>Edit User</h4>
            <label for="new_name">Name</label>
            <input type="text" id="new_name" name="new_name" value="${name}" required>
            <label for="new_email">Email</label>
            <input type="email" id="new_email" name="new_email" value="${email}" required>
            <div class="edit-form-buttons">
                <button type="button" onclick="updateUser(${userId})">Update</button>
                <button type="button" onclick="cancelEdit()">Cancel</button>
            </div>
        </div>
    `;
    
    // Append the edit form to the main content
    const mainContent = document.querySelector('.content');
    mainContent.appendChild(editForm);
}

// Function to update user data
function updateUser(userId) {
    const newName = document.getElementById('new_name').value;
    const newEmail = document.getElementById('new_email').value;

    fetch('crud.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `update=true&userid=${userId}&new_name=${newName}&new_email=${newEmail}`,
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Display success message and reload the page
            alert(data.message);
            location.reload();
        } else {
            // Display error message
            alert(data.message);
        }
    })
    .catch(error => console.error('Error:', error));
}

// Function to cancel editing and remove the edit form
function cancelEdit() {
    const editForm = document.querySelector('.edit-form');
    if (editForm) {
        editForm.remove();
    }
}



--
-- FOR PRODUCT
--
// Insert operation
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['insert'])) {
    // Retrieve product details from the form
    $prod_name = $_POST['prod_name'];
    $prod_category = $_POST['prod_category'];
    $prod_desc = $_POST['prod_desc'];
    $prod_price = $_POST['prod_price'];

    // Escape user inputs to prevent SQL injection
    $prod_name = mysqli_real_escape_string($con, $prod_name);
    $prod_category = mysqli_real_escape_string($con, $prod_category);
    $prod_desc = mysqli_real_escape_string($con, $prod_desc);
    $prod_price = mysqli_real_escape_string($con, $prod_price);

    // Insert product into the database
    $insertQuery = "INSERT INTO products (prod_name, prod_category, prod_desc, prod_price) VALUES ('$prod_name', '$prod_category', '$prod_desc', '$prod_price')";
    if (mysqli_query($con, $insertQuery)) {
        $_SESSION['success_message'] = "Product added successfully!";
        header('Location: product.php'); // Redirect to the product page after insertion
        exit();
    } else {
        $_SESSION['error_message'] = "Error adding product: " . mysqli_error($con);
    }
}

// Read operation - Fetch all products
$query = "SELECT prod_id, prod_name, prod_category, prod_desc, prod_price FROM products";
$result = mysqli_query($con, $query);


// Update operation
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['update'])) {
    $prod_id = $_POST['prod_id'];
    $newName = $_POST['new_name'];
    $newCategory = $_POST['new_category'];
    $newDesc = $_POST['new_desc'];
    $newPrice = $_POST['new_price'];

    // Prepare the update query
    $updateQuery = "UPDATE `products` 
                    SET `prod_name`='$newName', 
                        `prod_category`='$newCategory', 
                        `prod_desc`='$newDesc', 
                        `prod_price`='$newPrice' 
                    WHERE `prod_id`='$prod_id'";

    // Execute the update query
    if (mysqli_query($con, $updateQuery)) {
        $_SESSION['success_message'] = "Product updated successfully!";
        header('Location: product.php'); // Redirect to the product page after update
        exit();
    } else {
        $_SESSION['error_message'] = "Error updating product: " . mysqli_error($con);
    }
}

// Delete operation
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['delete'])) {
    // Get product ID from form
    $prod_id = $_POST['prod_id'];

    // Delete query
    $deleteQuery = "DELETE FROM products WHERE `prod_id`='$prod_id'";

    // Perform delete query
    if (mysqli_query($con, $deleteQuery)) {
        // If deletion successful, redirect with success message
        $_SESSION['success_message'] = "Product deleted successfully!";
        header('Location: product.php');
        exit();
    } else {
        // If deletion fails, set error message
        $_SESSION['error_message'] = "Error deleting product: " . mysqli_error($con);
    }
}

-- Function to show edit form for products
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


--
-- FOR REGISTER
--
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password != $confirm_password) {
        $_SESSION['error_message'] = "Passwords do not match";
        header('Location: register.php'); // Redirect back to the registration page
        exit();
    }

    // Escape user inputs to prevent SQL injection
    $uname = mysqli_real_escape_string($con, $uname);
    $email = mysqli_real_escape_string($con, $email);
    $password = mysqli_real_escape_string($con, $password);

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO users (name, email, password) VALUES ('$uname', '$email', '$hashed_password')";

    if (mysqli_query($con, $query)) {
        $_SESSION['success_message'] = "Registration successful!";
        header('Location: index.php'); // Redirect to the login page or any other page after successful registration
        exit();
    } else {
        $_SESSION['error_message'] = "Error registering user: " . mysqli_error($con);
        header('Location: register.php'); // Redirect back to the registration page
        exit();
    }
}