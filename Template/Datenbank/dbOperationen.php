<?php
class dbOperationen
{
    function getUserID($con, $username){
        $sql = "SELECT ID FROM nutzer WHERE Username = '".$username."';"; // ausgabe der ID, wenn die Usernamen übereinstimmen
        $result = mysqli_query($con, $sql);
        $getID = mysqli_fetch_assoc($result);
        return $getID;
    }

    function getProducts($con){
        $sql = "SELECT ID, Titel, Beschreibung, Preis, Slug, Bild FROM produkte";
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


    function productToCart($Nutzer_ID, $produkt_ID, $con){
        $intoInt = intval($Nutzer_ID); // Array in Integer umwandeln
        $insertSql = "INSERT INTO warenkorb (Produkt_ID, Nutzer_ID, Menge) 
                    VALUES ('$produkt_ID', '$intoInt', '1') ON DUPLICATE KEY UPDATE Menge = Menge + 1"; // füge Produkt dem Warenkorb hinzu, falls Produkt schon vorhanden -> erhöhe die Menge
        $result = mysqli_query($con, $insertSql);
        return $result;
    }

    function countProductsInCart($userId, $con) {
        $stringUserId = implode("", $userId); // Array in String umwandeln, da sonst Fehlermeldung das String erwartet wird
        $sqlWK ="SELECT * FROM warenkorb WHERE Nutzer_ID = '".$stringUserId."';";
        //var_dump($sqlWK);
        $warenkorbResult = mysqli_query($con, $sqlWK);
        //var_dump($warenkorbResult);
        $inhalte = 0;
        while ($warenkorbResult->fetch_assoc()) { // solange es passende Inhalte in der Warenkorbtabelle gibt, soll Inhalte um 1 erhöht werden
            $inhalte = $inhalte + 1;
        }
        return $inhalte;
    }

    function getCartItemsForUserId($userId, $con) {
        $stringUserId = implode("", $userId);
        $sql = "SELECT Produkt_ID, Titel, Beschreibung, Preis, Bild FROM warenkorb JOIN produkte ON(warenkorb.Produkt_ID = produkte.ID) WHERE Nutzer_ID = '".$stringUserId."';";
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
        $stringUserId = implode("", $userId);
        $summe = 0;
        $sql = "SELECT Produkt_ID, Titel, Beschreibung, Preis, Menge FROM warenkorb JOIN produkte ON(warenkorb.Produkt_ID = produkte.ID) WHERE Nutzer_ID = '".$stringUserId."';";
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


       /* $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "s", $slug); //spezifizierung des ? mit dem slug
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $id, $titel, $beschreibung, $preis, $slug);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);*/
        //var_dump($sql);
       //var_dump(mysqli_error($con));

    }

    function addProduct($con, $produktname, $slug, $beschreibung, $kategorie, $preis, $bild){
        $insert = "INSERT INTO produkte(Titel, Beschreibung, Kategorie, Preis, Slug, Bild) VALUES ('".$produktname."', '".$beschreibung."', '".$kategorie."', '".$preis."', '".$slug."', '".$bild."')";
        $result = mysqli_query($con, $insert);
        if($result){
            $lastId = mysqli_insert_id($con);
            echo "Produkt erfolgreich hinzugefügt. Letzte hinzugefügte ID lautet: " .$lastId;
            //header("Location: index.php");
        }
        echo "Error: " .$insert . mysqli_error($con);
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