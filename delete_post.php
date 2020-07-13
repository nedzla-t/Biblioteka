<?php

		include 'baza i conn/init.php';

		$id = $_GET['id'];

		$result = mysqli_query($db, "DELETE FROM knjige WHERE id=$id");

		header("Location: adminn.php");
	
?>