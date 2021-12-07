<?php
	include('connection.php');
	session_start();
?>
<html>
	<head>
		<title>
			Admin Login
		</title>
	</head>
		<body>
			<h1 align="center">Admin Login</h1>
			<form action="login.php" method="post">
				<table align="center">
					<tr>
						<td>Username </td>
						<td><input type="text" name="uname" required></td>
					</tr>
					<tr>
						<td>Password </td>
						<td><input type="password" name="password" required></td>
					</tr>
					<tr>
						
						<td colspan=2 align="center"><input type="submit" name="submit" value="Login"></td>
					</tr>
				</table>
			</form>
		</body>
</html>
<?php
	if(isset($_POST['submit']))
	{
		$uname=$_POST['uname'];
		$password=$_POST['password'];
		$query="SELECT * FROM admin WHERE Username='$uname' AND Password='$password'";
		$run=mysqli_query($conn,$query);
		$result=mysqli_fetch_assoc($run);
		$data=mysqli_num_rows($run);
		
		if($data==1)
		{
			$_SESSION['uname']=$uname;
			$id=$result['id'];
			$_SESSION['uid']=$id;			
			header('location:admin/admindash.php');
		}
		else
		{
			echo '<script> 
					alert("Userame or  Password mismatch");
				</script>';
		}
	}
?>