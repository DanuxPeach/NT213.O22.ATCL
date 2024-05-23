<?php
session_start();

$response = array();

if(isset($_SESSION['username'])) {
    $response['profileInfo'] = '<div id="profileInfo">' . $_SESSION['username'] . '</div>'; 
    $response['profileInfo'] .= '<button id="logoutButton">Log Out</button>';
    $response['changeAccount'] = '<div class="change-account" style="display:block;">
            <h2>Change Account Info</h2>
            <form id="changeAccountForm">
                <label for="Username">Username:</label>
                <input type="text" id="Username" name="Username" required><br>
                <label for="newPassword">New Password:</label>
                <input type="password" id="newPassword" name="newPassword" required><br>
                <button type="submit">Change</button>
            </form>
        </div>';
} else {
    $response['profileInfo'] = '<button id="signInButton" onclick="signIn()">Sign In</button>';
    $response['profileInfo'] .= '<button id="signUpButton" onclick="signUp()">Sign Up</button>';
}

echo json_encode($response); // Phản hồi dưới dạng JSON
?>
