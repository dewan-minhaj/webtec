
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Real eState</title>
	<link rel="stylesheet" href="dash.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
</head>
<body>

<div class="wrapper">
    <div class="sidebar">
        <h2> Seller Dashboard</h2>
        <ul>
        <li><a href="Dashboard.php"><i class="fas fa-home"></i>Home</a></li>
            
        
            <li><a href="sellpost.php"><i class="fa fa-bullhorn"></i> Post for Sell</a></li>
    
            <li><a href="viewpost.php"><i class="fa fa-search"></i>  View Post</a></li>
            <li><a href="agentlist.php"><i class="fa fa-comments"></i>  Contact Againt</a></li>
            <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
        </ul> 
    </div>

    <div class="main_content">
        <div class="header">VIEW POST DETAILS 
         
              
        </div>  
        <div class="info">
            <div class="main">
            <div class="container" style="width:1200px;">
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th>Owner Name</th>
					<th>Property for Sell or Rent</th>
                    <th>Type of Property:</th>
                    <th>Price</th>
                    <th>Property Address</th>
                    <th>Property Zone</th>
					<th>Square Feet</th>
					<th>Contact No</th>
                    <th>NID</th>
					<th>Picture Link</th>
                </tr>
              



                <?php 
$servername="localhost";
$username = "root"; 
$password = ""; 
$database = "data1_db"; 
$mysqli = new mysqli("localhost", $username, $password, $database); 
$query = "SELECT * FROM postlist";




if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $ownername = $row["Ownername"];
        $sellorrent = $row["Sellorrent"];
        $typeofproperty = $row["Typeofproperty"];
        $price = $row["Price"];
        $Propertyaddress = $row["Propertyaddress"]; 
        $Propertyzone	 = $row["Propertyzone"]; 
        $Suqarefeets = $row["Suqarefeet"]; 

        $Picturelink = $row["Picturelink"]; 
        $Contactno	 = $row["Contactno"]; 
        $Niid = $row["Niid"]; 

        echo '<tr> 
                  <td>'. $ownername .'</td> 
                  <td>'.$sellorrent.'</td> 
                  <td>'. $typeofproperty.'</td> 
                  <td>'.$price.'</td> 
                  <td>'. $Propertyaddress.'</td> 
                  <td>'.$Propertyzone.'</td> 
                  <td>'.$Suqarefeets.'</td> 
                  <td>'.$Contactno.'</td>
                  <td>'.$Niid.'</td> 
                  <td>'.$Picturelink.'</td> 
                   
                  


              </tr>';
    }
    $result->free();
} 
?>




		
				
            </table>
            
            </div>
            <a href="sellpost.php" class= "btn btn-primary">ADD</a>
      </div>
    </div>
</div>

</body>
</html>