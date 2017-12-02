<?php 
	require 'config/config.php';
	require 'includes/form_handlers/register_handler.php';
	require 'includes/form_handlers/login_handler.php';
?>

<html>

<head>
	<title>register</title>
	<link rel="stylesheet" type="text/css" href="assets/css/register_style.css">
	<link href="https://fonts.googleapis.com/css?family=Atomic+Age" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="assets/js/register.js" type="text/javascript"></script>
</head>

<body>

	<?php 

		if(isset($_POST['register_button'])){
			echo '
			<script>
				$(document).ready(function(){
					$("#first").hide();
					$("#second").show();
				});
			</script>
			';
		}

	?>

	<div class="wrapper">
		<div class="login_box">
			<div class="login_header">
			<h1>REGISTER</h1>
		    </div>
		    <div id="first">
				<form action="register.php" method="POST">
					<input type="email" name="log_email" placeholder="Email Address" value="<?php 
					if(isset($_SESSION['log_email'])){
						echo $_SESSION['log_email'];
					} 
					?>" required>
					<br>
					<input type="password" name="log_password" placeholder="Password" required>
					<br>
					<?php if(in_array("Email or password was incorrect<br>", $error_array))
						echo "<span id='error'>Email or password was incorrect<br><span>"; 
					?>
					<input type="submit" name="login_button" value="Login">
					<br>
					<a href="#" id="signup" class="signup">Need an account? Register here!</a>				
				</form>
		    </div>

		    <div id="second">
				<form action="register.php" method="POST">
					<input type="text" name="reg_fname" placeholder="First Name" value="<?php 
					if(isset($_SESSION['reg_fname'])){
						echo $_SESSION['reg_fname'];
					} 
					?>" required>
					<br>
					<?php if(in_array("Your first name must be between 2 and 30 characters<br>", $error_array)) 
								echo "<span id='error'>Your first name must be between 2 and 30 characters<br></span>"; ?>


					<input type="text" name="reg_lname" placeholder="Last Name" value="<?php 
					if(isset($_SESSION['reg_lname'])){
						echo $_SESSION['reg_lname'];
					} 
					?>" required>
					<br>
					<?php if(in_array("Your last name must be between 2 and 30 characters<br>", $error_array)) 
								echo "<span id='error'>Your last name must be between 2 and 30 characters<br></span>"; ?>


					<input type="email" name="reg_email" placeholder="Email" value="<?php 
					if(isset($_SESSION['reg_email'])){
						echo $_SESSION['reg_email'];
					} 
					?>" required>
					<br>


					<input type="email" name="reg_email2" placeholder="Confirm Email" value="<?php 
					if(isset($_SESSION['reg_email2'])){
						echo $_SESSION['reg_email2'];
					} 
					?>" required>
					<br>
					<?php if(in_array("Email already in use<br>", $error_array)) 
								echo "<span id='error'>Email already in use<br></span>";
						  else if(in_array("Invalid email format<br>", $error_array)) 
								echo "<span id='error'>Invalid email format<br></span>";
					      else if(in_array("Emails don't match<br>", $error_array)) 
								echo "<span id='error'>Emails don't match<br></span>"; ?>


					<input type="password" name="reg_password" placeholder="Password" required>
					<br>


					<input type="password" name="reg_password2" placeholder="Confirm Password" required>
					<br>
					<?php if(in_array("Your passwords don't match<br>", $error_array)) 
								echo "<span id='error'>Your passwords don't match<br></span>";
						  else if(in_array("Your password should contain one uppercase letter, one lowercase letter and one special character <br>", $error_array)) 
								echo "<span id='error'>Your password should contain one uppercase letter, one lowercase letter and one special character <br></span>";
					      else if(in_array("Your password must be between 5 and 30 characters<br>", $error_array)) 
								echo "<span id='error'>Your password must be between 5 and 30 characters<br></span>"; ?>

					<div class="birthday">
					Birthday
					<br>
					<select name='day' required>
						<option disabled="disabled">Day</option>
						<option selected="true" value='1'>1</option>
						<option value='2'>2</option>
						<option value='3'>3</option>
						<option value='4'>4</option>
						<option value='5'>5</option>
						<option value='6'>6</option>
						<option value='7'>7</option>
						<option value='8'>8</option>
						<option value='9'>9</option>
						<option value='10'>10</option>
						<option value='11'>11</option>
						<option value='12'>12</option>
						<option value='13'>13</option>
						<option value='14'>14</option>
						<option value='15'>15</option>
						<option value='16'>16</option>
						<option value='17'>17</option>
						<option value='18'>18</option>
						<option value='19'>19</option>
						<option value='20'>20</option>
						<option value='21'>21</option>
						<option value='22'>22</option>
						<option value='23'>23</option>
						<option value='24'>24</option>
						<option value='25'>25</option>
						<option value='26'>26</option>
						<option value='27'>27</option>
						<option value='28'>28</option>
						<option value='29'>29</option>
						<option value='30'>30</option>
						<option value='31'>31</option>
						</select>

					<select name='month' required>
						<option disabled="disabled">Month</option>
						<option selected="true" value='jan'>Jan</option>
						<option value='feb'>Feb</option>
						<option value='mar'>Mar</option>
						<option value='apr'>Apr</option>
						<option value='may'>May</option>
						<option value='jun'>Jun</option>
						<option value='jul'>Jul</option>
						<option value='aug'>Aug</option>
						<option value='sep'>Sep</option>
						<option value='oct'>Oct</option>
						<option value='nov'>Nov</option>
						<option value='dec'>Dec</option>
					</select>

					<select name='year' required>
						<option disabled="disabled">Year</option>
						<option value='2018'>2018</option>
						<option value='2017'>2017</option>
						<option value='2016'>2016</option>
						<option value='2015'>2015</option>
						<option value='2014'>2014</option>
						<option value='2013'>2013</option>
						<option value='2012'>2012</option>
						<option value='2011'>2011</option>
						<option value='2010'>2010</option>
						<option value='2009'>2009</option>
						<option value='2008'>2008</option>
						<option value='2007'>2007</option>
						<option value='2006'>2006</option>
						<option value='2005'>2005</option>
						<option value='2004'>2004</option>
						<option value='2003'>2003</option>
						<option value='2002'>2002</option>
						<option value='2001'>2001</option>
						<option value='2000'>2000</option>
						<option value='1999'>1999</option>
						<option value='1998'>1998</option>
						<option value='1997'>1997</option>
						<option value='1996'>1996</option>
						<option value='1995'>1995</option>
						<option value='1994'>1994</option>
						<option value='1993'>1993</option>
						<option value='1992'>1992</option>
						<option value='1991'>1991</option>
						<option value='1990'>1990</option>
						<option value='1989'>1989</option>
						<option value='1988'>1988</option>
						<option value='1987'>1987</option>
						<option value='1986'>1986</option>
						<option value='1985'>1985</option>
						<option value='1984'>1984</option>
						<option value='1983'>1983</option>
						<option value='1982'>1982</option>
						<option value='1981'>1981</option>
						<option selected="true" value='1980'>1980</option>
						<option value='1979'>1979</option>
						<option value='1978'>1978</option>
						<option value='1977'>1977</option>
						<option value='1976'>1976</option>
						<option value='1975'>1975</option>
						<option value='1974'>1974</option>
						<option value='1973'>1973</option>
						<option value='1972'>1972</option>
						<option value='1971'>1971</option>
						<option value='1970'>1970</option>
						<option value='1969'>1969</option>
						<option value='1968'>1968</option>
						<option value='1967'>1967</option>
						<option value='1966'>1966</option>
						<option value='1965'>1965</option>
						<option value='1964'>1964</option>
						<option value='1963'>1963</option>
						<option value='1962'>1962</option>
						<option value='1961'>1961</option>
						<option value='1960'>1960</option>
						<option value='1959'>1959</option>
						<option value='1958'>1958</option>
						<option value='1957'>1957</option>
						<option value='1956'>1956</option>
						<option value='1955'>1955</option>
						<option value='1954'>1954</option>
						<option value='1953'>1953</option>
						<option value='1952'>1952</option>
						<option value='1951'>1951</option>
						<option value='1950'>1950</option>
						<option value='1949'>1949</option>
						<option value='1948'>1948</option>
						<option value='1947'>1947</option>
						<option value='1946'>1946</option>
						<option value='1945'>1945</option>
						<option value='1944'>1944</option>
						<option value='1943'>1943</option>
						<option value='1942'>1942</option>
						<option value='1941'>1941</option>
						<option value='1940'>1940</option>
						<option value='1939'>1939</option>
						<option value='1938'>1938</option>
						<option value='1937'>1937</option>
						<option value='1936'>1936</option>
						<option value='1935'>1935</option>
						<option value='1934'>1934</option>
						<option value='1933'>1933</option>
						<option value='1932'>1932</option>
						<option value='1931'>1931</option>
						<option value='1930'>1930</option>
						<option value='1929'>1929</option>
						<option value='1928'>1928</option>
						<option value='1927'>1927</option>
						<option value='1926'>1926</option>
						<option value='1925'>1925</option>
						<option value='1924'>1924</option>
						<option value='1923'>1923</option>
						<option value='1922'>1922</option>
						<option value='1921'>1921</option>
						<option value='1920'>1920</option>
						<option value='1919'>1919</option>
						<option value='1918'>1918</option>
					</select>
					</div>
					<br>

					<div class="gender">
					<input type="radio" name="Gender" value="male" required> Male
					<input type="radio" name="Gender" value="female"> Female
					<input type="radio" name="Gender" value="other"> Other
					</div>
					<br>


					<input type="submit" name="register_button" value="Create Account">
					<br>

					<?php if(in_array("<span style='color: 14C800;'>You're all set! Go ahead and login!</span><br>", $error_array)) 
								echo "<span style='color: 14C800;'>You're all set! Go ahead and login!</span><br>"; ?>
					<a href="#" id="signin" class="signin">Already have an account? Sign in here!</a>

				</form>
			</div>
		</div>
	</div>
</body>
</html>
