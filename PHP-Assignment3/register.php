<?php
session_start();

// Include database configuration
include 'config/dbconfig.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all fields are filled
    if (empty($_POST['first_name']) || empty($_POST['last_name']) || empty($_POST['email']) || empty($_POST['password'])) {
        $error = "All fields are required.";
    } else {
        // Check if email is in valid format
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $error = "Invalid email format.";
        } else {
            // Check if user's email already exists
            $email = $_POST['email'];
            $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->execute(['email' => $email]);
            if ($stmt->rowCount() > 0) {
                $error = "Email already exists. Please choose a different email.";
            } else {
                // If all checks pass, insert user into database
                $firstName = $_POST['first_name'];
                $lastName = $_POST['last_name'];
                $password = $_POST['password'];
                
                // Insert user into database
                $insertStmt = $pdo->prepare("INSERT INTO users (first_name, last_name, email, password) VALUES (:first_name, :last_name, :email, :password)");
                $insertStmt->execute(['first_name' => $firstName, 'last_name' => $lastName, 'email' => $email, 'password' => $password]);
                
                // Save user info in session
                $_SESSION['logged_in'] = true;
                $_SESSION['fullName'] = $firstName . ' ' . $lastName;
                $_SESSION['email'] = $email;
                
                // Redirect to member page
                header("Location: member.php");
                exit;
            }
        }
    }
}
?>

<?php include 'templates/header.php'; ?>

<h1>Registration</h1>
<p>Please fill out the following form to complete your registration:</p>

<?php if(isset($error)): ?>
    <p style="color: red;"><?php echo $error; ?></p>
<?php endif; ?>

<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="first_name">First Name:</label><br>
    <input type="text" id="first_name" name="first_name" required><br><br>
    <label for="last_name">Last Name:</label><br>
    <input type="text" id="last_name" name="last_name" required><br><br>
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br><br>
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password" required><br><br>
    <input type="submit" value="Register">
</form>

<?php include 'templates/footer.php'; ?>
