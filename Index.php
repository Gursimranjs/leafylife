<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="Stylehome.css">
    <title>Leafylife</title>
</head>

<body>

    <!-- Navbar code -->
    <div class="navcontainer">
        <div class="navbar">
            <div class="Brandlogo">
                <a href="index.php">LeafyLife</a>
            </div>

            <div class="nav-items">
                <ul class="items">
                    <li class="nav-item"><a href="about.php">About</a></li>
                    <li class="nav-item"><a href="Food.php">Food</a></li>
                    <li class="nav-item"><a href="#">Fashion</a></li>
                    <li class="nav-item"><a href="cart.php">Cart</a></li>
                </ul>
            </div>
            <div class="signinlink">

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

        </div>
    </div>
    <!-- when a user starts website he is asked to log in or sign up the login should be a thing itself with good ui -->

    <section id="landing_page-home">
        <div class="heading1">
            <div class="headinghome"> Leafylife</div>
            <div class="subheadinghome">Your vegan life Enhances Here</div>
        </div>
    </section>






    <!-- Section 2 for home page -->
    <section class="section2_home">


        <!-- code for group of 4 images and text -->
        <div class="section2items">
            <div class="text-homeS2">
                <div id="productsline-homeS2">
                    Eat products that make you better and keep your veganism tasty.
                </div>

                <button id="viewproductsbtn-homeS2">Check products..</button>
            </div>

            <div class="imagesgroup-homes2">

                <div class="topgroup-homes2">
                    <img id="topgrp-img1-homeS2" src="img/mealkitimg5.png" alt="">
                    <img id="topgrp-img2-homeS2" src="img/mealkitimg7.png" alt="">
                </div>

                <div class="bottomgroup-homes2">
                    <img id="bottomgrp-img1-homeS2" src="img/productimg4.png" alt="">
                    <img id="bottomgrp-img2-homeS2" src="img/mealkitsimg3.png" alt="">
                </div>
            </div>

        </div>
        <script>document.addEventListener("DOMContentLoaded", function () {
                // Get the button element
                var viewmores2 = document.getElementById("viewproductsbtn-homeS2");

                // Add a click event listener to the button
                viewmores2.addEventListener("click", function () {
                    // Navigate to "food.php#section2"
                    window.location.href = "food.php#section2";
                });
            });</script>

    </section>


    <!-- Section 3 for home page -->

    <Section class="section3_home">

        <div class="section3items">
            <div class="section3heading">
                Check out the recipies that take no time but many Tastebuds.
            </div>
            <div class="section3imggrp-home">
                <div id="img1s3">
                    <iframe width="100%" height="100%"
                        src="https://www.youtube.com/embed/vhKNKGt4XWM?si=fmAsPEwulMub5Npo" title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
                <div id="img2s3">
                    <iframe width="100%" height="100%"
                        src="https://www.youtube.com/embed/7k6CKTYZbp0?si=2ECKWgdYUi7uTgGR" title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
            </div>
            <button id="s3explore">
                Explore...
            </button>
        </div>
        <script>document.addEventListener("DOMContentLoaded", function () {
                // Get the button element
                var exploreButton = document.getElementById("s3explore");

                // Add a click event listener to the button
                exploreButton.addEventListener("click", function () {
                    // Navigate to "food.php#section2"
                    window.location.href = "food.php#section2";
                });
            });</script>

    </Section>


    <section class="section4_home">

        <div class="s4heading">
            Because Fashion matters...
        </div>

        <div class="section4items">
            <div id="img1s4" class="s4images">
                <img src="img/fashionimg7.png" alt="">
            </div>
            <div id="img2s4" class="s4images">
                <img src="img/fashionimg1.png" alt="">
            </div>
            <div id="img3s4" class="s4images">
                <img src="img/fashionimg3.png" alt="">
            </div>
            <div id="img4s4" class="s4images">
                <img src="img/fashionimg6.png" alt="">
            </div>
        </div>

        <button class="s4viewmore">View More</button>
    </section>

    <footer class="footer-home">
    <p>© 2023 Leafylife.com All rights reserved.</p>

    </footer>

    <script src="script1.js"></script>

</body>

</html>