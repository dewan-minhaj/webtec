<?php

$emptyname=$emptypriice="";

if(isset($_POST['submit']))
{
    if(empty($_POST['name'])) {
        $emptyusername = "Please Fill up the Name!";
  }
 
 else if(empty($_POST['sellrent'])) {                    
    $emptyemail = "Please Fill up the sell or rent!";
     
 }
 else if(empty($_POST['type']))
 {
     $emptysurname="Please Fill up the type";
 }
 else if(empty($_POST['price']))
 {
     $emptysurname="Please Fill up the price";
 }
 else{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "data1_db";
    
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
     
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "INSERT INTO postlist (Ownername, Sellorrent, Typeofproperty, Price, Propertyaddress,Propertyzone, Suqarefeet, Contactno, Niid , Picturelink)
      VALUES (:name,:sellrent,:type, :price,:address, :zone,:sfeet,:phone, :nid, :piicture)";
       $stmt = $conn->prepare($sql);
      $stmt->execute([
          ':name'=>$_POST['name'],
          ':sellrent'=>$_POST['sellrent'],
          ':type'=>$_POST['type'],
          ':price'=>$_POST['price'],
          ':address'=>$_POST['address'],
          ':zone'=>$_POST['zone'],
          ':sfeet'=>$_POST['sfeet'],
          ':phone'=>$_POST['phone'],
          ':nid'=>$_POST['nid'],
          ':piicture'=>$_POST['piicture']
      ]);
      echo "New record created successfully";
    } catch(PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }
    
    $conn = null;
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
             <div class="header">POST FOR SELL OR RENT
            </div>  

             <div class="info">
                         <div class="main">
                                  <div class="container" style="width:500px;">
                                       <form action="" method="POST">
	
	        
                                       <legend>
                                            <h3> Post List</h3>

                                        </legend>
                                            </br>
                                                   <label>Owner Name</label>
                                                          <input type="text" name="name" class="form-control" value="" />

            
			
			                                </br>
                                                     <label>Property for Sell or Rent</label>
                                                         <input type="text" name="sellrent" class="form-control" value="" />

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
                                                          <input type="text" name="address" class="form-control" placeholder="Enter address here..">

                                             <br>

                                                     <label>Property Zone</label>
                                                         <select id="type" name="zone"class="form-control" value="" >
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
                                                         <input type="text" name="sfeet" class="form-control" value="000sq.ft">
                                             <br>

                                                     <label>Contact No</label>
                                                         <input type="text" name="phone" class="form-control" value="+880">
                                             <br>

                                                     <label>NID</label>
                                                         <input type="text" name="nid" class="form-control" value="">
                                             <br>

                                                     <label>Picture Link</label>
                                                         <input type="text" name="piicture" class="form-control" placeholder="drive link only">
                                             <br>
            
	
        
                                                         <input type="submit" name="submit" value="Post" class="btn btn-info" /><br />
                                                              <?php
                                                                 if (isset($message)) {
                                                                     echo $message;
                                                                    }
                                                             ?>
	                   </div>
                 </div>










































            </div>
       </div>
</div>

</body>
</html>