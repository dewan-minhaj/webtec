

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Real eState</title>
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
        <div class="header">MJ REAL eSTATE 
         
              <?php
                     session_start();
                     echo "Welcome to the Dashboard ".$_SESSION['USERNAME'];
             ?>
        </div>  
        <div class="info">
            <div class="main">

                <!--cards -->
               
               <div class="card"> 
                <div class="image">
                    <img src="R.jfif">
                 </div>  
               <div class="title">
                <h1>Create a Post</h1>
               </div>
               <div class="des">
                <p>Sell/Rent Your Property</p>
                <a href="sellpost.php" ><button class="ctn">Post Now</button></a>
               </div>
               </div>


               <div class="card"> 
                <div class="image">
                    <img src="P.jpg">
                 </div>  
               <div class="title">
                <h1>View Post</h1>
               </div>
               <div class="des">
                <p>View Sell Post</p>
                <a href="viewpost.php" ><button class="ctn">View Now</button></a>
               </div>
               </div>
        
              
        
            
            </div>
      </div>
    </div>
</div>

</body>
</html>