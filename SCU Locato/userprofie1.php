
<?php 

$servername = "localhost";
$dbusername = "root1";
$dbpassword = "";
$dbname = "locato";
session_start(); 

if(isset($_SESSION['username']) && !empty($_SESSION['username'])) { 
        $username =$_SESSION["username"]; 

        echo  $username;
   }

//db connection 
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname); 
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
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

    <title>User Profile</title>
    <link href="includes/css/locato.css" rel="stylesheet">
    <link href="includes/css/shop-homepage.css" rel="stylesheet">
    <link href="includes/css/glyphicons.css" rel="stylesheet">
    <link href="includes/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="includes/css/styles.css">
    <link rel="stylesheet" href="includes/css/locato-css.css">

    <link href="includes/css/business-frontpage.css" rel="stylesheet">
<style>
div.show-image {
    position: relative;
    float:left;
    margin:5px;
}
div.show-image:hover img{
    opacity:0.5;
}
div.show-image:hover input {
    display: block;
}
div.show-image input {
    position:absolute;
    display:none;
}
div.show-image input.update {
    top:0;
    left:0;
}
div.show-image input.delete {
    top:0;
    left:79%;
}
</style>
 
 <script>
function deletead(a){
    alert("right"); 
    alert(a);
    confirm("Something"); 
    var r = confirm ("Are you sure?"); 
    
    if (r == true){
        alert("here");        
        var d = <?php echo dele(a); ?>; 
        alert (d); 
    }
}
</script>
</head>
    <body>
<?php
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<?php 

//temp variables declaration
//$username ="prajakta"; //to be removed 
$name = $email = $phonenumber = $description1 = $address = "";

$result = mysqli_query($conn, "SELECT * FROM user where username = '$username'");

if ($result->num_rows > 0) {  
    $row = $result->fetch_assoc();  
} 

$userid=$row[Id];

echo $userid;

if(isset($_POST['updatedata'])) {
  $name = test_input($_POST["name"]);
  $email = test_input($_POST["email"]);
  $phonenumber = test_input($_POST["phonenumber"]);
  $description1 = test_input($_POST["description1"]);
 // $address = test_input($_POST["address"]);
}

 // $update = "UPDATE user "."SET email = '".$email."' WHERE username = '".$username."' " ;
 $update = "UPDATE user "."SET Name = '".$name."',Email = '".$email."', Phonenumber = '".$phonenumber."',description ='".$description1."' WHERE username = '".$username."' " ;
 
  $update1 = mysqli_query($conn, $update);  
  $result = mysqli_query($conn, "SELECT * FROM user where username ='$username'");

if ($result->num_rows > 0) {  
    $row = $result->fetch_assoc();  
} 

$retval = mysqli_query($conn, "SELECT count(Id) FROM postAd WHERE userId =$userid");
         if(!$retval ) {
            die('Could not get data: ' . mysql_error());
         }
         $rec_limit = 4;
        $row8 = $retval->fetch_assoc(); 
        
         //$row8 = mysql_fetch_array($retval, MYSQL_NUM );
        $rec_count = $row8[0];  
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



$grab = mysqli_query($conn, "SELECT * FROM postAd WHERE userid =$userid"); 


//mine(); 

function mine(){
  
   $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname); 
// $deletead1 = "DELETE FROM postad WHERE postad_id= 1"; 
//$deletead2 = mysqli_query($conn, $deletead1);  
 if (mysqli_query($conn, $deletead1)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
}


function dele($a){ 

  $con=mysql_connect("localhost","root1","");
  mysql_select_db("locato",$con);
   $b=$a;
 //$deletead5 = "DELETE FROM postad WHERE Id=25"; 
 $deletead5 = "DELETE FROM postad WHERE Id= $b"; 
   //$deletead5 = "DELETE FROM postad WHERE Id=".$b.""; 
   $deletead2=mysql_query( $deletead5,$con);
#$deletead2 = mysqli_query($conn, $deletead5);  
if ($deletead2 ){
return $deletead5; 
}
 return $b;   
} 


