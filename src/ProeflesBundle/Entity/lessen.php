<?php

namespace ProeflesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * lessen
 *
 * @ORM\Table(name="lessen")
 * @ORM\Entity(repositoryClass="ProeflesBundle\Repository\lessenRepository")
 */
class lessen
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
     *  @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumn(name="leraar_nr", referencedColumnName="id")
     *
     */
    private $leraarNr;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="ProeflesBundle\Entity\locatie")
     * @ORM\JoinColumn(name="locatie_nr", referencedColumnName="id")
     *
     */
    private $locatieNr;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="ProeflesBundle\Entity\categorie")
     * @ORM\JoinColumn(name="categorie_nr", referencedColumnName="id")
     *
     */
    private $categorieNr;

    /**
     * @var string
     *
     * @ORM\Column(name="weekdag", type="string", length=20)
     */
    private $weekdag;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="begintijd", type="time")
     */
    private $begintijd;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="eindtijd", type="time")
     */
    private $eindtijd;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="startdatum", type="date")
     */
    private $startdatum;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="einddatum", type="date")
     */
    private $einddatum;

    /**
     * @var string
     *
     * @ORM\Column(name="info", type="string", length=255)
     */
    private $info;

    /**
     * @var int
     *
     * @ORM\Column(name="actief", type="integer")
     */
    private $actief;


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
     * Set leraarNr
     *
     * @param integer $leraarNr
     *
     * @return lessen
     */
    public function setLeraarNr($leraarNr)
    {
        $this->leraarNr = $leraarNr;

        return $this;
    }

    /**
     * Get leraarNr
     *
     * @return int
     */
    public function getLeraarNr()
    {
        return $this->leraarNr;
    }

    /**
     * Set locatieNr
     *
     * @param integer $locatieNr
     *
     * @return lessen
     */
    public function setLocatieNr($locatieNr)
    {
        $this->locatieNr = $locatieNr;

        return $this;
    }

    /**
     * Get locatieNr
     *
     * @return int
     */
    public function getLocatieNr()
    {
        return $this->locatieNr;
    }

    /**
     * Set categorieNr
     *
     * @param integer $categorieNr
     *
     * @return lessen
     */
    public function setCategorieNr($categorieNr)
    {
        $this->categorieNr = $categorieNr;

        return $this;
    }

    /**
     * Get categorieNr
     *
     * @return int
     */
    public function getCategorieNr()
    {
        return $this->categorieNr;
    }

    /**
     * Set weekdag
     *
     * @param string $weekdag
     *
     * @return lessen
     */
    public function setWeekdag($weekdag)
    {
        $this->weekdag = $weekdag;

        return $this;
    }

    /**
     * Get weekdag
     *
     * @return string
     */
    public function getWeekdag()
    {
        return $this->weekdag;
    }

    /**
     * Set begintijd
     *
     * @param \DateTime $begintijd
     *
     * @return lessen
     */
    public function setBegintijd($begintijd)
    {
        $this->begintijd = $begintijd;

        return $this;
    }

    /**
     * Get begintijd
     *
     * @return \DateTime
     */
    public function getBegintijd()
    {
        return $this->begintijd;
    }

    /**
     * Set eindtijd
     *
     * @param \DateTime $eindtijd
     *
     * @return lessen
     */
    public function setEindtijd($eindtijd)
    {
        $this->eindtijd = $eindtijd;

        return $this;
    }

    /**
     * Get eindtijd
     *
     * @return \DateTime
     */
    public function getEindtijd()
    {
        return $this->eindtijd;
    }

    /**
     * Set startdatum
     *
     * @param \DateTime $startdatum
     *
     * @return lessen
     */
    public function setStartdatum($startdatum)
    {
        $this->startdatum = $startdatum;

        return $this;
    }

    /**
     * Get startdatum
     *
     * @return \DateTime
     */
    public function getStartdatum()
    {
        return $this->startdatum;
    }

    /**
     * Set einddatum
     *
     * @param \DateTime $einddatum
     *
     * @return lessen
     */
    public function setEinddatum($einddatum)
    {
        $this->einddatum = $einddatum;

        return $this;
    }

    /**
     * Get einddatum
     *
     * @return \DateTime
     */
    public function getEinddatum()
    {
        return $this->einddatum;
    }

    /**
     * Set info
     *
     * @param string $info
     *
     * @return lessen
     */
    public function setInfo($info)
    {
        $this->info = $info;

        return $this;
    }

    /**
     * Get info
     *
     * @return string
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * Set actief
     *
     * @param integer $actief
     *
     * @return lessen
     */
    public function setActief($actief)
    {
        $this->actief = $actief;

        return $this;
    }

    /**
     * Get actief
     *
     * @return int
     */
    public function getActief()
    {
        return $this->actief;
    }
}

