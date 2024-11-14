<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Enregistrement Couleur</title>
    </head>
    <body>
        BIENVENUE <br>

        <?php echo 'Quantite : ' . $_GET['quantite']; ?> <br>
        <?php echo 'Rouge : ' . $_GET['valeurRouge']; ?> <br>
        <?php echo 'Vert : ' . $_GET['valeurVert']; ?> <br>
        <?php echo 'Bleu : ' . $_GET['valeurBleu']; ?> <br> <br>
        <?php echo 'Nom : ' . $_GET['Nom']; ?> <br>
        <?php echo 'Prénom : ' . $_GET['Prenom']; ?> <br>
        <?php echo 'Adresse : ' . $_GET['Adresse']; ?> <br>

        <!-- Conversion -->
        <?php
        $quantite = $_GET['quantite'];
        $rPrim = $_GET['valeurRouge'] / 255;
        $vPrim = $_GET['valeurVert'] / 255;
        $bPrim = $_GET['valeurBleu'] / 255;
        $nom = $_GET['Nom'];
        $prenom = $_GET['Prenom'];
        $adresse = $_GET['Adresse'];

        $noir = 1 - max($rPrim,$vPrim,$bPrim);
        $cyan = (1 - $rPrim -$noir)/(1 -$noir);
        $jaune = (1 - $bPrim - $noir)/(1 - $noir);
        $magenta = (1 - $vPrim - $noir)/(1 - $noir);
        
        if($noir != 1){
            
            $noir *= 100;
            $cyan *= 100;
            $magenta *= 100;
            $jaune *= 100;

            $blanc = 100 - (($cyan + $magenta + $noir + $jaune) / 4);
            $noir /= 4;
            $cyan /= 4;
            $magenta /= 4;
            $jaune /= 4;
        }
        
        echo '<br> Cyan: ' . $cyan." %";
        echo '<br> Magenta: ' . $magenta." %";
        echo '<br> Jaune: ' . $jaune." %";
        echo '<br> Noir: ' . $noir." %";
        echo '<br> Blanc: ' . $blanc." %";
        echo '<br>';

     
                $qCyan = round($quantite*100*($cyan / 100))/100;
                    echo '<br>Cyan '.$qCyan." Litre";
                $qMagenta = round($quantite*100*($magenta / 100))/100;
                    echo '<br>Magenta '.$qMagenta." Litre";
                $qJaune = round($quantite*100*($jaune / 100))/100;
                    echo '<br>Jaune '.$qJaune." Litre";
                $qNoir = round($quantite*100*($noir / 100))/100;
                    echo '<br> Noir '.$qNoir." Litre";
                $qBlanc = round($quantite*100*($blanc / 100))/100;
                    echo '<br> Blanc '.$qBlanc." Litre"."<br>";
    
        ?>

       <?php
            $bdd = new mysqli('localhost', 'root', '', 'couleurs');
                if ($bdd->connect_errno) {
                    echo "échec de la connexion";
                    exit();
                }
            echo "<br> Connexion à la BDD réussie";

            $requete1 = "select * from stock";
            $requete2 = "
            UPDATE `stock`
            SET `quantite_blanc` = `quantite_blanc` - ".$qBlanc.", `quantite_noir` = `quantite_noir` - ".$qNoir.",`quantite_cyan` = `quantite_cyan` - ".$qCyan.", `quantite_magenta` = `quantite_magenta` - ".$qMagenta.",`quantite_yellow` = `quantite_yellow` - ".$qJaune."
            WHERE `stock`.`id_stock` = 1";
            
            $checkuser = "
            SELECT `client`
            FROM `nom`
            WHERE EXISTS (
            SELECT nom_colonne2
            FROM `table2`
            WHERE nom_colonne3 = 10
  )
            
            "
            
            // requête sur le stock
            $resultat2=$bdd->query($requete2);
            $resultat=$bdd->query($requete1); 
            $resultat=$bdd->query($requete1);
            $user=$bdd->query($checkuser);

            if($resultat==TRUE){
                    $ligne = $resultat->fetch_assoc(); // cette méthode permet d'obtenir un tableau sur le stock
                    echo "fin requete".'<br>'."NOUVEAUX STOCK DANS LA BDD:".'<br>';
                    $noir = $ligne['quantite_noir'];
                    $blanc = $ligne['quantite_blanc'];
                    $cyan = $ligne['quantite_cyan'];
                    $magenta = $ligne['quantite_magenta'];
                    $jaune = $ligne['quantite_yellow'];

                    echo "Quantite Cyan = ".$cyan;
                    echo "<br> Quantite Magenta = ".$magenta;
                    echo "<br> Quantite Jaune = ".$jaune;
                    echo "<br> Quantite Noir = ".$noir;
                    echo "<br> Quantite Blanc = ".$blanc;

            } else echo 'Erreur requette' ;
            
  
        ?>
            
    </body>
</html>