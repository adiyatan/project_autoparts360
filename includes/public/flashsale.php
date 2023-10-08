<?php
require 'includes/functions.php';
$flahsales = query("SELECT * FROM products");

function calculateStars($rating, $reviewCount)
{
    // Menghindari pembagian oleh nol dan jika review_count tidak tersedia
    if ($reviewCount == 0) {
        return 0;
    }

    // Hitung total bintang yang ada berdasarkan rating dan jumlah review
    $totalStars = $rating * $reviewCount;

    // Hitung rata-rata bintang
    $averageStars = round($totalStars / $reviewCount);

    // Pembulatan ke angka bulat terdekat untuk mendapatkan bintang yang benar-benar ada
    $wholeStars = floor($averageStars);

    // Jika rata-rata lebih besar dari atau sama dengan 0.5, maka tambahkan setengah bintang
    if ($averageStars - $wholeStars >= 0.5) {
        return $wholeStars + 0.5;
    }

    return $wholeStars;
}


?>

<style>
    body {
        font-family: 'YourLuxuriousFont', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f9f9f9;
        color: #333;
    }

    /* Container Styles */
    .container {
        padding: 20px;
    }

    .custom-container {
        max-width: 1200px;
        margin: 0 auto;
    }

    /* Clock Styles */
    .clock-part {
        border: 1px solid #333;
        border-radius: 10px;
        padding: 10px;
        box-shadow: 0px 3px 10px rgba(0, 0, 0, 0.2);
        font-size: 1.2em;
        background-color: #f9f9f9;
        color: #333;
    }

    .clock-part span:last-child {
        display: block;
        margin-top: 5px;
        text-transform: uppercase;
        letter-spacing: 2px;
        color: #666;
        font-size: 0.8em;
    }

    .clock-part::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #fff;
        width: 5px;
        height: 5px;
        border-radius: 50%;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        z-index: 1;
    }

    /* Additional Styling for a Luxurious Look */
    .clock-part {
        position: relative;
        overflow: hidden;
    }

    .clock-part:before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(to right, #ff9800, #ff5722);
        z-index: -1;
    }

    /* Animations */
    @keyframes gradientAnimation {
        0% {
            background-position: 0% 50%;
        }

        100% {
            background-position: 100% 50%;
        }
    }

    .clock-part:before {
        animation: gradientAnimation 5s linear infinite;
        background-size: 200% 200%;
    }

    /* Flashsale Header Styles */
    .flashsale-header {
        border: 1px solid #333;
        border-radius: 10px;
        padding: 10px;
        box-shadow: 0px 3px 10px rgba(0, 0, 0, 0.2);
        font-size: 1.2em;
        background-color: #f9f9f9;
        color: #333;
    }

    .flashsale-header span:last-child {
        display: block;
        margin-top: 5px;
        text-transform: uppercase;
        letter-spacing: 2px;
        color: #666;
        font-size: 0.8em;
    }

    .flashsale-header::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #fff;
        width: 5px;
        height: 5px;
        border-radius: 50%;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        z-index: 1;
    }

    .flashsale-header {
        position: relative;
        overflow: hidden;
    }

    .flashsale-header:before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(to right, #ff9800, #ff5722);
        z-index: -1;
    }

    /* Swiper Styles */
    .swiper-container {
        width: 100%;
        max-width: 900px;
        margin: 0 auto;
        overflow: hidden;
    }

    .swiper-slide {
        width: 280px;
        margin-right: 20px;
        background-color: #fff;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0px 3px 10px rgba(0, 0, 0, 0.2);
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .swiper-slide img {
        max-width: 100%;
        max-height: 150px;
        object-fit: cover;
        border-radius: 10px;
        box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.1);
    }

    .product-details {
        margin-top: 15px;
    }

    .product-name {
        font-size: 1.2em;
        margin: 5px 0;
        font-weight: bold;
    }

    .product-price {
        font-size: 1.3em;
        margin: 5px 0;
        font-weight: bold;
    }

    .product-rating {
        color: #ffd700;
        background: linear-gradient(135deg, #ffd700 0%, #f5cf34 100%);
        font-size: 1.5em;
        margin: 10px 0;
        padding: 5px 10px;
        border-radius: 5px;
    }

    .product-stock {
        background-color: #0066cc;
        color: #fff;
        font-size: 0.8em;
        padding: 5px 10px;
        border-radius: 5px;
    }

    /* Additional Styling for a Luxurious Look */
    .swiper-slide {
        position: relative;
        overflow: hidden;
        background: linear-gradient(135deg, #d89a9a 0%, #cf7b7b 100%);
        border: 1px solid #d89a9a;
    }

    .swiper-slide:before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, #b88181 0%, #c54e4e 100%);
        z-index: -1;
    }

    /* Animations */
    @keyframes gradientAnimation {
        0% {
            background-position: 0% 50%;
        }

        100% {
            background-position: 100% 50%;
        }
    }

    .swiper-slide:before {
        animation: gradientAnimation 5s linear infinite;
        background-size: 200% 200%;
    }

    /* Styling for a more luxurious look */
    .flashsale-header {
        border: 1px solid #ddd;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0px 3px 10px rgba(0, 0, 0, 0.1);
        font-size: 1.5em;
        background-color: #f9f9f9;
        color: #333;
        position: relative;
        overflow: hidden;
    }

    .flashsale-header:before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(to right, #f39c12, #e74c3c);
        z-index: -1;
    }

    .flashsale-header::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #fff;
        width: 5px;
        height: 5px;
        border-radius: 50%;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        z-index: 1;
    }

    .flashsale-header span:last-child {
        display: block;
        margin-top: 5px;
        text-transform: uppercase;
        letter-spacing: 2px;
        color: #666;
        font-size: 0.8em;
    }

    .see-more {
        background: linear-gradient(135deg, #d89a9a 0%, #cf7b7b 100%);
        padding: 10px 20px;
        border-radius: 5px;
        font-weight: bold;
        margin-top: 20px;
        color: #fff;
        box-shadow: 0px 3px 5px rgba(0, 0, 0, 0.1);
        transition: background 0.3s ease;
        display: inline-block;
        text-align: center;
        text-decoration: none;
        margin-left: auto;
    }

    /* Hover style for the see more link */
    .see-more:hover {
        /* Change background color on hover */
        background: linear-gradient(135deg, #b88181 0%, #c54e4e 100%);
    }

    .see-more-container {
        text-align: center;
        margin-top: 20px;
    }

    .fade-in {
        opacity: 0;
        animation: fadeInAnimation 1s ease-in forwards;
    }

    @keyframes fadeInAnimation {
        to {
            opacity: 1;
        }
    }
</style>

<div class="container mt-1  fade-in">
    <div class="custom-container" style="background-color:#fff; border-radius: 2%;"">
        <div class=" flashsale-header d-flex justify-content-between align-items-center mb-5">
        <h2 class="mb-0">Flashsale end in:</h2>
        <div id="clock" class="d-flex align-items-center clock-container">
            <div class="mx-1 clock-part">
                <span id="countdown-days" class="display-6"></span>
                <span class="clock-label">Days</span>
            </div>
            <div class="mx-1 clock-part">
                <span id="hours" class="display-6"></span>
                <span class="clock-label">Hours</span>
            </div>
            <div class="mx-1 clock-part">
                <span id="minutes" class="display-6"></span>
                <span class="clock-label">Minutes</span>
            </div>
            <div class="mx-1 clock-part">
                <span id="seconds" class="display-6"></span>
                <span class="clock-label">Seconds</span>
            </div>
        </div>
    </div>

    <!-- flashsale -->
    <div class="containerFlashsale">
        <div class="row" id="flashsaleLink">
            <!-- Place Swiper container here -->
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <?php foreach ($flahsales as $flashsale) :
                            // Simpan rating dan jumlah review dalam variabel (misalnya, diambil dari database)
                            $rating = $flashsale["rating"];
                            $reviewCount = isset($flashsale["review_count"]) ? $flashsale["review_count"] : 0;
                            $stars = calculateStars($rating, $reviewCount);

                            $originalPrice = $flashsale["price"];
                            $discountedPrice = $originalPrice * 0.2;
                        ?>
                            <div class="swiper-slide">
                                <div class="card">
                                    <img src="assets/img/<?= $flashsale["image"] ?>" class="card-img-top" alt="Product Image">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $flashsale["name"] ?></h5>
                                        <p class="card-text">
                                            <span class="original-price">
                                                <s>Rp. <?= number_format($originalPrice) ?></s>
                                            </span>
                                            <br>
                                            <span class="discounted-price placeholder">
                                                Rp. <?= number_format($discountedPrice) ?>
                                            </span>
                                        </p>
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <?php
                                                // Tampilkan bintang sesuai hasil perhitungan
                                                for ($i = 1; $i <= 5; $i++) {
                                                    if ($i <= $stars) {
                                                        echo '<i class="fas fa-star text-warning"></i>';
                                                    } elseif ($i - 0.5 <= $stars) {
                                                        echo '<i class="fas fa-star-half-alt text-warning"></i>';
                                                    } else {
                                                        echo '<i class="far fa-star text-warning"></i>';
                                                    }
                                                }
                                                ?>
                                            </div>
                                            <div>
                                                <span class="badge bg-primary">Stock = <?= $flashsale["stock"] ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <!-- End of Swiper container -->
        </div>
    </div>
    <div class="see-more-container">
        <a href="#" id="seeMoreButton" class="see-more">See more</a>
    </div>

</div>
</div>

<?php include 'includes/public/toast.php'; ?>

<script>
    // JavaScript code to handle the toast functionality when the flashsale is clicked
    document.addEventListener("DOMContentLoaded", function() {
        const flashsaleLink = document.getElementById("flashsaleLink");
        const seeMoreButton = document.getElementById("seeMoreButton");
        const toast = new bootstrap.Toast(document.querySelector(".toast"));

        flashsaleLink.addEventListener("click", function(event) {
            event.preventDefault(); // Prevent the default link behavior

            // Here, you can check if the user is logged in or not
            const isLoggedIn = false; // Replace 'false' with your logic to check if the user is logged in

            if (!isLoggedIn) {
                toast.show();
            } else {
                // Add the logic to navigate to the flashsale page if the user is logged in
                window.location.href = "your_flashsale_page.php"; // Replace with the actual URL
            }
        });

        seeMoreButton.addEventListener("click", function(event) {
            event.preventDefault(); // Prevent the default link behavior

            // Here, you can check if the user is logged in or not
            const isLoggedIn = false; // Replace 'false' with your logic to check if the user is logged in

            if (!isLoggedIn) {
                toast.show();
            } else {
                // Add the logic to navigate to the "See more" page if the user is logged in
                window.location.href = "your_see_more_page.php"; // Replace with the actual URL
            }
        });
    });
</script>


<script>
    // Function to update the timer
    function updateTimer() {
        const now = new Date();
        const end = new Date("2023-10-30");
        const distance = end - now;

        // Calculate days, hours, minutes, and seconds
        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Update the HTML elements
        document.getElementById('countdown-days').innerText = days;
        document.getElementById('hours').innerText = hours;
        document.getElementById('minutes').innerText = minutes;
        document.getElementById('seconds').innerText = seconds;

        // If the countdown is over, display some text
        if (distance < 0) {
            clearInterval(countdownInterval);
            document.getElementById('clock').innerHTML = "EXPIRED";
            document.getElementById('countdown-days').innerText = ""; // Hide countdown days if expired
        }
    }

    // Initialize the countdown interval
    const countdownInterval = setInterval(updateTimer, 1000);
    updateTimer(); // Call the function immediately to prevent a one-second delay

    // Initialize Swiper when the document is ready
    document.addEventListener("DOMContentLoaded", function() {
        // Initialize the Swiper instance
        const swiper = new Swiper(".swiper-container", {
            slidesPerView: 3,
            spaceBetween: 30,
            loop: true,
            swipe: true,
        });

        // Function to move Swiper to the next slide every 5 seconds
        function moveSwiperToNextSlide() {
            swiper.slideNext();
        }

        // Set the interval to move the Swiper
        const swiperInterval = setInterval(moveSwiperToNextSlide, 5000);

        // Stop the interval when the user interacts with Swiper
        swiper.on("pointerDown", function() {
            clearInterval(swiperInterval);
        });

        // Restart the interval when the user stops interacting with Swiper
        swiper.on("pointerUp", function() {
            swiperInterval = setInterval(moveSwiperToNextSlide, 5000);
        });
    });
</script>

<script>
    // Initialize Swiper when the document is ready
    document.addEventListener("DOMContentLoaded", function() {
        // Initialize the Swiper instance
        const swiper = new Swiper(".swiper-container", {
            slidesPerView: 3,
            spaceBetween: 30,
            loop: true,
            swipe: true,
        });
    });
</script>

<script>
    // Function to show the alert for containerFlashsale on mobile devices
    function showMobileAlert() {
        const isMobile = window.matchMedia('(max-width: 768px)').matches;
        const containerFlashsale = document.querySelector('.containerFlashsale');
        const alertContainer = document.createElement('div');
        alertContainer.innerHTML = `
      <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Sorry!</h4>
        <p>This page is not yet available on mobile, only available on the desktop version</p>
        <hr>
        <p class="mb-0">Please use a desktop version device</p>
      </div>
    `;

        if (isMobile) {
            containerFlashsale.innerHTML = '';
            containerFlashsale.appendChild(alertContainer);
        }
    }

    // Call the function to show the alert
    showMobileAlert();

    // Re-run the function on window resize to handle orientation change
    window.addEventListener('resize', showMobileAlert);
</script>