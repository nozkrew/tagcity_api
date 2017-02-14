<?php

namespace Epsi\MainBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Epsi\MainBundle\Entity\PointOfInterest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Epsi\MainBundle\Entity\Team;

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
    
    /**
     * @Route("/{id}/team/{idTeam}")
     * @ParamConverter("poi", class="EpsiMainBundle:PointOfInterest")
     * @ParamConverter("team", class="EpsiMainBundle:Team")
     */
    public function getPointAction(PointOfInterest $poi, Team $team){
        $poiTeam = $this->getPoiTeamRepository()->findOneBy(array(
            'team' => $team,
            'pointOfInterest' => $poi
        ));
        
        return new JsonResponse($poiTeam);
    }


    private function getPoiRepository(){
        return $this->getDoctrine()->getRepository("EpsiMainBundle:PointOfInterest");
    }
    
    private function getPoiTeamRepository(){
        return $this->getDoctrine()->getRepository("EpsiMainBundle:poi_team");
    }
}
