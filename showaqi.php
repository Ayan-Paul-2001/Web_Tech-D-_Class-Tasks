<?php
$conn = new mysqli("localhost", "root", "", "webtech_labd");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

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
