<?php
	$msg = $msg_error = '';
	include_once 'baza i conn/init.php';
		
		$id = $_GET['id'];
		$sql = "SELECT * FROM knjige WHERE id=$id";
		$rez = mysqli_query($db, $sql);
		$row = mysqli_fetch_assoc($rez);

		if (isset($_POST['update'])) {
			
			$naslov = $_POST['naslov'];
			$autor = $_POST['autor'];
			$opis = $_POST['opis'];
			$ciklus_studija = $_POST['ciklus_studija'];

			if(!empty($naslov) && !empty($autor) && !empty($ciklus_studija)){
				
				$sql = "UPDATE knjige SET naslov='$naslov', autor='$autor', opis='$opis' , ciklus_studija='$ciklus_studija' WHERE id=$id";
				$result = mysqli_query($db, $sql);
				if ($result) {
					
					$msg = 'Post successfully updated.';
					$sql = "SELECT * FROM knjige WHERE id=$id";
					$rez = mysqli_query($db, $sql);
					$row = mysqli_fetch_assoc($rez);
				}
				
			}else{
				
				$msg_error = "All fields are required!";
				
			}
		}

?>
<!DOCTYPE html>
<html>
<head>
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
		<h2>Edit post</h2>
		<hr>
        <form action="" method="POST">
        	<p class="add-success"><?php echo $msg; ?></p>
        	<p class="post-error"><?php echo $msg_error; ?></p>
            <div class="form-group">
                <label class="label-post">Naslov</label><input type="text" name="naslov" value="<?php echo $row['naslov']; ?>"/>
            </div>
            <div class="form-group">
            	<label class="label-post">Autor</label><input type="text" name="autor" value="<?php echo $row['autor']; ?>"/>
            </div>
            <div class="form-group">
            	<label class="label-post">Opis</label><input type="text" name="opis" value="<?php echo $row['opis']; ?>" />
            </div>
            <div class="form-group">
                <label class="label-post">Ciklus studija</label><select name="ciklus_studija">
					<option value="1" <?php echo ($row['ciklus_studija'] == 1) ? 'selected' : ''; ?>>Prvi</option>
					<option value="2" <?php echo ($row['ciklus_studija'] == 2) ? 'selected' : ''; ?>>Drugi</option>
				</select>
            </div>
            <div class="form-group>">
                <input type="submit" name="update" class="login-button add-post" value="Update post">
            </div>
            <p>Back to <a href="adminn.php" >Admin panel</a></p>
        </form>
    </div>
</body>
</html>