
<?php

$servername = "localhost";

$username = "root";

$password = "";

$dbname = "admin";

$conn = new mysqli($servername, $username, $password, $dbname, 4306);

if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);
} else {
    echo "<script>console.log('Database Connected successfully');</script>";
}

if (isset($_POST["login"])) 
{
    $query = "SELECT * FROM `users` WHERE 'email'='$_POST[email]' AND 'password'='$$_POST[password]'";
    $result=mysqli_query($con, $query);
    if (mysqli_num_rows($result)==1)
    {
        echo"correct";
    }
    else
    {
        echo "incorrect";
    }
}
?>

 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>

    <!-- css Link -->
    <link rel="stylesheet" href="./index.css">
    <!-- Icons link -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>
<body>
    <div class="container flex">
       
        <div class="mainContent">
            <h2 class="title">
                Welcome AgriMesh
            </h2>
            <p>Bridging the Gap Between Agriculture and Opportunity</p>

            <div class="btn">
                <button type="button" class="loginBtn login_Btn" >LOGIN</button>
                <button type="button" class="registerBtn register_Btn">REGISTER</button>
            </div>
        </div>
       

        <div class="loginPage flex">
            <div class="introSection">
                <div class="sectionText flex">
                    <h2 class="title">
                        Welcome to AgriMesh
                    </h2>
                    <p>Bridging the Gap Between Agriculture and Opportunity</p>
                </div>
            </div>
            <div class="inputSection flex">
                <div class="closeIcon flex">
                    <i class="uil uil-times-circle icon"></i>
                </div>
              <h2>Welcome Back!</h2>
              <span>Login to continue</span>
            <form id="loginForm" method="POST" >
              <div class="inputs">
                  <div class="emailInput">
                    <input type="email" name="email" placeholder="Email" required>
                    <i class="uil uil-envelope-minus icon"></i>
                  </div>
                  <div class="passwordInput">
                    <input type="password" name="password" placeholder="Password" required>
                    <i class="uil uil-lock icon"></i>
                  </div>
                  
                  <div class="btn">
                    
                      <button type="button" class="loginBtn" value="login" name="login">LOGIN</button>
                    
                </div>
                </form>    
            
                <span class="tagline">Don't have an account? <a href="#" class="register_Btn">Register Now</a></span>

              </div>
            </div>
        </div>



        
        <div class="registerPage flex">
            <div class="inputSection flex">
                <div class="closeIcon flex">
                    <i class="uil uil-times-circle icon"></i>
                </div>
              <h2></h2>
              <span>Create an account</span>
              
              <form method="post"></form>
              <div class="inputs">
                  <div class="userInput">
                    <input type="text" name="fname" id="fname" placeholder="First Name" required>
                    <i class="uil uil-user icon"></i>
                  </div>
                  <div class="userInput">
                    <input type="text" name="lname" id="lname" placeholder="Last Name" required>
                    <i class="uil uil-user icon"></i>
                  </div>
                  <div class="emailInput">
                    <input type="email" name="email" id="email" placeholder="Email" required>
                    <i class="uil uil-envelope-minus icon"></i>
                  </div>
                  <div class="passwordInput">
                    <input type="password" name="password" id="password" placeholder="Password" required>
                    <i class="uil uil-lock icon"></i>
                  </div>
                  
                  <div class="btn">
                    <button type="button" class="loginBtn login_Btn" value="register" name="register">REGISTER</button>
                </div>
                <div class="alternatives">
                    <span>OR</span>
                    <div>
                        <i class="uil uil-facebook icon"></i>
                        <i class="uil uil-instagram icon"></i>
                        <i class="uil uil-twitter icon"></i>
                    </div>
                </div>
                <span class="tagline">Already have an account? <a href="#" class="login_Btn">Login Now</a></span>

              </div>
            </div>
        </div>
    </div>
    
    <script src="./index.js"></script>
</body>
</html>