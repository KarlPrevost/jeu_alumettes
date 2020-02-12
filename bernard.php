<?php

function Bernard($matchesNumber,$matches){

// Tous les cas possible selon le nombre d'allumettes restantes, calculated value = nombre que l'ia va retirer
        switch ($matchesNumber) {
            case 0:
            $calculatedValue = 0;
            break;
            case 1:
            $calculatedValue = 1;
                break;
            case 2:
            $calculatedValue = 1;
                break;
            case 3:
            $calculatedValue = 2;
                break;
            case 4:
            $calculatedValue = 3;
                break;
            case 5:
            $calculatedValue = 1;
                break;
            case 6:
            $calculatedValue = 1;
                break;
            case 7:
            $calculatedValue = 2;
                break;
            case 8:
            $calculatedValue = 3;
                break;
            case 9:
            $calculatedValue = 1;
                break;
            case 10:
            $calculatedValue = 1;
                break;
            case 11:
            $calculatedValue = 2;
                break;
            }

        echo"...".PHP_EOL;
        echo "Bernard retire ".$calculatedValue." allumettes".PHP_EOL;
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