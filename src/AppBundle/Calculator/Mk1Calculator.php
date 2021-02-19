<?php

namespace  AppBundle\Calculator;

use AppBundle\Calculator\CalculatorInterface;
use AppBundle\Model\Change;


class Mk1Calculator implements CalculatorInterface {

    public function getChange(int $amount): ?Change
    {
        if ($amount === 0) return null;

        $change = (new Change);
        $change->coin1 = $amount;
        return $change;
    }

    public function getSupportedModel(): string
    {
        return 'mk1';
    }

}