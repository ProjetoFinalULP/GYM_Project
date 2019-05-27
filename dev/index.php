<?php
    include 'config.inc';

    


$sql = "SELECT description, userCreation From weekDay";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["description"]. " - Name: " . $row["userCreation"]. " <br>";
    }
} else {
    echo "0 results";
}

?>		