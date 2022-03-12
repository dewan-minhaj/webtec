<?php
	session_start();
	if (isset ($_POST['name'])){
		if($_POST ['name']==$name && $_POST['password']==$pass){
			$_SESSION['name']=$name;
			header("location:welcome.php");
		}else{
			$msg ="Name or password invalid";
		}
	}
	
	
?>
<?php

$nameErr = $passErr = "";
$username = $pass = "";
$admin_name = "minhaj";
$admin_Password = "minhaj@05";
if (isset($_POST["submit"])) {
    if (empty($_POST["username"])) {
        $nameErr = "Name is required";
    } else if (empty($_POST["password"])) {
        $passErr = "pass is required";
    } else {
        $username = $_POST['username'];
	}
        if ($admin_name == $_POST['username'] and $admin_Password == $_POST['password']) {
            $_SESSION['username'] = $username;
            header("location:Dashboard.php");
		}
    ?>
	<?php
	$name="minhaj";
	$pass="minhaj@05";
	
	if (isset ($_POST['name'])){
		if($_POST ['name']==$name && $_POST['password']==$pass){
			$_SESSION['name']=$name;
			header("location:welcome.php");
		}else{
			$msg ="Name or password invalid";
		}
	}
	
}
    ?>
	
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <style type="text/css">
        .error {
            color: red;
        }
    </style>
</head>

<body>	
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <fieldset>
            <legend>
			<h3>LOGIN</h3>
			</legend>
            User Name:<input type="text" name="name" value="">
            <span class="error">* <?php echo $nameErr; ?></span>
            <br><br>
            Password:<input type="password" name="password">
            <span class="error">* <?php echo $passErr; ?></span>
            <br><br>
            <input type="submit" name="submit" value="Submit">
			<a href="forgot.php" >  Forgot password?</a> 
        </fieldset>
    </form>
   
</body>

</html>