<?php
	include 'baza i conn/init.php';

	$id_rezervacije = $_GET['id_rezervacije'];
	$sql = "SELECT * FROM rezervacije WHERE id_rezervacije=$id_rezervacije";
	$res = mysqli_query($db, $sql);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Biblioteka</title>
	<link rel="stylesheet" type="text/css" href="css/admin.css">
</head>
<body>
	<nav>
		<div class="logout">
			<a href="home.php">Home</a>
		</div>
	</nav>
	
	<div class="container">
		<?php
			while($red = mysqli_fetch_assoc($res)){
				echo '<p><b>ID korisnika:</b> '.$red['id_users'].'</p>';
				echo '<p><b> Naslov:</b> '.$red['naslov'].'</h3>';
				echo '<p><b>Datum rezervacije: </b>'. $red['datum'].'</p>';
			}
		?>
		<p>Back to <a href="adminn.php">Admin panel</a></p>
	</div>
</body>
</html>