<?php

namespace Vizitka\ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CouponsShop
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class CouponsShop
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
     * @ORM\Column(name="code", type="string", length=256)
     */
    private $code;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="expire", type="datetime")
     */
    private $expire;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var float
     *
     * @ORM\Column(name="value", type="float")
     */
    private $value;

    /**
     * @var float
     *
     * @ORM\Column(name="min_order_price", type="float")
     */
    private $min_order_price;

    /**
     * @var integer
     *
     * @ORM\Column(name="single", type="integer", length=11)
     */
    private $single;

    /**
     * @var integer
     *
     * @ORM\Column(name="usages", type="integer", length=11)
     */
    private $usages;


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
     * Set code
     *
     * @param string $code
     * @return CouponsShop
     */
    public function setCode($code)
    {
        $this->code = $code;
    
        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set expire
     *
     * @param \DateTime $expire
     * @return CouponsShop
     */
    public function setExpire($expire)
    {
        $this->expire = $expire;
    
        return $this;
    }

    /**
     * Get expire
     *
     * @return \DateTime 
     */
    public function getExpire()
    {
        return $this->expire;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return CouponsShop
     */
    public function setType($type)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set value
     *
     * @param float $value
     * @return CouponsShop
     */
    public function setValue($value)
    {
        $this->value = $value;
    
        return $this;
    }

    /**
     * Get value
     *
     * @return float 
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set min_order_price
     *
     * @param float $minOrderPrice
     * @return CouponsShop
     */
    public function setMinOrderPrice($minOrderPrice)
    {
        $this->min_order_price = $minOrderPrice;
    
        return $this;
    }

    /**
     * Get min_order_price
     *
     * @return float 
     */
    public function getMinOrderPrice()
    {
        return $this->min_order_price;
    }

    /**
     * Set single
     *
     * @param integer $single
     * @return CouponsShop
     */
    public function setSingle($single)
    {
        $this->single = $single;
    
        return $this;
    }

    /**
     * Get single
     *
     * @return integer 
     */
    public function getSingle()
    {
        return $this->single;
    }

    /**
     * Set usages
     *
     * @param integer $usages
     * @return CouponsShop
     */
    public function setUsages($usages)
    {
        $this->usages = $usages;
    
        return $this;
    }

    /**
     * Get usages
     *
     * @return integer 
     */
    public function getUsages()
    {
        return $this->usages;
    }
}