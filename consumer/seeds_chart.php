<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seeds Inventory Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f8fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .chart-container {
            width: 90%;  /* Adjust width to be responsive */
            max-width: 900px;  /* Limit max width */
            height: 500px;  /* Fixed height for better chart control */
            background: #fff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h1 {
            text-align: center;
            color: #444;
            margin-bottom: 20px;
        }
        canvas {
            width: 100% !important;  /* Make the canvas take full width of container */
            height: 100% !important; /* Make the canvas take full height of container */
        }
    </style>
</head>
<body>
    <div class="chart-container">
        <h1>Seeds Inventory: Quantity per Name</h1>
        <canvas id="seedsChart"></canvas>
    </div>

    <?php
    // Database connection
    $host = "localhost"; // Update with your DB host
    $username = "root"; // Update with your DB username
    $password = ""; // Update with your DB password
    $database = "admin"; // Update with your DB name

    $conn = new mysqli($host, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch seeds data
    $sql = "SELECT `name`, `quantity` FROM `seeds`";
    $result = $conn->query($sql);

    $names = [];
    $quantities = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $names[] = $row['name'];
            $quantities[] = $row['quantity'];
        }
    }

    $conn->close();
    ?>

    <script>
        // Pass PHP data to JavaScript
        const seedNames = <?php echo json_encode($names); ?>;
        const seedQuantities = <?php echo json_encode($quantities); ?>;

        // Render the line chart using Chart.js
        const ctx = document.getElementById('seedsChart').getContext('2d');
        const seedsChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: seedNames,
                datasets: [{
                    label: 'Quantity',
                    data: seedQuantities,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,  // Ensures the chart is responsive
                maintainAspectRatio: false,  // Allows resizing of the chart
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Seed Name'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Quantity'
                        },
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
