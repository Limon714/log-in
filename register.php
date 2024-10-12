<?php
session_start();
include 'config.php';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    // Validations
    if (empty($username)) {
        $errors[] = "Username is required";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }
    if (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters";
    }
    if ($password !== $confirm_password) {
        $errors[] = "Passwords do not match";
    }

    // If no errors, proceed to register user
    if (empty($errors)) {
        $password_hash = password_hash($password, PASSWORD_BCRYPT);

        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $password_hash);

        if ($stmt->execute()) {
            header("Location: login.php");
            exit();
        } else {
            $errors[] = "Registration failed. Try again.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="registration-form">
            <h2>Registration</h2>
            <?php if (!empty($errors)): ?>
                <ul class="error-list">
                    <?php foreach ($errors as $error): ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            <form action="register.php" method="POST">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" placeholder="Username" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" name="confirm_password" placeholder="Confirm Password" required>
                </div>
                <button type="submit">Sign Up</button>
            </form>
            <p>Already have an account? <a href="login.php">Log In</a></p>
        </div>
    </div>
</body>
</html>
