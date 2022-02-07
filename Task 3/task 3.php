<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.error{
			color: red;
		}
	</style>
</head>
<body>
	<?php
	// define variables and set to empty values
	$nameErr = $emailErr = $dateErr= $genderErr = $degreeErr= $bloodErr= "";
	$name = $email = $date= $gender = $degree= $blood= $website = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	  if (empty($_POST["name"])) {
	    $nameErr = "Name is required";
	  } else {
	    $name = test_input($_POST["name"]);
		if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
		  $nameErr = "Only letters and white space allowed";
		  $name = "";
		}
	  }

	  if (empty($_POST["email"])) {
	    $emailErr = "Email is required";
	  } else {
	    $email = test_input($_POST["email"]);
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		  $emailErr = "Invalid email format";
		  $email="";
		}
	  }

	  if (empty($_POST["date"])) {
	    $dateErr = "Must be setected";
	  } else {
	    $date = test_input($_POST["date"]);
	  }

	  

	  if (empty($_POST["gender"])) {
	    $genderErr = "Gender is required";
	  } else {
	    $gender = test_input($_POST["gender"]);
	  }
	   if (empty($_POST["degree"])) {
	    $degreeErr = "Must be setected tow";
	  } else {
	    $degree = test_input($_POST["degree"]);
	  }
	  if (empty($_POST["blood"])) {
	    $bloodErr = "Must be setected";
	  } else {
	    $blood = test_input($_POST["blood"]);
	  }
	}
	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
	?>

	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
		Name: <input type="text" name="name" value="<?php echo $name;?>">
		<span class="error">* <?php echo $nameErr;?></span>
		<br><br>
		E-mail:
		<input type="text" name="email" value="<?php echo $email;?>">
		<span class="error">* <?php echo $emailErr;?></span>
		<br><br>
		Date of Birth: <input type="date" id="myDate" value="">
		<span class="error">* <?php echo $dateErr;?></span>
		<br><br>
		 
		
		Gender:
		<input type="radio" name="gender"
		<?php if (isset($gender) && $gender=="female") echo "checked";?>
		value="female">Female
		<input type="radio" name="gender"
		<?php if (isset($gender) && $gender=="male") echo "checked";?>
		value="male">Male
		<input type="radio" name="gender"
		<?php if (isset($gender) && $gender=="other") echo "checked";?>
		value="other">Other
		<span class="error">* <?php echo $genderErr;?></span>
		<br><br>
		Degree:<br>
		<input type="checkbox"  name="degree"
		<?php if (isset($degree) && $degree=="ssc") echo "checked";?>
		value="ssc">SSC
		<input type="checkbox"  name="degree"
		<?php if (isset($degree) && $degree=="hsc") echo "checked";?>
		value="hsc">HSC
		<input type="checkbox"  name="degree"
		<?php if (isset($degree) && $degree=="bsc") echo "checked";?>
		value="bsc">BSc
		<input type="checkbox"  name="degree"
		<?php if (isset($degree) && $degree=="msc") echo "checked";?>
		value="msc">MSc
         <span class="error">* <?php echo $degreeErr;?></span>
        <br><br>
		Blood Group:
		 <select id="blood" name="blood">
		 <option value=""></option>
         <option value="A+">A+</option>
         <option value="A-">A-</option>
         <option value="B+">B+</option>
         <option value="B-">B-</option>
		 <option value="AB+">Ab+</option>
         <option value="AB-">Ab-</option>
         <option value="O+">O+</option>
         <option value="O-">O-</option>
         </select>
		 <span class="error">* <?php echo $bloodErr;?></span>
         <br><br>
		<input type="submit" name="submit" value="Submit">
		
  
	</form>
	<h2>Your input</h2>
	<?php 
			echo $name."<br>";
			echo $email."<br>";
			
			echo $degree."<br>";
			echo $date."<br>";
			echo $gender."<br>";
			echo $blood."<br>";
	 ?>
</body>
</html>