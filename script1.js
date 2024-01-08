document.addEventListener("DOMContentLoaded", function () {
    const section1 = document.getElementById('landing_page-home');
    const navbar = document.querySelector('.navcontainer');
    const navbarchild = document.querySelector('.navbar');
    const section2 = document.querySelector('.section2items');
    const section3 = document.querySelector('.section3_home');
    let transitionStarted = false;
    const section4 = document.querySelector('.section4_home');

    window.addEventListener('scroll', function () {
        const section1Rect = section1.getBoundingClientRect();
        const section2Rect = section2.getBoundingClientRect();
        const section3Rect = section3.getBoundingClientRect();
        const section4Rect = section4.getBoundingClientRect();

        if (section1Rect.top <= 0 && section1Rect.bottom >= 0) {
            // Hide the navbar when section 1 is in view
            navbar.style.transition = 'opacity 0.4s';
            navbar.style.opacity = 0;
        } else {
            // Show the navbar when section 1 is out of view
            navbar.style.transition = 'opacity 0.7s';
            navbar.style.opacity = 1;
        }

        const twentyPercentHeight = section2Rect.height * 0.2;

        if (section2Rect.bottom < twentyPercentHeight && transitionStarted) {
            // Reset the flag variable when section2 is no longer in view
            transitionStarted = false;

            // Show section 2 smoothly
            section2.style.transition = 'opacity 0.4s ease-in';
            section2.style.opacity = 1;


        }

        else if (section2Rect.top <= navbar.offsetHeight + 2 && section2Rect.bottom >= 0 && !transitionStarted) {
            // When section2 hits the navbar and transition for section3 hasn't started yet
            transitionStarted = true;

            // Hide section 2 smoothly
            section2.style.transition = 'opacity 0.3s ease';
            section2.style.opacity = 0;

            // Show section 3 smoothly
            section3.style.transition = 'opacity 0.7s, transform 0.5s';
            section3.style.opacity = 1;
            section3.style.transform = 'translateY(0%)';
        }



        if (section4Rect.top <= 0 && section4Rect.bottom >= 0) {
            navbar.style.backgroundColor = 'transparent';
            navbar.style.transition = 'background-color 0.8s ease-in-out, opacity 1s ease-in-out';
            navbar.style.height = '0';

            navbarchild.style.width = '100vw';
            navbarchild.style.left = '0';
            navbarchild.style.top = '0';
            navbarchild.style.borderRadius = '2px';
            navbarchild.style.transition = 'width 0.4s ease-in-out, left 0.4s ease-in-out, top 0.4s ease-in-out, background-color 0.4s ease-in-out, opacity 1s ease-in-out';
        } else {
            navbar.style.backgroundColor = '#C1DCC3';
            navbar.style.transition = 'background-color 1.8s ease-in-out';
            navbar.style.height = '9%';
            navbarchild.style.width = '85vw';
            navbarchild.style.left = '7.5%';
            navbarchild.style.top = '2%';
            navbarchild.style.borderRadius = '20px';
            navbarchild.style.transition = 'width 1s ease-in-out, left 1s ease-in-out, top 1s ease-in-out, background-color 1s ease-in-out, opacity 1s ease-in-out';
        }


    });


    let currentIndex = 1;
    const totalImages = 4; // Total number of images
    
    function changeImage() {
        const images = document.querySelectorAll('.s4images img');
        const newImageSources = [];
    
        // Toggle between two sets of images based on currentIndex
        if (currentIndex === 1) {
            newImageSources.push('img/fashionimg2.png');
            newImageSources.push('img/fashionimg4.png');
            newImageSources.push('img/fashionimg8.png');
            newImageSources.push('img/fashionimg9.png');
        } else {
            newImageSources.push('img/fashionimg7.png');
            newImageSources.push('img/fashionimg1.png');
            newImageSources.push('img/fashionimg3.png');
            newImageSources.push('img/fashionimg6.png');
        }
    
        images.forEach((img, index) => {
            img.src = newImageSources[index];
        });
    
        // Increment index or reset to 1
        currentIndex = currentIndex === totalImages ? 1 : currentIndex + 1;
    }
    
    // Change image every 5 seconds
    setInterval(changeImage, 5000);
    
    // View More button functionality
    const viewMoreBtn = document.querySelector('.s4viewmore');
    viewMoreBtn.addEventListener('click', function() {
        window.location.href = 'fashion.php';
    });
    
    
});
