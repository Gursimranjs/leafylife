<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylefashion.css">
    <title>Document</title>
</head>
<body>

<div class="section1fashion">
<div class="navbar">
            <div class="Brandlogo">
                <a href="index.php">LeafyLife</a>
            </div>
            <div class="nav-items">
                <ul class="items">
                    <li class="nav-item"><a href="about.php">About</a></li>
                    <li class="nav-item"><a href="Food.php">Food</a></li>
                    <li class="nav-item"><a href="fashion.php">Fashion</a></li>
                    <li class="nav-item"><a href="cart.php">Cart</a></li>
                </ul>
            </div>
            <?php
            if (isset($_SESSION["user"])) {
                $userN = $_SESSION['user']['name']; // Access the name from the session array
                echo '<div class="dropdown">';
                echo '<a href="#" class="dropbtn">' . $userN . '</a>';
                echo '<div class="dropdown-content">';
                echo '<a href="profile.php">Profile</a>';
                echo '<a href="orders.php">Orders</a>';
                echo '<a href="logout.php">Logout</a>';
                echo '</div>';
                echo '</div>';
            } else {
                echo '<a href="LoginSetup/login.php">Sign in</a>';
            }
            ?>
        </div>


        <!-- picturecrousalfashion -->

        <div class="picturecrousalfashion">
                <div class="images">
                    <img src="img/fashionimg1.png" alt="">
                </div>


        </div>

        

        <div class="heading1">
            Products that make a difference
        </div>

        <div class="collections">
            <div class="collection1">
                <div class="product">
                    <img src="img/fashionimg2.png" alt="">
                </div>
                <div class="product">
                <img src="img/fashionimg6.png" alt="">
                </div>
            </div>
            <div class="collection1">
                <div class="product">
                <img src="img/fashionimg4.png" alt="">
                </div>
                <div class="product">
                <img src="img/fashionimg5.png" alt="">
                </div>
            </div>
            <div class="collection1">
                <div class="product">
                <img src="img/fashionimg7.png" alt="">
                </div>
                <div class="product">
                <img src="img/fashionimg8.png" alt="">
                </div>
            </div>
            <div class="collection1">
                <div class="product">
                <img src="img/fashionimg9.png" alt="">
                </div>
                <div class="product">
                <img src="img/fashionimg3.png" alt="">
                </div>
            </div>

            <br>
            <br><br><br><br>
            <div class="heading2">More products coming soon...</div>
            <br><br><br><br>
        </div>

</div>


<br>

       

        
</body>
</html>