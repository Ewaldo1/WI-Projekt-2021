<?php
class dbOperationen
{
    function produktZuWarenkorb($Nutzer_ID, $produkt_ID, $con){
        $insertSql = "INSERT INTO warenkorb (Produkt_ID, Nutzer_ID, Menge, Angelegt) VALUES ('$produkt_ID', '$Nutzer_ID', '1', '2021-12-16')";
        $insertResult = mysqli_query($con, $insertSql);
    }

    function getCartItemsForUserId($userId, $con) {
        $sql = "SELECT Produkt_ID, Titel, Beschreibung, Preis FROM warenkorb JOIN produkte ON(warenkorb.Produkt_ID = produkte.ID) WHERE Nutzer_ID = 1";
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

}