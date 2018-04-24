<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @var boolean
     *
     * @ORM\Column(name="actief", type="boolean")
     *
     *
     */
    private $actief = true;

    /**
     * @return bool
     */
    public function isActief()
    {
        return $this->actief;
    }

    /**
     * @param bool $actief
     */
    public function setActief($actief)
    {
        $this->actief = $actief;
    }
    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
}
