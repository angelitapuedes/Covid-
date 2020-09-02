<?php 

//Front-End for book database

	include('config/db_connect.php');//My connection

	// write query for all pizzas
	$sql = 'SELECT business_name, business_maskreq FROM Covid_Safe_Observation';

	// get the resbault set (set of rows)
	$result = mysqli_query($conn, $sql);

	$stage=mysqli_fetch_assoc($result);
	print_r($stage);

	//mysqli_free_result($result);

	//close connection
	//mysqli_close($conn);

	
	
    

	
	
?>

<!DOCTYPE html>
<html>
	
	<?php include('templates/header.php'); ?>

	<h4 class="center grey-text">Book Loans!</h4>

	<div class="container">
		<div class="row">

			<?php foreach($stage as $bookloan): ?>

				<div class="col s6 m4">
					<div class="card z-depth-0">
						<div class="card-content center">
							<h6>Book ID: <?php echo htmlspecialchars($bookloan['business_name']); ?></h6>
							<h6>Readers ID: <?php echo htmlspecialchars($bookloan['business_maskreq']); ?></h6>
							
						</div>
					</div>
				</div>

			<?php endforeach; ?>

		</div>
	</div>

	<?php include('templates/footer.php'); ?>

</html>