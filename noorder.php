<?php
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SUDEEP SIRISETTI</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
    <style>
 body{
    background:url("./images/noorder.jpg");
  background-repeat: no-repeat;
        background-size:100% 100% ;
        background-attachment: fixed;
  font-size: 12px;
  overflow: hidden;
 }
 h2{
  display: flex;
color: transparent;
text-align: center;
font-size: 7vw;       
        }
   h2 span{
    animation: glow 3s linear infinite;
    animation-delay: calc(0.1s * var(--i));
   }  
   @keyframes glow
   {
    0%
    {
        color: #fff;
        filter: blur(1px) hue-rotate(0deg);
        text-shadow: 0 0 10px #00b3ff,
        0 0 10px #00b3ff,
        0 0 30px #00b3ff,
        0 0 60px #00b3ff,
        0 0 90px #00b3ff,
        0 0 150px #00b3ff,
        0 0 200px #00b3ff,
        0 0 300px #00b3ff;
    }
    30%,70%
    {
        color: #fff;
        filter: blur(1px) hue-rotate(360deg);
        text-shadow: 0 0 10px #00b3ff,
        0 0 10px #00b3ff,
        0 0 30px #00b3ff,
        0 0 60px #00b3ff,
        0 0 90px #00b3ff,
        0 0 150px #00b3ff;
    }
    100%{
        color: transparent;
        box-shadow: none;
        filter: blur(1px) hue-rotate(0deg);
    }
}
    </style>
</head>
<body>
<nav class="top-bar" data-topbar role="navigation">
      <ul class="title-area">
        <li class="name">
        <h1><a href="index.php">CAR STORE</a></h1>
        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
      </ul>

      <section class="top-bar-section">
      <!-- Right Nav Section -->
        <ul class="right">
          <li><a href="index.php">Home</a></li>
          <li><a href="products.php">Products</a></li>
          <li><a href="cart.php">View Cart</a></li>
          <li class="active"><a href="orders.php">My Orders</a></li>
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
    <h2>
    <span style="--i:1">N</span>
      <span style="--i:2">O</span>
      <span style="--i:4; margin-left: 1vw;" >O</span>
      <span style="--i:3">R</span>
      <span style="--i:3">D</span>
      <span style="--i:3">E</span>
      <span style="--i:5">R</span>

</h2>
</body>
</html>



