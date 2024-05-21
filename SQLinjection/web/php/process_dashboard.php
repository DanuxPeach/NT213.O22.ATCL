<?php
session_start();

if(isset($_SESSION['username'])) {
    echo '<div id="profileInfo">' . $_SESSION['username'] . '</div>'; 
    echo '<button id="logoutButton">Log Out</button>';
} else {
    echo '<button id="signInButton" onclick="signIn()">Sign In</button>';
    echo '<button id="signUpButton" onclick="signUp()">Sign Up</button>';
}
?>
