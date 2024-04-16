<?php
session_start();

// Check if user is not logged in, redirect to index.php
if (!isset($_SESSION['logged_in'])) {
    header("Location: index.php");
    exit;
}

// Retrieve user information from session
$fullName = $_SESSION['fullName']; // Assuming you set this in index.php
$email = $_SESSION['email']; // Assuming you set this in index.php
?>

<?php include 'templates/header.php'; ?>

<h1>Welcome, <?php echo $fullName; ?>!</h1>
<p>You are logged in as: <?php echo $email; ?></p>

<!-- Add extra content here based on your opinion -->
<p>This is the member page. You can add extra content here.</p>

<?php include 'templates/footer.php'; ?>
