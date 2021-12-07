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
	
	if(isset($_POST['submit']))
	{
		$rollno=$_POST['rollno'];
		$name=$_POST['name'];
		$city=$_POST['city'];
		$pcont=$_POST['pcont'];
		$std=$_POST['std'];
		$id=$_POST['sid'];
		$name=$_POST['name'];
		$simg=$_FILES['simg']['name'];
		$tmp_name=$_FILES['simg']['tmp_name'];
		move_uploaded_file($tmp_name,"../images/$simg");
		$query="UPDATE `student` SET `rollno` = '$rollno', `name` = '$name', `city` = '$city', `pcont` = '$pcont', `standard` = '$std', image='$simg' WHERE `id` = $id;";
		$run=mysqli_query($conn,$query);
		if($run==true)
		{
			?>
				<script>
					alert("Data updated successfully");
					window.open('updateform.php?sid=<?php echo $id; ?>', '_self');
				</script>
			<?php
		}
		else
		{
			echo "<script>alert('Data not updated')</script>";
		}
	}


?>