<?php

namespace Vizitka\ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PaymentMethodsShop
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class PaymentMethodsShop
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
     * @ORM\Column(name="module", type="string", length=255)
     */
    private $module;

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
     * @ORM\Column(name="currency_id", type="float")
     */
    private $currency_id;

    /**
     * @var string
     *
     * @ORM\Column(name="settings", type="text")
     */
    private $settings;

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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set module
     *
     * @param string $module
     * @return PaymentMethodsShop
     */
    public function setModule($module)
    {
        $this->module = $module;
    
        return $this;
    }

    /**
     * Get module
     *
     * @return string 
     */
    public function getModule()
    {
        return $this->module;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return PaymentMethodsShop
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
     * @return PaymentMethodsShop
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
     * Set currency_id
     *
     * @param float $currencyId
     * @return PaymentMethodsShop
     */
    public function setCurrencyId($currencyId)
    {
        $this->currency_id = $currencyId;
    
        return $this;
    }

    /**
     * Get currency_id
     *
     * @return float 
     */
    public function getCurrencyId()
    {
        return $this->currency_id;
    }

    /**
     * Set settings
     *
     * @param string $settings
     * @return PaymentMethodsShop
     */
    public function setSettings($settings)
    {
        $this->settings = $settings;
    
        return $this;
    }

    /**
     * Get settings
     *
     * @return string 
     */
    public function getSettings()
    {
        return $this->settings;
    }

    /**
     * Set enabled
     *
     * @param integer $enabled
     * @return PaymentMethodsShop
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
     * @return PaymentMethodsShop
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
}