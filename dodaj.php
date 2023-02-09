<?php
include "konekcija.php";
require "models/sat.php";

session_start();
if (!isset($_SESSION['korisnik'])) {
    header('Location: login.php');
    exit();
}

if(isset($_POST['sacuvaj'])){
    $proizvodjac = trim($_POST['proizvodjac']);
    $model = trim($_POST['model']);
    $pol = trim($_POST['pol']);
    $cena = trim($_POST['cena']);

    if(Sat::dodaj($proizvodjac, $model, $pol, $cena, $konekcija)){
        echo '<script type="text/javascript">
               window.onload = function () { alert("Sat je dodat u bazu!"); } 
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
    <title>Dodaj sat</title>
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
                <form method="post" action="" id="forma">
                    
                    <label for="proizvodjac">Proizvodjac</label>
                    <select id="proizvodjac" name="proizvodjac" class="form-control">

                    </select>

                    <label for="model">Naziv modela</label>
                    <input type="text" id="model" name="model" class="form-control">
                    
                    <label for="pol">Pol</label>
                    <select id="pol" name="pol" class="form-control">
                        
                    </select>

                    <label for="cena">Cena</label>
                    <input type="number" id="cena" name="cena" class="form-control">

                    <br><br>

                    <button class="BtnForm" type="submit" name="sacuvaj" >Sacuvaj</button>
                    <br>

                </form>
            </div>
            <br/>
            <br/>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <script>
   
        function popuniPolove() {

            $.ajax({
                url: 'popuniPolove.php',
                success: function (data) {
                   $("#pol").html(data);
                }
            });
        }
        popuniPolove();
        
        function popuniProizvodjace() {   
            $.ajax({
                url: 'popuniProizvodjace.php',
                success: function (data) {
                    $("#proizvodjac").html(data);
                }
            });
        }
        popuniProizvodjace();

        
    
    </script>
    

    

</body>

</html>