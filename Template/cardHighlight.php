<html>
<style>

    .card {
        float: left;
        width: 300px;
        height: 750px;
        margin: 15px;
        text-align: center;
        font-family: arial;
        position: relative;
        -webkit-box-shadow: 0px 0px 0px 0px #E4E7ED, 0px 0px 0px 1px #E4E7ED;
        box-shadow: 0px 0px 0px 0px #E4E7ED, 0px 0px 0px 1px #E4E7ED;
        -webkit-transition: 0.2s all;
        transition: 0.2s all;
    }
    .card .card:hover {
        webkit-box-shadow: 0px 0px 6px 0px #E4E7ED, 0px 0px 0px 2px #D10024;
        box-shadow: 0px 0px 6px 0px #E4E7ED, 0px 0px 0px 2px #D10024;
        webkit-transform: scale(1.1);
        ms-transform: scale(1.1);
        transform: scale(1.1);
    }
    .card .card-title {
        font-size: 18px;
    }
    .card .card button {
        border: none;
        outline: 0;
        padding: 12px;
        color: white;
        background-color: #000;
        text-align: center;
        cursor: pointer;
        width: 100%;
        font-size: 18px;
    }
    .card button:hover {
        opacity: 0.7;
    }

</style>

<div class="card">
    <div class="card-title"><?php echo $product['Titel'] //Titel der Zeile aus der Produktdatenbanktabelle ?></div>
    <img src="<?php echo $product['Bild']; ?>" class="img-thumbnail" height="300px" width="300px" alt="produkt">
    <h4 class="card-body" style="font-size: 15px"></h4>
        <?php echo $product['Kurzbeschreibung'] ?>
        <hr>
        <h4 class="card-price" style = "color: #D10024"><?php echo $product['Preis'] - rand(20, 150) .'€'?> <del class="card-old-price" style="color: #8D99AE"><?php echo $product['Preis'] .'€'?></del></h4>

    <div class="card-footer">
        <a href="produktDetails.php?slug=<?= $product['Slug']?>" class="btn btn-primary btn-sm">Details</a>
        <a href="index.php/warenkorb/add/<?= $product['ID']?>" class="btn btn-success btn-sm">Zum Warenkorb</a>

    </div>

</div>
