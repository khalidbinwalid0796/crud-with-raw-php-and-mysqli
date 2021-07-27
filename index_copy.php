<?php
	
    require('connection.php');
	
	$sql    = "SELECT * FROM studentd";
	$result = mysqli_query($con, $sql);
	$count  =mysqli_num_rows($result);
	echo"$count<br>";
		
	echo "
	<h2 align='center'>Student Biography</h2>
	<table  border='1' align='center'>
		<tr>
			<th>S_id</th>
			<th>S_name</th>
			<th>Email</th>
			<th>Mobile</th>
			<th>Password</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>";	
	if($count>0){
	while($row = mysqli_fetch_assoc($result)){
		
		$s_id      =$row['s_id'];
		$sname     =$row['sname'];
		$email     =$row['email'];
		$mobile    =$row['mobile'];
		$password  =$row['password'];

		echo "<tr>
				<td>$s_id</td>
				<td>$sname </td> 
				<td>$email</td> 
				<td>$mobile</td>
				<td>$password</td> 
				<td><a href='student_update.php?id=$s_id'>Edit</a></td>
				<td><a href='student_delete.php?id=$s_id'>Delete</a></td>
		     </tr>";
	}
	
	echo "</table>";
	
	}
	else{
		
		echo"No result found";
	}
	
?>
