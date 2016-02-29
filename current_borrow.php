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
    <title>Current Borrow List</title>
	<link href="css/bootstrap.css" rel="stylesheet">
	<?php include('header.php') ?>
	
</head>
    <body>
		<div class="container">
							<div class="col-md-12 column">
								<?php include('nav_admin.php') ?>
							</div>
							
							<div class="container margint2">
					<h3> Search for Books </h3>
					
					</div>
					<div class=" container col-md-12">
						<fieldset>
							<form name="search_form" method="POST" action="#">
								<input type="text" class="form-control" placeholder="Enter Book Name or User Id" name="search_box"></br>
								<input type="submit" class="btn btn-primary" placeholder="Text input" value="Search" name="search">
							
							</form>
						</fieldset>
					</div>
							
							<!-- 2nd Row-->
							
									<div class="col-md-12">
									
										<caption><h3>Current Borrow List</h3></caption>
										<table class="table">
											<thead>
												<tr>
													<th>Borrow Id</th>				  
													<th>Book Name</th>
													<th>Edition</th>
													<th>User Id</th>
													<th>IssueDate</th>
													<th>RerurnDate</th>
													
													
												</tr>
												
											</thead>
											<tbody>



												<?php 
															
															
														require_once "config.php";
														$db= get_connection();
														//$id=$_SESSION['id'];
														$sql ="SELECT  * FROM borrow";
														
														//echo"Connection get";
														
														if (isset($_POST['search'])){
															$search_term = $_POST['search_box'];
															$sql .= " WHERE title = '{$search_term}'";
															$sql .= " OR userId = '{$search_term}'";
														}
														
														$sql .=" ORDER BY BorrowId DESC";
														
														$result = mysql_query($sql);
														
														while($row=mysql_fetch_array($result))
														{									
															echo '<tr class="even gradeC">';
															echo '<td>'.$row["BorrowId"].'</td>';
															echo '<td>'.$row["title"].'</td>';
															echo '<td>'.$row["edition"].'</td>'; 
															echo '<td>'.$row["userId"].'</td>';
															echo '<td>'.$row["IssueDate"].'</td>';
															echo '<td>'.$row["RerurnDate"].'</td>';
															
															//$url="edit_book.php?id=".$row["BookId"];
															//echo '<td>'.'<a class="btn btn-primary" href='. $url.'>Edit</a>'.'</td>';
															
															
															echo '</tr>';
															
																
														}
														mysql_close($db);

															
												?>

											</tbody>
										
										</table>
									</div>
									
									<!-- 3rd Row-->
									
									
									
							
						
						
		</div>
	</body>		
</html>












