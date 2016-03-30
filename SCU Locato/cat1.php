<?php
 $db = mysql_connect("localhost","root","root"); 
 if (!$db) {
 die("Database connection failed miserably: " . mysql_error());
 }
//Step2
 $db_select = mysql_select_db("locato",$db);
 if (!$db_select) {
 die("Database selection also failed miserably: " . mysql_error());
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Share your stuff">
    <meta name="author" content="locato group 5">
    <title>Vehicles</title>
    <link href="includes/css/locato.css" rel="stylesheet">
    <link href="includes/css/shop-homepage.css" rel="stylesheet">
    <link href="includes/css/glyphicons.css" rel="stylesheet">
    <link href="includes/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="includes/css/styles.css">
    <link rel="stylesheet" href="includes/css/locato-css.css">

    <link href="includes/css/business-frontpage.css" rel="stylesheet">

</head>

<body>
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
                    <div class="loginmodal-container" id="login-form" style="z-index:1024;display:none;"  >
                        <h1>SCU Login</h1><br>
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return loginValidate()">
                          
                            <p type="text" id="errorText" name="errorText"placeholder="Username" style="color:red;text-align:center;"><?php echo $errorText?></p>
                   
                          
                            <input type="text" name="username" id="username" placeholder="Username">
                            <input type="password" name="password" id="password"placeholder="Password">
                             <input type="hidden" name="xyz" placeholder="Password" value="xyz">
                            <input type="submit" name="login" class="locb-primary login loginmodal-submit" value="Login" >
                        </form>

                    <!--    <div class="login-help">
                            <a href="#">Register</a> - <a href="#">Forgot Password</a>
                        </div>-->
                    </div>
               



<!-- Page Content -->
    <!-- Page Content -->
    <div class="container">
        <!-- Page Heading -->
        <div class="row">
            <div class="locl-8">
                <h1 class="page-header">Cars
                    <small>Buy and Sell</small>
                </h1>
            </div>
		</div>
		<div class="row">
			<form action="search.php" method="post">  	
           <div id="custom-search-input">
                            <div class="input-group locm-12">
                                <input type="text" class="  search-query form-control" placeholder="Search" name="term" />
                                <span class="input-group-locb">
                                    <button type="submit" class="locb locb-danger" value="submit">
                                        <span class=" glyphicon glyphicon-search"></span>
                                    </button>
                                </span>
                            </div>
				</div>	
			</form>
		</div>
		<br>

 
<?php

		
		$retval = mysql_query("SELECT count(id) FROM postAd where category='Vehicle' ", $db);
         if(!$retval ) {
            die('Could not get data: ' . mysql_error());
         }
		 $rec_limit = 3;
		
         $row = mysql_fetch_array($retval, MYSQL_NUM );
         $rec_count = $row[0]; 	
		$total_pages = ceil($rec_count / $rec_limit); 	
			if(isset($_GET{'page'})) 
		 {
            $page = $_GET{'page'} + 1;
            $offset = $rec_limit * $page ;
         }
			else 
		 {
				
			$page = 1;
            $offset = 0;
         }
         
       $left_rec = $rec_count - ($page * $rec_limit);
			/*change here the query if yolu plan to have no page number*/
       $sql = "SELECT * FROM postAd where category='Vehicle' LIMIT $offset, $rec_limit";
       $retval = mysql_query($sql, $db);
	   
	   if(!$retval) 
	   {
       		die('Could not get data: ' . mysql_error());
       } 
			
       while($row = mysql_fetch_array($retval, MYSQL_ASSOC))  {
			echo '<div class="row hello">';
            echo '<div class="locl-7">';
			echo '<img  class="img-responsive" src="data:image/jpg;base64,'.base64_decode(base64_encode($row['Photo'])) . '" />';
			echo '</div>';
			echo '<div class="locl-5">';
			echo "<h3>". $row['adname']."</h3>";
			echo "<h4>". $row['pname']."</h4>";
			echo "<p>". $row['Descr']."</p> <br />";
			echo "<a class='locb locb-primary' href='user-profile.php'>View User<span class='glyphicon glyphicon-chevron-right'></span></a>";
			echo '</div>';
			echo '</div>';
			echo '<hr>';
       }
		echo "<div class='row text-center'>";
     	$pagLink="<ul class='locpag'>"; 
		$pagLink .= "<li><a href='cat1.php'>1</a></li>";

		for ($i=0; $i<=$total_pages-2; $i++) {
			
			 $rig=$i+2;
             $pagLink .= "<li><a href='cat1.php?page=".$i."'>".$rig."</a></li>";  
		};  
			echo  $pagLink . "</ul>"; 
			echo "</div>";
         
         mysql_close($conn);
      ?>
    </div>
    </div>
<?php
 include 'footer.php';
?>
        <script src="http://code.jquery.com/jquery.js"></script>

        <!-- If no online access, fallback to our hardcoded version of jQuery -->
        <script>window.jQuery || document.write('<script src="includes/js/jquery-1.8.2.min.js"><\/script>')</script>
   <script src="includes/js/locato-js.js"></script>
        <script src="includes/js/locato.js"></script>
         


</body>

</html>
