<?php
require "konekcija.php";
require "models/proizvodjac.php";

$proizvodjaci = Proizvodjac::vratiProizvdjace($konekcija);

foreach ($proizvodjaci as $proizvodjac){
    ?>
    <option value="<?= $proizvodjac->proizvodjacID ?>"><?= $proizvodjac->proizvodjac ?> </option>
    <?php
}
?>