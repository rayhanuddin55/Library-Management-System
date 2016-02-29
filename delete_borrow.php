<?php
	session_start();
	if(!$_SESSION["id"]){
		header('location:adminprofile.php');
	}
	else{
		
	}
?>
<?php
	$id=$_GET['id'];
	require_once "config.php";
	
	$BorrowId="";
	$title="";


	


		if(isset($_POST['delete']))
		{
		
			require_once "config.php";
			
			  $db=get_connection(); 
				$result = "delete from borrow where BorrowId='$id'";
				$sql = mysql_query($result);
				//echo "Success";
				header('location:return_book.php');
			
				mysql_close($db);
		}
		else 
		{
			require_once "config.php";
			$db=get_connection();
			$result = "Select * from borrow where BorrowId='$id'";
			$query = mysql_query($result);
			
			while($row=mysql_fetch_array($query))
			{
				$BorrowId = $row["BorrowId"];
				$title = $row["title"];
				
				
			}
			mysql_close($db);
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
										
											Borrow Id : 
										<input class="form-control" placeholder="Book Name" name="BorrowId" type="text" autofocus value="<?php echo $BorrowId; ?>">
									</div>
									
									<div class="form-group">
										BookName :
										<input class="form-control" placeholder="BookName" name="title" type="text" value="<?php echo $title; ?>">
									</div>
									
									
									
									<!-- Change this to a button or input when using this as a form -->
									
									<input type="submit" class="btn  btn-success btn-block" value="Return" name="delete">
									
									
									
									
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
