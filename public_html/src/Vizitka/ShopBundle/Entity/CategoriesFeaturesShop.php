<?php

namespace Vizitka\ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CategoriesFeaturesShop
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class CategoriesFeaturesShop
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
     * @ORM\Column(name="category_id", type="integer", length=11)
     */
    private $category_id;

    /**
     * @var integer
     *
     * @ORM\Column(name="feature_id", type="integer", length=11)
     */
    private $feature_id;


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
     * Set category_id
     *
     * @param integer $categoryId
     * @return CategoriesFeaturesShop
     */
    public function setCategoryId($categoryId)
    {
        $this->category_id = $categoryId;
    
        return $this;
    }

    /**
     * Get category_id
     *
     * @return integer 
     */
    public function getCategoryId()
    {
        return $this->category_id;
    }

    /**
     * Set feature_id
     *
     * @param integer $featureId
     * @return CategoriesFeaturesShop
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
}