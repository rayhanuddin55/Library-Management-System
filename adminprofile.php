<?php
	session_start();
	if(!$_SESSION["id"]){
		header('location:index.php');
	}
	else{
		
	}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Profile</title>
	<?php include('header.php') ?>
	<link href="css/style.css" rel="stylesheet">
	
</head>
    <body class="colorr">
		<div class="container">
			<div class="col-md-12 column">
				<?php include('nav_admin.php') ?>
			</div>
			
			
			<div class="col-md-12 column margint container area2">
			
				<div class="col-md-3 first area">
					<h4>User List</h4>
					<p class="col-md-12">
						User list show the User Name, E-mail, User Id and about of user. Deletion and search of user can possible from User List page.
					</p>
					
					<a href="user_list.php" class="btn button btn-default btn-lg btn-block " >User List</a>
 
				</div>
				
				<div class="col-md-3 second area">
					<h4>Add Book</h4>
					<p class="col-md-12">
						To add a new book with valid information such as book name, author name, isbn no, edition go Add Book page.
					</p>
					
					<a  class="btn btn-default button btn-lg btn-block " href="new_book.php">Add Book</a>
 
				</div>
				
			
				<div class="col-md-3 third area">
						<h4>Current Borrow</h4>
						<p class="col-md-12">
							Current Borrow page show the most recent borrowed book. Search can possible with book name or user id.
						</p>
						
						<a  class="btn btn-default button btn-lg btn-block " href="current_borrow.php">Current Borrow</a>

				</div>
				
			
				
			</div>
			
			
			<div class="col-md-12 column margint area1 container">
				
				<div class="col-md-3 fourth area">
					<h4>Add User</h4>
					<p class="col-md-12">
						To add a new user with valid information go Add User page.
					</p>
					<br/>
				<br/>
				<a class="btn btn-default btn-lg btn-block  button"  href="new_user_account.php">Add User</a>
				</div>
				
				<div class="col-md-3 fifth area">
					<h4>Book List</h4>
					<p class="col-md-12">
						All available books are show in this page. There are option for edit book and book borrow for user.</p>
					
					<a  class="btn btn-default btn-lg btn-block button" href="browselist_admin.php">Book List</a>
				</div>
				
				<div class="col-md-3 sixth area">
					<h4>Today's Returned Borrow</h4>
					<p class="col-md-12">
						This page show the today's expected return book(borrowed). And book submission option is here.
					</p>
					
					<a  class="btn btn-default btn-lg btn-block button" href="return_book.php">Today's Returned Borrow</a>
				</div>
				
			</div>
			
			
			
			
							
							
						
		</div>
		
		
		
		
		
	</body>		
</html>












