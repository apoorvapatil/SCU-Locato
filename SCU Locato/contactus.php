<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Share your stuff">
    <meta name="author" content="locato group 5">

    <title>Contact Us</title>
    <link href="includes/css/locato.css" rel="stylesheet">
    <link href="includes/css/shop-homepage.css" rel="stylesheet">
    <link href="includes/css/glyphicons.css" rel="stylesheet">
    <link href="includes/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="includes/css/styles.css">
    <link rel="stylesheet" href="includes/css/locato-css.css">

    <link href="includes/css/business-frontpage.css" rel="stylesheet">

</head>
<body>

<!--changes the header when the session is created-->
<?php
    $errorText="";
if($_POST["xyz"]=="xyz"){
    saveThem();
}

function saveThem(){
$username=$_POST["username"];
$password=$_POST["password"];
global $errorText;
#echo "$username hghhh  $password";


if($username&&$password)
#open1
{
    $connect = mysql_connect("localhost","root1","") or die("Couldn't connect to the database");
    mysql_select_db("locato") or die ("Couldn't find the database ");

    $query = mysql_query("SELECT * FROM user WHERE username='$username' ");

    $numrows=mysql_num_rows($query);


if($numrows!==0)
#open2
{
    while ($row = mysql_fetch_assoc($query)){
        $dbusername= $row['username'];
        $dbpassword= $row['Pwd'];
    }
    #close2

   
    if($username==$dbusername&& ($password) ==$dbpassword)
#open3
    {
        #echo"You are logged in";
        
session_start();

$_SESSION['username']=$username;
$errorText="";
    }
    
#close3


    else
#open4
    {
 
$errorText="Your username or password is incorrect!";
# echo"You are logged in33 $errorText";
    }#close4

}#while close


/*
else
 {
       
$errorText="That user isnt there in the db " ;
echo"You are logged in3444 $errorText";
}
*/
}#if close for num
/*else

{       
$errorText="Please enter username and password";
    echo"You are logged in4466 $errorText";
}
*/

}
#savethem() ends


 session_start();
if(isset($_GET['action'])=='logout'){
     #echo "Hi1";
   unset($_SESSION['username']);
session_destroy();

header("Location: home.php");
exit;
 
}

if (isset($_SESSION['username'])){
 #echo "Hi2";
 include 'header1.php';
}
else{
     #echo "Hi3";
 include 'header.php';
}

#echo "<p name="abc" id="abc">Variable x outside function is: $error</p>";




?>        
     <div align="right"   >
        <p name="abc" id="abc" style="z-index:-1000;font-size: 0;
    margin: 0;padding:0;"><?php
        
    echo $errorText;
?></p> 
                  
               
                    <div class="loginmodal-container" id="login-form" style="z-index:1024;display:none;"  >
                        <h1>SCU Login</h1><br>
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return loginValidate()">
                          
                            <p type="text" id="errorText" name="errorText"placeholder="Username" style="color:red;text-align:center;"><?php echo $errorText?></p>
                   
                          
                            <input type="text" name="username" id="username" placeholder="Username">
                            <input type="password" name="password" id="password"placeholder="Password">
                             <input type="hidden" name="xyz" placeholder="Password" value="xyz">
                            <input type="submit" name="login" class="locb-primary login loginmodal-submit" value="Login" >
                        </form>
                    </div>
               
            </div>


            <div class="container">
<div class="row">
	</div>
    <div class="row">
		<div class="locl-6">
            <div class="locwell locwell-sm">
                    <legend class="text-center header" ><h2 style="margin-top:0px;"	>Location</h2></legend>
						<iframe width="100%" height="226" frameborder="0" style="border:0"
							src="https://www.google.com/maps/embed/v1/search?q=Santa%20Clara%20University%2C%20El%20Camino%20Real%2C%20Santa%20Clara%2C%20CA%2C%20United%20States&key=AIzaSyBtOqxQZS_y4Pfzl7wDa4YtVaRv_J5vBrw" allowfullscreen></iframe>
			</div>
        </div>
        <div class="locl-6">
            <div class="locwell locwell-sm">
                <form class="form-horizontal" method="post">
                    <fieldset>
                        <legend class="text-center header"><h2>Contact us</h2></legend>
                        <div class="form-group">
                            <div class="locm-10 locm-offset-1">
                                <input id="fname" name="name" type="text" placeholder="Name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="locm-10 locm-offset-1">
                                <input id="email" name="email" type="text" placeholder="Email Address" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="locm-10 locm-offset-1">
                                <textarea class="form-control" id="message" name="message" placeholder="Enter your message for us here. We will get back to you within 2 business days." rows="2"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="locm-12 text-center">
                                <button type="submit" class="locb locb-primary locb-lg">Submit</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>


    </div>
	<div class="row">
	<hr>
	</div>
	<div class="row">
	<div class="row">
		            <div class="locs-1">
		</div>
            <div class="locl-2 locs-2 text-center">
                <img class="img-circle img-responsive img-center" src="images/apoorva.jpg" alt="">
				<h4 style="text-align:center;">Apoorva Patil</h4>

            </div>
		   <div class="locs-1">
		</div>
            <div class="locl-2 locs-2 text-center">
                <img class="img-circle img-responsive img-center" src="images/mansi.jpg" alt="">
                <h4 style="text-align:center;">Mansi Iyengar</h4>

            </div>
        <div class="locs-1">
		</div>
		<div class="locl-2 locs-2 text-center">
                <img class="img-circle size img-responsive img-center" src="images/prachi.jpg" alt="">
                <h4 style="text-align:center;">Prajakta Deosthali</h4>

            </div>
		<div class="locs-1">
		</div>
		<div class="locl-2 locs-2 text-center">
                <img class="img-circle img-responsive img-center" src="images/surbhi.jpg" alt="">
                <h4 style="text-align:center;">Surbhi Gupta</h4>

            </div>
        </div>

	</div>

	<hr>
	</div>
</div>
        <!-- Footer -->
 <?php
 include 'footer.php';
?>




</body>

</html>
