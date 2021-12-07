<?php

	include('header.php');
	include('titlehead.php');
	include('../connection.php');
	
	session_start();

	if(isset($_SESSION['uid']))
	{
		echo "";
	}
	else
	{
		header('location: ../login.php');
	}
		$sid=$_GET['sid'];
		$query="SELECT * FROM student WHERE ID='$sid'";
		$run=mysqli_query($conn,$query);
		$data=mysqli_fetch_assoc($run);
		

?>
<form action="updatedata.php" method="post" enctype="multipart/form-data">
	<table align="center" border="1"style="width:60%; margin-top:40px;" >
		
		<tr>
			<th>Roll No.</th>
			<td><input type="text" name="rollno" value=<?php echo $data['rollno'] ?> required></td>
		</tr>
		<tr>
			<th>Full Name</th>
			<td><input type="text" name="name" value=<?php echo $data['name'] ?> required></td>
		</tr>
		<tr>
			<th>City</th>
			<td><input type="text" name="city" value=<?php echo $data['city'] ?> required></td>
		</tr>
		<tr>
			<th>Parent's Contact No.</th>
			<td><input type="text" name="pcont" value="<?php echo $data['pcont'] ?>" required></td>
		</tr>
		<tr>
			<th>Standard </th>
			<td><input type="number" name="std" value="<?php echo $data['standard'] ?>" required ></td>
		</tr>
		<tr>
			<th>Image </th>
			<td><input type="file" name="simg" required ><img src ="../images/<?php echo $data['image']; ?>" height="100" width="100"> </td>
		</tr>
		<tr>
			
			<td colspan="2" align="center"><input type="submit" name="submit" value="Submit" ></td>
			<td><input type="hidden" name="sid" value=<?php echo $data['id'] ?> ></td>
		</tr>
		
	</table>

</form>
</body>
</html>