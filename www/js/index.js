/**
 * @author ronald8192
 */
$(document).ready(function() {
	setTimeout(function(){
		$(".box-login").fadeIn(1000);
		$(".banner").fadeIn(500);	
		$("#studid").focus();
	},50);
});

function studlogin(){
	var studidEmpty = $("#studid").val() == "";
	var passwordEmpty = $("#passwd").val() == "";
	if(studidEmpty && passwordEmpty){
		$("#msg").html("Enter your student ID and password!");
		return false;
	}else if(studidEmpty){
		$("#msg").html("Enter your student ID!");
		return false;
	}else if(passwordEmpty){
		$("#msg").html("Enter your password!");
		return false;
	}else{
		window.location.assign("main.html");
		return true;
	}
}
