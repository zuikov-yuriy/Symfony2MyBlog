<?php

namespace Vizitka\ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DeliverPaymentShop
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class DeliverPaymentShop
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
     * @ORM\Column(name="delivery_id", type="integer", length=11)
     */
    private $delivery_id;

    /**
     * @var integer
     *
     * @ORM\Column(name="payment_method_id", type="integer", length=11)
     */
    private $payment_method_id;


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
     * Set delivery_id
     *
     * @param integer $deliveryId
     * @return DeliverPaymentShop
     */
    public function setDeliveryId($deliveryId)
    {
        $this->delivery_id = $deliveryId;
    
        return $this;
    }

    /**
     * Get delivery_id
     *
     * @return integer 
     */
    public function getDeliveryId()
    {
        return $this->delivery_id;
    }

    /**
     * Set payment_method_id
     *
     * @param integer $paymentMethodId
     * @return DeliverPaymentShop
     */
    public function setPaymentMethodId($paymentMethodId)
    {
        $this->payment_method_id = $paymentMethodId;
    
        return $this;
    }

    /**
     * Get payment_method_id
     *
     * @return integer 
     */
    public function getPaymentMethodId()
    {
        return $this->payment_method_id;
    }
}