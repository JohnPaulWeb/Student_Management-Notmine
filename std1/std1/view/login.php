<?php include_once('head.php'); ?>


<style>

.form-control-feedback {
  
   pointer-events: auto;
  
}


.msk-set-color-tooltip + .tooltip > .tooltip-inner { 
  
     min-width:180px;
	 background-color:red;
}

.bg{
	width:100%;
	height:100%;
}

#loginFrom{
	opacity:0.6;	
}

body{
	background-color:#fef492;
}

</style>
<body onLoad="login()">
	<img src="../uploads/bg.jpg" class="bg" />
	
	
  	<div class="modal fade" id="loginFrom" tabindex="-1" role="dialog" aria-labelledby="loginFrom" aria-hidden="true">
    	<div class="modal-dialog">    
        	<div class="modal-content ">
        		<div class="modal-header bg-aqua-gradient">
          			<h4>Student Ranking System</h4>
        		</div>
        		<div class="modal-body bgColorWhite">
        			<form role="form" action="../index.php" method="post">                    
                  		<div class="box-body">
                    		<div class="form-group" id="divEmail">
                      			<label for="">Email</label>
                      			<input type="text" class="form-control" id="email" placeholder="Enter email address" name="email" autocomplete="off">
                    		</div>
                            <div class="form-group" id="divPassword">
                      			<label for="">Password</label>
                      			<input type="password" class="form-control" id="password" placeholder="Enter password" name="password" autocomplete="off">
                    		</div>
                  		</div>
                  		<div class="box-footer">
                  			<input type="hidden" name="do" value="user_login" />
                    		<button type="submit" class="btn btn-info" id="btnSubmit">Submit</button>
                  		</div>
                	</form>
        		</div>
      		</div>      
		</div>
	</div>

<script>

function login(){
	
	
	$('#loginFrom').modal({
		backdrop: 'static',
		keyboard: false
	});
	$('#loginFrom').modal('show');
};

$("form").submit(function (e) {
	

	var uname = $('#email').val();
	var password = $('#password').val();
	
	if(uname == ''){
		
		$("#btnSubmit").attr("disabled", true);
		$('#divEmail').addClass('has-error has-feedback');	
		$('#divEmail').append('<span id="spanEmail" class="glyphicon glyphicon-remove form-control-feedback msk-set-color-tooltip" data-toggle="tooltip"    title="The user name is required" ></span>');	
			
		$("#email").keydown(function() {
			
			$("#btnSubmit").attr("disabled", false);	
			$('#divEmail').removeClass('has-error has-feedback');
			$('#spanEmail').remove();
			
		});	
		
	}
	
	if(password == ''){
		
		$("#btnSubmit").attr("disabled", true);
		$('#divPassword').addClass('has-error has-feedback');	
		$('#divPassword').append('<span id="spanPassword" class="glyphicon glyphicon-remove form-control-feedback msk-set-color-tooltip" data-toggle="tooltip"    title="The password is required" ></span>');	
			
		$("#password").keydown(function() {
			
			$("#btnSubmit").attr("disabled", false);	
			$('#divPassword').removeClass('has-error has-feedback');
			$('#spanPassword').remove();
			
		});	
		
	}
	
	
	if(uname == '' || password == ''){
		
		$("#btnSubmit").attr("disabled", true);
		e.preventDefault();
		return false;
			
	}else{
		$("#btnSubmit").attr("disabled", false);
		
	}


});
</script>


	<div class="modal fade" id="login_error" tabindex="-1" role="dialog" aria-labelledby="insert_alert1" aria-hidden="true">
    	<div class="modal-dialog">    
      		<div class="modal-content">
        		<div class="modal-header bg-red-active">
          			<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
          			<h4>Welcome to Ranking Management System</h4>
        		</div>
        		<div class="modal-body bgColorWhite">
        			<strong style="color:red; font-size:14px">Opps!</strong> Email or Password is Incorrect.
        		</div>
			</div>
		</div>
	</div>


<?php
if(isset($_GET["do"])&&($_GET["do"]=="login_error")){

 
	$msg=$_GET['msg'];
	
	if($msg==1){
		echo"
			<script>
			
			var myModal = $('#login_error');
			myModal.modal('show');
			
    		myModal.data('hideInterval', setTimeout(function(){
    			myModal.modal('hide');
    		}, 3000));
						
			</script>
		";
	
	}
	
}
?>


<script>
(function(window, location) {
history.replaceState(null, document.title, location.pathname+"#!/history");
history.pushState(null, document.title, location.pathname);
	
window.addEventListener("popstate", function() {
  if(location.hash === "#!/history") {
    history.replaceState(null, document.title, location.pathname);
    setTimeout(function(){
      location.replace("../index.php");
    },0);
  }
}, false);
}(window, location));
</script>
</body>