<?php
if (session_id() == '' || !isset($_SESSION)) {
    session_start();
}
include 'config.php';
?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Shopping Cart || BOLT Sports Shop</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
    <style>
      .credits {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 10px;

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
        /* Add your CSS styles here */
        .cart-card {
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
  animation: colorChange 2s ease infinite;
        }

        @keyframes colorChange {
       
       0% {
   box-shadow: 0 3px 5px rgba(255, 0, 0, 0.2); /* Red box shadow */
 }
 50% {
   box-shadow: 0 3px 12px rgba(255, 0, 0, 1); /* Red box shadow */
 }
 100% {
   box-shadow: 0 3px 5px rgba(255, 0, 0, 0.2); /* Red box shadow */
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
                <li class="active"><a href="cart.php">View Cart</a></li>
                <li><a href="orders.php">My Orders</a></li>
                <li><a href="contact.php">Contact</a></li>
                <?php
                if (isset($_SESSION['username'])) {
                    echo '<li><a href="account.php">My Account</a></li>';
                    echo '<li><a href="logout.php">Log Out</a></li>';
                } else {
                    echo '<li><a href="login.php">Log In</a></li>';
                    echo '<li><a href="register.php">Register</a></li>';
                }
                ?>
            </ul>
        </section>
    </nav>

    <div class="row" style="margin-top:10px;">
        <div class="large-12">
            <?php
            if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                echo '<div class="cart-card">';
                echo '<p><h3 style="color:#fff;">Your Shopping Cart</h3></p>';

                if (isset($_SESSION['cart'])) {
                    $total = 0;
                    echo '<table>';
                    echo '<tr>';
                    echo '<th>Code</th>';
                    echo '<th>Name</th>';
                    echo '<th>Quantity</th>';
                    echo '<th>Cost</th>';
                    echo '</tr>';
                    foreach ($_SESSION['cart'] as $product_id => $quantity) {
                        $result = $mysqli->query("SELECT product_code, product_name, product_desc, qty, price FROM products WHERE id = " . $product_id);
                        if ($result) {
                            while ($obj = $result->fetch_object()) {
                                $cost = $obj->price * $quantity;
                                $total = $total + $cost;
                                echo '<tr>';
                                echo '<td>' . $obj->product_code . '</td>';
                                echo '<td>' . $obj->product_name . '</td>';
                                echo '<td>' . $quantity . '&nbsp;<a class="button [secondary success alert]" style="padding:5px;" href="update-cart.php?action=add&id=' . $product_id . '">+</a>&nbsp;<a class="button alert" style="padding:5px;" href="update-cart.php?action=remove&id=' . $product_id . '">-</a></td>';
                                echo '<td>' . $cost . '</td>';
                                echo '</tr>';
                            }
                        }
                    }
                    echo '<tr>';
                    echo '<td colspan="3" align="right">Total</td>';
                    echo '<td>' . $total . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td colspan="4" align="right"><a href="update-cart.php?action=empty" class="button alert">Empty Cart</a>&nbsp;<a href="products.php" class="button [secondary success alert]">Continue Shopping</a>';
                    if (isset($_SESSION['username'])) {
                        echo '<a href="orders-update.php"><button style="float:right;">COD</button></a>';
                    } else {
                        echo '<a href="login.php"><button style="float:right;">Login</button></a>';
                    }
                    echo '</td>';
                    echo '</tr>';
                    echo '</table>';
                } else {
                    echo '<img src="./images/cart.jpg" alt="Empty Cart Image" />';
                }
                echo '</div>';
            } else {
                echo '<img src="./images/cart.jpg" alt="Empty Cart Image" />';
            }
            ?>
        </div>
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
