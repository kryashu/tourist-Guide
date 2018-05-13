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


  // Storing Selected Value In Variable
$sql = "SELECT * FROM places";
$result = $conn->query($sql);
$list= $conn->real_escape_string($_POST['list']);
while ($row = mysqli_fetch_all($result))
{
    if ($list == $row['category'])
    {
        $selected = 'selected="selected"';
    }
    else
    {
    $selected = '';
    }
    
echo '<h1>Place Id:</h1>'.$row['place_id'].'<br><h2>Place Name:</h2>'.$row['place_name'].'<br><h3> LandMark:</h3>'.$row['location'].'<br><a href="https://www.google.co.in/maps/place/Ansal+Plaza/@28.4641405,77.507869,15z/data=!4m2!3m1!1s0x0:0xebd94a4d901fc27e?sa=X&ved=0ahUKEwiSifSQ7M7aAhUfTo8KHfzEAAwQ_BIIoQEwDg">Maplink</a>';
    }

$conn->close();
?>