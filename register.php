<?php
session_start();
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "guide");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if( $_POST['psw']== $_POST['psw-repeat']){
		$username = $link->real_escape_string($_POST['username']);
		$pass1 =  $link->real_escape_string($_POST['psw']);
$sql = "INSERT INTO registry (username,password) VALUES ('$username','$pass1')";
if(mysqli_query($link, $sql)){
 
            header("Location: details.html");
			 $_SESSION['message']= "Welcome User";
            
}
	
	else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
}
else
	echo "Password Do Not Match";
}
// Close connection
mysqli_close($link);
	?>