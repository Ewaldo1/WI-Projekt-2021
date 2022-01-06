<?php
class dbOperationen
{
    function getUserID($con){
        $userId = 0;


        /* check connection */
        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }

        if (!mysqli_query($con, "SET a=1")) {
            printf("Error message: %s\n", mysqli_error($con));
        }

        /* close connection */
        mysqli_close($con);

        return $userId;
    }

    function getProducts($con){
        $sql = "SELECT * FROM produkte";
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
        $insertSql = "INSERT INTO warenkorb (Produkt_ID, Nutzer_ID, Menge, Angelegt) 
                    VALUES ('$produkt_ID', '$Nutzer_ID', '1', '2021-12-16') ON DUPLICATE KEY UPDATE Menge = Menge + 1";
        $result = mysqli_query($con, $insertSql);
        return $result;
    }

    function countProductsInCart($userId, $con) {
        $Nutzer_ID = $userId; //"SELECT ID FROM warenkorb WHERE Nutzer_ID =".$userId;
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

    function getProductBySlug($slug, $con){
        $sql = "SELECT ID, Titel, Beschreibung, Preis, Slug FROM produkte WHERE Slug = ' .$slug'";
        $result = mysqli_query($con, $sql);
       /* $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "s", $slug); //spezifizierung des ? mit dem slug
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $id, $titel, $beschreibung, $preis, $slug);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);*/
        var_dump($result);
        var_dump(mysqli_error($con));


    }

    function addProduct($con, $produktname, $slug, $beschreibung, $preis){
        $insert = "INSERT INTO produkte(Titel, Beschreibung, Preis, Slug) VALUES ('$produktname', '$beschreibung', '$preis', $slug)";
        $result = mysqli_query($con, $insert);
        if(mysqli_query($con,$insert)){
            $lastId = mysqli_insert_id($con);
            echo "Produkt erfolgreich hinzugefügt. Letzte hinzugefügte ID lautet: " .$lastId;
        }
        echo "Error: " .$insert . mysqli_error($con);
    }


}