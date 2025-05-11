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

if (isset($_POST['submit'])) {

if ($_POST['fname'] != "") {
echo $_POST['fname'];

if ($_POST['username'] != "") {
    echo "<br>".$_POST['username'];
}
}
if($_POST['email'] !=""){
echo "<br>".$_POST['email'];
}
if($_POST['password'] !=""){
echo "<br>".$_POST['password'];
}
if($_POST['dob'] !=""){
echo "<br>".$_POST['dob'];
}
if($_POST['ucity'] !=""){
echo "<br>".$_POST['ucity'];
}
if($_POST['color'] !=""){
echo "<br>".$_POST['color'];
}
if($_POST['gender'] !=""){
echo "<br>".$_POST['gender'];
}
}
else
    print_r("NO DATA");

?>