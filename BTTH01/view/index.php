<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        /* CSS styles for the product table */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color:cyan;
        }
        /* CSS styles for the form */
        form {
            width: 50%;
            margin: auto;
            text-align: center;
        }
        form input {
            width: 100%;
            margin: 10px 0;
            padding: 10px;
            box-sizing: border-box;
        }
        .button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .button:hover {
            background-color: #3e8e41;
        }
        .edit-btn {
            background-color: #2196F3;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .edit-btn:hover {
            background-color: #0a63a2;
        }
        .delete-btn {
            background-color: #f44336;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .delete-btn:hover {
            background-color: #9b2020;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;color: blue;">Student Management</h1>
    <table id="product-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>age</th>
                <th>grade</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <h2 style="color: blue;">ADD</h2>
    <form id="product-form">
        <input type="hidden" id="product-id">
        <label for="product-name">Name:</label>
        <input type="text" id="product-name" required>
        <label for="product-price">Age:</label>
        <!-- <input type="hidden" id="product-age"> -->
        <!-- <label for="product-age">Age:</label> -->
        <input type="text" id="product-age" required>
        <label for="product-grade">Grade:</label>
        <input type="number" id="product-grade" required>
        <button class="button" id="save-button" type="submit">Save</button>
        <button class="button" id="cancel-button" type="button">Cancel</button>
    </form>
    <script>
        // Load products from localStorage on page load
        function loadProducts() {
            const productList = JSON.parse(localStorage.getItem('products'));
            if (productList) {
                productList.forEach((product, index) => {
                    addProductToTable(product, index);
                });
            }
        }
        // Add a new product to the table
        function addProductToTable(product, index) {
            const table = document.getElementById('product-table').getElementsByTagName('tbody')[0];
            const newRow = table.insertRow();

            const idCell = newRow.insertCell(0);
            idCell.innerHTML = index;

            const nameCell = newRow.insertCell(1);
            nameCell.innerHTML = product.name;

            const ageCell = newRow.insertCell(2);
            ageCell.innerHTML = product.age;

            const gradeCell = newRow.insertCell(3);
            gradeCell.innerHTML = product.grade;

            const actionCell = newRow.insertCell(4);
            const editBtn = document.createElement('button');
            editBtn.innerHTML = 'Edit';
            editBtn.className = 'edit-btn';
            editBtn.addEventListener('click', () => {
                editProduct(index);
            });
            actionCell.appendChild(editBtn);

            const deleteBtn = document.createElement('button');
            deleteBtn.innerHTML = 'Delete';
            deleteBtn.className = 'delete-btn';
            deleteBtn.addEventListener('click', () => {
                deleteProduct(index);
            });
            actionCell.appendChild(deleteBtn)
        }
        // Remove all products from the table
        function clearProductTable() {
            const table = document.getElementById('product-table').getElementsByTagName('tbody')[0];
            while (table.rows.length > 0) {
                table.deleteRow(0);
            }
        }
        // Clear the form input fields
        function clearForm() {
            document.getElementById('product-id').value = '';
            document.getElementById('product-name').value = '';
            document.getElementById('product-age').value = '';
            document.getElementById('product-grade').value = '';
        }
        // Save a new product or update an existing one
        function saveProduct() {
            const productId = document.getElementById('product-id').value;
            const productName = document.getElementById('product-name').value;
            const productAge = document.getElementById('product-age').value;
            const productGrade = document.getElementById('product-grade').value;
            const productList = JSON.parse(localStorage.getItem('products')) || [];

            if (productId) {
                // Update existing product
                productList[productId].name = productName;
                productList[productId].age = productAge;
                productList[productId].grade = productGrade;
            } else {
                // Add new product
                const newProduct = {
                    name: productName,
                    age: productAge,
                    grade:productGrade
                };
                productList.push(newProduct);
            }

            localStorage.setItem('products', JSON.stringify(productList));

            clearForm();
            clearProductTable();
            loadProducts();
        }
        // Edit an existing product
        function editProduct(index) {
            const productList = JSON.parse(localStorage.getItem('products'));
            const product = productList[index];

            document.getElementById('product-id').value = index;
            document.getElementById('product-name').value = product.name;
            document.getElementById('product-age').value = product.age;
            document.getElementById('product-grade').value = product.grade;

            document.getElementById('save-button').innerHTML = 'Update';
        }
        // Delete a product
        function deleteProduct(index) {
            const productList = JSON.parse(localStorage.getItem('products'));
            productList.splice(index, 1);
            localStorage.setItem('products', JSON.stringify(productList));

            clearForm();
            clearProductTable();
            loadProducts();
        }
        // Event listeners for form submission and cancel button
        document.getElementById('product-form').addEventListener('submit', (event) => {
            event.preventDefault();
            saveProduct();
        });

        document.getElementById('cancel-button').addEventListener('click', () => {
            clearForm();
            document.getElementById('save-button').innerHTML = 'Save';
        });

        loadProducts();
    </script>     
    </body>
</html>
