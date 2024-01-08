<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Stylefood.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" href="chatbot/style.css">
       <!-- Google Fonts Link For Icons -->
       <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,1,0" />
    <script src="chatbot/chatscript.js" defer></script>
    <title>Leafylife</title>
</head>

<body>

    <div class="navbar-food" id="navbar">
        <div class="Brandlogo-food">
            <a href="index.php">LeafyLife</a>
        </div>

        <div class="nav-items-food">
            <ul class="items-nav-food">
                <li class="nav-item-food"><a href="about.php">About</a></li>
                <li class="nav-item-food"><a href="Food.php">Food</a></li>
                <li class="nav-item-food"><a href="fashion.php">Fashion</a></li>
                <li class="nav-item-food"><a href="cart.php">Cart</a></li>
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


    <!-- section 1 starts here -->
    <section class="section1-food">

    </section>

    <!-- section 2 starts here -->

    <section class="section2-food">

        <div class="navandsearchs2">

            <div class="navsection2">
                <div id="logo-food">
                    <a id="logo-foodtext" href="index.php">LeafyLife</a>
                </div>

                <div class="navbars2-food">


                    <div class="nav-items-foods2">
                        <ul class="items-nav-foods2">
                            <li class="nav-item-foods2"><a href="about.php">About</a></li>
                            <li class="nav-item-foods2"><a href="Food.php">Food</a></li>
                            <li class="nav-item-foods2"><a href="fashion.php">Fashion</a></li>
                            <li class="nav-item-foods2"><a href="cart.php">Cart</a></li>
                        </ul>
                    </div>
                    <div class="signinlinks2">

                        <?php
                        if (isset($_SESSION["user"])) {
                            $userN = $_SESSION['user']['name']; // Access the name from the session array
                            echo '<div class="dropdown">';
                            echo '<a href="#" class="dropbtns2">' . $userN . '</a>';
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

                <div class="search-container">
                    <input type="text" id="search-input" placeholder="   Search...">
                </div>
            </div>


            <div class="buttonss2-food">
                <div class="buttonsfilters2">

                    <button class="allitemss2 btnfilters2 active" data-filter="all">
                        All items
                    </button>
                    <button class="mealkitss2 btnfilters2" data-filter="meal-kit">
                        Mealkits
                    </button>
                    <button class="recipiess2 btnfilters2" data-filter="recipe">
                        Recipies
                    </button>
                </div>

            </div>
        </div>

        <div class="fooditemscontainer">

            <div data-name="meal-kit" class="item1 items">
                <img class="imageofitem " src="img/mealkitimg1.png" alt="">
                <div class="itemname-and-price ">
                    <p>Plantkit</p>
                    <span class="itemprice">$26</span>
                </div>
                <div class="itemdesc-and-quantity">
                    <p class="itemdesc"> A comprehensive kit designed for culinary diversity, featuring protein-rich
                        essentials like chickpeas and versatile tofu, paired with an assortment of vibrant veggies. This
                        kit is a treasure trove of essential vitamins such as Vitamin A, K, and folate, catering to a
                        wholesome, plant-centric lifestyle with utmost ease.</p>
                    <div class="quantity">
                        <span class="minus">-</span>
                        <span class="num">01</span>
                        <span class="plus">+</span>
                    </div>
                    <div class="cart-and-wishlist">
                        <button class="additemtocart" data-product="Plantkit" data-price="26"
                            data-image="img/mealkitimg1.png">Add to cart</button>
                        <button id="buynow">Buy now</button>
                    </div>
                </div>


            </div>
            <div data-name="meal-kit" class="item2 items">
                <img class="imageofitem " src="img/mealkitimg2.png" alt="">
                <div class="itemname-and-price ">
                    <p>GreenFare Box</p>
                    <span class="itemprice">$37</span>
                </div>
                <div class="itemdesc-and-quantity">
                    <p class="itemdesc"> A bountiful assortment of fresh, organic produce, hearty grains, and flavorful
                        sauces, meticulously curated to provide a balanced vegan experience. Loaded with nourishing
                        plant-based proteins such as quinoa and lentils, alongside an array of vibrant vegetables
                        offering a bounty of vitamins, notably Vitamin C, fostering a holistic and nutritious culinary
                        journey.</p>
                    <div class="quantity">
                        <span class="minus">-</span>
                        <span class="num">01</span>
                        <span class="plus">+</span>
                    </div>
                    <div class="cart-and-wishlist">
                        <button class="additemtocart" data-product="GreenFare box" data-price="37"
                            data-image="img/mealkitimg2.png">Add to cart</button>
                        <button id="buynow">Buy now</button>
                    </div>
                </div>
            </div>


            <div data-name="meal-kit" class="item3 items">
                <img class="imageofitem " src="img/mealkitimg6.png" alt="">
                <div class="itemname-and-price ">
                    <p>VegEase Pack</p>
                    <span class="itemprice">$32</span>
                </div>
                <div class="itemdesc-and-quantity">
                    <p class="itemdesc">A hassle-free solution with pre-measured, high-quality ingredients and a
                        spectrum of aromatic spices, fostering not just convenience but also nutritional richness.
                        Anchored in plant-based proteins like soy and beans, it's a flavorful expedition complemented by
                        the benefits of Vitamin B12, ensuring a satisfying, healthful vegan meal.</p>
                    <div class="quantity">
                        <span class="minus">-</span>
                        <span class="num">01</span>
                        <span class="plus">+</span>
                    </div>
                    <div class="cart-and-wishlist">
                        <button class="additemtocart" data-product="VegEase Pack" data-price="32"
                            data-image="img/mealkitimg6.png">Add to cart</button>
                        <button id="buynow">Buy now</button>
                    </div>
                </div>
            </div>


            <div data-name="meal-kit" class="item4 items">
                <img class="imageofitem " src="img/mealkitimg7.png" alt="">
                <div class="itemname-and-price ">
                    <p>PureVegan Set</p>
                    <span class="itemprice">$46</span>
                </div>
                <div class="itemdesc-and-quantity">
                    <p class="itemdesc">A thoughtfully assembled selection of premium vegan ingredients, including
                        nutrient-dense nuts and seeds teeming with Omega-3s and iron. Crafted to enhance Vitamin D
                        intake, this kit is geared towards elevating the nutritional profile of vegan diets, ensuring a
                        robust, well-rounded culinary experience.</p>
                    <div class="quantity">
                        <span class="minus">-</span>
                        <span class="num">01</span>
                        <span class="plus">+</span>
                    </div>
                    <div class="cart-and-wishlist">
                        <button class="additemtocart" data-product="PureVegan Set" data-price="46"
                            data-image="img/mealkitimg7.png">Add to cart</button>
                        <button id="buynow">Buy now</button>
                    </div>
                </div>
            </div>


            <div data-name="meal-kit" class="item5 items">
                <img class="imageofitem " src="img/mealkitimg5.png" alt="">
                <div class="itemname-and-price ">
                    <p>VeganEats Box</p>
                    <span class="itemprice">$28</span>
                </div>
                <div class="itemdesc-and-quantity">
                    <p class="itemdesc"> A culinary passport to diverse, globally-inspired vegan recipes featuring
                        seitan, tempeh, and an assortment of Vitamin E-rich nuts. This all-inclusive kit offers
                        convenience without compromising on nutrition, enabling a delectable exploration of vegan
                        gastronomy.</p>
                    <div class="quantity">
                        <span class="minus">-</span>
                        <span class="num">01</span>
                        <span class="plus">+</span>
                    </div>
                    <div class="cart-and-wishlist">
                        <button class="additemtocart" data-product="VeganEats Box" data-price="28"
                            data-image="img/mealkitimg2.png">Add to cart</button>
                        <button id="buynow">Buy now</button>
                    </div>
                </div>
            </div>


            <div data-name="allitem" class="item6 items">
                <img class="imageofitem " src="img/productimg1.png" alt="">
                <div class="itemname-and-price ">
                    <p>TofuTaste Blocks</p>
                    <span class="itemprice">$12</span>
                </div>
                <div class="itemdesc-and-quantity">
                    <p class="itemdesc">Highly versatile soy-based protein blocks boasting essential minerals like iron
                        and calcium, making them an ideal cornerstone for crafting an array of delectable and nutritious
                        vegan dishes.</p>
                    <div class="quantity">
                        <span class="minus">-</span>
                        <span class="num">01</span>
                        <span class="plus">+</span>
                    </div>
                    <div class="cart-and-wishlist">
                        <button class="additemtocart" data-product="TofuTaste Blocks" data-price="12"
                            data-image="img/productimg1.png">Add to cart</button>
                        <button id="buynow">Buy now</button>
                    </div>
                </div>
            </div>


            <div data-name="allitem" class="item7 items">
                <img class="imageofitem " src="img/productimg2.png" alt="">
                <div class="itemname-and-price ">
                    <p>NutriBlend Powder</p>
                    <span class="itemprice">$18</span>
                </div>
                <div class="itemdesc-and-quantity">
                    <p class="itemdesc">A nutritionally dense amalgamation of powerhouse seeds and nuts like hemp and
                        chia, providing not just plant-based proteins but also the added health benefits of Vitamin B6,
                        augmenting the nutritional quotient of your meals or beverages.</p>
                    <div class="quantity">
                        <span class="minus">-</span>
                        <span class="num">01</span>
                        <span class="plus">+</span>
                    </div>
                    <div class="cart-and-wishlist">
                        <button class="additemtocart" data-product="NutriBlend Powder" data-price="18"
                            data-image="img/productimg2.png">Add to cart</button>
                        <button id="buynow">Buy now</button>
                    </div>
                </div>
            </div>


            <div class="item8 items">
                <img class="imageofitem " src="img/productimg3.png" alt="">
                <div class="itemname-and-price ">
                    <p>CrispChips Snack</p>
                    <span class="itemprice">$12</span>
                </div>
                <div class="itemdesc-and-quantity">
                    <p class="itemdesc">Wholesome, oven-baked chips crafted from an assortment of nutrient-packed
                        vegetables, serving as a guilt-free snack option rich in Vitamin A and potassium, fostering both
                        taste and health in every bite.</p>
                    <div class="quantity">
                        <span class="minus">-</span>
                        <span class="num">01</span>
                        <span class="plus">+</span>
                    </div>
                    <div class="cart-and-wishlist">
                        <button class="additemtocart" data-product="CrispChips Snack" data-price="12"
                            data-image="img/productimg3.png">Add to cart</button>
                        <button id="buynow">Buy now</button>
                    </div>
                </div>
            </div>

            <div class="item9 items">
                <img class="imageofitem " src="img/mealkitsimg3.png" alt="">
                <div class="itemname-and-price ">
                    <p>OatGood Milk</p>
                    <span class="itemprice">$14</span>
                </div>
                <div class="itemdesc-and-quantity">
                    <p class="itemdesc">Creamy and nourishing oat-based milk delivering essential nutrients like
                        calcium, Vitamin D, and riboflavin, providing a versatile and flavorful addition to your daily
                        vegan dietary regimen. 2L packaging</p>
                    <div class="quantity">
                        <span class="minus">-</span>
                        <span class="num">01</span>
                        <span class="plus">+</span>
                    </div>
                    <div class="cart-and-wishlist">
                        <button class="additemtocart" data-product="OatGood Milk" data-price="14"
                            data-image="img/mealkitsimg3.png">Add to cart</button>
                        <button id="buynow">Buy now</button>
                    </div>
                </div>
            </div>


            <div class="item10 items">
                <img class="imageofitem " src="img/productimg4.png" alt="">
                <div class="itemname-and-price ">
                    <p>ChocoBliss Spread</p>
                    <span class="itemprice">$21</span>
                </div>
                <div class="itemdesc-and-quantity">
                    <p class="itemdesc">A delectable indulgence created from natural ingredients like hazelnuts and
                        almonds, enriched with antioxidants such as Vitamin E, making it a delightful and nutritious
                        topping for various vegan treats.</p>
                    <div class="quantity">
                        <span class="minus">-</span>
                        <span class="num">01</span>
                        <span class="plus">+</span>
                    </div>
                    <div class="cart-and-wishlist">
                        <button class="additemtocart" data-product="ChocoBliss Spread" data-price="21"
                            data-image="img/productimg4.png">Add to cart</button>
                        <button id="buynow">Buy now</button>
                    </div>
                </div>
            </div>


            <div class="item11 items">
                <img class="imageofitem " src="img/productimg6.png" alt="">
                <div class="itemname-and-price ">
                    <p>seaweedCrisp Bites</p>
                    <span class="itemprice">$25</span>
                </div>
                <div class="itemdesc-and-quantity">
                    <p class="itemdesc"> Crispy, meticulously seasoned seaweed snacks offering not just an umami-rich
                        taste but also a plethora of health benefits, including iodine and Vitamin K, promoting overall
                        well-being while satisfying snack cravings.</p>
                    <div class="quantity">
                        <span class="minus">-</span>
                        <span class="num">01</span>
                        <span class="plus">+</span>
                    </div>
                    <div class="cart-and-wishlist">
                        <button class="additemtocart" data-product="seaweedCrisp Bites" data-price="25"
                            data-image="img/productimg6.png">Add to cart</button>
                        <button id="buynow">Buy now</button>
                    </div>
                </div>
            </div>

            <div data-name="recipe" class="recipies recipie1">
                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/7k6CKTYZbp0?si=2ECKWgdYUi7uTgGR"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen></iframe>
            </div>
            <div data-name="recipe" class="recipies recipie2"><iframe width="100%" height="100%"
                    src="https://www.youtube.com/embed/h7UTsP0hXo4?si=Dxir5WvZBHG_PXNa" title="YouTube video player"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen></iframe></div>
            <div data-name="recipe" class="recipies recipie3"><iframe width="100%" height="100%"
                    src="https://www.youtube.com/embed/-zkj_8bOd58?si=u5xQiNpny-A7VyxX" title="YouTube video player"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen></iframe></div>
            <div data-name="recipe" class="recipies recipie4"><iframe width="100%" height="100%"
                    src="https://www.youtube.com/embed/Zpqa1nRteBk?si=tryMhpvH6olcWfeX" title="YouTube video player"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen></iframe></div>
            <div data-name="recipe" class="recipies recipie5"><iframe width="100%" height="100%"
                    src="https://www.youtube.com/embed/Iw8L4K6pM6U?si=ur5pf3bo0QkKMAkp" title="YouTube video player"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen></iframe></div>
            <div data-name="recipe" class="recipies recipie6"><iframe width="100%" height="100%"
                    src="https://www.youtube.com/embed/vhKNKGt4XWM?si=fmAsPEwulMub5Npo" title="YouTube video player"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen></iframe></div>


        </div>




    </section>
  
    <button class="chatbot-toggler">
      <span class="material-symbols-rounded">mode_comment</span>
      <span class="material-symbols-outlined">close</span>
    </button>
    <div class="chatbot">
      <header>
        <h2>Chatbot</h2>
        <span class="close-btn material-symbols-outlined">close</span>
      </header>
      <ul class="chatbox">
        <li class="chat incoming">
          <span class="material-symbols-outlined">smart_toy</span>
          <p>Hi there 👋<br>How can I help you today?</p>
        </li>
      </ul>
      <div class="chat-input">
        <textarea placeholder="Enter a message..." spellcheck="false" required></textarea>
        <span id="send-btn" class="material-symbols-rounded">send</span>
      </div>
    </div>


    <script src="script2.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>