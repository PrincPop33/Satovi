<?php
require "konekcija.php";
include "models/sat.php";

if(isset($_POST['azuriraj'])){
    $sat = trim($_POST['sat']);
    $cena = trim($_POST['cena']);

    if(Sat::azuriraj($sat, $cena, $konekcija)){
        echo '<script type="text/javascript">
        window.onload = function () { alert("Sat iz baze je izmenjen!"); } 
        </script>'; 
    }else{
        echo '<script type="text/javascript">
        window.onload = function () { alert("Došlo je do greške!"); } 
        </script>'; 
    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Izmeni sat</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Teko:wght@400;500;600&display=swap" rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
   
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top py-lg-0 px-lg-5">
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav p-lg-0">
                <a href="index.php" class="nav-item nav-link">Početna</a>
                <a href="dodaj.php" class="nav-item nav-link">Dodaj sat</a>
                <a href="izmeni.php" class="nav-item nav-link">Izmeni sat</a>
                <a href="obrisi.php" class="nav-item nav-link">Obrisi sat</a>
            </div>
        </div>  
    </nav>

    <div class="container-xxl py-5">
        <div class="container">
            <div class="row">
                <form method="post" action="" id="forma" style="margin-top: 50px">
                    <label for="sat">Odaberi model</label>
                    <select id="sat" name="sat" class="form-control">

                    </select>

                    <label for="cena">Cena</label>
                    <input type="number" id="cena" name="cena" class="form-control">
            

                    <br>
                    <button class="BtnForm" type="submit" name="azuriraj">Azuriraj</button>

                </form>
            </div>

        </div>
    </div> 
    
   <!--  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <script>
        function popuniSatove() {
                $.ajax({
                    url: 'popuniSatove.php',
                    success: function (data) {
                    $("#sat").html(data);
                    }
                });
            }
        popuniSatove();

    </script> -->
</body>

</html>