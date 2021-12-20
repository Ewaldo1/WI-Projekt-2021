<?php
include "DBchat.php";
$frage = "SELECT * FROM chat ORDER BY id DESC";
$execute = $con->query($frage);


while($zeile = $execute->fetch_array()):

    ?>

    <div id = daten-chat>
        <span style="color: #1c62c4"> <?php echo $zeile['nameChat'];?>: </span>
        <span style = "color: #848484"> <?php echo $zeile['nachricht'];?> </span>
        <span style="float: right"> <?php echo datumFormatierung($zeile['datum']);?> </span>
    </div>

<?php endwhile; ?>