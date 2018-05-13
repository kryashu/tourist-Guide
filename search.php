<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "guide";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
if($_SERVER['REQUEST_METHOD'] == 'POST'){
$name=$conn->real_escape_string($_POST['Srch_val']);
$sql = "SELECT * FROM places where place_name='$name'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
   echo '<h1>Place Id:</h1>'.$row['place_id'].'<br><h2>Place Name:</h2>'.$row['place_name'].'<br><h3> LandMark:</h3>'.$row['location'].'<br><a href="https://www.google.co.in/maps/place/Ansal+Plaza/@28.4641405,77.507869,15z/data=!4m2!3m1!1s0x0:0xebd94a4d901fc27e?sa=X&ved=0ahUKEwiSifSQ7M7aAhUfTo8KHfzEAAwQ_BIIoQEwDg">Maplink</a>';
    }
} else {
    echo "0 results";
}
}
$conn->close();
?>