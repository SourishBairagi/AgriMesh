<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgriMesh</title>
    <!-- Link To CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Box Icons -->
    <link rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <!-- Link Swiper's CSS -->
  <link
  rel="stylesheet"
  href="https://unpkg.com/swiper/swiper-bundle.min.css"
/>
</head>
<body>
    <!-- Navbar -->
    <header>
        <a href="#" class="logo">
            <img src ="img/logo.png">
            </i></a>
        <!-- Menu Icon  -->

        <div class="bx bx-menu" id="menu-icon"></div>
        <!-- Nav List -->
        <ul class="navbar">
            <li><a href="#home" class="home-active">Home</a></li>
            <li><a href="#categories">Categories</a></li>
            <li><a href="#products">Products</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="retailer.html">Retailer</a></li>
            
        </ul>
        <!-- Profile -->
        
    
        <button class="dropbtn"><a href="/main/admin_dashboard/user_login.php" style="text-decoration: none; color: white;">Login</a></button>

                
                
                
        
        
    </header>
    <!-- Home -->
    <section class="home swiper" id="home">
        <div class="swiper-wrapper">
            <!-- Slide 1 -->
            <div class="swiper-slide container">
                <div class="home-text">
                    <span>Welcome to AgriMesh</span>
                    <h1>Streamline Your Farm<br>Follow Market Trends<br>Secure Best Prices</h1>
                    <a href="login.html" class="btn">Join Now<i class='bx bx-right-arrow-alt' ></i></a>
                </div>
                <img src="img/dashboard.png" alt="">

            </div>
            <!-- Slide 2 -->
            
          </div>
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>

    </section>
    <!-- Categories -->
    <section class="categories" id="categories">
        <div class="heading">
            <h1>Browse Our Hottest <br><span>Categories</h1>
                <a href="/consumer/index.html" class="btn">See All<i class='bx bx-right-arrow-alt' ></i></a>

        </div>
        <!-- Container Content -->
        <div class="categories-conatiner">
            <!-- Box 1 -->
            <div class="box box1">
                <img src="img/cate1.png" alt="">
                <h2>Fruits</h2>
                <span>22 Items</span>
                <i class='bx bx-right-arrow-alt' ></i>
            </div>
            <!-- Box 2 -->
            <div class="box box2">
                <img src="img/cate2.png" alt="">
                <h2>Vegetables</h2>
                <span>22 Items</span>
                <i class='bx bx-right-arrow-alt' ></i>
            </div>
            <!-- Box 3 -->
            <div class="box box3">
                <img src="img/dairy.png" alt="">
                <h2>Dairy</h2>
                <span>9 Items</span>
                <i class='bx bx-right-arrow-alt' ></i>
            </div>
            <!-- Box 4 -->
            <div class="box box4">
                <img src="img/fish.png" alt="">
                <h2>Fish</h2>
                <span>20 Items</span>
                <i class='bx bx-right-arrow-alt' ></i>
            </div>
            <!-- Box 5 -->
            <div class="box box5">
                <img src="img/meat.png" alt="">
                <h2>Meat</h2>
                <span>4 Items</span>
                <i class='bx bx-right-arrow-alt' ></i>
            </div>
        </div>
    </section>
    <!-- Products -->
    <section class="products" id="products">
        <div class="heading">
            <h1>Our Popular <br><span>Products</h1>
                <a href="#" class="btn">Shop Now<i class='bx bx-right-arrow-alt' ></i></a>

        </div>
        <!-- Product Content -->
        <div class="products-conatiner">
            <!-- Box 1 -->
            <div class="box">
                <img src="img/dairy.png" alt="">
                <span>Dairy</span>
                <h2>Farm fresh <br>Milk 1L</h2>
                <h3 class="price">৳70 <span>/L</span></h3>
                <i class='bx bx-cart-alt' ></i>
                <i class='bx bx-heart' ></i>
                <span class="discount">-25%</span>
            </div>
            <!-- Box 2 -->
            <div class="box">
                <img src="img/guava.png" alt="">
                <span>Fresh Fruits</span>
                <h2>Farm fresh Deshi<br>Guava </h2>
                <h3 class="price">৳80 <span>/kg</span></h3>
                <i class='bx bx-cart-alt' ></i>
                <i class='bx bx-heart' ></i>
                <span class="discount">-25%</span>
            </div>
            <!-- Box 3 -->
            <div class="box">
                <img src="img/p3.png" alt="">
                <span>Vegetabels</span>
                <h2>Farm fresh organic <br>Carrot</h2>
                <h3 class="price">৳80 <span>/kg</span></h3>
                <i class='bx bx-cart-alt' ></i>
                <i class='bx bx-heart' ></i>
                <span class="discount">-25%</span>
            </div>
            <!-- Box 4 -->
            <div class="box">
                <img src="img/tomato.png" alt="">
                <span>Vegetabels</span>
                <h2>Farm fresh organic <br>Tomato </h2>
                <h3 class="price">৳140 <span>/kg</span></h3>
                <i class='bx bx-cart-alt' ></i>
                <i class='bx bx-heart' ></i>
                <span class="discount">-25%</span>
            </div>
            <!-- Box 5 -->
            <div class="box">
                <img src="img/meat.png" alt="">
                <span>Meat</span>
                <h2>Farm fresh Local<br>Beef</h2>
                <h3 class="price">৳800 <span>/kg</span></h3>
                <i class='bx bx-cart-alt' ></i>
                <i class='bx bx-heart' ></i>
                <span class="discount">-25%</span>
            </div>
            <!-- Box 6 -->
            <div class="box">
                <img src="img/p6.png" alt="">
                <span>Vegetabels</span>
                <h2>Farm fresh organic <br>Potato</h2>
                <h3 class="price">৳80 <span>/kg</span></h3>
                <i class='bx bx-cart-alt' ></i>
                <i class='bx bx-heart' ></i>
                <span class="discount">-25%</span>
            </div>
        </div>
    </section>

    <!--seeds catagory-->
    <section class="categories" id="categories">
        <div class="heading">
            <h1>Seeds on Trending <br><span>Categories</h1>
                <a href="#" class="btn">See All<i class='bx bx-right-arrow-alt' ></i></a>

        </div>
        <!-- Container Content -->
        <div class="categories-conatiner">
            <!-- Box 1 -->
            <div class="box box1">
                <img src="img/potato.png" alt="">
                <h2>Potato</h2>
                <span>Golden Potato</span>
                <i class='bx bx-right-arrow-alt' ></i>
            </div>
            <!-- Box 2 -->
            <div class="box box2">
                <img src="img/flower.png" alt="">
                <h2>Cauliflower</h2>
                <span>22 Items</span>
                <i class='bx bx-right-arrow-alt' ></i>
            </div>
            <!-- Box 3 -->
            <div class="box box3">
                <img src="img/potato_plant.png" alt="">
                <h2>Tomato</h2>
                <span>Deshi Tomato</span>
                <i class='bx bx-right-arrow-alt' ></i>
            </div>
            <!-- Box 4 -->
            <div class="box box4">
                <img src="img/rice.png" alt="">
                <h2>Rice</h2>
                <span>10 Catagories</span>
                <i class='bx bx-right-arrow-alt' ></i>
            </div>
            <!-- Box 5 -->
            <div class="box box5">
                <img src="img/sunflower.png" alt="">
                <h2>sunflower</h2>
                <span>4 Items</span>
                <i class='bx bx-right-arrow-alt' ></i>
            </div>
        </div>
    </section>

    <!-- About -->
    <section class="about" id="about">
        <img src="img/dashboard.png" alt="">
        <div class="about-text">
            <span>About Us</span>
            <p>AgriMesh is an innovative platform bridging the gap between organic farmers and consumers. We streamline the demand and supply of fresh produce, dairy, and meat, fostering fair trade and sustainable practices. Our mission is to empower local farmers and deliver quality, farm-fresh products directly to consumers with transparency and trust.</p>
            
            <a href="login.html" class="btn">Join Today<i class='bx bx-right-arrow-alt' ></i></a>
        </div>
    </section>
    <!-- Customers -->
    <section class="customers" id="customers">
        <h2>Why Customer's Love Us?</h2>
        <!-- Customer Content -->
        <div class="customers-container">
            <!-- Review 1 -->
            <div class="box">
                <i class='bx bxs-quote-alt-left' ></i>
                <div class="stars">
                    <i class='bx bxs-star' ></i>
                    <i class='bx bxs-star' ></i>
                    <i class='bx bxs-star' ></i>
                    <i class='bx bxs-star' ></i>
                    <i class='bx bxs-star-half' ></i>
                </div>
                <p>AgriMesh connects farmers and buyers effortlessly, ensuring fair pricing, timely transactions, and a seamless supply chain experience.</p>
                <div class="review-profile">
                    <img src="img/c1.jpg" alt="">
                    <h3>Nargis</h3>
                </div>
            </div>
              <!-- Review 2-->
              <div class="box">
                <i class='bx bxs-quote-alt-left' ></i>
                <div class="stars">
                    <i class='bx bxs-star' ></i>
                    <i class='bx bxs-star' ></i>
                    <i class='bx bxs-star' ></i>
                    <i class='bx bxs-star' ></i>
                    <i class='bx bxs-star-half' ></i>
                </div>
                <p>Fresh, organic produce delivered with ease! AgriMesh bridges consumers with local farmers for quality, transparency, and trust.</p>
                <div class="review-profile">
                    <img src="img/c2.jpg" alt="">
                    <h3>Hero Alam</h3>
                </div>
            </div>
              <!-- Review 3 -->
              <div class="box">
                <i class='bx bxs-quote-alt-left' ></i>
                <div class="stars">
                    <i class='bx bxs-star' ></i>
                    <i class='bx bxs-star' ></i>
                    <i class='bx bxs-star' ></i>
                    <i class='bx bxs-star' ></i>
                    <i class='bx bxs-star-half' ></i>
                </div>
                <p>AgriMesh streamlined our restaurant's sourcing process, providing reliable access to organic ingredients and fostering strong farmer partnerships.</p>
                <div class="review-profile">
                    <img src="img/c3.jpg" alt="">
                    <h3>Ananta Jalil</h3>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <section class="footer" id="footer">
        <div class="footer-box">
            <a href="#" class="logo">
                <img src ="img/logo.png" >
            </i></a>

            
            <p>Basundhara RA <br>Dhaka-1229</p>
            <div class="social">
                <a href="#"><i class='bx bxl-facebook' ></i></a>
                <a href="#"><i class='bx bxl-twitter' ></i></a>
                <a href="#"><i class='bx bxl-instagram' ></i></a>
                <a href="#"><i class='bx bxl-youtube' ></i></a>
            </div>
        </div>
        <div class="footer-box">
            <h2>Categories</h2>
            <a href="#">Fruits & Vegetabels</a>
            <a href="#">Dairy Products</a>
            <a href="#">Meat</a>
            <a href="#">Fish</a>
        </div>
        <div class="footer-box">
            <h2>Useful Links</h2>
            <a href="retailer.html">Retailers</a>
            <a href="#">Terms Of Use </a>
            <a href="#">login</a>
            
        </div>
        <div class="footer-box">
            <h2>Newsletter</h2>
            <p>Join Our Newsletter & <br>Stay Updated</p>
            <form action="">
                <i class='bx bxs-envelope' ></i>
                <input type="email" name="" id="" placeholder="Enter Your Email">
                <i class='bx bx-arrow-back bx-rotate-180' ></i>

            </form>
        </div>
    </section>
    <!-- Copyright -->
    <div class="copyright">
        <p>&#169; AgriMesh All Right Reserved.</p>
    </div>

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Link To JS -->
    <script src="main.js"></script>
</body>
</html>