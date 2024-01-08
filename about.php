<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleabout.css">
    <title>LeafyLife</title>
</head>
<body>
    

        <!-- Navbar code -->

        <div class="navbar">
            <div class="Brandlogo">
                <a href="index.php">LeafyLife</a>
            </div>

            <div class="nav-items">
                <ul class="items">
                    <li class="nav-item"><a href="about.php">About</a></li>
                    <li class="nav-item"><a href="Food.php">Food</a></li>
                    <li class="nav-item"><a href="ashion.php">Fashion</a></li>
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


        <div class="companyinfo">

        <div class="heading-about">Leafylife</div>
        <div class="companydics">Welcome to LeafyLife, your ultimate destination for conscientious living! At LeafyLife, we're dedicated to offering a harmonious blend of delectable vegan meals and stylish, sustainable clothing. We take pride in crafting high-quality, plant-based dishes that tantalize your taste buds while respecting the environment. Our commitment to sustainability runs deep - from sourcing eco-friendly materials for our clothing line to ensuring our meals leave a minimal carbon footprint. Embrace a lifestyle that's kind to both your body and the planet with LeafyLife's carefully curated selection of vegan delights and earth-conscious apparel. Join us in cultivating a greener, more compassionate world, one leaf at a time.</div>

        <div class="heading-about">Environmental Impact</div>
        <div class="companydics">At LeafyLife, our commitment to sustainability is at the core of everything we do. We meticulously curate our supply chain, emphasizing local and organic produce for our meals and utilizing eco-conscious materials for our clothing line. Our efforts extend beyond ingredients and materials; we're dedicated to minimizing waste and reducing our carbon footprint. From compostable packaging for our meals to innovative recycling programs for clothing, we're constantly striving to leave the lightest ecological impact possible while nurturing a healthier planet for generations to come.</div>
        <div class="heading-about">Quality and Innovation</div> 
        <div class="companydics">
        Quality and innovation are the beating heart of LeafyLife. Our team is driven by a passion for crafting exceptional products that not only meet but exceed expectations. From the sourcing of the finest ingredients for our meals to the design process of our clothing, every step is infused with a commitment to excellence. We blend tradition with innovation, seeking out new ways to enhance flavors in our dishes and pioneering sustainable materials and techniques in our fashion line. Our dedication to pushing boundaries ensures that every product bearing the LeafyLife name is a testament to unparalleled quality and ingenuity.
        </div>
        <div class="heading-about">Mission and Values</div>
        <div class="companydics">At LeafyLife, our mission is simple yet profound: to champion a lifestyle that celebrates compassion, sustainability, and wellness. We believe in the power of plant-based living to transform not only individual health but also the health of the planet. Our values center on transparency, integrity, and ethical practices, guiding every decision we make. We aim to inspire conscious choices, foster a community passionate about cruelty-free living, and contribute to a world where sustainability is not just an option but a way of life.</div>
        <div class="heading-about">Product Range</div>
        <div class="companydics">LeafyLife proudly offers a diverse range of vegan delights and sustainable apparel, carefully curated to align with our values and meet the diverse needs of our customers. From mouthwatering plant-based meals crafted with locally sourced ingredients to stylish, eco-friendly clothing designed with both fashion and sustainability in mind, our product range reflects our commitment to quality, ethics, and a greener future.</div>
        <div class="heading-about">Awards and Certificates</div>
        <div class="companydics">LeafyLife is honored to have received certifications and awards recognizing our dedication to excellence and sustainability. Our commitment to maintaining the highest standards has been acknowledged through certifications for organic ingredients, cruelty-free practices, and sustainable manufacturing processes. These accolades serve as a testament to our unwavering pursuit of providing exceptional products while prioritizing environmental stewardship and ethical business practices.</div>
        <div class="contactinfo">

        </div>

        </div>
</body>
</html>