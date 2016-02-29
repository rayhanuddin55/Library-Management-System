<?php

//mname
//email
//password
//repassword
//studentId
//gender
//uabout

//update

	session_start();
	if(isset($_SESSION["id"])){
		require_once "config.php";
		$db= get_connection();
		$id = $_SESSION["id"];
		$sql ="Select * from user where StudentId = '$id'";
		$query = mysql_query($sql);
		
		while($rows = mysql_fetch_array($query)){
			$mname = $rows['Name'];
			$email = $rows['Email'];
			$password = $rows['Password'];
			$repassword = $rows['Password'];
			$studentId = $rows['StudentId'];
			$gender = $rows['Gender'];
			$uabout = $rows['About'];
			
		}
		
		if(isset($_POST['update'])){
			$mname = $_POST['mname'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			//$repassword = $_POST['mname'];
			//$studentId = $_POST['mname'];
			$gender = $_POST['gender'];
			$uabout = $_POST['uabout'];
			
			$result = "update  user set Name='$mname' ,Email='$email', Password='$password' ,Gender='$gender',About='$uabout' where StudentId = '$id'";
			mysql_query($result);
		
		}
		else if(isset($_POST['back']))
			{header('location:userprofile.php');
		}
	}
	else{
		header('location:index.php');
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
				<?php include('nav_user.php') ?>
			</div>


			<div class="row margint2">
				<div class="col-md-6 col-md-offset-4">
					<div class="login-panel panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">User Details For Modify</h3>
						</div>
						<div class="panel-body">
							<form role="form" onsubmit="return checkuservalid()" method="post" action="#">
								<fieldset>
									
									<div class="form-group">
										
										 Name : 
										<input id="uname" onblur="myuser()" class="form-control" placeholder="Name" name="mname" type="text" autofocus value="<?php echo $mname; ?>">
                                        <label id="ulabel"></label>
									</div>
									
									<div>
									<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
									</div>
								
									<div class="form-group">
										E-Mail :
										<input id="uemail" class="form-control" placeholder="E-mail" name="email" type="email" onblur="myemail()" value="<?php echo $email; ?>" autofocus>
                                        <label id="label2"></label>
									</div>
									<div class="form-group">
										Password :
										<input class="form-control" placeholder="Password" name="password" type="password" id="upassword" onblur="mypass()" value="<?php echo $password; ?>">
                                        <label id="ulabel3"></label>
									</div>
									
									<div class="form-group">
										Retype-Password :
										<input class="form-control" placeholder="Password" name="repassword" type="password" id="urepassword" onblur="mypass()" value="<?php echo $repassword; ?>">
                                        <label id="ulabel3"></label>
									</div>
									
									<div class="form-group">
										User Id :
										<input class="form-control"  placeholder="User Id" name="studentId" type="text" id="stid" onblur="" disabled value="<?php echo $studentId; ?>">
                                        <label id=""></label>
									</div>
									
                                    
									<div class="form-group">
										Gender :
										<input class="form-control" placeholder="Gender" name="gender" type="text"  id="ugender" onblur="" value="<?php echo $gender; ?>">
                                        <label id=""></label>
									</div>
                                    
									<div class="form-group">
										About :
										<input class="form-control" rows="5" type="text" name="uabout" id="comment" value="<?php echo $uabout; ?>">
                                        <label id=""></label>
									</div>
									
								
									<input name="update" class="btn  btn-success btn-block" type="submit" id="crt_user" value="Update" onclick="return createuser()">
                                        
                                    <input name="back" class="btn btn-info btn-block" type="submit" id="" value="Back to Profile" >
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
