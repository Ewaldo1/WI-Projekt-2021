<div class="col-3"></div>
<img src="<?php echo $warenkorbInhalt['Bild']; ?>" class="img-thumbnail" height="300px" width="300px" alt="produkt">
<div class="col-7">
    <div><?= $warenkorbInhalt['Titel']?></div>
</div>
<div class="col-2  text-right">


    <?= $warenkorbInhalt['Preis']?> €<br>
    <?= $warenkorbInhalt['Menge']?> Stk.
    <br>
    <a href="BackEnd/löschenEinzelbProdukt.php" class="btn btn-danger col-12 text-center">dieses  Produkt löschen</a>
    <br>
    <br>

</div>

