
<?php


echo $_POST["username"] ;
$username=$_POST["username"];
$password=$_POST["password"];

echo "$username hghhh  $password";


if($username&&$password){
	$connect = mysql_connect("localhost","root1","") or die("Couldn't connect to the database");
	mysql_select_db("locato") or die ("Couldn't find the database ");

	$query = mysql_query("SELECT * FROM user WHERE username='$username' ");

	$numrows=mysql_num_rows($query);
if($numrows!==0){
	while ($row = mysql_fetch_assoc($query)){
		$dbusername= $row['username'];
		$dbpassword= $row['Pwd'];
	}

	if($username==$dbusername&& ($password) ==$dbpassword){
		echo"You are logged in";
		
session_start();

$_SESSION['username']=$username;
	}
	else{
		echo "Your password is incorrect!";
	}

if(isset($_GET['logout'])){
	session_unregister('username');
}
}
else
die ("That user isnt there in the db");

}
else
die("Please enter username and password");

?>
