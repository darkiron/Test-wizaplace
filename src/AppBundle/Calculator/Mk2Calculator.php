<?php

namespace  AppBundle\Calculator;

use AppBundle\Calculator\CalculatorInterface;
use AppBundle\Model\Change;

class Mk2Calculator implements CalculatorInterface {

    public function getChange(int $amount): ?Change
    {
        if ($amount === 0 || $amount === 1) return null;

        $change = (new Change);

        if ($amount >= 10){
            $change->bill10 = intdiv($amount,10);
            $amount = $amount - ($change->bill10 * 10);
        }

        if ($amount >= 5){
            $change->bill5 = intdiv($amount,5);
            $amount = $amount - ($change->bill10 * 5);
        }

        if ($amount >= 2){
            //var_dump(intdiv($amount,2));die;
            $change->coin2 = intdiv($amount,2);
            // var_dump($change);
        }

        return $change;
    }

    public function getSupportedModel(): string
    {
        return 'mk2';
    }

}