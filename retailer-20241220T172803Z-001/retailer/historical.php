<?php
// Database connection
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'admin';

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data
$sql = "SELECT product_name, price, date FROM historical_prices ORDER BY date";
$result = $conn->query($sql);

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[$row['product_name']][] = [
        'price' => $row['price'],
        'date' => $row['date']
    ];
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Price Bar Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .chart-container {
            width: 90%;
            max-width: 1000px;
            height: 80vh; /* Makes the chart container taller */
            padding: 20px;
            box-sizing: border-box;
        }
        canvas {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="chart-container">
        <canvas id="barChart"></canvas>
    </div>

    <script>
        // PHP Data to JavaScript
        const data = <?php echo json_encode($data); ?>;

        // Organize Data for Chart.js
        const labels = [];
        const datasets = [];
        const colors = ['#6a8caf', '#f76c6c', '#6cf7a8']; // Aesthetic colors for products

        Object.keys(data).forEach((product, index) => {
            const productData = data[product];
            const prices = productData.map(item => item.price);
            const dates = productData.map(item => item.date);

            // Add dates only once
            if (labels.length === 0) {
                dates.forEach(date => {
                    if (!labels.includes(date)) labels.push(date);
                });
            }

            // Add dataset for this product
            datasets.push({
                label: product,
                data: prices,
                backgroundColor: colors[index % colors.length],
                borderColor: colors[index % colors.length],
                borderWidth: 1
            });
        });

        // Chart.js Configuration
        const ctx = document.getElementById('barChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: datasets
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top'
                    },
                    tooltip: {
                        callbacks: {
                            label: (context) => {
                                return `${context.dataset.label}: $${context.raw}`;
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: false
                        },
                        title: {
                            display: true,
                            text: 'Date',
                            font: {
                                size: 14
                            }
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Price (USD)',
                            font: {
                                size: 14
                            }
                        },
                        ticks: {
                            beginAtZero: true
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>
