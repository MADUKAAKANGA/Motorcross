<?php
require "includes/navigation.php";
require "header.php";
require "configs/DbConn.php"; // Ensure this file connects to the database using PDO

session_start();

// Redirect non-admin users
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: index.php");
    exit();
}

$successMessage = "";
$errorMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $event_date = $_POST['event_date'];
    $location = trim($_POST['location']);
    $image = $_FILES['image'];

    // Validate inputs
    if (empty($title) || empty($description) || empty($event_date) || empty($location)) {
        $errorMessage = "Please fill in all required fields.";
    } elseif ($image['error'] !== UPLOAD_ERR_OK) {
        $errorMessage = "Error uploading the file.";
    } else {
        // Process file upload
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/bmp', 'image/svg+xml'];
        $fileType = mime_content_type($image['tmp_name']);

        // No file type or size restriction now
        $target_dir = "images/";
        $target_file = $target_dir . basename($image['name']);
        $uploadSuccess = move_uploaded_file($image['tmp_name'], $target_file);

        if ($uploadSuccess) {
            try {
                $sql = "INSERT INTO events (event_name, description, event_date, location, poster) VALUES (?, ?, ?, ?, ?)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$title, $description, $event_date, $location, $target_file]);

                $successMessage = "Event successfully added!";
            } catch (PDOException $e) {
                $errorMessage = "Database error: " . $e->getMessage();
            }
        } else {
            $errorMessage = "Failed to upload the file.";
        }
    }
}
?>

<section class="ftco-section ftco-no-pt bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                <h2 class="mb-2">Add Event</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <?php if ($successMessage): ?>
                    <div class="alert alert-success">
                        <?php echo htmlspecialchars($successMessage); ?>
                    </div>
                <?php endif; ?>
                <?php if ($errorMessage): ?>
                    <div class="alert alert-danger">
                        <?php echo htmlspecialchars($errorMessage); ?>
                    </div>
                <?php endif; ?>
                <form action="add_event.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title">Event Title</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Event Description</label>
                        <textarea name="description" class="form-control" rows="5" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="event_date">Event Date</label>
                        <input type="date" name="event_date" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" name="location" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="image">Event Image</label>
                        <input type="file" name="image" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add Event</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php require "footer.php"; ?>
