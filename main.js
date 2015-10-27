/*$('form.ajax').on('submit', function(){

	var that = $(this),
		url = that.attr('action'),
		method = that.attr('method'),
		data = {};

	that.find('[name]').each(function(index, value){
		var that = $(this),
			name = that.attr('name'),
			value = that.val();

		data[name] = value;
	});

	$.ajax({
		url: url,
		type: method,
		data: data,
		success: function(response){

			$("#success").html(response);
			$("#success").show();
		}
	});

    return false;
    
});*/

$("#submit").click(function(){
	var name = $("input.user").val();
	var pass = $("input.pass").val();
	
	/*$.post("login.php", { user: name, pass: pwd}, function(data){
		$("#success").val(data);
		$("#success").show();
	});*/

	username=$("input.user").val();
  	password=$("input.password").val();

	$.ajax({
		type: "POST",
		url: "login.php",
	data: "name="+username+"&pwd="+password,
	success: function(html){
		if(html=='true')    {
			
			console.log("right username or password");
			window.location="welcome.php";
		}
		else{
			$("#error").show();
			$("#error").css({'width':'220px', 'height' : '22px'});
			$("#error").html("Wrong username or password");
			console.log("Wrong username or password");
		}
   },
   
  });
  
  return false;
  
  
	/*var formdata = new FormData($form[0]);
        
	var request = new XMLHttpRequest();
	
	request.upload.addEventListener('progress', function(e){
	
	});
	
	request.open('post', 'login.php');
	request.send(formdata);
        */


//Read more: http://www.ondeweb.in/ajax-login-form-with-jquery-and-php/#ixzz3kfJis13h
});

$("#submit1").mouseenter( function() {
	$(this).animate({"opacity":"0.5"}, "fast");
});

$("#submit1").mouseleave( function() {
	$(this).animate({"opacity":"1"}, "fast");
});

$("#submit1").click( function() {
			$(this).animate({"opacity":"0.5"}, "fast");
			$(this).animate({"opacity":"1"}, "fast");
		});

$(document).ready(function(){
    $("#wrapper").fadeIn("slow");
});



	$("input.user").focusin(function(){
        $(this).placeholder="''";
    });
    $("input.user").focusout(function(){
        if($(this).val().length == 0){
        	$(this).placeholder="Username";
        }
    });