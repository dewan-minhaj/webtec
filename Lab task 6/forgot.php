<!DOCTYPE html>
<html lang="en">

<head>
    <title>Forgot Password</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    
</head>

<body>
    

<div class="container" style="margin-top:07%;height:100vh;width:400px;">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <fieldset>
                <legend> Forgot Password </legend>
                Enter Email: <input type="text" name="email" >
                
                <br><br>
                <input type="submit" name="submit" value="Submit" >
                <a href="Login.php">Go to Login</a>
                
            </fieldset>
        </form>
    </div>

</body>

</html>