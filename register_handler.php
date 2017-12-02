<?php 
	$fname = "";
	$lname = "";
	$em = "";
	$em2 = "";
	$password = "";
	$password2 = "";
	$day = "";
	$month = "";
	$year = "";
	$gender = "";
	$date = "";
	$error_array = array();

	if(isset($_POST['register_button'])){

		// First name
		$fname = strip_tags($_POST['reg_fname']);
		$fname = str_replace(' ', '', $fname);
		$fname = ucfirst(strtolower($fname));
		$_SESSION['reg_fname'] = $fname;

		// Last name
		$lname = strip_tags($_POST['reg_lname']);
		$lname = str_replace(' ', '', $lname);
		$lname = ucfirst(strtolower($lname));
		$_SESSION['reg_lname'] = $lname;

		// email
		$em = strip_tags($_POST['reg_email']);
		$em = str_replace(' ', '', $em);
		$_SESSION['reg_email'] = $em;

		// email 2
		$em2 = strip_tags($_POST['reg_email2']);
		$em2 = str_replace(' ', '', $em2);
		$_SESSION['reg_email2'] = $em2;

		// Password
		$password = strip_tags($_POST['reg_password']);

		// Password 2
		$password2 = strip_tags($_POST['reg_password2']);

		// Birthday
		$day = $_POST['day'];
		$_SESSION['day'] = $day;
		$month = $_POST['month'];
		$_SESSION['month'] = $month;
		$year = $_POST['year'];
		$_SESSION['year'] = $year;

		// Gender
		$gender = $_POST["Gender"];
		$_SESSION["Gender"] = $gender;

		// Sign up Date
		$date = date("Y-m-d"); // Current date

        if($em == $em2){
			// Check if email is in valid format
			if(filter_var($em, FILTER_VALIDATE_EMAIL)){
				$em = filter_var($em, FILTER_VALIDATE_EMAIL);

				// Check if email already exists
				$e_check = mysqli_query($con, "SELECT email FROM users WHERE email='$em'");

				// Count the number of rows returned
				$num_rows = mysqli_num_rows($e_check);

				if($num_rows > 0){
					array_push($error_array, "Email already in use<br>");
				}
			}
			else{
				array_push($error_array, "Invalid email format<br>");
			}
		}
		else{
			array_push($error_array, "Emails don't match<br>");
		}

		if(strlen($fname) > 30 || strlen($fname) < 2){
			array_push($error_array, "Your first name must be between 2 and 30 characters<br>");
		}

		if(strlen($lname) > 30 || strlen($lname) < 2){
			array_push($error_array, "Your last name must be between 2 and 30 characters<br>");
		}

		if($password != $password2){
			array_push($error_array, "Your passwords don't match<br>");
		}
		else{
			if(!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@£$?])/', $password)){
				array_push($error_array, "Your password should contain one uppercase letter, one lowercase letter and one special character <br>");
			}
		}

		if(strlen($password) > 30 || strlen($password) < 5){
			array_push($error_array, "Your password must be between 5 and 30 characters<br>");
		}

		if(empty($error_array)){
			$password = md5($password); // Encrypt password before sending to database

			// Generate username by concatenating first name and last name
			$username = strtolower($fname . "_" . $lname);
			$check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username='$username'");

			$i = 0;
			// if username exists add number to username
			while(mysqli_num_rows($check_username_query) != 0){
				$i++; // Add 1 to i
				$username = $username . "_" . $i;
				$check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username='$username'");
			}

			// Profile picture assignment
			$rand = rand(1, 2);
			
			if($rand == 1)
				$profile_pic = "assets/images/profile_pics/defaults/head_alizarin.png";
			else if($rand == 2)
				$profile_pic = "assets/images/profile_pics/defaults/head_amethyst.png";

			// this is the sequemce data is inserted in table from form
			$query = mysqli_query($con, "INSERT INTO users VALUES 
				('', '$fname', '$lname', '$username', '$em', '$password', '$date', '$profile_pic', '0', '0', 'no', ',', '$day', '$month', '$year', '$gender')
				");

			array_push($error_array, "<span style='color: 14C800;'>You're all set! Go ahead and login!</span><br>");

			// Clear session variables
			$_SESSION['reg_fname'] = "";
			$_SESSION['reg_lname'] = "";
			$_SESSION['reg_email'] = "";
			$_SESSION['reg_email2'] = "";
			$_SESSION['day'] = "";
			$_SESSION['month'] = "";
			$_SESSION['year'] = "";
			$_SESSION['gender'] = "";
		}


	}

	?>
