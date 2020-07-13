<?php

		include 'baza i conn/init.php';

		$id_rezervacije = $_GET['id_rezervacije'];

		$result = mysqli_query($db, "DELETE FROM rezervacije WHERE id_rezervacije=$id_rezervacije");

		header("Location: adminn.php");
	
?>
?>