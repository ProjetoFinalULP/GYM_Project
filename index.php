<?php
include 'config.inc';

$sql = "SELECT description, userCreation From weekDay";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["description"]. " - Name: " . $row["userCreation"]. " <br>";
    }
} else {
    echo "0 results";
}

?>		