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
echo "<div style='background-color:rgb(27, 99, 150); border: 1px solid; padding: 20px; border-radius: 10px; max-width: 600px; margin: 20px auto; position: relative; min-height: 120px;'>";
if (isset($_POST['cancel'])) {
    header("Location: index.html");
    exit();
}



?>
    <form method='post' style='margin-top: 40px;'>
        <button type='submit' name='cancel' style='position: absolute; left: 20px; bottom: 20px; border-style: solid; padding: 10px 24px; background-color:rgb(206, 49, 38); color: white; border: none; border-radius: 5px; cursor: pointer;'>Cancel</button>
     
        <button type='submit' name='confirm' style='position: absolute; right: 20px; bottom: 20px; border-style: solid; padding: 10px 24px; background-color:rgb(42, 155, 46); color: white; border: none; border-radius: 5px; cursor: pointer;'>Confirm</button>
        
    
    </form>
<?php

echo "<h2 style='text-align: center; color:black;'>User Information Receipt</h2>";
echo "<ul style='list-style-type: none; padding: 0; text-align: center;'>";

if (isset($_POST['submit'])){
    
if (!empty($_POST['fname'])) {
    echo "<li><strong>Full Name:</strong> " . htmlspecialchars($_POST['fname']) . "</li>";
}
if (!empty($_POST['username'])) {
    echo "<li><strong>Username:</strong> " . htmlspecialchars($_POST['username']) . "</li>";
}
if(!empty($_POST['password'])) {
    echo "<li><strong>Password:</strong> " . htmlspecialchars($_POST['password']) . "</li>";
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

if (!empty($_POST['gender'])) {
    echo "<li><strong>Gender:</strong> " . htmlspecialchars($_POST['gender']) . "</li>";
}
echo "</ul>";

}

else
    print_r("NO DATA");

?>
<?php
if (isset($_POST['confirm'])) {
    $fname = $_POST['fname'];
     $uname= $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $dob = $_POST['dob'];
    $ucity = $_POST['ucity'];
    $gender = $_POST['gender'];
 
    // Connection String
   $con = mysqli_connect("localhost", "root", "", "webtech_labd"); 

   // Use correct column name and prepared statements for security
   $sql = "INSERT INTO user (full_name, user_name, email, password, date_of_birth, city, gender) VALUES ('$fname', '$uname', '$email', '$password', '$dob', '$ucity', '$gender')";
   $stmt = mysqli_prepare($con, $sql);
   mysqli_stmt_bind_param($stmt, "sssssss", $fname, $uname, $email, $password, $dob, $ucity, $gender);

   if (mysqli_stmt_execute($stmt)) {
     echo "Inserted....";
   } else {
     echo "Error: " . mysqli_error($con);
   }
   mysqli_stmt_close($stmt);
}
?>