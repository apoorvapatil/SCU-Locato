
<?php
 $db = mysql_connect("localhost","root1",""); 
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

    <!-- Navigation -->
    <div class="locbar locbar-inverse locbar-fixed-top">
        <div class="container">

            <!-- .locb-locbar is used as the toggle for collapsed locbar content -->
            <button class="locbar-toggle" data-target=".locbar-responsive-collapse" data-toggle="collapse" type="button">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="locbar-brand" href="home.php"><img id="locat" src="images/logo3.png" height="26px "alt="Locato"/></a>

            <div class="nav-collapse collapse locbar-responsive-collapse">
                <ul class="nav locbar-nav">
                    <li >
                        <a href="home.php">Home</a>
                    </li>

                    <li >
                        <a href="categories1.php">Categories</a>
                    </li>

                    <li>
                        <a href="faq.php">FAQ</a>
                    </li>

                    <li >
                        <a href="contactus.php">Contact Us</a>
                    </li>
                </ul>


                <ul class="nav locbar-nav pull-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> My Account <strong class="caret"></strong></a>

                        <ul class="dropdown-menu">
                            <li>
                                <a href="user-profile.php"><span class="glyphicon glyphicon-refresh"></span> Update Profile</a>
                            </li>
                            <li>
                                <a href="post.php"><span class="glyphicon glyphicon-briefcase"></span> Post Ad</a>
                            </li>

                            <li class="divider"></li>
                            <li>
                                <a href="home1.php"><span class="glyphicon glyphicon-off"></span> Sign out</a>
                            </li>
                        </ul>
                    </li>
                </ul><!-- end nav pull-right -->
            </div><!-- end nav-collapse -->

        </div><!-- end container -->
    </div><!-- end locbar -->
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

if (!empty($_REQUEST['term'])) {
$term = mysql_real_escape_string($_REQUEST['term']);     

$sql = "SELECT * FROM postAd WHERE adname LIKE '%".$term."%'"; 
$r_query = mysql_query($sql); 
while ($row = mysql_fetch_array($r_query)){  
	
	echo '<div class="row">';
            echo '<div class="locl-7">';
			echo '</div>';

echo '<img  class="img-responsive" src="data:image/jpg;base64,'.base64_decode(base64_encode($row['Photo'])) . '" />';
            

			echo '<div class="locl-5">';
			echo "<h3>". $row['adname']."</h3>";
			echo "<h4>". $row['pname']."</h4>";
			echo "<p>". $row['Descr']."</p> <br />";
			echo "<a class='locb locb-primary' href='user-profile.php'>View User <span class='glyphicon glyphicon-chevron-right'></span></a>";
			echo '</div>';
			echo '</div>';
			echo '<hr>';
}  
}
?>
        <!-- locpag -->
        <!-- /.row -->
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
