
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Information</title>
</head>
<body>

</body>
</html>
<?php
session_start();

if (isset($_POST['color'])) {
    // Set cookie for 7 days
    setcookie('bgcolor', $_POST['color'], time() + (120), "/");
}

// echo "Hi ".$_POST['uname']; // ASSOCIATIVE ARRAY K-V  - SUPERGLOBAL ARRAY
// echo "<br>".$_POST['email'];
// echo "<br>".$_GET['uname'];

//var_dump($_GET);
echo "<div style='background-color:rgb(27, 150, 122); border: 1px solid; padding: 20px; border-radius: 10px; max-width: 600px; margin: 20px auto;'>";
echo "<h2 style='text-align: center; color:black;'>User Information Receipt</h2>";
echo "<ul style='list-style-type: none; padding: 0; text-align: center;'>";


if (!isset($_SESSION['fname'])) {
    echo "No session data found. Please sign up first.";
    exit();
}

echo "<h2>User Information</h2>";
echo "<p><strong>Full Name:</strong> " . htmlspecialchars($_SESSION['fname']) . "</p>";
echo "<p><strong>Username:</strong> " . htmlspecialchars($_SESSION['username']) . "</p>";
echo "<p><strong>Email:</strong> " . htmlspecialchars($_SESSION['email']) . "</p>";
echo "<p><strong>Date of Birth:</strong> " . htmlspecialchars($_SESSION['dob']) . "</p>";
echo "<p><strong>City:</strong> " . htmlspecialchars($_SESSION['ucity']) . "</p>";
echo "<p><strong>Favorite Color:</strong> " . htmlspecialchars($_SESSION['color']) . "</p>";
echo "<p><strong>Gender:</strong> " . htmlspecialchars($_SESSION['gender']) . "</p>";
echo "<p><strong>Terms:</strong> " . htmlspecialchars($_SESSION['terms']) . "</p>";

echo "<form action='save_to_database 1.php' method='POST' style='text-align: center; margin-top: 20px;'>";
echo "<input type='submit' name='confirm' value='Confirm' style='padding: 10px 20px; background-color: green; color: white; border: none; border-radius: 5px; cursor: pointer;'>";
echo "</form>";
echo "<a href='index.html' style='display: inline-block; margin-top: 10px; padding: 10px 20px; background-color: red; color: white; text-decoration: none; border-radius: 5px;'>Cancel</a>";
echo "</div>";



?>
