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
	$name = $link->real_escape_string($_POST['name']);
	$email = $link->real_escape_string($_POST['email']);
	$phone = $link->real_escape_string($_POST['phone']);
	$username = $link->real_escape_string($_POST['username']);
	$sql = "INSERT INTO users (name,email,phn_no,session_cnt,username) VALUES ('$name','$email','$phone','1','$username')";
 if(mysqli_query($link, $sql)){
 
            header("Location: menu.html");
			 $_SESSION['message']= "Welcome User";
            
}
	
	else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
}
?>