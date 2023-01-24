<?php
require "konekcija.php";
require "models/sat.php";

$satovi = Sat::vratiSatove("0", "asc", $konekcija);


foreach ($satovi as $sat){
    ?>
    <option value="<?= $sat->satID ?>"><?= $sat->proizvodjac . " " . $sat->model . " (" . $sat->cena . " EUR)" ?> </option>
    <?php
}
?>