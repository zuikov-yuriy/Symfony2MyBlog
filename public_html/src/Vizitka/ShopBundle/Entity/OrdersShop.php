<?php

namespace Vizitka\ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OrdersShop
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class OrdersShop
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
     * @ORM\Column(name="delivery_price", type="integer", length=11)
     */
    private $delivery_price;

    /**
     * @var integer
     *
     * @ORM\Column(name="payment_method_id", type="integer", length=11)
     */
    private $payment_method_id;

    /**
     * @var integer
     *
     * @ORM\Column(name="paid", type="integer", length=11)
     */
    private $paid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="payment_date", type="datetime")
     */
    private $payment_date;

    /**
     * @var integer
     *
     * @ORM\Column(name="closed", type="smallint")
     */
    private $closed;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var integer
     *
     * @ORM\Column(name="user_id", type="integer", length=11)
     */
    private $user_id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=500)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=500)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=500)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=500)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="string", length=1024)
     */
    private $comment;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer", length=11)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="payment_details", type="text")
     */
    private $payment_details;

    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=50)
     */
    private $ip;

    /**
     * @var float
     *
     * @ORM\Column(name="total_price", type="float")
     */
    private $total_price;

    /**
     * @var string
     *
     * @ORM\Column(name="note", type="string", length=1024)
     */
    private $note;

    /**
     * @var float
     *
     * @ORM\Column(name="discount", type="float")
     */
    private $discount;

    /**
     * @var float
     *
     * @ORM\Column(name="coupon_discount", type="float")
     */
    private $coupon_discount;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_code", type="string", length=500)
     */
    private $coupon_code;

    /**
     * @var integer
     *
     * @ORM\Column(name="separate_delivery", type="integer", length=11)
     */
    private $separate_delivery;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modified", type="datetime")
     */
    private $modified;


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
     * @return OrdersShop
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
     * Set delivery_price
     *
     * @param integer $deliveryPrice
     * @return OrdersShop
     */
    public function setDeliveryPrice($deliveryPrice)
    {
        $this->delivery_price = $deliveryPrice;
    
        return $this;
    }

    /**
     * Get delivery_price
     *
     * @return integer 
     */
    public function getDeliveryPrice()
    {
        return $this->delivery_price;
    }

    /**
     * Set payment_method_id
     *
     * @param integer $paymentMethodId
     * @return OrdersShop
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

    /**
     * Set paid
     *
     * @param integer $paid
     * @return OrdersShop
     */
    public function setPaid($paid)
    {
        $this->paid = $paid;
    
        return $this;
    }

    /**
     * Get paid
     *
     * @return integer 
     */
    public function getPaid()
    {
        return $this->paid;
    }

    /**
     * Set payment_date
     *
     * @param \DateTime $paymentDate
     * @return OrdersShop
     */
    public function setPaymentDate($paymentDate)
    {
        $this->payment_date = $paymentDate;
    
        return $this;
    }

    /**
     * Get payment_date
     *
     * @return \DateTime 
     */
    public function getPaymentDate()
    {
        return $this->payment_date;
    }

    /**
     * Set closed
     *
     * @param integer $closed
     * @return OrdersShop
     */
    public function setClosed($closed)
    {
        $this->closed = $closed;
    
        return $this;
    }

    /**
     * Get closed
     *
     * @return integer 
     */
    public function getClosed()
    {
        return $this->closed;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return OrdersShop
     */
    public function setDate($date)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set user_id
     *
     * @param integer $userId
     * @return OrdersShop
     */
    public function setUserId($userId)
    {
        $this->user_id = $userId;
    
        return $this;
    }

    /**
     * Get user_id
     *
     * @return integer 
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return OrdersShop
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
     * Set address
     *
     * @param string $address
     * @return OrdersShop
     */
    public function setAddress($address)
    {
        $this->address = $address;
    
        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return OrdersShop
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    
        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return OrdersShop
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set comment
     *
     * @param string $comment
     * @return OrdersShop
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    
        return $this;
    }

    /**
     * Get comment
     *
     * @return string 
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return OrdersShop
     */
    public function setStatus($status)
    {
        $this->status = $status;
    
        return $this;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return OrdersShop
     */
    public function setUrl($url)
    {
        $this->url = $url;
    
        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set payment_details
     *
     * @param string $paymentDetails
     * @return OrdersShop
     */
    public function setPaymentDetails($paymentDetails)
    {
        $this->payment_details = $paymentDetails;
    
        return $this;
    }

    /**
     * Get payment_details
     *
     * @return string 
     */
    public function getPaymentDetails()
    {
        return $this->payment_details;
    }

    /**
     * Set ip
     *
     * @param string $ip
     * @return OrdersShop
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
    
        return $this;
    }

    /**
     * Get ip
     *
     * @return string 
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set total_price
     *
     * @param float $totalPrice
     * @return OrdersShop
     */
    public function setTotalPrice($totalPrice)
    {
        $this->total_price = $totalPrice;
    
        return $this;
    }

    /**
     * Get total_price
     *
     * @return float 
     */
    public function getTotalPrice()
    {
        return $this->total_price;
    }

    /**
     * Set note
     *
     * @param string $note
     * @return OrdersShop
     */
    public function setNote($note)
    {
        $this->note = $note;
    
        return $this;
    }

    /**
     * Get note
     *
     * @return string 
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set discount
     *
     * @param float $discount
     * @return OrdersShop
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;
    
        return $this;
    }

    /**
     * Get discount
     *
     * @return float 
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * Set coupon_discount
     *
     * @param float $couponDiscount
     * @return OrdersShop
     */
    public function setCouponDiscount($couponDiscount)
    {
        $this->coupon_discount = $couponDiscount;
    
        return $this;
    }

    /**
     * Get coupon_discount
     *
     * @return float 
     */
    public function getCouponDiscount()
    {
        return $this->coupon_discount;
    }

    /**
     * Set coupon_code
     *
     * @param string $couponCode
     * @return OrdersShop
     */
    public function setCouponCode($couponCode)
    {
        $this->coupon_code = $couponCode;
    
        return $this;
    }

    /**
     * Get coupon_code
     *
     * @return string 
     */
    public function getCouponCode()
    {
        return $this->coupon_code;
    }

    /**
     * Set separate_delivery
     *
     * @param integer $separateDelivery
     * @return OrdersShop
     */
    public function setSeparateDelivery($separateDelivery)
    {
        $this->separate_delivery = $separateDelivery;
    
        return $this;
    }

    /**
     * Get separate_delivery
     *
     * @return integer 
     */
    public function getSeparateDelivery()
    {
        return $this->separate_delivery;
    }

    /**
     * Set modified
     *
     * @param \DateTime $modified
     * @return OrdersShop
     */
    public function setModified($modified)
    {
        $this->modified = $modified;
    
        return $this;
    }

    /**
     * Get modified
     *
     * @return \DateTime 
     */
    public function getModified()
    {
        return $this->modified;
    }
}