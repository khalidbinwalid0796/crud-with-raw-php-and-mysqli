<?php

	require('connection.php');
	
	if(isset($_GET['delid'])){
    	$id = $_GET['delid'];
	    $delete_sql="delete from studentd where s_id='$id'";
	    mysqli_query($con,$delete_sql);
    }

    $sql = "select * from studentd";
	$res=mysqli_query($con,$sql);
	$count = mysqli_num_rows($res);

?>

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
		</tr>

		<?php
			if($count>0){
				while($row = mysqli_fetch_assoc($res)){
		?>	
		<tr>		
			<td><?php echo $row['s_id'] ?></td>
			<td><?php echo $row['sname'] ?></td> 
			<td><?php echo $row['email'] ?>l</td> 
			<td><?php echo $row['mobile'] ?></td>
			<td><?php echo $row['password'] ?></td>
			<?php 
				echo "<td><a href='edit.php?id=".$row['s_id']."'>Edit</a></td>";
				echo "<td><a href='?delid=".$row['s_id']."'>Delete</a></td>";
			?>
			
		</tr>	 	
		<?php		
				}
			}else{
				echo "No record Found";
			}
		?>

	</table>
	<a href="create.php">Create</a>