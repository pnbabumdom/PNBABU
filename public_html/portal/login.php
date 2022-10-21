
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>Login</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php
   
    $hostname = "localhost";
    $username = "snehansh_root";
    $password = "Vishal@123";
    $databaseName = "snehansh_mydb";
	    // connect to mysql database using mysqli
    $con = mysqli_connect($hostname, $username, $password, $databaseName);
	
    // If form submitted, insert values into the database.
    if (isset($_POST['submit'])){
		
		$username = stripslashes($_REQUEST['user']); // removes backslashes
		$username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
		$password = stripslashes($_REQUEST['pass']);
		$password = mysqli_real_escape_string($con,$password);
		
	//Checking is user existing in the database or not
        //$query = "SELECT * FROM `users` WHERE username='$username' and password='".md5($password)."'";
		$query = "SELECT * FROM users WHERE user='$username' and pass='$password'";
		$result = mysqli_query($con,$query) or die(mysql_error());
		$rows = mysqli_num_rows($result);
        if($rows==1){
	//	if($rows){
		
		//	header("Location: index.php"); // Redirect user to index.php
			echo "hi";
			exit;
            }else{
				echo "<div class='form'><h3>Username/password is incorrect.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
				}
    }else{
?>
<div class="form">
<h1>Log In</h1>
<form action="" method="post" name="login">
<input type="text" name="username" placeholder="Username" required />
<input type="password" name="password" placeholder="Password" required />
<input name="submit" type="submit" value="Login" />
</form>
<p><!--Not registered yet? <a href='registration.php'>Register Here</a>--></p>


</div>
<?php } ?>


</body>
</html>
