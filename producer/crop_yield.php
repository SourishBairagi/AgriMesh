<?php
// Database connection
$host = 'localhost'; // Change as per your server configuration
$user = 'root'; // Database username
$password = ''; // Database password
$database = 'admin'; // Database name

$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch crop yield data
$sql = "SELECT crop_name, yield_qty, supply_date FROM crop_yield";
$result = $conn->query($sql);

$cropData = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $cropData[] = $row;
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crop Yield Line Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h1 {
            text-align: center;
            font-size: 1.8rem;
            color: #333;
        }
        canvas {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Crop Yield Line Chart</h1>
        <canvas id="cropYieldChart"></canvas>
    </div>

    <script>
        // PHP data to JavaScript
        const cropData = <?php echo json_encode($cropData); ?>;

        // Extract data for the chart
        const cropNames = cropData.map(data => data.crop_name);
        const yieldQuantities = cropData.map(data => data.yield_qty);
        const supplyDates = cropData.map(data => data.supply_date);

        // Create the chart
        const ctx = document.getElementById('cropYieldChart').getContext('2d');
        const cropYieldChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: supplyDates,
                datasets: [{
                    label: 'Crop Yield (kg)',
                    data: yieldQuantities,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderWidth: 2,
                    tension: 0.4,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                    }
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Supply Date',
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Yield Quantity (kg)',
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>
