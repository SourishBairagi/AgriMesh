<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f8fa;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 1000px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h1 {
            text-align: center;
            color: #444;
            margin-bottom: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .total {
            font-weight: bold;
            text-align: right;
        }
        .total-price {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Sales Data</h1>

        <?php
        // Database connection parameters
        $host = "localhost"; // Update with your DB host
        $username = "root"; // Update with your DB username
        $password = ""; // Update with your DB password
        $database = "admin"; // Update with your DB name

        // Create connection
        $conn = new mysqli($host, $username, $password, $database);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Query to fetch sales data
        $sql = "SELECT id, product_id, type, name, variety, seasonality, quantity, price, date, (quantity * price) AS total_price 
                FROM sales";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<thead>
                    <tr>
                        <th>Sale ID</th>
                        <th>Product ID</th>
                        <th>Type</th>
                        <th>Name</th>
                        <th>Variety</th>
                        <th>Seasonality</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Date</th>
                    </tr>
                  </thead>";
            echo "<tbody>";

            $total_sales = 0; // Initialize total sales

            while ($row = $result->fetch_assoc()) {
                $total_sales += $row['total_price']; // Calculate total sales
                echo "<tr>
                        <td>" . $row['id'] . "</td>
                        <td>" . $row['product_id'] . "</td>
                        <td>" . $row['type'] . "</td>
                        <td>" . $row['name'] . "</td>
                        <td>" . $row['variety'] . "</td>
                        <td>" . $row['seasonality'] . "</td>
                        <td>" . $row['quantity'] . "</td>
                        <td>" . number_format($row['price'], 2) . "</td>
                        <td>" . number_format($row['total_price'], 2) . "</td>
                        <td>" . $row['date'] . "</td>
                      </tr>";
            }
            echo "</tbody>";
            echo "</table>";

            // Display total sales
            echo "<p class='total'>Total Sales: <span class='total-price'>" . number_format($total_sales, 2) . "</span></p>";

        } else {
            echo "<p>No sales data available.</p>";
        }

        // Close the database connection
        $conn->close();
        ?>

    </div>
</body>
</html>
