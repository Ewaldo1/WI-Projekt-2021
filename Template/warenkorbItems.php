<?php
$sumPreis = 0;
if(isset($preis)){
    foreach ($preis as $value){
        $sumPreis += $value;
    }
}
?>

<div class="col-3"></div>
<img class="produktbild" src="./img/product01.png">
</div>
<div class="col-7">
    <div><?= $warenkorbInhalt['Titel']?></div>
    <div><?= $warenkorbInhalt['Beschreibung']?></div>
</div>
<div class="col-2  text-right">
    <?= $warenkorbInhalt['Preis']?> €
</div>