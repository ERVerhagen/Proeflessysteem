<?php

namespace ProeflesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Student
 *
 * @ORM\Table(name="students")
 * @ORM\Entity(repositoryClass="ProeflesBundle\Repository\StudentsRepository")
 */
class Student
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
     * @ORM\Column(name="Student_name", type="string", length=255)
     */
    private $studentName;

    /**
     * @var string
     *
     * @ORM\Column(name="Student_lastname", type="string", length=255)
     */
    private $studentLastname;

    /**
     * @var string
     *
     * @ORM\Column(name="Student_phone", type="string", length=255, nullable=true, unique=true)
     */
    private $studentPhone;

    /**
     * @var string
     *
     * @ORM\Column(name="Student_mail", type="string", length=255, unique=true)
     */
    private $studentMail;


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
     * Set studentName
     *
     * @param string $studentName
     *
     * @return Student
     */
    public function setStudentName($studentName)
    {
        $this->studentName = $studentName;

        return $this;
    }

    /**
     * Get studentName
     *
     * @return string
     */
    public function getStudentName()
    {
        return $this->studentName;
    }

    /**
     * Set studentLastname
     *
     * @param string $studentLastname
     *
     * @return Student
     */
    public function setStudentLastname($studentLastname)
    {
        $this->studentLastname = $studentLastname;

        return $this;
    }

    /**
     * Get studentLastname
     *
     * @return string
     */
    public function getStudentLastname()
    {
        return $this->studentLastname;
    }

    /**
     * Set studentPhone
     *
     * @param string $studentPhone
     *
     * @return Student
     */
    public function setStudentPhone($studentPhone)
    {
        $this->studentPhone = $studentPhone;

        return $this;
    }

    /**
     * Get studentPhone
     *
     * @return string
     */
    public function getStudentPhone()
    {
        return $this->studentPhone;
    }

    /**
     * Set studentMail
     *
     * @param string $studentMail
     *
     * @return Student
     */
    public function setStudentMail($studentMail)
    {
        $this->studentMail = $studentMail;

        return $this;
    }

    /**
     * Get studentMail
     *
     * @return string
     */
    public function getStudentMail()
    {
        return $this->studentMail;
    }
    /**
     * Generates the magic method
     *
     */

    public function __toString(){
        $Fullname = $this->studentName;
        $Fullname .= " ".$this->studentLastname;
        // to show the name of the Category in the select
        return $Fullname;
        // to show the id of the Category in the select
        // return $this->id;
    }
}

