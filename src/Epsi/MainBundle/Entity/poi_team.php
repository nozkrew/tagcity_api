<?php

namespace Epsi\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;

/**
 * poi_team
 *
 * @ORM\Table(name="poi_team")
 * @ORM\Entity(repositoryClass="Epsi\MainBundle\Repository\poi_teamRepository")
 */
class poi_team implements JsonSerializable
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="point", type="integer")
     */
    private $point;
    
    /**
     * @ORM\ManyToOne(targetEntity="Epsi\MainBundle\Entity\Team", inversedBy="poiTeam")
     */
    private $team;
    
    /**
     * @ORM\ManyToOne(targetEntity="Epsi\MainBundle\Entity\PointOfInterest", inversedBy="poiTeam")
     */
    private $pointOfInterest;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set point
     *
     * @param integer $point
     *
     * @return poi_team
     */
    public function setPoint($point)
    {
        $this->point = $point;

        return $this;
    }

    /**
     * Get point
     *
     * @return int
     */
    public function getPoint()
    {
        return $this->point;
    }

    /**
     * Set team
     *
     * @param \Epsi\MainBundle\Entity\Team $team
     *
     * @return poi_team
     */
    public function setTeam(\Epsi\MainBundle\Entity\Team $team = null)
    {
        $this->team = $team;

        return $this;
    }

    /**
     * Get team
     *
     * @return \Epsi\MainBundle\Entity\Team
     */
    public function getTeam()
    {
        return $this->team;
    }

    /**
     * Set pointOfInterest
     *
     * @param \Epsi\MainBundle\Entity\PointOfInterest $pointOfInterest
     *
     * @return poi_team
     */
    public function setPointOfInterest(\Epsi\MainBundle\Entity\PointOfInterest $pointOfInterest = null)
    {
        $this->pointOfInterest = $pointOfInterest;

        return $this;
    }

    /**
     * Get pointOfInterest
     *
     * @return \Epsi\MainBundle\Entity\PointOfInterest
     */
    public function getPointOfInterest()
    {
        return $this->pointOfInterest;
    }
    
    public function jsonSerialize() {
        return array(
            'point' => $this->point,
            'team' => $this->team,
            'pointOfInterest' => $this->pointOfInterest
        );
    }
}
