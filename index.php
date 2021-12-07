<html>
	<head>
		<title>
			Student Management System
		</title>
	</head>
		<body>
			<h3 align="right" style="margin-right:20px"><a href="login.php">Admin Login </a></h3>
			<h1 align="center"> Welcome to Student Management System</h1>
			<form action="index.php" method="post">
			<table align="center" width="30%" border=1>
				<tr>
					<td colspan=2 align="center">Student Information</td>
				</tr>
				<tr>
					<td align="left">Choose Standard</td>
					<td><select name="standard" required> 
						<option value="1">1st </option>
						<option value="2">2nd </option>
						<option value="3">3rd </option>
						<option value="4">4th </option>
						<option value="5">5th </option>
						<option value="6">6th </option>
						<option value="7">7th </option>
						<option value="8">8th </option>
						<option value="9">9th </option>
						<option value="10">10th </option>
						<option value="11">11th </option>
						<option value="12">12th </option>
					</td>
					</select>
				</tr>
				<tr>
					<td align="left">Enter your Roll No. </td>
					<td><input type="text" name="rollno" value="" required></td>
				</tr>
				<tr>
					<td colspan="2" align="center"><input type="submit" name="submit" value="Show Info"></td>
				</tr>
			</table>
			</form>
		</body>
</html>

<?php
	
	include "connection.php";
	
	if(isset($_POST['submit']))
	{
		$rollno=$_POST['rollno'];
		$standard=$_POST['standard'];
		
		$query="SELECT * FROM STUDENT WHERE rollno='$rollno' AND standard='$standard'";
		$run=mysqli_query($conn,$query);
		$total=mysqli_num_rows($run);
		$data=mysqli_fetch_assoc($run);
		if($total<1)
		{
			echo "<script>
					alert('No record found');
				  </script>";
		}
		else
		{
			?>
				<table align="center" border=1 style="width:40%; margin-top:20px;">
					<tr>
						<td colspan=3>
							<h3 align="center">Student Details</h3>
						</td>
					</tr>
					<tr>
						<td rowspan=6>
							<img src="images/<?php echo $data['image'] ?>" height='150' width='120' style="padding:20px;">
						</td>
					</tr>
					<tr>
						<th>
							Roll No.<td><?php echo $data['rollno']; ?></td>
						</th>
					</tr>
					<tr>
						<th>
							Name<td><?php echo $data['name']; ?></td>
						</th>
					</tr>
					<tr>
						<th>
							Standard<td><?php echo $data['standard']; ?></td>
						</th>
					</tr>
					<tr>
						<th>
							City<td><?php echo $data['city']; ?></td>
						</th>
					</tr>
					<tr>
						<th>
							Parent's Contact No.<td><?php echo $data['pcont']; ?></td>
						</th>
					</tr>
				</table>
			
			<?php
		}
	}


?>