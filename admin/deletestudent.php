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
<form action="deletestudent.php" method="post">
	<table align="center">
		<tr>
			<td>
				Enter Standard <td><input type="text" name="standard" placeholder="Enter Standard" required></td>
			</td>
		
			<td>
				Enter Name <td><input type="text" name="name" placeholder="Enter Name" required></td>
			</td>
		
			<td colspan='2'>
				<input type="submit" name="submit" value="Search"></td>
			</td>
		</tr>
	</table>
		<table align="center" width="80%" border=1 style="margin-top:10px; text-align:center;">
			<tr style="background-color:#000; color:#fff;">
				<th>No. </th>
				<th>Image </th>
				<th>Name </th>
				<th>Roll No. </th>
				<th>Delete </th>
			</tr>
		

</form>
<?php
	if(isset($_POST['submit']))
	{
		$standard=$_POST['standard'];
		$name=$_POST['name'];
		
		$query="SELECT * FROM student WHERE standard='$standard' AND name like'%$name%'";
		$run=mysqli_query($conn,$query);
				
		if(mysqli_num_rows($run)<1)
		{
			echo "<script>alert('No record found'); </script>";
		}
		else
		{
			$count=0;
				while($data=mysqli_fetch_assoc($run))
				{
					$count++;
					?>
						
						<tr>
						<td><?php echo $count; ?></td>
						<td> <img src ="../images/<?php echo $data['image']; ?>" height="100" width="100"></td>
						<td><?php echo $data['name']; ?></td>
						<td><?php echo $data['rollno']; ?></td>
						
						<td> <a href="deleteform.php?sid=<?php echo $data['id']; ?>">Delete</a></td>
						</tr>
						
					<?php
				}
		}
	}
	


?>