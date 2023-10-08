<style>
    .badge-container {
        display: flex;
        justify-content: center;
        align-items: center;
        /* More space at the top */
    }

    .badge-box {
        width: 300px;
        height: 150px;
        border-radius: 15px;
        text-align: left;
        padding: 20px;
        /* More padding */
        margin: 20px;
        /* More margin */
        color: #fff;
        font-weight: bold;
        font-size: 24px;
        /* Larger text */
        display: flex;
        align-items: center;
        background: linear-gradient(to bottom right, #007bff, #00bfff);
        box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.4);
        /* Darker shadow */
        transition: all 0.5s ease;
        /* Animation on hover */
        cursor: pointer;
    }

    .badge-box:hover {
        transform: scale(1.1);
        /* Scale up more on hover */
        box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.6);
        /* Darker and larger shadow on hover */
    }

    .badge-icon {
        font-size: 64px;
        /* Larger icon */
        margin-right: 20px;
        /* More margin */
        color: rgba(255, 255, 255, 0.9);
        /* Slightly translucent icons */
    }

    /* Gradients for icons */
    .car-icon {
        background: linear-gradient(to bottom right, #003876, #0066ff);
    }

    .motorcycle-icon {
        background: linear-gradient(to bottom right, #007526, #00ff44);
    }

    .other-icon {
        background: linear-gradient(to bottom right, #920024, #ff003b);
    }
</style>
<div class="container-fluid">
    <div class="badge-container">
        <div class="row">
            <!-- Kotak 1: Mobil -->
            <div class="col-md-4">
                <div class="badge-box car-icon">
                    <div class="badge-icon">
                        <i class="fas fa-car"></i>
                    </div>
                    <span>Carr</span>
                </div>
            </div>
            <!-- Kotak 2: Motor -->
            <div class="col-md-4">
                <div class="badge-box motorcycle-icon">
                    <div class="badge-icon">
                        <i class="fas fa-motorcycle"></i>
                    </div>
                    <span>motorcycle</span>
                </div>
            </div>
            <!-- Kotak 3: Lainnya -->
            <div class="col-md-4">
                <div class="badge-box other-icon">
                    <div class="badge-icon">
                        <i class="fas fa-rocket"></i>
                    </div>
                    <span>Other</span>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/public/toast.php'; ?>

<script>
    // JavaScript code to handle the toast functionality when a badge box is clicked
    document.addEventListener("DOMContentLoaded", function() {
        const badgeBoxes = document.querySelectorAll(".badge-box");
        const toast = new bootstrap.Toast(document.querySelector(".toast"));

        badgeBoxes.forEach((badgeBox) => {
            badgeBox.addEventListener("click", function() {
                // Here, you can check if the user is logged in or not
                const isLoggedIn = false; // Replace 'false' with your logic to check if the user is logged in

                if (!isLoggedIn) {
                    toast.show();
                }
            });
        });
    });
</script>