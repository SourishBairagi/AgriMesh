<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Table with Edit Functionality</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            background: linear-gradient(to bottom right, #f4f7fc, #d9e4f5);
        }

        h1, h2 {
            text-align: center;
            color: #333;
        }

        form {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        form input, form button {
            width: calc(100% - 20px);
            margin: 10px auto;
            display: block;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        form input:focus {
            border-color: #007BFF;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        form button {
            background-color: #007BFF;
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        form button:hover {
            background-color: #0056b3;
        }

        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px 15px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
            color: #333;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .actions {
            display: flex;
            gap: 5px;
        }

        button {
            padding: 8px 12px;
            font-size: 14px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button.delete {
            background-color: #DC3545;
            color: white;
        }

        button.delete:hover {
            background-color: #a71d2a;
        }

        button.edit {
            background-color: #FFC107;
            color: white;
        }

        button.edit:hover {
            background-color: #e0a800;
        }

        .no-products {
            text-align: center;
            color: #666;
            font-style: italic;
        }

        h1 {
    font-family: 'Arial', sans-serif;
    font-size: 2.5rem;
    font-weight: bold;
    text-align: center; 
    color: #333; 
    margin: 20px 0; 
    text-transform: uppercase; 
    letter-spacing: 2px;
}
    </style>
</head>
<body>
    <h1>Product Management</h1>

    <?php
    // Database configuration
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "admin";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Handle add product
    if (isset($_POST['add'])) {
        $type = $_POST['type'];
        $name = $_POST['name'];
        $variety = $_POST['variety'];
        $seasonality = $_POST['seasonality'];
        $price = $_POST['price'];

        $sql = "INSERT INTO product (type, name, variety, seasonality, price) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssd", $type, $name, $variety, $seasonality, $price);
        $stmt->execute();
        $stmt->close();

        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }

    // Handle delete product
    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];

        $sql = "DELETE FROM product WHERE product_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();

        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }

    // Handle edit product
    if (isset($_POST['edit'])) {
        $id = $_POST['product_id'];
        $type = $_POST['type'];
        $name = $_POST['name'];
        $variety = $_POST['variety'];
        $seasonality = $_POST['seasonality'];
        $price = $_POST['price'];

        $sql = "UPDATE product SET type = ?, name = ?, variety = ?, seasonality = ?, price = ? WHERE product_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssdi", $type, $name, $variety, $seasonality, $price, $id);
        $stmt->execute();
        $stmt->close();

        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }

    // Fetch product to edit
    $editProduct = null;
    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];

        $sql = "SELECT * FROM product WHERE product_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $editProduct = $result->fetch_assoc();
        $stmt->close();
    }
    ?>

    <?php if ($editProduct): ?>
        <h2>Edit Product</h2>
        <form action="" method="post">
            <input type="hidden" name="product_id" value="<?php echo $editProduct['product_id']; ?>">
            <input type="text" name="type" value="<?php echo $editProduct['type']; ?>" required>
            <input type="text" name="name" value="<?php echo $editProduct['name']; ?>" required>
            <input type="text" name="variety" value="<?php echo $editProduct['variety']; ?>" required>
            <input type="text" name="seasonality" value="<?php echo $editProduct['seasonality']; ?>" required>
            <input type="number" step="0.01" name="price" value="<?php echo $editProduct['price']; ?>" required>
            <button type="submit" name="edit">Update Product</button>
        </form>
    <?php else: ?>
        <h2>Add Product</h2>
        <form action="" method="post">
            <input type="text" name="type" placeholder="Type" required>
            <input type="text" name="name" placeholder="Name" required>
            <input type="text" name="variety" placeholder="Variety" required>
            <input type="text" name="seasonality" placeholder="Seasonality" required>
            <input type="number" step="0.01" name="price" placeholder="Price" required>
            <button type="submit" name="add">Add Product</button>
        </form>
    <?php endif; ?>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Type</th>
                <th>Name</th>
                <th>Variety</th>
                <th>Seasonality</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Fetch all products
            $sql = "SELECT * FROM product";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['product_id'] . "</td>";
                    echo "<td>" . $row['type'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['variety'] . "</td>";
                    echo "<td>" . $row['seasonality'] . "</td>";
                    echo "<td>" . number_format($row['price'], 2) . "</td>";
                    echo "<td class='actions'>";
                    echo "<a href='?edit=" . $row['product_id'] . "'><button class='edit'>Edit</button></a>";
                    echo "<a href='?delete=" . $row['product_id'] . "'><button class='delete'>Delete</button></a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7' class='no-products'>No products found</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>
</body>
</html>
