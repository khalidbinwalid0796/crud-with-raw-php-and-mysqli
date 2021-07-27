<?php 

	require('connection.php');

	$sname    ='';
	$email    ='';
	$mobile   ='';
	$password ='';
	$msg      ='';

	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){

		$sname=get_safe_value($con,$_POST['sname']);
		$email=get_safe_value($con,$_POST['email']);
		$mobile=get_safe_value($con,$_POST['mobile']);
		$password=get_safe_value($con,$_POST['password']);

	    if($sname == "" || $email == "" || $mobile == "" || $password == ""){
    		$msg = "Field must not be emplty !";
		}else{
			$sql="insert into studentd(sname, email, mobile, password) values('$sname','$email','$mobile','$password')";
			$stuinsert = mysqli_query($con,$sql);
			if($stuinsert) {
		        $msg = "students inserted successfully.";
		    } else{
		        $msg = "students not inserted.";           
		    }
		}
	}	

?>

<DOCTYPE html>
<html en="lang">
<meta charset="UTF-8/">
<head>
	<title>PHP Tutorial</title>
		<style>
			 body{font-family:"verdana";}
			.content{background:#ddd;width:800px;margin:0 auto; min-height:400px;}
			.header,.footer{background:#444 ;color:#fff; text-align:center;padding:10px;clear:both;}
			.header h2,.footer h2{margin:0;}
			.firstcontent{padding-top:30px;}
		</style>
</head>
<body>
	 <div class="content">
		<form action="" method="post">
		 <section class="header">
			<h2>Student Form</h2>
		 </section>
			<section class="firstcontent ">
				<table>
					<tr>
						<td>Student Name</td>
						<td><input type="text" name="sname"/></td>
					</tr>
					<tr>
						<td>Email  </td>
						<td><input type="text" name="email"/></td>
					</tr>
					<tr>
						<td>Mobile  </td>
						<td><input type="tel" name="mobile"/></td>
					</tr>
					<tr>
						<td>Password </td>
						<td><input type="password" name="password"/></td>
					</tr>
					<tr>
						<td><input type="submit" name="submit" value="submit"/></td>
					</tr>
				</table>
			</section>
			
		</form>
		<div class="field_error"><?php echo $msg?></div>
	</div>
</body>
</html>

<a href="index.php">Go Back</a>