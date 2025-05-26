
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

        <style>
        .top-right-buttons {
            position: absolute;
            top: 20px;
            right: 30px;
            z-index: 1000;
        }
        .top-right-buttons button {
            background: #2a5298;
            color: #fff;
            border: none;
            padding: 8px 18px;
            border-radius: 6px;
            font-size: 15px;
            margin-left: 10px;
            cursor: pointer;
            transition: background 0.2s;
        }
        .top-right-buttons button:hover {
            background: #1e3c72;
        }
    </style>
</head>

<div class="top-right-buttons">
    <button type="button" onclick="window.location.href='user.php'">User</button>
    <button type="button" onclick="window.location.href='index.html'">Logout</button>
</div>
<body>
    
</body>
</html>
<?php
$conn = new mysqli("localhost", "root", "", "webtech_labd");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$bgcolor = isset($_COOKIE['bgcolor']) ? htmlspecialchars($_COOKIE['bgcolor']) : '#ffffff';
echo "<body style='background-color: $bgcolor;'>";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!empty($_POST["cities"]) && is_array($_POST["cities"])) {
        $ids = array_map("intval", $_POST["cities"]);
        if (count($ids) !== 10) {
            echo "You must select exactly 10 cities.";
            exit;
        }

        $idList = implode(",", $ids);
        $sql = "SELECT city, country, aqi FROM info WHERE id IN ($idList)";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<h2>Selected Cities AQI Details</h2>";
            echo "<table border='1' cellpadding='8'>
                    <tr>
                        <th>City</th>
                        <th>Country</th>
                        <th>AQI</th>
                    </tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . htmlspecialchars($row['city']) . "</td>
                        <td>" . htmlspecialchars($row['country']) . "</td>
                        <td>" . htmlspecialchars($row['aqi']) . "</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "No data found.";
        }
    } else {
        echo "No cities selected.";
    }
} else {
    echo "Invalid request.";
}

$conn->close();
?>
