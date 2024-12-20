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
    
         <a href="submit_feedback.php">
          <li class="list">
            <i class="uil uil-folder-lock icon"></i>
            <span class="listName">Submit Feedback</span>
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
    
         <a href="add_product.php">
          <li class="list">
            <i class="uil uil-gift icon"></i>
            <span class="listName">Add Products</span>
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
             
            <div class="addBtn">
              <a href="product.php">
                <span>Product List</span>
              </a>
            </div>
           </div>
        </div>
       

        <body>
            <div class="form-container">
                <h2>Add New Product</h2>
                <form action="save_product.php" method="POST" enctype="multipart/form-data" id="addProductForm">
                    <div class="form-group">
                        <label for="productName">Product Name</label>
                        <input type="text" id="productName" name="name" required>
                    </div>

                    <div class="form-group">
                      <label for="product_id">Product ID</label>
                      <input type="number" id="product_id" name="product_id" required>
                  </div>
        
                    <div class="form-group">
                        <label for="productType">Type</label>
                        <select id="productType" name="type" required>
                            <option value="" disabled selected>Select Type</option>
                            <option value="Vegetables">Vegetables</option>
                            <option value="Fruits">Fruits</option>
                            <option value="Meat">Meat</option>
                            <option value="Dairy">Dairy</option>
                        </select>
                    </div>
        
                    <div class="form-group">
                        <label for="productQty">Seasonality</label>
                        <input type="text" id="Seasonality" name="Seasonality" required>
                    </div>

                    <div class="form-group">
                      <label for="product_variety">Variety</label>
                      <input type="text" id="Variety" name="variety" required>
                  </div>
        
                    
        
                    <button type="submit">Add Product</button>
                </form>
        
                
            </div>

            

            




          
        

        </div>
      </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
  <script src="./chart.js"></script>
  
  </body>
  </html>