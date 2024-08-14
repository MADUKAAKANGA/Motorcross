<?php
require "includes/navigation.php";
require "header.php";
require "configs/DbConn.php"; // Ensure this file connects to the database using PDO

session_start();

// Check if the user is an admin
$isAdmin = isset($_SESSION['userrole']) && $_SESSION['userrole'] == 'admin';

// Search functionality
$searchQuery = '';
$showStaticImages = true;

if (isset($_GET['query'])) {
    $searchQuery = $_GET['query'];
    $showStaticImages = false; // Hide static images if a search query is present
}

// Query to get events from the database
$sql = "SELECT * FROM events WHERE event_name LIKE :query ORDER BY id DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute(['query' => '%' . $searchQuery . '%']);
$events = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<section class="ftco-section ftco-no-pt bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 heading-section text-center ftco-animate mb-5 margin padding-top-bottom">
                <h2 class="mb-2">Featured Events</h2>
            </div>
        </div>

        <?php if ($isAdmin): ?>
            <div class="row justify-content-end mb-4">
                <div class="col-md-3 text-right">
                    <a href="add_event.php" class="btn btn-primary">Add Event</a>
                </div>
            </div>
        <?php endif; ?>

        <form action="events.php" class="search" method="GET">
            <input type="text" name="query" value="<?php echo htmlspecialchars($searchQuery); ?>" placeholder="Search...">
            <button type="submit">Search</button>
        </form>

        <div class="container">
            <?php if ($showStaticImages): ?>
                <!-- Static preset images -->
                <div class="row no-gutters">
                    <?php
                    $staticImages = [
                        ["path" => "images/tm-sigma-08.jpg", "caption" => "Ultimate Speed Showdown"],
                        ["path" => "images/gallery 2.jpg", "caption" => "Legendary Auto Showcase"],
                        ["path" => "images/gallery 3.jpg", "caption" => "Turbocharged Thrills"],
                        ["path" => "images/gallery 4.jpg", "caption" => "Exotic Car Extravaganza"],
                        ["path" => "images/gallery 5.jpg", "caption" => "Revved Up Rally"],
                        ["path" => "images/gallery 6.jpg", "caption" => "Supercar Spectacular"],
                        ["path" => "images/gallery 7.jpg", "caption" => "Track Day Triumph"],
                        ["path" => "images/gallery 8.jpg", "caption" => "Car Culture Carnival"],
                        ["path" => "images/gallery 9.jpg", "caption" => "Speed and Style Expo"],
                    ];
                    foreach ($staticImages as $image): ?>
                        <div class="col-md-4 mb-4">
                            <a href="<?php echo htmlspecialchars($image['path']); ?>" class="car-wrap rounded ftco-animate swipebox">
                                <div class="img d-flex align-items-end" style="background-image: url('<?php echo htmlspecialchars($image['path']); ?>'); background-size: cover; background-position: center center; background-repeat: no-repeat; height: 400px;">
                                    <div class="text pt-4">
                                        <h3 class="heading mt-2"><?php echo htmlspecialchars($image['caption']); ?></h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <!-- Dynamic events from the database -->
            <?php if (!empty($events)): ?>
                <?php foreach ($events as $event): ?>
                    <div class="row no-gutters mb-4">
                        <div class="col-md-4">
                            <a href="<?php echo htmlspecialchars($event['poster']); ?>" class="car-wrap rounded ftco-animate swipebox" title="<?php echo htmlspecialchars($event['event_name']); ?>">
                                <div class="img d-flex align-items-end" style="background-image: url('<?php echo htmlspecialchars($event['poster']); ?>'); background-size: cover; background-position: center center; background-repeat: no-repeat; height: 400px;">
                                    <div class="text pt-4">
                                        <h3 class="heading mt-2"><?php echo htmlspecialchars($event['event_name']); ?></h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-md-12 text-center"><p>No events found.</p></div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php require "footer.php"; ?>
