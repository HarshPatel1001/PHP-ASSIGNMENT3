<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all fields are filled
    if (empty($_POST['full_name']) || empty($_POST['email']) || empty($_POST['message'])) {
        $error = "All fields are required.";
    } else {
        // Get form data
        $fullName = $_POST['full_name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        
        // You can add code here to send the email
        
        // For now, just display a success message
        $success = "Your message has been sent successfully!";
    }
}
?>

<?php include 'templates/header.php'; ?>

<h1>Contact Us</h1>
<p>Please fill out the form below to contact us:</p>

<?php if(isset($error)): ?>
    <p style="color: red;"><?php echo $error; ?></p>
<?php endif; ?>

<?php if(isset($success)): ?>
    <p style="color: green;"><?php echo $success; ?></p>
<?php else: ?>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="full_name">Full Name:</label><br>
        <input type="text" id="full_name" name="full_name" required><br><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        <label for="message">Message:</label><br>
        <textarea id="message" name="message" rows="4" required></textarea><br><br>
        <input type="submit" value="Send">
    </form>
<?php endif; ?>

<?php include 'templates/footer.php'; ?>
