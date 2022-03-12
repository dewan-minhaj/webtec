<!DOCTYPE html>
<html lang="en">

<head>
    <title>Forgot Password</title>
    
</head>

<body>
    

    
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