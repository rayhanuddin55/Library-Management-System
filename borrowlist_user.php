
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
    <title>CurrentBorrows</title>
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">

	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
</head>
    <body>
		<div class="container">
			
				<div class="col-md-12 column">
				<?php include('nav_user.php') ?>
			</div>
				
				
				<div class="container margint2">
					<h3> search for books </h3>
											
					<div class=" container col-md-12">
						<fieldset>
							<form name="search_form" method="POST" action="#">
								<input type="text" class="form-control" placeholder="Text input" name="search_box"></br>
								<input type="submit" class="btn btn-primary" placeholder="Text input" value="Search" name="search">
							
							</form>
						</fieldset>
					</div>
					
				
				</div>
		
		
			<div class="container">
		
		
        
				<div>
					<table class="table">
						<tbody><tr>
								<td>
									<h4><b>Borrow Status</b></h4>
								</td>
							</tr>
							<tr>
								<td>
									<label>Total Books Borrowed : </label>
								</td>
								<td>
									0
								</td>
								<td>
									<label>Activation Status : </label>
								</td>
								<td>
									Temporary Inactive
								</td>
							</tr>
							<tr>
								<td>
									<label>Borrow Limit : </label>
								</td>
								<td>
									3
								</td>
								<td>
									<label>Credit Limit : </label>
								</td>
								<td>
									500
								</td>
							</tr>

						</tbody>
					</table>
				</div>
 

				<div>
					<table class="table">
						<tbody>
							<tr>
								<td>
									<h4>Current Borrows</h4>
								</td>
							</tr>
						</tbody>
					</table>
				</div>

				<div>
					<table class="table">
						<thead>
							<tr>
								<th>#</th>
							  
								<th>Title</th>
								<th>Edition</th>
								<th>Date Borrowed</th>
								<th>Expected Return Date</th>
								<th></th>
							</tr>
							 <tbody>



                        <?php 
									
									
								require_once "config.php";
								$db= get_connection();
								$id=$_SESSION["id"];
								$sql ="SELECT * FROM borrow WHERE userId = '$id'";
								
								//echo"Connection get";
								
								if (isset($_POST['search'])){
									$search_term = $_POST['search_box'];
									$sql .= " AND title = '{$search_term}'";
									$sql .= " AND edition = '{$search_term}'";
								}
								
								$result = mysql_query($sql);
								
								while($row=mysql_fetch_array($result))
								{									
									echo '<tr class="even gradeC">';
									echo '<td>'.$row["BookId"].'</td>';
									echo '<td>'.$row["title"].'</td>';
									echo '<td>'.$row["edition"].'</td>'; 
									echo '<td>'.$row["IssueDate"].'</td>';
									echo '<td>'.$row["RerurnDate"].'</td>'; 									
									
									echo '</tr>';
									
										
								}
								//mysql_close($db);

									
						?>

                    </tbody>
							
						</thead>
						<tbody>

						</tbody>
						</table>
				</div>


			</div>
	
		</div>
	</body>
</html>
