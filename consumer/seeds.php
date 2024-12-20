<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
    <!-- Css Link -->
     <link rel="stylesheet" href="./main.css">
     <!-- Icons Library link -->
     <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

  
<body class="flex">

  <div class="main">
    <div class="sideMenu ">

      <div class="logoDiv flex">
        <div class="logoImage">
          <img src="./assets/images/logo.png" alt="Logo Image">
        </div>

      </div>
    
      <div class="menuList">
        <ul>
    
        <a href="dashboard.php">
        <li class="list">
          <i class="uil uil-analytics icon"></i>
          <span class="listName">Dashboard</span>
        </li>
       </a>

     <a href="product.php">
      <li class="list ">
        <i class="uil uil-pizza-slice icon"></i>
        <span class="listName">Products</span>
      </li>
     </a>

     <a href="sales_data.php">
      <li class="list ">
        <i class="uil uil-pizza-slice icon"></i>
        <span class="listName">Sales</span>
      </li>
     </a>

     <a href="demand_data.php">
          <li class="list ">
            <i class="uil uil-user-check icon"></i>
            <span class="listName">Demand</span>
          </li>
         </a>
         
         <a href="market_trend.php">
          <li class="list ">
            <i class="uil uil-user-check icon"></i>
            <span class="listName">Market Trend</span>
          </li>
         </a>

         <a href="price_history.php">
          <li class="list ">
            <i class="uil uil-user-check icon"></i>
            <span class="listName">Pricing</span>
          </li>
         </a>

     <a href="customers.php">
      <li class="list ">
        <i class="uil uil-user-check icon"></i>
        <span class="listName">Users</span>
      </li>
     </a>

     <a href="feedback.php">
      <li class="list">
        <i class="uil uil-shopping-cart-alt icon"></i>
        <span class="listName">Feedback</span>
      </li>
     </a>



     <a href="seeds.php">
      <li class="list">
        <i class="uil uil-car-sideview icon"></i>
        <span class="listName">Seeds</span>
      </li>
     </a>

     <a href="inventory.php">
      <li class="list">
        <i class="uil uil-swatchbook icon"></i>
        <span class="listName">Inventory</span>
      </li>
     </a>
    
         
    
        </ul>
      </div>
    </div>

      <div class="mainContent">
        <div class="topSection flex">
          <div class="seacrchBox flex">
            <i class="uil uil-search icon"></i>
            <input type="text" placeholder=" Search...">
            <i class="uil uil-microphone icon"></i>
          </div>

          <div class="userBox flex">
            <a href="index.html">
              <div class="adminImage">
                <img src="./assets/images/pp.jpg" alt="Admin Image">
              </div>
            </a>
          <div class="userName">
            <span>Admin</span>
          <small>AgriMesh</small>
          </div>
          <i class="uil uil-bell icon"></i>
          </div>
        </div>

        <div class="body">
        <div class="overViewDiv">
           <div class="intro flex" >
             <h3 class="title">Seeds Data</h3>
            <div class="addBtn">
              <a href="seeds_chart.php">
                <span>View Chart</span>
              </a>
            </div>
           </div>
          </div>
          <div class="mainItems">
          <h2>Seeds Inventory</h2>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Variety</th>
                    <th>Seasonality</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
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
                $sql = "SELECT `id`, `name`, `type`, `variety`, `seasonality`, `quantity` FROM `seeds`";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['name']}</td>
                                <td>{$row['type']}</td>
                                <td>{$row['variety']}</td>
                                <td>{$row['seasonality']}</td>
                                <td>{$row['quantity']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No data available</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <div class="form-container">
        <h1>Add Seeds</h1>
        <?php
        // Handle form submission
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $host = "localhost"; // Update with your DB host
            $username = "root"; // Update with your DB username
            $password = ""; // Update with your DB password
            $database = "admin"; // Update with your DB name

            // Connect to the database
            $conn = new mysqli($host, $username, $password, $database);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Get form data
            $name = $conn->real_escape_string($_POST["name"]);
            $type = $conn->real_escape_string($_POST["type"]);
            $variety = $conn->real_escape_string($_POST["variety"]);
            $seasonality = $conn->real_escape_string($_POST["seasonality"]);
            $quantity = (int)$_POST["quantity"];

            // Insert data into the database
            $sql = "INSERT INTO `seeds` (`name`, `type`, `variety`, `seasonality`, `quantity`) 
                    VALUES ('$name', '$type', '$variety', '$seasonality', $quantity)";
            if ($conn->query($sql) === TRUE) {
                echo "<p class='success'>Seed added successfully!</p>";
            } else {
                echo "<p class='error'>Error: " . $conn->error . "</p>";
            }

            $conn->close();
        }
        ?>
        <form method="POST" action="">
            <label for="name">Seed Name</label>
            <input type="text" id="name" name="name" placeholder="Enter seed name" required>
            
            <label for="type">Type</label>
            <input type="text" id="type" name="type" placeholder="Enter type (e.g., Grain, Vegetable)" required>
            
            <label for="variety">Variety</label>
            <input type="text" id="variety" name="variety" placeholder="Enter variety (e.g., Cherry, Sweet)" required>
            
            <label for="seasonality">Seasonality</label>
            <input type="text" id="seasonality" name="seasonality" placeholder="Enter seasonality (e.g., Summer, Winter)" required>
            
            <label for="quantity">Quantity</label>
            <input type="number" id="quantity" name="quantity" placeholder="Enter quantity" min="1" required>
            
            <button type="submit">Add Seed</button>
        </form>
    </div>
    <style>
        
        .form-container {
            background: #fff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            width: 400px;
            margin-top: 10px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #444;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            font-weight: normal;
            margin-bottom: 5px;
        }
        input, select, button {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #459a7d;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .success, .error {
            text-align: center;
            margin-top: 10px;
            font-weight: bold;
        }
        .success {
            color: #28a745;
        }
        .error {
            color: #dc3545;
        }
    </style>

    <style>
       ;
        
        h1 {
            text-align: center;
            margin-top: 20px;
            color: #444;
        }
        .table-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        table {
            border-collapse: collapse;
            width: 90%;
            max-width: 1000px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        th, td {
            text-align: center;
            padding: 12px;
            border: 1px solid #ccc;
        }
        th {
            background-color: #459a7d;
            color: white;
            
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
    </style>

    
          </div>
          
        </div>
      </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
  <script src="./chart.js"></script>
  
  </body>
  </html>