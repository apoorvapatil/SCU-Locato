<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Share your stuff">
    <meta name="author" content="locato group 5">

    <title>FAQ</title>
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

    <div class="page-header">
        <h1>FAQs</h1>
    </div>


    <div class="container">
        <div class="panel-group" id="accordion">
            <div class="faqHeader">General questions</div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">How do I login?</a>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="panel-body">
                        Go to login on the right corner of the page, fill in the details.
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTen">What is the currency used for all transactions?</a>
                    </h4>
                </div>
                <div id="collapseTen" class="panel-collapse collapse">
                    <div class="panel-body">
                        All prices for items, including each seller's or buyer's account balance are in USD
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEleven">Is account registration required?</a>
                    </h4>
                </div>
                <div id="collapseEleven" class="panel-collapse collapse">
                    <div class="panel-body">
                        Yes, account registration is required if you want to post ads.
                    </div>
                </div>
            </div>

            <div class="faqHeader">Sellers</div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Who can sell items?</a>
                    </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="panel-body">
                        SCU students, employees and faculty.
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">I want to sell my items - what are the steps?</a>
                    </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse">
                    <div class="panel-body">
                        The steps involved in this process are really simple. All you need to do is:
                        Register an account, Activate your account, Go to the post ad section and upload your ad, The next step is the approval step, which usually takes about 72 hours.
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive">How much do I get from each sale?</a>
                    </h4>
                </div>
                <div id="collapseFive" class="panel-collapse collapse">
                    <div class="panel-body">
                        We offer a great, 70% rate for each seller, regardless of any restrictions, such as volume, date of entry, etc.
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSix">Why sell my items here?</a>
                    </h4>
                </div>
                <div id="collapseSix" class="panel-collapse collapse">
                    <div class="panel-body">
                        Fast response/approval times. Many sites take weeks to process an item. And if it gets rejected, there is another iteration. We have aliminated this, and made the process very fast. It only takes up to 72 hours for an item to get reviewed.
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEight">What are the payment options?</a>
                    </h4>
                </div>
                <div id="collapseEight" class="panel-collapse collapse">
                    <div class="panel-body">
                        You can directly talk to your seller.
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseNine">When do I get paid?</a>
                    </h4>
                </div>
                <div id="collapseNine" class="panel-collapse collapse">
                    <div class="panel-body">
                        You can talk directly with your buyer.
                    </div>
                </div>
            </div>

            <div class="faqHeader">Buyers</div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">I want to buy - what are the steps?</a>
                    </h4>
                </div>
                <div id="collapseFour" class="panel-collapse collapse">
                    <div class="panel-body">
                        Once you have selected an item, which is to your liking, you can quickly and directly pay to your buyer.
                        Once the transaction is complete, you gain full access to the purchased product.
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">Is this the latest version of an item</a>
                    </h4>
                </div>
                <div id="collapseSeven" class="panel-collapse collapse">
                    <div class="panel-body">
                        Each item in Locato is maintained to its latest version. This ensures its smooth operation.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .faqHeader {
            font-size: 27px;
            margin: 20px;
        }

        .panel-heading [data-toggle="collapse"]:after {
            font-family: 'Glyphicons Halflings';
            content: "\e072";
            float: right;
            color: #F58723;
            font-size: 18px;
            line-height: 22px;
            -webkit-transform: rotate(-90deg);
            -moz-transform: rotate(-90deg);
            -ms-transform: rotate(-90deg);
            -o-transform: rotate(-90deg);
            transform: rotate(-90deg);
        }

        .panel-heading [data-toggle="collapse"].collapsed:after {
            -webkit-transform: rotate(90deg);
            -moz-transform: rotate(90deg);
            -ms-transform: rotate(90deg);
            -o-transform: rotate(90deg);
            transform: rotate(90deg);
            color: #454444;
        }
    </style>



</div>
</div>
<?php
 include 'footer.php';
?>



</body>
</html>

