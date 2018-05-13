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
	$username = $link->real_escape_string($_POST['username']);
	$password = $link->real_escape_string($_POST['password']);
	$sql= "SELECT * FROM registry WHERE username='$username'and password = '$password'";
	$query = mysqli_query($link,$sql);
         $numrows = mysqli_num_rows($query);

         if($numrows == 1)
         {$a="SELECT session_cnt FROM users WHERE username='$username'";
               $q = mysqli_query($link,$a);
               $row = $q->fetch_assoc();
               $cnt=intval($row['session_cnt']);
               $cnt = $cnt+1; 
	$a="UPDATE users SET session_cnt='$cnt' WHERE username='$username'";
               $q=mysqli_query($link,$a);
		 
            $_SESSION['username'] = $username;		//Store username to session for futher authorization 
            header("Location: menu.html"); //Redirect user to home page
         }
         else {
	     header("Location: login.html"); //Redirect user back to your login form
		 die("Please enter username and or password!");
         
		 }
       
     }
     
      ?>