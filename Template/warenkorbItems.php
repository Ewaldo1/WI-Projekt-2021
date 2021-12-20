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
    <div><?= $warenkorbItems['Titel']?></div>
    <div><?= $warenkorbItems['Beschreibung']?></div>
</div>
<div class="col-2  text-right">
    <?= $warenkorbItems['Preis']?> €
</div>