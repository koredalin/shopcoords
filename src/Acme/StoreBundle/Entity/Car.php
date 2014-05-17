<?php

namespace Acme\StoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Acme\StoreBundle\Entity\Owner;

/**
 * Car
 */
class Car {

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $brand;

    /**
     * @var string
     */
    private $model;

    /**
     * @var \Date
     */
    private $producedDate;

    /**
     * @var integer
     */
    private $cost;

    /**
     * @var string
     */
    private $currency;

    /**
     * @var integer
     */
    protected $owner;
    
    

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set brand
     *
     * @param string $brand
     * @return Car
     */
    public function setBrand($brand) {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get brand
     *
     * @return string 
     */
    public function getBrand() {
        return $this->brand;
    }

    /**
     * Set model
     *
     * @param string $model
     * @return Car
     */
    public function setModel($model) {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return string 
     */
    public function getModel() {
        return $this->model;
    }

    /**
     * Set producedDate
     *
     * @param \DateTime $producedDate
     * @return Car
     */
    public function setProducedDate($producedDate) {
        $this->producedDate = $producedDate;

        return $this;
    }

    /**
     * Get producedDate
     *
     * @return \DateTime 
     */
    public function getProducedDate() {
        return $this->producedDate;
    }

    /**
     * Set cost
     *
     * @param integer $cost
     * @return Car
     */
    public function setCost($cost) {
        $this->cost = $cost;

        return $this;
    }

    /**
     * Get cost
     *
     * @return integer 
     */
    public function getCost() {
        return $this->cost;
    }

    /**
     * Set currency
     *
     * @param string $currency
     * @return Car
     */
    public function setCurrency($currency) {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Get currency
     *
     * @return string 
     */
    public function getCurrency() {
        return $this->currency;
    }
    
    public function getOwner() {
        return $this->owner;
    }
    
    /**
     * Set owner
     *
     * @param integer $owner
     * @return Car
     */
    public function setOwner($owner) {
        $this->owner = $owner;

        return $this;
    }

}
