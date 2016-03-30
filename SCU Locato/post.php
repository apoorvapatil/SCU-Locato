
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Share your stuff">
    <meta name="author" content="locato group 5">

    <title>Post An Ad</title>
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

<?php

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




        ?>

</div>

 <div  class="row">


                <h2 class="text-center header" style="margin-top:3%;">Post your AD here</h2>
        
          
                <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" method="post">
<!--image-->
<div class="locl-5 locm-offset-1">
    <div class="locwell locwell-md">

                <!--<legend class="text-center header">
                    Drag and Drop Image
                </legend>
                <div class="page-wrap">
                <div class="profile">

                  <div class="profile-avatar-wrap">
                    <img src="images/256.jpg" id="profile-avatar" alt="Image for Profile">
                  </div>

                </div>
              </div>
                <input  class="" id="holder" type="file" name="image" >-->
                <div class="page-wrap">

                  <h3>Upload Image</h3>

                  <div class="profile">

                    <div class="profile-avatar-wrap">
                      <img src="images/256.jpg" id="profile-avatar" alt="Image for Profile">
                    </div>

                  </div>

                  <h5></h5>
                  <input id="uploader" type="file" name="image" >

                </div>

                
           
        
    </div>
</div><!--image ends-->

<div class="locl-1"  >

</div>  
<!--form-->
<div class="locl-4" >
    <div class="locwell locwell-sm">
            <div class="form-style-2 ">

                    <?php
            // define variables and set to empty values
                                // define variables and set to empty values
                        $nameErr = $descriptionErr = $categoryErr = "";
                        $category = $name = $description = $price = "";
                         $silly=""; 
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                           
                           if (empty($_POST["pname"])) {
                             $nameErr = "Name is required";
                             $silly="Hi";

                           }
                           elseif (!preg_match("/^[a-zA-Z ]*$/",$pname)) {
                               $nameErr = "Only letters and white space allowed"; 
                                 $silly="Hi";
                             }

                            else {
                          $pname = test_input($_POST["pname"]);   
                             $nameErr ="";
                             // check if name only contains letters and whitespace
                         echo "Hi to all";  
                           }

                           if (empty($_POST["description"])) {
                             $descriptionErr = "Description is required";
                              $silly="Hi";

                           } else {
                             $description = test_input($_POST["description"]);
                              $description ="";
                           }
                         

                           if ($_POST["category"] =="General Question") {
                             $categoryErr = "Category is required";
                            $silly="Hi";
                           } else {
                             $category = test_input($_POST["category"]);
                               $categoryErr="";
                           }

                            if( $nameErr =="" && $descriptionErr ==""
                            && $categoryErr=="" ){
                              echo "In sillly";
                              $silly="";
                            }
                         }


                        function test_input($data) {
                           $data = trim($data);
                           $data = stripslashes($data);
                           $data = htmlspecialchars($data);
                           return $data;
                        }
       
                      if( $silly!="Hi"&& $_SERVER["REQUEST_METHOD"] == "POST"){

                      $image= addslashes($_FILES['image']['tmp_name']);
                        $name= addslashes($_FILES['image']['name']);
                        $image= file_get_contents($image);
                          $image= base64_encode($image);
                         // ini_set('display_errors',1);
                                    
                        function saveimage($name,$image)
                                  {

                                      $pname = $_POST['pname'];
                                                  
                                              $description = $_POST['description'];
                                              $category = $_POST['category'];
                                              $price = $_POST['price'];
                                              
                                      $con=mysql_connect("localhost","root","root");
                                      mysql_select_db("locato",$con);

                                $x=  $_SESSION['username'];
                                 
                       echo "You have visited this page ".  $_SESSION['username'];

                                                   $queryUserData="select Id from user where username='$x'";
                            
                                  $resultUserId=mysql_query($queryUserData,$con);
                                   while ($row = mysql_fetch_array($resultUserId)) {
                                         $userId= $row["Id"];
                      }
/*echo "\n888888";
echo $userId;*/

                      $qry="insert into postAd (Id, Descr, Category, Photo, Userid, adname, price) values (NULL, '$description', '$category','$image',$userId,'$pname',$price)";


                      $result=mysql_query($qry,$con);

 /*echo  $qry;
 echo  $result;*/
                          if($result)
                          {
                             echo "Insertion occured."; 
                          header("Location: user-profile.php");
                          exit;

                             
                          }
                          else
                          {
                              echo "Error occured.";               }
                          
                      }

           saveimage($name,$image);
          } 

                    ?>



<!--end error codes-->

                <div class="form-group">
                    <div class="locm-10 locm-offset-1">
                          <!--  <p  style="text-align:center;"><span class="required">* Required Field.</span></p> -->
                    <p ><strong>
                       Post Name </strong><span class="required">*</span>
                    <input type="text" class="input-field" name="pname"  />
                     </p>
                
                   
                  </div>
                </div>
                

                  <div class="form-group">
                     <div class="locm-10 locm-offset-1"> 
                            
                        <p>&nbsp;<span class="required">
                            <?php echo $nameErr;?></span></p>
                                  
                    </div>
                </div>



                <div class="form-group">
                    <div class="locm-10 locm-offset-1">
                          <!--  <p  style="text-align:center;"><span class="required">* Required Field.</span></p> -->
                  

                    <p ><strong>Description</strong> <span class="required">*</span>
                      <input type="textarea"  rows="5" cols="35" class="input-field" name="description"  />
                    </p>



                    <p name="silly" style="font-size:0px;"><?php echo $silly ?></p>
                </div>
                </div>
                

                  <div class="form-group">
                     <div class="locm-10 locm-offset-1"> 
                            
                        <p>&nbsp;<span class="required">
                            <?php echo $descriptionErr;?></span></p>
                                  
                    </div>
                </div>




                <div class="form-group">
                    <div class="locm-10 locm-offset-1">
                          <!--  <p  style="text-align:center;"><span class="required">* Required Field.</span></p> -->
                    <label >
                       Price&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    
                <input type="text"  class="input-field" name="price"  />
                    </label>
                </div>
                </div>
                


                             <div class="form-group">
                                <div class="locm-10 locm-offset-1">
                                   <p><strong>Category</strong><span style="color:red;">*</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <select name="category" class="select-field" >
                                        <option value="General Question">Select Category</option>
                                        <option value="Advertise">Jobs</option>
                                        <option value="LostandFound">Lost and Found</option>
                                        <option value="Vehicle">Vehicle</option>
                                        <option value="Pets">Pets</option>
                                        <option value="Electronics">Electronics</option>
                                        <option value="Fashion">Fashion</option>
                                        </select>
                                        <br>
                                       
                                    </p>
                                    <p> <span class="required"><?php echo $categoryErr;?></span>
                                  </p>
                                </div>
                           </div>  



                            <div class="form-group">
                                <div class="locm-10 locm-offset-1">
                                    <input type="checkbox" name="vehicle" value="Bike"> Do you agree to our policies?<br /><br /><br />
                                </div>
                           </div>







                    <label><span>&nbsp;</span><input class="locb-primary" type="submit" value="Post"/></label>
    
              </div><!--form ends-->

            </div>

        </div> 




    </form>
          


</div>

<?php
 include 'footer.php';
?>

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  <script src="includes/js/resample.js"></script>
  <script src="includes/js/avatar.js"></script>
	</body>
</html>
