<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();} for php 5.4 and above

if(session_id() == '' || !isset($_SESSION)){session_start();}

if(!isset($_SESSION["username"])) {
  echo '<h1>Invalid Login! Redirecting...</h1>';
  header("Refresh: 3; url=index.php");
}

if($_SESSION["type"]==="admin") {
  header("location:admin.php");
}

include 'config.php';

?>


<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Account || CAR STORE</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
    <style>
         .credits {
  display: flex;
  justify-content: center;
  align-items: center;
  color: red;
  font-family: 'Roboto Condensed', sans-serif;
  font-size: 16px;
  font-weight: normal;
}

.credits-link {
  display: flex;
  align-items: center;
  color: black;
  font-weight: bold;
  text-decoration: none;
}
.dribbble {
  width: 20px;
  height: 20px;
  margin: 0 5px;
  color: black;
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
            echo '<li class="active"><a href="account.php">My Account</a></li>';
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




    <div class="row" style="margin-top:30px;">
      <div class="small-12">
        <p><?php echo '<h3>Hi ' .$_SESSION['fname'] .'</h3>'; ?></p>

        <p><h4>Account Details</h4></p>

        <p>Below are your details in the database. If you wish to change anything, then just enter new data in text box and click on update.</p>
      </div>
    </div>


    <form method="POST" action="update.php" style="margin-top:30px;">
      <div class="row">
        <div class="small-12">

          <div class="row">
            <div class="small-3 columns">
              <label for="right-label" class="right inline">First Name</label>
            </div>
            <div class="small-8 columns end">
              <?php

                $result = $mysqli->query('SELECT * FROM users WHERE id='.$_SESSION['id']);

                if($result === FALSE){
                  die(mysql_error());
                }

                if($result) {
                  $obj = $result->fetch_object();
                  echo '<input type="text" id="right-label" placeholder="'. $obj->fname. '" name="fname">';

                  echo '</div>';
                    echo '</div>';

                  echo '<div class="row">';
                  echo '<div class="small-3 columns">';
                  echo '<label for="right-label" class="right inline">Last Name</label>';
                  echo '</div>';
                  echo '<div class="small-8 columns end">';

                  echo '<input type="text" id="right-label" placeholder="'. $obj->lname. '" name="lname">';

                  echo '</div>';
                  echo '</div>';

                  echo '<div class="row">';
                  echo '<div class="small-3 columns">';
                  echo '<label for="right-label" class="right inline">Address</label>';
                  echo '</div>';
                  echo '<div class="small-8 columns end">';
                  echo '<input type="text" id="right-label" placeholder="'. $obj->address. '" name="address">';



                  echo '</div>';
                  echo '</div>';

                  echo '<div class="row">';
                  echo '<div class="small-3 columns">';
                  echo '<label for="right-label" class="right inline">City</label>';
                  echo '</div>';
                  echo '<div class="small-8 columns end">';
                  echo '<input type="text" id="right-label" placeholder="'. $obj->city. '" name="city">';
                  echo '</div>';
                  echo '</div>';

                  echo '<div class="row">';
                  echo '<div class="small-3 columns">';
                  echo '<label for="right-label" class="right inline">Pin Code</label>';
                  echo '</div>';
                  echo '<div class="small-8 columns end">';

                  echo '<input type="text" id="right-label" placeholder="'. $obj->pin. '" name="pin">';

                  echo '</div>';
                  echo '</div>';

                  echo '<div class="row">';
                  echo '<div class="small-3 columns">';
                  echo '<label for="right-label" class="right inline">Email</label>';
                  echo '</div>';

                  echo '<div class="small-8 columns end">';


                  echo '<input type="email" id="right-label" placeholder="'. $obj->email. '" name="email">';

                  echo '</div>';
                  echo '</div>';
              }



              echo '<div class="row">';
              echo '<div class="small-3 columns">';
              echo '<label for="right-label" class="right inline">Password</label>';
              echo '</div>';
              echo '<div class="small-8 columns end">';
              echo '<input type="password" id="right-label" name="pwd">';

              echo '</div>';
              echo '</div>';
          ?>

          <div class="row">
            <div class="small-4 columns">

            </div>
            <div class="small-8 columns">
              <input type="submit" id="right-label" value="Update" style="background: #0078A0; border: none; color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 1em; padding: 10px;">
              <input type="reset" id="right-label" value="Reset" style="background: #0078A0; border: none; color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 1em; padding: 10px;">
            </div>
          </div>
        </div>
      </div>
    </form>



    <div class="row" style="margin-top:30px;">
      <div class="small-12">
      <div class="credits" >
      inspired by
      <a class="credits-link" href="https://www.bugatti.com/" target="_blank">
        <svg class="dribbble" viewBox="0 0 200 200">
          <g stroke="red" fill="none">
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
