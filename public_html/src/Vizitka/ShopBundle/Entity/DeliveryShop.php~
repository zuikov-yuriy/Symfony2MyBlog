<?php

namespace Vizitka\ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DeliveryShop
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class DeliveryShop
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="free_from", type="float")
     */
    private $free_from;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float")
     */
    private $price;

    /**
     * @var integer
     *
     * @ORM\Column(name="enabled", type="smallint")
     */
    private $enabled;

    /**
     * @var integer
     *
     * @ORM\Column(name="position", type="integer", length=11)
     */
    private $position;

    /**
     * @var integer
     *
     * @ORM\Column(name="separate_payment", type="integer", length=11)
     */
    private $separate_payment;


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
     * Set name
     *
     * @param string $name
     * @return DeliveryShop
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return DeliveryShop
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

    /**
     * Set free_from
     *
     * @param float $freeFrom
     * @return DeliveryShop
     */
    public function setFreeFrom($freeFrom)
    {
        $this->free_from = $freeFrom;
    
        return $this;
    }

    /**
     * Get free_from
     *
     * @return float 
     */
    public function getFreeFrom()
    {
        return $this->free_from;
    }

    /**
     * Set price
     *
     * @param float $price
     * @return DeliveryShop
     */
    public function setPrice($price)
    {
        $this->price = $price;
    
        return $this;
    }

    /**
     * Get price
     *
     * @return float 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set enabled
     *
     * @param integer $enabled
     * @return DeliveryShop
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
    
        return $this;
    }

    /**
     * Get enabled
     *
     * @return integer 
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Set position
     *
     * @param integer $position
     * @return DeliveryShop
     */
    public function setPosition($position)
    {
        $this->position = $position;
    
        return $this;
    }

    /**
     * Get position
     *
     * @return integer 
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set separate_payment
     *
     * @param integer $separatePayment
     * @return DeliveryShop
     */
    public function setSeparatePayment($separatePayment)
    {
        $this->separate_payment = $separatePayment;
    
        return $this;
    }

    /**
     * Get separate_payment
     *
     * @return integer 
     */
    public function getSeparatePayment()
    {
        return $this->separate_payment;
    }
}