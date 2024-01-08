document.addEventListener('DOMContentLoaded', function () {
    const section1 = document.querySelector('.section1-food');
    const section2 = document.querySelector('.section2-food');
    const navbar = document.querySelector('.navbar-food');
    const navlogo = document.getElementById('logo-foodtext');
    const navbars2 = document.querySelector('.navbars2-food');
    const searchbar = document.querySelector('.search-container');
    const headers2 = document.querySelector('.navandsearchs2');
    const filterButtons = document.querySelectorAll(".buttonsfilters2");
    const filterableItems = document.querySelectorAll(".items");
    let timeoutId;
    let isNavHovered = false;

    window.addEventListener('scroll', function () {
        const section1Rect = section1.getBoundingClientRect();

        if (section1Rect.top <= 0 && section1Rect.bottom >= -1) {
            navbar.style.transition = 'opacity 0.7s';
            navbar.style.opacity = 1;
            navlogo.style.opacity = 0;
            navbar.style.position = 'fixed';
            headers2.style.position = 'relative';
            headers2.style.opacity = 0;
            section2.style.transition = "opacity 0.2s ease-out"
            searchbar.style.opacity = 0;
            section2.style.opacity = 0;
            navbars2.style.visibility = 'visible'; // Show navbars2 in section1
        } else {
            navbar.style.transition = 'opacity 0.4s';
            navbar.style.opacity = 0;
            navbar.style.position = 'absolute';
            navlogo.style.opacity = 1;
            headers2.style.opacity = 1;
            headers2.style.position = 'fixed';
            section2.style.opacity = 1;
            section2.style.transition = "opacity 0.3s ease-in"
            searchbar.style.transition = 'opacity 0.2s';
            searchbar.style.opacity = 1;

            navbars2.style.visibility = 'hidden'; // Hide navbars2 outside section1
        }
    });

    navlogo.addEventListener('mouseenter', function () {
        clearTimeout(timeoutId);
        navbars2.style.transition = 'opacity 0.4s';
        navbars2.style.opacity = 1;
        navbars2.style.visibility = 'visible';
    });

    navlogo.addEventListener('mouseleave', function () {
        if (!isNavHovered) {
            timeoutId = setTimeout(function () {
                navbars2.style.opacity = 0;
                navbars2.style.visibility = 'hidden';
            }, 10000);
        }
    });

    navbars2.addEventListener('mouseenter', function () {
        isNavHovered = true;
    });

    navbars2.addEventListener('mouseleave', function () {
        isNavHovered = false;
        if (!isNavHovered) {
            timeoutId = setTimeout(function () {
                navbars2.style.opacity = 0;
                navbars2.style.visibility = 'hidden';
            }, 2000);
        }
    });


    // for food items buttons

    const filterItems = (e) => {
        const recipies = document.querySelectorAll(".recipies")
        const selectedFilter = e.target.dataset.filter;
        document.querySelector(".buttonsfilters2 .active").classList.remove("active");
        e.target.classList.add("active");

        filterableItems.forEach(item => {
            if (selectedFilter === "all" || item.dataset.name === selectedFilter) {
                item.style.display = "flex"; // Show items that match the filter
                item.style.transition = "display 0.7s ease-in"


            }

            else {
                item.style.display = "none"; // Hide items that don't match the filter
                item.style.transition = "display 0.7s ease-out"
            }

        });
        recipies.forEach(item => {
            if (item.dataset.name === selectedFilter) {
                item.style.display = "flex"; // Show items that match the filter
                item.style.transition = "display 0.7s ease-in"


            }

            else {
                item.style.display = "none"; // Hide items that don't match the filter
                item.style.transition = "display 0.7s ease-out"
            }

        });
    };

    // Add click event listeners to filter buttons
    filterButtons.forEach(button => button.addEventListener("click", filterItems));




    // code for setting quantity
    $(document).ready(function () {
        $('.items').click(function (event) {
            var clickedItem = $(this);
            
            if (clickedItem.hasClass('enlarged-items')) {
                return; // If already enlarged, do nothing
            }
            
            $('.items').not(clickedItem).removeClass('enlarged-items');
            $('.imageofitem').removeClass('enlarged-imageofitem');
            $('.itemname-and-price').removeClass('enlarged-itemname-and-price');
            $('.itemdesc-and-quantity').hide();
            
            // Toggle the class on the clicked item
            clickedItem.addClass('enlarged-items');
            clickedItem.find('.itemdesc-and-quantity').show();
            $('.imageofitem', clickedItem).addClass('enlarged-imageofitem');
            $('.itemname-and-price', clickedItem).addClass('enlarged-itemname-and-price');
    
            // Click event for plus and minus buttons within the clicked item
            const plus = clickedItem.find(".plus");
            const minus = clickedItem.find(".minus");
            const num = clickedItem.find(".num");
            let quantity = parseInt(num.text());
    
            plus.on("click", () => {
                quantity++;
                quantity = (quantity < 10) ? "0" + quantity : quantity;
                num.text(quantity);
            });
    
            minus.on("click", () => {
                if (quantity > 0) {
                    quantity--;
                    quantity = (quantity < 10) ? "0" + quantity : quantity;
                    num.text(quantity);
                }
            });
    
            event.stopPropagation(); // Prevent event bubbling
        });
    
        // Click event outside the items to collapse them except when clicking on itemdesc-and-quantity
        $(document).click(function (event) {
            var target = $(event.target);
            if (!target.closest('.items').length && !target.closest('.itemdesc-and-quantity').length) {
                $('.items').removeClass('enlarged-items');
                $('.itemdesc-and-quantity').hide();
                $('.imageofitem').removeClass('enlarged-imageofitem');
                $('.itemname-and-price').removeClass('enlarged-itemname-and-price');
            }
        });
    });
    
    
    // adding to cart

    $(document).ready(function () {
        $('.additemtocart').click(function () {
            var button = $(this);
            var productName = button.data('product');
            var productPrice = button.data('price');
            var productImage = button.data('image');
            var quantity = button.closest('.items').find('.num').text();
            
            console.log('Button clicked'); // Log to the console when the button is clicked
        
            $.ajax({
                url: 'addtocart.php',
                method: 'POST',
                data: {
                    product_name: productName,
                    product_price: productPrice,
                    product_image: productImage,
                    quantity: quantity
                },
                success: function (response) {
                    button.html('Added to cart'); // Change the button text
                    button.attr('disabled', true); // Optionally disable the button
                    alert(response); // Show response from addToCart.php
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText); // Log any errors to the console
                }
            });
        });
    });


    const searchInput = document.getElementById('search-input');
    const foodItemsContainer = document.querySelector('.fooditemscontainer');
    const items = foodItemsContainer.getElementsByClassName('items');

    // Add event listener to the search input
    searchInput.addEventListener('input', function (event) {
        const searchTerm = event.target.value.toLowerCase().trim();

        // Loop through all items
        for (let i = 0; i < items.length; i++) {
            const itemName = items[i].querySelector('.itemname-and-price p').textContent.toLowerCase();

            // Check if the item name includes the search term
            if (itemName.includes(searchTerm)) {
                console.log("it existes")
                items[i].style.display = 'flex'; // Show the item
            } else {
                items[i].style.display = 'none'; // Hide the item
            }
        }
    
});

    
    
    
});


 