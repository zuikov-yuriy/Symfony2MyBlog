<?php

namespace Vizitka\ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FeaturesShop
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class FeaturesShop
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
     * @ORM\Column(name="name", type="string", length=500)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="position", type="integer", length=11)
     */
    private $position;

    /**
     * @var integer
     *
     * @ORM\Column(name="in_filter", type="smallint")
     */
    private $in_filter;


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
     * @return FeaturesShop
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
     * Set position
     *
     * @param integer $position
     * @return FeaturesShop
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
     * Set in_filter
     *
     * @param integer $inFilter
     * @return FeaturesShop
     */
    public function setInFilter($inFilter)
    {
        $this->in_filter = $inFilter;
    
        return $this;
    }

    /**
     * Get in_filter
     *
     * @return integer 
     */
    public function getInFilter()
    {
        return $this->in_filter;
    }
}