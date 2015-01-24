function Login(){
	var userName = $(".username").val();
	var password = $(".password").val();
	if(userName.length < 1){
		$(".username").focus().parent().append('<label for="username" class="error flipInX animated">Please enter your username.</label>');
	}else
	if(password.length < 1){
		$(".password").focus().parent().append('<label for="username" class="error flipInX animated">Please enter your password.</label>');
	}else{
		$("label.error").remove();
		$("#form-login").find(".portlet-progress").fadeIn(200);
		$.ajax({
	                    type: "post",
	                    data: $("#form-login").serialize(),
	                    dataType: "JSON",
	                    url: "index.php/login/userLogin",
	                    success: function(data) {
	                        $("#form-login").find(".portlet-progress").fadeOut(700);
	                        if(data.code == 1){
	                        		$(".username").focus().parent().append('<label for="username" class="error flipInX animated">'+data.message+'</label>');
	                        }
	                        if(data.code == 2){
	                        		$(".password").focus().parent().append('<label for="username" class="error flipInX animated">'+data.message+'</label>');
	                        }
	                        if(data.code == 0){
	                        		location.href = "index.php/home";
	                        }
	                    }
	         	});
	}
}
function Signup(){
	var firstName = $(".firstname").val();
	var lastName = $(".lastname").val();
	var userName = $(".username").val();
	var password = $(".password").val();
	var email = $(".email").val();
	if(firstName.length < 1){
		$(".firstname").focus().parent().append('<label for="username" class="error flipInX animated">Please enter your first name.</label>');
	}else
	if(lastName.length < 1){
		$(".lastname").focus().parent().append('<label for="username" class="error flipInX animated">Please enter your last name.</label>');
	}else
	if(userName.length < 1){
		$(".username").focus().parent().append('<label for="username" class="error flipInX animated">Please enter your username.</label>');
	}else
	if(password.length < 1){
		$(".password").focus().parent().append('<label for="username" class="error flipInX animated">Please enter your password.</label>');
	}else
	if(email.length < 1){
		$(".email").focus().parent().append('<label for="username" class="error flipInX animated">Please enter your email.</label>');
	}else{
		var filter = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            		if (!filter.test(email)) {
            			$(".email").parent().find(".error").remove();
            			$(".email").focus().parent().append('<label for="username" class="error flipInX animated">Please enter a valid email.</label>');
            		}else{
            			$("label.error").remove();
            			$("#form-register").find(".portlet-progress").fadeIn(700);
            			$.ajax({
		                        type: "post",
		                        data: $("#form-register").serialize(),
		                        dataType: "JSON",
		                        url: "signup/register",
		                        success: function(data) {
		                            $("#form-register").find(".portlet-progress").fadeOut(700,function(){
		                            	if(data.code == 0){
		                            		$(".registrationSuccessfull").show().addClass('flipInX animated');
		                            	}
		                            });
		                        }
		             });
            		}
	}
}
function removeErrors(){
	$(".registerInput").on("keyup",function(){
		var val = $(this).val();
		if(val.length > 0){
			$(this).parent().find(".error").removeClass("flipInX").addClass("flipOutX");
		}
	})
}