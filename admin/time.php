<?php
/**
* Calculer le temps d'execution d'un script
*/
 
// relever le point de départ
$timestart=microtime(true);
error_log(date("Y-m-d H:i:s") ." debutscript: ". $timestart ."\n", 3, "spy.log");
 
/**
* Execution du code PHP:
* - requete SQL,
* - génération du code HTML, 
* - ...
*/
try {
    for ($i = 0; $i < 1600000000; $i++) {
        $j = (($i/2767.34)*34.56)/23.56;
    }
} catch (Exception $e) {
    error_log(date("Y-m-d H:i:s") ." Error: ". $e->getMessage() ."\n", 3, "spy.log");
    echo "Debut du script: ".date("H:i:s", $e->getMessage());
}

 
//Fin du code PHP
$timeend=microtime(true);
$time=$timeend-$timestart;
 
//Afficher le temps d'éxecution
$page_load_time = number_format($time, 3);
error_log(date("Y-m-d H:i:s") ." Finscript: ". $timeend ."\n", 3, "spy.log");
error_log(date("Y-m-d H:i:s") ." Total: ". $page_load_time ."\n", 3, "spy.log");
echo "Debut du script: ".date("H:i:s", $timestart);
echo "<br>Fin du script: ".date("H:i:s", $timeend);
echo "<br>Script execute en " . $page_load_time . " sec";
?>

