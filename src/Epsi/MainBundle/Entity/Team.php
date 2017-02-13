<?php

namespace Epsi\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Team
 *
 * @ORM\Table(name="team")
 * @ORM\Entity(repositoryClass="Epsi\MainBundle\Repository\TeamRepository")
 */
class Team
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=255)
     */
    private $color;
    
    /**
     * @ORM\OneToMany(targetEntity="Epsi\MainBundle\Entity\Team", mappedBy="team")
     */
    private $users;
    
    /**
     * @ORM\OneToMany(targetEntity="Epsi\MainBundle\Entity\poi_team", mappedBy="team")
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
     * Set name
     *
     * @param string $name
     *
     * @return Team
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set color
     *
     * @param string $color
     *
     * @return Team
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
        $this->poiTeam = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add user
     *
     * @param \Epsi\MainBundle\Entity\Team $user
     *
     * @return Team
     */
    public function addUser(\Epsi\MainBundle\Entity\Team $user)
    {
        $this->users[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \Epsi\MainBundle\Entity\Team $user
     */
    public function removeUser(\Epsi\MainBundle\Entity\Team $user)
    {
        $this->users->removeElement($user);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Add poiTeam
     *
     * @param \Epsi\MainBundle\Entity\poi_team $poiTeam
     *
     * @return Team
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
}
