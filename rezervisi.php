<?php
  $succes_msg = $error_msg = '';
  include 'baza i conn/init.php';

  if (isset($_POST['add'])) {
       $id_users = $_POST['id_users'];
       $naslov = $_POST['naslov'];
       $datum = $_POST['datum'];
      
      $sql = "INSERT INTO rezervacije(naslov, datum, id_users) VALUES('$naslov', '$datum', '$id_users')";

      $rez = mysqli_query($db, $sql);
      $naslov_provjeri= "select count(*) from rezervacije where naslov='".$naslov."' ";
      $provjeri=mysqli_query($db,$naslov_provjeri);
      $naslov_prebroj=mysqli_fetch_array($provjeri,MYSQLI_NUM);
       $prebroj=$naslov_prebroj[0];

     if(!$rez or $prebroj > 5 ){ die("Upis u bazu nije uspio. Sve su knjige rezervisane." . mysqli_error($db)); }else{ echo "<p style='color:green; margin-top:10px;'>Uspješna rezervacija</p>"; }
  }

?>
<!DOCTYPE html>
<html lang="en" class="no-js" >
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<meta name="description" content="" />
<meta name="author" content="" />

<title>Biblioteka</title>
<link href="assets/css/bootstrap.css" rel="stylesheet" />
<link href="assets/css/ionicons.css" rel="stylesheet" />
<link href="assets/css/font-awesome.css" rel="stylesheet" />
<link href="assets/js/source/jquery.fancybox.css" rel="stylesheet" />
<link href="assets/css/animations.min.css" rel="stylesheet" />
<link href="assets/css/style-solid-black.css" rel="stylesheet" />
</head>
<body style="background-color:#081d47" data-spy="scroll" data-target="#menu-section">
<?php

    include("meni.php");
 ?>
 <style>
.parallax { 
  /* The image used */
  background-image: url("assets/img/biblioteka.jpg");

  /* Full height */
  height: 200px; 

  /* Create the parallax scrolling effect */
  background-attachment: fixed;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
} 
.btn-custom-one {
    border-radius: 50%;
}
</style>
<div class="parallax"></div>

<!-- Glavna sekcija -->
<section>
  <div class="container">
    <div class="row text-center header">
      <h3>Rezervacija</h3>
      <div class="col-xs-12 col-sm-12 cocl-md-12 col-lg-12">
      <div class="services-wrapper">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
          <?php= $succes_msg; ?>
          <?php= $error_msg; ?>
            <div class="form-group">
                <input name="id_rezervacije" type="hidden" value="<?php if(isset($_SESSION['id_rezervacije'])){ echo $_SESSION['id_rezervacije']; } ?>"  />
                <label class="cols-sm-2 control-label">Naslov</label>
                <div class="cols-sm-10">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                    <input type="text"  class="form-control" name="naslov" placeholder="Naslov knjige" value="<?php if(isset($_POST['naslov'])){ echo $_POST['naslov']; }?>" />
                  </div>
                </div>
            </div>
            <div class="form-group">
              <label class="cols-sm-2 control-label">Datum</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                  <input type="date"  class="form-control" name="datum" value="<?php if(isset($_POST['datum'])){ echo $_POST['datum']; }?>" />
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="cols-sm-2 control-label">Vaš ID</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                  <input type="number"  class="form-control" name="id_users" value="<?php if(isset($_SESSION['id_users'])){ echo $_SESSION['id_users']; } ?>" />
                </div>
              </div>
            </div>
            <div class="form-group>">
                <input type="submit" name="add" class="btn btn-danger btn*lg" value="Rezervisi">
            </div>
        </form>
    </div>
  </div>
</div>
</div>
</section>  
<?php
    include("footer.php");

 ?>


<script src="assets/js/jquery-1.11.1.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/vegas/jquery.vegas.min.js"></script>
<script src="assets/js/jquery.easing.min.js"></script>
<script src="assets/js/source/jquery.fancybox.js"></script>
<script src="assets/js/jquery.isotope.js"></script>
<script src="assets/js/appear.min.js"></script>
<script src="assets/js/animations.min.js"></script>
<script src="assets/js/custom-solid.js"></script>
</body>
</html>