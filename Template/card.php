<div class="card">
    <div class="card-title"><?php echo $produkt['Titel'] //Titel der Zeile aus der Produktdatenbanktabelle ?></div>
    <img src="./img/product01.png" class="card-img-top" height="300px" width="300px" alt="produkt">
    <div class="card-body">
        <?php echo $produkt['Beschreibung'] ?>
        <hr>
        <?php echo $produkt['Preis'] .'€' ?>
    </div>
    <div class="card-footer">
        <a href="index.php/produkt/<?= $produkt['Slug']?>" class="btn btn-primary btn-sm">Details</a>
        <a href="index.php/warenkorb/add/<?= $produkt['ID']?>" class="btn btn-success btn-sm">Zum Warenkorb</a>
    </div>
</div>