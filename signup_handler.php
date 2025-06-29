<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Save form data into session
    $_SESSION['fname'] = $_POST['fname'];
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['password'] = $_POST['password'];
    $_SESSION['dob'] = $_POST['dob'];
    $_SESSION['ucity'] = $_POST['ucity'];
    $_SESSION['color'] = $_POST['color'];
    $_SESSION['gender'] = $_POST['gender'];
    $_SESSION['terms'] = isset($_POST['terms']) ? 'Agreed' : 'Not Agreed';

    // Redirect to external.php
    header('Location: external.php');
    exit();
} else {
    // Redirect back to the form if accessed directly
    header('Location: index.html');
    exit();
}
?>