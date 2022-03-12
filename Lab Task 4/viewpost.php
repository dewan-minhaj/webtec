<!DOCTYPE html>
<html>

<head>
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
</head>

<body>
    <div class="container" style="width:2400px;">
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th>Owner Name</th>
					<th>Property for Sell or Rent</th>
                    <th>Type of Property:</th>
                    <th>Price</th>
                    <th>Property Address</th>
                    <th>Property Description</th>
					<th>Square Feet</th>
					<th>Contact No</th>
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
                               <td>' . $row["ds"] . '</td>
							   <td>' . $row["sf"] . '</td>
							   <td>' . $row["phn"] . '</td>
							   <td>' . $row["pl"] . '</td>
                               </tr>';
                }
                ?>
				<h4><a href="welcome.php"><h4>Dash bord</a> |
				<a href="logout.php">Log Out</h4></a>
				
            </table>
        </div>
		<a href="sellpost.php" class= "btn btn-primary">ADD</a>
    </div>
</body>

</html>