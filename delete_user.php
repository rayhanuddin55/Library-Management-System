<?php
	session_start();
	if(!$_SESSION["id"]){
		header('location:index.php');
	}
	else{
		
	}
?>
<?php
	$id=$_GET['id'];
	require_once "config.php";
	$Name="";
	$Email="";
	$StudentId="";
	$Gender="";
	$About="";


	if( $id != "admin"){


		if(isset($_POST['delete']))
		{
		
			require_once "config.php";
			
			  $db=get_connection(); 
				$result = "delete from user where StudentId='$id'";
				$sql = mysql_query($result);
				//echo "Success";
				header('location:user_list.php');
			
				mysql_close($db);
		}
		else 
		{
			require_once "config.php";
			$db=get_connection();
			$result = "Select * from user where StudentId='$id'";
			$query = mysql_query($result);
			
			while($row=mysql_fetch_array($query))
			{
				$Name = $row["Name"];
				$Email = $row["Email"];
				$StudentId = $row["StudentId"];
				$Gender = $row["Gender"];
				$About = $row["About"];
				
				
			}
			mysql_close($db);
		}
	}
	
	
	else{
		
		header('location:user_list.php');
	}
?>




<!DOCTYPE html>
<html lang="en">

<head>

 
    <title>Edit Book</title>
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">

	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
</head>

<body>

<div class="container">

		<div class="container">
		
			<div class="row">
			
				<div class="col-md-12 column">
				
					<?php include('nav_admin.php') ?>
			
		
				</div>
			
			
			</div>


			<div class="row margint2">
				<div class="col-md-4 col-md-offset-4">
					<div class="login-panel panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">New Book Details</h3>
						</div>
						<div class="panel-body">
							<form role="form" method="POST" action="#">
								<fieldset>
									<div class="form-group">
										
											Name : 
										<input class="form-control" placeholder="Book Name" name="Name" type="text" autofocus value="<?php echo $Name; ?>">
									</div>
									
									<div class="form-group">
										Email :
										<input class="form-control" placeholder="Edition" name="Email" type="text" value="<?php echo $Email; ?>">
									</div>
									
									<div class="form-group">
										
											Student Id : 
										<input class="form-control" placeholder="Isbn" name="StudentId" type="text" autofocus value="<?php echo $StudentId; ?>">
									</div>
									
									<div class="form-group">
										
											Genders : 
										<input class="form-control" placeholder="Isbn" name="Gender" type="text" autofocus value="<?php echo $Gender; ?>">
									</div>
									
									<div class="form-group">
										ABout :
										<input class="form-control" placeholder="Author Name" name="AuthorName" type="text" value="<?php echo $About; ?>">
									</div>
									
									
									<!-- Change this to a button or input when using this as a form -->
									
									<input type="submit" class="btn  btn-success btn-block" value="Delete" name="delete">
									
									
									
									
								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>

     <?php  //echo $Message; ?>


</body>

</html>
