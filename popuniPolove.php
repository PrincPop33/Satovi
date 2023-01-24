<?php
require "konekcija.php";
require "models/pol.php";

$polovi = Pol::vratiPolove($konekcija);

foreach ($polovi as $pol){

    ?>
    <option value="<?= $pol->polID ?>"><?= $pol->pol ?> </option>

<?php
}
?>