<?php
    session_start();
    if (isset($_SESSION["email"])) {
            if(isset($_SESSION["email"])) {
                  header("refresh: 0.5; url = requestaqi.php");
            }
      }
if (isset($_POST["login"])) {
      if (empty($_POST["signin-email"]) || empty($_POST["signin-password"])) {
            echo "Please fill in all fields.";
            header("refresh: 2; url = index.php");
            exit();
      }
      
      // Sanitize input to prevent SQL injection
      $_POST["signin-email"] = filter_var($_POST["signin-email"], FILTER_SANITIZE_EMAIL);
      $_POST["signin-password"] = filter_var($_POST["signin-password"], FILTER_SANITIZE_STRING);
$email =$_POST["signin-email"] ;
$pass = $_POST["signin-password"];

$conn = mysqli_connect('localhost', 'root', '', 'webtech_labd');
$sql = "SELECT *FROM user WHERE email = '$email' and password = '$pass'";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$count = mysqli_num_rows($result);

if ($count == 1) {
      session_start();
      
      $_SESSION["email"] = $email;

      echo "You are now redirected";
      header("refresh: 2; url = private.php");
      exit();
}
else{
      echo "User not found";
      header("refresh: 2; url = index.html");
      exit();
}
}
if (!isset($_POST["submit"]))
      {
            echo "Fill the username and password."."<br>";
            header("refresh: 2; url = index.html");
      }
      //
?>