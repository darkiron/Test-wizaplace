<?php


namespace AppBundle\Registry;

use AppBundle\Calculator\CalculatorInterface;
use AppBundle\Registry\CalculatorRegistryInterface;

class CalculatorRegistry implements  CalculatorRegistryInterface
{
    public function getCalculatorFor(string $model): ?CalculatorInterface
    {
        $class = sprintf('AppBundle\Calculator\%sCalculator', ucfirst($model));

        if (class_exists($class)){
            return (new $class);
        }
        return null;
    }
}