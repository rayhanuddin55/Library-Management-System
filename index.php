<?php 

if(isset($_POST['save']))
{
		$UserId=$_POST["studentId"];
		$Password=$_POST["Password"];
		
			require_once "config.php";	
		  $db=get_connection();
			$result = mysql_query("select count(*) from user where StudentId='$UserId' and Password='$Password' ");
		$row = mysql_fetch_array($result);

		$total = $row[0];
		if($total>0)
		{
			
			session_start();
            
            $_SESSION["id"] = $UserId;
			
			if($_SESSION["id"]=="admin"){
                header('Location: adminprofile.php');
            
			}
			else{
				header('Location:userprofile.php');
			}
			
		}
		else
		{
			
			$Message="invalid UserId ";
		}
			//mysql_close($db);
		
	}

?>







<!DOCTYPE html>


<html>

	<head>
	
		<title>Log in</title>
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
	</head>




	<body class="bg">
		<div class="container imagebg">
			<div class="row margint">
				<div class="col-md-5 col-md-offset-4">
				
					<div class="">
						<div class="">
						
						
					
							<form action="#" method="POST" role="form">
								

								<fieldset>		
									<h1>Log In</h1></br>
									<div class="form-group fonts">
										UserId
										<input class="form-control" type="text" name="studentId" required/>
									</div>
									<div class="form-group fonts">
										Password
										<input class="form-control" type="password" name="Password" required/>
									</div>
									
									<input type="submit" name="save" value="Log In" class="form-control btn  btn-success btn-block"/>
								</fieldset>
						

								

						
							</form>
						</div>
					</div>
                    <?php if(isset($Message)){echo $Message;} ?>
                    
				</div>
				
			</div>
            <div class="container row col-mod-4 col-md-offset-4 footer margint">
				
					<p>Copyright  &copy; librarymangement.com, 2015</p>
				
				</div>
		</div>
	</body>
</html>