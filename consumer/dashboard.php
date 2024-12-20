<?php
// Database connection
$host = "localhost"; // Update with your database host
$username = "root"; // Update with your database username
$password = ""; // Update with your database password
$database = "admin"; // Update with your database name

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch product demand data
$sql = "SELECT name, SUM(quantity) AS demand FROM sales GROUP BY name ORDER BY name ASC";
$result = $conn->query($sql);

$products = [];
$demand = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row['name'];
        $demand[] = $row['demand'];
    }
}

$conn->close();
?>

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

   

     <a href="feedback.php">
      <li class="list">
        <i class="uil uil-shopping-cart-alt icon"></i>
        <span class="listName">Feedback</span>
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
             <h3 class="title">Overview</h3>
             <div class="flex">
              <div class="iconDiv">
                <i class="uil uil-toggle-off icon toggleIcon"></i>
              </div>
              <select name="" id="select">
                <option value="Today">Today</option>
                <option value="Monday">Monday</option>
                <option value="Tuesday">Tuesday</option>
                <option value="Wednesday">Wednesday</option>
                <option value="Thursday">Thursday</option>
                <option value="Friday">Friday</option>
                <option value="Saturday">Saturday</option>
                <option value="Sunday">Sunday</option>
              </select>
             </div>
           </div>
          </div>
          
          <div class="analysisDiv grid">
                  <div class="card">

                    <div class="cartTitle flex">
                      <i class="uil uil-pizza-slice icon"></i>
                      <span>Products</span>
                      <h1>14</h1>
                    </div>

                    <div class="cardBody">
                      <h2>৳4,520
                        <span class="percentage">Sales
                          <i class="uil uil-arrow-up icon"></i>
                        </span>
                      </h2>
                    </div>

                    <small>Compared to (৳1,455 last year!)</small>
                  </div>
                  <div class="card">

                    <div class="cartTitle flex">
                      <i class="uil uil-user-check icon"></i>
                      <span>Customers</span>
                      <h1>25</h1>
                    </div>

                    <div class="cardBody">
                      <h2>৳2,590
                        <span class="percentage">Paid
                          <i class="uil uil-arrow-up icon"></i>
                        </span>
                      </h2>
                    </div>

                    <small>Compared to (12 last year!)</small>
                  </div>
                  <div class="card active ">

                    <div class="cartTitle flex">
                      <i class="uil uil-shopping-bag icon"></i>
                      <span>Orders</span>
                      <h1>14</h1>
                    </div>

                    <div class="cardBody">
                      <h2>৳5,590
                        <span class="percentage negativeNumber">-4%
                          <i class="uil uil-arrow-down icon negativeNumber"></i>
                        </span>
                      </h2>
                    </div>

                    <small>Compared to (৳3,455 last year!)</small>
                  </div>
                  <div class="card">

                    <div class="cartTitle flex">
                      <i class="uil uil-chart-growth icon"></i>
                      <span>Net Sales</span>
                      <h1>25th</h1>
                    </div>

                    <div class="cardBody">
                      <h2>৳5,020
                        <span class="percentage  negativeNumber">-2%
                          <i class="uil uil-arrow-down icon negativeNumber"></i>
                        </span>
                      </h2>
                    </div>

                    <small>Compared to (৳5,455 last year!)</small>
                  </div>
                  
          </div>

           <div class="graphDiv_foodDiv_deliveryBoyDiv grid">
             <div class="graphDiv">
              <div class="intro flex" >
                <h3 class="title">Overview</h3>
                <select name="" id="select">
                  <option value="Today">Today</option>
                  <option value="Monday">Monday</option>
                  <option value="Tuesday">Tuesday</option>
                  <option value="Wednesday">Wednesday</option>
                  <option value="Thursday">Thursday</option>
                  <option value="Friday">Friday</option>
                  <option value="Saturday">Saturday</option>
                  <option value="Sunday">Sunday</option>
                </select>
              </div>
              <canvas id="line" width="200px" height="90px"></canvas>
             </div>
             
             <div class="foodDiv_deliveryBoyDiv grid">
               <div class="foodDiv">
                  <div class="intro" >
                  <h3 class="title">Popular Products</h3>
                  </div>

                  <div class="foodItem flex">
                    <img src="./assets/images/food (1).png" alt="Food Image">
                    <div class="imgText">
                      <span class="imageName">
                        Organic Veggies 
                      </span>
                      <small>234 customers purchased</small>
                    </div>
                  </div>
                  <div class="foodItem flex">
                    <img src="./assets/images/food (2).png" alt="Food Image">
                    <div class="imgText">
                      <span class="imageName">
                        FreshFarm Fruits
                      </span>
                      <small>234 customers purchased</small>
                    </div>
                  </div>
                  <div class="foodItem flex">
                    <img src="./assets/images/food (3).png" alt="Food Image">
                    <div class="imgText">
                      <span class="imageName">
                        EarthyEssence Meats
                      </span>
                      <small>234 customers purchased</small>
                    </div>
                  </div>
                  <div class="foodItem flex">
                    <img src="./assets/images/food (4).png" alt="Food Image">
                    <div class="imgText">
                      <span class="imageName">
                        TrueTaste Dairy
                      </span>
                      <small>234 customers purchased</small>
                    </div>
                  </div>
               </div>
               <div class="deliveryBoyDiv">
                <div class="intro" >
                  <h3 class="title">Top Producers</h3>
                  <div class="boysDiv flex">
                    <img src="./assets/images/boy (1).jpg" alt="Delivery Boy Image">
                    <img src="./assets/images/boy (2).jpg" alt="Delivery Boy Image">
                    <img src="./assets/images/boy (3).jpg" alt="Delivery Boy Image">
                    <img src="./assets/images/boy (4).jpg" alt="Delivery Boy Image">
                    <img src="./assets/images/boy (2).jpg" alt="Delivery Boy Image">
                  </div>
                  </div>
               </div>
             </div>
           </div>

        </div>
      </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
  <script src="./chart.js"></script>
  <script src="./index.js"></script>



  <!-- Function to change theme color -->
<script>
const iconDivv = document.querySelector('.iconDiv')
iconDivv.addEventListener('click', function(){
    document.body.classList.toggle('black')
    if(document.body.classList.contains('black')){
      iconDivv.innerHTML = `<i class="uil uil-toggle-on icon toggleIcon"></i>`
    }
    else{
      iconDivv.innerHTML = `<i class="uil uil-toggle-off icon toggleIcon"></i>`
    }  
})
  </script>
  
  </body>
  </html>