<?php

namespace Epsi\MainBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Epsi\MainBundle\Entity\PointOfInterest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

/**
 * @Route("/poi")
 */
class PointOfInterestController extends Controller
{

    /**
     * @Route("/list")
     */
    public function getPoiAction(){
        $pois = $this->getPoiRepository()->findAll();
        return new JsonResponse($pois);
    }
    
    /**
     * @Route("/{id}")
     * @ParamConverter("poi", class="EpsiMainBundle:PointOfInterest")
     */
    public function getOnePoiAction(PointOfInterest $poi){
        return new JsonResponse($poi);
    }


    private function getPoiRepository(){
        return $this->getDoctrine()->getRepository("EpsiMainBundle:PointOfInterest");
    }
}
