<?php

namespace ProeflesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * categorie
 *
 * @ORM\Table(name="categorie")
 * @ORM\Entity(repositoryClass="ProeflesBundle\Repository\categorieRepository")
 */
class categorie
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
     * @ORM\Column(name="omschrijving", type="string", length=255)
     */
    private $omschrijving;

    /**
     * @var int
     *
     * @ORM\Column(name="max_lessen", type="integer")
     */
    private $maxLessen;


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
     * Set omschrijving
     *
     * @param string $omschrijving
     *
     * @return categorie
     */
    public function setOmschrijving($omschrijving)
    {
        $this->omschrijving = $omschrijving;

        return $this;
    }

    /**
     * Get omschrijving
     *
     * @return string
     */
    public function getOmschrijving()
    {
        return $this->omschrijving;
    }

    /**
     * Set maxLessen
     *
     * @param integer $maxLessen
     *
     * @return categorie
     */
    public function setMaxLessen($maxLessen)
    {
        $this->maxLessen = $maxLessen;

        return $this;
    }

    /**
     * Get maxLessen
     *
     * @return int
     */
    public function getMaxLessen()
    {
        return $this->maxLessen;
    }
}

