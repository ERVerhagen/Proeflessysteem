<?php

namespace ProeflesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

/**
 * locatie
 *
 * @ORM\Table(name="locatie")
 * @ORM\Entity(repositoryClass="ProeflesBundle\Repository\locatieRepository")
 */
class locatie
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
     * @ORM\Column(name="stad", type="string", length=20)
     */
    private $stad;

    /**
     * @var string
     *
     * @ORM\Column(name="adres", type="string", length=20)
     */
    private $adres;

    /**
     * @var string
     *
     * @ORM\Column(name="postcode", type="string", length=20)
     */
    private $postcode;

    /**
     * @var string
     *
     * @ORM\Column(name="img", type="string", length=255)
     */
    private $img;

    /**
     * @var string
     *
     * @ORM\Column(name="memo", type="string", length=255)
     */
    private $memo;


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
     * Set stad
     *
     * @param string $stad
     *
     * @return locatie
     */
    public function setStad($stad)
    {
        $this->stad = $stad;

        return $this;
    }

    /**
     * Get stad
     *
     * @return string
     */
    public function getStad()
    {
        return $this->stad;
    }

    /**
     * Set adres
     *
     * @param string $adres
     *
     * @return locatie
     */
    public function setAdres($adres)
    {
        $this->adres = $adres;

        return $this;
    }

    /**
     * Get adres
     *
     * @return string
     */
    public function getAdres()
    {
        return $this->adres;
    }

    /**
     * Set postcode
     *
     * @param string $postcode
     *
     * @return locatie
     */
    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;

        return $this;
    }

    /**
     * Get postcode
     *
     * @return string
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * Set img
     *
     * @param string $img
     *
     * @return locatie
     */
    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }

    /**
     * Get img
     *
     * @return string
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * Set memo
     *
     * @param string $memo
     *
     * @return locatie
     */
    public function setMemo($memo)
    {
        $this->memo = $memo;

        return $this;
    }

    /**
     * Get memo
     *
     * @return string
     */
    public function getMemo()
    {
        return $this->memo;
    }
}

