<?php

$username="";

session_start();
if (!isset($_SESSION['korisnik'])) {
    header('Location: login.php');
    exit();
}

if (isset($_COOKIE["korisnik"])){
    $username=$_COOKIE["korisnik"];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Pretraga satova</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Teko:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top py-lg-0 px-lg-5">
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav p-lg-0">
                <a href="index.php" class="nav-item nav-link">Početna</a>
                <a href="dodaj.php" class="nav-item nav-link">Dodaj sat</a>
                <a href="izmeni.php" class="nav-item nav-link">Izmeni sat</a>
                <a href="obrisi.php" class="nav-item nav-link">Obrisi sat</a>
            </div>
        </div>  
        <label class="nav-item nav-link" style="color: white !important;"><?= $username;?></label>
    </nav>

    <div class="container-xxl py-5"><center>
        <div class="container" style="padding-top: 30px">
            <div class="row">
                <div class="col-md-12">
                    <label for="pol">Pol</label>
                    <select id="pol"  class="form-control">
                        
                    </select>
                </div>
                <div class="col-md-12">
                    <label for="sort">Sortiranje</label>
                    <select class="form-control" id="sort">
                        <option value="asc">Prvo najmanja cena</option>
                        <option value="desc">Prvo najveća cena</option>
                    </select>
                </div>
            </div>
                <div class="col-md-12" style="padding-top: 20px; padding-bottom: 50px">
                    <button class="BtnFormP" style="width: 20%;" onclick="pretrazi()">Pretrazi</button>
                </div>
            <div class="row g-4" id="satovi" ></div>
        </div></center>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    
    <script>

        function pocetnaPretraga() {
            let pol = "0";
            let sort = "asc";
            $.ajax({
                url: 'pretraziSatove.php',
                data: {
                    pol: pol,
                    sort: sort
                },
                success: function (data) {
                    $("#satovi").html(data);
                }
            });
        }
        pocetnaPretraga();



        function popuniPolove() {
            $.ajax({
                url: 'popuniPolove.php',
                success: function (data) {
                var p = '<option value="0">Sve</option>'+data;
                $("#pol").html(p);
                }
            });
            }
        popuniPolove();
    
        function pretrazi() {
            let pol = $("#pol").val();
            let sort = $("#sort").val();
            $.ajax({
                url: 'pretraziSatove.php',
                data: {
                    pol: pol,
                    sort: sort
                },
                success: function (data) {
                    $("#satovi").html(data);
                }
            });
        }
        

    </script>

</body>

</html>