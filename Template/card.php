<div class="card">
    <div class="card-title"><?php echo $product['Titel'] //Titel der Zeile aus der Produktdatenbanktabelle ?></div>
    <img src="<?php echo $product['Bild']; ?>" class="card-img-top" height="300px" width="300px" alt="produkt">
    <div class="card-body">
        <?php echo $product['Beschreibung'] ?>
        <hr>
        <?php echo $product['Preis'] .'€' ?>
    </div>
    <div class="card-footer">
        <a href="index.php/produkt/<?= $product['Slug']?>" class="btn btn-primary btn-sm">Details</a>
        <a href="index.php/warenkorb/add/<?= $product['ID']?>" class="btn btn-success btn-sm">Zum Warenkorb</a>

    </div>
</div>