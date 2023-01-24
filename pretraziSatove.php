<?php
require "konekcija.php";
require "models/sat.php";

$pol = trim($_GET['pol']);
$sort = trim($_GET['sort']);

$satovi = Sat::vratiSatove($pol, $sort, $konekcija);

foreach ($satovi as $sat){
?>
    <div  style="width: 400px; height: 200px; margin-left: 25px; padding: 25px; background-color: white; border-radius: 15px; border: 5px solid #820000">
        <div class="service-item d-flex position-relative text-center " style="justify-content: center;">
            <div class="service-text"> 
                <h4><?= $sat->proizvodjac ?></h4>
                <h4><?= $sat->model ?></h4>
                <h5>Pol: <?= $sat->pol ?></h5>
                <h5>Cena: <?= $sat->cena ?> EUR</h5>
            </div>
        </div>
    </div>
<?php
}
