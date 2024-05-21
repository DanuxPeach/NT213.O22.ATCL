<?php
session_start();

$servername = "mysql"; 
$username = $_ENV['MYSQL_USER'];
$password = $_ENV['MYSQL_PASSWORD'];
$dbname = $_ENV['MYSQL_DATABASE'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['username'];
$password = $_POST['password'];

// Query with SQL Injection vulnerability
$sql = "SELECT * FROM users WHERE username = '$name' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $_SESSION['username'] = $user['username'];
    echo '<script>alert("Login Successful!"); window.location.href = "../index.html";</script>';
    exit();
} else {
    echo '<script>alert("Login failed. Please check your credentials."); window.location.href = "../login_form.html";</script>';
    exit();
}

$conn->close();
?>
