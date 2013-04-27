<?php

namespace Vizitka\ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RelatedProductsShop
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class RelatedProductsShop
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
     * @ORM\Column(name="related_id", type="integer", length=11)
     */
    private $related_id;

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
     * Set product_id
     *
     * @param integer $productId
     * @return RelatedProductsShop
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
     * Set related_id
     *
     * @param integer $relatedId
     * @return RelatedProductsShop
     */
    public function setRelatedId($relatedId)
    {
        $this->related_id = $relatedId;
    
        return $this;
    }

    /**
     * Get related_id
     *
     * @return integer 
     */
    public function getRelatedId()
    {
        return $this->related_id;
    }

    /**
     * Set position
     *
     * @param integer $position
     * @return RelatedProductsShop
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