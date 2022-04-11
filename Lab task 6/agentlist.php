<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Real eState</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<link rel="stylesheet" href="dash.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
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
        <div class="header">AGENT LIST
         
              
        </div> 
        <br> 
       <div class="container" style="width:1500px;">
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th>Agent Name</th>
					<th>Contact No</th>
                    <th>E-mail</th>
                    <th>Agent Zone</th>
                    <th>Gender</th>
                    
                </tr>
                <?php
                $data = file_get_contents("Data_agent.json");
                $data = json_decode($data, true);
                foreach ($data as $row) {
                    echo '<tr>
                               <td>' . $row["name"] . '</td>
							   <td>' . $row["phn"] . '</td>
                               <td>' . $row["email"] . '</td>
                               <td>' . $row["zone"] . '</td>
                               <td>' . $row["gender"] . '</td>
                               
                               </tr>';
                }
                ?>
        
            
            
      </div>
    </div>
</div>

</body>
</html>