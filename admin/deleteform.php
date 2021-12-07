<?php
		include('../connection.php');

		$id=$_GET['sid'];
		$query="DELETE FROM STUDENT WHERE ID='$id'";
		$run=mysqli_query($conn,$query);
		if($run==true)
		{
			?>
				<script>
					alert("Data deleted successfully");
					window.open('deletestudent.php?sid=<?php echo $id; ?>', '_self');
				</script>
			<?php
		}
		else
		{
			echo "<script>alert('Data not deleted')</script>";
		}
	


?>