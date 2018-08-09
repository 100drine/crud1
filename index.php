<?php include "./db.php";?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>1 Afficher tous les clients.</h1>

<?php



try{
    foreach($pdo->query('SELECT lastName,firstName from clients')as$a){ 
    echo $a["lastName"]." ".$a["firstName"].'<br>'; 
    }
    //$pdo = null; 
}catch(PDOException $e){
 echo "Erreur!:".$e->getMessage()."<br/>";
  die(); 
}
?>
<h1>2 Afficher tous les types de spectacles possibles.</h1>
<?php

try{
    foreach($pdo->query('SELECT type from showTypes')as$a){
        echo $a["type"].'<br>';
    }
    //$pdo = null; 
}catch(PDOException $e){
    echo "Erreur!:".$e->getMessage()."<br/>";
     die(); 
   }
?>
<h1>3 Afficher les 20 premiers clients.</h1>
<?php
  try{
    foreach($pdo->query('SELECT lastName , firstName from clients LIMIT 20')as$a){
       
        echo $a["lastName"]."".$a["firstName"].'<br>';
    }
    //$pdo = null; 
}catch(PDOException $e){
    echo "Erreur!:".$e->getMessage()."<br/>";
     die(); 
   }   
//var_dump pour rechercher dans le tableau
?>
<h1>4 N'afficher que les clients possédant une carte de fidélité.</h1>
<?php

try{
    foreach($pdo->query('SELECT* from clients WHERE cardNumber IS NOT NULL')as$a){
        //print_r($a);
        echo $a["lastName"]."".$a["firstName"]."<br>";
    }
    
}catch(PDOException $e){
    echo "Erreur!:".$e->getMessage()."<br/>";
     die(); 
   } 
   ?>
  
   <h1>5 Afficher uniquement le nom et le prénom de tous les clients dont le nom commence par la 
   lettre "M".
Les afficher comme ceci :

Nom : *Nom du client*
Prénom : *Prénom du client*

Trier les noms par ordre alphabétique.</h1>

<?php 
   try{
    foreach($pdo->query("SELECT*FROM clients WHERE lastName LIKE 'M%'ORDER BY lastName ASC")as$a){
        echo "Nom :".$a["lastName"].'<br>'."Prénom : ".$a["firstName"].'<br>';
    }
    //$pdo = null;  
}catch(PDOException $e){
    echo "Erreur!:".$e->getMessage()."<br/>";
     die(); 
   }   


?>
<h1>6 Afficher le titre de tous les spectacles ainsi que l'artiste, la date et l'heure. 
Trier les titres par ordre alphabétique. Afficher les résultat comme ceci : 
*Spectacle* par *artiste*, le *date* à *heure*.</h1>
<?php
   try{
    foreach($pdo->query('SELECT*FROM shows ORDER BY title ASC')as$a){
        echo $a["title"]." "."par"." ".$a["performer"]." "."le"." ".$a["date"]." "."à"." ".$a["startTime"].'<br>';
    }
    //$pdo = null; 
}catch(PDOException $e){
    echo "Erreur!:".$e->getMessage()."<br/>";
     die(); 
   }   
   ?>

   <h1>7 Afficher tous les clients comme ceci :
Nom : *Nom de famille du client*
Prénom : *Prénom du client*
Date de naissance : *Date de naissance du client*
Carte de fidélité : *Oui (Si le client en possède une) ou Non (s'il n'en possède pas)*
Numéro de carte : *Numéro de la carte fidélité du client s'il en possède une.*</h1>

<?php
  try{
    foreach($pdo->query('SELECT*FROM clients ')as$a){ 
        
    echo "Nom :"." ".$a["lastName"]." ". "Prénom : "." ".$a["firstName"]." "."Date de naissance :"." " .$a["birthDate"]; 
    if ($a['card'] == 0){
        echo "carte de fidélité"." ". "non";
    } else {
        echo "carte de fidélité"." ". "oui"."Numéro de carte : ". $a["cardNumber"];

    }
    
    
    echo '<br>';
    }
    //$pdo = null; 
}catch(PDOException $e){
 echo "Erreur!:".$e->getMessage()."<br/>";
  die(); 
}
   ?>
</body>
</html>
