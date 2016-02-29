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
	$BookName="";
	$IsbnNo="";
	$AuthorName="";
	$Edition="";





		if(isset($_POST['update']))
		{
			
			$BookName=$_POST["BookName"];
			 $IsbnNo=$_POST["IsbnNo"];
			 $AuthorName=$_POST["AuthorName"];
			 $Edition=$_POST["Edition"];
			 
			require_once "config.php";
			
			  $db=get_connection();
				$result = "update  book set BookName='$BookName' , IsbnNo='$IsbnNo', AuthorName='$AuthorName', Edition='$Edition' where BookId='$id'";
				$sql = mysql_query($result);
				echo "Success";
			
				//mysql_close($db);
		}
		else 
		{
			require_once "config.php";
			$db=get_connection();
			$result = "Select * from book where BookId='$id'";
			$query = mysql_query($result);
			
			while($row=mysql_fetch_array($query))
			{
				
				$BookName=$row["bookName"];
			 $IsbnNo=$row["IsbnNo"];
			 $AuthorName=$row["AuthorName"];
			 $Edition=$row["Edition"];
				
				
			}
			//mysql_close($db);
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
		
			<div class="col-md-12 column">
								<?php include('nav_admin.php') ?>
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
										
											Book Name : 
										<input class="form-control" placeholder="Book Name" name="BookName" type="text" autofocus value="<?php echo $BookName; ?>">
									</div>
									
									<div class="form-group">
										Edition
										<input class="form-control" placeholder="Edition" name="Edition" type="text" value="<?php echo $Edition; ?>">
									</div>
									
									<div class="form-group">
										
											Isbn No. : 
										<input class="form-control" placeholder="Isbn" name="IsbnNo" type="text" autofocus value="<?php echo $IsbnNo; ?>">
									</div>
									
									
									<div class="form-group">
										Author Name
										<input class="form-control" placeholder="Author Name" name="AuthorName" type="text" value="<?php echo $AuthorName; ?>">
									</div>
									
									
									<!-- Change this to a button or input when using this as a form -->
									
									<input type="submit" class="btn  btn-success btn-block" value="Insert" name="update">
									
									
									
									
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
