<?php

namespace Vizitka\ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OptionsShop
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class OptionsShop
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
     * @var integer
     *
     * @ORM\Column(name="product_id", type="integer", length=11)
     */
    private $product_id;

    /**
     * @var integer
     *
     * @ORM\Column(name="feature_id", type="integer", length=11)
     */
    private $feature_id;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="string", length=255)
     */
    private $value;

    /**
     * @var string
     *
     * @ORM\Column(name="value1", type="string", length=255)
     */
    private $value1;

    /**
     * @var string
     *
     * @ORM\Column(name="value2", type="string", length=255)
     */
    private $value2;


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
     * Set product_id
     *
     * @param integer $productId
     * @return OptionsShop
     */
    public function setProductId($productId)
    {
        $this->product_id = $productId;
    
        return $this;
    }

    /**
     * Get product_id
     *
     * @return integer 
     */
    public function getProductId()
    {
        return $this->product_id;
    }

    /**
     * Set feature_id
     *
     * @param integer $featureId
     * @return OptionsShop
     */
    public function setFeatureId($featureId)
    {
        $this->feature_id = $featureId;
    
        return $this;
    }

    /**
     * Get feature_id
     *
     * @return integer 
     */
    public function getFeatureId()
    {
        return $this->feature_id;
    }

    /**
     * Set value
     *
     * @param string $value
     * @return OptionsShop
     */
    public function setValue($value)
    {
        $this->value = $value;
    
        return $this;
    }

    /**
     * Get value
     *
     * @return string 
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set value1
     *
     * @param string $value1
     * @return OptionsShop
     */
    public function setValue1($value1)
    {
        $this->value1 = $value1;
    
        return $this;
    }

    /**
     * Get value1
     *
     * @return string 
     */
    public function getValue1()
    {
        return $this->value1;
    }

    /**
     * Set value2
     *
     * @param string $value2
     * @return OptionsShop
     */
    public function setValue2($value2)
    {
        $this->value2 = $value2;
    
        return $this;
    }

    /**
     * Get value2
     *
     * @return string 
     */
    public function getValue2()
    {
        return $this->value2;
    }
}