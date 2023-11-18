<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

if (isset($_SESSION["username"])) {header ("location:index.php");}


?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register || BOLT Sports Shop</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
    <style>
.width{
        width: 180%;
        padding: 5px 10px 10px;
      }
      .width input{
        border: none;
        background: transparent;
        padding: 0px 10px 10px;
        outline: none;
        box-shadow: none;
        color: #23242a;
        font-size: 1em;
       letter-spacing: 0.05em;
       transition: 0.5s;
        z-index: 10;
      }
      body{
        background:url("./images/login.jpg");
        background-repeat: no-repeat;
        background-size:100% 100% ;
        background-attachment: fixed;
      }
      .login{
        
        text-align: center;
        justify-content: center;
        align-items: center;
        margin-top: 10px;
        margin-left: 560px;

      }
      .box{
        position: relative;
        width: 480px;
        height: 620px;
        background: black;
        border-radius: 8px;
        overflow: hidden;
      }
      .box::before{
        content: '';
        position: absolute;
        top: -50%;
        left:-50%;
        width: 480px;
        height: 620px;
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
        width: 480px;
        height: 620px;
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
      .borderline::before{
        content: '';
        position: absolute;
        top: -50%;
        left:-50%;
        width: 480px;
        height: 620px;
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
        width: 480px;
        height: 620px;
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
      
      .box form{
        position: absolute;
        inset:-19px 4px -6px 4px;
        background:black;
        padding: 20px 40px;
        border-radius: 8px;
        z-index: 2;
        display: flex;
        flex-direction: column;
      }
      .width i{
        position: absolute;
        left: 0;
        bottom: 0;
        width:180%;
        height:2px;
        background-color: white;
        border-radius: 4px;
        overflow: hidden;
      }
      h2{
        text-align: center;
  display: flex;
color: transparent;
font-size: 35px;       

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
   .top-bar{
    background-color: rgba(255,255,255,0.1);
   }
   .top-bar-section{
    background-color: rgba(255,255,255,0.1);
   }
   .punch {
  background: none;
  border: none;
  color: #ea1d6f;
  font-size: 14px;
  cursor: pointer;
  outline: none;
}

.punch:hover {
  font-size: 20px;
  color: #b9134f;
}
.right-inline{
  margin-left: 10px;
  position: absolute;
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
          <li><a href="orders.php">My Orders</a></li>
          <li><a href="contact.php">Contact</a></li>
          <?php

          if(isset($_SESSION['username'])){
            echo '<li><a href="account.php">My Account</a></li>';
            echo '<li><a href="logout.php">Log Out</a></li>';
          }
          else{
            echo '<li><a href="login.php">Log In</a></li>';
            echo '<li class="active"><a href="register.php">Register</a></li>';
          }
          ?>
        </ul>
      </section>
    </nav>



<div class="login">
<div class="box">
<h2 class="borderline"></h2>
    <form method="POST" action="insert.php" style="margin-top:30px;">
      <div class="row">
        <div class="small-8">
        <h2>
    <span style="--i:1">R</span>
      <span style="--i:2">e</span>
      <span style="--i:3">g</span>
      <span style="--i:4;">i</span>
      <span style="--i:5">s</span>
      <span style="--i:5">t</span>
      <span style="--i:5">e</span>
      <span style="--i:5">r</span>

</h2>

          <div class="row">
          <div class="op">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">First Name</label>
            </div>
            <div class="small-8 columns">
            <div class="width">
              <input type="text" id="right-label" placeholder="Enter FirstName" name="fname">
            </div> </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Last Name</label>
            </div>
            <div class="small-8 columns">
            <div class="width">
              <input type="text" id="right-label" placeholder="Enter LastName" name="lname">
            </div> </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Address</label>
            </div>
            <div class="small-8 columns">
            <div class="width">
              <input type="text" id="right-label" placeholder="Type Your Address" name="address">
            </div> </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">City</label>
            </div>
            <div class="small-8 columns">
            <div class="width">
              <input type="text" id="right-label" placeholder="Type Your City" name="city">
            </div> </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Pin Code</label>
            </div>
            <div class="small-8 columns">
            <div class="width">
              <input type="number" id="right-label" placeholder="Enter Pincode" name="pin">
            </div> </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">E-Mail</label>
            </div>
            <div class="small-8 columns">
            <div class="width">
              <input type="email" id="right-label" placeholder="Type Your Email" name="email">
            </div> </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Password</label>
            </div>
            <div class="small-8 columns">
            <div class="width">
              <input type="password" id="right-label" name="pwd" placeholder="Enter Password">
            </div>
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">

            </div>
            <div class="small-8 columns">
              <input type="submit" class="punch" id="right-label" value="Register" >
              <input type="reset" class="punch" id="right-label" value="Reset" >
            </div>
          </div>
        </div>
      </div>
    </form>


    </div>
    <div class="row" style="margin-top:10px;">
      <div class="small-12">

        <footer>
           <p style="text-align:center; font-size:0.8em;">&copy; Sudeeps Cars. All Rights Reserved.</p>
        </footer>

      </div>
    </div>




    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
