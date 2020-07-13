<!doctype html>
<?php
	// including the database connection file
	include('baza i conn/functions.php');
		
	if(isset($_GET['update'])){
		
		$id = $_GET['id'];
		
		$username = $_GET['username'];
		$email = $_GET['email'];
		$user_type = $_GET['user_type'];
				
		$rez = mysqli_query($db, "UPDATE users SET username='$username', email='$email', user_type='$user_type' WHERE id=$id");
		
		if($rez == TRUE){
			echo "Record updated successfully";
		}else{
			echo "Error updating record: ";
		}
		header("Location:home.php");
	}
	
?>

<?php
	//getting id from url
	$id = $_GET['id'];
 
	//selecting data associated with this particular id
	$result = mysqli_query($db, "SELECT * FROM users WHERE id=$id");
 
	while($red = mysqli_fetch_array($result)){
		$username = $red['username'];
		$email = $red['email'];
		$user_type = $red['user_type'];
		//$password = $red['password'];
	}
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>Ureðivanje user account-a</title>
	</head>
	
	<body>
		<form action="edit_users.php" method="get">
			<table>
				<tr>
					<td>Username:</td>
					<td><input type="text" name="username" value="<?php echo $username; ?>"></td>
				</tr>
				<tr>
					<td>Email:</td>
					<td><input type="text" name="email" value="<?php echo $email; ?>"></td>
				</tr>
				<tr>
					<td>Kategorija:</td>
					<td><input type="text" name="user_type" value="<?php echo $user_type; ?>"></td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
						<input type="submit" name="update" value="Update" />
					</td>
				</tr>
			</table>
		</form>
		
	</body>
</html>