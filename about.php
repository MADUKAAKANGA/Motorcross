<?php
// Include navigation and header
require "includes/navigation.php";
require "header.php";
?>

<!-- ABOUT.PHP SECTION START -->
<section class="ftco-section ftco-about">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/Kenya-motor-cross-team.jpg);">
            </div>
            <div class="col-md-6 wrap-about ftco-animate">
                <div class="heading-section heading-section-white pl-md-5">
                    <span class="subheading">About us</span>
                    <h2 class="mb-4">MOTORCROSS</h2>

                    <p>Welcome to Kenya's premier car events brand. As a rapidly growing organizer in the region, we are dedicated to igniting your passion for automobiles like never before. Our mission is to craft unforgettable experiences for all car enthusiasts, whether you're a fan of classic cars or a thrill-seeker in search of high-speed adventures.</p>

                    <p>With a diverse range of thoughtfully curated events, from awe-inspiring car exhibitions to heart-pounding track days and laid-back coffee 'n' car meetups, we cater to every aspect of the automotive world.</p>
                    
                    <p>Join us as fellow car enthusiasts come together, and Kenya's car culture ascends to new horizons. Here, the journey ahead promises excitement and automotive excellence.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ABOUT.PHP SECTION END -->

<!-- REGISTER.PHP SECTION START -->
<div class="container mt-5">
    <h2>To Experience the Fun... Register</h2>
    <form action="register.php" method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">I am a</label>
            <select class="form-select" id="role" name="role" required>
                <option value="">Select an option</option>
                <option value="racer">Racer</option>
                <option value="fan">Fan</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="vehicle_type" class="form-label">Vehicle Type</label>
            <input type="text" class="form-control" id="vehicle_type" name="vehicle_type">
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const roleSelect = document.getElementById('role');
        const vehicleTypeInput = document.getElementById('vehicle_type');
        
        roleSelect.addEventListener('change', function () {
            if (roleSelect.value === 'fan') {
                vehicleTypeInput.value = '';
                vehicleTypeInput.disabled = true;
            } else {
                vehicleTypeInput.disabled = false;
            }
        });
    });
</script>
<!-- REGISTER.PHP SECTION END -->

<?php
// Include footer
require "footer.php";
?>
