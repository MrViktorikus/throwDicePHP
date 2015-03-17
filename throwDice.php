<?php

class Dice {

    protected $diceSides;

    public function __construct($diceSides = 6) {
        $this->diceSides = $diceSides;
    }

    public function rollDice($diceRoll = 1) {
        $rolledDice = array();
        for ($i = 0; $i < $diceRoll; $i++) {
            $sideRolled = rand(1, $this->diceSides);
            $rolledDice["dice"][] = $sideRolled;
        }
        $rolledDice["sum"] = array_sum($rolledDice["dice"]);
        $rolledDice["sides"] = $this->diceSides;
        $rolledDice["rolls"] = $diceRoll;

        return rolledDice;
    }

}
