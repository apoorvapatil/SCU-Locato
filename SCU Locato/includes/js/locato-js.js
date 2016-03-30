/*Header dynamic dropdown*/
$( document ).ready(function() {
    
    if($('#abc').text()!="")
    { //  alert("Mansi123");
    	$('#login-form').show();
    }
});




$("#login12").click(function(){
   // alert("The paragraph was clicked.");
     $('#login-form').show();


});


function loginValidate(){
		
	var username=document.getElementById("username").value;
	var pwd=document.getElementById("password").value;
	var errorText=document.getElementById("errorText").innerHTML;
	//console.log("u",username);
	//alert("The paragraph was clicked.");
	if(username=="" || username==null || pwd=="" || pwd==null){
	//alert("ewewevv .");
	document.getElementById("errorText").innerHTML="Please enter username & password";
	return false;
	}
	return true;

};


