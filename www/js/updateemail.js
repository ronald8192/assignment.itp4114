$(document).ready(function(){
	$("#newEmail").focus();
});

function checkEmail(){
	var newEmail = $("#newEmail").val();
	var at = newEmail.indexOf("@");
	var dot = newEmail.indexOf(".",at+2);
	if(at==-1 || dot==-1){
		$("#msg").html(" Invalid email address!");
		$("#newEmail").addClass("errbox");
		return false;
	}else{		
		$("#currentEmail").html($("#newEmail").val());
		return true;
	}
}
