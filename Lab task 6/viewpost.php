
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
            <li><a href="profile.html"><i class="fas fa-user"></i>Profile</a></li>
        
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
                    
					<th>Square Feet</th>
					<th>Contact No</th>
                    <th>NID</th>
					<th>Picture Link</th>
                </tr>
                <?php
                $data = file_get_contents("Data_sell.json");
                $data = json_decode($data, true);
                foreach ($data as $row) {
                    echo '<tr>
                               <td>' . $row["name"] . '</td>
							   <td>' . $row["sr"] . '</td>
                               <td>' . $row["type"] . '</td>
                               <td>' . $row["price"] . '</td>
                               <td>' . $row["address"] . '</td>
                               
							   <td>' . $row["sf"] . '</td>
							   <td>' . $row["phn"] . '</td>
                               <td>' . $row["nid"] . '</td>
							   <td>' . $row["pl"] . '</td>
                               </tr>';
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