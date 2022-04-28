<?php

/**
 * Vous organisez un tournoi d’échecs dans lequel les joueurs s'affronteront en duel.
 * Pour former les duels on procède ainsi : d'abord on tire au hasard un joueur, ensuite on tire au hasard son opposant parmi les joueurs restants. Cette paire forme un des duels du tournoi. On procède de la même manière pour former toutes les paires.
 * Dans cet exercice, on souhaiterait connaître le nombre de paires qu'il est possible d'obtenir sachant que l'ordre des opposants dans une paire n'a pas d'importance.
 * Par exemple, avec 4 joueurs nommés A, B, C et D, il est possible d'obtenir 6 paires différentes : AB, AC, AD, BC, BD, CD.
 * Implémentez count() pour retourner le nombre de paires possibles. Le paramètre n correspond au nombre de joueurs.
 * Essayez d'optimiser votre solution pour que, dans l'idéal, la durée de traitement soit la même quel que soit n.
 * Données : 2 <= n <= 20000

 * 
 * 
 */

function _count(int $countPlayers) {
    if ($countPlayers < 2 && $countPlayers > 2000) {
        return "Error";
    }
    $result = 0;
    for ($i = 1; $i < $countPlayers; $i++ ) {
        $result += $i;
    }
    
    return $result;
}

/**
 * Add other function to optimize the for loop in the first function
 */
function _count_optimized(int $countPlayers) {
    if ($countPlayers < 2 && $countPlayers > 2000) {
        return "Error";
    }
    $result = ($countPlayers * ($countPlayers-1)) / 2;
    return $result;
}

$val = 1000;
$res = _count($val);
$res_optimzed = _count_optimized($val);
echo $res;
echo '  ||  ';
echo $res_optimzed;
echo " (with optimized function)";
