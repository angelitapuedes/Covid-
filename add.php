<?php

//This file ADDs a a new business

	include('config/db_connect.php');//My connection
	
	$business_name = $business_address = $business_email =$business_maskreq=$business_socialdist=$covid_safe_cleaning=$percent_ofsafe= '';
	$errors = array('business_name' => '','business_address' => '', 'business_email' => '', 'business_maskreq' => '', 'business_socialdist' => '', 'covid_safe_cleaning' => '', 'percent_ofsafe' => '');

	//When clicking on submit
	if(isset($_POST['submit'])){
		
		// check Business
		if(empty($_POST['business_name'])){
			$errors['business_name'] = 'A Business Name is required';
		} else{
			$business_name = $_POST['business_name'];
			if(!preg_match('/^[a-zA-Z\s]+$/', $business_name)){
				$errors['business_name'] = 'Business Name must be letters and spaces only';
			}
		}

	   // check Address
		if(empty($_POST['business_address'])){
			$errors['business_address'] = 'A Business Address is required';
		} else{
			$business_address = $_POST['business_address'];
			if(!preg_match('/^[a-zA-Z\s]+$/', $business_address)){
				$errors['business_address'] = 'Business Address must be letters and spaces only';
			}
		}

		// check maskrequest
		if(empty($_POST['business_maskreq'])){
			$errors['business_maskreq'] = 'Enter Yes or No';
		} else{
			$business_maskreq = $_POST['business_maskreq'];
			if(!preg_match('/^[a-zA-Z\s]+$/', $business_maskreq)){
				$errors['business_maskreq'] = 'Answer must be letters and spaces only';
			}
		}

		// check social distancing
		if(empty($_POST['business_socialdist'])){
			$errors['business_socialdist'] = 'Enter Yes or No';
		} else{
			$business_socialdist = $_POST['business_socialdist'];
			if(!preg_match('/^[a-zA-Z\s]+$/', $business_socialdist)){
				$errors['business_socialdist'] = 'Answer must be letters and spaces only';
			}
		}
		// check social distancing
		if(empty($_POST['covid_safe_cleaning'])){
			$errors['covid_safe_cleaning'] = 'Enter Yes or No';
		} else{
			$covid_safe_cleaning = $_POST['covid_safe_cleaning'];
			if(!preg_match('/^[a-zA-Z\s]+$/', $covid_safe_cleaning)){
				$errors['covid_safe_cleaning'] = 'Answer must be letters and spaces only';
			}
		}

		

		if(array_filter($errors)){
			//echo 'errors in form';
		} else {
			// escape sql chars
			$business_name = mysqli_real_escape_string($conn, $_POST['business_name']);
			$business_address = mysqli_real_escape_string($conn, $_POST['business_address']);
			$business_maskreq = mysqli_real_escape_string($conn, $_POST['business_maskreq']);
			$business_socialdist = mysqli_real_escape_string($conn, $_POST['business_socialdist']);
			$covid_safe_cleaning = mysqli_real_escape_string($conn, $_POST['covid_safe_cleaning']);
			

			// create sql query
			$sql = "INSERT INTO Covid_Safe_Observation(business_name,business_maskreq ) VALUES('$business_name','$business_maskreq')";

			// save to db and check
			if(mysqli_query($conn, $sql)){
				// success
				header('Location: index.php');
			} else {
				echo 'query error: '. mysqli_error($conn);
			}
			
		}

	} // end POST check

?>

<!DOCTYPE html>
<html>
	
	<?php include('templates/header.php'); ?>

	<section class="container grey-text">
		<h4 class="center">Add a Covid-Safe Business</h4>
		<form class="white" action="add.php" method="POST">
			<label>Business Name</label>
			<input type="text" name="business_name" value="<?php echo htmlspecialchars($business_name) ?>">
			<div class="red-text"><?php echo $errors['business_name']; ?></div>
			<label>Business Address</label>
			<input type="text" name="business_address" value="<?php echo htmlspecialchars($business_address) ?>">
			<div class="red-text"><?php echo $errors['business_address']; ?></div>
			<label>Social Distancing Encouraged</label>
			<input type="text" name="business_socialdist" value="<?php echo htmlspecialchars($business_socialdist) ?>">
			<div class="red-text"><?php echo $errors['business_socialdist']; ?></div>
			<label>Mask Mandate</label>
			<input type="text" name="business_socialdist" value="<?php echo htmlspecialchars($business_socialdist) ?>">
			<div class="red-text"><?php echo $errors['business_socialdist']; ?></div>
			<label>Constant Cleaning and Washing Hands Required</label>
			<input type="text" name="covid_safe_cleaning" value="<?php echo htmlspecialchars($covid_safe_cleaning) ?>">
			<div class="red-text"><?php echo $errors['covid_safe_cleaning']; ?></div>
			<div class="center">
				<input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
			</div>
		</form>
	</section>

	<?php include('templates/footer.php'); ?>

</html>
