<?php 

$db_user = "Kama";
$db_passwd = "Rjlcooadc13";
$db_host = "localhost";
$db_port = "3306";
$db_name = "exo";
$db_dataSourceName = "mysql:host=$db_host;port=$db_port;dbname=$db_name";

$PDO = new PDO($db_dataSourceName, $db_user, $db_passwd);
$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$nom = $_GET['nom'] ?? 'Patrick';
 //Je cherche la valeur nom, et si elle n'est pas définie, j'utilise Patrick
$console = $_GET['console'] ?? 'Xbox One';
$lastOwner = $_GET['lastOwner'] ?? 'Jellal';

$preparedRequest = $PDO->prepare("DELETE FROM jeux_video WHERE possesseur = :owner");
$preparedRequest->execute(
    array(
        "owner" => $lastOwner)
);


// // Requête préparée
// $requetePreparee = $PDO->prepare("SELECT nom, console "
// . " FROM jeux_video " 
// . " WHERE possesseur = :user "
//  //Au lieu de mettre " = ?" sur notre requête préparée, on donne un nom qui sera plus tard associé avec la variable créée sur notre GET (voir ligne 13 & 14).
// . " AND console = :console " 
// //Sur notre URL on peut maintenant ajouter "&console=" suivi du nom de la console
// . " ORDER BY nom, console ASC"
// . " LIMIT 10");

// $requetePreparee->execute(array('user'=>$nom, 'console'=>$console)); //Va chercher l'information entrée dans la variable nom, associée à user dans la table.

// $toutesLesLignes = $requetePreparee->fetchAll();

// foreach($toutesLesLignes as$lignesCourantes){
//     echo $lignesCourantes['nom'] . ' - console: ' . $lignesCourantes['console'] . '</br>' ;
// }
// $requetePreparee->closeCursor();

// $PDO->exec('INSERT INTO jeux_video(nom, possesseur, console, prix, nbre_joueurs_max, commentaires) VALUES("Prince of Persia", "Jellal", "PSP", 35, 1, "Profitez avant de devenir bipolaire")');




// $preparedRequest = $PDO->prepare("UPDATE jeux_video set console = :console WHERE possesseur = :verylastowner ");
// $preparedRequest->execute(
//     array
//     ("console" => $console,
//     "verylastowner" => $lastOwner
//     // récupère ce qu'il y a dans le GET
//     )
// );