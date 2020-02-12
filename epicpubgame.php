<?php
include "bernard.php";
include "patrice.php";
include "mireille.php";
include "josianne.php";

// on vérifie que la difficulté est 1 ou 2

if(!isset($argv[1]) || (!is_numeric($argv[1]) || $argv[1] < 1 || $argv[1] > 4)){
    // S la difficulté séléctionnée n'existe pas
    echo PHP_EOL."Veuillez entrer un chiffre entre 1 et 4 inclus comme paramètre pour définir le niveau de difficulté.
    1: Bernard est malin mais pas imbattable.
    2: Patrice est un clone de bernard mais ne possède pas le meme ADN.
    3: Mireille veut toujours commencer, elle ne laisse gagner personne.
    4: Josianne est cool et arrangeante.".PHP_EOL.PHP_EOL;

}
else {
    $difficulty = $argv[1];

    $matchesNumber = 11;
    $matches = "|||||||||||";

    if($difficulty == 4){
        $matchesNumber = readline("Avec combien d'allumettes tu veux jouer?: ");
        while(!is_numeric($matchesNumber) || ($matchesNumber < 2 || $matchesNumber > 100)){    
                $matchesNumber = readline("Veuillez entrer un nombre entre 2 et 100: ");
            }
        
        if((is_numeric($matchesNumber) && $matchesNumber > 2 && $matchesNumber < 101)){
            for($i=0;$i < $matchesNumber; $i++){
                echo "lol";
                $matches =$matches."|";
            }
        }
    }

    echo PHP_EOL."========================================================".PHP_EOL;
    echo "Bienvenue dans le meilleur jeu d'allumettes' 2019.".PHP_EOL;
    echo "========================================================".PHP_EOL;    
    switch ($difficulty) {
        case "1":
        echo PHP_EOL."*Un certain Bernard vous accoste.*".PHP_EOL;
        $name = "Bernard";
            break;
        case "2":
        echo PHP_EOL."*Un certain Patrice vous accoste.*".PHP_EOL;
        $name = "Patrice";
            break;
        case "3":
        echo PHP_EOL."*Une certaine Mireille vous accoste.*".PHP_EOL;
        $name = "Mireille";
            break;
            case "4":
        echo PHP_EOL."*Une certaine Josianne vous accoste.*".PHP_EOL;
        $name = "Josianne";
            break;
    }
    echo PHP_EOL;
    echo "-------------------------------------------------------------------------------".PHP_EOL;
    echo "Salut moi c'est $name. Alors c'est pas compliqué, tu as ".$matchesNumber." allumettes, tu peux en enlever 1 à 3 chaque 
tours, si tu prends la dernière tu as perdu. C'est parti..".PHP_EOL;
    echo "-------------------------------------------------------------------------------".PHP_EOL.PHP_EOL;
    echo $matches.PHP_EOL.PHP_EOL;


//=======================
// FIN DU SETUP
//=======================

// premiere demande de retrait
    if($difficulty == 3 || $difficulty == 4){
        $matchesNumber = $name($matchesNumber,$matches);
    }
    $promptLine = "Combien tu veux en retirer?(1/2/3): ";
    $promptSubmited = readline($promptLine);


// boucle de demarrage après le premier retrait
    while($matchesNumber > 0){ 
        // Verification si la valeur n'est pas un chiffre
        if(!is_numeric($promptSubmited)){
            echo"...".PHP_EOL;
            echo "Donnes moi plutot un chiffre: ".PHP_EOL;
            echo"...".PHP_EOL;
            echo "Il reste ".$matchesNumber. " allumettes".PHP_EOL;
            echo PHP_EOL;
            echo $matches.PHP_EOL;
            echo PHP_EOL;
            $promptSubmited = readline($promptLine);
        }
        // Verification si la valeur n'est pas le bon chiffre
        if((is_numeric($promptSubmited) && $promptSubmited > 3) || (is_numeric($promptSubmited) && $promptSubmited < 1)){
            echo"...".PHP_EOL;
            echo "J'ai dis 1 à 3, ".$promptSubmited." c'est pas entre 1 et 3.".PHP_EOL;
            echo"...".PHP_EOL;
            echo "Il reste ".$matchesNumber. " allumettes".PHP_EOL;
            echo PHP_EOL;
            echo $matches.PHP_EOL;
            echo PHP_EOL;
            $promptSubmited = readline($promptLine);        
        }
        // Verification si la valeur est le bon chiffre 
        if(($promptSubmited == 1 || $promptSubmited == 2 || $promptSubmited == 3 && $matchesNumber > 0)){
            // Cas ou l'on retire + que restant.
            if(($matchesNumber-$promptSubmited) <0){
                echo PHP_EOL."Vous ne pouvez pas retirer davantage d'allumettes qu'l n'en reste ".PHP_EOL;
                $promptSubmited = readline("Combien d'allumettes souhaitez vous retirer?: ");        
            }
            // Cas ou on prend toute les allumettes
            if(($matchesNumber-$promptSubmited) == 0){

                echo"...".PHP_EOL;
                echo "Tu retires ".$promptSubmited." allumettes".PHP_EOL;
                echo"...".PHP_EOL;
                
                $matchesNumber -= $promptSubmited;
                $matches =  substr($matches, 1, $matchesNumber);
                echo "Il reste ".$matchesNumber. " allumettes".PHP_EOL;
                echo PHP_EOL;
                echo $matches.PHP_EOL;
                echo PHP_EOL;

                echo "Tu as perdu!";
            }
            // Cas ou il reste une seule alumette
            if(($matchesNumber-$promptSubmited) == 1){
                echo"...".PHP_EOL;
                echo "Tu retires ".$promptSubmited." allumettes".PHP_EOL;
                echo"...".PHP_EOL;
                
                $matchesNumber -= $promptSubmited;
                $matches =  substr($matches, 1, $matchesNumber);
                echo "Il reste ".$matchesNumber. " allumettes".PHP_EOL;
                echo PHP_EOL;
                echo $matches.PHP_EOL;
                echo PHP_EOL;
                // on appelle dynamiquement la fonction IA pour jouer son tour et actualiser le nombre d'allumettes
                $matchesNumber = $name($matchesNumber,$matches);

                echo PHP_EOL."Bien joué vous avez gagné!".PHP_EOL;
            }
            // Cas ou il reste + d'une allumette
            if(($matchesNumber-$promptSubmited) >1){
                echo"...".PHP_EOL;
                echo "Tu retires ".$promptSubmited." allumettes".PHP_EOL;
                echo"...".PHP_EOL;
                
                $matchesNumber -= $promptSubmited;
                $matches =  substr($matches, 1, $matchesNumber);
                echo "Il reste ".$matchesNumber. " allumettes".PHP_EOL;
                echo PHP_EOL;
                echo $matches.PHP_EOL;
                echo PHP_EOL;

                $matchesNumber = $name($matchesNumber,$matches);
                
                // Apres le tour de l'IA on verifie combien d'allumettes il reste
                // Si il reste une allumette
                if($matchesNumber == 1){
                    echo PHP_EOL."Tu es forcé de prendre la dernière, c'est un echec.".PHP_EOL.PHP_EOL;
                    break;
                }
                // Si il reste 0 allumettes
                if($matchesNumber == 0){
                    
                    echo PHP_EOL."Bien joué, tu as triomphé!".PHP_EOL;
                    break;
                }
                // Si il reste + d'une allumettes
                if($matchesNumber > 1){
                    echo PHP_EOL;
                    $promptSubmited = readline("Combien d'allumettes souhaitez-vous retirer?: ");
                    echo PHP_EOL;
                }
            }
        }
    }
}