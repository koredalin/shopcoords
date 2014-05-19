<?php

namespace Acme\StoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rim
 */
class Rim
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $size;

    /**
     * @var integer
     */
    private $boltsNumber;

    /**
     * @var string
     */
    private $carBrand;

    /**
     * @var string
     */
    private $description;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set size
     *
     * @param string $size
     * @return Rim
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size
     *
     * @return string 
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set boltsNumber
     *
     * @param integer $boltsNumber
     * @return Rim
     */
    public function setBoltsNumber($boltsNumber)
    {
        $this->boltsNumber = $boltsNumber;

        return $this;
    }

    /**
     * Get boltsNumber
     *
     * @return integer 
     */
    public function getBoltsNumber()
    {
        return $this->boltsNumber;
    }

    /**
     * Set carBrand
     *
     * @param string $carBrand
     * @return Rim
     */
    public function setCarBrand($carBrand)
    {
        $this->carBrand = $carBrand;

        return $this;
    }

    /**
     * Get carBrand
     *
     * @return string 
     */
    public function getCarBrand()
    {
        return $this->carBrand;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Rim
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }
}
