<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();
  
    $servername = "localhost"; // Change to your MySQL server name
$username = "root"; // Change to your MySQL username
$password = ""; // Change to your MySQL password
$dbname = "bolt"; // Change to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if(isset($_POST['create_user'])) {
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $address = $_POST['address'];
  $city = $_POST['city'];
  $pin = $_POST['pin'];
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password
  $type = $_POST['type'];

  // Insert user details into the users table
  $insert_query = "INSERT INTO users (fname, lname, address, city, pin, email, password, type) VALUES ('$fname', '$lname', '$address', '$city', '$pin', '$email', '$password', '$type')";
  $conn->query($insert_query);
}

// Check if the "Delete User" form is submitted
if(isset($_POST['delete_user'])) {
  $delete_email = $_POST['delete_email'];

  // Delete user from the users table
  $delete_query = "DELETE FROM users WHERE email = '$delete_email'";
  $conn->query($delete_query);
}
}


if(!isset($_SESSION["username"])) {
  header("location:index.php");
}

if($_SESSION["type"]!="admin") {
  header("location:index.php");
}

include 'config.php';
?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin ||BUGATTI STORE</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
    <style>
      .product-card {
  background-color:#131212;
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
body{
        background:url("./images/order.jpg");
  background-repeat: no-repeat;
        background-size:100% 100% ;
        background-attachment: fixed;
  font-size: 12px;
  overflow-y: auto;
  
  
      }
      .example::-webkit-scrollbar {
        width: 0.5em; 
}
.example::-webkit-scrollbar -thumb {
            background-color: transparent; /* Make the thumb transparent */
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
      . .product-card i {
        width: 70%;
      }
      .product-card img {
    max-width: 100%;
    height: 100px;
    transition: transform 0.3s ease; /* Add transition for smooth effect */
}

.product-card:hover img {
    transform: scale(1.2); /* Adjust the scale factor as needed */
}
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
h4{
  text-align: center;
  font-size: 100px;
}
.user-management-container {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }

        .user-form {
            flex: 0 1 48%; /* Adjust the width as needed */
            background-color: rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .user-form h5 {
            text-align: center;
            color: #fff;
        }

        .user-form label {
            color: #fff;
        }

        .user-form input[type="text"],
        .user-form input[type="email"],
        .user-form input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            background: none;
            border: none;
            border-bottom: 0.5px solid #666;
            color: #ddd;
            font-size: 14px;
            text-transform: uppercase;
            outline: none;
        }
        .button{
          background: #4CAF50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .user-form input[type="submit"] {
            background: #4CAF50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .user-form input[type="submit"]:hover {
            background: #45a049;
        }
      </style>
  </head>
  <body>

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
        <li><a href="index.php">Home</a></li>
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
<div class="example">

    <div class="row" style="margin-top:10px;">
      <div class="large-12">
        <h4 style="color:#fff;">Hey Admin!</h4>
        <?php
$result = $mysqli->query("SELECT * from products order by id asc");
if ($result) {
    while ($obj = $result->fetch_object()) {
        echo '<div class="large-4 columns">';
        echo '<div class="product-card">';
        echo '<p><h3>' . $obj->product_name . '</h3></p>';
        echo '<img src="images/products/' . $obj->product_img_name . '"/>';
        echo '<p><strong>Product Code</strong>: ' . $obj->product_code . '</p>';
        echo '<p><strong>Description</strong>: ' . $obj->product_desc . '</p>';
        echo '<p><strong>Units Available</strong>: ' . $obj->qty . '</p>';
        echo '<div class="large-6 columns" style="padding-left:0;">';
        echo '<form method="post" name="update-quantity" action="admin-update.php">';
        echo '<p><strong>New Qty</strong>:</p>';
        echo '</div>';

        echo '<input type="number" name="quantity[]"/>';

        echo '</div>';
        echo '</div>';
    }
}
?>




      </div>
    </div>
    <div class="row" style="margin-top:10px;">
      <div class="small-12">
        <center><p><input style="clear:both;" type="submit" class="button" value="Update">
        <a href="#users" class="button">User Management</a>
      </p></center>
         
        </form>
        <section id="users" class="products-page">
    <div class="row" style="margin-top: 10px;">
        <div class="large-12">
            <h4 style="color:#fff">Hey Admin!</h4>

            <div class="user-management">
                <div class="user-form">
                    <!-- Delete User Form -->
                    <h5>Delete User</h5>
                    <form method="post" action="">
                    <label for="delete_email">Enter Email to Delete:</label>
            <input type="email" name="delete_email" required>

            <input type="submit" name="delete_user" value="Delete User">
        </form>
        <div class="user-form">
                    <!-- Create User Form -->
                    <h5>Create User</h5>
                    <form method="post" action="">
            <label for="fname">First Name:</label>
            <input type="text" name="fname" required>

            <label for="lname">Last Name:</label>
            <input type="text" name="lname" required>

            <label for="address">Address:</label>
            <input type="text" name="address" required>

            <label for="city">City:</label>
            <input type="text" name="city" required>

            <label for="pin">PIN:</label>
            <input type="text" name="pin" required>

            <label for="email">Email:</label>
            <input type="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" name="password" required>

            <label for="type">User Type:</label>
            <input type="text" name="type" required>

            <input type="submit" name="create_user" value="Create User">
        </form>
        </div>
      
    </div>
</div>

</section>
    
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
      </div>
    </div>


</div>


    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
