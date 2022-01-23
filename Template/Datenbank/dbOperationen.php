<?php
class dbOperationen
{
    function getUserID($con, $username){
        $sql = "SELECT ID FROM nutzer WHERE Username = '".$username."';"; // ausgabe der ID, wenn die Usernamen übereinstimmen
        $result = mysqli_query($con, $sql);
        $getID = mysqli_fetch_assoc($result);
        return $getID['ID'];
    }

    function getProducts($con){
        $sql = "SELECT ID, Titel, Kategorie, Kurzbeschreibung, Beschreibung, Preis, Slug, Bild FROM produkte";
        $result = mysqli_query($con, $sql);
        if($result === false){
            return [];
        }
        $products= [];
        while ($row = $result->fetch_assoc()){ //fecht_assoc --> funktion liefert eine Seile
            $products[]=$row;
        }
        return $products;
    }

    function randProducts($con){
        $sql = "SELECT ID, Titel, Kategorie, Kurzbeschreibung, Beschreibung, Preis, Slug, Bild FROM produkte ORDER BY rand() LIMIT 3";
        $result = mysqli_query($con, $sql);
        if($result === false){
            return [];
        }
        $products= [];
        while ($row = $result->fetch_assoc()){ //Hier wird Random eine Arry mit alle Produkteen gestellt
            $products[]=$row;
        }
        return $products;
    }

    function randProductsBestseller($con){
        $sql = "SELECT ID, Titel, Kurzbeschreibung, Kategorie, Beschreibung, Preis, Slug, Bild FROM produkte ORDER BY rand() LIMIT 4";
        $result = mysqli_query($con, $sql);
        if($result === false){
            return [];
        }
        $products= [];
        while ($row = $result->fetch_assoc()){
            $products[]=$row;
        }
        return $products;
    }


    //Hier wird das Produkt in der Tabelle Warenkorb eingetragen
    function productToCart($Nutzer_ID, $produkt_ID, $con){
        $insertSql = "INSERT INTO warenkorb (Produkt_ID, Nutzer_ID, Menge) 
                    VALUES ('$produkt_ID', '$Nutzer_ID', '1') ON DUPLICATE KEY UPDATE Menge = Menge + 1"; // füge Produkt dem Warenkorb hinzu, falls Produkt schon vorhanden -> erhöhe die Menge


        $result = mysqli_query($con, $insertSql);
        return $result;
    }

    function countProductsInCart($userId, $con) {
        $sqlWK ="SELECT * FROM warenkorb WHERE Nutzer_ID = '".$userId."';";
        $warenkorbResult = mysqli_query($con, $sqlWK);
        $inhalte = 0;
        while ($warenkorbResult->fetch_assoc()) { // solange es passende Inhalte in der Warenkorbtabelle gibt, soll Inhalte um 1 erhöht werden
            $inhalte = $inhalte + 1;
        }
        return $inhalte;
    }
    //Gib nur produkt die auf die Warenkorb von der Person die angemeldet
    function getCartItemsForUserId($userId, $con) {
        $sql = "SELECT Produkt_ID, Titel, Kurzbeschreibung, Preis, Bild, Menge FROM warenkorb JOIN produkte ON(warenkorb.Produkt_ID = produkte.ID) WHERE Nutzer_ID = '".$userId."';";
        $result = mysqli_query($con, $sql);
        if($result === false) {
            return [];
        }
        $items = [];
        while($row = $result->fetch_assoc()){
            $items[] = $row;
        }
        return $items;

    }

    function getCartSumForUserId($userId, $con){
        $summe = 0;
        $sql = "SELECT Produkt_ID, Titel, Kurzbeschreibung, Preis, Menge FROM warenkorb JOIN produkte ON(warenkorb.Produkt_ID = produkte.ID) WHERE Nutzer_ID = '".$userId."';";
        $result = mysqli_query($con, $sql);
        if($result === false){
            return 0;
        }
        while($row = mysqli_fetch_assoc($result)){
            $summe = ((double)$row['Preis'] * (int)$row['Menge']) + $summe;
        }
        return $summe;
    }

    function getProductBySlug($slug, $con){
        $sql = "SELECT ID, Titel, Beschreibung, Preis, Slug, Bild FROM produkte WHERE Slug = '".$slug."';";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }

    function addProduct($con, $produktname, $slug, $kurzbeschreibung, $beschreibung, $kategorie, $preis, $bild){
        $insert = "INSERT INTO produkte(Titel, Kurzbeschreibung, Beschreibung, Kategorie, Preis, Slug, Bild) VALUES ('".$produktname."', '".$kurzbeschreibung."', '".$beschreibung."', '".$kategorie."', '".$preis."', '".$slug."', '".$bild."')";
        $result = mysqli_query($con, $insert);
        if($result){
            $lastId = mysqli_insert_id($con); ?>
            <div class="alert alert-success"> <strong><?php echo "Produkt erfolgreich hinzugefügt. Letzte hinzugefügte ID lautet: " .$lastId; ?></strong></div> <?php
        } else {
            echo "Error: " . $insert . mysqli_error($con);
        }
    }

    function  deleteProductWarencorb($con, $produktID, $accountID) {
        $deleteComand = "DELETE FROM Warenkorb WHERE Nutzer_ID = ".$accountID." AND Produkt_ID = ".$produktID." "; //Hier wird gesagt welche Seile muss gelösst werden
        $result = mysqli_query($con, $deleteComand);
        //$deleteMe = "DEL"
    }

    //Diese Funktion löscht alle Produkt aus der Warenkorb von der USER der bereit angemeldet ist
    function deleteAllProducts ($con, $accountID) {
        $sql = "DELETE FROM Warenkorb where Nutzer_ID = ".$accountID." ";
        $result = mysqli_query($con, $sql);

    }
    function getProductByCategory($con, $kategorie) {
        $sql = "SELECT * FROM produkte WHERE Kategorie = '".$kategorie."';";
        $result = mysqli_query($con, $sql);
        $products= [];
        while ($row = $result->fetch_assoc()){
            $products[]=$row;
        }
        return $products;

    }

}