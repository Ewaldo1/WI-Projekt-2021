<?php
class dbOperationen
{
    function produktZuWarenkorb($Nutzer_ID, $produkt_ID, $con){
        $insertSql = "INSERT INTO warenkorb (Produkt_ID, Nutzer_ID, Menge, Angelegt) 
                    VALUES ('$produkt_ID', '$Nutzer_ID', '1', '2021-12-16') ON DUPLICATE KEY UPDATE Menge = Menge + 1";
        $result = mysqli_query($con, $insertSql);
        return $result;
    }

    function countProductsInCart($userId, $con) {
        $Nutzer_ID = $userId;  //"SELECT ID FROM nutzer WHERE Username = $nutzername";
        $nutzerResult = mysqli_query($con, $Nutzer_ID);
        $inhalte = 0;
        $sqlWK ="SELECT * FROM warenkorb WHERE Nutzer_ID =".$Nutzer_ID;
        //var_dump($sqlWK);
        $warenkorbResult = mysqli_query($con, $sqlWK);
        //var_dump($warenkorbResult);
        $inhalte = $warenkorbResult->num_rows;
        return $inhalte;
    }

    function getCartItemsForUserId($userId, $con) {
        $sql = "SELECT Produkt_ID, Titel, Beschreibung, Preis FROM warenkorb JOIN produkte ON(warenkorb.Produkt_ID = produkte.ID) WHERE Nutzer_ID = $userId";
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
        $sql = "SELECT Produkt_ID, Titel, Beschreibung, Preis, Menge FROM warenkorb JOIN produkte ON(warenkorb.Produkt_ID = produkte.ID) WHERE Nutzer_ID = $userId";
        $result = mysqli_query($con, $sql);
        if($result === false){
            return 0;
        }
        while($row = mysqli_fetch_assoc($result)){
            $summe = ((double)$row['Preis'] * (int)$row['Menge']) + $summe;
        }
        return $summe;
    }

}