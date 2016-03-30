<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Share your stuff">
    <meta name="author" content="locato group 5">

    <title>Pets</title>
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
                                <a href="home.php"><span class="glyphicon glyphicon-off"></span> Sign out</a>
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
                <h1 class="page-header">Pet
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
        <!-- /.row -->

            <!-- Project One -->
            <div class="row">
                <div class="locl-7">
                    <a href="#">
                        <img class="img-responsive" src="images/pet1.jpg" alt="">
                    </a>
                </div>
                <div class="locl-5">
                    <h3>Dogs for Adoption</h3>
                    <h4>Missing Dog Help</h4>
                    <p>Find out what to do if your dog goes missing and the best ways to get help.</p>
                    <a class="locb locb-primary" href="#">View User <span class="glyphicon glyphicon-chevron-right"></span></a>
                </div>
            </div>
            <!-- /.row -->

            <hr>

            <!-- Project Two -->
            <div class="row">
                <div class="locl-7">
                    <a href="#">
                        <img class="img-responsive" src="images/pet2.jpg" alt="">
                    </a>
                </div>
                <div class="locl-5">
                    <h3>For sale</h3>
                    <h4>Prevent Pet Theft</h4>
                    <p>Up to two million animals are stolen each year. Learn some information on what happens to stolen pets and how to prevent pet theft.</p>
                    <a class="locb locb-primary" href="#">View User<span class="glyphicon glyphicon-chevron-right"></span></a>
                </div>
            </div>
            <!-- /.row -->

            <hr>

            <!-- Project Three -->
            <div class="row">
                <div class="locl-7">
                    <a href="#">
                        <img class="img-responsive" src="images/pet3.jpg" alt="">
                    </a>
                </div>
                <div class="locl-5">
                    <h3>Black cat</h3>
                    <h4>Microchips Are Catching On</h4>
                    <p>Microchips Are Catching On</p>
                    <a class="locb locb-primary" href="#">View User<span class="glyphicon glyphicon-chevron-right"></span></a>
                </div>
            </div>
            <!-- /.row -->

            <hr>

            <!-- Project Four -->
            <div class="row">

                <div class="locl-7">
                    <a href="#">
                        <img class="img-responsive" src="images/pet4.jpg" alt="">
                    </a>
                </div>
                <div class="locl-5">
                    <h3>Dog</h3>
                    <h4>Need home</h4>
                    <p>Up to two million animals are stolen each year. Learn some information on what happens to stolen pets and how to prevent pet theft.</p>
                    <a class="locb locb-primary" href="#">View User <span class="glyphicon glyphicon-chevron-right"></span></a>
                </div>
            </div>
            <!-- /.row -->

            <hr>

            <!-- Project Five -->
            <div class="row">
                <div class="locl-7">
                    <a href="#">
                        <img class="img-responsive" src="images/pet5.jpg" alt="">
                    </a>
                </div>
                <div class="locl-5">
                    <h3>Dog</h3>
                    <h4>Need help</h4>
                    <p>Up to two million animals are stolen each year. Learn some information on what happens to stolen pets and how to prevent pet theft.</p>
                    <a class="locb locb-primary" href="#">View User <span class="glyphicon glyphicon-chevron-right"></span></a>
                </div>
            </div>

       
        <!-- /.row -->

        <hr>

        <!-- locpag -->
        <div class="row text-center">
            <div class="locl-12">
                <ul class="locpag">
                    <li>
                        <a href="#">&laquo;</a>
                    </li>
                    <li class="active">
                        <a href="#">1</a>
                    </li>
                    
                    <li>
                        <a href="#">&raquo;</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /.row -->
    </div>

        <!-- Footer -->
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

        </div>
			 </div>
	</footer>

    <script src="http://code.jquery.com/jquery.js"></script>

    <!-- If no online access, fallback to our hardcoded version of jQuery -->
    <script>window.jQuery || document.write('<script src="includes/js/jquery-1.8.2.min.js"><\/script>')</script>

    <script src="includes/js/locato.js"></script>


</body>

</html>
