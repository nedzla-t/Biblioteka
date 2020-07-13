<?php
	
	include('baza i conn/functions.php');
	
	$id = $_GET['id'];
	
	$sql_view = "SELECT * from users where id=$id";
	
	$rez_view = mysqli_query($db, $sql_view);

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
			<a href="index.php">Home</a>
		</div>
	</nav>
	
	<div class="container">
		<?php
			while($red = mysqli_fetch_assoc($rez_view)){
				echo '<p><b>Username:</b> '.$red['username'].'</p>';
				echo '<p><b>User type:</b> '.$red['user_type'].'</p>';
				echo '<p><b>Email: </b>'. $red['email'].'</p>';
			}
		?>
		<p>Back to <a href="adminn.php">Admin panel</a></p>
	</div>
</body>
</html>