<?php
    ini_set('mysql.connect_timeout',300);
    ini_set('default_socket_timeout',300);
?>
<html>
    <body>
        
        
        <?php
                    
                    $image= addslashes($_FILES['image']['tmp_name']);
                    $name= addslashes($_FILES['image']['name']);
                    $image= file_get_contents($image);
                    $image= base64_encode($image);
                    saveimage($name,$image);
                    ini_set('display_errors',1);
                    
                function saveimage($name,$image)
            {
                $pname = $_POST['pname'];
                            
                        $description = $_POST['description'];
                        $category = $_POST['category'];
                        $price = $_POST['price'];
                $con=mysql_connect("localhost","root1","");
                mysql_select_db("locato",$con);
                $qry="insert into postAd (Id, Descr, Category, Photo, Userid, pname, price) values (NULL, '$description', '$category','$image', 1,'$pname',$price)";



                $result=mysql_query($qry,$con);
                if($result)
                {
                    //echo "<br/>Image uploaded.";
                }
                else
                {
                    //echo "<br/>Image not uploaded.";
                }
            }
            function displayimage()
            {
                $con=mysql_connect("localhost","root1","");
                mysql_select_db("locato",$con);
                $qry="select * from images";
                $result=mysql_query($qry,$con);
                while($row = mysql_fetch_array($result))
                {
                    echo '<img height="300" width="300" src="data:image;base64,'.$row[2].' "> ';
                }
                mysql_close($con);   
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

    <title>Post An Ad</title>
    <link rel="stylesheet" type="text/css" href="css/dropzone.css" />
    <script type="text/javascript" src="js/dropzone.js"></script>
    <link href="includes/css/locato.css" rel="stylesheet">
    <link href="includes/css/shop-homepage.css" rel="stylesheet">
    <link href="includes/css/glyphicons.css" rel="stylesheet">
    <link href="includes/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="includes/css/styles.css">
    <link rel="stylesheet" href="includes/css/locato-css.css">

    <link href="includes/css/business-frontpage.css" rel="stylesheet">
    <style>
        .error {color: #FF0000;}
    </style>
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

        <a class="locbar-brand" href="home.html"><img id="locat" src="images/logo3.png" height="26px "alt="Locato"/></a>

        <div class="nav-collapse collapse locbar-responsive-collapse">
            <ul class="nav locbar-nav">
                <li >
                    <a href="home.html">Home</a>
                </li>

                <li >
                    <a href="categories1.html">Categories</a>
                </li>

                <li>
                    <a href="faq.html">FAQ</a>
                </li>

                <li >
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
    <br />
    <br />
    <br />
    <br />
    <div class="row">
      
        <div class="locl-1">
        </div>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data"> 
                <div class="locl-5">
          
        </div>

        <div class="locl-1">
        </div>
    <div class="locl-4">
        <div class="locwell locwell-sm">
            <div class="form-style-2 ">
                <legend class="text-center header">Post your AD here</legend>
                <p><span class="error">* required field.</span></p>
                  
            
                    <?php
            // define variables and set to empty values
                                // define variables and set to empty values
                        $nameErr = $descriptionErr = $categoryErr = "";
                        $category = $name = $description = $price = "";

                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                           
                           if (empty($_POST["pname"])) {
                             $nameErr = "Name is required";
                           } else {
                             $pname = test_input($_POST["pname"]);
                             // check if name only contains letters and whitespace
                             if (!preg_match("/^[a-zA-Z ]*$/",$pname)) {
                               $nameErr = "Only letters and white space allowed"; 
                             }
                           }

                           if (empty($_POST["description"])) {
                             $descriptionErr = "Description is required";
                           } else {
                             $description = test_input($_POST["description"]);
                           }

                           if ($_POST["category"] == "Select Category") {
                             $categoryErr = "Category is required";
                           } else {
                             $category = test_input($_POST["category"]);
                           }
                        }

                        function test_input($data) {
                           $data = trim($data);
                           $data = stripslashes($data);
                           $data = htmlspecialchars($data);
                           return $data;
                        }

                        
                    ?>

                        
                           <div class="form-group">
                                <div class="locm-10 locm-offset-1"> 
                                   <strong><span style="color:red;">*</span>Post Name: </strong><input type="text" name="pname">
                                   <span class="error"><?php echo $nameErr;?></span>
                                   <br><br>
                                </div>
                           </div>
                           
                           <div class="form-group">
                                <div class="locm-10 locm-offset-1">     
                                   <strong><span style="color:red;">*</span>Description: </strong> <textarea name="description" rows="5" cols="35"></textarea>
                                   <span class="error"><?php echo $descriptionErr;?></span>
                                   <br><br>
                                </div>
                           </div>
                           
                           <div class="form-group">
                                <div class="locm-10 locm-offset-1">     
                                   <strong>Price: </strong><input type="text" name="price">
                                   <br><br>
                                </div>
                           </div>
                           <div class="form-group">
                                <div class="locm-10 locm-offset-1">
                                   <label ><span><span style="color:red;">*</span>Category: </span>
                                        <select name="category" class="select-field" style="margin-top: 2%;">
                                        <option value="General Question">Select Category</option>
                                        <option value="Advertise">Jobs</option>
                                        <option value="LostandFound">Lost and Found</option>
                                        <option value="Vehicle">Vehicle</option>
                                        <option value="Pets">Pets</option>
                                        <option value="Electronics">Electronics</option>
                                        <option value="Fashion">Fashion</option>
                                        </select>
                                        <span class="error"><?php echo $categoryErr;?></span>
                                    </label>

                                   <br><br>
                                </div>
                           </div>  
                           <div class="form-group">
                              <div class="locm-10 locm-offset-1">
                                <label for="photo">Photo: <input type="file" name="image" id="photo">
                                </label>
                                <br><br>
                              </div>
                          </div>
                           <div class="form-group">
                                <div class="locm-10 locm-offset-1">
                                    <input type="checkbox" name="vehicle" value="Bike"> Do you agree to our policies?<br /><br /><br />
                                </div>
                           </div>

                          

                           <label><span>&nbsp;</span><input class="locb-primary" type="submit" name="submit" value="submit"></label>
                        

                        </div>
                    </div>
                    </div>
                    </form>
                    </div>
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


            </div>

        </div>
             </div>
    </footer>

<script src="http://code.jquery.com/jquery.js"></script>

<!-- If no online access, fallback to our hardcoded version of jQuery -->
<script>window.jQuery || document.write('<script src="includes/js/jquery-1.8.2.min.js"><\/script>')</script>

<script src="includes/js/locato.js"></script>
<script src="includes/js/postAd.js"></script>


    </body>
</html>