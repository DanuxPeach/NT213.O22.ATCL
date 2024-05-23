<?php
session_start();

$servername = "mysql";
$username = $_ENV['MYSQL_USER'];
$password = $_ENV['MYSQL_PASSWORD'];
$dbname = $_ENV['MYSQL_DATABASE'];

// Kết nối đến cơ sở dữ liệu
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Lấy thông tin từ form
$Username = $_POST['Username'];
$newPassword = $_POST['newPassword'];

$hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

// Sử dụng prepared statement để cập nhật thông tin tài khoản
$stmt = $conn->prepare("UPDATE users SET password=? WHERE username=?");
$stmt->bind_param("ss", $hashedPassword, $Username);

if ($stmt->execute() === TRUE) {
    echo '<script>alert("Change password successful!"); window.location.href = "../login_form.html";</script>';
} else {
    echo '<script>alert("Please try again later."); window.location.href = "../index.html";</script>';
}

$stmt->close();
$conn->close();
?>
