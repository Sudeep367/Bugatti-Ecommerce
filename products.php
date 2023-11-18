<?php
if(session_id() == '' || !isset($_SESSION)) {
    session_start();
}
include 'config.php';
?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Products || CAR STORE</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
    <style>
       .credits {
  display: flex;
  justify-content: center;
  align-items: center;
  color: #ffa4bd;
  font-family: 'Roboto Condensed', sans-serif;
  font-size: 16px;
  font-weight: normal;
}

.credits-link {
  display: flex;
  align-items: center;
  color: #fff;
  font-weight: bold;
  text-decoration: none;
}
.dribbble {
  width: 20px;
  height: 20px;
  margin: 0 5px;
}
      body{
        background:url("./images/contact.jpg");
  background-repeat: no-repeat;
        background-size:100% 100% ;
        background-attachment: fixed;
      }
      @keyframes cardHoverAnimation {
        0% {
          transform: scale(0.7);
        }
        50% {
          transform: scale(0.9);
        }
        100% {
          transform: scale(0.7);
        }
      }
      body {
  touch-action: pan-y;
}

.row {
  white-space: nowrap;
  overflow-x: auto;
  -webkit-overflow-scrolling: touch;
}

.large-4 {
  display: inline-block;
  white-space: normal;
}

      .product-card {
  background-color: rgba(255, 255, 255, 0.1);
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  border: 1px solid #ccc;
  border-radius: 5px;
  margin: 10px;
  padding: 10px;
  text-align: center;
  color: #fff;
  position: relative;
  transform: scale(0.9);
  animation: colorChange 2s ease infinite; /* Apply animation here */
}
    

      @keyframes colorChange {
       
        0% {
    box-shadow: 0 3px 5px rgba(255, 0, 0, 0.1); /* Red box shadow */
  }
  50% {
    box-shadow: 0 3px 12px rgba(255, 0, 0, 0.8); /* Red box shadow */
  }
  100% {
    box-shadow: 0 3px 5px rgba(255, 0, 0, 0.1); /* Red box shadow */
  }
}

      .product-card img {
        max-width: 100%;
        height: 100px;
      }

      h3 {
        color: #fff;
      }

      .product-card:hover {
     
        transform: scale(1);
    
      }
      .product-card img {
    max-width: 100%;
    height: 100px;
    transition: transform 0.3s ease; /* Add transition for smooth effect */
}

.product-card:hover img {
    transform: scale(1.2); /* Adjust the scale factor as needed */
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

      <section class = "top-bar-section">
      <!-- Right Nav Section -->
        <ul class="right">
          <li><a href="index.php">Home</a></li>
          <li class="active"><a href="products.php">Products</a></li>
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

  

    <div class="row">
        <?php
        // Check if a product code is specified in the URL
        if (isset($_GET['product_name'])) {
            $filteredCode = $_GET['product_name'];
            $query = "SELECT * FROM products WHERE product_name = '$filteredCode'";
        } else {
            // If no code is specified, show all products
            $query = "SELECT * FROM products";
        }
        $i=0;
        $product_id = array();
        $product_quantity = array();
        $result = $mysqli->query($query);
        if ($result === FALSE) {
            die(mysql_error());
        }

        if ($result) {
            while ($obj = $result->fetch_object()) {
                echo '<div class="large-4 columns">';
                echo '<div class="product-card">';
                echo '<p><h3>'.$obj->product_name.'</h3></p>';
                echo '<img src="images/products/'.$obj->product_img_name.'"/>';
                echo '<p><strong>Product Code</strong>: '.$obj->product_code.'</p>';
                echo '<p><strong>Description</strong>: '.$obj->product_desc.'</p>';
                echo '<p><strong>Units Available</strong>: '.$obj->qty.'</p>';
                echo '<p><strong>Price (Per Unit)</strong>: '.$currency.$obj->price.'</p>';
  
  
  
                if($obj->qty > 0){
                  echo '<p><a href="update-cart.php?action=add&id='.$obj->id.'"><input type="submit" value="Add To Cart" style="clear:both; background: #0078A0; border: none; color: #fff; font-size: 1em; padding: 10px;" /></a></p>';
                }
                else {
                  echo 'Out Of Stock!';
                }
                echo '</div>'; // Close the product-card div
                echo '</div>';
            }
        }
        $_SESSION['product_id'] = $product_id;


        echo '</div>';
        echo '</div>';
        ?>
        ?>
    </div>

    <div class="credits" >
      inspired by
      <a class="credits-link" href="https://www.bugatti.com/" target="_blank">
        <svg class="dribbble" viewBox="0 0 200 200">
          <g stroke="#ffffff" fill="none">
            <circle cx="100" cy="100" r="90" stroke-width="20"></circle>
            <path d="M62.737004,13.7923523 C105.08055,51.0454853 135.018754,126.906957 141.768278,182.963345" stroke-width="20"></path>
            <path d="M10.3787186,87.7261455 C41.7092324,90.9577894 125.850356,86.5317271 163.474536,38.7920951" stroke-width="20"></path>
            <path d="M41.3611549,163.928627 C62.9207607,117.659048 137.020642,86.7137169 189.041451,107.858103" stroke-width="20"></path>
          </g>
        </svg>
        Bugatti
      </a>
    </div>
   

    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
        $(document).foundation();
      
 


    </script>
</body>
</html>