<?php
// Database connection details
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'admin';

// Create a connection to the database
$conn = new mysqli($host, $user, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch inventory data
$sql = "SELECT `name`, `qty` FROM `inventory` WHERE 1";
$result = $conn->query($sql);

// Arrays to store the inventory names and quantities
$names = [];
$quantities = [];

if ($result->num_rows > 0) {
    // Fetch the data and store it in arrays
    while ($row = $result->fetch_assoc()) {
        $names[] = $row['name'];
        $quantities[] = $row['qty'];
    }
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Line Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            width: 90%;
            max-width: 1000px;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
        }
        h1 {
            text-align: center;
            color: #333;
            font-size: 2.5rem;
            margin-bottom: 20px;
        }
        canvas {
            display: block;
            margin: 0 auto;
            background-color: #ffffff;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Inventory Data - Line Chart</h1>
        <canvas id="lineChart"></canvas>
    </div>

    <script>
        // PHP variables passed into JavaScript
        const inventoryNames = <?php echo json_encode($names); ?>;
        const inventoryQuantities = <?php echo json_encode($quantities); ?>;

        // Chart.js configuration
        const ctx = document.getElementById('lineChart').getContext('2d');
        const lineChart = new Chart(ctx, {
            type: 'line', // Line chart
            data: {
                labels: inventoryNames, // X-axis labels (product names)
                datasets: [{
                    label: 'Inventory Quantities', // Label for the line
                    data: inventoryQuantities, // Y-axis data (quantities)
                    borderColor: '#3498db', // Line color
                    backgroundColor: 'rgba(52, 152, 219, 0.2)', // Fill color
                    borderWidth: 3,
                    fill: true, // Fill area under the line
                    tension: 0.4, // Smooth the line
                    pointBackgroundColor: '#2980b9', // Color of points
                    pointRadius: 6, // Larger points
                    pointHoverBackgroundColor: '#2980b9', // Hover effect for points
                    pointHoverRadius: 8, // Hover effect for point size
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        grid: {
                            color: '#e0e0e0', // Light grid for x-axis
                        },
                        ticks: {
                            font: {
                                size: 12, // Font size for x-axis labels
                                family: 'Arial, sans-serif', // Font family
                            },
                        },
                    },
                    y: {
                        grid: {
                            color: '#e0e0e0', // Light grid for y-axis
                        },
                        ticks: {
                            font: {
                                size: 12, // Font size for y-axis labels
                                family: 'Arial, sans-serif', // Font family
                            },
                            beginAtZero: true,
                        }
                    }
                },
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            font: {
                                size: 14, // Font size for legend
                                family: 'Arial, sans-serif', // Font family
                            },
                        },
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return context.dataset.label + ': ' + context.raw; // Format tooltips
                            }
                        }
                    }
                },
                interaction: {
                    mode: 'index', // Enable interactive mode
                    intersect: false,
                },
            }
        });
    </script>

</body>
</html>
