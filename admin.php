<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: index.php");
    exit();
}
?>

<?php require "includes/navigation.php"; ?>
<?php require "header.php"; ?>
<!-- top navigation ends here -->
<div class="hero-wrap ftco-degree-bg" style="background-image: url('images/gallery 3.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
            <div class="col-lg-8 ftco-animate">
                <div class="text w-100 text-center mb-md-5 pb-md-5">
                    <h1 class="mb-4 featured-events-heading"> ADMIN MOTORCROSS EVENTS</h1>
                    <p style="font-size: 18px;">If you're looking for the best upcoming Motorcross and Rally events in your area, look no further! Scroll below for information on the best events, track days and club meets throughout Kenya</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- the main content section starts here -->
<div class="row">
    <section class="ftco-section ftco-no-pt bg-light">
        <div class="container">
            <div class="row justify-content-left">
                <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                    <h2 class="mb-2 mt-5">Admin Featured Events</h2>
                </div>
            </div>
            <div class="carousel-container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="featured-section">
                            <div class="item">
                                <div class="car-wrap rounded ftco-animate">
                                    <div class="img rounded d-flex align-items-end" style="background-image: url(images/motocross-poster-flyer-event.webp);"></div>
                                    <div class="text">
                                        <h2><a href="#">Extreme Motocross</a></h2>
                                        <span class="cat">Offroad racing</span>
                                        <p class="price">Date: October 20, 2024</p>
                                        <div class="main-dark-button"><a href="events.html">Discover More</a></div>
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                <div class="car-wrap rounded ftco-animate">
                                    <div class="img rounded d-flex align-items-end" style="background-image: url(images/MotoGp.jpg);"></div>
                                    <div class="text">
                                        <h2><a href="#">MotoGP Racing</a></h2>
                                        <span class="cat">At River Store</span>
                                        <p class="price">Date: October 2, 2024</p>
                                        <div class="main-dark-button"><a href="events.html">Discover More</a></div>
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                <div class="car-wrap rounded ftco-animate">
                                    <div class="img rounded d-flex align-items-end" style="background-image: url(images/motocross-dirt-bike-trail-rider.webp);"></div>
                                    <div class="text">
                                        <h2><a href="#">Motorbike Show</a></h2>
                                        <span class="cat">Orleans Hotel</span>
                                        <p class="price">Date: December 2, 2024</p>
                                        <div class="main-dark-button"><a href="events.html">Discover More</a></div>
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                <div class="car-wrap rounded ftco-animate">
                                    <div class="img rounded d-flex align-items-end" style="background-image: url(images/motorcycle-race-flyer.jpg);"></div>
                                    <div class="text">
                                        <h2><a href="#">Racers KE</a></h2>
                                        <span class="cat">Two Rivers Mall</span>
                                        <p class="price">Date: October 12, 2024</p>
                                        <div class="main-dark-button"><a href="events.html">Discover More</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </section>
</div>
<?php require "footer.php"; ?>
</body>
</html>
