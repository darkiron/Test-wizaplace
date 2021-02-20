<?php


namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Registry\CalculatorRegistryInterface;

class AutomatonController extends Controller
{

    /**
     * @Route("/automaton/{modele}/change/{change}", name="automaton_change", methods={"GET"})
     * @param $modele
     * @param $change
     * @param CalculatorRegistryInterface $calculatorRegistry
     * @return Response
     */
    public function automatonChange (CalculatorRegistryInterface $calculatorRegistry, $modele, $change) :Response {
        $automaton = $calculatorRegistry->getCalculatorFor($modele);

        if ($automaton !== null){
            $done = $automaton->getChange($change);
            if (null === $done){
                return new Response(null,204);
            }
            return new Response(
                "{\"bill10\": $done->bill10, \"bill5\": $done->bill5, \"coin2\": $done->coin2 , \"coin1\": $done->coin1 }",
                200
            );
        }

        return new Response(sprintf('automaton model : %s does not exist!', $modele), 404);
    }
}