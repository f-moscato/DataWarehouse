<?php
$host='localhost'; // Host name 
$username='root'; // Mysql username 
$password=''; // Mysql password 
$db_name='db_scuola'; // Database name 
$tbl_name='utenti'; // Table name 

// Connect to server and select databse.
$link=mysqli_connect((string)$host,(string)$username,(string)$password,(string)$db_name);
if($link){
// username and password sent from form 
$myusername=$_POST['myusername']; 
$mypassword=$_POST['mypassword']; 

// To protect MySQL injection (more detail about MySQL injection)
$myusername = mysqli_real_escape_string($link,stripslashes($myusername));
$mypassword = mysqli_real_escape_string($link,stripslashes($mypassword));
$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
$result=mysqli_query($link,$sql);
if(isset($result)){
// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){
	$_SESSION['username']= $myusername;
	$_SESSION['pwd']= $mypassword; 
	// Register $myusername, $mypassword and redirect to file "login_success.php"
	
			header('location:index.php');
				
	}else {
	header('Location: eccezione\index.html');
			}
				}else{
						echo 'QUERY WRONG';
						}
}else{
	header("Location:connect/index.html");
}
?>
