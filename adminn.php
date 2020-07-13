<?php
  include 'baza i conn/init.php';    
  if(isset($_GET['filter'])){
    $ciklus_studija = $_GET['filter'];
    $sql = "SELECT * FROM knjige WHERE ciklus_studija=$ciklus_studija";    
    $result = mysqli_query($db, $sql);  
  }else{
    $sql = "SELECT * FROM knjige";
    $result = mysqli_query($db, $sql);
  }
  
?>
<?php 
  include('baza i conn/functions.php');

  if (!isAdmin()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }

?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/admin.css">
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<meta name="description" content="" />
<meta name="author" content="" />

<title>Biblioteka</title>
</head>
<body>
  <nav>
    <div class="logout">
      <a href="index.php">Home</a>
    </div>
  </nav>
  <div class="container">
    <h3>Welcome <?php echo ucfirst($_SESSION['username']); ?></h3>
    <br>
    <h2>Pregled knjiga</h2>
    <div class="left">
      <a class="addbutton" href="admin.php">Nova knjiga</a>
    </div>
    <div class="right">
      <form action="" method="get">
        <input type="submit" name="filter" class="addbutton" value="Filter">
        <select name="filter">
          <option value="1">Prvi</option>
          <option value="2">Drugi</option>
        </select>
      </form>
    </div>
    <table>
      <tr>
        <th>Naslov</th>
        <th>Autor</th>
        <th>Ciklus studija</th>
        <th style="width: 178px;">Action</th>
      </tr>
      <?php while($row = mysqli_fetch_assoc($result)){ ?>
      <tr>
        <td><?php echo $row["naslov"]; ?></td>
        <td><?php echo $row["autor"]; ?></td>
        <td><?php echo ($row["ciklus_studija"] == 1) ? 'Prvi' : (($row["ciklus_studija"] == 2) ? 'Drugi' : 'Other'); ?></td>
        <td>
          <a class="editbutton" href="edit_post.php?id=<?php echo $row['id']; ?>">Edit</a>
          <a class="viewbutton" href="view_post.php?id=<?php echo $row['id']; ?>">View</a>
          <a class="deletebutton" href="delete_post.php?id=<?php echo $row['id']; ?>">Delete</a>
        </td>
      </tr>
      <?php } ?>
    </table>
  </div>
  <br><br>
  <div class="container">
    <h2>Pregled korisnika</h3>
      <div class="content">
    <!-- notification message -->
    <?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
        <h3>
          <?php 
            echo $_SESSION['success']; 
            unset($_SESSION['success']);
          ?>
        </h3>
      </div>
    <?php endif ?>

      <div>
        <?php  if (isset($_SESSION['user'])) : ?>
          <strong><?php echo $_SESSION['user']['username']; ?></strong>

          <small>
            <i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
            <br>
            <a href="home.php?logout='1'" style="color: red;">logout</a>
          </small>

        <?php endif ?>
      </div>
    </div>
    <div class="left">
      <a class="addbutton" href="create_user.php">+ add user</a>
    </div>
    <br>
    <div class="right">
    </div>
    <table>
      <tr>
        <th>ID</th>
        <th>Username</th>
        <th style="width: 178px;">Action</th>
      </tr>
      <?php
      $sql_users = "SELECT * FROM users";
      
      $rez_users = mysqli_query($db, $sql_users);
      
      while($red = mysqli_fetch_assoc($rez_users)){
        echo '<tr>';
          echo '<td style="text-align:center;">' . $red['id'] . '</td>';
          echo '<td>' . $red['username'] . '</td>';
          echo '<td width="178" text-align="center"><a class="deletebutton" href="delete_user.php?id='.$red['id'].'">Delete</a> <a class="viewbutton" href="view_users.php?id='.$red['id'].'">View</a></td>';
        echo '</tr>';
      }
    
    ?>
    </table>
    <p><?= $search_rs['username']; ?></p>
  </div>
  <br>
  <div class="container">
    <h2>Pregled rezervacija</h3>
  <div class="right">
    </div>
    <table>
      <tr>
        <th>ID</th>
        <th>ID User</th>
        <th>Knjiga</th>
        <th>Datum</th>
        <th style="width: 178px;">Action</th>
      </tr>
      <?php
      $sql_rez = "SELECT * FROM rezervacije";
      
      $rez = mysqli_query($db, $sql_rez);
      
      while($red = mysqli_fetch_assoc($rez)){
        echo '<tr>';
          echo '<td style="text-align:center;">' . $red['rezervacije'] . '</td>';
          echo '<td style="text-align:center;">' . $red['id_users'] . '</td>';
          echo '<td>' . $red['naslov'] . '</td>';
          echo '<td>' . $red['datum'] . '</td>';
          echo '<td width="178" text-align="center"><a class="deletebutton" href="delete_rez.php?id_rezervacije='.$red['id_rezervacije'].'">Delete</a> <a class="viewbutton" href="view_rez.php?id_rezervacije='.$red['id_rezervacije'].'">View</a></td>';
        echo '</tr>';
      }
    
    ?>
    </table>
  </div>
  </div>
</div><br>
<div>
  <a align: right; href="adminn.php"><img src="images/top.jpg" alt="On top" width="50" height="50" style="float:right; padding:60px" /></a>
</div>

</body>
</html>