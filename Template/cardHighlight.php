<html>
<style>

    .card {
        float: left;
        max-width: 300px;
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
    .card .card-body .card-price {
        color: #D10024;
        font-size: 18px;
    }

     .card .card-body .card-price .card-old-price {
        font-size: 70%;
        font-weight: 400;
        color: #8D99AE;
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
    <img src="<?php echo $product['Bild']; ?>" class="card-img-top" height="300px" width="300px" alt="produkt">
    <h4 class="card-body">
        <?php echo $product['Kurzbeschreibung'] ?>
        <hr>
        <h4 class="card-price"><?php echo $product['Preis'] - rand(20, 150) .'€'?> <del class="card-old-price"><?php echo $product['Preis'] .'€'?></del></h4>

    <div class="card-footer">
        <a href="index.php/produkt/<?= $product['Slug']?>" class="btn btn-primary btn-sm">Details</a>
        <a href="index.php/warenkorb/add/<?= $product['ID']?>" class="btn btn-success btn-sm">Zum Warenkorb</a>

    </div>

</div>
