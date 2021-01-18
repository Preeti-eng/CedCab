function calculateFare(){
    drop =  document.getElementById("drop").value;
    des =  document.getElementById("des").value;
    cab =  document.getElementById("cab").value;
    weight =  document.getElementById("weight").value;
    $.ajax({
        type:"POST",
        url:"cab.php",
        data:{
            drop:drop,des:des,cab:cab,weight:weight}
        ,
        success:function(res){
            console.log(res);
            document.getElementById("res").innerHTML = res;
            document.getElementById("y").style.display = "block";

            
        }
    });
}
// *****************************************************************
$('#weight').on('input', function() {
    var c =  $('#cab').val();
    if(c == null){
        alert("Please Select Cab Type....");
        $('#weight').val('');
    }
 
});
// ******************************************************************
function dis(){
    $("#des option").each(function(){
        if($("#drop option:selected").val() == $(this).val())
            $(this).attr("disabled", "disabled");
        else
            $(this).removeAttr("disabled");
    });
}

function dis1(){
    $("#drop option").each(function(){
        if($("#des option:selected").val() == $(this).val())
            $(this).attr("disabled", "disabled");
        else
            $(this).removeAttr("disabled");
        });
}
// ********************************************************************
$('#cab').on("change",function() {
    var ca =  $('#cab').val();
    if(ca == "cedMicro"){
        $("#weight").attr('disabled','disabled');
        $("p").css({"display": "block"});
        $('#weight').val('');
    }
    else{
        $("#weight").attr('disabled',false); 
        $("p").css({"display": "none"});
       

    }
});
// ***************************************************************
function number(txt, evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode == 46) {
      if (txt.value.indexOf('.') === -1) {
        return true;
      } else {
        return false;
      }
    } else {
      if (charCode > 31 &&
        (charCode < 48 || charCode > 57))
        return false;
    }
    return true;
  }
// ***************************************************************
$('#fare').click(function() {
    var dr =  $('#drop').val();
    var ds =  $('#des').val();
    var ca =  $('#cab').val();
    var we =  $('#weight').val();
    if(dr == null && ds == null && ca == null && we == ""){
        alert("Please Enter Feilds....");
        window.location.reload();
       }
       else if (dr== null && ds == null){
        alert("Enter Pick Up and Destination....");
        window.location.reload(); 
       }
       else if (dr== "select"){
        alert("Enter Pick Up");
        window.location.reload(); 
       }
       else if (ds=="select"){
        alert("Enter  Destination....");
        window.location.reload(); 
       }
});
//******************************************************************
$('#update').click(function() {
    var name =  $('#name').val();
    var mob =  $('#mobile').val();
   
    if(name == null && mob == ""){
        alert("Enter updated name and mobile number....");
        window.location.reload();
       }
       else if (name == null){
        alert("Enter Updated name....");
        window.location.reload(); 
       }
       else if (mob == ""){
        alert("Enter updated mobile number...");
        window.location.reload(); 
       }
       
});

