<?php

namespace ProeflesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lesson
 *
 * @ORM\Table(name="lessons")
 * @ORM\Entity(repositoryClass="ProeflesBundle\Repository\LessonsRepository")
 */
class Lesson
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
     * @ORM\ManyToMany(targetEntity="ProeflesBundle\Entity\Student")
     * @ORM\JoinTable(name="Student_groep", joinColumns={@ORM\JoinColumn(name="Lesson_id", referencedColumnName="id")},
     * inverseJoinColumns={@ORM\JoinColumn(name="Student_id", referencedColumnName="id")})
     */

    private $students;

    /**
     * @var int
     *
     * @ORM\Column(name="fos_userid", type="integer")
     */

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumn(name="fos_userid", referencedColumnName="id")
     */
    private $fosUserid;

    /**
     * @var int
     *
     * @ORM\Column(name="Location_id", type="integer")
     */

    /**
     * @ORM\ManyToOne(targetEntity="ProeflesBundle\Entity\Location")
     * @ORM\JoinColumn(name="location_id", referencedColumnName="id")
     */
    private $locationId;

    /**
     * @var string
     *
     * @ORM\Column(name="Lesson_type", type="string", length=255)
     */


    private $lessonType;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Lesson_date", type="date")
     */
    private $lessonDate;


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
     * Set fosUserid
     *
     * @param integer $fosUserid
     *
     * @return Lesson
     */
    public function setFosUserid($fosUserid)
    {
        $this->fosUserid = $fosUserid;

        return $this;
    }

    /**
     * Get Students
     *
     * @return string
     */
    public function getStudents()
    {
        return $this->students;
    }

    /**
     * Set Students
     *
     * @param integer $students
     *
     * @return Lesson
     */
    public function setStudents($students)
    {
        $this->students = $students;

        return $this;
    }

    /**
     * Get fosUserid
     *
     * @return int
     */
    public function getFosUserid()
    {
        return $this->fosUserid;
    }

    /**
     * Set locationId
     *
     * @param integer $locationId
     *
     * @return Lesson
     */
    public function setLocationId($locationId)
    {
        $this->locationId = $locationId;

        return $this;
    }

    /**
     * Get locationId
     *
     * @return int
     */
    public function getLocationId()
    {
        return $this->locationId;
    }

    /**
     * Set lessonType
     *
     * @param string $lessonType
     *
     * @return Lesson
     */
    public function setLessonType($lessonType)
    {
        $this->lessonType = $lessonType;

        return $this;
    }

    /**
     * Get lessonType
     *
     * @return string
     */
    public function getLessonType()
    {
        return $this->lessonType;
    }

    /**
     * Set lessonDate
     *
     * @param \DateTime $lessonDate
     *
     * @return Lesson
     */
    public function setLessonDate($lessonDate)
    {
        $this->lessonDate = $lessonDate;

        return $this;
    }

    /**
     * Get lessonDate
     *
     * @return \DateTime
     */
    public function getLessonDate()
    {
        return $this->lessonDate;
    }
}

