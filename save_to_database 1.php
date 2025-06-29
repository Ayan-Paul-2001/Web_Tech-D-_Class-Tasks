<?php

session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm'])) {
    
    $conn = new mysqli('localhost', 'root', '', 'webtech_labd');

   
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO fuser (fname, username, email, password, dob, ucity, gender) VALUES (?, ?, ?, ?, ?, ?, ?)");
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    // Bind parameters
    $stmt->bind_param(
        "sssssss", 
        $_SESSION['fname'],
        $_SESSION['username'],
        $_SESSION['email'],
        $_SESSION['password'],
        $_SESSION['dob'],
        $_SESSION['ucity'],
        $_SESSION['gender']
    );

    // Execute the query
    if ($stmt->execute()) {
        echo "<script>
        alert('Registration successful!');
        window.location.href = 'index.html';
      </script>";
exit();
} else {
// Show error alert
echo "<script>
        alert('Error: " . $stmt->error . "');
        window.location.href = 'index.html';
      </script>";
exit();
}

// Close the connection
$stmt->close();
$conn->close();
} else {
// Redirect back to index.html if accessed directly
header('Location: index.html');
exit();
}
?>