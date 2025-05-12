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

// echo "Hi ".$_POST['uname']; // ASSOCIATIVE ARRAY K-V  - SUPERGLOBAL ARRAY
// echo "<br>".$_POST['email'];
// echo "<br>".$_GET['uname'];

//var_dump($_GET);
echo "<div style='background-color:rgb(27, 150, 122); border: 1px solid; padding: 20px; border-radius: 10px; max-width: 600px; margin: 20px auto;'>";
echo "<h2 style='text-align: center; color:black;'>User Information Receipt</h2>";
echo "<ul style='list-style-type: none; padding: 0; text-align: center;'>";

if (isset($_POST['submit'])){
    
if (!empty($_POST['fname'])) {
    echo "<li><strong>Full Name:</strong> " . htmlspecialchars($_POST['fname']) . "</li>";
}
if (!empty($_POST['username'])) {
    echo "<li><strong>Username:</strong> " . htmlspecialchars($_POST['username']) . "</li>";
}
if (!empty($_POST['email'])) {
    echo "<li><strong>Email:</strong> " . htmlspecialchars($_POST['email']) . "</li>";
}
if (!empty($_POST['dob'])) {
    echo "<li><strong>Date of Birth:</strong> " . htmlspecialchars($_POST['dob']) . "</li>";
}
if (!empty($_POST['ucity'])) {
    echo "<li><strong>City:</strong> " . htmlspecialchars($_POST['ucity']) . "</li>";
}
if (!empty($_POST['color'])) {
    echo "<li><strong>Favorite Color:</strong> " . htmlspecialchars($_POST['color']) . "</li>";
}
if (!empty($_POST['gender'])) {
    echo "<li><strong>Gender:</strong> " . htmlspecialchars($_POST['gender']) . "</li>";
}
echo "</ul>";

}

else
    print_r("NO DATA");

?>