<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Share your stuff">
    <meta name="author" content="locato group 5">

    <title>Home</title>
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
    $connect = mysql_connect("localhost","root","root") or die("Couldn't connect to the database");
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
 #echo "You are logged in33 $errorText";
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
                          
                            <p type="text" id="errorText" name="errorText" placeholder="Username" style="color:red;text-align:center;"><?php echo $errorText?></p>
                   
                          
                            <input type="text" name="username" id="username" placeholder="Username">
                            <input type="password" name="password" id="password" placeholder="Password">
                             <input type="hidden" name="xyz" placeholder="Password" value="xyz">
                            <input type="submit" name="login" class="locb-primary login loginmodal-submit" value="Login" >
                        </form>

                    <!--    <div class="login-help">
                            <a href="#">Register</a> - <a href="#">Forgot Password</a>
                        </div>-->
                    </div>
               
            </div>


			<div class="carousel slide" id="myCarousel" data-ride="carousel">

				<!-- Indicators -->
				<ol class="carousel-indicators">
					<li class="active" data-slide-to="0" data-target="#myCarousel"></li>
					<li data-slide-to="1" data-target="#myCarousel"></li>
					<li data-slide-to="2" data-target="#myCarousel"></li>
				</ol>

				<!-- Wrapper for slides -->
				<div class="carousel-inner img-responsive">
					<div class="item active" id="slide1">
						<div class="carousel-caption textintro">
							<h4>Buy</h4>
							<p>Buy the Best!</p>
						</div><!-- end carousel-caption-->
					</div><!-- end item -->

					<div class="item" id="slide2">
						<div class="carousel-caption textintro">
							<h4>Sell</h4>
							<p>Sell anything and everything to the dorm neighbour</p>
						</div><!-- end carousel-caption-->
					</div><!-- end item -->

					<div class="item" id="slide3">
						<div class="carousel-caption textintro">
							<h4>Rent</h4>
							<p>Books, skateboards and much more ..</p>
						</div><!-- end carousel-caption-->
					</div><!-- end item -->
				</div><!-- carousel-inner -->

				<a class="left carousel-control textintro" data-slide="prev" href="#myCarousel"><span class="icon-prev"></span></a>
				<a class="right carousel-control textintro" data-slide="next" href="#myCarousel"><span class="icon-next"></span></a>

			</div>





			<div class="row" id="featuresHeading">
				<div class="col-12">
					<h2 style="text-align:center">Broncos Speak</h2>

				</div>
			</div>

			<div class="row" id="features">
				<div class="locs-4 feature">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">John Grid</h3>
						</div>
						<img src="images/prof1.jpg" alt="HTML5" class="img-circle">

                        <p>In a very short time, we went from having NO CLUE how to sell on Locato, to having the confidence to find the right products.</p>
						<a href="#"  class="locb locb-warning locb-block">Profile</a>
					</div>
				</div>

				<div class="locs-4 feature">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Roger Do</h3>
						</div><!-- end panel-heading -->
						<img src="images/prof2.jpg" alt="CSS3" class="img-circle">

                        <p>After just a couple of months and a few sessions, I saw INSTANT returns, and each week my sales increased!.</p>
						<a href="#" target="_blank" class="locb locb-danger locb-block">Profile</a>
					</div>
				</div>

				<div class="locs-4 feature">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Fionna Roy</h3>
						</div><!-- end panel-heading -->
						<img src="images/prof3.jpg" alt="Bootstrap 3" class="img-circle">

                        <p>I have been very impressed with your friendliness and responsiveness. I would go so far as to say you set a benchmark in classifies platforms we have.</p>

						<a href="#"  class="locb locb-info locb-block">Profile</a>
					</div><!-- end panel -->
				</div><!-- end feature -->
			</div><!-- end features -->
		</div>

<?php
 include 'footer.php';
?>
     
         

	</body>
</html>

