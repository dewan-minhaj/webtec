<?php

$emptyusername=$emptyemail="";


if(isset($_POST['submit']))
{
    if(empty($_POST['username'])) {
        $emptyusername = "Please Fill up the Name!";
  }
 
 else if(empty($_POST['email'])) {                    
    $emptyemail = "Please Fill up the Email!";
     
 }
 else if(empty($_POST['name']))
 {
     $emptysurname="Please Fill up the name";
 }
 else if(empty($_POST['password']))
 {
     $emptysurname="Please Fill up the password";
 }
 else{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "data_db";
    
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
     
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "INSERT INTO users (Username, Fullname, Email,Password, Gender, DOB)
      VALUES (:username,:name,:email,:password, :gender, :dob)";
       $stmt = $conn->prepare($sql);
      $stmt->execute([
          ':username'=>$_POST['username'],
          ':name'=>$_POST['name'],
          ':email'=>$_POST['email'],
          ':password'=>$_POST['password'],
		  ':gender'=>$_POST['gender'],
		  ':dob'=>$_POST['dob']
      ]);
      echo "New record created successfully";
    } catch(PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }
    
    $conn = null;
 }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registration</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<style> 
</style>
<body>
   <div class="container" style="width:500px;">
    <form action="" method="POST">
	
	        <legend>
		       <h3>REGISTRATION </h3>
		    </legend>
        <label>Full Name</label>
            <input type="text" name="name" class="form-control" value="" />
			
			</br>
            <label>User Name</label>
            <input type="text" name="username" class="form-control" value="" />

            </br>
            <label>E-mail</label>
            <input type="text" name="email" class="form-control" value="" />

            </br>
            <label>Password</label>
            <input type="password" name="password" class="form-control" />

            </br>
            <label>Confirm Password</label>
            <input type="password" name="confirmpassword" class="form-control" />

            <br>

            <fieldset>
                <legend>Gender</legend>
                <input type="radio" id="male" name="gender" value="male">
                <label for="male">Male</label>
                <input type="radio" id="female" name="gender" value="female">
                <label for="female">Female</label>
                <input type="radio" id="other" name="gender" value="other">
                <label for="other">Other</label>

                </br>
                <legend>Date of Birth:</legend>
                <input type="date" name="dob">

                </br>
            </fieldset>
	
        
        <input type="submit" name="submit" value="Register" class="btn btn-info" /><br />
            <?php
            if (isset($message)) {
                echo $message;
            }
            ?>
    </form>
	</div>
</body>
</html>