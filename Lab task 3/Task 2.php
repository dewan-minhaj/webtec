<!DOCTYPE html>
<html lang="en">

<head>
    <title>Password change</title>
    <style type="text/css">
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <?php
    $currErr = $NewpassErr = $renewpasErr = "";
    $Newpass = $renewpass = "";
    $currPass = "minhaj@0505";
    $incurrpass = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($_POST["currentpass"] != $currPass) {
            $currErr = "current passworde does not match";
        } else {
            $currPass = $_POST["currentpass"];
        }
        if ($_POST["currentpass"] == $_POST["newpassword"]) {
            $NewpassErr = "New password can not be same as current password";
        } else {
            $Newpass = $_POST["newpassword"];
        }
        if ($_POST["newpassword"] == $_POST["retypenewpassword"]) {
            $renewpass = $_POST["retypenewpassword"];
        } else {

            $renewpasErr = "doest not match to the new password";
        }
    }
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        
            <h2>Current Password</h2><br><br>
            Current Password:<input type="text" name="currentpass">
            <span class="error">* <?php echo $currErr; ?></span>
            <br><br>
            New Password:<input type="text" name="newpassword">
            <span class="error">* <?php echo $NewpassErr; ?></span>
            <br><br>
            Retype new password: <input type="text" name="retypenewpassword">
            <span class="error">* <?php echo $renewpasErr; ?></span>
            <br><br>
            <input type="submit" name="submit" value="Submit">
        
    </form>
   
</body>

</html>