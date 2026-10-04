<?php

$heure = date("H");
if ($heure < 12){
    echo "c'est le matin ";
}else {
    echo "c'est l'apres midi";
}
?>