<?php

namespace Vizitka\ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PurchasesShop
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class PurchasesShop
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
     * @ORM\Column(name="order_id", type="integer", length=11)
     */
    private $order_id;

    /**
     * @var integer
     *
     * @ORM\Column(name="product_id", type="integer", length=11)
     */
    private $product_id;

    /**
     * @var integer
     *
     * @ORM\Column(name="variant_id", type="integer", length=11)
     */
    private $variant_id;

    /**
     * @var string
     *
     * @ORM\Column(name="product_name", type="string", length=255)
     */
    private $product_name;

    /**
     * @var string
     *
     * @ORM\Column(name="variant_name", type="string", length=255)
     */
    private $variant_name;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float")
     */
    private $price;

    /**
     * @var integer
     *
     * @ORM\Column(name="amount", type="integer", length=11)
     */
    private $amount;

    /**
     * @var string
     *
     * @ORM\Column(name="sku", type="string", length=255)
     */
    private $sku;


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
     * Set order_id
     *
     * @param integer $orderId
     * @return PurchasesShop
     */
    public function setOrderId($orderId)
    {
        $this->order_id = $orderId;
    
        return $this;
    }

    /**
     * Get order_id
     *
     * @return integer 
     */
    public function getOrderId()
    {
        return $this->order_id;
    }

    /**
     * Set product_id
     *
     * @param integer $productId
     * @return PurchasesShop
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
     * Set variant_id
     *
     * @param integer $variantId
     * @return PurchasesShop
     */
    public function setVariantId($variantId)
    {
        $this->variant_id = $variantId;
    
        return $this;
    }

    /**
     * Get variant_id
     *
     * @return integer 
     */
    public function getVariantId()
    {
        return $this->variant_id;
    }

    /**
     * Set product_name
     *
     * @param string $productName
     * @return PurchasesShop
     */
    public function setProductName($productName)
    {
        $this->product_name = $productName;
    
        return $this;
    }

    /**
     * Get product_name
     *
     * @return string 
     */
    public function getProductName()
    {
        return $this->product_name;
    }

    /**
     * Set variant_name
     *
     * @param string $variantName
     * @return PurchasesShop
     */
    public function setVariantName($variantName)
    {
        $this->variant_name = $variantName;
    
        return $this;
    }

    /**
     * Get variant_name
     *
     * @return string 
     */
    public function getVariantName()
    {
        return $this->variant_name;
    }

    /**
     * Set price
     *
     * @param float $price
     * @return PurchasesShop
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
     * Set amount
     *
     * @param integer $amount
     * @return PurchasesShop
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    
        return $this;
    }

    /**
     * Get amount
     *
     * @return integer 
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set sku
     *
     * @param string $sku
     * @return PurchasesShop
     */
    public function setSku($sku)
    {
        $this->sku = $sku;
    
        return $this;
    }

    /**
     * Get sku
     *
     * @return string 
     */
    public function getSku()
    {
        return $this->sku;
    }
}