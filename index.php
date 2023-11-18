<!DOCTYPE html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SUDEEP SIRISETTI</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
    <style>
      body{
        overflow: hidden;
      }
      video {
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: -1;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* About Page styles (modified) */
        .content {
            text-align: center;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: rgba(0, 0, 0, 0.6); /* Semi-transparent background */
        }

     /* Hyped Bugatti Text */
.content h1 {
    text-align: center;
    font-size: 160px;
    -webkit-text-stroke: 2px #fff;
            color: transparent;
    font-weight: 600;
    margin-top: 20px;
    transition: 2s;
    animation: hypedText 2s infinite;
}

@keyframes hypedText {
    0% {
        transform: scale(1);
        color: transparent;
    }
    50% {
        transform: scale(1.1);
        color: #ff0000; /* Change the color to your preferred hyped color */
    }
    100% {
        transform: scale(1);
        color: transparent;
    }
}

/* Hyped Explore Button */
/* Hyped Bugatti Text */
.centered-elements {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
      }

      .eb {
     
        font-size: 24px;
        -webkit-text-stroke: 1px #fff;
        color: transparent;
        font-weight: 600;
       vertical-align: top;

      }

      .chiron {
        text-align: center;
        font-size: 48px;
        -webkit-text-stroke: 1px #fff;
        color: transparent;
        font-weight: 600;
        margin: 10px 0;
       
      }

      .explore-button {
        text-decoration: none;
        display: inline-block;
        color: #fff;
        font-size: 24px;
        border: 2px solid #fff;
        padding: 14px 70px;
        border-radius: 50px;
        margin: 20px 0;
        transition: 1s;
        animation: hypedButton 2s infinite, pulseButton 1s linear infinite;
      }

@keyframes hypedButton {
    0% {
        transform: scale(1);
        background-color: transparent;
        color: #fff;
        border: 2px solid #fff;
        box-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
    }
    50% {
        transform: scale(1.1);
        background-color: #fff;
        color:black;
        border: 2px solid #fff;
        box-shadow: 0 0 20px rgba(255, 0, 0, 0.8);
    }
    100% {
        transform: scale(1);
        background-color: transparent;
        color: #fff;
        border: 2px solid #fff;
        box-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
    }
}

@keyframes pulseButton {
    0% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.05);
    }
    100% {
        transform: scale(1);
    }
}


        .content h1:hover {
          
            animation: hypedText 2s infinite, rotateText 1s linear infinite;
        }

        .content a:hover {
            background-color: white;
            color: black;
            font-size: 40px;
        }

        /* Products Page background and styles (modified) */
        .products-page {
            text-align: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: url('./images/login.jpg') no-repeat center center;
            background-size: cover;
        }
        .box{
        position: relative;
        width: 400px;
        height: 400px;
        background: black;
        border-radius: 8px;
        overflow: hidden;
      }
      .box::before{
        content: '';
        position: absolute;
        top: -50%;
        left:-50%;
        width: 400px;
        height: 400px;
        background: linear-gradient(0deg, transparent,
        transparent,#45f3ff,#45f3ff,#45f3ff);
        z-index: 1;
        transform-origin: bottom right;
        animation: animate 6s linear infinite;

      }
      .box::after{
        content: '';
        position: absolute;
        top: -50%;
        left:-50%;
        width: 400px;
        height: 400px;
        background: linear-gradient(0deg, transparent,
        transparent,#45f3ff,#45f3ff,#45f3ff);
        z-index: 1;
        transform-origin: bottom right;
        animation: animate 6s linear infinite;
        animation-delay: -3s;

      }
      .borderline{
        position: absolute;
        top: 0;
        inset: 0;

      }
      .box .product-card{
        position: absolute;
        inset:-17px 4px -6px 4px;
        background:url("./images/login.jpg");
        padding: 50px 40px;
        border-radius: 8px;
        z-index: 2;
        display: flex;
        flex-direction: column;
      }
      
      .borderline::before{
        content: '';
        position: absolute;
        top: -50%;
        left:-50%;
        width: 400px;
        height: 400px;
        background: linear-gradient(0deg, transparent,
        transparent,#ff2770,#ff2770,#ff2770);
        z-index: 1;
        transform-origin: bottom right;
        animation: animate 6s linear infinite;
        animation-delay:-1.5s;
      }
      .borderline::after{
        content: '';
        position: absolute;
        top: -50%;
        left:-50%;
        width: 400px;
        height: 400px;
        background: linear-gradient(0deg, transparent,
        transparent,#ff2770,#ff2770,#ff2770);
        z-index: 1;
        transform-origin: bottom right;
        animation: animate 6s linear infinite;
        animation-delay:-4.5s;
      }
      
      @keyframes animate
      {
        0%
        {
          transform: rotate(0deg);

        }
        100%
        {
          transform: rotate(360deg);
          
        }
      }
        form {
            display: inline-block;
            inset:-19px 4px -6px 4px;
            padding: 50px 40px;
        border-radius: 8px;
        z-index: 2;
        display: flex;
        flex-direction: column;
            background-color: black;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
           
        }
.login{
    padding: 4px;
    animation: slideFromRight 3s linear , lighting 2s linear infinite;
            transition: transform 0.3s;
}
        .login:hover {
            transform: scale(1.1);
        }

        @keyframes slideFromRight {
            0% {
                transform: translateX(100%);
                opacity: 0;
            }
            100% {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes lighting {
            0% {
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }
            50% {
                box-shadow: 0 2px 10px rgba(255, 255, 255, 0.8);
            }
            100% {
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }
        }
        .box .product-card p:hover,h2:hover,a:hover{
            color: #fff;

        }
    </style>
  </head>
  <body>
    <!-- Navigation (your existing navigation) -->
    <nav class="top-bar" data-topbar role="navigation">
      <ul class="title-area">
        <li class="name">
        <h1><a href="index.php">BUGATTI STORE</a></h1>
        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
      </ul>

      <section class="top-bar-section">
      <!-- Right Nav Section -->
        <ul class="right">
          <li class="active"><a href="index.php">Home</a></li>
          <li><a href="products.php">Products</a></li>
          <li><a href="cart.php">View Cart</a></li>
          <li><a href="orders.php">My Orders</a></li>
          <li><a href="contact.php">Contact</a></li>
          <?php
    
          if(isset($_SESSION['username'])){
            echo '<li><a href="account.php">My Account</a></li>';
            echo '<li><a href="logout.php">Log Out</a></li>';
          }
          else{
            echo '<li><a href="login.php">Log In</a></li>';
            echo '<li><a href="register.php">Register</a></li>';
          }
          ?>
        </ul>
      </section>
    </nav>
     <!-- Video background for the About Page (modified) -->
     <video autoplay loop muted plays-inline>
        <source src="images/video.mp4" type="video/mp4">
    </video>

    <!-- Navigation (your existing navigation) -->

    <!-- About Page (modified) -->
    <div class="content">
    <img class="eb" src="./images/eb.png" alt="EB" style="width: 110px; height: 80px;">
        <img class="chiron" src="./images/chiron.png" alt="Chiron" style="width: 300px; height: 200px;">
        <div class="centered-elements">
            <a href="#products" class="explore-button">Explore</a>
        </div>
    </div>

    <section id="products" class="products-page">
    <h1 style="margin-top: 0px; position:absolute">Our Featured Products</h1>
        <div class="container">
            <div class="login">

      
      <div class="box">
      <h3 class="borderline"></h3>
            <div class="product-card">
                <img src="./images/login.jpg" alt="Car 1">
                <h2><a style="color: #222222;"  onMouseOver="this.style.color='#fff'"   onMouseOut="this.style.color='#222222'" href="products.php?product_name=EB110series">EB110series</a></h2>
               
                
            </div></form></div></div>
            </div>
            <div class="login">
<div class="box">
      <h2 class="borderline"></h2>
            <div class="product-card">
                <img src="./images/login.jpg" alt="Car 2">
                <h2 ><a style="color: #222222;"  onMouseOver="this.style.color='#fff'"   onMouseOut="this.style.color='#222222'" href="products.php?product_name=veyronseries">Veyron Series</a></h2>
               
                </div></div></div>
            </div>
            <div class="login">
<div class="box">
      <h2 class="borderline"></h2>
            <div class="product-card">
                <img src="./images/login.jpg" alt="Car 3">
                <h2><a style="color: #222222;"  onMouseOver="this.style.color='#fff'"   onMouseOut="this.style.color='#222222'" href="products.php?product_name=chironseries">Chiron Series</a></h2>
              
                </div></div></div>
            </div>
        </div>
    </section>

    <!-- Scripts (your existing scripts) -->
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
        $(document).foundation();
    </script>
</body>
</html>
