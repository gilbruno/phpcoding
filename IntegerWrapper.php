<?php

/**
 * La class IntegerWrapper contient différentes méthodes permettant d’exécuter des opérations sur des nombres entiers.
 * Cette classe contient un seul attribut : n de type Int qui est initialisé à l’initialisation de la classe.
 * Vous devrez coder la méthode next retournant le plus petit entier, supérieur à n ayant tous ses chiffres différents de ceux de n.
 * Par exemple IntegerWrapper(654321).next() doit retourner 700000.
 * Si un tel entier n'existe pas, alors la fonction next doit retourner -1.
 * Écrivez la méthode next() en l’intégrant à la class IntegerWrapper en utilisant le langage de programmation Swift (voir fichier annexe : IntegerWrapper.swift).
 * NB : n est un entier strictement positif inférieur à 2^31 .
 */

 
class IntegerWrapper {

    public int $initVal;
    private $arrayIntegers = [];
    private bool $canIUseZero = false;
    private $firstDigit;
    private int $minUnused;
    public int $result;
    private $integers = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];

    /**
     * Constructor that sets the initial parameter 
     */
    public function __construct($initVal) 
    {
        $this->setInitVal($initVal);
    }

    /**
     * Setter for 'initVal' property
     */
    private function setInitVal($initVal) {
        $this->initVal = $initVal;
    }

    /**
     * Find the first digit of the result
     */
    private function findFirstDigit($unusedIntegers, $arrayDigits) {
        if (in_array(0, $unusedIntegers)) {
            $this->canIUseZero = true;
            array_shift($unusedIntegers);
        }   

        $minInteger = 0;
        foreach ($unusedIntegers as $myInt) {
            if ($myInt > $arrayDigits[0]) {
                $minInteger = $myInt;
                break;
            }
        }
        $this->firstDigit = ($minInteger === 0) ? min($unusedIntegers) : $minInteger;
        $this->minUnused  = ($this->canIUseZero) ? 0: min($unusedIntegers);
    }

    /**
     * After settig all the properties we need, ths imethod compute the result
     */
    private function findResult() {
        $result = $this->firstDigit;
        $countArr = ($this->firstDigit < $this->arrayIntegers[0]) ? count($this->arrayIntegers) : count($this->arrayIntegers)-1;
        for ($i = 0; $i < $countArr; $i++ ) {
            $result .= ($this->canIUseZero) ? "0" : $this->minUnused;     
        }
        if ($result < $this->initVal) {
            $result .= ($this->canIUseZero) ? "0" : $this->minUnused;
        }

        $result = (is_int(intval($result))) ? intval($result) : -1;
        return $result;
    }

    /**
     * This function call compute the result
     */
    public function next() {
        $arrayDigits = str_split($this->initVal);
        $this->arrayIntegers = $arrayDigits;
        $unusedIntegers = [];
        foreach ($this->integers as $myInt) {
            if (!in_array($myInt, $arrayDigits)) {
                $unusedIntegers[] = $myInt;
            }
        }
        sort($unusedIntegers);
        $this->findFirstDigit($unusedIntegers, $arrayDigits);
        $this->result = $this->findResult();
    }
}

$integerWrapper = new IntegerWrapper(654320);
$integerWrapper->next();

echo $integerWrapper->result;
