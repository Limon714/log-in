<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>

.username{

font-weight: 600;
color: #435000;

}


</style>
<body>
    <div class="dashboard">
        <h1>Dashboard</h1>
        <p>Welcome, <span class="username"> <?php echo $_SESSION['username']; ?> </span> ! &nbsp; You are logged in.</p>
        <br>
        <a href="logout.php" class="logout"> Logout</a>
    </div>
</body>
</html>
