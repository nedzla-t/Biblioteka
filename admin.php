<?php
// Dodavanje knjige

    $error_msg = '';
    $success_msg = '';
    
    include('baza i conn/init.php');
    
    if(isset($_GET['add'])){
        $naslov = $_GET['naslov'];
        $autor = $_GET['autor'];
        $opis = addslashes ($_GET['opis']);
        $ciklus_studija = $_GET['ciklus_studija'];
        
        if(empty($naslov = $_GET['naslov']) || empty($autor = $_GET['autor']) || empty($opis = addslashes ($_GET['opis']) || empty($ciklus_studija = $_GET['ciklus_studija']))){
            
            $error_msg = "Input polja su obavezna, molimo da popunite ista.";
        
        }else{
            
            $sql_add = mysqli_query($db, "INSERT INTO knjige(naslov, autor, opis, ciklus_studija) VALUES ('$naslov', '$autor', '$opis', '$ciklus_studija') ");
            
            $success_msg = "Knjiga uspjesno dodana.";
        }
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
<link href="assets/css/jquery-ui.css" rel="stylesheet" />
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
  height: 300px; 

  /* Create the parallax scrolling effect */
  background-attachment: fixed;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
} 
.btn-custom-one {
    border-radius: 50%;
}

#map {
    width: 100%;
    height: 400px;
}

</style>
<div class="parallax"></div>
 
 <!-- Glavna sekcija -->
<section>
    <div class="container">
        <div class="row text-center header">
            <hr />
            <p><?= $success_msg; ?></p>
            <p><?= $error_msg; ?></p>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h3>Dodavanje nove knjige</h3>
                <div class="service-wrapper">
                    <form method="get" action="">
                        <div class="form-group">
                            <label for="naslov" class="cols-sm-2 control-label">Naslov knjige</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-home fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="naslov" id="naslov" placeholder="Naslov knjige">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="naslov" class="cols-sm-2 control-label">Autor</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-home fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="autor" id="autor" placeholder="Autor knjige">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="naslov" class="cols-sm-2 control-label">Opis</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-home fa" aria-hidden="true"></i></span>
                                    <textarea class="form-control" type="text" name="opis" rows="5" cols="60"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="naslov" class="cols-sm-2 control-label">Ciklus studija</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-home fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="ciklus_studija" id="ciklus_studija" placeholder="Ciklus studija">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <input type="submit" class="btn btn-danger btn-lg " name="add" value="Dodaj knjigu">
                        </div>
                    </form>
                    <hr /> 
                    <p>Back to <a href="adminn.php">Admin panel</a></p>   
                </div>
            </div>
        </div>
    </div>
</section>