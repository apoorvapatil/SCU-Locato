<?php  
//Start your session
   session_start();
   //Read your session (if it is set)
   if (isset($_SESSION['username'])){
   	echo $_SESSION['username'];
   	echo "Hi";

   }
   else{
   	echo 'Bye';
   }
     
#session_start();
#echo 'Welcome $_SESSION['username']'; 
#echo '<br><a href ="index.php?action=logout">logout</a>';

?>

<html>
<body>

<p>Welcome dsddsds</p>

</body>
</html>