<?php

namespace Acme\StoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Owner
 */
class Owner {

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var \Date
     */
    private $born;

    /**
     * @var string
     */
    private $gender;

    /**
     * @var array
     */
    protected $cars;

    public function __construct() {
        $this->cars = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return Owner
     */
    public function setFirstName($firstName) {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName() {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return Owner
     */
    public function setLastName($lastName) {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName() {
        return $this->lastName;
    }

    /**
     * Set born
     *
     * @param \DateTime $born
     * @return Owner
     */
    public function setBorn($born) {
        $this->born = $born;

        return $this;
    }

    /**
     * Get born
     *
     * @return \DateTime 
     */
    public function getBorn() {
        return $this->born;
    }

    /**
     * Set gender
     *
     * @param string $gender
     * @return Owner
     */
    public function setGender($gender) {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string 
     */
    public function getGender() {
        return $this->gender;
    }

    public function __toString() {
        $owner = $this->getFirstName(). ' ' . $this->getLastName();
        return (string) $owner;
    }

}
