<?php
$message = '';

$nameErr = $emailErr = "";



if(isset($_POST['submit']))
{
    if(empty($_POST['name'])) {
        $nameErr = "Please Fill up the Name!";
  }
 
 else if(empty($_POST['email'])) {                    
    $emailErr = "Please Fill up the Email!";
     
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
    <script>  
		function validateform(){  
		var username=document.myform.username.value;  
		var password=document.myform.password.value;  
		  
		if (username==null || username==""){  
		  alert("User Name can't be blank");  
		  return false;  
		}else if(password.length<6){  
		  alert("Password must be at least 6 characters long.");  
		  return false;  
		  }  
		}
		function checkEmpty() {
		  	if (document.myform.username.value = "") {
		  		alert("User Name can't be blank");
		        return false;  
		  	}
		  }  
		function checkName() {
			if (document.getElementById("username").value == "") {
			  	document.getElementById("usernameErr").innerHTML = "User Name can't be blank";
			  	document.getElementById("username").style.borderColor = "red";
			}else{
			  	document.getElementById("usernameErr").innerHTML = "";
			  	document.getElementById("username").style.borderColor = "black";

			}
			
        }
        function checkPass(){
        	if (document.getElementById("password").value == "") {
			  	document.getElementById("passErr").innerHTML = "Password can't be blank";
			  	document.getElementById("password").style.borderColor = "red";
			}else{

			  	document.getElementById("passErr").innerHTML = "";
			  	document.getElementById("password").style.borderColor = "black";
			}
        }
</script> 

        
</head>
<style type="text/css">
        .error {
            color: red;
        }
</style>
<body>
   <div class="container" style="width:500px;">
    <form name="seller" action="" method="POST" onsubmit="validateform()">

    <?php
        if (isset($error)) {
            echo $error;
        }
        ?>
	
	        <legend>
		       <h3>REGISTRATION </h3>
		    </legend>
        <label>Full Name</label>
            <input type="text" name="name"  class="form-control" value="" />
            <span class="error">* <?php echo $nameErr; ?></span>
            
			
			</br>
            <label>User Name</label>
            <input type="text" name="username" id="username" onblur="checkName()" onkeyup="checkName()" class="form-control" value="" />
            <p id="usernameErr"></p>

            </br>
            <label>E-mail</label>
            <input type="text" name="email" class="form-control" value="" />
            <span class="error">* <?php echo $emailErr; ?></span>

            </br>
            <label>Password</label>
            <input type="password" name="password" id="password"  onblur="checkPass()" onkeyup="checkPass()" class="form-control" />
            <p id="passErr"></p>

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