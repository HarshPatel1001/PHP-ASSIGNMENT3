<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Website</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<header>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <?php if(isset($_SESSION['logged_in'])): ?>
                <li><a href="member.php">Member</a></li>
                <li><a href="logout.php">Logout</a></li>
            <?php else: ?>
                <li><a href="register.php">Register</a></li>
            <?php endif; ?>
            <li><a href="contact.php">Contact Us</a></li>
        </ul>
    </nav>
</header>

<main class="container">
    <h1>Welcome to our website!</h1>
    <p>This is the home page. Please login below:</p>

    <?php if(isset($error)): ?>
        <p class="error-message"><?php echo $error; ?></p>
    <?php endif; ?>

    <?php if(!isset($_SESSION['logged_in'])): ?>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required><br><br>
            <input type="submit" value="Login">
        </form>
    <?php endif; ?>

    <!-- Additional Content -->
    <div class="additional-content">
        <h2>About Us</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed et leo et nisl consequat aliquet. Nulla nec metus sed dolor pulvinar malesuada. Ut vel suscipit risus. In hac habitasse platea dictumst.</p>
        <img src="images/work-1.jpg" alt="About Us" class="about-image">
    </div>
</main>

<footer>
    <p>&copy; 2024 Your Website. All rights reserved.</p>
</footer>

</body>
</html>
