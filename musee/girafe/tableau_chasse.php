<?php 
$page='tableau';
session_start();
if(!isset($_SESSION['is_connected'])){
    header('Location:/musee/connexion.php');
}
elseif(isset($_SESSION['is_connected']) and !$_SESSION['is_connected']){
    header('Location:/musee/connexion.php');
}
include 'header.php';
include '../gestion/database.php';
include '../included/meta.php';

$girafes=$_SESSION['girafe'];
function trieChasseurs($grfs,$key){// trie les chasseurs selon le critère choisi avec $key ex: $key='nb_girafe'
    $tabLoginValue=array();
    $tabLoginTab=array();
    foreach($grfs as $grf){
        $tabLoginValue[serialize(array($grf['login'],$grf['prenom'],$grf['surname']))]=$grf[$key];
    }
    arsort($tabLoginValue);
    foreach($tabLoginValue as $k=>$value){
        $kTab=unserialize($k);
        $tabSortLoginValue[]=array(
            'login'=>$kTab[0],
            'prenom'=>$kTab[1],
            'surname'=>$kTab[2],
            $key=>$value,
        );
    }
    return $tabSortLoginValue;
}
foreach($girafes as $girafe){
    if($girafe['login']==$_SESSION['username']){
        $user=$girafe;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="style_girafe.css">
    <title>Tableau de chasse</title>
</head>
<body>
    <div class="recentrer">
        <h1>Stat général</h1>
        <h2>Les plus gros chasseurs de girafe de tout les temps</h2>
        <table class='tab'>
            <tr>
                <td></td>
                <td>Nom</td>
                <td>Nombre de girafes tuées</td>
            </tr>
            <?php 
            $chasseursTries=trieChasseurs($girafes,'nb_girafe');
            for($i=0;$i<5;$i++){
                $I=$i+1;
                echo '<tr>
                        <td>'.$I.'</td>
                        <td>'.$chasseursTries[$i]['prenom'].'</td>
                        <td>'.$chasseursTries[$i]['nb_girafe'].'</td>
                    </tr>';
            }
            
            ?>
        </table>
        <h2>Les plus gros chasseurs de girafe sur une soirée</h2>
        <table>
            <tr>
                <td></td>
                <td>Nom</td>
                <td>Nombre de girafes tuées</td>
            </tr>
            <?php 
            $chasseursTries=trieChasseurs($girafes,'record_soiree');
            for($i=0;$i<5;$i++){
                $I=$i+1;
                echo '<tr>
                        <td>'.$I.'</td>
                        <td>'.$chasseursTries[$i]['prenom'].'</td>
                        <td>'.$chasseursTries[$i]['record_soiree'].'</td>
                    </tr>';
            }
            
            ?>
        </table>
        <h2>Les plus gros chasseurs de girafe ce soir</h2>
        <table>
            <tr>
                <td></td>
                <td>Nom</td>
                <td>Nombre de girafes tuées</td>
            </tr>
            <?php 
            $chasseursTries=trieChasseurs($girafes,'nb_girafe_soiree');
            for($i=0;$i<5;$i++){
                $I=$i+1;
                echo '<tr>
                        <td>'.$I.'</td>
                        <td>'.$chasseursTries[$i]['prenom'].'</td>
                        <td>'.$chasseursTries[$i]['nb_girafe_soiree'].'</td>
                    </tr>';
            }
            
            ?>
        </table>
        <h2>Les plus gros buveurs de bières de tout les temps</h2>
        <table>
            <tr>
                <td></td>
                <td>Nom</td>
                <td>Quantité de bière bu (en L)</td>
            </tr>
            <?php 
            $chasseursTries=trieChasseurs($girafes,'biere_total');
            for($i=0;$i<5;$i++){
                $I=$i+1;
                echo '<tr>
                        <td>'.$I.'</td>
                        <td>'.$chasseursTries[$i]['prenom'].'</td>
                        <td>'.$chasseursTries[$i]['biere_total'].'</td>
                    </tr>';
            }
            
            ?>
        </table>
        <h1>Mes stats</h1>
        <p>Nombre de girafes tuées à ton actif : <?php echo $user['nb_girafe']?></p>
        <p>Nombre de girafes tuées ce soir : <?php echo $user['nb_girafe_soiree']?></p>
        <p>Record de girafes tuées en un soir : <?php echo $user['record_soiree']?></p>
        <p>Quantité de bière bu ce soir : <?php echo $user['biere_soiree']?> L</p>
        <p>Record de bière bu en un soir : <?php echo $user['record_biere_soiree']?> L</p>
        <p>Quantité de bière bu depuis le début de la tuerie : <?php echo $user['biere_total']?> L</p>
        <p>Argent dépensé dans la tuerie des girafes  : <?php echo $user['total']?> €</p>
    </div>
</body>
</html>