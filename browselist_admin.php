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
    <title>Book List</title>
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">

	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
</head>
    <body>
		<div class="container">
			
				<div class="col-md-12 column">
					<?php include('nav_admin.php') ?>
				</div>
				
				
				<div class="container margint2">
					<h3> Search For Books </h3>
						
					
						
						
					</div>
					<div class=" container col-md-12">
						<fieldset>
							<form name="search_form" method="POST" action="#">
								<input type="text" class="form-control" placeholder="Enter Book Name or Book Id or Author Name" name="search_box"></br>
								<input type="submit" class="btn btn-primary" placeholder="Text input" value="Search" name="search">
							
							</form>
						</fieldset>
					</div>
					
				
		</div>
		
		
			<div class="container">
		
		
        
				
 

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
								<th>Book Id</th>				  
								<th>Book Name</th>
								<th>Edition</th>
								<th>Author Name</th>
								
								<th>ISBN no.</th>
								<th>Edit</th>
								<th>Borrow</th>
								
							</tr>
							 <tbody>



                        <?php 
									
									
								require_once "config.php";
								$db= get_connection();
								//$id=$_SESSION['id'];
								$sql ="SELECT * FROM book ";
								
								//echo"Connection get";
								
								if (isset($_POST['search'])){
									$search_term = $_POST['search_box'];
									$sql .= " WHERE bookName = '{$search_term}'";
									$sql .= " OR AuthorName = '{$search_term}'";
									$sql .= " OR BookId = '{$search_term}'";
								}
								
								$result = mysql_query($sql);
								
								while($row=mysql_fetch_array($result))
								{									
									echo '<tr class="even gradeC">';
									echo '<td>'.$row["BookId"].'</td>';
									echo '<td>'.$row["bookName"].'</td>';
									echo '<td>'.$row["Edition"].'</td>'; 
									echo '<td>'.$row["AuthorName"].'</td>';
									//echo '<td>'.$row["CategoryId"].'</td>';
									echo '<td>'.$row["IsbnNo"].'</td>';
									
									$url="edit_book.php?id=".$row["BookId"];
		 							echo '<td>'.'<a class="btn btn-primary" href='. $url.'>Edit</a>'.'</td>';
									
									$url="borrow_book.php?id=".$row["BookId"];
		 							echo '<td>'.'<a class=" btn btn-primary" href='. $url.'>Borrow</a>'.'</td>';
									
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
