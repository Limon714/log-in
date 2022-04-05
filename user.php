<?php

$connection = mysqli_connect('localhost','root');
mysqli_select_db($connection,"contact_db");

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$query = "INSERT INTO `contact_form`(`name`, `email`,`message`) VALUES('$name', '$email','$message')";

mysqli_query($connection, $query);

echo 'Message is Send';

?>