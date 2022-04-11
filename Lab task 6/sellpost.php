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
    
    if (!empty($_POST["name"]) && !empty($_POST["type"]) && !empty($_POST["price"]) && !empty($_POST["address"]) && !empty($_POST["zone"])&& !empty($_POST["nid"]) &&!empty($_POST["sr"]) && !empty($_POST["pl"])) {
        if (file_exists('Data_sell.json')) {
            $current_data = file_get_contents('Data_sell.json');

            $array_data = json_decode($current_data, true);
            $new_data = array(
                'name'               =>     $_POST["name"],
				
                'type'          =>     $_POST["type"],
                'price'     =>     $_POST["price"],
                'address'     =>     $_POST["address"],
				'zone'     =>     $_POST["zone"],
				'phn'   =>      $_POST["phn"],
                'nid' =>    $_POST["nid"],
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
	<meta charset="UTF-8">
	<title>Real eState</title>
	<link rel="stylesheet" href="dash.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    
    <style type="text/css">
        .error {
            color: red;
        }
    </style>
</head>
<body>

<div class="wrapper">
    <div class="sidebar">
        <h2> Seller Dashboard</h2>
        <ul>
        <li><a href="Dashboard.php"><i class="fas fa-home"></i>Home</a></li>
            <li><a href="profile.html"><i class="fas fa-user"></i>Profile</a></li>
        
            <li><a href="sellpost.php"><i class="fa fa-bullhorn"></i> Post for Sell</a></li>
    
            <li><a href="viewpost.php"><i class="fa fa-search"></i>  View Post</a></li>
            <li><a href="agentlist.php"><i class="fa fa-comments"></i>  Contact Againt</a></li>
            <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
        </ul> 
    </div>

    <div class="main_content">
        <div class="header">POST FOR SELL OR RENT
         
              
        </div>  
        <div class="info">
            <div class="main">
            <div class="container" style="width:500px;">
    <form action="" method="POST">
	
	        
		    </legend>
            <label>Owner Name</label>
            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>" />

            <span class="error">* <?php echo $nameErr; ?></span>
			
			</br>
            <label>Property for Sell or Rent</label>
            <input type="text" name="sr" class="form-control" value="" />

            </br>
            <label>Type of Property</label>
            <select id="type" name="type"class="form-control" value="" >
               <option value="select1">Select One </option>
	           <option value="land">Land</option>
               <option value="house">House</option>
               <option value="flat">Flat/Appartment</option>
               <option value="room">Room</option>
	
            </select>

            </br>
            <label>price</label>
            <input type="text" name="price" class="form-control" value="TK.">

            </br>
            <label>Property Address</label>
            <input type="text" name="address" class="form-control" value="Enter address here..">

            <br>

            <legend>Property Zone</legend>
            <select id="type" name="type"class="form-control" value="" >
                <option value="selectz">Select Zone</option>
                <option value="dhaka">Dhaka</option>
                <option value="rajshahi">Rajshahi</option>
                <option value="khulna">Khulna</option>
                <option value="barishal">Barishal</option>
	            <option value="chattogram">Chattogram</option>
                <option value="rangpur">Rangpur</option>
                <option value="sylhet">Sylhet</option>
           </select>

                </br>
            <label>Square Feet</label>
            <input type="text" name="sf" class="form-control" value="000sq.ft">
            <br>

            <label>Contact No</label>
            <input type="text" name="phn" class="form-control" value="+880">
            <br>

            <label>NID</label>
            <input type="text" name="nid" class="form-control" value="">
            <br>

            <label>Picture Link</label>
            <input type="text" name="pl" class="form-control" value="drive link only">
            <br>
            
	
        
        <input type="submit" name="submit" value="Post" class="btn btn-info" /><br />
            <?php
            if (isset($message)) {
                echo $message;
            }
            ?>
    </form>
	</div>
                
        
            
            </div>
      </div>
    </div>
</div>

</body>
</html>