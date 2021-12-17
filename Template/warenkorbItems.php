<?php
$sumPreis = 0;
if(isset($preis)){
    foreach ($preis as $value){
        $sumPreis += $value;
    }
}
?>

<div class="col-4"></div>
<img src="./img/product01.png" class="card-img-top" height="300px" width="300px" alt="produkt">
</div>
<div class="col-8">
    <div><?= $warenkorbItems['Titel']?></div>
    <div><?= $warenkorbItems['Beschreibung']?></div>
    <div><?= $warenkorbItems['Preis']?></div>
</div>