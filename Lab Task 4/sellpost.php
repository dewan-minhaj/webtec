<?php
$message = '';

$nameErr = "";
$name = "";
 
 

if (isset($_POST["submit"])) 
{
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else if (!empty($_POST["name"])) {
        $name = ($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
            $name = "";
        } else if (strlen($name) < 2) {
            $nameErr = "Contains at least two  words";
            $name = "";
        }
    }

    
    
	  
    
    if (!empty($_POST["name"]) && !empty($_POST["type"]) && !empty($_POST["price"]) && !empty($_POST["address"]) && !empty($_POST["zone"])&& !empty($_POST["ds"]) &&!empty($_POST["sr"]) && !empty($_POST["pl"])) {
        if (file_exists('Data_sell.json')) {
            $current_data = file_get_contents('Data_sell.json');

            $array_data = json_decode($current_data, true);
            $new_data = array(
                'name'               =>     $_POST["name"],
				
                'type'          =>     $_POST["type"],
                'price'     =>     $_POST["price"],
                'address'     =>     $_POST["address"],
				'zone'     =>     $_POST["zone"],
                'ds' =>    $_POST["ds"],
				'phn'   =>      $_POST["phn"],
				'sf' =>    $_POST["sf"],
				'pl' =>    $_POST["pl"],
				'sr'     =>     $_POST["sr"],
            );
            $array_data[] = $new_data;
            $final_data = json_encode($array_data);

            if (file_put_contents('Data_sell.json', $final_data)) {
                $message = "<p>File Appended Success fully</p>";
            }
        } else {
            $error = 'JSON File not exits';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
    <style type="text/css">
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <br />
    <form method="post">
        <?php
        if (isset($error)) {
            echo $error;
        }
        ?>
	<fieldset>	
	     <legend>
		 <h3>REGISTRATION </h3>
		 </legend>
        Qwner Name:
        <input type="text" name="name" value="<?php echo $name; ?>">
        <span class="error">* <?php echo $nameErr; ?></span>
        <br><br>
		
		Property for Sell or Rent:
		<input type="text" id="sr" name="sr" value="">
		<br><br>
		
        Type of Property:
        <select id="type" name="type">
        <option value="select1">Select One </option>
	    <option value="land">Land</option>
        <option value="house">House</option>
        <option value="flat">Flat/Appartment</option>
        <option value="room">Room</option>
	
        </select>
		<br><br>
        price:
        <input type="text" name="price" value="$">
        
        <br><br>
		
		Property Address:
		<input type="text" id="address" name="address" value="Enter address here...">
	
		<br><br>
		
		Property Zone:
		<select id="Zone" name="zone">
        <option value="selectz">Select Zone</option>
        <option value="dhaka">Dhaka</option>
        <option value="rajshahi">Rajshahi</option>
        <option value="khulna">Khulna</option>
        <option value="barishal">Barishal</option>
	    <option value="chattogram">Chattogram</option>
        <option value="rangpur">Rangpur</option>
        <option value="sylhet">Sylhet</option>
        </select>
		<br><br>
		
        Property Description:
        <input type="text" id="ds" name="ds" value="">
		<br><br>
		
        Square Feet:
		<input type="text" id="sf" name="sf" value="000sq.ft">
        <br><br>
		
		Contact No:
		<input type="text" id="phn" name="phn" value="+880">
		<br><br>
		
		Picture Link:
		<input type="text" id="pl" name="pl" value="drive link only">
		<br><br>
		
        <input type="submit" name="submit" value="Append" class="btn btn-info" /><br />
		</fieldset>
        <?php
        if (isset($message)) {
            echo $message;
        }
        ?>
    </form>
    </div>
    <br />
</body>

</html>