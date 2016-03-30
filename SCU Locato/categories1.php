<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Share your stuff">
    <meta name="author" content="locato group 5">

    <title>Categories</title>
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
     <div align="right">
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
                    </div>
               
            </div>



    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="locl-3">
                <h2 class="page-header">Select a Category</h2>
                <div class="list-group">
                    <a href="categoryfilter_job.php" class="list-group-item"><img src="images/job-post.png" alt="job"> &nbsp;  Jobs</a>
                    <a href="categoryfilter_lost.php" class="list-group-item"><img src="images/lost.png" alt="lost"> &nbsp;Lost and Found</a>
                    <a href="cat1.php" class="list-group-item"><img src="images/sports-car.png" alt="car"> &nbsp; Vehicles</a>
                    <a href="categoryfilter_pets.php" class="list-group-item"><img src="images/dog.png" alt="dog"> &nbsp;Pets</a>
                    <a href="categoryfilter_elec.php" class="list-group-item"><img src="images/elec.png" alt="elec"> &nbsp;Electronics</a>
                    <a href="categoryfilter_fashion.php" class="list-group-item"><img src="images/fashion.png" alt="fashion"> &nbsp;Fashion</a>



                </div>
            </div>

            <div class="locl-9">
                <div class="row">
                    <div class="locs-4 locl-4 locl-4">
                        <br>

                        <div class="thumbnail">
                            <img src="images/job.jpg" alt="">
                            <div class="caption">
                                <h4><a href="categoryfilter_job.php">Jobs</a>
                                </h4>
                                <p>Search job boards at once to find the best match for you. Your next job will be found through Locato.</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right"></p>
                                <p>

                                    <span >&nbsp;</span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="locs-4 locl-4 locl-4">
                        <br>

                        <div class="thumbnail">
                            <img src="images/lost.jpg" alt="">
                            <div class="caption">
                                <h4><a href="categoryfilter_lost.php">Lost and Found</a>
                                </h4>
                                <p>Locato makes every reasonable attempt to return found property to its rightful owner.</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right"></p>
                                <p>
                                    <span >&nbsp;</span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="locs-4 locl-4 locl-4">
                        <br>
                        <div class="thumbnail">
                            <img src="images/cars.jpeg" alt="">
                            <div class="caption">
                                <h4><a href="cat1.php">Vehicles</a>
                                </h4>
                                <p>Buy and sell autos, trucks, parts, motorcycles, boats, accessories, and other used cars and vehicles.</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right"></p>
                                <p>
                                    <span>&nbsp;</span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="locs-4 locl-4 locl-4">
                        <br>
                        <div class="thumbnail">
                            <img src="images/pets.jpg" alt="">
                            <div class="caption">
                                <h4><a href="categoryfilter_pets.php">Pets</a>
                                </h4>
                                <p>Find pets for sale and adoption, birds, cats, dogs, fish, horses, livestock, pet supplies, rabbits, reptiles, and more on Oodle Marketplace.</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right"></p>
                                <p>
                                    <span>&nbsp;</span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="locs-4 locl-4 locl-4">
                        <br>
                        <div class="thumbnail">
                            <img src="images/electronics.jpg" alt="">
                            <div class="caption">
                                <h4><a href="categoryfilter_elec.php">Electronics</a>
                                </h4>
                                <p>Shop for your home electronics, from computers & laptops parts to cameras and televisions.</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right"></p>
                                <p>
                                    <span>&nbsp;</span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="locs-4 locl-4 locl-4">
                        <br>
                        <div class="thumbnail">
                            <img src="images/fashion.jpg" alt="">
                            <div class="caption">
                                <h4><a href="categoryfilter_fashion.php">Fashion</a>
                                </h4>
                                <p>Shop for Footwears, Tops, Kurti, Dresses, Bags Online.</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right"></p>
                                <p>
                                    <span>&nbsp;</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    <p><br/></p>
    <!-- /.container -->
</div>
<?php
 include 'footer.php';
?>
	


</body>

</html>
