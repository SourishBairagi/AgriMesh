<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Data Chart</title>
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
        .chart-container {
            position: relative;
            height: 400px;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Sales Data Chart</h1>

        <div class="chart-container">
            <canvas id="salesChart"></canvas>
        </div>

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
        $sql = "SELECT product_id, name, SUM(quantity) AS total_quantity, SUM(quantity * price) AS total_sales
                FROM sales
                GROUP BY product_id";
        $result = $conn->query($sql);

        // Prepare data for Chart.js
        $productNames = [];
        $totalQuantities = [];
        $totalSales = [];

        while ($row = $result->fetch_assoc()) {
            $productNames[] = $row['name']; // Collect product names
            $totalQuantities[] = $row['total_quantity']; // Collect total quantity sold for each product
            $totalSales[] = $row['total_sales']; // Collect total sales amount for each product
        }

        // Close the database connection
        $conn->close();
        ?>

        <!-- Pass PHP data to JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            // Data passed from PHP
            var productNames = <?php echo json_encode($productNames); ?>;
            var totalQuantities = <?php echo json_encode($totalQuantities); ?>;
            var totalSales = <?php echo json_encode($totalSales); ?>;

            // Create the chart
            var ctx = document.getElementById('salesChart').getContext('2d');
            var salesChart = new Chart(ctx, {
                type: 'bar', // Bar chart
                data: {
                    labels: productNames, // Labels (Product Names)
                    datasets: [{
                        label: 'Total Quantity Sold',
                        data: totalQuantities, // Data for Total Quantity Sold
                        backgroundColor: 'rgba(54, 162, 235, 0.6)', // Blue color
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Total Sales ($)',
                        data: totalSales, // Data for Total Sales
                        backgroundColor: 'rgba(255, 99, 132, 0.6)', // Red color
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true // Ensure the y-axis starts at zero
                        }
                    }
                }
            });
        </script>
    </div>
</body>
</html>
