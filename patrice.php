<?php

function Patrice($matchesNumber,$matches){

// Tous les cas possible selon le nombre d'allumettes restantes, calculated value = nombre que l'ia va retirer
// Ici on a crée une formule pour simplifier et généraliser
        switch ($matchesNumber) {
            case 0:
            $calculatedValue = 0;
            break;
            case ($matchesNumber % 4) ==  1:
            $calculatedValue = 1;
                break;
            case ($matchesNumber % 4) ==  2:
            $calculatedValue = 1;
                break;
            case ($matchesNumber % 4) ==  3:
            $calculatedValue = 2;
                break;
            case ($matchesNumber % 4) ==  0:
            $calculatedValue = 3;
                break;
            }

        echo"...".PHP_EOL;
        echo "Patrice retire ".$calculatedValue." allumettes".PHP_EOL;
        echo"...".PHP_EOL;

        $matchesNumber -= $calculatedValue;
        $matches =  substr($matches, 1, $matchesNumber);
        echo "Il reste ".$matchesNumber. " allumettes".PHP_EOL;
        echo PHP_EOL;
        echo $matches.PHP_EOL;
        echo PHP_EOL;
        // on retourne le nombre d'allumettes pour pouvoir actualiser le nombre en dehors de la fonction
        return $matchesNumber;
    }