?>
        <div class="container" id="main">

            <div class="locbar locbar-inverse locbar-fixed-top">
        <div class="container">

            <!-- .locb-locbar is used as the toggle for collapsed locbar content -->
            <button class="locbar-toggle" data-target=".locbar-responsive-collapse" data-toggle="collapse" type="button">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="locbar-brand" href="home.html"><img id="locat" src="images/logo3.png" height="26px "alt="Locato"/></a>

            <div class="nav-collapse collapse locbar-responsive-collapse">
                <ul class="nav locbar-nav">
                    <li class="active">
                        <a href="home.html">Home</a>
                    </li>

                    <li>
                        <a href="categories1.html">Categories</a>
                    </li>

                    <li>
                        <a href="faq.html">FAQ</a>
                    </li>

                    <li>
                        <a href="contactus.html">Contact Us</a>
                    </li>



                </ul>


                <ul class="nav locbar-nav pull-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> My Account <strong class="caret"></strong></a>

                        <ul class="dropdown-menu">
                            <li>
                                <a href="user-profile.html"><span class="glyphicon glyphicon-refresh"></span> Update Profile</a>
                            </li>
                            <li>
                                <a href="post.html"><span class="glyphicon glyphicon-briefcase"></span> Post Ad</a>
                            </li>

                            <li class="divider"></li>
                            <li>
                                <a href="home1.html"><span class="glyphicon glyphicon-off"></span> Sign out</a>
                            </li>
                        </ul>
                    </li>
                </ul><!-- end nav pull-right -->
            </div><!-- end nav-collapse -->

        </div><!-- end container -->
    </div><!-- end locbar -->

    <!-- User profile content starts here -->
    <br /> <br /> <br />
    <div class="container">
      <div class="row">
                <div class="locs-3 feature" > </div>

                <div class="locs-3 feature">
                  <?php  $row[photo]; ?>
                  
                  <script>
                  function displaybutton(){
                      document.getElementById("submitedits").style.display = "block"; 
                      document.getElementById("editing").style.display ="none"; 
                  }
                  
                  </script>
                   <img src="images/prof1.jpg" alt="CSS3" class="img-circle">
                </div>
                <h3><button type="button" value="Edit" id="editing" name="Edit" onclick="displaybutton()"> Edit</button></h3>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="locs-3 feature">
                   <h3><input type="text" name="name" value ="<?php echo $row["Name"];  ?>" ></h3>
                    <p><textarea rows="1" maxlength="50" cols="50" name="description1" value ="<?php $row["desc"] ?>"><?php echo $row["description"];  ?></textarea> </p>
                    <h4>Contact Information</h4>                   
                    <p><span class="glyphicon glyphicon-phone"></span>Phone:<input type="text" name="phonenumber" value ="<?php echo $row["Phonenumber"];  ?>"></p>
                   <p><span class="glyphicon glyphicon-envelope"></span> Email: <input type="text" name="email" value ="<?php echo $row["Email"];  ?>"> </p>
                   <!--  <p><span class="glyphicon glyphicon-home"></span>Dorm:<input type="text" name="address" value ="<?php #echo $row["ddress"];  ?>"> -->
                    <input type="submit" id="submitedits" style="display:none" value="Submit" name="updatedata"> </input> </p>
               
                </div>
                </form>
                <div class="locs-3 feature"> </div>

       </div>
     <div class="row" id="featuresHeading">
                <div class="col-12">
                    <h2 style="text-align:center">My Posts</h2>

                </div><!-- end col-12 -->
            </div><!-- end featuresHeading -->
    <div class="row" id="features">
   
    <?php 
     
    if ($grab->num_rows > 0) { 
     $i=0; 
    while ($row5 = $grab->fetch_assoc()){
       // $currentpostid.$i = $row5['Id'];
        //echo $currentpostid.$i ;
       echo '<div class="locs-3 feature">'; 
       echo '<div class="panel show-image">'; 
      /* echo '<input class="update" type="button" value="Update" name="updateads"></input>';*/
       /*echo "<input type='hidden' name='currentpostid' id='currpostid'.$i'>".$row5['Id']." value=""></input>"; 
       */echo '<input  class="delete" type="button" value="Delete" onclick="deletead('.$row5['Id'].')" ></input>'; 
       #echo '<img src="images/badge_pic1.jpg"  alt="HTML5">' ; 
       echo '<img  class="img-responsive" src="data:image/jpg;base64,'.base64_decode(base64_encode($row5['Photo'])) . '" />';
      
       echo "<p>".$row5['Descr']."</p>" ;
     
        echo "<p id='".$row5['Id']."' >".$row5['Id']."</p>" ;
      
       echo '</div>'; 
       echo '</div>'; 
      
      
    }
   
 //$deletead1 = "DELETE FROM postad WHERE Id=25"; 
 
}  
    ?>
            </div><!-- end features -->

    <!-- locpag -->
        <div class="row text-center">
        
          
            <div class="locl-12">
            <?php                     
        $pagLink="<ul class='locpag'>"; 
        $pagLink .= "<li><a href='user-profile.php'>1</li>";

        for ($i=0; $i<=$total_pages-2; $i++) {
            
             $rig=$i+2;
             $pagLink .= "<li><a href='user-profile.php?page=".$i."'>".$rig."</a></li>";  
        };  
            echo  $pagLink . "</ul>"; 
            
        

            ?> 
                
            </div>
        </div>
        <!-- /.row -->

<?php 

  
?>
 </div>
    <!-- User profile content ends here -->
         </div> <!-- Main container ends -->

        <footer>
            <div class="container">
            <div class="row">

            <div class="locs-1">
               <img src="images/footer-mission.png" height="68px"alt="scu mission logo" style="float: left;"/>
            </div><!-- end locs-1 -->

                <div class="locs-3">
                <h5> Location</h5>
                <h6>
                    500 El Camino Real,<br/>
                    Santa Clara, CA 95053<br/>
                    (408) 554-4000<br/></h6>
            </div><!-- end locs-3 -->


            <div class="locs-3">
                <h5>Copyright &copy; 2016 Locato</h5>
            </div><!-- end locs-3 -->


            <div class="locm-5 ">



                <ul class=" socials list-inline ">
                    <li>
                        <a href="https://www.facebook.com/SantaClaraUniversity" class="locb-social" ><i class="fa fa-facebook"></i></a>
                    </li>

                        <li>
                    <a href="https://www.linkedin.com/edu/santa-clara-university-17914" class="locb-social" ><i class="fa fa-linkedin"></i></a>
                </li>
                    <li>
                        <a   href="https://twitter.com/SantaClaraUniv" class="locb-social" ><i class="fa fa-twitter"></i></a>
                    </li>



                        <li>
                            <a href="https://www.pinterest.com/santaclarauniv/" class="locb-social" ><i class="fa fa-pinterest"></i></a>
                        </li>
                    <li>
                        <a  href="https://instagram.com/santaclarauniversity/" class="locb-social" ><i class="fa fa-instagram"></i></a>
                    </li>

                </ul>


            </div><!--end of locs-5-->

        </div><!-- end row -->
    </div><!-- end container -->
        </footer>

        <script src="http://code.jquery.com/jquery.js"></script>

        <!-- If no online access, fallback to our hardcoded version of jQuery -->
        <script>window.jQuery || document.write('<script src="includes/js/jquery-1.8.2.min.js"><\/script>')</script>

        <script src="includes/js/locato.js"></script>

 


    </body>
</html>