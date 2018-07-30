<?

$servername = "localhost";
$username = "synergyweb_email";       // miniiotc_email
$password = "zbU4vUZ8I";  //itsuphan
$dbname = "synergyweb_email";    // miniiotc_email

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
 
?>