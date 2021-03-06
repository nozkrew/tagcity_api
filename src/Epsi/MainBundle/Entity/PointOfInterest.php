<?php

namespace Epsi\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;
/**
 * PointOfInterest
 *
 * @ORM\Table(name="point_of_interest")
 * @ORM\Entity(repositoryClass="Epsi\MainBundle\Repository\PointOfInterestRepository")
 */
class PointOfInterest implements JsonSerializable
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
     * @var float
     *
     * @ORM\Column(name="latitude", type="float")
     */
    private $latitude;

    /**
     * @var float
     *
     * @ORM\Column(name="longitude", type="float")
     */
    private $longitude;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="picture", type="blob", nullable=true)
     */
    private $picture;
    
    /**
     * @ORM\OneToMany(targetEntity="Epsi\MainBundle\Entity\poi_team", mappedBy="pointOfInterest")
     */
    private $poiTeam;


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
     * Set latitude
     *
     * @param float $latitude
     *
     * @return PointOfInterest
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param float $longitude
     *
     * @return PointOfInterest
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return PointOfInterest
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set picture
     *
     * @param string $picture
     *
     * @return PointOfInterest
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get picture
     *
     * @return string
     */
    public function getPicture()
    {
        return $this->picture;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->poiTeam = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add poiTeam
     *
     * @param \Epsi\MainBundle\Entity\poi_team $poiTeam
     *
     * @return PointOfInterest
     */
    public function addPoiTeam(\Epsi\MainBundle\Entity\poi_team $poiTeam)
    {
        $this->poiTeam[] = $poiTeam;

        return $this;
    }

    /**
     * Remove poiTeam
     *
     * @param \Epsi\MainBundle\Entity\poi_team $poiTeam
     */
    public function removePoiTeam(\Epsi\MainBundle\Entity\poi_team $poiTeam)
    {
        $this->poiTeam->removeElement($poiTeam);
    }

    /**
     * Get poiTeam
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPoiTeam()
    {
        return $this->poiTeam;
    }
    
    public function jsonSerialize(){
        return array(
            'id' => $this->id,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'description' => $this->description,
            'poiTeam' => $this->poiTeam
        );
    }
}
