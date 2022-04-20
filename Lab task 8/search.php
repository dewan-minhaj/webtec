<?php

// Create connection
$conn = mysqli_connect("localhost", "root", "", "data1_db");
$sql = "SELECT * FROM users WHERE Agentname LIKE '%".$_POST['name']."%'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0){
	while ($row=mysqli_fetch_assoc($result)) {
		echo "	<tr>
		          <td>".$row['Agentname']."</td>
		          <td>".$row['Contactno']."</td>
		          <td>".$row['Email']."</td>
		          <td>".$row['Agentzone']."</td>
                  <td>".$row['Gender']."</td>
		        </tr>";
	}
}
else{
	echo "<tr><td>0 result's found</td></tr>";
}

?>