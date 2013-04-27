<?php

namespace Vizitka\ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SettingsShop
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class SettingsShop
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
     * @ORM\Column(name="setting_id", type="integer", length=11)
     */
    private $setting_id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="text")
     */
    private $value;


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
     * Set setting_id
     *
     * @param integer $settingId
     * @return SettingsShop
     */
    public function setSettingId($settingId)
    {
        $this->setting_id = $settingId;
    
        return $this;
    }

    /**
     * Get setting_id
     *
     * @return integer 
     */
    public function getSettingId()
    {
        return $this->setting_id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return SettingsShop
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
     * Set value
     *
     * @param string $value
     * @return SettingsShop
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
}