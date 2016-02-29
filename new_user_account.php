<?php
	session_start();
	if(!$_SESSION["id"]){
		header('location:index.php');
	}
	else{
		
	}
?>
<?php 

if(isset($_POST['forw']))
{
		
    
         $mname=$_POST["mname"];
         $email=$_POST["email"];
		 $password=$_POST["password"];
         $repassword=$_POST["repassword"];
         $studentId=$_POST["studentId"];
         $gender=$_POST["gender"];
         $uabout=$_POST["uabout"];
		require_once "config.php";
		$db=get_connection();
		
		
            if(empty($mname)) {
				 echo "<script type='text/javascript'>alert('Empty Name!')</script>";
				}
				
            if(empty($email)) {
				 echo "<script type='text/javascript'>alert('empty Email!')</script>";
				}
				
    
				else if(empty($password)) {
				 echo "<script type='text/javascript'>alert('Empty Password!')</script>";
				}
				
				else if(empty(strlen($password) >= 5)) {
				  echo "<script type='text/javascript'>alert('password must be minimum 5 charecter long!')</script>";
				}
				
				else if(empty($repassword)) {
				 echo "<script type='text/javascript'>alert('Empty Re type password!')</script>";
				}
                
				else if($password != $repassword) {
				 echo "<script type='text/javascript'>alert('Password and Repassword does not match!')</script>";
				}
                
                else if(empty($studentId)) {
				 echo "<script type='text/javascript'>alert('empty student id!')</script>";
				}
    
            
            
				
				else {
					
					
					
					
					require_once "config.php";
					$db=get_connection();
					$result = "insert into user(ID,Name,Email,Password,StudentId,Gender,About) Values(Null,'$mname','$email','$password', '$studentId', '$gender', '$uabout')";
					$sql= mysql_query($result);
                     echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
					//mysql_close($db);
				
				
				}
				
		
}
else{
//echo "Die";
}

?>




<!DOCTYPE html>
<html lang="en">

<head>

 
    <title>New User</title>
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">

	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
    <script type="text/javascript" src="js/own.js"></script>

    
    
</head>

<body>

<div class="container">

		<div class="container">
		
			<div class="col-md-12 column">
				<?php include('nav_admin.php') ?>
			</div>


			<div class="row margint2">
				<div class="col-md-6 col-md-offset-4">
					<div class="login-panel panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">New User Details</h3>
						</div>
						<div class="panel-body">
							<form role="form" onsubmit="return checkuservalid()" method="post" action="#">
								<fieldset>
									<div class="form-group">
										
										 Name : 
										<input id="uname" onblur="myuser()" class="form-control" placeholder="Name" name="mname" type="text" autofocus>
                                        <label id="ulabel"></label>
									</div>
									
								
									<div class="form-group">
										E-Mail :
										<input id="uemail" class="form-control" placeholder="E-mail" name="email" type="email" onblur="myemail()" autofocus>
                                        <label id="label2"></label>
									</div>
									<div class="form-group">
										Password :
										<input class="form-control" placeholder="Password" name="password" type="password" id="upassword" value="" onblur="mypass()">
                                        <label id="ulabel3"></label>
									</div>
									
									<div class="form-group">
										Retype-Password :
										<input class="form-control" placeholder="Password" name="repassword" type="password" value="" id="urepassword" onblur="myrepass()">
                                        <label id="ulabel4"></label>
									</div>
									
									<div class="form-group">
										User Id :
										<input class="form-control" onblur="myuserid()" placeholder="User Id" name="studentId" type="text" value="" id="stid" onblur="">
                                        <label id="ulabel5"></label>
									</div>
									
                                    
									<div class="form-group">
										Gender :
										<input class="form-control" onblur="mygender()" placeholder="Gender" name="gender" type="text" value="" id="ugender" onblur="">
                                        <label id="label6"></label>
									</div>
                                    
									<div class="form-group">
										About :
										<input class="form-control" rows="5" name="uabout" id="about" onblur="myabout()">
                                        <label id="label7"></label>
									</div>
									
									
									
								
									<input name="forw" class="btn  btn-success btn-block" type="submit" id="crt_user" value="Create User" onclick="return createuser()">
                                        
                                       
									<label id="ulabel5"></label>
								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>

    


</body>

</html>
