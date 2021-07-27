<?php

		
	require('connection.php');
	$msg      ='';
	//edit the selected student

    if(!isset($_GET['id']) || $_GET['id'] == NULL){
        echo "<script>window.location = 'index.php';</script>";
        //header("Refresh: 1; url=index.php");	
        //Refresh: 1-->specific page refresh korar jonno
		//Refresh: 0-->current page refresh korar jonno
		//header('location:index.php');
    }else{
        $id = $_GET['id'];
    }

    //updated the selected student    

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){

		$sname=get_safe_value($con,$_POST['sname']);
		$email=get_safe_value($con,$_POST['email']);
		$mobile=get_safe_value($con,$_POST['mobile']);
		$password=get_safe_value($con,$_POST['password']);

	    if($sname == "" || $email == "" || $mobile == "" || $password == ""){
    		$msg = "Field must not be emplty !";
		}else{
			$sql= "update studentd set sname = '$sname', email = '$email',mobile = '$mobile',
				   password = '$password' where s_id = $id";
			$stuupdate = mysqli_query($con,$sql);
			if($stuupdate) {
		        $msg = "students updated successfully.";
		    } else{
		        $msg = "students not updated.";           
		    }
		}
	}

	
	$sql    = "select * from studentd where s_id = $id";
	$result = mysqli_query($con, $sql);

	if(mysqli_num_rows($result)==1){
		
		$row = mysqli_fetch_assoc($result);
		$s_id      =$row['s_id'];
		$sname     =$row['sname'];
		$email     =$row['email'];
		$mobile    =$row['mobile'];
		$password  =$row['password'];
		
		
		echo "<form action='' method='post'>
		 <section class='header'>
			<h2>Student Form</h2>
		 </section>
			<section class='firstcontent'>
				<table>
					<tr>
						<td>Student Name</td>
						<td><input type='text' name='sname' value='$sname'/></td>
					</tr>
					<tr>
						<td>Email  </td>
						<td><input type='text' name='email' value='$email'/></td>
					</tr>
					<tr>
						<td>Mobile  </td>
						<td><input type='number' name='mobile' value='$mobile'/></td>
					</tr>
					<tr>
						<td>Password </td>
						<td><input type='password' name='password' value='$password'/></td>
					</tr>
					<tr>
						<td><input type='submit' name='submit' value='update'/></td>
					</tr>
				</table>
			</section>
			
		</form>";		
		
	}
	
?>
<a href="index.php">Go Back</a>