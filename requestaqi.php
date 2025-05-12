<?php
echo '<div style="background-color:rgb(90, 185, 23); border: 1px solid #ccc; padding: 20px; border-radius: 10px; max-width: 600px; margin: 20px auto; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">';
$conn = new mysqli("localhost", "root", "", "webtech_labd");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Select 10 Cities (Checkbox)</title>
    <script>
        function validateCheckboxes() {
            let checkboxes = document.querySelectorAll('input[name="cities[]"]:checked');
            if (checkboxes.length !== 10) {
                alert("Please select exactly 10 cities.");
                return false;
            }
            return true;
        }
    </script>
</head>
<body style="background-color:rgb(23, 111, 132); font-family: Arial, sans-serif; padding: 20px;">

<form method="post" action="showaqi_info.php" onsubmit="return validateCheckboxes();">
    <h3><u> Select Exactly 10 Cities:</u></h3>
    <?php
    $sql = "SELECT id, city FROM info";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo "<label><input type='checkbox' name='cities[]' value='" . $row['id'] . "'> " . htmlspecialchars($row['city']) . "</label><br>";
    }
    ?>
    <br>
    <input type="submit" value="Submit">
</form>

</body>
</html>
