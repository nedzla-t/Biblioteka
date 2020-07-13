<?php
	include 'baza i conn/init.php';

	$id = $_GET['id'];
	$sql = "SELECT * FROM knjige WHERE id=$id";
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
				echo '<h1>'.$red['naslov'].'</h1>';
				echo '<h3>'.$red['autor'].'</h3>';
				echo '<p><b>Opis: </b>'. $red['opis'].'</p>';
				echo '<p><b>Ciklus studija: </b>'.$red['ciklus_studija'].'</p>';
			}
		?>
		<p>Back to <a href="adminn.php">Admin panel</a></p>
	</div>
</body>
</html>