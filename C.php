<?php
$username = filter_input(INPUT_POST,'username');
$password = filter_input(INPUT_POST, 'password');
$firstname = filter_input(INPUT_POST, 'Fname');
$lastname = filter_input(INPUT_POST, 'Lname');;
if (!empty($username)|| !empty($password) || !empty($firstname) || !empty($lastname)){
	$host = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbname = "webdev";
	$conn = new mysqli($host,$dbUsername,$dbPassword,$dbname);

	if (mysqli_connect_error()){
		die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_errno());
	}
	else{
		$sql = "INSERT INTO register (Fname,Lname,username,password) VALUES ('$firstname','$lastname','$username','$password')";
		if ($conn->query($sql)){
			header('location:INDEX.php');
		}
		else{
			echo "Error:".$sql."<br>". $conn->error;
		}
		$conn->close();
}
}
else{
	echo "ALL FIELDS ARE REQUIRED";
	die();
} 

?>
