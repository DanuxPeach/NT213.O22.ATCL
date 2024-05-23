<?php
$servername = "mysql"; 
$username = $_ENV['MYSQL_USER'];
$password = $_ENV['MYSQL_PASSWORD'];
$dbname  = $_ENV['MYSQL_DATABASE'];

$conn = new mysqli($servername, $username, $password, $dbname );

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user) {
    echo '<script>alert("Username or email already exists."); window.location.href = "../registration_form.html";</script>';
} else {
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $hashedPassword);
    if ($stmt->execute()) {
        echo '<script>alert("Registration successful!"); window.location.href = "../login_form.html";</script>';
    } else {
        echo '<script>alert("Error during registration. Please try again later."); window.location.href = "../registration_form.html";</script>';
    }
}

$stmt->close();
$conn->close();
?>
