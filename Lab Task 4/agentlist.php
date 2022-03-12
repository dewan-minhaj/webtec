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
				<h4><a href="welcome.php"><h4>Dash bord</a> |
				<a href="logout.php">Log Out</h4></a>
            </table>
        </div>
    </div>
</body>

</html>