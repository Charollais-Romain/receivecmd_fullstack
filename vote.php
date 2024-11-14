<?php
header('Content-Type: text/html; charset=utf-8');
Echo "Resultats ";
$handle = fopen("vote.txt", "r+");

if($handle==TRUE)echo "OK";
else echo"pas OK";
echo"<br>";

$nb_vote=0;
$candidats = array(0,0,0,0,0,0,0,0);  // il manque un élément
$pourcentage = array(0,0,0,0,0,0,0); 

$debut=ftell($handle);
$candidats[0]=fgets($handle);           // nb_votes correspond à candidats[0]
$nb_vote=$candidats[0];
$position1 = ftell($handle);
$candidats[1] = fgets($handle);
$position2 = ftell($handle);
$candidats[2] = fgets($handle);
$position3 = ftell($handle);
$candidats[3] = fgets($handle);
$position4 = ftell($handle);
$candidats[4] = fgets($handle);
$position5 = ftell($handle);
$candidats[5] = fgets($handle);
$position6 = ftell($handle);
$candidats[6] = fgets($handle);
$position7 = ftell($handle);
$candidats[7] = fgets($handle); //lecture du fichier et écriture dans le tableau
/*
echo "lecture des resultats_bis"."<br>";
        echo "Nb_votes".$candidats[0]."<br>";
        foreach ($candidats as $index => $candidat) {
            if ($index > 0) { // Sauter le premier élément
                echo "Candidat " . $index . ": " . $candidat . "<br>";
            }
        }

*/


if (isset($_GET["candidat"])==1){
    $candidat = $_GET["candidat"]; 
    $candidats[$candidat] = $candidats[$candidat] + 1;
    $nb_vote = $nb_vote + 1;



}
else{
    $a=100;
    echo $nb_vote." votes sont enregistrés"."<br>"."<br>";
    if($nb_vote!=0){
        for($i=1;$i<=7;$i++){
            $result=$candidats[$i]*$a/$nb_vote;
            $pourcentage[$i-1]= $result;
        }

        }
    else{
        echo "Calcul Impossible, personne n'a voté."."<br>";
    }
        
        echo "lecture des resultats_bis"."<br>";
        echo "Nb_votes".$candidats[0]."<br>";
        foreach ($candidats as $index => $candidat) {
            if ($index > 0) { // Sauter le premier élément
                echo "Candidat " . $index . ": " . $candidat . "<br>";
            }
        }
            
}





    fseek($handle,$debut);
    fwrite($handle,$nb_vote);
    fseek($handle,$position1);
    fwrite($handle,$candidats[1]);
    fseek($handle,$position2);
    fwrite($handle,$candidats[2]);
    fseek($handle,$position3);
    fwrite($handle,$candidats[3]);
    fseek($handle,$position4);
    fwrite($handle,$candidats[4]);
    fseek($handle,$position5);
    fwrite($handle,$candidats[5]);
    fseek($handle,$position6);
    fwrite($handle,$candidats[6]);
    fseek($handle,$position7);
    fwrite($handle,$candidats[7]);


 echo "Nombre de votant pour le candidat 1: ", $candidats[1], " || ",  $pourcentage[0], "%", "<br>";
 echo "Nombre de votant pour le candidat 2: ", $candidats[2], " || ",  $pourcentage[1], "%", "<br>";
 echo "Nombre de votant pour le candidat 3: ", $candidats[3], " || ",  $pourcentage[2], "%", "<br>";
 echo "Nombre de votant pour le candidat 4: ", $candidats[4], " || ",  $pourcentage[3], "%", "<br>";
 echo "Nombre de votant pour le candidat 5: ", $candidats[5], " || ",  $pourcentage[4], "%", "<br>";
 echo "Nombre de votant pour le candidat 6: ", $candidats[6], " || ",  $pourcentage[5], "%", "<br>";
 echo "Nombre de votant pour le candidat 7: ", $candidats[7], " || ",  $pourcentage[6], "%", "<br>";
 
 
 fclose($handle);
?>