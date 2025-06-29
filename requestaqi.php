
<?php
$conn = new mysqli("localhost", "root", "", "webtech_labd");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Select 10 Cities</title>
    <script>
        
        function validateCheckboxes() {
            let checked = document.querySelectorAll('input[name="cities[]"]:checked');
            if (checked.length !== 10) {
              
                alert("Please select exactly 10 cities.");
                return false;
            }
            return true;
        }
    
    </script>
</head>
<body style="background: linear-gradient(135deg, #e0eafc 0%, #cfdef3 100%); min-height: 100vh; margin: 0;">
    <div style="display: flex; justify-content: center; align-items: center; min-height: 100vh;">
        <div style="background: #fff; padding: 40px 30px; border-radius: 16px; box-shadow: 0 4px 24px rgba(0,0,0,0.08);">
            <h2 style="text-align: center; color: #2a5298; margin-bottom: 24px;">Select Exactly 10 Cities</h2>
            <form method="POST" action="showaqi.php" onsubmit="return validateCheckboxes();">
                <!-- Top right buttons -->
                <div style="position: absolute; top: 24px; right: 40px; z-index: 10;">
                    <a href="user.php" style="background: #2a5298; color: #fff; text-decoration: none; padding: 8px 18px; border-radius: 6px; margin-right: 12px; font-size: 15px; font-weight: 500; box-shadow: 0 2px 8px rgba(42,82,152,0.08);">User</a>
                    <a href="index.html" style="background: #e74c3c; color: #fff; text-decoration: none; padding: 8px 18px; border-radius: 6px; font-size: 15px; font-weight: 500; box-shadow: 0 2px 8px rgba(231,76,60,0.08);">Logout</a>
                </div> <?php
                $sql = "SELECT id, city FROM info";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo "<label style='display:block; margin-bottom:8px; color:#333;'><input type=\"checkbox\" name=\"cities[]\" value=\"{$row['id']}\" style=\"margin-right:8px; accent-color:#2a5298;\"> " . htmlspecialchars($row['city']) . "</label>";
                }
                ?>
                <input type="submit" value="Submit" style="background: #2a5298; color: #fff; border: none; padding: 10px 28px; border-radius: 6px; font-size: 16px; cursor: pointer; margin-top: 16px;">
            </form>
        </div>
    </div>
</body>
</html>
