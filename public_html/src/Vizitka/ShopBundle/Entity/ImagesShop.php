<?php

namespace Vizitka\ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ImagesShop
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class ImagesShop
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
     * @ORM\Column(name="filename", type="string", length=255)
     */
    private $filename;

    /**
     * 
     * @ORM\ManyToOne(targetEntity="ProductsShop", inversedBy="images")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     */
    protected $product;
    
    
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
     * @return ImagesShop
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
     * Set product_id
     *
     * @param integer $productId
     * @return ImagesShop
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
     * Set filename
     *
     * @param string $filename
     * @return ImagesShop
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;
    
        return $this;
    }

    /**
     * Get filename
     *
     * @return string 
     */
    public function getFilename()
    {
        return $this->filename;
    }
    
          public function updateFromArray($params) { 
        foreach ($params as $key => $val) 
            if (isset($this->$key))
                { $this->$key = $val; } 
   }

    /**
     * Set product
     *
     * @param \Vizitka\ShopBundle\Entity\ProductsShop $product
     * @return ImagesShop
     */
    public function setProduct(\Vizitka\ShopBundle\Entity\ProductsShop $product = null)
    {
        $this->product = $product;
    
        return $this;
    }

    /**
     * Get product
     *
     * @return \Vizitka\ShopBundle\Entity\ProductsShop 
     */
    public function getProduct()
    {
        return $this->product;
    }
}