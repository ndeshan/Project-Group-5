<?php

include('binoy_conn.php');


$sql = "SELECT * FROM contact_us";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1' cellpadding='10'>";
    echo "<tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Comment</th>
            
          </tr>";
 
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['email']}</td>
                <td>{$row['phone']}</td>
                <td>{$row['comment']}</td>
                
              </tr>";
    }
    echo "</table>";
} else {
    echo "No data found.";
}


$conn->close();
?>
