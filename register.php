<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>
            Registration Form
        </title>
    </head>
    <body>
    <?php include "header.php" ?>
    <h1 style="text-align:center;">Registration Form</h1>
    <hr>
        <div class="container-fluid">    
        <form style="padding:10%;">
        <!-- <div class="form-row" > -->
        <div  id="form1" >
            <div class="form-group col-md-12">
                    <label for="inputEmail4">Email Address<span style="color:red;">*</span></label>
                    <input type="email" class="form-control" id="email"  name="email">
            </div>

            <div class="form-group col-md-12">
                    <button type="button" class="btn btn-primary" id="se" name="sub" onclick="sendMail()">Send OTP</button>
            </div>
        </div>
        <div  id="form" style="display:none;" >
            <div id="form" class="form-group col-md-12" >
                <label for="inputEmail4">Enter OTP</label>
                <input type="number" class="form-control" id="otp"  name="otp">
            </div> 
            <div class="form-group col-md-12">
                <button type="button" class="btn btn-primary" name="subm" id="so" onclick="sendotp()">Submit</button>
            </div>
        </div>
       
        
        
         <div  id="sms" style="display:none;">
            <div class="form-group col-md-12">
                    <label>Enter Mobile Number<span style="color:red;">*</span></label>
                    <input type="number" class="form-control" id="mobile"  name="mobile">
            </div>

            <div class="form-group col-md-12">
                    <button type="button" class="btn btn-primary" id="se1" name="submit" onclick="sendSms()">Send OTP</button>
            </div>
        </div>
        <div  id="sms1" style="display:none;">
            <div id="form" class="form-group col-md-12" >
                <label>Enter OTP</label>
                <input type="number" class="form-control" id="otp1"  name="otp1">
            </div> 
            <div class="form-group col-md-12">
                <button type="button" class="btn btn-primary" name="submit" id="ot" onclick="smsotp()">Submit</button>
            </div>

            <p id="s"></p>
        <!-- </div> -->
    </div>


    <div id="sh" style="display:none;">
                
                <div class="form-group col-md-12">
                    <label >User Name<span style="color:red;">*</span></label>
                    <input type="text" class="form-control" id="name"  name="studentname">
                </div>
                
                
                <div class="form-group col-md-12">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="pass" placeholder="Password">
                </div>
                <div class="form-group col-md-12">
                    <button type="button" class="btn btn-primary" id="signUp">Sign Up</button>
                </div>
            </div>
        </form>
        <div style="text-align:center;padding:2%;">
            Already Registered?
            <span> 
            <a href="login.php">Sign In</a>
            </span>
        </div>
       </div>
       

                
               
        <?php include "footer.php" ?>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    function sendMail(){
    var email =  document.getElementById("email").value;
    document.getElementById("form").style.display = "block";
    document.getElementById("form1").style.display = "none";
    document.getElementById("se").style.display = "none";


    $.ajax({
        type:"POST",
        url:"mail.php",
        data:{
            email:email}
        ,
        success:function(res){
        
        }
    });
}

function sendotp(){
    var otp =  document.getElementById("otp").value; 
       
      $.ajax({
        type:"POST",
        url:"mail1.php",
        data:{
            otp:otp}
        ,
        success:function(res1){
        	if(res1 == "Success"){
        		document.getElementById("form").style.display = "none";
     			// document.getElementById("form1").style.display = "block"; 
     			 document.getElementById("sms").style.display = "block"; 
        		alert(res1);
        	}
        	else{
        		alert("Enter valid OTP");
        	}
        // document.getElementById("s").innerHTML = res1;
            
        }
    });
}


function sendSms(){
    
    var mobile =  document.getElementById("mobile").value;
    document.getElementById("sms1").style.display = "block";
    document.getElementById("sms").style.display = "none";
    document.getElementById("form").style.display = "none";
    document.getElementById("form1").style.display = "none";
   

    $.ajax({
        type:"POST",
        url:"smsotp.php",
        data:{
            mobile:mobile},
        success:function(res2){
            alert(res2);
        
        }
    });
}  

 function smsotp(){
    var otp1 =  document.getElementById("otp1").value; 
     //document.getElementById("form").style.display = "none";
     //document.getElementById("form1").style.display = "block";   
      $.ajax({
        type:"POST",
        url:"otp.php",
        data:{
            otp1:otp1},
            success:function(res3){
        	if(res3 == "Success"){
        		 document.getElementById("form1").style.display = "block";
     			 document.getElementById("sms").style.display = "block";
     			 document.getElementById("sh").style.display = "block"; 

     			 document.getElementById("sms1").style.display = "none"; 
     			 document.getElementById("se1").style.display = "none"; 
                  document.getElementById("se").style.display = "none"; 
                  document.getElementById("email").readOnly = true;
                  document.getElementById("mobile").readOnly = true;
        		alert(res3);
        	}
        	else{
        		alert("Enter valid OTP");
        	}
         document.getElementById("s").innerHTML = res3;
            
        }
    });
}
$('#signUp').click(function() {
    var maile = $('#email').val();
    var mobil = $('#mobile').val();
    var name =  $('#name').val();
    var pass =  $('#pass').val();
    $.ajax({
        type:"POST",
        url:"insert.php",
        data:{
            maile:maile,mobil:mobil,name:name,pass:pass},
        success:function(res2){
            alert(res2);
        
        }
    });
 
});
</script>
    </body>
</html>