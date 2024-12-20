<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product vs Price Line Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom right, #f4f7fc, #d9e4f5);
            color: #333;
        }

        h1 {
            text-align: center;
            margin: 20px 0;
        }

        .chart-container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <h1>Product vs Price Line Chart</h1>
    <div class="chart-container">
        <canvas id="productPriceChart"></canvas>
    </div>

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

    // Fetch product and price data
    $sql = "SELECT name, price FROM product";
    $result = $conn->query($sql);

    $products = [];
    $prices = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $products[] = $row['name'];
            $prices[] = $row['price'];
        }
    }

    $conn->close();
    ?>

    <script>
        const productNames = <?php echo json_encode($products); ?>;
        const productPrices = <?php echo json_encode($prices); ?>;

        const ctx = document.getElementById('productPriceChart').getContext('2d');
        const productPriceChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: productNames,
                datasets: [{
                    label: 'Price of Products',
                    data: productPrices,
                    borderColor: '#007BFF',
                    backgroundColor: 'rgba(0, 123, 255, 0.1)',
                    borderWidth: 2,
                    tension: 0.4,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top'
                    },
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Products',
                            color: '#333',
                            font: {
                                size: 14
                            }
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Price',
                            color: '#333',
                            font: {
                                size: 14
                            }
                        },
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
