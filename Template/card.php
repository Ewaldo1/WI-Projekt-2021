<html>
<style>

   .card {
      float: left;
       width: 300px;
       height: 600px;
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
   .card:hover {
       webkit-box-shadow: 0px 0px 6px 0px #E4E7ED, 0px 0px 0px 2px #D10024;
       box-shadow: 0px 0px 6px 0px #E4E7ED, 0px 0px 0px 2px #D10024;
       webkit-transform: scale(1.1);
       ms-transform: scale(1.1);
       transform: scale(1.1);
   }
   .card button {
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
    <div class="card-body">
        <?php echo $product['Kurzbeschreibung'] ?>
        <hr>
        <?php echo $product['Preis'] .'€' ?>
    </div>
    <div class="card-footer">
        <a href="produktDetails.php?slug=<?= $product['Slug']?>" class="btn btn-primary btn-sm">Details</a>
        <a href="index.php/warenkorb/add/<?= $product['ID']?>" class="btn btn-success btn-sm">Zum Warenkorb</a>

    </div>

</div>