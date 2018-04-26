<?php

namespace ProeflesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * inschrijving
 *
 * @ORM\Table(name="inschrijving")
 * @ORM\Entity(repositoryClass="ProeflesBundle\Repository\inschrijvingRepository")
 */
class inschrijving
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
     * @ORM\ManyToOne(targetEntity="ProeflesBundle\Entity\lessen")
     * @ORM\JoinColumn(name="les_nr", referencedColumnName="id")
     *
     */
    private $lesNr;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="ProeflesBundle\Entity\locatie")
     * @ORM\JoinColumn(name="locatie_nr", referencedColumnName="id")
     *
     */
    private $locatieNr;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=50)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="telefoon", type="string", length=20)
     */
    private $telefoon;

    /**
     * @var string
     *
     * @ORM\Column(name="via", type="string", length=30)
     */
    private $via = 0;

    /**
     * @var int
     *
     * @ORM\Column(name="gebeld", type="integer", nullable=true, options={"default" : 0})
     */
    private $gebeld = 0;

    /**
     * @var int
     *
     * @ORM\Column(name="bevestigd", type="integer", nullable=true, options={"default" : 0})
     */
    private $bevestigd = 0;

    /**
     * @var int
     *
     * @ORM\Column(name="aanwezig", type="integer", nullable=true, options={"default" : 0})
     */
    private $aanwezig = 0;

    /**
     * @var int
     *
     * @ORM\Column(name="ingeschreven", type="integer", nullable=true, options={"default" : 0})
     */
    private $ingeschreven = 0;

    /**
     * @var int
     *
     * @ORM\Column(name="afgezegd", type="integer", nullable=true, options={"default" : 0})
     */
    private $afgezegd = 0;

    /**
     * @var int
     *
     * @ORM\Column(name="sms", type="integer", nullable=true, options={"default" : 0})
     */
    private $sms = 0;

    /**
     * @var string
     *
     * @ORM\Column(name="ip_adres", type="string", length=30, nullable=true, options={"default" : 0})
     */
    private $ipAdres = 0;

    /**
     * @var string
     *
     * @ORM\Column(name="apparaat", type="string", length=30, nullable=true, options={"default" : 0})
     */
    private $apparaat = 0;

    /**
     * @var string
     *
     * @ORM\Column(name="browser", type="string", length=30, nullable=true, options={"default" : 0})
     */
    private $browser = 0;


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
     * Set lesNr
     *
     * @param integer $lesNr
     *
     * @return inschrijving
     */
    public function setLesNr($lesNr)
    {
        $this->lesNr = $lesNr;

        return $this;
    }

    /**
     * Get lesNr
     *
     * @return int
     */
    public function getLesNr()
    {
        return $this->lesNr;
    }

    /**
     * Set locatieNr
     *
     * @param integer $locatieNr
     *
     * @return inschrijving
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
     * Set email
     *
     * @param string $email
     *
     * @return inschrijving
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set telefoon
     *
     * @param string $telefoon
     *
     * @return inschrijving
     */
    public function setTelefoon($telefoon)
    {
        $this->telefoon = $telefoon;

        return $this;
    }

    /**
     * Get telefoon
     *
     * @return string
     */
    public function getTelefoon()
    {
        return $this->telefoon;
    }

    /**
     * Set via
     *
     * @param string $via
     *
     * @return inschrijving
     */
    public function setVia($via)
    {
        $this->via = $via;

        return $this;
    }

    /**
     * Get via
     *
     * @return string
     */
    public function getVia()
    {
        return $this->via;
    }

    /**
     * Set gebeld
     *
     * @param integer $gebeld
     *
     * @return inschrijving
     */
    public function setGebeld($gebeld)
    {
        $this->gebeld = $gebeld;

        return $this;
    }

    /**
     * Get gebeld
     *
     * @return int
     */
    public function getGebeld()
    {
        return $this->gebeld;
    }

    /**
     * Set bevestigd
     *
     * @param integer $bevestigd
     *
     * @return inschrijving
     */
    public function setBevestigd($bevestigd)
    {
        $this->bevestigd = $bevestigd;

        return $this;
    }

    /**
     * Get bevestigd
     *
     * @return int
     */
    public function getBevestigd()
    {
        return $this->bevestigd;
    }

    /**
     * Set aanwezig
     *
     * @param integer $aanwezig
     *
     * @return inschrijving
     */
    public function setAanwezig($aanwezig)
    {
        $this->aanwezig = $aanwezig;

        return $this;
    }

    /**
     * Get aanwezig
     *
     * @return int
     */
    public function getAanwezig()
    {
        return $this->aanwezig;
    }

    /**
     * Set ingeschreven
     *
     * @param integer $ingeschreven
     *
     * @return inschrijving
     */
    public function setIngeschreven($ingeschreven)
    {
        $this->ingeschreven = $ingeschreven;

        return $this;
    }

    /**
     * Get ingeschreven
     *
     * @return int
     */
    public function getIngeschreven()
    {
        return $this->ingeschreven;
    }

    /**
     * Set afgezegd
     *
     * @param integer $afgezegd
     *
     * @return inschrijving
     */
    public function setAfgezegd($afgezegd)
    {
        $this->afgezegd = $afgezegd;

        return $this;
    }

    /**
     * Get afgezegd
     *
     * @return int
     */
    public function getAfgezegd()
    {
        return $this->afgezegd;
    }

    /**
     * Set sms
     *
     * @param integer $sms
     *
     * @return inschrijving
     */
    public function setSms($sms)
    {
        $this->sms = $sms;

        return $this;
    }

    /**
     * Get sms
     *
     * @return int
     */
    public function getSms()
    {
        return $this->sms;
    }

    /**
     * Set ipAdres
     *
     * @param string $ipAdres
     *
     * @return inschrijving
     */
    public function setIpAdres($ipAdres)
    {
        $this->ipAdres = $ipAdres;

        return $this;
    }

    /**
     * Get ipAdres
     *
     * @return string
     */
    public function getIpAdres()
    {
        return $this->ipAdres;
    }

    /**
     * Set apparaat
     *
     * @param string $apparaat
     *
     * @return inschrijving
     */
    public function setApparaat($apparaat)
    {
        $this->apparaat = $apparaat;

        return $this;
    }

    /**
     * Get apparaat
     *
     * @return string
     */
    public function getApparaat()
    {
        return $this->apparaat;
    }

    /**
     * Set browser
     *
     * @param string $browser
     *
     * @return inschrijving
     */
    public function setBrowser($browser)
    {
        $this->browser = $browser;

        return $this;
    }

    /**
     * Get browser
     *
     * @return string
     */
    public function getBrowser()
    {
        return $this->browser;
    }
}

