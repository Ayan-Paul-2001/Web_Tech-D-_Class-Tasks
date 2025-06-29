<?php
session_start();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['signin-username'];
    $password = $_POST['signin-password'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'webtech_labd');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the query
    $stmt = $conn->prepare("SELECT * FROM fuser WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if a matching user is found
    if ($result->num_rows > 0) {
        // Fetch user data
        $user = $result->fetch_assoc();

        // Store user data in session
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];

        // Redirect to a welcome page or dashboard
        header('Location: requestaqi.php');
        exit();
    } else {
        // Invalid credentials
        echo "<script>alert('Invalid username or password.'); window.location.href = 'index.html';</script>";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    // Redirect back to the sign-in page if accessed directly
    header('Location: index.html');
    exit();
}
?>