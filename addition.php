<?php
$fichier = fopen('vote.txt','r');
$i=0;
while($ligne = fgets($fichier))
{
$liste[$i] = $ligne;
$i++;
}
sort($liste);
$i=0;
while(isset($liste[$i]))
{
echo $liste[$i],"<br />";
$i++;
}
fclose($fichier)
?>