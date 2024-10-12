<?php
session_start();
include 'config.php';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        $errors[] = "All fields are required";
    } else {
        // Fetch user from DB
        $stmt = $conn->prepare("SELECT * FROM tableuser WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header("Location: dashboard.php");
            exit();
        } else {
            $errors[] = "Invalid username or password";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="login-form">
            <h2>Login</h2>
            <?php if (!empty($errors)): ?>
                <ul class="error-list">
                    <?php foreach ($errors as $error): ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            <form action="login.php" method="POST">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" placeholder="Username" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <button type="submit">Log In</button>
            </form>
            <p>Don't have an account? <a href="register.php">Sign Up</a></p>
        </div>
    </div>
</body>
</html>
