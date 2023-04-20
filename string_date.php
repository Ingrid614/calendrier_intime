<?php
function MeF_Date($date){
    //recupere la date dans des variables
    list($jour, $mois, $annee) = explode("-", $date);
    // retire le 0 des jours
    if($jour==00) $jour="";
    elseif (substr($jour, 0, 1)=="0") $jour=substr($jour, 1, 1);
    //met le mois en litteral
    $moisli[1] = "january";
    $moisli[2] = "february";
    $moisli[3] = "march";
    $moisli[4] = "april";
    $moisli[5] = "may";
    $moisli[6] = "june";
    $moisli[7] = "july";
    $moisli[8] = "august";
    $moisli[9] = "september";
    $moisli[10] = "october";
    $moisli[11] = "november";
    $moisli[12] = "december";
    if (substr($mois, 0 , 1)=="0") $mois=substr($mois, 1, 1);
    $mois = $moisli[$mois];
    //Met en forme
    $date = $jour.' '.$mois.' '.$annee;
    return $date;
}
?>