<h1>Only in Dev</h1>
 <?php
$servername = getenv('DATABASE_SERVICE_HOST');
$serverport = getenv('DATABASE_SERVICE_PORT');
$username = getenv('DB_USER');
$password = getenv('DB_PASS');
$dbname = getenv('DB_NAME');

// Create connection
$conn = new mysqli($servername.':'.$serverport, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, name FROM attendees";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	// output data of each row
	echo "<table border='1'>
              <tr>
	      <th>Id</th>
	      <th>Name</th>
              </tr>";
    while($row = $result->fetch_assoc()) {
	echo "<tr>";
	echo "<td>" . $row["id"] . "</td>";
	echo "<td>" . $row["name"]. "</td>";
	echo "</tr>";
    }
	echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>
