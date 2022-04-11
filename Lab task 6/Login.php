<?php
	session_start();
	if (isset ($_POST['name'])){
		if($_POST ['name']==$name && $_POST['password']==$pass){
			$_SESSION['name']=$name;
			header("location:Dashboard.php");
		}else{
			$msg ="Name or password invalid";
		}
	}
	
	
?>


<?php
if(isset($_POST['submit']))
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "data_db";
    
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
     
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "SELECT * FROM users WHERE Username= ?";
        $stmt=$conn->prepare($sql);
        $stmt->execute([
            $_POST['username']
        ]);
        
    } catch(PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if($_POST['username']==$row['Username'] and $_POST['password']==$row['Password'])
    {
        session_start();
        header("location:Dashboard.php");
     $_SESSION['USERNAME']=$_POST['username'];
    }
    else{
        echo "Info doesn't match";
    }
 }


?>
<?php
$nameErr = $passErr = "";
$username = $pass = "";

if (isset($_POST["submit"])) {
    if (empty($_POST["username"])) {
        $nameErr = "Name is required";
    } else if (empty($_POST["password"])) {
        $passErr = "pass is required";
    } else {
        $username = $_POST['username'];
	}
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	<style type="text/css">
        .error {
            color: red;
        }
    </style>
</head>
<body>
  <div class="container" style="margin-top:07%;height:100vh;width:400px;">
        
     <form action="" method="POST">
        <fieldset>
            <legend>Login</legend>
            <label>Username: </label><br>
        <input type="text" name='username' class="form-control" value="">
		<span class="error">* <?php echo $nameErr; ?></span>
        <br><br>
        <label> Password:</label> <br>
        <input type="password" name='password' class="form-control" value="">
		<span class="error">* <?php echo $passErr; ?></span>
        <br>
		<input type="checkbox" name="remember" > Remember me
        <br><br>
        <input type="submit" name="submit" value="Login">
		<a href="forgot.php">Forgot Password?</a>
        <a href="Registration.php"> or Sing up</a>
        </fieldset>
    </form>
   </div>
</body>
</html>