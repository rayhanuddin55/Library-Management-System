<?php
	session_start();
	if(!$_SESSION["id"]){
		header('location:index.php');
	}
	else{
		
	}
?>
<?php 


if(isset($_POST['insert']))
{
		$bookname=$_POST["BookName"];
		$isbn=$_POST["isbn"];
		$author=$_POST["author"];
		$edition=$_POST["edition"];
		require_once "config.php";
		$db=get_connection();
		
					$result = "insert into  book(BookId,BookName,ISbnNo,CategoryId,AuthorName,Edition) Values(Null,'$bookname','$isbn',Null,'$author', '$edition')";
					$sql= mysql_query($result);
					//$Message="Data Insert Succesfull";
					mysql_close($db);
					
}


?>

<!DOCTYPE html>
<html lang="en">

<head>

 
    <title>Book Entry</title>
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
										<input class="form-control" placeholder="Book Name" name="BookName" type="text" autofocus>
									</div>
									<div class="form-group">
										
											Isbn No. : 
										<input class="form-control" placeholder="Isbn" name="isbn" type="text" autofocus>
									</div>
									
									
									<div class="form-group">
										Author Name
										<input class="form-control" placeholder="Author Name" name="author" type="text" value="">
									</div>
									
									<div class="form-group">
										Edition
										<input class="form-control" placeholder="Edition" name="edition" type="text" value="">
									</div>
									
									<!-- Change this to a button or input when using this as a form -->
									
									<input type="submit" class="btn  btn-success btn-block" value="Update" name="insert">
									
									
									
									
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
