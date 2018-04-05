<?php

namespace ProeflesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Location
 *
 * @ORM\Table(name="locations")
 * @ORM\Entity(repositoryClass="ProeflesBundle\Repository\LocationsRepository")
 */
class Location
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
     * @ORM\Column(name="Location_city", type="string", length=255)
     */
    private $locationCity;

    /**
     * @var string
     *
     * @ORM\Column(name="Location_adress", type="string", length=255)
     */
    private $locationAdress;

    /**
     * @var string
     *
     * @ORM\Column(name="Location_zip", type="string", length=255)
     */
    private $locationZip;


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
     * Set locationCity
     *
     * @param string $locationCity
     *
     * @return Location
     */
    public function setLocationCity($locationCity)
    {
        $this->locationCity = $locationCity;

        return $this;
    }

    /**
     * Get locationCity
     *
     * @return string
     */
    public function getLocationCity()
    {
        return $this->locationCity;
    }

    /**
     * Set locationAdress
     *
     * @param string $locationAdress
     *
     * @return Location
     */
    public function setLocationAdress($locationAdress)
    {
        $this->locationAdress = $locationAdress;

        return $this;
    }

    /**
     * Get locationAdress
     *
     * @return string
     */
    public function getLocationAdress()
    {
        return $this->locationAdress;
    }

    /**
     * Set locationZip
     *
     * @param string $locationZip
     *
     * @return Location
     */
    public function setLocationZip($locationZip)
    {
        $this->locationZip = $locationZip;

        return $this;
    }

    /**
     * Get locationZip
     *
     * @return string
     */
    public function getLocationZip()
    {
        return $this->locationZip;
    }

    /**
     * Generates the magic method
     *
     */
    public function __toString(){
        $Fulladress = $this->locationCity;
        $Fulladress .= ", ".$this->locationAdress;
        // to show the name of the Category in the select
        return $Fulladress;
        // to show the id of the Category in the select
        // return $this->id;
    }
}

