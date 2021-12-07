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

?>
<form action="addstudent.php" method="post" enctype="multipart/form-data">
	<table align="center" border="1"style="width:60%; margin-top:40px;" >
		
		<tr>
			<th>Roll No.</th>
			<td><input type="text" name="rollno" placeholder="Enter Roll No" required ></td>
		</tr>
		<tr>
			<th>Full Name</th>
			<td><input type="text" name="name" placeholder="Enter your name" required ></td>
		</tr>
		<tr>
			<th>City</th>
			<td><input type="text" name="city" placeholder="Enter City" required ></td>
		</tr>
		<tr>
			<th>Parent's Contact No.</th>
			<td><input type="text" name="pcont" placeholder="Enter Parent Contact No" required  ></td>
		</tr>
		<tr>
			<th>Standard </th>
			<td><input type="number" name="std" placeholder="Standard" required ></td>
		</tr>
		<tr>
			<th>Image </th>
			<td><input type="file" name="simg" required ></td>
		</tr>
		<tr>
			
			<td colspan="2" align="center"><input type="submit" name="submit" value="Submit" ></td>
		</tr>
		
	</table>

</form>

</body>
</html>

<?php
	if(isset($_POST['submit']))
	{
		$rollno=$_POST['rollno'];
		$name=$_POST['name'];
		$city=$_POST['city'];
		$pcont=$_POST['pcont'];
		$std=$_POST['std'];
		$name=$_POST['name'];
		$simg=$_FILES['simg']['name'];
		$tmp_name=$_FILES['simg']['tmp_name'];
		move_uploaded_file($tmp_name,"../images/$simg");
		$query="INSERT INTO student VALUES('','$rollno','$name','$city','$pcont','$std','$simg')";
		$run=mysqli_query($conn,$query);
		if($run)
		{
			echo "Data inserted successfully";
		}
		else
		{
			echo "Data not inserted";
		}
	}


?>