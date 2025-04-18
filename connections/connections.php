<?php 
// database connection
$servername = "127.0.0.1:4000"; // Database server name
$username = "root"; // Database username
$password = ""; // Database password
$dbname = "strike"; // Database name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
} else{
    // echo "Connected successfully"; // Uncomment for debugging
}

?>