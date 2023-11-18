<?php
if (session_id() == '' || !isset($_SESSION)) {
    session_start();
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

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $contactNo = $_POST['contactNo'];
        $message = $_POST['message'];

        // Check if the message contains specific words
        $blacklistWords = array('bad', 'worst','over priced');
        $containsBadWords = false;

        foreach ($blacklistWords as $word) {
            if (stripos($message, $word) !== false) {
                $containsBadWords = true;
                break;
            }
        }

        // If the message contains bad words, delete the user from the users table
        if ($containsBadWords) {
            $deleteUserQuery = "DELETE FROM users WHERE email = '$email'";

            if ($conn->query($deleteUserQuery) === TRUE) {
                echo '<script>alert("User deleted due to inappropriate message.");</script>';
            } else {
                echo "Error deleting user: " . $conn->error;
            }
        }

        // SQL query to insert the data into the database
        $sql = "INSERT INTO contact (name, email, contactNo, message) VALUES ('$name', '$email', '$contactNo', '$message')";

        if ($conn->query($sql) === TRUE) {
            // Data inserted successfully
            echo '<script>alert("Thank you for contacting us.");</script>';
        } else {
            // Handle any errors here
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
}
?>

<!-- The rest of your HTML code remains unchanged -->


<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact || BOLT Sports Shop</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
    <Style>
     *, *:before, *:after {
  box-sizing: border-box;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}

body {
  background:url("./images/contact.jpg");
  background-repeat: no-repeat;
        background-size:100% 100% ;
        background-attachment: fixed;
  font-size: 12px;
  overflow: hidden;
}

body, button, input {
  font-family: 'Montserrat', sans-serif;
  font-weight: 700;
  letter-spacing: 1.4px;
}

.background {
  display: flex;
  min-height: 100vh;
}

.container {
  flex: 0 1 700px;
  margin: auto;
  padding: 10px;
}

.screen {
  position: relative;
  background-color: rgba(255, 255, 255, 0.1);
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); 
  border-radius: 15px;
}

.screen:after {
  content: '';
  display: block;
  position: absolute;
  top: 0;
  left: 20px;
  right: 20px;
  bottom: 0;
  border-radius: 15px;
  box-shadow: 0 20px 40px rgba(0, 0, 0, .4);
  z-index: -1;
}

.screen-header {
  display: flex;
  align-items: center;
  padding: 10px 20px;
  background: #4d4d4f;
  border-top-left-radius: 15px;
  border-top-right-radius: 15px;
}

.screen-header-left {
  margin-right: auto;
}

.screen-header-button {
  display: inline-block;
  width: 8px;
  height: 8px;
  margin-right: 3px;
  border-radius: 8px;
  background: white;
}

.screen-header-button.close {
  background: #ed1c6f;
}

.screen-header-button.maximize {
  background: #e8e925;
}

.screen-header-button.minimize {
  background: #74c54f;
}

.screen-header-right {
  display: flex;
}

.screen-header-ellipsis {
  width: 3px;
  height: 3px;
  margin-left: 2px;
  border-radius: 8px;
  background: #999;
}

.screen-body {
  display: flex;
}

.screen-body-item {
  flex: 1;
  padding: 50px;
}

.screen-body-item.left {
  display: flex;
  flex-direction: column;
}

.app-title {
  display: flex;
  flex-direction: column;
  position: relative;
  color: #ea1d6f;
  font-size: 26px;
}

.app-title:after {
  content: '';
  display: block;
  position: absolute;
  left: 0;
  bottom: -10px;
  width: 25px;
  height: 4px;
  background: #ea1d6f;
}

.app-contact {
  margin-top: auto;
  font-size: 8px;
  color: #888;
}

form .app-form-group {
  margin-bottom: 15px;
}

form .app-form-group.message {
  margin-top: 40px;
}

form .app-form-group.buttons {
  margin-bottom: 0;
  text-align: right;
}

form .app-form-control {
  width: 100%;
  padding: 8px 0;
  background: none;
  border: none;
  border-bottom: 0.5px solid #666;
  color: #ddd;
  font-size: 14px;
  text-transform: uppercase;
  outline: none;
  transition: border-color .2s;
}

form .app-form-control::placeholder {
  color: #666;
}

form .app-form-control:focus {
  border-bottom-color: #ddd;
}

.app-form-button {
  background: none;
  border: none;
  color: #ea1d6f;
  font-size: 14px;
  cursor: pointer;
  outline: none;
}

.app-form-button:hover {
  color: #b9134f;
}

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

@media screen and (max-width: 520px) {
  .screen-body {
    flex-direction: column;
  }

  .screen-body-item.left {
    margin-bottom: 30px;
  }

  .app-title {
    flex-direction: row;
  }

  .app-title span {
    margin-right: 12px;
  }

  .app-title:after {
    display: none;
  }
}
input {
  background-color: transparent;
}
@media screen and (max-width: 600px) {
  .screen-body {
    padding: 40px;
  }

  .screen-body-item {
    padding: 0;
  }
}
.app-form-control input, .app-form-control input:focus {
    background-color: transparent !important;
    outline: none;  
    color: white;
  }
  input[type=text]{
    border: none;
  }
  /* Reset the input field outline */
  .app-form-control input:focus {
    outline: none;
  }
    </Style>
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
          <li><a href="orders.php">My Orders</a></li>
          <li class="active"><a href="contact.php">Contact</a></li>
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

    <div class="background">
  <div class="container">
    <div class="screen">
      <div class="screen-header">
        <div class="screen-header-left">
          <div class="screen-header-button close"></div>
          <div class="screen-header-button maximize"></div>
          <div class="screen-header-button minimize"></div>
        </div>
        <div class="screen-header-right">
          <div class="screen-header-ellipsis"></div>
          <div class="screen-header-ellipsis"></div>
          <div class="screen-header-ellipsis"></div>
        </div>
      </div>
      <div class="screen-body">
        <div class="screen-body-item left">
          <div class="app-title">
            <span>CONTACT</span>
            <br>
            <span>US</span>
          </div>
          <div class="app-contact">CONTACT INFO : +91 9392504230</div>
          <div style=" font-size: 8px;
  color: #888;">Email INFO : sudeep30062003@gmail.com</div>
        </div>
        <div class="screen-body-item">
        <div class="app-form">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="app-form-control">
    <input type="text" name="name" placeholder="NAME">
</div>
<div class="app-form-control">
    <input type="text" name="email" placeholder="EMAIL">
</div>
<div class="app-form-control">
    <input type="text" name="contactNo" placeholder="CONTACT NO">
</div>
<div class="app-form-control message">
    <input type="text" name="message" placeholder="MESSAGE">
</div>
                <div class="app-form-group buttons">
                <button class="app-form-button" name="submit">CANCEL</button>
                    <button type="submit" class="app-form-button" name="submit">SEND</button>
                </div>
            </form>
        </div>
    </div>
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
  </div>
</div>







    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>