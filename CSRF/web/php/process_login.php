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

$stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
$stmt->bind_param("s", $name);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user && password_verify($password, $user['password'])) {
    $_SESSION['username'] = $user['username'];
    echo '<script>alert("Login Successful!"); window.location.href = "../index.html";</script>';
    exit();
} else {
    echo '<script>alert("Login failed. Please check your credentials."); window.location.href = "../login_form.html";</script>';
    exit();
}

$stmt->close();
$conn->close();
?>
