<div class="card">
    <div class="card-title"><?php echo $row['Titel'] //Titel der Zeile aus der Produktdatenbanktabelle ?></div>
    <img src="./img/product01.png" class="card-img-top" height="300px" width="300px" alt="produkt">
    <div class="card-body">
        <?php echo $row['Beschreibung'] ?>
        <hr>
        <?php echo $row['Preis'] .'€' ?>
    </div>
    <div class="card-footer">
        <a href="" class="btn btn-primary btn-sm">Details</a>
        <a href="" class="btn btn-success btn-sm">Zum Warenkorb</a>
    </div>
</div>
